<div class="sticky-nav-container">
    <div class="navbar grid-x grid-container align-justify align-middle">
        <div class="logo cell small-1">
            <a href="/">
                <?php include_svg('biohazard-light'); ?>
            </a>
        </div>
        <div class="menu-buttons cell small-6">
            <div class="grid-x grid-container align-justify align-middle">
                <div class="contact-button">
                    <a href="#contact" class="btn">Lets Talk</a>
                </div>
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
                            'menu_class' => 'menu vertical cell small-4 animated'
                        )); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
