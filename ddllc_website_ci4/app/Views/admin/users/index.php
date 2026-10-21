<!-- app/Views/admin/users/index.php -->
 <?= $this->extend('admin/layouts/main') ?>

<?= $this->section('main_content') ?>

<div class="card border shadow-sm">
    <!-- Card Header -->
    <div class="card-header py-3 d-flex flex-column flex-md-row justify-content-between align-items-center">
      <div class="mb-2 mb-sm-0">
        <h5 class="mb-0 fw-semibold text-dark"><?= esc($title) ?></h5>
        <span class="text-muted small">Manage system administrators and editor profiles</span>
      </div>
      <a href="<?= site_url('admin/users/new') ?>" class="btn btn-sm btn-primary">
            <i class="bi bi-person-plus"></i> Add New User
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div id="user_list_datatable_info" class="dataTables_filter">
                    <!--  Search Form  -->
                    <form class="" action="<?= base_url('admin/users') ?>" method="get">
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="search" aria-label="search" name="search" value="<?= esc($search ?? '') ?>">
                          <button class="btn btn-outline-secondary" type="submit" id="searchBtn">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-end align-items-center gap-2">
                <a class="btn btn-success" href="<?= site_url('admin/users') . '?' . http_build_query([
                    'active' => 'true',
                    'search' => $search ?? ''
                    ]) ?>">
                    <i class="bi bi-person-fill-check"></i> Active Users
                </a>
                <a class="btn btn-secondary" href="<?= site_url('admin/users') . '?' . http_build_query([
                    'active' => 'false',
                    'search' => $search ?? ''
                    ]) ?>">
                    <i class="bi bi-person-x-fill"></i> InActive Users
                </a>
            </div>
        </div>
        <!-- User List Table -->
         <section class="table-responsive">
        <table id="user-list-table" class="table table-striped table text-center align-middle mt-4" role="grid">
            <!-- Table Header -->
            <thead>
                <tr>
                    <th>Profile</th>
                    <th>username</th>
                    <th>Email</th>
                    <th>Groups</th>
                    <th>Status</th>
                    <th>Last Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <!-- Table Body -->
            <tbody>
                <?php if (empty($users)): ?>
                    <tr>
                        <td colspan="7" class="text-center">No users found.</td>
                    </tr>
                <?php else: ?>
                    <!-- User Row -->
                    <?php foreach ($users as $user): ?>
                    <!-- User form -->
                    <form method="POST" action="<?= site_url('admin/users/delete/' . $user->id) ?>" data-km="form" data-km-username="<?= esc($user->username) ?>">
                        <!-- CSRF Protection is mandatory for destructive actions -->
                        <?= csrf_field() ?>
                        <tr class="user_row <?= !isset($user->status) ? '' : 'table-danger' ?> ">
                          <!-- Profile Image -->
                            <td>
                              <div class="d-flex align-items-center justify-content-center">
                                <!-- Initials Avatar -->
                                <div class="bg-info-subtle text-info rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 42px; height: 42px; flex-shrink: 0; font-size: 0.9rem;">
                                  <i class="bi bi-person-circle"></i>
                                </div>
                              </div>
                            </td>
                            <td class="fw-semibold text-dark text-truncate"><?= esc($user->username) ?></td>
                            <td class="font-monospace"><?= esc($user->email) ?></td>
                            <td>
                                <?php foreach ($user->getGroups() as $group): ?>
                                  <?php if($group == 'admin'): ?>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle"><?= esc($group) ?></span>
                                  <?php else: ?>
                                    <span class="badge bg-secondary border border-dark-subtle"><?= esc($group) ?></span>
                                  <?php endif ?>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php if ($user->active): ?>
                                    <span class="badge bg-info-subtle text-info border border-info-subtle py-1" style="font-size: 0.75rem;">Active</span>
                                <?php else: ?>
                                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle py-1" style="font-size: 0.75rem;">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <!-- Formated in User Entity class -->
                                <?= \CodeIgniter\I18n\Time::parse($user->updated_at)->humanize() ?>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="<?= site_url('admin/users/edit/' . $user->id) ?>" class="btn btn-primary" data-bs-toggle="tooltip" title="Edit User">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <?php if ($user->id !== auth()->id()): ?>
                                        <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" title="Delete User">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    </form>
                    <?php endforeach; ?>

                <?php endif; ?>

            </tbody>

        </table>
        </section>
    </div>

    <!-- Card Footer & Pagination -->
    <footer class="card-footer d-flex justify-content-between align-items-center py-2">
      <span class="small">Showing <?= count($users) ?> of <?= $user_total ?> users</span>
      <!-- Pagination -->
      <?= $pager->links('default', 'pager_full') ?>
    </footer>
    
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete <b>(<span id="modalUsername" class="text-danger"></span>)</b>? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeModalBtn"  data-bs-dismiss="modal">Cancel</button>
                <buttom type="button" id="deleteUserBtn" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<!-- Show delete confirmation modal script -->
<?= $this->section('scripts') ?>
<script>
    document.addEventListener("DOMContentLoaded", function () {

        const deleteForms = document.querySelectorAll('form[data-km="form"]');
        const deleteModalElement = document.getElementById('deleteModal');

        // 1. Initialize the Bootstrap 5 Modal instance with your options
        const deleteModal = new bootstrap.Modal(deleteModalElement, {
            backdrop: 'static',
            keyboard: false
        });

        deleteForms.forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent form submission

                // 2. Open the modal using the native instance
                deleteModal.show();

                // 3. Extract and update the username field
                const username = form.dataset.kmUsername;
                document.getElementById('modalUsername').textContent = username;

                // 4. Handle the dynamic confirmation button click
                // To clean up previous listeners when changing forms, remove the old listener or use a clean swap:
                const deleteUserBtn = document.getElementById('deleteUserBtn');
                
                // Clone the button to completely wipe previous click bindings
                const newDeleteBtn = deleteUserBtn.cloneNode(true);
                deleteUserBtn.parentNode.replaceChild(newDeleteBtn, deleteUserBtn);

                newDeleteBtn.addEventListener('click', function() {
                    newDeleteBtn.innerHTML = 'Loading...';
                    newDeleteBtn.disabled = true; // Confirm button
                    document.getElementById('closeModalBtn').disabled = true; // Disable close button
                    
                    form.submit(); // Submit the form
                });
            });
        });


    });
</script>

<?= $this->endSection() ?>