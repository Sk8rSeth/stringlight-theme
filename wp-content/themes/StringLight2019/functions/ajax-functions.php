<?php

/**
 *
 *	Load More Functionality
 *
 *	This function handles all load more actions across the site
 *
 *  Somewhat opinionated but can be styled or removed altogether
 *
 *	@uses frontend_render() This is the view that will be rendered for each loaded item
 *
 *	@return HTML returned the rendered items
 *
 **/
function load_more_items(){

	$args = $_POST['args'];
	$posts_per_page = (int) $args['posts_per_page'];
	$current_page = $_POST['current_page'];
	$template = $_POST['template'];
	$clearfix_count = (int) $_POST['clearfix_count'];
	$args['offset'] = $posts_per_page * $current_page;

	$items = new WP_Query($args);
	$return = array(
		'query'				=> $items,
		'args' 				=> $args,
		'success' 			=> false,
		'button_message'	=> 'No More Items to Load'
	);
	if($items->have_posts()) :
		$is = array();
		remove_action( 'before_frontend_render', 'display_filename', 30);
		$a = 0; while($items->have_posts()) : $items->the_post(); $a++;
			ob_start();
			frontend_render($template);
			$is[] = ob_get_clean();
		endwhile; wp_reset_query(); wp_reset_postdata();
		add_action( 'before_frontend_render', 'display_filename', 30, 0 );
		$return['success'] = true;
		$return['items'] = $is;
		$return['count'] = $a;
		$return['clearfix_count'] = $clearfix_count;
	endif;
	echo json_encode($return);
	die();
}
add_action('wp_ajax_load_more_items', 'load_more_items');
add_action('wp_ajax_nopriv_load_more_items', 'load_more_items');
