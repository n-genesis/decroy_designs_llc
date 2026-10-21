<footer id="footer" class="footer">
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-about text-center text-md-start">
                <a href="index.html" class="logo d-flex justify-content-center justify-content-sm-start">
                    <span class="sitename fs-3"><?= service('settings')->get('App.appName') ?></span>
                </a>
                <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies
                    darta donna mare fermentum iaculis eu non diam phasellus.</p>
                <div class="social-links d-flex justify-content-center justify-content-sm-start mt-4">
                    <a href=""><i class="bi bi-twitter-x"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
                <p class="mt-3"><a href="<?= site_url('privacy') ?>" class="text-body-secondary">Privacy Policy</a> &bullet; <a href="<?= site_url('terms') ?>" class="text-body-secondary">Terms of Service</a></p>
            </div>

            <div class="col-lg-2 col-6 footer-links text-center text-md-start">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="<?= site_url('/') ?>">Home</a></li>
                    <li><a href="<?= site_url('about') ?>">About Us</a></li>
                    <li><a href="<?= site_url('services') ?>">Services</a></li>
                    <li><a href="<?= site_url('projects') ?>">Projects</a></li>
                    <li><a href="<?= site_url('contact') ?>">Contact</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-6 footer-links text-center text-md-start">
                <h4>Service Artices</h4>
                <ul>
                    <?= view_cell('PageLinksCell') ?>
                </ul>
            </div>

            <div class="col-lg-3 col-sm-12 footer-contact text-center text-md-start">
                <h4>Contact</h4>
                <p><strong>Address:</strong> <span><?= service('settings')->get('App.appAddress') ?></span></p>
                <p><strong>Phone:</strong> <span><?= service('settings')->get('App.appPhone') ?></span></p>
                <p><strong>Email:</strong> <span><a href="#"><?= service('settings')->get('App.appEmail') ?></a></span></p>
            </div>

        </div>
    </div>

</footer>
<section class="container-fluid copyright text-center bg-light border border-top py-4">
    <p class="mb-0">&copy; <span>Copyright</span> <?= date('Y') ?> <strong class="px-1 sitename"><?= service('settings')->get('App.appName') ?></strong> <span>All Rights Reserved.</span></p>
    <div class="credits">
        Developed by <a href="<?= service('settings')->get('App.appAuthWebsite') ?>" target="_blank"><?= service('settings')->get('App.appAuthor') ?></a>
    </div>
</section>