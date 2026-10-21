<!-- app/Views/admin/layouts/main.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>N-GenCMS | Dashboard</title>
    <!-- favcon-->
    <link href="<?= base_url('favicon.ico') ?>" type="image/x-icon" rel="icon" />
    <!-- IgniterKit CSS-->
    <link rel="stylesheet" href="<?= base_url('assets/css/igniter-kit-theme.css') ?>" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet" />
    <!-- Rendered Styles -->
    <?= $this->renderSection('styles') ?>
</head>

<body class="d-flex flex-column vh-100">

    <!-- Page Header -->
    <?= $this->include('admin/partials/navbar') ?>

    <!-- Main Container Layout-->
    <div class="container-fluid flex-grow-1 d-flex p-0 overflow-hidden" id="main-container">
        <!-- Sidebar Navigation: Desktop (Sticky Left) & Mobile Drawer (Offcanvas Mobile Drawer with Fixed Independent Scrolling)-->
        <?= $this->include('admin/partials/offcanvas') ?>

        <!-- Main Content Area with Flex Box configuration-->
        <main class="flex-grow-1 pt-4 px-4 overflow-y-auto d-flex flex-column">

            <!-- Alert Messages Section -->
            <?php if (!empty($success)): ?>
                <div class="alert alert-success" role="status"><?= esc($success) ?></div>
            <?php endif ?>
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger" role="status"><?= esc($error) ?></div>
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

            <!-- Include content -->
            <?= $this->renderSection('main_content') ?>
            
            <!-- Sticky Footer Component-->
            <?= $this->include('admin/partials/footer') ?>
        </main>
    </div>
    <!-- Bootstrap 5 Bundle JS (Includes Popper)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Theme scripts-->
    <script src="<?= base_url('assets/js/admin-main.js') ?>"></script>

    <!-- Inlcude inline scritps -->
    <?= $this->renderSection('scripts') ?>
</body>

</html>