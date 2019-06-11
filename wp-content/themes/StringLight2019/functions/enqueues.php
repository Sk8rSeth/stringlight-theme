<?php

function js_globals(){

	return array(

		'urls' => array(
			'ajax' => admin_url('admin-ajax.php'),
			'theme' => get_template_directory_uri()
		)

	);

}

function enqueues(){

	$theme_dir = get_template_directory_uri();

	if(
		getenv("environment") == 'development' ||
		getenv("environment") == 'staging'
	){
		$js_file = '/assets/js/all.js';
		$css_file = '/assets/css/all.css';
	} else {
		$js_file = '/assets/js/all.min.js';
		$css_file = '/assets/css/all.min.css';
	}

	wp_register_script('app-js', $theme_dir . $js_file, filemtime( get_template_directory() . $js_file ), true);
		wp_enqueue_script('app-js');
		wp_localize_script('app-js', 'globals', js_globals());

	wp_register_style('app-css', $theme_dir . $css_file, filemtime( get_template_directory() . $css_file ), true);
		wp_enqueue_style('app-css');

}
add_action('wp_enqueue_scripts', 'enqueues');
