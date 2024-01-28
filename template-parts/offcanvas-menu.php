
<div id="offcanvas-menu" class="  offcanvas  fixed  pt-4 w-80 md:w-96 bg-white shadow-2xl right-0 top-0 h-full z-40 translate-x-80 md:translate-x-96 opacity-0 pointer-events-none transition-all duration-500 ease-out">
    <div class="flex justify-end  p-3">
        <div class="burger-menu-close">
            <span class="bg-primary"></span>
            <span class="bg-primary"></span>
            <span class="bg-primary"></span>
        </div>
    </div>

    <?php wp_nav_menu(
        array(
            'container_id'    => 'offcanvas ',
            'container_class' => 'mt-0 relative p-6 bg-transparent block lg:hidden',
            'menu_class'      => 'menu accordion',
            'theme_location'  => 'primary',
            'li_class'        => 'text-primary  w-full',
            'fallback_cb'     => false,
        )
    ); ?>

</div>