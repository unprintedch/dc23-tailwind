<?php
// Register a slider block.
add_action('acf/init', 'tm21_register_blocks');
function tm21_register_blocks(){

    // check function exists.
    if (function_exists('acf_register_block_type')) {
       
        acf_register_block_type(array(
            'name'              => 'multitabs',
            'title'             => __('Multi-tabs'),
            'description'       => __('Tabs within tabs'),
            'render_template'   => 'blocks/multitabs/multitabs.php',
			'category'          => 'formatting',
			'icon' 				=> 'table-row-after',
            'enqueue_assets' => function(){
                wp_enqueue_script( 'multitabs', get_template_directory_uri().'/blocks/multitabs/multitabs.js', array('jquery'), '', true );
            },
        ));


        acf_register_block_type(array(
            'name'              => 'accordions',
            'title'             => __('Accordions'),
            'description'       => __('Accordions'),
            'render_template'   => 'blocks/accordions/accordions.php',
			'category'          => 'formatting',
			'icon' 				=> 'image-flip-vertical',
            'supports'		    => [
                'align'			=> false,
                'anchor'		=> true,
                'customClassName'	=> true,
                'jsx' 			=> true,
            ]
        ));


        acf_register_block_type(array(
            'name'              => 'slider-wrapper',
            'title'             => __('Slider wrapper'),
            'description'       => __('Wrapper of slider. Contains slides'),
            'render_template'   => 'blocks/slider-wrapper.php',
			'category'          => 'formatting',
			'icon' 				=> 'format-gallery',
            'enqueue_assets' => function(){
                wp_enqueue_script( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '', false );
                wp_enqueue_style( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1', 'all' );
            },
            'supports'		    => [
                'align'             => false,
                'anchor'            => true,
                'customClassName'   => true,
                'jsx'               => true,
            ]
        ));

        acf_register_block_type(array(
            'name'              => 'slider-slide',
            'title'             => __('Slider slide'),
            'description'       => __('Single slide of slider'),
            'render_template'   => 'blocks/slider-slide.php',
			'category'          => 'formatting',
			'icon' 				=> 'format-image',
            'supports'		    => [
                'align'             => false,
                'anchor'            => true,
                'customClassName'   => true,
                'jsx'               => true,
            ]
        ));


    }
}
