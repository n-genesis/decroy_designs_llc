<!-- app/Views/web/templates/about.php -->
<?= $this->extend('web/layouts/main'); ?>

<?= $this->section('main_content'); ?>

<main class="main">

<!-- Page Title -->
<div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0">About Us</h1>
    <nav class="breadcrumbs">
        <ol>
        <li><a href="<?= site_url('') ?>">Home</a></li>
        <li class="current">About Us</li>
        </ol>
    </nav>
    </div>
</div><!-- End Page Title -->

<!-- Process Section -->
<section id="process" class="process section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>About us</h2>
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam
            rem</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="process-step">
                    <div class="step-number">01</div>
                    <div class="step-icon">
                        <i class="bi bi-chat-dots"></i>
                    </div>
                    <h3>Consultation</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut
                        labore.</p>
                </div>
            </div><!-- End Step -->

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="process-step">
                    <div class="step-number">02</div>
                    <div class="step-icon">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <h3>Planning &amp; Design</h3>
                    <p>Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo.</p>
                </div>
            </div><!-- End Step -->

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="process-step">
                    <div class="step-number">03</div>
                    <div class="step-icon">
                        <i class="bi bi-gear"></i>
                    </div>
                    <h3>Construction</h3>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla.
                    </p>
                </div>
            </div><!-- End Step -->

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="process-step">
                    <div class="step-number">04</div>
                    <div class="step-icon">
                        <i class="bi bi-key"></i>
                    </div>
                    <h3>Project Handover</h3>
                    <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit
                        anim.</p>
                </div>
            </div><!-- End Step -->

        </div>

    </div>

</section><!-- /Process Section -->

<!-- Team Section -->
<section id="team" class="team section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Our Team</h2>
        <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="member-card">
                    <div class="member-img">
                        <img src="<?= base_url('uploads/images/470477198.jpg') ?>" alt="" class="img-fluid" loading="lazy">
                        <div class="social-links">
                            <a href="#"><i class="bi bi-twitter-x"></i></a>
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>Mark A. DeCroy Jr.</h4>
                        <span>Owner/ Operator</span>
                    </div>
                </div>
            </div><!-- End Team Member -->

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="member-card">
                    <div class="member-img">
                        <img src="<?= base_url('uploads/images/470477198.jpg') ?>" alt="" class="img-fluid" loading="lazy">
                        <div class="social-links">
                            <a href="#"><i class="bi bi-twitter-x"></i></a>
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>Mark A. DeCroy Jr.</h4>
                        <span>Lead Architect</span>
                    </div>
                </div>
            </div><!-- End Team Member -->

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="member-card">
                    <div class="member-img">
                        <img src="<?= base_url('uploads/images/470477198.jpg') ?>" alt="" class="img-fluid" loading="lazy">
                        <div class="social-links">
                            <a href="#"><i class="bi bi-twitter-x"></i></a>
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>Mark A. DeCroy Jr.</h4>
                        <span>Project Manager</span>
                    </div>
                </div>
            </div><!-- End Team Member -->

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="member-card">
                    <div class="member-img">
                        <img src="<?= base_url('uploads/images/470477198.jpg') ?>" alt="" class="img-fluid" loading="lazy">
                        <div class="social-links">
                            <a href="#"><i class="bi bi-twitter-x"></i></a>
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>Mark A. DeCroy Jr.</h4>
                        <span>Site Supervisor</span>
                    </div>
                </div>
            </div><!-- End Team Member -->

        </div>

    </div>

</section><!-- /Team Section -->

<!-- Faq Section -->
<section id="faq" class="faq section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Frequently Asked Questions</h2>
        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="faq-item" data-aos="fade-up" data-aos-delay="100">
                    <h3>What types of construction projects do you handle?</h3>
                    <div class="faq-content">
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                            architecto beatae vitae dicta sunt explicabo. We specialize in residential, commercial,
                            and infrastructure projects of all scales.</p>
                    </div>
                    <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End FAQ Item -->

                <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                    <h3>How long does a typical construction project take?</h3>
                    <div class="faq-content">
                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                            consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Project timelines
                            vary based on scope, ranging from a few months for renovations to over a year for large
                            commercial builds.</p>
                    </div>
                    <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End FAQ Item -->

                <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                    <h3>Do you provide free project estimates?</h3>
                    <div class="faq-content">
                        <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
                            nisi ut aliquid ex ea commodi consequatur. We offer complimentary initial consultations
                            and detailed project estimates for all prospective clients.</p>
                    </div>
                    <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End FAQ Item -->

                <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                    <h3>Are you licensed and insured?</h3>
                    <div class="faq-content">
                        <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae
                            consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur. All our
                            operations are fully licensed, bonded, and insured to protect our clients.</p>
                    </div>
                    <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End FAQ Item -->

                <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
                    <h3>What warranty do you offer on completed work?</h3>
                    <div class="faq-content">
                        <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet
                            ut et voluptates repudiandae sint et molestiae non recusandae. We provide comprehensive
                            warranties on all workmanship and materials used in every project.</p>
                    </div>
                    <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End FAQ Item -->

            </div>
        </div>

    </div>

</section><!-- /Faq Section -->

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Client Testimonials</h2>
        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia consequuntur</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="testimonials-slider swiper init-swiper">
            <script type="application/json" class="swiper-config">
        {
            "loop": true,
            "speed": 600,
            "autoplay": {
            "delay": 5000
            },
            "slidesPerView": 1,
            "spaceBetween": 24,
            "breakpoints": {
            "768": {
                "slidesPerView": 2
            },
            "1200": {
                "slidesPerView": 3
            }
            },
            "pagination": {
            "el": ".swiper-pagination",
            "type": "bullets",
            "clickable": true
            }
        }
        </script>
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p>"Praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi
                            sint occaecati cupiditate non provident, similique sunt in culpa qui officia."</p>
                        <div class="client-info d-flex align-items-center gap-16">
                            <img src="assets/img/person/person-m-3.webp" alt="" class="img-fluid">
                            <div>
                                <h4>James Harrison</h4>
                                <span>Property Developer</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Testimonial -->

                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p>"Nam libero tempore cum soluta nobis est eligendi optio cumque nihil impedit quo minus id
                            quod maxime placeat facere possimus, omnis voluptas assumenda."</p>
                        <div class="client-info d-flex align-items-center gap-16">
                            <img src="assets/img/person/person-f-7.webp" alt="" class="img-fluid">
                            <div>
                                <h4>Rebecca Collins</h4>
                                <span>Homeowner</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Testimonial -->

                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>
                        <p>"Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus
                            maiores alias consequatur aut perferendis doloribus asperiores repellat."</p>
                        <div class="client-info d-flex align-items-center gap-16">
                            <img src="assets/img/person/person-m-9.webp" alt="" class="img-fluid">
                            <div>
                                <h4>Michael Torres</h4>
                                <span>Business Owner</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Testimonial -->

                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p>"Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe
                            eveniet ut et voluptates repudiandae sint et molestiae non recusandae."</p>
                        <div class="client-info d-flex align-items-center gap-16">
                            <img src="assets/img/person/person-f-12.webp" alt="" class="img-fluid">
                            <div>
                                <h4>Olivia Nguyen</h4>
                                <span>Real Estate Agent</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Testimonial -->

            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>

</section><!-- /Testimonials Section -->

</main>

<?= $this->endSection(); ?>