<?php  

add_filter( 'get_block_type_variations', 'dc23_block_type_variations', 10, 2 );

function dc23_block_type_variations( $variations, $block_type ) {

	if ( 'core/cover' === $block_type->name ) {
		$variations[] = array(
			'name'       => 'dc23-cover-hero',
			'title'      => __( 'cover hero that moves', 'dc23' ),
			'isActive'   => array(
				'mediaPosition' 
			),
			'attributes' => array(
				'mediaPosition' => 'right'
			)
		);
	}

	return $variations;
}



register_block_style(
    'core/heading',
    array(
        'name'         => 'no-margin',
        'label'        => __( 'No margin' ),
    )
);
register_block_style(
    'core/paragraph',
    array(
        'name'         => 'no-margin',
        'label'        => __( 'No margin' ),
    )
);
register_block_style(
    'core/group',
    array(
        'name'         => 'full-height',
        'label'        => __( 'Full height' ),
    )
);
register_block_style(
    'core/group',
    array(
        'name'         => 'mini-padding',
        'label'        => __( 'Mini padding' ),
    )
);
register_block_style(
    'core/group',
    array(
        'name'         => 'no-padding',
        'label'        => __( 'No padding' ),
    )
);
register_block_style(
    'core/columns',
    array(
        'name'         => 'no-margin',
        'label'        => __( 'No margin' ),
    )
);
register_block_style(
    'core/columns',
    array(
        'name'         => 'gapless',
        'label'        => __( 'Gapless' ),
    )
);
register_block_style(
    'core/button',
    array(
        'name'      => 'medium',
        'label'     => __( 'Medium' ),
    )
);
register_block_style(
    'core/button',
    array(
        'name'      => 'small',
        'label'     => __( 'Small' ),
    )
);
register_block_style(
    'core/button',
    array(
        'name'      => 'no-margin',
        'label'     => __( 'No margin' ),
    )
);
register_block_style(
    'core/button',
    array(
        'name'      => 'fat',
        'label'     => __( 'CTA big' ),
    )
);
register_block_style(
    'core/separator',
    array(
        'name'      => 'thick-line',
        'label'     => __( 'Thick line' ),
    )
);
register_block_style(
    'core/list',
    array(
        'name'         => 'list-arrow',
        'label'        => __( 'List Arrow' ),
    )
);
register_block_style(
    'core/list',
    array(
        'name'         => 'list-check',
        'label'        => __( 'List Check' ),
    )
);