<!-- app/Views/web/templates/projects.php -->
<?= $this->extend('web/layouts/main'); ?>

<?= $this->section('main_content'); ?>

<main class="main">

<!-- Page Title -->
<div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0">Our Projects</h1>
    <nav class="breadcrumbs">
        <ol>
        <li><a href="<?= site_url('') ?>">Home</a></li>
        <li class="current">Our Projects</li>
        </ol>
    </nav>
    </div>
</div><!-- End Page Title -->

<!-- Projects Section -->
<section id="projects" class="projects section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Our Projects</h2>
        <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est
            laborum</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="isotope-layout" data-default-filter="*" data-layout="fitRows" data-sort="original-order">

            <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">All Projects</li>
                <li data-filter=".filter-residential">Residential</li>
                <li data-filter=".filter-commercial">Commercial</li>
                <li data-filter=".filter-infrastructure">Infrastructure</li>
            </ul><!-- End Portfolio Filters -->

            <div class="row g-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-residential">
                    <div class="project-card">
                        <img src="assets/img/construction/project-1.webp" alt="" class="img-fluid" loading="lazy">
                        <div class="card-overlay">
                            <div class="card-content">
                                <span class="tag">Residential</span>
                                <h3>Sunset Ridge Villa</h3>
                                <p>Premium residential complex with contemporary architecture</p>
                            </div>
                            <div class="card-actions">
                                <a href="assets/img/construction/project-1.webp" class="card-action glightbox"
                                    data-gallery="projects" title="Fullscreen"><i
                                        class="bi bi-arrows-fullscreen"></i></a>
                                <a href="<?= site_url('project-details') ?>" class="card-action" title="View Details"><i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Project -->

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-commercial">
                    <div class="project-card">
                        <img src="assets/img/construction/project-3.webp" alt="" class="img-fluid" loading="lazy">
                        <div class="card-overlay">
                            <div class="card-content">
                                <span class="tag">Commercial</span>
                                <h3>Metro Business Hub</h3>
                                <p>State-of-the-art office complex in the city center</p>
                            </div>
                            <div class="card-actions">
                                <a href="assets/img/construction/project-3.webp" class="card-action glightbox"
                                    data-gallery="projects" title="Fullscreen"><i
                                        class="bi bi-arrows-fullscreen"></i></a>
                                <a href="<?= site_url('project-details') ?>" class="card-action" title="View Details"><i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Project -->

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-infrastructure">
                    <div class="project-card">
                        <img src="assets/img/construction/project-6.webp" alt="" class="img-fluid" loading="lazy">
                        <div class="card-overlay">
                            <div class="card-content">
                                <span class="tag">Infrastructure</span>
                                <h3>Riverside Highway Bridge</h3>
                                <p>Major bridge connecting the northern corridor</p>
                            </div>
                            <div class="card-actions">
                                <a href="assets/img/construction/project-6.webp" class="card-action glightbox"
                                    data-gallery="projects" title="Fullscreen"><i
                                        class="bi bi-arrows-fullscreen"></i></a>
                                <a href="<?= site_url('project-details') ?>" class="card-action" title="View Details"><i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Project -->

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-residential">
                    <div class="project-card">
                        <img src="assets/img/construction/project-9.webp" alt="" class="img-fluid" loading="lazy">
                        <div class="card-overlay">
                            <div class="card-content">
                                <span class="tag">Residential</span>
                                <h3>Lakeview Apartments</h3>
                                <p>Modern lakeside living with panoramic views</p>
                            </div>
                            <div class="card-actions">
                                <a href="assets/img/construction/project-9.webp" class="card-action glightbox"
                                    data-gallery="projects" title="Fullscreen"><i
                                        class="bi bi-arrows-fullscreen"></i></a>
                                <a href="<?= site_url('project-details') ?>" class="card-action" title="View Details"><i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Project -->

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-commercial">
                    <div class="project-card">
                        <img src="assets/img/construction/project-10.webp" alt="" class="img-fluid" loading="lazy">
                        <div class="card-overlay">
                            <div class="card-content">
                                <span class="tag">Commercial</span>
                                <h3>Central Shopping Plaza</h3>
                                <p>Multi-level retail destination with modern amenities</p>
                            </div>
                            <div class="card-actions">
                                <a href="assets/img/construction/project-10.webp" class="card-action glightbox"
                                    data-gallery="projects" title="Fullscreen"><i
                                        class="bi bi-arrows-fullscreen"></i></a>
                                <a href="<?= site_url('project-details') ?>" class="card-action" title="View Details"><i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Project -->

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-infrastructure">
                    <div class="project-card">
                        <img src="assets/img/construction/project-12.webp" alt="" class="img-fluid" loading="lazy">
                        <div class="card-overlay">
                            <div class="card-content">
                                <span class="tag">Infrastructure</span>
                                <h3>Northern Rail Terminal</h3>
                                <p>Multi-modal transportation hub for the metro area</p>
                            </div>
                            <div class="card-actions">
                                <a href="assets/img/construction/project-12.webp" class="card-action glightbox"
                                    data-gallery="projects" title="Fullscreen"><i
                                        class="bi bi-arrows-fullscreen"></i></a>
                                <a href="<?= site_url('project-details') ?>" class="card-action" title="View Details"><i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Project -->

            </div><!-- End Portfolio Items Container -->

        </div>

    </div>

</section><!-- /Projects Section -->

</main>

<?= $this->endSection(); ?>