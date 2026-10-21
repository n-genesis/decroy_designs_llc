<!-- app/Views/web/templates/homepage.php -->
<?= $this->extend('web/layouts/main'); ?>

<?= $this->section('main_content'); ?>

<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div class="hero-bg">
            <img src="assets/img/hero-img.webp" alt="">
        </div>

        <div class="container position-relative">
            <div class="row">
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                    <span class="badge-label"><i class="bi bi-building"></i> Trusted Contractor Partner Since
                        2005</span>
                    <h1>Construction with <br /> experience &amp; <span class="accent">Integrity</span></h1>
                    <p class="lead">Voluptatem accusantium doloremque laudantium totam rem aperiam eaque ipsa quae ab
                        illo inventore veritatis et quasi architecto beatae vitae.</p>
                    <div class="hero-actions d-flex flex-wrap gap-3">
                        <a href="<?= site_url('projects') ?>" class="btn-main">Explore Our Projects</a>
                        <a href="<?= site_url('consultation') ?>" class="btn-outline d-none d-lg-block">Request a Quote <i class="bi bi-arrow-right"></i></a>
                        <a href="tel:+1<?= service('settings')->get('App.appPhone') ?>" class="call-to-action btn-outline bg-light d-lg-none">
                        <div class="action-row">
                        <div class="phone-block">
                            <div class="phone-icon">
                                <i class="bi bi-telephone-fill"></i>
                            </div>
                            <div class="phone-details">
                                <span class="phone-label">Tap To Call Me</span>
                                <span class="text-dark"><?= service('settings')->get('App.appPhone') ?></span>
                            </div>
                        </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row hero-counters" data-aos="fade-up" data-aos-delay="200">
                <div class="col-6 col-lg-3">
                    <div class="counter-item">
                        <h3><span data-purecounter-start="0" data-purecounter-end="20" data-purecounter-duration="1"
                                class="purecounter"></span>+</h3>
                        <p>Years Experience</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="counter-item">
                        <h3><span data-purecounter-start="0" data-purecounter-end="100" data-purecounter-duration="1"
                                class="purecounter"></span>+</h3>
                        <p>Projects Completed</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="counter-item">
                        <h3><span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="1"
                                class="purecounter"></span>+</h3>
                        <p>Team Experts</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="counter-item">
                        <h3><span data-purecounter-start="0" data-purecounter-end="2" data-purecounter-duration="1"
                                class="purecounter"></span></h3>
                        <p>Local Awards</p>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-5 align-items-center">

                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                    <div class="about-gallery">
                        <div class="gallery-main">
                            <img src="uploads/images/showcase-1.webp" alt="" class="img-fluid" loading="lazy">
                        </div>
                        <div class="gallery-secondary">
                            <img src="uploads/images/showcase-2.webp" alt="" class="img-fluid" loading="lazy">
                        </div>
                        <div class="experience-badge">
                            <span class="number">20+</span>
                            <span class="text">Years of<br>Experience</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                    <div class="about-content">
                        <span class="section-label"><i class="bi bi-building"></i> About DeCroy Design</span>
                        <h2>We Build With Passion, Purpose &amp; Integrity</h2>
                        <p class="lead">Since 2005, we have been delivering world-class construction services across
                            residential, commercial, and infrastructure sectors. Our commitment to quality craftsmanship
                            and client satisfaction drives everything we do.</p>

                        <div class="about-highlights">
                            <div class="row g-4">
                                <div class="col-sm-6">
                                    <div class="highlight-item">
                                        <div class="highlight-icon">
                                            <i class="bi bi-shield-check"></i>
                                        </div>
                                        <h4>Licensed &amp; Insured</h4>
                                        <p>Fully certified with comprehensive coverage for every project we undertake.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="highlight-item">
                                        <div class="highlight-icon">
                                            <i class="bi bi-clock-history"></i>
                                        </div>
                                        <h4>On-Time Delivery</h4>
                                        <p>Proven track record of completing projects within schedule and budget.</p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="highlight-item">
                                        <div class="highlight-icon">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <h4>Expert Workforce</h4>
                                        <p>Over 10 skilled professionals across all construction disciplines.</p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="highlight-item">
                                        <div class="highlight-icon">
                                            <i class="bi bi-trophy"></i>
                                        </div>
                                        <h4>Local Award</h4>
                                        <p>Recognized with 1+ local awards for quality and service.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="about-cta">
                            <a href="<?= site_url('consultation') ?>" class="btn-about">Start Your Project <i
                                    class="bi bi-arrow-right"></i></a>
                            <a href="<?= site_url('projects') ?>" class="btn-about-outline">View Our Work</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section><!-- /About Section -->

    <!-- Services Section -->
    <section id="services" class="services section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Our Services</h2>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium totam rem aperiam eaque ipsa quae ab illo inventore.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4 align-items-stretch">

                <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
                    <div class="services-image">
                        <img src="uploads/images/showcase-3.webp" alt="" class="img-fluid">
                        <div class="image-overlay">
                            <h3>We Deliver Excellence in Every Project</h3>
                            <a href="<?= site_url('consultation') ?>" class="overlay-link">Get a Free Consultation <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="row g-4">

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="bi bi-house-door"></i>
                                </div>
                                <div class="service-body">
                                    <h4>Residential Building</h4>
                                    <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet consectetur
                                        adipisci velit.</p>
                                </div>
                            </div>
                        </div><!-- End Service -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="bi bi-building"></i>
                                </div>
                                <div class="service-body">
                                    <h4>Commercial Projects</h4>
                                    <p>Ut enim ad minima veniam quis nostrum exercitationem ullam corporis suscipit
                                        laboriosam.</p>
                                </div>
                            </div>
                        </div><!-- End Service -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="bi bi-hammer"></i>
                                </div>
                                <div class="service-body">
                                    <h4>Renovation &amp; Remodeling</h4>
                                    <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil
                                        molestiae.</p>
                                </div>
                            </div>
                        </div><!-- End Service -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="bi bi-signpost-split"></i>
                                </div>
                                <div class="service-body">
                                    <h4>Road &amp; Infrastructure</h4>
                                    <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe
                                        eveniet.</p>
                                </div>
                            </div>
                        </div><!-- End Service -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="bi bi-clipboard-data"></i>
                                </div>
                                <div class="service-body">
                                    <h4>Project Management</h4>
                                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed
                                        quia.</p>
                                </div>
                            </div>
                        </div><!-- End Service -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="bi bi-rulers"></i>
                                </div>
                                <div class="service-body">
                                    <h4>Architecture &amp; Design</h4>
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                        praesentium.</p>
                                </div>
                            </div>
                        </div><!-- End Service -->

                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Services Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row align-items-center gy-5">

                <div class="col-lg-5" data-aos="fade-right" data-aos-delay="100">
                    <div class="stats-content">
                        <span class="label-tag">Our Track Record</span>
                        <h2>Numbers That Speak for Our Commitment</h2>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium totam rem aperiam eaque ipsa quae ab illo inventore.</p>
                        <a href="<?= site_url('projects') ?>" class="stats-link">View Our Projects <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200">
                    <div class="row g-4">

                        <div class="col-sm-6">
                            <div class="counter-card">
                                <div class="counter-icon">
                                    <i class="bi bi-buildings"></i>
                                </div>
                                <div class="counter-data">
                                    <h3><span data-purecounter-start="0" data-purecounter-end="100"
                                            data-purecounter-duration="1" class="purecounter"></span>+</h3>
                                    <p>Projects Delivered</p>
                                </div>
                            </div>
                        </div><!-- End Counter -->

                        <div class="col-sm-6">
                            <div class="counter-card">
                                <div class="counter-icon">
                                    <i class="bi bi-emoji-smile"></i>
                                </div>
                                <div class="counter-data">
                                    <h3><span data-purecounter-start="0" data-purecounter-end="50"
                                            data-purecounter-duration="1" class="purecounter"></span>+</h3>
                                    <p>Satisfied Clients</p>
                                </div>
                            </div>
                        </div><!-- End Counter -->

                        <div class="col-sm-6">
                            <div class="counter-card">
                                <div class="counter-icon">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="counter-data">
                                    <h3><span data-purecounter-start="0" data-purecounter-end="10"
                                            data-purecounter-duration="1" class="purecounter"></span>+</h3>
                                    <p>Skilled Workers</p>
                                </div>
                            </div>
                        </div><!-- End Counter -->

                        <div class="col-sm-6">
                            <div class="counter-card">
                                <div class="counter-icon">
                                    <i class="bi bi-award"></i>
                                </div>
                                <div class="counter-data">
                                    <h3><span data-purecounter-start="0" data-purecounter-end="2"
                                            data-purecounter-duration="1" class="purecounter"></span></h3>
                                    <p>Local Awards</p>
                                </div>
                            </div>
                        </div><!-- End Counter -->

                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Stats Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row align-items-center gy-5">

                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="150">
                    <div class="info-block">
                        <span class="tagline">Partner With Professionals</span>
                        <h2>Transform Your Vision Into Solid Reality</h2>
                        <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae. Donec
                            velit neque auctor sit amet aliquam vel.</p>

                        <div class="highlight-cards">
                            <div class="highlight-card" data-aos="zoom-in" data-aos-delay="200">
                                <div class="card-icon">
                                    <i class="bi bi-tools"></i>
                                </div>
                                <div class="card-body-content">
                                    <h5>Superior Workmanship</h5>
                                    <p>Uncompromising build quality at every stage</p>
                                </div>
                            </div><!-- End Highlight Card -->

                            <div class="highlight-card" data-aos="zoom-in" data-aos-delay="270">
                                <div class="card-icon">
                                    <i class="bi bi-shield-check"></i>
                                </div>
                                <div class="card-body-content">
                                    <h5>Guaranteed Safety</h5>
                                    <p>Strict compliance with all safety regulations</p>
                                </div>
                            </div><!-- End Highlight Card -->

                            <div class="highlight-card" data-aos="zoom-in" data-aos-delay="340">
                                <div class="card-icon">
                                    <i class="bi bi-graph-up-arrow"></i>
                                </div>
                                <div class="card-body-content">
                                    <h5>Budget Optimization</h5>
                                    <p>Transparent pricing with no hidden costs</p>
                                </div>
                            </div><!-- End Highlight Card -->
                        </div>

                        <div class="action-row" data-aos="fade-up" data-aos-delay="400">
                            <a href="consultation" class="btn-get-started">
                                <span>Request a Free Quote</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                            <div class="phone-block">
                                <div class="phone-icon">
                                    <i class="bi bi-telephone-fill"></i>
                                </div>
                                <div class="phone-details">
                                    <span class="phone-label">Speak with us in person</span>
                                    <a href="tel:+1<?= service('settings')->get('App.appPhone') ?>" class="phone-number"><?= service('settings')->get('App.appPhone') ?></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                    <div class="image-block">
                        <div class="main-image">
                            <img src="uploads/images/470184046.jpg" alt="Construction Site"
                                class="img-fluid">
                        </div>
                        <div class="counter-badge" data-aos="fade-down" data-aos-delay="350">
                            <div class="counter-inner">
                                <span class="counter-value">100+</span>
                                <span class="counter-text">Projects Delivered</span>
                            </div>
                        </div>
                        <div class="accent-badge" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-patch-check-fill"></i>
                            <span>Licensed &amp; Insured</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Call To Action Section -->

</main>

<?= $this->endSection(); ?>