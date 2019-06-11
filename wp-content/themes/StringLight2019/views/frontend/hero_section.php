<?php if ($module['image_or_video'] == 'image') {
    frontend_render('partials/hero-image', $module);
} else {
    frontend_render('partials/hero-video', $module);
}?>
<?= stringlightGradient(); ?>
<?php //if (is_home()): ?>
    <div id="what-we-do" class="home-hero hero-logo-section grid-x grid-container align-middle align-center">
        <div class="hero-logo cell small-22 medium-10">
            <img src="<?= get_field('large_logo', 'options'); ?>" alt="">
        </div>
    </div>
<?php //else; ?>
<?php //endif; ?>
