<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to N-Gen Design</title>
    <meta name="description" content="N-Gen Design - Next Generation Web and Visual Solutions">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }
        .hero-section {
            background: linear-gradient(135deg, #0d6efd 0%, #002855 100%);
            color: white;
            padding: 100px 0;
        }
        .card-custom {
            border: none;
            border-radius: 12px;
            transition: transform 0.2s;
        }
        .card-custom:hover {
            transform: translateY(-5px);
        }
        .icon-box {
            width: 60px;
            height: 60px;
            background-color: #e7f1ff;
            color: #0d6efd;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="bi bi-cpu-fill me-2 text-primary"></i>N-Gen Design
            </a>
            <span class="navbar-text text-muted small d-none d-sm-inline">
                Powered by CodeIgniter <?= CodeIgniter\CodeIgniter::CI_VERSION ?>
            </span>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero-section text-center shadow-sm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <span class="badge bg-primary px-3 py-2 rounded-pill mb-3 fw-semibold text-uppercase">Modern Web Development</span>
                    <h1 class="display-4 fw-bold mb-3">Next-Generation Framework <br>Meets Cutting-Edge Design</h1>
                    <p class="lead text-white-50 mb-4">Your CodeIgniter 4 application developed by <strong>N-Gen Design</strong> is successfully configured and ready for development.</p>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <a href="https://codeigniter.com/user_guide/index.html" target="_blank" class="btn btn-light btn-lg px-4 gap-3 fw-bold text-primary">
                            <i class="bi bi-book-half me-2"></i>Read CI4 Docs
                        </a>
                        <a href="#get-started" class="btn btn-outline-light btn-lg px-4">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container my-5" id="get-started">
        <!-- Feature Cards -->
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card h-100 p-3 card-custom shadow-sm">
                    <div class="card-body">
                        <div class="icon-box">
                            <i class="bi bi-folder2-open"></i>
                        </div>
                        <h4 class="card-title fw-bold">Active Controller</h4>
                        <p class="card-text text-muted">This page is rendered by <code>app/Controllers/Home.php</code>.</p>
                        <p class="card-text text-muted small">To edit this layout, modify: <br><code>app/Views/welcome_message.php</code></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 p-3 card-custom shadow-sm">
                    <div class="card-body">
                        <div class="icon-box">
                            <i class="bi bi-palette"></i>
                        </div>
                        <h4 class="card-title fw-bold">N-Gen Architecture</h4>
                        <p class="card-text text-muted">Pre-integrated with <strong>Bootstrap 5</strong> and <strong>Bootstrap Icons</strong> for beautiful, rapid UI creation.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 p-3 card-custom shadow-sm">
                    <div class="card-body">
                        <div class="icon-box">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4 class="card-title fw-bold">Environment: <?= esc(ENVIRONMENT) ?></h4>
                        <p class="card-text text-muted">Your application is currently running in <strong><?= esc(ENVIRONMENT) ?></strong> mode.</p>
                        <p class="card-text text-muted small">Switch to <code>development</code> in your <code>.env</code> file to enable CI4 Debug Toolbar.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- System Debug / Diagnostics Footer (CI4 Standard) -->
        <footer class="text-center text-muted border-top pt-4 mt-5">
            <p class="small mb-1">Page rendered in {elapsed_time} seconds using {memory_usage} memory.</p>
            <p class="small">&copy; <?= date('Y') ?> <strong>N-Gen Design</strong>. All Rights Reserved.</p>
        </footer>
    </main>

    <!-- Bootstrap 5 Bundle with Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
