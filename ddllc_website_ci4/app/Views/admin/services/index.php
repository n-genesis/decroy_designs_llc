<!-- app/Views/admin/services/index.php -->
 <?= $this->extend('admin/layouts/main') ?>

<?= $this->section('main_content') ?>


<!-- Page Header-->
<header class="pb-2 mb-3 border-bottom d-flex align-items-center justify-content-between">
    <h1 class="h3 mb-0"><?= esc($title) ?></h1>
</header>

<div class="card h-100 bg-light border-secondary-subtle">
  <!-- Card Header -->
  <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0 d-flex justify-content-between align-items-center">
    <div class="p-2 bg-body rounded shadow-sm border">
      <!-- Simple Service Plug/Extension SVG Icon -->
      <svg xmlns="http://w3.org" width="24" height="24" fill="currentColor" class="text-secondary" viewBox="0 0 16 16">
        <path d="M6 0a.5.5 0 0 1 .5.5V3h3V.5a.5.5 0 0 1 1 0V3h1a2 2 0 0 1 2 2v3h1.5a.5.5 0 0 1 0 1H13v3a2 2 0 0 1-2 2h-1v2.5a.5.5 0 0 1-1 0V13h-3v2.5a.5.5 0 0 1-1 0V13h-1a2 2 0 0 1-2-2V8H.5a.5.5 0 0 1 0-1H2V4a2 2 0 0 1 2-2h1V.5A.5.5 0 0 1 6 0M4 3a1 1 0 0 0-1 1v3.5a.5.5 0 0 1-.5.5H1.5a.5.5 0 0 0 0 1H2.5a.5.5 0 0 1 .5.5V11a1 1 0 0 0 1 1h3.5a.5.5 0 0 1 .5.5v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a.5.5 0 0 1 .5-.5H11a1 1 0 0 0 1-1V8.5a.5.5 0 0 1 .5-.5h1a1 1 0 0 0 0-1h-1a.5.5 0 0 1-.5-.5V4a1 1 0 0 0-1-1H8.5a.5.5 0 0 1-.5-.5v-1a1 1 0 0 0-1-1h-1z"/>
      </svg>
    </div>
    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-2 py-1 small rounded-pill">Inactive</span>
  </div>

  <!-- Card Body -->
  <div class="card-body p-4">
    <h5 class="card-title fw-semibold text-dark mb-2">Third-Party Services and Extensions</h5>
    <p class="card-text text-muted small lh-base">
      Here you'll be able to connect your application settings directly to external tools, tracking modules, or analytics APIs. Once activated, the options will be avaliable here.
    </p>
    <div class="alert alert-info" role="alert">
        This section is currently under development.
        </div>
  </div>

</div>



<?= $this->endSection() ?>