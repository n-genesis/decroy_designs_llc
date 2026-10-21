<!-- app/Views/web/errors/html/error_404.php -->
<?= $this->extend('web/layouts/main') ?>

<!-- Mock standard variables required by your master layout shell -->
<?php 
    $title = 'Page Not Found'; 
?>

<?= $this->section('main_content') ?>

<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">404</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">404</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Error 404 Section -->
    <section id="error-404" class="error-404 section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center g-5">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
            <section class="container error-404-wrapper" style="padding: 4rem 2rem; text-align: center;">
                <div class="error-card">
                    <h1 style="font-size: 6rem; margin: 0; color: #e74c3c;">404</h1>
                    <h2>Oops! That Page Has Vanished.</h2>
                    <p style="max-width: 500px; margin: 1.5rem auto; color: #666; line-height: 1.6;">
                        <?php if (! empty($message) && $message !== '(null)'): ?>
                            <!-- This displays the custom message passed from your Controller -->
                            <?= esc($message) ?>
                        <?php else: ?>
                            The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
                        <?php endif; ?>
                    </p>
                </div>
            </section>
          </div><!-- End Error Visual -->

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="error-info">
              <span class="error-badge">Error 404</span>
              <h2>Oops! That Page Has Vanished.</h2>
              <p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
              <ul class="suggestions">
                <li><i class="bi bi-check-circle"></i> Verify the URL is typed correctly</li>
                <li><i class="bi bi-check-circle"></i> Return to the main page and navigate again</li>
                <li><i class="bi bi-check-circle"></i> Reach out to our support team for help</li>
              </ul>
              <div class="action-buttons">
                <a href="<?= site_url('') ?>" class="btn-home"><i class="bi bi-house-door"></i> Back to Home</a>
                <a href="contact" class="btn-support"><i class="bi bi-headset"></i> Get Assistance</a>
              </div>
            </div>
          </div><!-- End Error Info -->
        </div>

      </div>

    </section><!-- /Error 404 Section -->

  </main>




<?= $this->endSection() ?>
