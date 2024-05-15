
<div id="offcanvas-menu" class="offcanvas  fixed  pt-4 w-80 md:w-96 bg-white shadow-2xl right-0 top-0 h-full z-40 translate-x-80 md:translate-x-96 opacity-0 pointer-events-none transition-all duration-500 ease-out">
    <div class="flex justify-end p-6 pt-8">
        <div class="burger-menu-close">
            <span class="bg-black"></span>
            <span class="bg-black"></span>
            <span class="bg-black"></span>
        </div>
    </div>

    <?php wp_nav_menu(
        array(
            'menu'          => '7',
            'container_id'    => 'offcanvas ',
            'container_class' => 'mt-0 relative p-8 pt-2 bg-transparent block',
            'menu_class'      => 'menu accordion',
            'theme_location'  => 'offcanvas',
            'li_class'        => 'text-black  w-full font-bold uppercase text-lg font-display ',
            'fallback_cb'     => false,
        )
    );
    ?>


</div>