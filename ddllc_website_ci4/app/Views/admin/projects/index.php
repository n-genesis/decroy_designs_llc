<!-- app/Views/admin/projects/index.php -->
<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('main_content') ?>

<!-- Page Header-->
<header class="pb-2 mb-3 border-bottom d-flex flex-column flex-sm-row justify-content-between align-items-center">
    <h1 class="h3 mb-2 mb-sm-0"><?= esc($title) ?></h1>
    <span>
        <a class="btn btn-primary btn-sm" href="<?= esc(site_url('admin/projects/new')) ?>">Create project</a>
        <a class="btn btn-info btn-sm" href="<?= esc(site_url('admin/uploaded_images')) ?>">Uploaded Images</a>
    </span>
</header>

<div class="card border shadow-sm">
    <div class="card-body p-0">
        <?php if (empty($projects)): ?>
            <div class="alert alert-info m-5" role="alert">
                No projects have been created yet.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Visibility</th>
                            <th scope="col"><span class="visually-hidden">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($projects as $project): ?>
                            <tr>
                                <td><?= esc($project->name) ?></td>
                                <td><?= esc($project->type ?? '') ?></td>
                                <td><?= esc($project->slug) ?></td>
                                <td><?= esc(ucfirst($project->visibility)) ?></td>
                                <td class="text-end text-nowrap">
                                    <a class="btn btn-sm btn-outline-info" target="_blank" href="<?= site_url('project/' . $project->slug) ?>">Site View</a>
                                    <a class="btn btn-sm btn-outline-secondary" href="<?= site_url('admin/projects/' . $project->id) ?>">HTML View</a>
                                    <a class="btn btn-sm btn-outline-primary" href="<?= site_url('admin/projects/edit/' . $project->id) ?>">Edit</a>
                                    <form class="d-inline" method="post" action="<?= site_url('admin/projects/delete/' . $project->id) ?>" onsubmit="return confirm('Are you sure you want to delete this project post?')">
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