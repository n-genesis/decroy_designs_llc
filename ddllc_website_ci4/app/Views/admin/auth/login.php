<!-- app/Views/admin/auth/login.php -->
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

<body class="vh-100">
  
<div class="card shadow-sm mx-auto" style="max-width: 400px; margin-top: 10% !important;">
  <!-- Card Header / Title -->
  <div class="card-header bg-white border-0 pt-4 pb-0 text-center">
    <h4 class="fw-bold text-dark mb-1">Account Sign In</h4>
    <p class="text-muted small mb-0">Enter your credentials to access the admin panel</p>
  </div>

  <!-- Card Body / Form Fields -->
  <div class="card-body p-4">
    <div class="bm-3">
      <?php if (session('error') !== null) : ?>
            <div class="alert alert-danger small" role="alert"><?= esc(session('error')) ?></div>
        <?php elseif (session('errors') !== null) : ?>
            <div class="alert alert-danger small" role="alert">
                <?php if (is_array(session('errors'))) : ?>
                    <?php foreach (session('errors') as $error) : ?>
                        <?= esc($error) ?>
                        <br>
                    <?php endforeach ?>
                <?php else : ?>
                    <?= esc(session('errors')) ?>
                <?php endif ?>
            </div>
        <?php endif ?>
    </div>
    <form id="loginForm" action="<?= url_to('login') ?>" method="post">
      <?= csrf_field() ?>
      <!-- Email Address Field -->
      <div class="mb-3">
        <label for="emailInput" class="form-label small fw-medium"><?= lang('Auth.email') ?></label>
        <input type="email" class="form-control" id="emailInput" placeholder="<?= lang('Auth.email') ?>" name="email" value="<?= old('email') ?>" required autocomplete="username">
      </div>

      <!-- Password Field -->
      <div class="mb-3">
        <div class="d-flex justify-content-between align-items-center mb-1">
          <label for="passwordInput" class="form-label small fw-medium mb-0"><?= lang('Auth.password') ?></label>
          <?php if (setting('Auth.allowMagicLinkLogins')) : ?>
          <a href="<?= url_to('magic-link') ?>" class="text-decoration-none small text-muted"><?= lang('Auth.forgotPassword') ?></a>
          <?php endif ?>
        </div>
        <input type="password" class="form-control" id="passwordInput" name="password" placeholder="<?= lang('Auth.password') ?>" required autocomplete="current-password">
      </div>

      <!-- Remember Me Switch / Checkbox -->
      <div class="mb-4 form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" name="remember" id="rememberMeCheck" <?php if (old('remember')): ?> checked<?php endif ?>>
        <label class="form-check-label small text-muted" for="rememberMeCheck"><?= lang('Auth.rememberMe') ?></label>
      </div>

      <!-- Submit Action Button -->
      <button type="submit" class="btn btn-primary w-100 py-2 fw-medium mb-2"><?= lang('Auth.login') ?></button>
    </form>
  </div>

  <!-- Card Footer / Bottom Meta -->
  <div class="card-footer bg-light border-0 py-3 text-center rounded-bottom">
    <span class="small text-muted">Control your website with the <a href="<?= service('settings')->get('App.appAuthWebsite') ?>" class="text-decoration-none" target="_blank">N-GenCMS</a></span>
  </div>
</div>

</body>

</html>