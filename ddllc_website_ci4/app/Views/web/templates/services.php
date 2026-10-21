<!-- app/Views/web/templates/service-details.php -->
<?= $this->extend('web/layouts/main'); ?>

<?= $this->section('main_content'); ?>

<main class="main">

<!-- Page Title -->
<div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0">Services</h1>
    <nav class="breadcrumbs">
        <ol>
        <li><a href="<?= site_url('') ?>">Home</a></li>
        <li class="current">Services</li>
        </ol>
    </nav>
    </div>
</div><!-- End Page Title -->

<!-- Service Details Section -->
<section id="service-details" class="service-details section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-5">

        <div class="col-lg-5">
        <div class="service-sidebar">

            <div class="service-overview" data-aos="fade-up" data-aos-delay="100">
            <div class="overview-header">
                <i class="bi bi-house-door-fill"></i>
                <h3>Service Overview</h3>
            </div>
            <div class="overview-content">
                <h2>Residential Building</h2>
                <p>We design and build premium residential properties that combine modern architecture with functional living spaces. From single-family homes to multi-unit developments, we deliver quality craftsmanship on every project.</p>
                <div class="cta-button">
                <a href="<?= site_url('consultation') ?>" class="btn-get-started">Request a Free Quote</a>
                </div>
            </div>
            </div>

            <div class="key-benefits" data-aos="fade-up" data-aos-delay="200">
            <h4>Key Benefits</h4>
            <ul>
                <li><i class="bi bi-check-circle-fill"></i> Custom home design tailored to your needs</li>
                <li><i class="bi bi-check-circle-fill"></i> Energy-efficient building practices</li>
                <li><i class="bi bi-check-circle-fill"></i> Premium materials and finishes</li>
                <li><i class="bi bi-check-circle-fill"></i> On-time and on-budget delivery</li>
                <li><i class="bi bi-check-circle-fill"></i> 10-year structural warranty</li>
            </ul>
            </div>

            <div class="contact-card" data-aos="fade-up" data-aos-delay="300">
            <div class="contact-header">
                <i class="bi bi-headset"></i>
                <h4>Need Assistance?</h4>
            </div>
            <div class="contact-info">
                <div class="info-row">
                <i class="bi bi-telephone"></i>
                <div>
                    <span>Call Us</span>
                    <p><?= service('settings')->get('App.appPhone') ?></p>
                </div>
                </div>
                <div class="info-row">
                <i class="bi bi-envelope"></i>
                <div>
                    <span>Email Us</span>
                    <p><a href="#"><?= service('settings')->get('App.appEmail') ?></a></p>
                </div>
                </div>
            </div>
            </div>

        </div>
        </div>

        <div class="col-lg-7">
        <div class="service-content">

            <div class="image-gallery" data-aos="zoom-in" data-aos-delay="100">
            <div class="service-details-slider swiper init-swiper">
                <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "speed": 800,
                    "autoplay": {
                    "delay": 5000
                    },
                    "slidesPerView": 1,
                    "effect": "fade",
                    "navigation": {
                    "nextEl": ".swiper-button-next",
                    "prevEl": ".swiper-button-prev"
                    },
                    "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                    }
                }
                </script>
                <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide">
                    <img src="<?= base_url('uploads/images/470565951_122099240522694170_3609748135653541248_n.jpg') ?>" alt="Residential Project" class="img-fluid" loading="lazy">
                </div>
                <div class="swiper-slide">
                    <img src="<?= base_url('uploads/images/470857540.jpg') ?>" alt="Residential Project" class="img-fluid" loading="lazy">
                </div>
                <div class="swiper-slide">
                    <img src="<?= base_url('uploads/images/showcase-3.webp') ?>" alt="Residential Project" class="img-fluid" loading="lazy">
                </div>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            </div>

            <div class="details-content" data-aos="fade-up" data-aos-delay="200">
            <div class="section-header">
                <h3>Building Your Dream Home</h3>
                <div class="divider"></div>
            </div>
            <p>
                Our residential building service covers every aspect of home construction, from initial concept and architectural design through to final handover. We work closely with homeowners and developers to create living spaces that are both beautiful and built to last.
            </p>
            <p>
                With over 25 years of experience in residential construction, our team understands the importance of quality materials, skilled craftsmanship, and attention to detail. Every home we build meets or exceeds local building codes and industry standards for structural integrity and energy efficiency.
            </p>
            </div>

            <div class="service-features" data-aos="fade-up" data-aos-delay="300">
            <div class="section-header">
                <h3>What We Offer</h3>
                <div class="divider"></div>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                <div class="feature-card">
                    <div class="icon-wrapper">
                    <i class="bi bi-pencil-square"></i>
                    </div>
                    <h4>Custom Home Design</h4>
                    <p>Tailored architectural plans that reflect your lifestyle, preferences, and budget requirements.</p>
                </div>
                </div>
                <div class="col-md-6">
                <div class="feature-card">
                    <div class="icon-wrapper">
                    <i class="bi bi-shield-check"></i>
                    </div>
                    <h4>Structural Engineering</h4>
                    <p>Robust structural solutions engineered for safety, durability, and compliance with all regulations.</p>
                </div>
                </div>
                <div class="col-md-6">
                <div class="feature-card">
                    <div class="icon-wrapper">
                    <i class="bi bi-lightning-charge"></i>
                    </div>
                    <h4>Energy Efficiency</h4>
                    <p>Smart insulation, solar-ready roofing, and high-performance windows to reduce energy costs.</p>
                </div>
                </div>
                <div class="col-md-6">
                <div class="feature-card">
                    <div class="icon-wrapper">
                    <i class="bi bi-palette"></i>
                    </div>
                    <h4>Interior Finishing</h4>
                    <p>Premium interior work including flooring, cabinetry, fixtures, and custom millwork.</p>
                </div>
                </div>
            </div>
            </div>

            <div class="implementation-steps" data-aos="fade-up" data-aos-delay="400">
            <div class="section-header">
                <h3>Our Process</h3>
                <div class="divider"></div>
            </div>
            <div class="step-container">
                <div class="step">
                <span class="step-number">01</span>
                <div class="step-content">
                    <h4>Consultation &amp; Planning</h4>
                    <p>We meet with you to understand your vision, assess the site, and establish project scope and budget.</p>
                </div>
                </div>
                <div class="step">
                <span class="step-number">02</span>
                <div class="step-content">
                    <h4>Design &amp; Permits</h4>
                    <p>Our architects create detailed plans and we handle all permit applications and regulatory approvals.</p>
                </div>
                </div>
                <div class="step">
                <span class="step-number">03</span>
                <div class="step-content">
                    <h4>Construction</h4>
                    <p>Foundation to finishing, our skilled crews build your home with precision and quality craftsmanship.</p>
                </div>
                </div>
                <div class="step">
                <span class="step-number">04</span>
                <div class="step-content">
                    <h4>Inspection &amp; Handover</h4>
                    <p>Thorough quality inspection, final walkthrough with you, and complete handover with warranty documentation.</p>
                </div>
                </div>
            </div>
            </div>

        </div>
        </div>

    </div>

    </div>

</section><!-- /Service Details Section -->

</main>

<?= $this->endSection(); ?>