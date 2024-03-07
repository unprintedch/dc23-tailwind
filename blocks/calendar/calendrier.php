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

<section <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>">

    <div class="grid  ">
        <?php foreach ($calendar_items as $calendar_item) :
            $post_id = $calendar_item->ID;
            $calendar_item_class = "";
            // Assuming $post_id is defined and get_field function is available
            $date_start = get_field("date_start", $post_id); // European format: d/m/Y
            $date_end = get_field("date_end", $post_id); // European format: d/m/Y
            $today = new DateTime(); // Today's date as a DateTime object

            // Convert $date_start and $date_end from European format to DateTime objects
            $date_start_obj = DateTime::createFromFormat('d/m/Y', $date_start);
            $date_end_obj = DateTime::createFromFormat('d/m/Y', $date_end);

            if ($date_end) {
                if ($today > $date_end_obj) {
                    $calendar_item_class = "opacity-50 order-last";
                }
            } else {
                if ($today > $date_start_obj) {
                    $calendar_item_class = "opacity-50 order-last";
                }
            }
        ?>

            <?php if (get_field("lien_actif", $post_id)) : ?>
                <div class="p-2 border-b border-primary/10 bg-gray-100 relative  group <?php echo $calendar_item_class ?>">
                    <?php if (get_field("link", $post_id)) :
                        $link = get_field("link", $post_id);
                    ?>
                        <a href="<?php echo $link["url"] ?>" class="block w-full h-full absolute top-0 left-0 z-10 "></a>
                    <?php else : ?>
                        <a href="<?php echo get_the_permalink($post_id); ?>" class="block w-full h-full absolute top-0 left-0 z-10 "></a>
                    <?php endif; ?>
                    <i class="absolute bottom-2 right-2  fa-solid fa-circle-plus rotate-0 group-hover:rotate-180 transition-all text-primary"></i>
                <?php else : ?>
                    <div class="p-2 border-b border-primary/10 <?php echo $calendar_item_class ?>">
                    <?php endif; ?>


                    <div class="text-secondary font-display mb-1 text-sm flex gap-2 items-center font-bold">
                        <i class="fa-regular fa-calendar"></i>
                        <?php if (get_field("texte_date", $post_id)) : ?>
                            <?php echo the_field("texte_date", $post_id); ?>
                        <?php else : ?>
                            <?php if (get_field("date_end", $post_id) || get_field("date_end", $post_id)) : ?>
                                <?php echo the_field("date_start", $post_id); ?>
                                <?php if (get_field("date_end", $post_id)) : ?>
                                    – <?php echo the_field("date_end", $post_id); ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <h3 class="text-lg  mb-2 text-primary"><?php echo get_the_title($post_id); ?></h3>


                    </div>
                <?php endforeach; ?>
                </div>

</section>