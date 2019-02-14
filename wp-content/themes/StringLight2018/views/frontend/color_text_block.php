<?php if ($module['color_side'] == 'right') : ?>

    <div class="grid-x grid-container module color-block color-block--right">
        <div class="cell small-22 medium-12 medium-offset-4">
            <h2><?= $module['headline']; ?></h2>
        </div>
        <div class="cell small-22 medium-18 medium-offset-2">
            <?= $module['content']; ?>
        </div>
    </div>

<?php else : ?>

    <div class="grid-x grid-container module color-block color-block--left">
        <div class="cell small-22 medium-8 medium-offset-14">
            <h2><?= $module['headline']; ?></h2>
        </div>
        <div class="cell small-22 medium-16 medium-offset-8">
            <?= $module['content']; ?>
        </div>
    </div>

<?php endif; ?>
