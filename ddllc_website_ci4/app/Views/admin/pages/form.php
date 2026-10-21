<!-- app/Views/admin/pages/form.php -->
<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/slate.css'); ?>">
<?= $this->endSection() ?>

<?= $this->section('main_content') ?>

<div class="card shadow-sm">
    <header class="card-header d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-0"><?= esc($title) ?></h1>
        <a class="btn btn-outline-secondary" href="<?= esc(site_url('admin/pages')) ?>">Back to pages</a>
    </header>
    <div class="card-body">
        <form method="post" action="<?= esc($action) ?>" class="needs-validation" novalidate>
            <?= csrf_field() ?>
            <?php if ($method !== 'POST'): ?>
                <input type="hidden" name="_method" value="<?= esc($method) ?>">
            <?php endif ?>
            <div class="mb-3">
                <label class="form-label" for="title">Title</label>
                <input class="form-control" id="title" name="title" maxlength="255" required value="<?= esc(old('title', $page->title ?? '')) ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="slug">Slug</label>
                <input class="form-control" id="slug" name="slug" maxlength="128" value="<?= esc(old('slug', $page->slug ?? '')) ?>" aria-describedby="slug-help">
                <div class="form-text" id="slug-help">Leave blank to create a slug from the title.</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="12"><?= esc(old('content', $page->content ?? '')) ?></textarea>
            </div>
            <div class="mb-4">
                <label class="form-label" for="visibility">Visibility</label>
                <?php $visibility = old('visibility', $page->visibility ?? ''); ?>
                <select class="form-select" id="visibility" name="visibility" required>
                    <option value="draft" <?= $visibility === 'draft' ? 'selected' : '' ?>>Draft</option>
                    <option value="published" <?= $visibility === 'published' ? 'selected' : '' ?>>Published</option>
                </select>
            </div>
            <button class="btn btn-primary" type="submit"><?= empty($page->id) ? 'Create page' : 'Save changes' ?></button>
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
        new Slate(document.getElementById('content'));
        
        // Apply the saved theme or system preference
        const savedTheme = localStorage.getItem('theme');
        const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const currentTheme = savedTheme || (systemPrefersDark ?? 'light');

        const wrapper = document.querySelector('.slate-canvas-wrapper');

        wrapper.classList.add('theme-' + currentTheme);

        // Listen for clicks on the entire document
        document.addEventListener('click', function (event) {
            // Find the closest element with the [data-bs-theme-value] attribute
            const themeToggler = event.target.closest('[data-bs-theme-value]');
            
            // If the clicked element or its parent isn't a theme toggler, do nothing
            if (!themeToggler) return;

            // Retrieve the theme value (usually "light", "dark", or "auto")
            const chosenTheme = themeToggler.getAttribute('data-bs-theme-value');
            console.log(`Theme toggler clicked! Chosen theme: ${chosenTheme}`);
            wrapper.classList.remove('theme-light', 'theme-dark', 'theme-auto');
            wrapper.classList.add('theme-' + chosenTheme);
        });
        
    });
</script>
<?= $this->endSection() ?>