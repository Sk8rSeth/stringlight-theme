<?php get_header() ?>

<?php
$modules = get_field('modules');
if( is_array($modules) ) {
  $i = 0;
  foreach ($modules as $index => $module) {
    $module['index'] = $i;
    frontend_render($module['acf_fc_layout']);
    $i++;
  }
}
?>

<?php get_footer() ?>
