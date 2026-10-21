<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($pageTitle) ?></title>
    <meta name="description" content="<?= esc($description) ?>">
    <meta name="keywords" content="<?= esc($keywords) ?>">

    <!-- Favicons -->
    <link href="<?= base_url('assets/img/favicon.png') ?>" rel="icon">
    <link href="<?= base_url('assets/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">
    
    <link rel="canonical" href="<?= service('settings')->get('App.baseURL') ?>">
    <meta name="robots" content="index, follow">
    <meta name="robots" content="noarchive">

  <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="<?= base_url('assets/css/main.css') ?>" rel="stylesheet">
</head>

<body class="d-flex h-100 text-center bg-light" style="background: linear-gradient(135deg, #1e1e24 0%, #37423b 100%);">

    <!-- Outer Flex Container to vertically center layout -->
    <div class="container d-flex w-100 h-100 p-3 mx-auto flex-column justify-content-between" style="max-width: 42rem;">

        <!-- Top Brand Header -->
        <header class="mb-auto py-3">
            <h4 class="text-light mb-0"><?= service('settings')->get('App.appName') ?></h4>
        </header>

        <!-- Main Content Workspace -->
        <main class="px-3 my-auto text-light">
            <!-- Animated Gear / Progress Placeholder Icon -->
            <div class="mb-4 d-inline-flex px-4 py-3 bg-warning-subtle text-warning rounded-circle border border-warning-subtle shadow-sm">
                <i class="bi bi-cone-striped m-0 fs-4"></i>
            </div>

            <h1 class="display-5 fw-bold text-light mb-2">Under Construction</h1>
            <p class="lead mb-4">Our website is currently undergoing maintenance and upgrades. We will be back online soon.</p>

        </main>

        <!-- Footer Meta Summary -->
        <footer class="mt-auto py-3 border-top border-light-subtle text-light">
            <p class="small mb-0">&copy; <span>Copyright</span> <?= date('Y') ?> <strong class="px-1 sitename"><?= service('settings')->get('App.appName') ?></strong> <span>All Rights Reserved.</span></p>
        </footer>

    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>