<?php
$style = '';

if (!empty($module['background_image'])) {
    $style = 'style="background-image: url('.$module["background_image"].');"';
}
?>
<div  id="contact" class="contact-form grid-x align-center module" <?= $style; ?>>
    <div class="small-18 medium-20 cell heading">
        <h2><?= $module['headline']; ?></h2>
    </div>
    <div class="small-18 medium-20 cell heading">
        <h3><?= $module['subheadline']; ?></h3>
    </div>
    <div class="cell small-24 medium-18">
        <?php gravity_form($module["form"], false, false, false, '', true); ?>
    </div>
</div>
