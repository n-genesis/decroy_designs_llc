<!-- app/Views/web/projects/show.php -->
<?= $this->extend('web/layouts/main'); ?>

<?= $this->section('main_content'); ?>

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

    <!-- Project Details Section -->
    <section id="project-details" class="project-details section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-5">

            <div class="col-lg-8">

            <div class="hero-banner" data-aos="zoom-in">
                <div class="banner-slider swiper init-swiper">
                <script type="application/json" class="swiper-config">
                    {
                    "loop": true,
                    "speed": 700,
                    "autoplay": {
                        "delay": 4500
                    },
                    "effect": "slide",
                    "slidesPerView": 1,
                    "pagination": {
                        "el": ".swiper-pagination",
                        "type": "fraction"
                    },
                    "navigation": {
                        "nextEl": ".swiper-button-next",
                        "prevEl": ".swiper-button-prev"
                    }
                    }
                </script>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                    <img src="<?= esc(base_url($project->image_path)) ?>" alt="<?= esc($project->name) ?>"  class="img-fluid" loading="lazy">
                    </div>
                    <?php if (!empty($project_images)): foreach($project_images as $image): ?>
                    <div class="swiper-slide">
                    <img src="<?= esc(base_url($image->image_path)) ?>" alt="Construction Showcase" class="img-fluid" loading="lazy">
                    </div>
                    <?php endforeach; endif ?>
                </div>
                <div class="slider-controls">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                </div>
                </div><!-- End Banner Slider -->

                <div class="banner-overlay">
                <span class="tag"><?= esc($project->type) ?></span>
                <h2><?= esc($project->name) ?></h2>
                </div>
            </div><!-- End Hero Banner -->

            <div class="detail-tabs mt-4" data-aos="fade-up" data-aos-delay="200">
                <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#project-details-tab-1" type="button" role="tab" aria-selected="true">
                    <i class="bi bi-info-circle"></i> Overview
                    </button>
                </li>
                </ul>

                <div class="tab-content">
                <div class="tab-pane fade show active" id="project-details-tab-1" role="tabpanel">
                    <?= $project->project_content ?>
                </div><!-- End Tab 1 -->
                </div>
            </div><!-- End Detail Tabs -->

            <div class="photo-grid mt-4" data-aos="fade-up" data-aos-delay="300">
                <h4>Image Gallary</h4>
                <div class="row g-3">
                    <?php if (!empty($project->image_path)):  ?>
                        <div class="col-4">
                            <a href="<?= esc(base_url($project->image_path)) ?>" class="glightbox" data-gallery="detail-gallery">
                            <img src="<?= esc(base_url($project->image_path)) ?>" alt="<?= esc($project->name) ?>" class="img-fluid" loading="lazy">
                            </a>
                        </div>
                    <?php endif ?>
                    <?php if (!empty($project_images)): foreach($project_images as $image2): ?>
                    <div class="col-4">
                        <a href="<?= esc(base_url($image2->image_path)) ?>" class="glightbox" data-gallery="detail-gallery">
                        <img src="<?= esc(base_url($image2->image_path)) ?>" alt="<?= esc($image2->image_name) ?>" class="img-fluid" loading="lazy">
                        </a>
                    </div>
                    <?php endforeach; endif ?>
                </div>
            </div><!-- End Photo Grid -->

            </div>

            <div class="col-lg-4">

            <div class="sticky-sidebar">

            <?= $project->project_details ?>
        
            </div><!-- End Sticky Sidebar -->

            </div>

        </div>

        <div class="bottom-nav d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <!-- <a href="project-details.html" class="btn-nav prev-btn">
            <i class="bi bi-chevron-left"></i>
            <div class="btn-text">
                <span class="btn-label">Previous</span>
                <span class="btn-title">Earlier Project</span>
            </div>
            </a> -->
            <a href="<?= site_url('projects') ?>" class="btn-nav center-btn">
            <i class="bi bi-grid-3x3-gap"></i>
            <span>Browse All</span>
            </a>
            <!-- <a href="project-details.html" class="btn-nav next-btn">
            <div class="btn-text">
                <span class="btn-label">Next</span>
                <span class="btn-title">Upcoming Project</span>
            </div>
            <i class="bi bi-chevron-right"></i>
            </a> -->
        </div><!-- End Bottom Nav -->

        </div>

    </section><!-- /Project Details Section -->

</main>
<?= $this->endSection() ?>