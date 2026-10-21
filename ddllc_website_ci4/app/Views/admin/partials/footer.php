<footer class="footer mt-auto py-3 border-top mx-n4 mb-n4 px-4">
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center small gap-2">
        <span class="text-muted">
            &copy; <?= date('Y') ?>
            <a href="<?= service('settings')->get('App.appAuthWebsite') ?>" class="text-decoration-none" target="_blank"><?= service('settings')->get('App.appAuthor') ?></a> All Rights Reserved.
        </span>
        <!-- <div class="d-flex gap-3">
            <a class="text-decoration-none" href="#">Privacy Policy</a>
            <span class="mx-1">·</span>
            <a class="text-decoration-none" href="#">Terms of Service</a>
        </div> -->
    </div>
</footer>