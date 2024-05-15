<?php

/**
 * Text Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'sponsors-grid section-text';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// load all post form the calendrier category order by meta starting date
$calendar_items = get_posts(array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'category_name' => 'calendrier',
    'orderby' => 'meta_value',
    'meta_key' => 'date_start',
    'order' => 'ASC'
));



?>

<div <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">


    <?php
    $args = array(
        'posts_per_page' => 8,
        'post_type' => 'post',
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $query = new WP_Query($args); ?>
    <div class="flex justify-between px-6">
        <div>
            <h2 class="text-black mb-0">News</h2>
        </div>
        <div class="top-0 right-0 flex gap-4 items-center ">
            <!-- <div class="dc23-slick-prev text-black "><i class="fa-regular fa-arrow-left-long"></i></div> -->
            <div class="dc23-slick-next text-black  "><i class="fa-regular fa-arrow-right-long"></i></div>
        </div>
    </div>
    <div class="">
        <div class="flex slider-post gap-12">
            <?php
            if ($query->have_posts()) {

                while ($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_id();
            ?>
                    <div class="pt-4  w-1/2 px-4">
                        <?php if (has_post_thumbnail($post_id)) : ?>
                            <img src="<?php echo get_the_post_thumbnail_url($post_id, 'large') ?>" alt="<?php echo get_the_title() ?>" class="w-full max-h-[200px] object-cover border-2 border-black">
                        <?php endif; ?>
                        <h4 class="pb-2 pt-8 mb-0 uppercase" >
                            <a href="<?php echo get_permalink() ?> " class="no-underline">
                                <?php the_title(); ?>
                            </a>
                        </h4>
                        <div class="mb-2 font-display font-sm"> <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished" class="  "><?php echo get_the_date(); ?></time></div>
                        <p>
                            <?php the_excerpt(); ?>
                        </p>
                    </div>
            <?php }
                wp_reset_postdata();
            } else {
                echo 'No posts found';
            }
            ?>
        </div>
    </div>

</div>