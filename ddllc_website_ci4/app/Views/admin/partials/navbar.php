<!-- Header Navbar Light Theme-->
<header class="navbar navbar-expand-lg bg-light shadow-sm z-3" data-bs-theme="light">
    <div class="container-fluid">
        <!-- Mobile Sidebar Toggle Button-->
        <button class="btn btn-dark d-lg-none me-2" aria-controls="sidebarOffcanvas" data-bs-target="#sidebarOffcanvas" data-bs-toggle="offcanvas" type="button"><i class="bi bi-list fs-4"></i></button>
        <a class="navbar-brand d-flex align-items-center gap-2 me-auto me-lg-4" href="<?= site_url('admin/dashboard') ?>">
            <i class="bi bi-bootstrap-fill text-primary fs-4"></i>
            <span>N-GenCMS</span>
        </a>
        <!-- Navbar Toggler for Top Menu (Mobile)-->
        <button class="navbar-toggler" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navbarNav" data-bs-target="#navbarNav" data-bs-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
        <!-- Top Navbar Content-->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="<?= site_url('admin/dashboard') ?>">Home</a></li>
            </ul>
            <hr class="d-lg-none text-white-50" />
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Options
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="<?= site_url('') ?>" target="_blank">Back to Frontend</a></li>
                    <li><a class="dropdown-item" href="<?= site_url('admin/welcome') ?>">About App</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?= base_url('admin/logout') ?>">Sign out</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" id="theme-menu" href="#" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static" aria-label="Toggle theme">
                        <i class="bi bi-circle-half"></i>
                        <span class="d-lg-none ms-2">Toggle theme</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <button class="dropdown-item d-flex align-items-center" type="button" data-bs-theme-value="light" aria-pressed="false">
                                <i class="bi bi-sun-fill"></i>
                                <span class="ms-2">Light</span>
                            </button>
                        </li>
                        <li>
                            <button class="dropdown-item d-flex align-items-center" type="button" data-bs-theme-value="dark" aria-pressed="true">
                                <i class="bi bi-moon-stars-fill"></i>
                                <span class="ms-2">Dark</span>
                            </button>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</header>