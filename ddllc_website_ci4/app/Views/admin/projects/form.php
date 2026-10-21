<!-- app/Views/admin/projects/form.php -->
<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/slate.css'); ?>">
<?= $this->endSection() ?>

<?= $this->section('main_content') ?>

<div class="card border shadow-sm mb-5">
    <header class="card-header d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-0"><?= esc($title) ?></h1>
        <a class="btn btn-outline-secondary" href="<?= esc(site_url('admin/projects')) ?>">Back to projects</a>
    </header>
    
    <div class="card-body">
        <!-- Tabs Nav -->
         <nav class=" mb-4">
            <ul class="nav nav-tabs card-header-tabs border-bottom" id="profileTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="true">Project Details</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="content-tab" data-bs-toggle="tab" data-bs-target="#content-tab-pane" type="button" role="tab" aria-controls="content-tab-pane" aria-selected="false">Content</button>
                </li>
                <li class="nav-item" role="presentation">
                    <?php if(!empty($project->id)): ?>  
                        <a class="nav-link" href="<?= site_url("admin/project_images/edit/$project->id") ?>">Image Gallary</a>
                    <?php else: ?>
                        <span class="nav-link text-muted">Image Gallary <small style="font-size: 0.85rem;">(must save first)</small><span>
                    <?php endif ?>
                </li>
            </ul>
        </nav>
        <!-- Form -->
        <form method="post" action="<?= esc($action) ?>">
            <?= csrf_field() ?>
            <?php if ($method !== 'POST'): ?>
                <input type="hidden" name="_method" value="<?= esc($method) ?>">
            <?php endif ?>
            <!-- Card Body Tab Content -->
            <div class="tab-content" id="profileTabContent">

                <!-- Pane 1: Details Name, Slug, Type, Image, and Description (Active by default) -->
                <div class="tab-pane fade show active" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                    <!-- Name & Slug -->
                     <section class="row">
                        <div class="col-lg-9 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="name">Name</label>
                                <input class="form-control" id="name" name="name" maxlength="145" required value="<?= esc(old('name', $project->name ?? '')) ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="slug">Slug</label>
                                <input class="form-control" id="slug" name="slug" maxlength="128" value="<?= esc(old('slug', $project->slug ?? '')) ?>">
                                <div class="form-text">Leave blank to generate from the project name.</div>
                            </div>
                            <!-- Project Description -->
                            <div class="mb-3">
                                <label class="form-label" for="description">Short description</label>
                                <textarea class="form-control" id="description" name="description" maxlength="255" rows="2"><?= esc(old('description', $project->description ?? '')) ?></textarea>
                            </div>
                        </div>
                        <!-- Type & Image -->
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label" for="type">Type</label>
                                <input class="form-control" id="type" name="type" maxlength="145" value="<?= esc(old('type', $project->type ?? '')) ?>">
                            </div>
                            <div class="mb-3">
                                <img src="<?= base_url(old('image_path', $project->image_path ?? '')) ?>" class="img-thumbnail" alt="...">
                                <label class="form-label" for="image_path">Image path</label>
                                <input class="form-control" id="image_path" name="image_path" maxlength="255" value="<?= esc(old('image_path', $project->image_path ?? '')) ?>">
                            </div>
                        </div>
                    </section>
                    
                </div>

                <!-- Pane 2: Project Content, Details, Metadata, and Visibility -->
                <div class="tab-pane fade" id="content-tab-pane" role="tabpanel" aria-labelledby="content-tab" tabindex="0">
                    <div class="mb-3">
                        <label class="form-label" for="project_content">Project content</label>
                        <textarea class="form-control slate-editor" id="project_content" name="project_content" rows="6"><?= esc(old('project_content', $project->project_content ?? '')) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="project_details">Project details</label>
                        <textarea class="form-control slate-editor" id="project_details" name="project_details" rows="4"><?= esc(old('project_details', $project->project_details ?? '')) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="metadata">Metadata</label>
                        <textarea class="form-control" id="metadata" name="metadata" rows="3"><?= esc(old('metadata', $project->metadata ?? '')) ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="visibility">Visibility</label>
                        <?php $visibility = old('visibility', $project->visibility ?? 'draft'); ?>
                        <select class="form-select" id="visibility" name="visibility" required>
                            <option value="draft" <?= $visibility === 'draft' ? 'selected' : '' ?>>Draft</option>
                            <option value="published" <?= $visibility === 'published' ? 'selected' : '' ?>>Published</option>
                        </select>
                    </div>
                </div>

                <button class="btn btn-primary" type="submit"><?= empty($project->id) ? 'Create project' : 'Save changes' ?></button>
            </div>
        </form>
    </div>

</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/js/slate.min.js') ?>"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {

                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
        });
        // Using slate.js
        document.querySelectorAll('.slate-editor').forEach(function(element) {
            new Slate(element);
        });

        // Apply the saved theme or system preference
        const savedTheme = localStorage.getItem('theme');
        const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const currentTheme = savedTheme || (systemPrefersDark ?? 'light');

        const wrapper = document.querySelectorAll('.slate-canvas-wrapper');

        wrapper.forEach(w => {
            w.classList.add('theme-' + currentTheme);
        });

        // Listen for clicks on the entire document
        document.addEventListener('click', function (event) {
            // Find the closest element with the [data-bs-theme-value] attribute
            const themeToggler = event.target.closest('[data-bs-theme-value]');
            
            // If the clicked element or its parent isn't a theme toggler, do nothing
            if (!themeToggler) return;

            const chosenTheme = themeToggler.getAttribute('data-bs-theme-value');
            wrapper.forEach(w => {
                w.classList.remove('theme-light', 'theme-dark', 'theme-auto');
                w.classList.add('theme-' + chosenTheme);
            });
        });
    });
</script>
<?= $this->endSection() ?>