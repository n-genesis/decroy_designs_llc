<!-- Sidebar Navigation: Desktop (Sticky Left) & Mobile Drawer (Offcanvas Mobile Drawer with Fixed Independent Scrolling)-->
<nav class="offcanvas-lg offcanvas-start flex-shrink-0 d-flex flex-column border border-top-0 border-right" id="sidebarOffcanvas" style="width: 280px; height: 100%" aria-labelledby="sidebarOffcanvasLabel" tabindex="-1">
    <!-- Mobile Header Wrapper-->
    <div class="offcanvas-header d-lg-none p-3 border-bottom border-grey">
        <h5 class="offcanvas-title" id="sidebarOffcanvasLabel">Navigation</h5>
        <button class="btn-close btn-close-white" aria-label="Close" data-bs-target="#sidebarOffcanvas" data-bs-dismiss="offcanvas" type="button"></button>
    </div>
    <!-- Scrollable Offcanvas Body Component-->
    <div class="offcanvas-body d-flex flex-column flex-grow-1 p-3 overflow-y-auto">
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a class="nav-link <?= url_is('/admin/dashboard') ? 'active' : '' ?>" href="<?= site_url('admin/dashboard') ?>">
                    <i class="bi bi-columns-gap"></i>
                    Dashboard
                </a>
            </li>
            <hr class="text-secondary my-3" />
            <li class="text-mute mb-2">Website</li>
            <li>
                <a class="nav-link <?= url_is('/admin/pages*') ? 'active' : '' ?>" href="<?= site_url('admin/pages') ?>">
                    <i class="bi bi-file-text"></i>
                    General Page
                </a>
            </li>
            <li>
                <a class="nav-link <?= url_is('/admin/templates*') ? 'active' : '' ?>" href="<?= site_url('admin/templates') ?>">
                    <i class="bi bi-file-earmark-code"></i>
                    Templates Files
                </a>
            </li>
            <li>
                <a class="nav-link <?= url_is('/admin/projects*') || url_is('/admin/projectImages*')  ? 'active' : '' ?>" href="<?= site_url('admin/projects') ?>">
                    <i class="bi bi-file-earmark-post"></i>
                    Projects Articles
                </a>
            </li>
            <li>
                <a class="nav-link <?= url_is('/admin/uploaded_images*') ? 'active' : '' ?>" href="<?= site_url('admin/uploaded_images') ?>">
                    <i class="bi bi-file-earmark-image"></i>
                    Uploaded Images
                </a>
            </li>
            <hr class="text-secondary my-3" />
            <li class="text-mute mb-2">Admin</li>
            <li>
                <a class="nav-link <?= url_is('/admin/settings*') ? 'active' : '' ?>" href="<?= site_url('admin/settings') ?>">
                    <i class="bi bi-house-gear"></i>
                    Website Information
                </a>
            </li>
            <li>
                <a class="nav-link <?= url_is('/admin/users*') ? 'active' : '' ?>" href="<?= site_url('admin/users') ?>">
                    <i class="bi bi-people-fill"></i>
                    Users Managment
                </a>
            </li>
            <li>
                <a class="nav-link <?= url_is('/admin/service_plugins*') ? 'active' : '' ?>" href="<?= site_url('admin/service_plugins') ?>">
                    <i class="bi bi-box-seam"></i>
                    Social &amp; Service Settings
                </a>
            </li>
        </ul>
        <!-- Bottom User menu dropdown-->
        <div class="dropup mt-auto">
            <hr class="text-secondary my-3" />
            <a class="d-flex align-items-center text-decoration-none dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                <img class="rounded-circle me-2" height="32" width="32" alt="" src="<?= base_url('assets/img/user-icon.png') ?>" />
                <strong><?= auth()->user()->username ?></strong>
            </a>
            <ul class="dropdown-menu text-small shadow">
                <li><a class="dropdown-item" href="<?= site_url('admin/users/edit/' . auth()->user()->id) ?>">Account Settings</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="<?= base_url('admin/logout') ?>">Sign out</a></li>
            </ul>
        </div>
    </div>
</nav>