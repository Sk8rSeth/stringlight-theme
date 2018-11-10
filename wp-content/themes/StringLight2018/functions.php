<?php

// Defines our global data variable for modules
global $data;

define( 'FUNC_DIR', dirname(__FILE__) . '/functions/');
define( 'THEME_DIR', dirname(__FILE__) );

include FUNC_DIR . 'custom-functions.php';
include FUNC_DIR . 'ajax-functions.php';
include FUNC_DIR . 'theme-enables.php';
include FUNC_DIR . 'enqueues.php';
include FUNC_DIR . 'nav-walker.php';
include FUNC_DIR . 'custom-post-types.php';
