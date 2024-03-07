<?php
// Register blocks
add_action( 'init', 'dc23_acf_blocks' );
function dc23_acf_blocks() {
    $blocks_dir = get_template_directory() . '/blocks/';
    $blocks = scandir( $blocks_dir );

    foreach ($blocks as $block) {
        // Skip if it's not a directory or if it's a system directory (like . or ..)
        if ( ! is_dir( $blocks_dir . $block ) || in_array( $block, array( '.', '..' ) ) ) {
            continue;
        }

        // Register the block
        register_block_type( $blocks_dir . $block );
    }
}


// require_once( get_template_directory() . '/blocks/block-variation.php' );
// remove_theme_support( 'core-block-patterns' );
