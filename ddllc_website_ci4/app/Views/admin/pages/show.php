<!-- app/Views/admin/pages/show.php -->
<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('main_content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0"><?= esc($page->title) ?></h1>
    <div class="d-flex gap-2">
        <a class="btn btn-outline-secondary" href="<?= esc(site_url('admin/pages')) ?>">Back to pages</a>
        <a class="btn btn-primary" href="<?= esc(site_url('admin/pages/edit/' . $page->id)) ?>">Edit</a>
    </div>
</div>

<dl class="row">
    <dt class="col-sm-2">Slug</dt>
    <dd class="col-sm-10"><?= esc($page->slug) ?></dd>
    <dt class="col-sm-2">Visibility</dt>
    <dd class="col-sm-10"><?= esc(ucfirst($page->visibility)) ?></dd>
    <dt class="col-sm-2">Updated</dt>
    <dd class="col-sm-10"><?= esc($page->updated_at ?? '') ?></dd>
</dl>
<h2 class="h5 mt-4">Content</h2>
<pre class="border rounded bg-white p-3 text-wrap text-dark"><?= esc($page->content ?? '') ?></pre>
<?= $this->endSection() ?>