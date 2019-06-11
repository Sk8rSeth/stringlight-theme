<div id="who-we-are" class="team-members-block grid-x grid-container align-center module">
    <div class="members-container cell small-24 medium-20">
        <div class="grid-x collapse">
            <?php foreach ($module['team_member'] as $member): ?>
                <?php
                $hex = $member['member_background_color'];
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                ?>
                <div class="member small-22 medium-8" style="background: linear-gradient(to bottom, rgba(37,38,43, .5) 1%, rgba(37,38,43, 0) 60%),url('<?= $member['member_background_image']; ?>');">
                    <div class="grid-x align-center"style="background: linear-gradient(to bottom, rgba(<?= $r.','.$g.','.$b; ?>, .5) 1%, rgba(<?= $r.','.$g.','.$b; ?>, 0) 60%);">
                        <div class="member-image">
                            <img src="<?= $member['member_image']; ?>" alt="">
                        </div>
                        <div class="name cell medium-24"><?= $member['member_name']; ?></div>
                        <div class="roles cell medium-24"><?= $member['member_roles']; ?></div>
                        <div class="bio medium-17 cell"><?= $member['member_bio']; ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="cell small-18">
        <?= stringlightGradient('small'); ?>
    </div>
</div>
