<?php

function enqueue_block_editor_styles() {
    wp_enqueue_style( 'legit-editor-styles', get_template_directory_uri() . '/css/editor-style.css', false, '1.0', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'enqueue_block_editor_styles' );
