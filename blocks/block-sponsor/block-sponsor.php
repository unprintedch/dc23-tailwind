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
$sponsors = get_field("sponsor", "option");



?>

<section <?php echo esc_attr($anchor); ?> class="">

    <div class="grid grid-cols-2 md:grid-cols-4  gap-6">
        <?php foreach ($sponsors as $sponsor) :
            $url = $sponsor['url'];
            $image_id = $sponsor['logo']; // Replace with your actual image ID
            $name = $sponsor['name']; // Replace with your actual image ID
            
            $size = 'medium'; // You can use 'thumbnail', 'medium', 'large', or any custom size defined
            $attr = array(
                'class' => 'max-h-12 w-auto' , // Add your custom classes here
                'alt'   => $name,
            );
            $image_tag = wp_get_attachment_image($image_id, $size,"" ,$attr);
            // Outputs the image HTML tag
        ?>

            <div class="p-2  group flex items-center justify-center">
                <a href="<?php echo $url?>">
                    <?php echo $image_tag; ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

</section>