jQuery(document).ready(function($) {
    $('.slider-post').on('init', function(event, slick) {
        // When slider is initialized, hide the loader and show the slider
        $('.loader').addClass('hidden');
        $('.slider-post').removeClass('hidden');
    }).slick({
        // Slick options
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 3000,
        arrows: true,
        dots: false,
        //appendDots: '.dc23-slick-dot',
        prevArrow: '.dc23-slick-prev',
        nextArrow: '.dc23-slick-next',
        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
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
        // Add more options as needed
    });
});