    <footer>
        <div class="grid-container grid-x align-justify align-middle footer-container">
            <div class="small-22 medium-18 medium-offset-3 cell info-container">
                <div class="footer-grid grid-x grid-container align-middle align-center">
                    <div class="stringlight-icon small-18 medium-3 cell">
                        <img src="<?= get_field('site_icon', 'options'); ?>" alt="">
                    </div>
                    <div class="small-18 medium-10 medium-offset-1 cell contact-info">
                        <div class="phone">
                            <a href="tel:<?= get_field('phone_number', 'options'); ?>"><?= get_field('phone_number', 'options'); ?></a>
                        </div>
                        <div class="email">
                            <a href="mailto:<?= get_field('email', 'options'); ?>"><?= get_field('email', 'options'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cell small-18 small-offset-3 legal">
                &copy; <?php echo date('Y'); ?> Stringlight Creative LLC. All rights reserved.
            </div>
            <div class="cell small-18 small-offset-3">
                <?= stringlightGradient('large'); ?>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
  </body>
  <!-- <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
  <link rel="stylesheet" type="text/css" href="jquery.fancybox.min.css"> -->
</html>
