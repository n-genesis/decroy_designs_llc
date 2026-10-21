<!-- app/Views/web/templates/default.php -->
<?= $this->extend('web/layouts/main') ?>

<?= $this->section('main_content') ?>
<main class="main">
<!-- Page Title -->
<div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0"><?= esc($title) ?></h1>
        <!-- Breadcrumbs -->
        <?php if (!empty($breadcrumbHtml)): ?>
            <?= $breadcrumbHtml ?>
        <?php endif; ?>
    </div>
</div><!-- End Page Title -->

<section class="container entry-content">
    <header class="page-header">
        <h1><?= esc($title) ?></h1>
    </header>
    
    <div class="body-copy vh-100">
        <!-- CRITICAL: Notice no esc() utility here because we want to allow raw HTML -->
        <!-- compiled from the CMS rich-text backend content editor to render cleanly. -->
        <?= $content ?>
    </div>
</section>
</main>
<?= $this->endSection() ?>
