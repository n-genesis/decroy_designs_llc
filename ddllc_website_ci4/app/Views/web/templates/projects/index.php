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

    <section id="projects" class="projects section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Our Projects</h2>
            <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est
                laborum</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row g-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                <?php if (empty($projects)): ?>
                    <p>No published projects are available right now.</p>
                <?php else: ?>
                    <?php foreach ($projects as $project): ?>
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-residential">
                            <div class="project-card">
                                <?php if (!empty($project->image_path)): ?>
                                    <img src="<?= base_url($project->image_path) ?>" alt="<?= esc($project->name) ?>" class="img-fluid" loading="lazy">
                                <?php endif ?>
                                <div class="card-overlay">
                                    <div class="card-content">
                                        <?php if (!empty($project->type)): ?><span class="tag"><?= esc($project->type) ?></span><?php endif ?>
                                        <h3><a href="<?= site_url('project/' . $project->slug) ?>"><?= esc($project->name) ?></a></h3>
                                        <p><?php if (!empty($project->description)): ?><p><?= esc($project->description) ?></p><?php endif ?></p>
                                    </div>
                                    <div class="card-actions">
                                        <a href="<?= base_url($project->image_path) ?>" class="card-action glightbox"
                                            data-gallery="projects" title="<?= esc($project->name) ?>"><i
                                                class="bi bi-arrows-fullscreen"></i></a>
                                        <a href="<?= site_url('project/' . $project->slug) ?>" class="card-action" title="View Details"><i
                                                class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>

    </section>

</main>
<?= $this->endSection() ?>