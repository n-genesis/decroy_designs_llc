<!-- app/Views/web/templates/coming-soon.php -->
<?= $this->extend('web/layouts/main'); ?>

<?= $this->section('main_content'); ?>
<article class="container entry-content">
    <header class="page-header pt-5">
        <h1><?= esc($title) ?></h1>
    </header>
    
    <div class="body-copy vh-100">
        <!-- CRITICAL: Notice no esc() utility here because we want to allow raw HTML -->
        <!-- compiled from the CMS rich-text backend content editor to render cleanly. -->
        <?= $content ?>
    </div>
</article>
<?= $this->endSection(); ?>