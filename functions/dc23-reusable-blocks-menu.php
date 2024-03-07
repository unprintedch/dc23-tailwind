<?php
// Add custom menu in WP admin bar (back-office)
function blocks_to_admin($args, $post_type){
	if ( 'wp_block' !== $post_type ) {
		return $args;
	}
    if ($post_type == 'wp_block'){      
	     $block_args = array(
			'public'				=> true,
			'show_ui'				=> true,
			'exclude_from_search'	=> true,
			'query_var'				=> true,
			'show_in_rest'			=> true,
			'publicly_queryable'	=> true,
		);
    }
	return array_merge( $args, $block_args );
}
add_filter('register_post_type_args', 'blocks_to_admin', 10, 2);

function add_reusable_blocks_admin_menu() {
    add_menu_page( 'Reusable Blocks', 'Reusable Blocks', 'edit_posts', 'edit.php?post_type=wp_block', '', 'dashicons-editor-table', 22 );
}
add_action( 'admin_menu', 'add_reusable_blocks_admin_menu' );