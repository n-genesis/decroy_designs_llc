<!-- app/Views/web/templates/contact.php -->
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

<!-- Contact Section -->
<section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Get In Touch</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et
            dolore</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

            <div class="col-lg-4">
                <div class="info-cards">

                    <div class="info-card d-flex align-items-start gap-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div>
                            <h4>Address</h4>
                            <p><?= service('settings')->get('App.appAddress') ?></p>
                        </div>
                    </div><!-- End Info Card -->

                    <div class="info-card d-flex align-items-start gap-3" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <div>
                            <h4>Call Us</h4>
                            <p><b>Phone:</b> <?= service('settings')->get('App.appPhone') ?></p>
                        </div>
                    </div><!-- End Info Card -->

                    <div class="info-card d-flex align-items-start gap-3" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div>
                            <h4>Email Us</h4>
                            <p><a href="#"><?= service('settings')->get('App.appEmail') ?></a>
                            </p>
                        </div>
                    </div><!-- End Info Card -->

                    <div class="info-card d-flex align-items-start gap-3" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon-box">
                            <i class="bi bi-clock"></i>
                        </div>
                        <div>
                            <h4>Working Hours</h4>
                            <p><?= service('settings')->get('App.appBusHours') ?></p>
                        </div>
                    </div><!-- End Info Card -->

                </div>
            </div>

            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                <div class="contact-form-wrap">
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-success" role="status"><?= esc($error) ?></div>
                    <?php endif ?>
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger" role="alert">
                            <ul class="mb-0">
                                <?php foreach ($errors as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php endif ?>
                    <?php if(empty($success)): ?>
                    <form action="<?= site_url('contact') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <input type="text" name="fullName" class="form-control" placeholder="Your Name" value="<?= esc(old('fullName')) ?>"
                                    required autocomplete="name">
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?= esc(old('email')) ?>"
                                    required autocomplete="email">
                            </div>
                            <div class="col-md-6">
                                <input type="tel" name="phone" class="form-control" placeholder="Phone Number" value="<?= esc(old('phone')) ?>"
                                    autocomplete="tel">
                            </div>
                            <div class="col-md-6">
                                <select name="service" class="form-control" required>
                                    <option value="" disabled="">Select a Service</option>
                                    <option value="residential" <?= old('service') == 'residential' ? 'selected' : '' ?>>Residential Building</option>
                                    <option value="commercial" <?= old('service') == 'commercial' ? 'selected' : '' ?>>Commercial Projects</option>
                                    <option value="renovation" <?= old('service') == 'renovation' ? 'selected' : '' ?>>Renovation &amp; Remodeling</option>
                                    <option value="other" <?= old('service') == 'other' ? 'selected' : '' ?>>Other</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <input type="text" name="subject" class="form-control" placeholder="Subject" value="<?= esc(old('subject')) ?>"
                                    required>
                            </div>
                            <div class="col-12">
                                <textarea name="message" class="form-control" rows="5"
                                    placeholder="Describe your project requirements..." required><?= esc(old('message')) ?></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                    <?php elseif(!empty($success)): ?>
                        <div class="alert alert-success" role="status"><?= esc($success) ?></div>
                    <?php endif ?>
                </div>
            </div>

        </div>

    </div>

</section><!-- /Contact Section -->

</main>

<?= $this->endSection(); ?>