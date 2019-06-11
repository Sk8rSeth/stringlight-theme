<div id="what-we-have-done" class="full-width-slider module">
    <?php if ($module['content_type'] == 'images'): ?>
        <div class="slider-container">
            <?php foreach ($module['images'] as $image): ?>
                <div class="reference-slide">
                    <!-- <a class="image-slide"  data-fancybox="image" data-src="<?= $image['image']; ?>" style="background-image: url('<?= $image['image']; ?>');"></a> -->
                    <div class="image-slide" style="background-image: url('<?= $image['image']; ?>');"></div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
