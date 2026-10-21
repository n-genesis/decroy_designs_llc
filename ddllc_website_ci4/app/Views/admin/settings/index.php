<!-- app/Views/admin/settings/index.php -->
 <?= $this->extend('admin/layouts/main') ?>

<?= $this->section('main_content') ?>

<!-- Page Header-->
<header class="pb-2 mb-3 border-bottom d-flex align-items-center justify-content-between">
    <h1 class="h3 mb-0"><?= esc($title) ?></h1>
</header>

<div class="card shadow-sm mb-3">

  <form method="post" action="<?= esc($action) ?>" class="needs-validation" novalidate>
    <?= csrf_field() ?>
    <?php if ($method !== 'POST'): ?>
        <input type="hidden" name="_method" value="<?= esc($method) ?>">
    <?php endif ?>

  <!-- Card Body / Form Area -->
  <div class="card-body p-4">
      <!-- Section 1: Basic Site Info -->
      <div class="mb-4">
        <h6 class="text-uppercase text-muted fw-bold mb-3 font-monospace small">Website Configuration</h6>
        
        <div class="row g-3">
          <!-- Website Name -->
          <div class="col-md-6">
            <label for="appName" class="form-label small fw-medium">Website Name</label>
            <input type="text" class="form-control" id="appName" name="appName" placeholder="e.g. Acme Corp" value="<?= old('appName', $info->appName); ?>" required>
          </div>
          
          <!-- Email Address -->
          <div class="col-md-6">
            <label for="appEmail" class="form-label small fw-medium">Contact Email</label>
            <input type="email" class="form-control" id="appEmail" name="appEmail" placeholder="info@company.com" value="<?= old('appEmail', $info->appEmail); ?>" required>
          </div>

          <!-- Website Title -->
          <div class="col-12">
            <label for="appTitle" class="form-label small fw-medium">SEO Title Tag</label>
            <input type="text" class="form-control" id="appTitle" name="appTitle" placeholder="Catchy title for browser tabs and search results" value="<?= old('appTitle', $info->appTitle); ?>">
          </div>

          <!-- Description -->
          <div class="col-12">
            <label for="appDesc" class="form-label small fw-medium">Meta Description</label>
            <textarea class="form-control" id="appDesc" name="appDesc" rows="3" placeholder="Brief summary of your website or business..."><?= old('appDesc', $info->appDesc); ?></textarea>
          </div>
        </div>
      </div>

      <!-- Section 2: Business Logistics -->
      <div>
        <h6 class="text-uppercase text-muted fw-bold mb-3 font-monospace small">Business Profile</h6>
        
        <div class="row g-3">

        <!-- Business Owner -->
          <div class="col-6">
            <label for="appOwner" class="form-label small fw-medium">Business Owner</label>
            <div class="input-group">
              <span class="input-group-text text-muted small">
                <!-- Simple Person icon -->
                <i class="bi bi-file-person m-0"></i>
              </span>
              <input type="text" class="form-control" id="appOwner" name="appOwner" placeholder="Dante Jenkins" value="<?= old('appOwner', $info->appOwner); ?>">
            </div>
          </div>

          <!-- Business Phone -->
          <div class="col-6">
            <label for="appPhone" class="form-label small fw-medium">Business Phone</label>
            <div class="input-group">
              <span class="input-group-text text-muted small">
                <!-- Simple Phone icon -->
                <i class="bi bi-phone m-0"></i>
              </span>
              <input type="text" class="form-control" id="appPhone" name="appPhone" placeholder="(555) 555-5555" value="<?= old('appPhone', $info->appPhone); ?>">
            </div>
          </div>

          <!-- Business Address -->
          <div class="col-12">
            <label for="appAddress" class="form-label small fw-medium">Physical Address</label>
            <textarea class="form-control" id="appAddress" name="appAddress" rows="3" placeholder="123 Main St, Suite 100, City, State, ZIP"><?= old('appAddress', $info->appAddress); ?></textarea>
          </div>

          <!-- Business Hours -->
          <div class="col-md-6 col-sm-12">
            <label for="appBusHours" class="form-label small fw-medium">Operating Hours</label>
            <div class="input-group">
              <span class="input-group-text text-muted small">
                <!-- Simple Clock icon -->
                <i class="bi bi-clock m-0"></i>
              </span>
              <input type="text" class="form-control" id="appBusHours" name="appBusHours" placeholder="Mon - Fri: 9:00 AM - 5:00 PM, Sat: Closed" value="<?= old('appBusHours', $info->appBusHours); ?>">
            </div>
          </div>

          <!-- Under Construction -->
          <div class="col-md-6 col-sm-12">
            <label for="underBtn" class="form-label small fw-medium">Show the website as "Under Construction".</label>
            <div class="d-flex align-items-center">
              <input type="checkbox" class="btn-check" name="appUnderConstruction" id="underBtn" autocomplete="off" <?= $info->appUnderConstruction ? 'checked' : '' ?>>
              <label class="btn btn-outline-info" for="underBtn">Show "Under Construction"</label>
            </div>
          </div>

        </div>
      </div>
  </div>

  <!-- Card Footer -->
  <footer class="card-footer d-flex justify-content-end gap-2 py-3">
    <button type="submit" class="btn btn-primary btn-sm px-4">Save Changes</button>
</footer>
  </form>

</div>


<?= $this->endSection() ?>