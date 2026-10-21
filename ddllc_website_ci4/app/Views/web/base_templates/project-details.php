<!-- app/Views/web/templates/project-details.php -->
<?= $this->extend('web/layouts/main'); ?>

<?= $this->section('main_content'); ?>

<main class="main">

<!-- Page Title -->
<div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0">Project Details</h1>
    <nav class="breadcrumbs">
        <ol>
        <li><a href="<?= site_url('') ?>">Home</a></li>
        <li class="current">Project Details</li>
        </ol>
    </nav>
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
                <img src="assets/img/construction/project-4.webp" alt="Construction Showcase" class="img-fluid" loading="lazy">
                </div>
                <div class="swiper-slide">
                <img src="assets/img/construction/project-7.webp" alt="Construction Showcase" class="img-fluid" loading="lazy">
                </div>
                <div class="swiper-slide">
                <img src="assets/img/construction/project-2.webp" alt="Construction Showcase" class="img-fluid" loading="lazy">
                </div>
            </div>
            <div class="slider-controls">
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
            </div>
            </div><!-- End Banner Slider -->

            <div class="banner-overlay">
            <span class="tag">Commercial</span>
            <h2>Meridian Corporate Tower</h2>
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
                <p class="summary">
                A landmark commercial development integrating cutting-edge design principles with eco-conscious construction methods, tailored for forward-thinking enterprises.
                </p>
                <p>
                The Meridian Corporate Tower spans 32 floors across a 2.5-acre urban footprint. Featuring floor-to-ceiling glass facades, collaborative workspaces, and integrated smart building technology, the structure was delivered in 22 months. Every phase adhered to rigorous sustainability benchmarks and international safety protocols.
                </p>
            </div><!-- End Tab 1 -->
            </div>
        </div><!-- End Detail Tabs -->

        <div class="photo-grid mt-4" data-aos="fade-up" data-aos-delay="300">
            <h4>Visual Documentation</h4>
            <div class="row g-3">
            <div class="col-4">
                <a href="assets/img/construction/project-5.webp" class="glightbox" data-gallery="detail-gallery">
                <img src="assets/img/construction/project-5.webp" alt="Detail Photo" class="img-fluid" loading="lazy">
                </a>
            </div>
            <div class="col-4">
                <a href="assets/img/construction/project-8.webp" class="glightbox" data-gallery="detail-gallery">
                <img src="assets/img/construction/project-8.webp" alt="Detail Photo" class="img-fluid" loading="lazy">
                </a>
            </div>
            <div class="col-4">
                <a href="assets/img/construction/project-11.webp" class="glightbox" data-gallery="detail-gallery">
                <img src="assets/img/construction/project-11.webp" alt="Detail Photo" class="img-fluid" loading="lazy">
                </a>
            </div>
            <div class="col-4">
                <a href="assets/img/construction/project-3.webp" class="glightbox" data-gallery="detail-gallery">
                <img src="assets/img/construction/project-3.webp" alt="Detail Photo" class="img-fluid" loading="lazy">
                </a>
            </div>
            <div class="col-4">
                <a href="assets/img/construction/project-10.webp" class="glightbox" data-gallery="detail-gallery">
                <img src="assets/img/construction/project-10.webp" alt="Detail Photo" class="img-fluid" loading="lazy">
                </a>
            </div>
            <div class="col-4">
                <a href="assets/img/construction/project-1.webp" class="glightbox" data-gallery="detail-gallery">
                <img src="assets/img/construction/project-1.webp" alt="Detail Photo" class="img-fluid" loading="lazy">
                </a>
            </div>
            </div>
        </div><!-- End Photo Grid -->

        </div>

        <div class="col-lg-4">

        <div class="sticky-sidebar">

            <div class="client-card mb-5" data-aos="fade-left" data-aos-delay="300">
            <h4>Client Details</h4>
            <ul>
                <li>
                <span class="label">Organization</span>
                <span class="value">Vertex Construction Group</span>
                </li>
                <li>
                <span class="label">Sector</span>
                <span class="value">Commercial</span>
                </li>
                <li>
                <span class="label">Region</span>
                <span class="value">Denver, CO</span>
                </li>
            </ul>
            </div><!-- End Client Card -->

            <div class="capabilities-card" data-aos="fade-left" data-aos-delay="250">
            <h4>Capabilities Delivered</h4>
            <div class="capability-tags">
                <span class="cap-tag"><i class="bi bi-vector-pen"></i> Blueprint Design</span>
                <span class="cap-tag"><i class="bi bi-bricks"></i> Structural Work</span>
                <span class="cap-tag"><i class="bi bi-clipboard-check"></i> Site Supervision</span>
                <span class="cap-tag"><i class="bi bi-palette"></i> Interior Buildout</span>
                <span class="cap-tag"><i class="bi bi-tree"></i> Green Landscaping</span>
                <span class="cap-tag"><i class="bi bi-shield-check"></i> Compliance Review</span>
            </div>
            </div><!-- End Capabilities Card -->

            

        </div><!-- End Sticky Sidebar -->

        </div>

    </div>

    <div class="bottom-nav" data-aos="fade-up" data-aos-delay="200">
        <a href="project-details.html" class="btn-nav prev-btn">
        <i class="bi bi-chevron-left"></i>
        <div class="btn-text">
            <span class="btn-label">Previous</span>
            <span class="btn-title">Earlier Project</span>
        </div>
        </a>
        <a href="index.html#projects" class="btn-nav center-btn">
        <i class="bi bi-grid-3x3-gap"></i>
        <span>Browse All</span>
        </a>
        <a href="project-details.html" class="btn-nav next-btn">
        <div class="btn-text">
            <span class="btn-label">Next</span>
            <span class="btn-title">Upcoming Project</span>
        </div>
        <i class="bi bi-chevron-right"></i>
        </a>
    </div><!-- End Bottom Nav -->

    </div>

</section><!-- /Project Details Section -->

</main>

<?= $this->endSection(); ?>