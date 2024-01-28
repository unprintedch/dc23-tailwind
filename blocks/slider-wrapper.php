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
$id = 'slider-wrapper-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-slider-wrapper';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview == 1 ) {
    $className .= ' is-admin';
}
$slide_to_show = get_field( 'slide_to_show' );
    $slide_to_show_1024 = round($slide_to_show * (60/100));
$slide_to_scroll = get_field( 'slide_to_scroll' );
$autoplay = get_field( 'autoplay' );
$dots = get_field( 'dots' );
$arrows = get_field( 'arrows' );
$infinite = get_field( 'infinite' );
$speed = get_field( 'speed' );
$gutter = get_field( 'gutter' );
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> ">
    <InnerBlocks />
</div>
<?php if($gutter): ?>
    <style>
        #<?php echo esc_attr($id); ?> .slick-track {
            display: flex;
            gap: <?php echo $gutter; ?>rem;
        }
    </style>
<?php endif; ?>
<script type="application/javascript">
    document.addEventListener("DOMContentLoaded", () => {

        jQuery('#<?php echo $id; ?>').slick({
            dots: <?php if($dots){ echo "true"; }else{ echo "false";} ?>,
            arrows: <?php if($arrows){ echo "true"; }else{ echo "false";} ?>,
            infinite: <?php if($infinite){ echo "true"; }else{ echo "false";} ?>,
            autoplay: <?php if($autoplay){ echo "true"; }else{ echo "false";} ?>,
            autoplaySpeed: 4000,
            speed: <?php echo $speed; ?>,
            slidesToShow: <?php echo $slide_to_show; ?>,
            slidesToScroll: <?php echo $slide_to_scroll; ?>,
            nextArrow: '<i class="fa-regular fa-arrow-right slick-arrow-right"></i>',
            prevArrow: '<i class="fa-regular fa-arrow-left slick-arrow-left"></i>',
            slide: '.slide',
            lazyLoad: 'ondemand',
            responsive: [
                {
                breakpoint: 1024,
                settings: {
                    slidesToShow: <?php echo $slide_to_show_1024; ?>,
                    slidesToScroll: <?php echo $slide_to_show_1024; ?>,
                    infinite: true,
                    dots: true
                }
                },
                {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
                }
            ]
        });
    });
</script>