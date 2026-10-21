<!-- app/Views/admin/uploaded_images/index.php -->
<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('main_content') ?>

<!-- Page Header-->
<header class="pb-2 mb-3 border-bottom">
    <h1 class="h3 mb-0"><?= esc($title) ?></h1>
</header>

<div class="container-fluid p-0 mb-5">
  <div class="row">
    
    <!-- 1. Sticky Sidebar Filter Column (Collapsible or fixed on desktop) -->
    <aside class="col-lg-3 vh-100 p-3 sticky-top d-none d-lg-block" style="width: 260px;">
      <div class="d-flex align-items-center mb-4 pb-2 border-bottom">
        <h5 class="fw-bold mb-0 text-primary">Media Manager</h5>
      </div>
      <ul class="nav nav-pills flex-column gap-1">
        <li class="nav-item">
          <a class="nav-link active d-flex justify-content-between align-items-center" href="#">
            <span>All Images</span>
            <span class="badge bg-white text-primary rounded-pill small"><?= count($images) ?></span>
          </a>
        </li>
        <!-- <li class="nav-item"><a class="nav-link text-secondary" href="#">Project Uploads</a></li>
        <li class="nav-item"><a class="nav-link text-secondary border-top rounded-0 mt-2 pt-2 text-danger small" href="#">Trash</a></li> -->
      </ul>
    </aside>

    <!-- Main Content View Area -->
    <main class="col-lg-9 p-4">
      
      <!-- Upper Toolbar Header Component -->
      <div class="card p-3 mb-4 border shadow-sm">
        <div class="row g-3 align-items-center justify-content-between">
          <!-- Search input layout column -->
          <!-- <div class="col-12 col-md-4">
            <input type="search" class="form-control" placeholder="Search images by name...">
          </div> -->
          <!-- Action controls layout column -->
          <div class="col-12 col-md-auto d-flex gap-2 justify-content-end">
            <form id="uploadForm" action="<?= base_url('/admin/upload') ?>" method="POST" enctype="multipart/form-data">
              <?= csrf_field() ?>
              <input type="file" id="imageInput" name="images[]" multiple accept="image/*" class="d-none">
              <button type="button" id="uploadButton" class="btn btn-primary btn-sm d-flex align-items-center gap-2">
                <i class="bi bi-upload"></i>
                Upload Images
              </button>
            </form>
          </div>
        </div>
      </div>

      <!-- Responsive Gallery Grid Layout Area -->
      <?php if(!empty($images)): ?>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
            
            <!-- Image Card Template Block -->
            <?php foreach($images as $image): ?>
            <div class="col">
            <div class="card h-100 shadow-sm border overflow-hidden position-relative">
                <!-- Optional Context Hover Mask (Action shortcuts overlayed) -->
                <div class="position-absolute top-0 end-0 p-2 z-3 d-flex gap-1">
                  <form action="<?= base_url("admin/delete_image/$image->id") ?>" method="POST" class="d-inline delete-form">
                  <?= csrf_field() ?>
                  <button type="button" class="btn btn-sm btn-light shadow-sm border px-2 py-1 delete-btn" title="Delete"><small class="text-danger">✕</small></button>
                </form>
                </div>
                <!-- Copy Image Link -->
                <div class="position-absolute top-0 start-0 p-2 z-3 d-flex gap-1">
                <button type="button" class="btn btn-sm btn-light shadow-sm border px-2 py-1 copylink" data-image-link="<?= basename($image->image_path) ?>" title="Copy link"><small class="text-danger"><i class="bi bi-copy m-0"></i></small></button>
                </div>
                <!-- Image Frame Element Container -->
                <div class="bg-body-secondary d-flex align-items-center justify-content-center" style="height: 160px; overflow:hidden;">
                <img src="<?= base_url($image->image_path) ?>" class="w-100 h-100 object-fit-cover" alt="Media Asset Thumbnail">
                </div>
                <!-- Asset Metadata Block -->
                <div class="card-body p-2 border-top">
                <p class="card-text text-truncate fw-medium mb-0 small text-dark" title="<?= $image->file_name ?>"><?= $image->file_name ?></p>
                <div class="d-flex justify-content-between align-items-center mt-1">
                    <span class="text-muted" style="font-size: 0.7rem;"><?= number_to_size($image->file_size, 1) ?></span>
                    <span class="font-monospace text-muted" style="font-size: 0.7rem;"><?= $image->mime_type ?></span>
                </div>
                </div>
            </div>
            </div>
            <?php endforeach ?>

        </div>
      <?php else: ?>
        <div class="col mx-auto">
            <div class="alert alert-info" role="alert">
                No images have been uploaded.
            </div>
        </div>
        <?php endif ?>
    </main>

  </div>
</div>

<!-- Toast Container (Positions the toast) -->
<div class="toast-container position-fixed top-0 end-0 p-3">
  <!-- The Actual Toast -->
  <div id="liveToast" class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
    <div class="toast-body text-break">
      toast message.
    </div>
    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>


<!-- Trigger Button -->

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModalLabel">Confirm Action</h5>
        <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this item? This action cannot be undone.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmActionBtn">Confirm Delete</button>
      </div>
    </div>
  </div>
</div>


<?= $this->endSection() ?>


<?= $this->section('scripts') ?>
<script>
 document.addEventListener('DOMContentLoaded', () => {
        // Copy Image Link to Clipboard
        const copyLinks = document.querySelectorAll('.copylink');
        copyLinks.forEach(link => {
          link.addEventListener('click',(event) => {
            const parentButton = event.target.closest('button');
              // Get the toast element by ID
              const toastElement = document.getElementById('liveToast');
              
              // Initialize or retrieve the Bootstrap toast instance
              const toast = bootstrap.Toast.getOrCreateInstance(toastElement);
              toastElement.querySelector('.toast-body').textContent = `Copied to clipboard: ${parentButton.dataset.imageLink}`;
              
              // Show the toast
              toast.show();

              copyToClipboard(parentButton.dataset.imageLink);
          });
        });
        
        // Function to copy text to clipboard
        async function copyToClipboard(text) {
            try {
              await navigator.clipboard.writeText(text);
              console.log('Text copied to clipboard successfully!');
            } catch (err) {
              console.error('Failed to copy text: ', err);
            }
      }

      // Upload Images mechanics
      const uploadButton = document.getElementById('uploadButton');
      const fileInput = document.getElementById('imageInput');
      const form = document.getElementById('uploadForm');

      uploadButton.addEventListener('click', () => {
        fileInput.click(); 
      });

      // Once a file is selected, automatically submit the form
      fileInput.addEventListener('change', () => {
        if (fileInput.files.length > 0) {
          form.submit(); 
        }
      });

      // Delete Image Confirmation Modal
      const deleteBtns = document.querySelectorAll('.delete-btn');
      deleteBtns.forEach(btn => {
          btn.addEventListener('click', (event) => {
              event.preventDefault();
              const form = btn.closest('form');
              const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
              confirmModal.show();

              const confirmActionBtn = document.getElementById('confirmActionBtn');
              confirmActionBtn.onclick = () => {
                  form.submit();
                  confirmModal.hide();
              };
          });
      });



 });
</script>


<?= $this->endSection() ?>