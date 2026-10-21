<!-- app/Views/admin/projects/image_form.php -->
<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/slate.css'); ?>">
<?= $this->endSection() ?>

<?= $this->section('main_content') ?>

<div class="card border shadow-sm mb-5">
    <header class="card-header d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-0"><?= esc($title) ?></h1>
        <a class="btn btn-outline-secondary" href="<?= esc(site_url('admin/projects')) ?>">Back to projects</a>
    </header>
    
    <div class="card-body">
        <!-- Tabs Nav -->
         <nav class=" mb-4">
            <ul class="nav nav-tabs card-header-tabs border-bottom" id="profileTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="<?= site_url("admin/projects/edit/$project->id") ?>">Project Details</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="<?= site_url("admin/projects/edit/$project->id") ?>">Content</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="#" aria-selected="true">Image Gallary</a>
                </li>
            </ul>
        </nav>
        <!-- Form -->
        <form method="post" action="<?= esc($action) ?>">
            <?= csrf_field() ?>
            <?php if ($method !== 'POST'): ?>
                <input type="hidden" name="_method" value="<?= esc($method) ?>">
            <?php endif ?>
            <!-- Card Body Tab Content -->
            <div class="tab-content" id="profileTabContent">
                
                <!-- Project Image Gallary -->
                <div class="card border-0 mb-3">
                    <!-- Card Header -->
                    <div class="card-header d-flex justify-content-between align-items-center py-3">
                        <div>
                            <h6 class="card-title mb-0">Article Attachments</h6>
                            <small class="text-muted" style="font-size: 0.75rem;"><?= count($project_images) ?> files • PNG, JPG</small>
                        </div>
                        <button type="button" class="btn btn-sm btn-primary d-flex align-items-center gap-2 ms-auto me-1" data-bs-toggle="modal" data-bs-target="#imageSelectorModal">
                            <i class="bi bi-plus"></i>
                            Add Image
                        </button>
                    </div>

                    <!-- Asset Management List Container -->
                    <ul id="imageList" class="list-group list-group-flush">
                        <?php if(!empty($project_images)): foreach ($project_images as $image):?>
                        <!-- Item Image Row -->
                        <li class="list-group-item d-flex align-items-center justify-content-between py-3">
                            <div class="d-flex align-items-center gap-3 overflow-hidden w-100">
                                <!-- Thumbnail Preview -->
                                <div class="bg-body-secondary rounded border overflow-hidden d-flex align-items-center justify-content-center" style="width: 56px; height: 56px; flex-shrink: 0;">
                                    <img src="<?= base_url($image->image_path) ?>" class="w-100 h-100 object-fit-cover" alt="<?= esc($image->image_name) ?>">
                                    <input type="hidden" name="images[<?= $image->uploaded_images_id?>][image_id]" value="<?= $image->uploaded_images_id ?>">
                                </div>
                                
                                <!-- Form Inputs Area -->
                                <div class="row g-2 align-items-center flex-grow-1 overflow-hidden">
                                    <!-- File Info & Name Input -->
                                    <div class="col-sm-8 col-12 text-truncate">
                                        <label class="form-label mb-1 small fw-medium text-muted text-truncate d-block">
                                            <?= basename(esc($image->image_path)) ?>
                                        </label>
                                        <input class="form-control form-control-sm shadow-none" 
                                            type="text" 
                                            placeholder="Display Name"
                                            name="images[<?= $image->uploaded_images_id?>][image_name]" 
                                            value="<?= old('image_name', $image->image_name) ?>">
                                    </div>
                                    
                                    <!-- Order/Display Priority Input -->
                                    <div class="col-sm-4 col-12" style="min-width: 80px;">
                                        <label class="form-label mb-1 small fw-medium text-muted">Order</label>
                                        <input class="form-control form-control-sm shadow-none" 
                                            type="number" 
                                            min="0"
                                            placeholder="0"
                                            name="images[<?= $image->uploaded_images_id?>][sort_order]" 
                                            value="<?= old('sort_order', $image->sort_order ?? 0) ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- List Action Buttons -->
                            <div class="d-flex ms-3 align-self-end align-self-sm-center pb-2 pb-sm-0">
                                <button type="button" class="btn btn-sm btn-outline-danger delete-btn" title="Remove Asset">Delete</button>
                            </div>
                        </li>

                        <?php endforeach; else: ?>
                        <li class="li-placeholder list-group-item d-flex align-items-center justify-content-between py-3">
                            Nothing here yet
                        </li>
                        <?php endif ?>
                    </ul>
                </div>

                <button class="btn btn-primary" type="submit">Save changes</button>
            </div>
        </form>
    </div>

</div>

<!-- Image Gallary Selector Modal -->
<div class="modal fade" id="imageSelectorModal" tabindex="-1" aria-labelledby="imageSelectorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content border-secondary-subtle shadow">
      
      <!-- Modal Header -->
      <div class="modal-header bg-light py-3">
        <div>
          <h5 class="modal-title fw-semibold text-dark" id="imageSelectorModalLabel">Choose Article Image</h5>
          <small class="text-muted" style="font-size: 0.75rem;">Select an asset from your media library</small>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body (Scrollable Asset Grid) -->
      <div class="modal-body p-4 bg-body-tertiary">
        <div id="image-list" class="row row-cols-2 row-cols-sm-3 row-cols-md-4 g-3">
          
          <!-- Loading Image Item -->
          <div class="col">
            <div class="card h-100 border shadow-sm position-relative overflow-hidden cursor-pointer" role="button">
                <!-- Active Checkmark Overlay Badge -->
              <div class="position-absolute top-0 end-0 bg-primary text-white px-2 py-1 rounded-bottom-start z-3">
                <i class="bi bi-check-lg"></i>
              </div>
              <div class="bg-dark d-flex align-items-center justify-content-center" style="height: 120px; overflow: hidden;">
                <img src="https://placehold.co/600x400" class="w-100 h-100 object-fit-cover" alt="Loading Images">
              </div>
              <div class="card-body p-2 bg-white">
                <p class="card-text placeholder-glow">
                    <span class="placeholder col-7"></span>
                    <span class="placeholder col-4"></span>
                    </p>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer bg-light py-2">
        <button type="button" class="btn btn-sm btn-outline-secondary px-3" data-bs-dismiss="modal">Cancel</button>
        <button type="button" id="addSelectedBtn" class="btn btn-sm btn-primary px-4" data-bs-dismiss="modal">Insert Image</button>
      </div>

    </div>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/js/slate.min.js') ?>"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        
        var forms = document.querySelectorAll('.needs-validation');

        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {

                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
        });

        // Using slate.js
        document.querySelectorAll('.slate-editor').forEach(function(element) {
            new Slate(element);
        });

        // Image Gallary
        const myModalElement = document.getElementById('imageSelectorModal');

        myModalElement.addEventListener('show.bs.modal', function (event) {
            console.log('Fetching data via AJAX (First open only)...');
            
            fetch('<?= base_url('admin/api/images') ?>', {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest' // Helps CI4 framework detect isAJAX() safely
                }
            })
            .then(response => {
                if (!response.ok) throw new Error('Network error.');
                return response.json();
            })
            .then(data => {
                if (data.status === 'success') {
                    // Overwrites placeholder layout with the complete server-rendered HTML template string
                    document.getElementById('image-list').innerHTML = data.html; 
                }
            })
            .catch(error => {
                console.error('AJAX Render Error:', error);
                document.getElementById('image-list').innerHTML = '<p class="error">Failed loading image dashboard element grid.</p>';
            });

        });

        addDeleteEvent();

    });

    function addDeleteEvent(){
        const deleteButton = document.querySelectorAll('.delete-btn');

        deleteButton.forEach(btn => {
            btn.addEventListener('click', (event) => {
                const card = event.target.closest('.list-group-item');
                console.log('Click');

                if (card) {
                    card.remove();
                }
            });
        });
    }


    const sourceGallery = document.getElementById("image-list");
    const addSelectedBtn = document.getElementById("addSelectedBtn");
    const dynamicList = document.getElementById("imageList");

    // Toggle item selection using Event Delegation
    sourceGallery.addEventListener("click", (e) => {
    const card = e.target.closest(".selectable-box");
    if (!card) return;

    card.classList.toggle("border-primary");
    card.classList.toggle("selected");

    });

    // Add selected items to the secondary list
    addSelectedBtn.addEventListener("click", () => {
    const selectedCards = sourceGallery.querySelectorAll(".selectable-box.selected");

    if (selectedCards.length === 0) {
        alert("Please select at least one image first!");
        return;
    }

    // Remove placeholder text if it exists
    const placeholder = dynamicList.querySelector(".li-placeholder");
    if (placeholder) placeholder.remove();

    selectedCards.forEach((card) => {
        const id = card.getAttribute("data-id");
        const src = card.getAttribute("data-src");
        const name = card.getAttribute("data-name");

        // Prevent duplicating the exact same image into the dynamic list
        if (dynamicList.querySelector(`[data-target-id="${id}"]`)) {
        // Deselect anyway to provide good UX
        card.classList.remove("selected");
        const badge = card.querySelector(".check-badge");
        if (badge) badge.classList.add("d-none");
        return; 
        }

        // Create a small list item column for the target list
        const col = document.createElement("li");
        col.className = "list-group-item d-flex align-items-center justify-content-between py-3";
        col.setAttribute("data-target-id", id);
        col.innerHTML = `
        <div class="d-flex align-items-center gap-3 overflow-hidden w-100">
            <!-- Thumbnail Preview -->
            <div class="bg-body-secondary rounded border overflow-hidden d-flex align-items-center justify-content-center" style="width: 56px; height: 56px; flex-shrink: 0;">
                <img src="${src}" class="w-100 h-100 object-fit-cover" alt="${src}">
                <input type="hidden" name="images[${id}][image_id]" value="${id}">
            </div>
            
            <!-- Form Inputs Area -->
            <div class="row g-2 align-items-center flex-grow-1 overflow-hidden">
                <!-- File Info & Name Input -->
                <div class="col-sm-8 col-12 text-truncate">
                    <label class="form-label mb-1 small fw-medium text-muted text-truncate d-block">
                        ${name}
                    </label>
                    <input class="form-control form-control-sm shadow-none" 
                        type="text" 
                        placeholder="Display Name"
                        name="images[${id}][image_name]" 
                        value="${name}">
                </div>
                
                <!-- Order/Display Priority Input -->
                <div class="col-sm-4 col-12" style="min-width: 80px;">
                    <label class="form-label mb-1 small fw-medium text-muted">Order</label>
                    <input class="form-control form-control-sm shadow-none" 
                        type="number" 
                        min="0"
                        placeholder="0"
                        name="images[${id}][sort_order]" 
                        value="0">
                </div>
            </div>
        </div>
        <!-- List Action Buttons -->
        <div class="d-flex ms-3 align-self-end align-self-sm-center pb-2 pb-sm-0">
            <button type="button" class="btn btn-sm btn-outline-danger delete-btn" title="Remove Asset">Delete</button>
        </div>
        `;
        
        dynamicList.appendChild(col);

        // Clean up the gallery select border state
        card.classList.remove("selected");
        const badge = card.querySelector(".check-badge");
        if (badge) badge.classList.add("d-none");
        
    });

    addDeleteEvent();

    });


</script>


<?= $this->endSection() ?>