<!-- app/Views/admin/users/form.php -->
 <?= $this->extend('admin/layouts/main') ?>

<?= $this->section('main_content') ?>

<!-- Banned User Alert -->
<?php if ($user && $user->status !== null): ?>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading"><i class="bi bi-bookmark-x me-2"></i> banned User!</h4>
        <p class="mb-0">This user is currently banned. They will not be able to log in or access their
            account until unbanned.</p>
    </div>
<?php endif; ?>

<div class="card border shadow-sm mb-5">
    <!-- Edit User Form -->
    <form action="<?= esc($action) ?>" method="post" data-km="form" class="needs-validation" novalidate>
        <?= csrf_field() ?>

        <!-- Card Header -->
        <div class="card-header py-3 d-flex flex-column flex-md-row justify-content-between align-items-center">
        <div class="mb-2 mb-sm-0">
            <h5 class="mb-0 fw-semibold text-dark"><?= esc($title) ?></h5>
            <span class="text-muted small">Manage system administrators and editor profiles</span>
        </div>
        <!-- User active status checkbox -->
            <div class="custom-control custom-checkbox mr-3">
                <input type="checkbox" name="active" class="custom-control-input" id="activeCheckbox"
                    <?= !empty($user) && $user->active ? 'checked' : '' ?>>
                <label class="custom-control-label" for="activeCheckbox">Active</label>
            </div>
            <!-- Ban User -->
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-success active">
                    <input type="radio" name="status" id="activeBtn" value="active"> Unbanned
                </label>
                <label class="btn btn-danger">
                    <input type="radio" name="status" id="bannedBtn" value="banned" <?= !empty($user) && $user->status !== null ? 'checked' : '' ?>> Banned
                </label>
            </div>
        </div>

        <!-- Card Body -->
        <div class="card-body">
            <div class="row g-3">

            <!-- Banned Status Message / Show if User status is NOT null -->
            <div class="collapse <?= !empty($user) && $user->status !== null ? 'show' : '' ?>" id="collapseStatusMsg">
                <div class="mb-3">
                    <label for="userStatus" class="form-lable">Status Message</label>
                    <textarea class="form-control is-invalid" name="status_message" id="userStatusMsg"
                        rows="3"><?= old('status_message', $user->status_message ?? '') ?></textarea>
                    <div class="invalid-feedback">A message to add to users account.</div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username"
                    value="<?= old('username', $user->username ?? '') ?>" required>
                <div class="invalid-feedback">Please enter a username.</div>
            </div>

            <div class="col-12 col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="<?= old('email', $user->email ?? '') ?>" required>
                <div class="invalid-feedback">Please enter a valid email address.</div>
            </div>

            <div class="col-12 col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <div class="form-text">Leave blank to keep current password. New password must be at least 8
                    characters long and contain a mix of letters, numbers, and symbols.</div>
            </div>

            <div class="col-12 col-md-6">
                <label for="password_confirm" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirm" name="password_confirm">
                <div class="invalid-feedback">Passwords do not match.</div>
            </div>

            <div class="mb-3">
                <label class="form-label">User Groups</label>
                <div class="row">
                    <?php foreach ($groups as $group): ?>
                        <div class="col-md-4 mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="groups[]" value="<?= $group['group'] ?? '' ?>" id="group_<?= $group['group'] ?? '' ?>"
                                    <?= in_array($group['group'], old('groups', $userGroups)) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="group_<?= $group['group'] ?>">
                                    <?= esc(ucfirst($group['group'])) ?>
                                    <small class="d-block text-muted">
                                        <?= esc($group['group'] == 'admin' ? 'Administrator access' : 'Regular user access') ?>
                                    </small>
                                </label>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="invalid-feedback">Please select at least one group.</div>
            </div>

        </div>
        </div>

        <footer class="card-footer d-flex align-items-center justify-content-between">
            <a href="<?= site_url('admin/users') ?>" class="btn btn-secondary btn-sm mr-auto">
                <i class="bi bi-box-arrow-left"></i> Cancel
            </a>
            <button type="submit" class="btn btn-primary btn-sm"><?= empty($user->id) ? 'Create User' : 'Update User' ?></button>
        </footer>
        
    </form>
</div>

<?= $this->endSection(); ?>

<?= $this->section('scripts') ?>
<script>
    // Form validation
    (function () {
        'use strict';

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation');

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                // Check if at least one group is selected
                var groupCheckboxes = form.querySelectorAll('input[name="groups[]"]:checked');
                if (groupCheckboxes.length === 0) {
                    event.preventDefault();
                    event.stopPropagation();
                    form.querySelector('.invalid-feedback').style.display = 'block';
                }

                // Check if password and confirm password match
                var password = document.getElementById('password');
                var passwordConfirm = document.getElementById('password_confirm');
                if (password.value !== '' && password.value !== passwordConfirm.value) {
                    event.preventDefault();
                    event.stopPropagation();
                    passwordConfirm.setCustomValidity('Passwords do not match');
                } else {
                    passwordConfirm.setCustomValidity('');
                }

                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>
<script>
    // Initialize the Bootstrap Collapse instance
    const collapseElement = document.getElementById('collapseStatusMsg');
    const bsCollapse = new bootstrap.Collapse(collapseElement, { toggle: false });

    const bannedBtn = document.getElementById('bannedBtn');
    const activeBtn = document.getElementById('activeBtn');
    const userStatusMsg = document.getElementById('userStatusMsg');

    // Show banned message
    bannedBtn.addEventListener('change', function () {
        if (this.checked) {
            bsCollapse.show();
        }
    });

    collapseElement.addEventListener('shown.bs.collapse', function () {
        userStatusMsg.disabled = false;
    });

    // When Closed
    activeBtn.addEventListener('change', function () {
        if (this.checked) {
            bsCollapse.hide();
        }
    });

    collapseElement.addEventListener('hidden.bs.collapse', function () {
        userStatusMsg.disabled = true;
    });

</script>
<?= $this->endSection() ?>