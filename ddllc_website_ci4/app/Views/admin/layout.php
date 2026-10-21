<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Page Admin') ?></title>
    <link href="<?= esc(base_url('vendors/bootstrap/css/bootstrap.min.css')) ?>" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= esc(site_url('admin/pages')) ?>">Page Admin</a>
            <a class="nav-link text-white" href="<?= esc(site_url('admin/dashboard')) ?>">Dashboard</a>
        </div>
    </nav>
    <main class="container py-4">
        <?= $this->renderSection('content') ?>
    </main>
</body>
</html>