<?php
/*
|-------------------------------------------------
| Create Drag and Drop custom metabox
|-------------------------------------------------
*/

/**
 * Add a metabox in page
 */
add_action('add_meta_boxes', function(){
    add_meta_box('dragdrop-metabox', 'Özel Alan Seti', 'dragdrop_metabox_display_callback', 'post', 'normal', 'high');
});

/**
 * HTML Output of metabox
 */
function dragdrop_metabox_display_callback(){
	include __DIR__ . '/inc/metabox-content.php';
}

/**
 * Sctipt and style
 */
add_action('admin_enqueue_scripts', function($pagename){
	global $typenow;
	
	if(('post.php' == $pagename || 'post-new.php' == $pagename) && $typenow == 'post'){
		wp_enqueue_style('dragdrop-select2', '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css', [], null);
		wp_enqueue_style('dragdrop-style', get_template_directory_uri() . '/sort/css/style.css', [], null);
		
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('dragdrop-select2', '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js', [], null, true);
		wp_enqueue_script('dragdrop-script', get_template_directory_uri() . '/sort/js/scripts.js', [], null, true);
	}
});

/**
 * Fix the order of items
 */
function fixdragdrop_item_order($post_array){
	$makearray = [];
	foreach($post_array as $item_array){
		$key = $item_array['order'];
		$makearray[$key] = $item_array;
	}
	ksort($makearray, SORT_NUMERIC);
	return $makearray;
}// End of fixdragdrop_item_order

/**
 * Save the data
 */
add_action('save_post_post', function($post_id, $post){
	if($post->post_status != 'auto-draft' && $post->post_status != 'trash'){
		if(isset($_POST['ozel_alan_seti']) && !empty($_POST['ozel_alan_seti'])){
			$metavalue = fixdragdrop_item_order($_POST['ozel_alan_seti']);
			update_post_meta($post_id, 'ozel_alan_seti', $metavalue);
		}else{
			update_post_meta($post_id, 'ozel_alan_seti', []);
		}
	}
}, 15, 2);
