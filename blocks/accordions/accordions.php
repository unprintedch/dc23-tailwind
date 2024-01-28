<?php

/**
 * Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'accordion-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-accordion';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview == 1 ) {
    $className .= ' is-admin';
}

$accordion_title = get_field( 'accordion_title' );
$is_open = get_field( 'is_open' );
$accordion_subtitle = get_field( 'accordion_subtitle' );
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> tab mb-4">
    <input type="checkbox" id="tab-<?php echo $block['id']; ?>" <?php if($is_open){ echo "checked"; } ?>>
    <label class="flex flex-col tab-label" for="tab-<?php echo $block['id']; ?>">
        <span class="text-xl cursor-pointer title text-primary"><?php echo $accordion_title; ?></span>
        <?php if($accordion_subtitle) : ?>
            <span class="subtitle"><?php echo $accordion_subtitle; ?></span>
        <?php endif; ?>
    </label>
    <div class="tab-content">
        <InnerBlocks />
    </div>
</div>



<?php /*
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php if ( $accordion_title ) : ?>
        <ul class="accordion <?php echo "style-".$accordion_style ?>" data-accordion data-allow-all-closed="true" data-multi-expand="true" data-deep-link="true">
            <li class="accordion-item <?php if($is_open){ echo "is-active"; } ?>" data-accordion-item>

                <a href="#accordion<?php echo $block['id']; ?>" class="accordion-title">
                    <span class="title"><?php echo $accordion_title; ?></span>
                    <?php if($accordion_subtitle) : ?>
                        <span class="subtitle"><?php echo $accordion_subtitle; ?></span>
                    <?php endif; ?>
                </a>

                <div class="accordion-content" id="accordion<?php echo $block['id']; ?>" data-tab-content>
                    <InnerBlocks />
                </div>

            </li>
        </ul>
    <?php endif; ?>
</div>
*/?>