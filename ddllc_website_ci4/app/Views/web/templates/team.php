<!-- app/Views/web/templates/team.php -->
<?= $this->extend('web/layouts/main'); ?>

<?= $this->section('main_content'); ?>

<main class="main">

<!-- Page Title -->
<div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0">Our Team</h1>
    <nav class="breadcrumbs">
        <ol>
        <li><a href="<?= site_url('') ?>">Home</a></li>
        <li class="current">Team</li>
        </ol>
    </nav>
    </div>
</div><!-- End Page Title -->

<!-- Team Section -->
<section id="team" class="team section">

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
                        <img src="assets/img/construction/team-2.webp" alt="" class="img-fluid" loading="lazy">
                        <div class="social-links">
                            <a href="#"><i class="bi bi-twitter-x"></i></a>
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>Robert Anderson</h4>
                        <span>Chief Executive Officer</span>
                    </div>
                </div>
            </div><!-- End Team Member -->

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="member-card">
                    <div class="member-img">
                        <img src="assets/img/construction/team-5.webp" alt="" class="img-fluid" loading="lazy">
                        <div class="social-links">
                            <a href="#"><i class="bi bi-twitter-x"></i></a>
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>Sarah Mitchell</h4>
                        <span>Lead Architect</span>
                    </div>
                </div>
            </div><!-- End Team Member -->

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="member-card">
                    <div class="member-img">
                        <img src="assets/img/construction/team-7.webp" alt="" class="img-fluid" loading="lazy">
                        <div class="social-links">
                            <a href="#"><i class="bi bi-twitter-x"></i></a>
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>David Thompson</h4>
                        <span>Project Manager</span>
                    </div>
                </div>
            </div><!-- End Team Member -->

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="member-card">
                    <div class="member-img">
                        <img src="assets/img/construction/team-9.webp" alt="" class="img-fluid" loading="lazy">
                        <div class="social-links">
                            <a href="#"><i class="bi bi-twitter-x"></i></a>
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>Emily Carter</h4>
                        <span>Site Supervisor</span>
                    </div>
                </div>
            </div><!-- End Team Member -->

        </div>

    </div>

</section><!-- /Team Section -->

</main>

<?= $this->endSection(); ?>