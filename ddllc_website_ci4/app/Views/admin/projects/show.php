<!-- app/Views/admin/projects/show.php -->
<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('main_content') ?>
<div class="card shadow-sm">
    <header class="card-header d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-0"><?= esc($project->name) ?></h1>
        <div>
            <a class="btn btn-outline-secondary" href="<?= site_url('admin/projects') ?>">Back to projects</a>
            <a class="btn btn-primary" href="<?= site_url('admin/projects/edit/' . $project->id) ?>">Edit project</a>
        </div>
    </header>
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-3">Slug</dt><dd class="col-sm-9"><?= esc($project->slug) ?></dd>
            <dt class="col-sm-3">Type</dt><dd class="col-sm-9"><?= esc($project->type ?? '') ?></dd>
            <dt class="col-sm-3">Visibility</dt><dd class="col-sm-9"><?= esc(ucfirst($project->visibility)) ?></dd>
            <dt class="col-sm-3">Description</dt><dd class="col-sm-9"><?= esc($project->description ?? '') ?></dd>
            <dt class="col-sm-3">Image path</dt><dd class="col-sm-9"><?= esc($project->image_path ?? '') ?></dd>
            <dt class="col-sm-3">Project content</dt><dd class="col-sm-9"><?= nl2br(esc($project->project_content ?? '')) ?></dd>
            <dt class="col-sm-3">Project details</dt><dd class="col-sm-9"><?= nl2br(esc($project->project_details ?? '')) ?></dd>
            <dt class="col-sm-3">Metadata</dt><dd class="col-sm-9"><?= nl2br(esc($project->metadata ?? '')) ?></dd>
        </dl>
    </div>
</div>
<?= $this->endSection() ?>