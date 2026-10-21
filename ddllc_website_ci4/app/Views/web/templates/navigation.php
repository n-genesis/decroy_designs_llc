<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xxl position-relative d-flex align-items-center justify-content-between">

        <a href="<?= site_url('') ?>" class="logo d-flex align-items-center me-auto">
            <span class="logo-icon d-flex align-items-center justify-content-center" style="width:48px; height: 48px;">
                <img src="<?= base_url('assets/img/ddllc-logo.webp')?>" class="img-fluid border rounded-3">
            </span>
            <h1 class="sitename"><?= service('settings')->get('App.appName') ?></h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="<?= site_url('') ?>" class="<?= url_is('/') ? 'active' : '' ?>">Home</a></li>
                <li><a href="<?= site_url('about') ?>" class="<?= url_is('/about') ? 'active' : '' ?>">About</a></li>
                <li><a href="<?= site_url('services') ?>" class="<?= url_is('/services') ? 'active' : '' ?>">Services</a></li>
                <li><a href="<?= site_url('projects') ?>" class="<?= url_is('/projects') ? 'active' : '' ?>">Projects</a></li>
                <?php if(!empty($pages)): ?>
                <li class="dropdown"><a href="#" class="toggle-dropdown"><span>Service Artices</span> 
                <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <!-- List of Pages -->
                         <?php foreach($pages as $page):?>
                        <li><a href="<?= site_url($page->slug) ?>"><?= esc($page->title) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <?php endif; ?>
                <li><a href="<?= site_url('contact') ?>" class="<?= url_is('/contact') ? 'active' : '' ?>">Contact</a></li>
                <li><a class="btn-quote d-block d-md-none mx-2 text-center" href="tel:+1<?= service('settings')->get('App.appPhone') ?>" class="<?= url_is('/consultation') ? 'active' : '' ?>">Give Me a Call</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <div class="header-actions d-none d-xl-flex align-items-center">
            <a class="action-link" href="tel:+1<?= service('settings')->get('App.appPhone') ?>"><i class="bi bi-telephone"></i><span><?= service('settings')->get('App.appPhone') ?></span></a>
        </div>

        <a class="btn-quote d-none d-sm-inline-flex" href="<?= site_url('consultation') ?>" class="<?= url_is('/consultation') ? 'active' : '' ?>">Get Estimate</a>

    </div>
</header>