<?php

/**
 * Price Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'multitabs-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'multitabs';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview == 1 ) {
    $className .= ' is-admin';
}
?>
<div class="<?php echo esc_attr($className); ?>">
    <?php if ( have_rows( 'first_level_tabs_repeater' ) ) : ?>
        <div id="<?php echo esc_attr($id); ?>" class="flex overflow-x-scroll bg-white border-b tabs first-level border-b-black/10">
            <?php $i=1; while ( have_rows( 'first_level_tabs_repeater' ) ) : the_row(); ?>
                <?php
                    $first_level_tab_title = get_sub_field( 'first_level_tab_title' );
                    $svg_icon = get_sub_field( 'svg_icon' );
                ?>
                <li class="tabs-title <?php if($i === 1){ echo "is-active";} ?> list-none min-w-[150px] w-auto sm:w-[200px] grow basis-0 text-center last-of-type:mr-0 flex flex-col justify-center items-center p-3 sm:p-6 outline-none leading-6 text-sm h-full transition-all duration-300 cursor-pointer" tab_number="<?php echo $i; ?>">
                    <?php if($svg_icon){ echo $svg_icon; } ?>
                    <span><?php echo $first_level_tab_title; ?></span>
                </li>
            <?php $i++; endwhile; ?>
        </div>
    <?php endif; ?>

    <?php if ( have_rows( 'first_level_tabs_repeater' ) ) : ?>
        <div class="bg-transparent border-none tabs-content first-level" data-tabs-content="<?php echo esc_attr($id); ?>">
            <?php $j=1; while ( have_rows( 'first_level_tabs_repeater' ) ) : the_row(); ?>
                <div class="tabs-panel <?php if($j === 1){ echo "is-active";} ?>" id="panel<?php echo $j; ?>">


                    <?php if ( have_rows( 'second_level_tabs_repeater' ) ) : ?>
                        <div class="flex mb-0 overflow-x-scroll bg-white border-b tabs second-level border-b-black/10">
                            <?php $h=1; while ( have_rows( 'second_level_tabs_repeater' ) ) : the_row(); ?>
                                <?php $first_level_tab_title = get_sub_field( 'second_level_tab_title' ); ?>
                                <li class="tabs-title <?php if($h === 1){ echo "is-active";} ?> list-none grow basis-0 cursor-pointer block bg-transparent relative text-center outline-none px-3 sm:px-5 py-4 sm:py-5 leading-snug sm:text-base text-sm whitespace-nowrap transition-all duration-300" tab_number="<?php echo $j."-".$h; ?>">
                                    <?php echo $first_level_tab_title; ?>
                                </li>
                            <?php $h++; endwhile; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( have_rows( 'second_level_tabs_repeater' ) ) : ?>
                        <div class="bg-white border-none tabs-content second-level" data-tabs-content="tabs-<?php echo $j; ?>">
                            <?php $k=1; while ( have_rows( 'second_level_tabs_repeater' ) ) : the_row(); ?>
                                <div class="tabs-panel <?php if($k === 1){ echo "is-active";} ?> p-8 bg-transparent" id="panel<?php echo $j; ?>-<?php echo $k?>">
                                    <?php $types_choice = get_sub_field( 'types_choice' ); ?>
                                    <?php if($types_choice === "simple_content") : ?>
                                        <?php the_sub_field( 'content' ); ?>
                                    <?php elseif($types_choice === "repeater_content") : ?>
                                        <?php if ( have_rows( 'content_repeater' ) ) : ?>
                                            <div class="flex md:flex-row flex-col flex-wrap justify-center my-[3.75rem] mx-auto medium-up-4">
                                                <?php while ( have_rows( 'content_repeater' ) ) : the_row(); ?>
                                                    <div class="flex flex-col items-center justify-center p-4 mb-10 text-center border-b border-none sm:border-b-0 border-b-black/20 sm:border-r border-black/20 last:border-none sm:mb-0"><?php the_sub_field( 'bloc' ); ?></div>
                                                <?php endwhile; ?>
                                            </div>
                                            <?php if(get_sub_field( 'content_repeater_bottom' )) : ?>
                                                <div class="text-center additional-bottom-content"><?php the_sub_field( 'content_repeater_bottom' ); ?></div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            <?php $k++; endwhile; ?>
                        </div>
                    <?php endif; ?>


                </div>
            <?php $j++; endwhile; ?>
        </div>
    <?php endif; ?>
</div>