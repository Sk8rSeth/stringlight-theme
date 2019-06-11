<div class="content-block grid-x grid-container align-center module">
    <?php if (!empty($module['section_headline'])): ?>
        <h1 class="fancy cell small-22 medium-20"><?= $module['section_headline']; ?></h1>
    <?php endif; ?>
    <?php if (!empty($module['subheadline'])): ?>
        <p class="subheadline cell small-22 medium-14"><?= $module['subheadline']; ?></p>
    <?php endif; ?>
    <?php if (!empty($module['content_block'])): ?>
        <div class="content-section cell small-22 medium-18"><?= $module['content_block']; ?></div>
    <?php endif; ?>
    <div class="cell small-18">
        <?= stringlightGradient('small'); ?>
    </div>
</div>
