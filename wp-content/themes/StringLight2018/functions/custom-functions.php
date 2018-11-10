<?php

/**
*
* Admin Views
*
* @param string $name name of view to render
* @return HTML Return file located at /views/admin/$name.php
*
**/
function admin_render($name){

	if( is_admin() ) {
		$filename;
		$base_path = THEME_DIR . '/views/admin';
		$filename = $base_path . '/' . $name . '.php';
		do_action('before_admin_render');
		if( file_exists($filename) ) {
			do_action('before_admin_' . $name);
			include($filename);
			do_action('after_admin_' . $name);
		}
		do_action('after_admin_render');
	}

}

/**
*
* Frontend Views
*
* @param string $name name of view to render
* @return HTML Return file located at /views/frontend/$name.php
*
**/
function frontend_render($name){

	global $filename, $module;
	$base_path = THEME_DIR . '/views/frontend';
	$filename = $base_path . '/' . $name . '.php';
	do_action('before_frontend_render');
	if( file_exists($filename) ) {
		do_action('before_frontend_' . $name);
		include($filename);
		do_action('after_frontend_' . $name);
	}
	do_action('after_frontend_render');
}

/**
*
* Shows the filename of the view if WP_DEBUG is true
*
* @return HTML Returns the filename being displayed in an html comment
*
**/
function display_filename(){
	global $filename;
	if( WP_DEBUG == true ) echo '<!-- ' . $filename . ' -->';
}
add_action( 'before_admin_render', 'display_filename', 30, 0 );
add_action( 'before_frontend_render', 'display_filename', 30, 0 );

/**
*
* Includes SVG ready for responsive display
*
* @param string $svg name of svg to render - If $create_path is false this must be a full URL
* @param boolean $echo return or echo svg
* @param boolean $create_path create path to our svg folder or use path provided
* @return HTML svg tag wrapped in resposive html elements
*
**/
function include_svg($svg, $echo = true, $create_path = true){

	$theme_directory = THEME_DIR;
	$id = ! $create_path ? '' : $svg;
	if( $create_path ) {
		$svg = $theme_directory . '/assets/svgs/' . $svg . '.svg';
		if( ! file_exists($svg) ) return;
		$loadType = 'load';
	} else {
		$curl = getstatus($svg);
		if( $curl['status'] == 400 ) return;
		$svg = $curl['return'];
		$loadType = 'loadHTML';
	}
	$doc = new DOMDocument();
	$doc->$loadType($svg);
	$svg = $doc->getElementsByTagName('svg');
	foreach ($svg as $s) {
		$svgRatio = $s->getAttribute('viewBox');
		$svgRatio = explode( ' ', $svgRatio );
		unset( $svgRatio[0] ); unset( $svgRatio[1] );
	}
	$return = '<div class="svg" id="' . $id . '" aria-hidden="true"><canvas width="' . $svgRatio[2] . '" height="' . $svgRatio[3] . '"></canvas>' . $svg->item(0)->C14N() . '</div>';
	if( $echo ){
		echo $return;
	} else {
		return $return;
	}
}

function sort_by_specified_key($array, $key, $desc = false){

	usort($array, function($a,$b) use ($key){
		return $a[$key] > $b[$key];
	});

	if( $desc ) $array = array_reverse($array);

	return $array;
}
