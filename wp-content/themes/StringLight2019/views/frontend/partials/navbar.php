<div class="sticky-nav-container">
    <div class="navbar grid-x grid-container align-justify align-middle">
        <div class="logo cell small-4 medium-10 medium-offset-8">
            <a href="/">
                <!-- <img src="<?= get_field('large_logo', 'options'); ?>" alt="Stringlight Creative Logo"> -->
            </a>
        </div>
        <div class="menu-buttons cell small-16 medium-6">
            <div class="grid-x grid-container align-right align-middle">
                <div class="menu cell small-4">
                    <button class="hamburger hamburger--emphatic" type="button" aria-label="Menu" aria-controls="navigation">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                    <div class="overlay" id="overlay">
                        <?php wp_nav_menu(array(
                            'menu' => 'main-menu',
                            'container_class' => 'grid-x grid-container align-right',
                            'menu_class' => 'menu vertical cell small-20 medium-4 animated'
                        )); ?>
                        <!-- <div class="contact-button grid-x grid-container align-right">
                            <a href="#contact" class="btn cell small-4">Lets Talk</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
