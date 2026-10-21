<!-- app/Views/admin/home.php -->
 <?= $this->extend('admin/layouts/main') ?>

<?= $this->section('main_content') ?>

<!-- Main Activity Dashboard Area -->
<main class="flex-grow-1 mb-5">

<!-- Welcome Header Banner Component -->
<div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4 pb-3 border-bottom">
    <div>
    <h4 class="fw-bold text-dark mb-1">Quick Management Panel</h4>
    <p class="text-muted small mb-0">Overview of actions and shortcuts for managing you website.</p>
    </div>
    <div>
    <span class="badge bg-secondary-subtle text-secondary border px-3 py-2 rounded-pill font-monospace">Powered by CodeIgniter <?= CodeIgniter\CodeIgniter::CI_VERSION ?></span>
    </div>
</div>

<!-- Actions Shortcut Grid -->
<h5 class="fw-semibold text-dark mb-3">Content Operations</h5>
<div class="row g-4 mb-5">
    
    <!-- New Page -->
    <div class="col-12 col-sm-6 col-xl-4">
    <div class="card h-100 border shadow-sm transition-hover">
        <div class="card-body p-4 d-flex flex-column justify-content-between">
        <div>
            <div class="mb-3 d-inline-flex p-2 bg-primary-subtle text-primary rounded border border-primary-subtle">
            <i class="bi bi-file-text px-1"></i>
            </div>
            <h6 class="fw-bold text-dark mb-1">Add New Page</h6>
            <p class="text-muted small mb-0">Create pain or HTML content pages with images to post on the website.</p>
        </div>
        <div class="mt-4">
            <a href="<?= base_url('admin/pages/new')?>" class="btn btn-sm btn-primary w-100">Create Page</a>
        </div>
        </div>
    </div>
    </div>

    <!-- Project Article -->
    <div class="col-12 col-sm-6 col-xl-4">
    <div class="card h-100 border shadow-sm">
        <div class="card-body p-4 d-flex flex-column justify-content-between">
        <div>
            <div class="mb-3 d-inline-flex p-2 bg-success-subtle text-success rounded border border-success-subtle">
            <i class="bi bi-file-earmark-post px-1"></i>
            </div>
            <h6 class="fw-bold text-dark mb-1">Add Project Article</h6>
            <p class="text-muted small mb-0">Publish rich case reviews, operational updates, or news summaries.</p>
        </div>
        <div class="mt-4">
            <a href="<?= base_url('admin/projects/new')?>" class="btn btn-sm btn-success text-white w-100">Write Article</a>
        </div>
        </div>
    </div>
    </div>

    <!-- Manage Uploaded Images -->
    <div class="col-12 col-sm-6 col-xl-4">
    <div class="card h-100 border shadow-sm">
        <div class="card-body p-4 d-flex flex-column justify-content-between">
        <div>
            <div class="mb-3 d-inline-flex p-2 bg-info-subtle text-info rounded border border-info-subtle">
            <i class="bi bi-images px-1"></i>
            </div>
            <h6 class="fw-bold text-dark mb-1">Uploaded Images</h6>
            <p class="text-muted small mb-0">Manage uploaded images used throughout the websites; Contact, Info Pages and Project Artices pages.</p>
        </div>
        <div class="mt-4">
            <a href="<?= base_url('admin/uploaded_images')?>" class="btn btn-sm btn-info text-white w-100">Manage Images</a>
        </div>
        </div>
    </div>
    </div>

</div>

<!-- Management & Parameters Setup Grid -->
<h5 class="fw-semibold text-dark mb-3">System & Profiles</h5>
<div class="row g-4">
    
    <!-- Edit Website Info Panel -->
    <div class="col-12 col-md-6">
    <div class="card border shadow-sm h-100">
        <div class="card-body p-4 d-flex align-items-start gap-3">
        <div class="p-2 bg-light rounded text-secondary border flex-shrink-0">
            <i class="bi bi-gear px-1"></i>
        </div>
        <div class="flex-grow-1">
            <h6 class="fw-bold text-dark mb-1">Website Settings</h6>
            <p class="text-muted small mb-3">Adjust configurations, emails, operational timetables, and description properties.</p>
            <a href="<?= base_url('admin/settings') ?>" class="btn btn-sm btn-outline-secondary px-3">Configure Setup</a>
        </div>
        </div>
    </div>
    </div>

    <!-- Edit User Accounts Panel -->
    <div class="col-12 col-md-6">
    <div class="card border shadow-sm h-100">
        <div class="card-body p-4 d-flex align-items-start gap-3">
        <div class="p-2 bg-light rounded text-secondary border flex-shrink-0">
            <i class="bi bi-people-fill px-1"></i>
        </div>
        <div class="flex-grow-1">
            <h6 class="fw-bold text-dark mb-1">User Accounts</h6>
            <p class="text-muted small mb-3">Modify team profiles, manage credential parameters, and balance security settings.</p>
            <a href="<?= base_url('admin/users') ?>" class="btn btn-sm btn-outline-secondary px-3">Manage Users</a>
        </div>
        </div>
    </div>
    </div>

</div>

</main>

<?= $this->endSection() ?>