<!-- app/Views/admin/templates/index.php -->
 <?= $this->extend('admin/layouts/main') ?>

<?= $this->section('main_content') ?>

<div class="alert alert-info" role="alert">
  <h4 class="alert-heading">For Developers!</h4>
  <p class="mb-0">These are the website main template files. E.g. About, Service, and Contact pages. Editing these pages might cause the website to break. Please be careful.</p>
</div>

<!-- Page Header-->
<header class="pb-2 mb-3 border-bottom">
    <h1 class="h3 mb-0"><?= esc($title) ?></h1>
</header>

<div class="card shadow-sm mb-5">
  <!-- Card Header with Breadcrumbs / Title -->
  <div class="card-header d-flex justify-content-between align-items-center">
    <nav aria-label="breadcrumb" class="mb-0">
      <ol class="breadcrumb mb-0 py-1">
        <li class="breadcrumb-item"><a href="#" class="text-decoration-none fw-semibold">app</a></li>
        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Views</a></li>
        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">web</a></li>
        <li class="breadcrumb-item active" aria-current="page">templates</li>
      </ol>
    </nav>
    <span class="badge bg-secondary rounded-pill"><?= count((array)$templates) ?> items</span>
  </div>
    <!-- Card Body containing the File Directory List -->
    <div class="card-body">
    <ul class="list-group list-group-flush">
        <!-- File Item -->
        <?php foreach($templates as $file): ?>
        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-2.5">
        <div class="d-flex align-items-center gap-2">
            <!-- SVG Layout/CSS File Icon -->
            <i class="bi bi-filetype-php m-0"></i>
            <a href="#" class="text-body-emphasis text-decoration-none"><?= basename($file) ?></a>
        </div>
        <a class="btn btn-primary btn-sm" href="<?= site_url('admin/templates/edit/'.basename($file)) ?>">Edit File</a>
        </li>
        <?php endforeach ?>
    </ul>
    </div>
  <!-- Card Footer for Directory Summary / Actions -->
  <div class="card-footer">
    <p class="m-0">Note: It helps to first copy the code into Notepad before making edits. Then you can copy the original code back in if something goes wrong.</p>
  </div>
</div>

<?= $this->endSection() ?>