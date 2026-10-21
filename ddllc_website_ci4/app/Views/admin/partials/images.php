<!-- app/Views/admin/partials/images.php -->
<?php if (!empty($images)): ?>
    <?php foreach ($images as $image): ?>
        <div class="col">
            <div class="selectable-box card h-100 shadow-sm position-relative overflow-hidden cursor-pointer" role="button" style="border-width: 2px;" data-id="<?= $image->id ?>" data-src="<?= base_url($image->image_path) ?>" data-name="<?= esc($image->file_name) ?>">
                <!-- Thumbnail -->
                <div class="bg-dark d-flex align-items-center justify-content-center" style="height: 120px; overflow: hidden;">
                    <img src="<?= base_url($image->image_path) ?>" alt="<?= esc($image->file_name) ?>"
                        class="w-100 h-100 object-fit-cover opacity-75 addSelectedBtn">
                </div>
                <!-- Meta Summary -->
                <div class="card-body p-2 bg-white">
                    <p class="card-text text-truncate small fw-semibold text-dark mb-0" title="<?= esc($image->file_name) ?>">
                        <?= esc($image->file_name) ?></p>
                    <span class="text-muted" style="font-size: 0.65rem;"><?= $image->file_size ?> • <?= $image->mime_type ?></span>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="no-data">No media assets found in database.</div>
<?php endif; ?>