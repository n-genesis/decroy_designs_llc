<!-- app/Views/admin/templates/edit.php -->
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

<div class="card shadow-sm mb-3">
  <!-- Card Header -->
  <div class="card-header d-flex justify-content-between align-items-center">
    <span class="font-monospace small"><?= $filename ?></span>
    <span class="badge bg-secondary">PHP</span>
  </div>

    <form method="post" action="<?= esc($action) ?>" class="needs-validation" novalidate>
        <?= csrf_field() ?>
        <?php if ($method !== 'POST'): ?>
            <input type="hidden" name="_method" value="<?= esc($method) ?>">
        <?php endif ?>
        <!-- Card Body enclosing standard Textarea -->
        <div class="card-body p-0">
            <textarea class="form-control bg-dark text-white border-0 font-monospace p-3 rounded-0"
            name="file_content"
            rows="25" 
            spellcheck="false"
            placeholder="// Write code here..."
            ><?= esc($file_content)?></textarea>
        </div>

        <!-- Card Footer -->
        <footer class="card-footer d-flex justify-content-between align-items-center">
            <button class="btn btn-primary" type="submit">Save changes</button>
        </footer>
    </form>
</div>

<div class="alert alert-info" role="alert">
  Note: It helps to first copy the code to Notepad before making edits. Just in-case something goes wrong. You can simply copy the original code back in.
</div>

<?= $this->endSection() ?>