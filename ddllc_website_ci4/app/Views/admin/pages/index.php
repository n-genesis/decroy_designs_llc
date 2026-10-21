<!-- app/Views/admin/pages/index.php -->
 <?= $this->extend('admin/layouts/main') ?>

<?= $this->section('main_content') ?>

<div class="alert alert-info" role="alert">
  <h4 class="alert-heading">Just so you know</h4>
  <p class="mb-0">"Pages" are general blog/article pages for you to post anything from, Service Update or Helpful Tips-n-Tricks.</p>
</div>

<div class="card border shadow-sm">
    <!-- Page Header-->
    <header class="card-header d-flex justify-content-between align-items-center border-bottom">
        <h1 class="h3 mb-0"><?= esc($title) ?></h1>
        <a class="btn btn-primary btn-sm" href="<?= esc(site_url('admin/pages/new')) ?>">Create page</a>
    </header>
    <div class="card-body">
        <!-- Page List -->
    <?php if (empty($pages)): ?>
        <div class="alert alert-info my-3 mx-5" role="alert">
            No projects have been created yet.
        </div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Visibility</th>
                        <th scope="col">Updated</th>
                        <th scope="col"><span class="visually-hidden">Actions</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pages as $page): ?>
                        <tr>
                            <td><?= esc($page->title) ?></td>
                            <td><?= esc($page->slug) ?></td>
                            <td><?= esc(ucfirst($page->visibility)) ?></td>
                            <td><?= \CodeIgniter\I18n\Time::parse($page->updated_at)->toLocalizedString('MMM d, yyyy') ?? '' ?></td>
                            <td class="text-end text-nowrap">
                                <a class="btn btn-sm btn-outline-info" target="_blank" href="<?= site_url($page->slug) ?>">Site View</a>
                                <a class="btn btn-sm btn-outline-secondary" href="<?= site_url('admin/pages/' . $page->id) ?>">HTML View</a>
                                <a class="btn btn-sm btn-outline-primary" href="<?= site_url('admin/pages/edit/' . $page->id) ?>">Edit</a>
                                <form class="d-inline" method="post" action="<?= site_url('admin/pages/delete/' . $page->id) ?>" onsubmit="return confirm('Move this page to trash?')">
                                    <?= csrf_field() ?>
                                    <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php endif ?>
    </div>
    <footer class="card-footer">
        <?= $pager->links('default', 'pager_full') ?>
    </footer>
</div>

<?= $this->endSection() ?>