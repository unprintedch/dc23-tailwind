// Navigation toggle
window.addEventListener('load', function () {

    // VARS LIST
    const burgerIcon = document.querySelector(".burger-menu");
    const burgerIconClose = document.querySelector(".burger-menu-close");
    //const burgerIconMobile = document.querySelector(".burger-menu-mobile");
    const overlayOffcanvas = document.querySelector(".overlay");
    const dropdownMenuHasChildren = document.querySelectorAll("li.menu-item.menu-item-has-children");
    const offcanvasMenu = document.getElementById("offcanvas-menu");
    const body = document.querySelector("body");


    let scrollpos = window.scrollY;
    const header = document.querySelector("header");
    const header_height = header.offsetHeight;

    window.addEventListener('scroll', function() { 
    scrollpos = window.scrollY;
        if (scrollpos >= header_height) {
            header.classList.add("scrolled");
        }else {
            header.classList.remove("scrolled");
        }
    })
    if (scrollpos >= header_height) {
        header.classList.add("scrolled");
    }else {
        header.classList.remove("scrolled");
    }

    // Trigger the search when press Enter – Offcanvas_search
    // if(buttonSubmitFacet){
    //     document.addEventListener("keyup", function(event) {
    //         if (event.code === "Enter") {
    //             console.log("Enter is pressed");
    //             // FWP.parse_facets();
    //             // FWP.set_hash();
    //             console.log(buttonSubmitFacet);
    //             buttonSubmitFacet.click();
    //             // $( ".fwp-submit" ).trigger( "click" );
    //         }
    //     });
    // }

    Array.from(dropdownMenuHasChildren).forEach(element => {

        var dropdownArrow = document.createElement('div');
        dropdownArrow.className = 'dropdown-arrow';
        element.appendChild(dropdownArrow);

        dropdownArrow.addEventListener('click', () => {
            if( element.classList.contains("open") ){
                element.classList.remove("open");    
            }else{
                element.classList.add("open");
            }
        });
    });





    // burger icon stuff
    if (burgerIcon) {
        burgerIcon.addEventListener("click", function () {
            burgerIcon.classList.toggle("close-mode");
            burgerIconClose.classList.toggle("close-mode");
            offcanvasMenu.classList.toggle("open");
            overlayOffcanvas.classList.toggle("open");
            body.classList.toggle("overflow-hidden");
            offcanvasMenu.classList.toggle("overflow-y-scroll");
        });
    }
    if (burgerIconClose) {
        burgerIconClose.addEventListener("click", function () {
            burgerIcon.classList.toggle("close-mode");
            burgerIconClose.classList.toggle("close-mode");
            offcanvasMenu.classList.toggle("open");
            overlayOffcanvas.classList.toggle("open");
            body.classList.toggle("overflow-hidden");
            offcanvasMenu.classList.toggle("overflow-y-scroll");
        });
    }



    // Close offcanvas pressing Escape
    document.addEventListener("keyup", function(event) {
        if (event.code === "Escape") {
            if (offcanvasMenu.classList.contains("open")){
                offcanvasMenu.classList.remove("open");
                overlayOffcanvas.classList.remove("open");
                body.classList.remove("overflow-hidden");
            }
        }
    });



    // Close Search-offcanvas clicking Close button
    // if(iconCloseOffcanvas){
    //     iconCloseOffcanvas.addEventListener("click", function () {
    //         if (offcanvasMenu.classList.contains("open")){
    //             offcanvasMenu.classList.remove("open");
    //         }
    //     });
    // }



    // Close Search-offcanvas clicking overlay
    if(overlayOffcanvas){
        overlayOffcanvas.addEventListener("click", function () {
            if (overlayOffcanvas.classList.contains("open") && offcanvasMenu.classList.contains("open")){
                offcanvasMenu.classList.remove("open");
                overlayOffcanvas.classList.remove("open");
                body.classList.remove("overflow-hidden");
            }
        });
    }

});



/* Transform Gallery images into lightbox */
jQuery(document).ready(function($) {
	// global variables for script
	var current, size;
	$('.wp-block-gallery a').click(function(e) {
		// prevent default click event
		e.preventDefault();
		// get href from clicked element
		var image_href = $(this).attr("href");
		// console.log(image_href);
		// determine the index of clicked trigger
		var slideNum = $('.wp-block-gallery a').index(this);
		// console.log(slideNum);

		// find out if #wrapper_lightbox exists
		if ($('#wrapper_lightbox').length > 0) {
			// if it does
			$('#wrapper_lightbox').fadeIn(300);
			// otherwise
		} else {
			// create HTML markup for lightbox window
			var lightbox =
				'<div id="wrapper_lightbox">' +
                '<svg xmlns="http://www.w3.org/2000/svg" width="2rem" class="icon-close" viewBox="0 0 384 512"><path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/></svg>' +
				'<ul id="lightbox_slider"></ul>' +
                '<svg xmlns="http://www.w3.org/2000/svg" width="2.5rem" viewBox="0 0 448 512" class="prev slider-nav"><path d="M7.4 273.4C2.7 268.8 0 262.6 0 256s2.7-12.8 7.4-17.4l176-168c9.6-9.2 24.8-8.8 33.9 .8s8.8 24.8-.8 33.9L83.9 232 424 232c13.3 0 24 10.7 24 24s-10.7 24-24 24L83.9 280 216.6 406.6c9.6 9.2 9.9 24.3 .8 33.9s-24.3 9.9-33.9 .8l-176-168z"/></svg>' +
                '<svg xmlns="http://www.w3.org/2000/svg" width="2.5rem" viewBox="0 0 448 512" class="next slider-nav"><path d="M440.6 273.4c4.7-4.5 7.4-10.8 7.4-17.4s-2.7-12.8-7.4-17.4l-176-168c-9.6-9.2-24.8-8.8-33.9 .8s-8.8 24.8 .8 33.9L364.1 232 24 232c-13.3 0-24 10.7-24 24s10.7 24 24 24l340.1 0L231.4 406.6c-9.6 9.2-9.9 24.3-.8 33.9s24.3 9.9 33.9 .8l176-168z"/></svg>' +
				'</div><!-- #wrapper_lightbox -->';
			// add lightbox HTML to the DOM
			$('body').append(lightbox);
			// make sure the user can't scroll while the lightbox is showing
			$('body').addClass("overflow-y-hidden");
			// fill lightbox with .blocks-gallery-grid a hrefs
			$('.wp-block-gallery').find('.wp-block-image a').each(function() {
				var $href = $(this).attr('href');
				$('#lightbox_slider').append(
					'<li>' +
					'<img src="' + $href + '">' +
					'</li>'
				);
			});
		}
		// set the slider size based on number of objects in slideshow
		size = $('#lightbox_slider > li').length;
		// hide all slides, then show the selected slide
		$('#lightbox_slider > li').hide();
		$('#lightbox_slider > li:eq(' + slideNum + ')').show();
		// set current to selected slide
		current = slideNum;
	});
	// click anywhere on the page to get rid of lightbox window
	$('body').on('click', '#wrapper_lightbox', function() { // using .on() instead of .live(). more modern, and fixes event bubbling issues
		$('#wrapper_lightbox').fadeOut(300);
		$('body').removeClass("overflow-y-hidden");
	});
	// navigation left/right arrow keys, esc to close

	document.onkeydown = checkKey;

	function checkKey(e) {

		e = e || window.event;
		if (e.keyCode == '37') {
			e.preventDefault();
			e.stopPropagation();
			var $this = $(this);
			var dest;
			dest = current - 1;
			if (dest < 0) {
				dest = size - 1;
			}
			// fadeOut current slide, fadeIn next/prev slide
			$('#lightbox_slider > li:eq(' + current + ')').fadeOut(150);
			$('#lightbox_slider > li:eq(' + dest + ')').fadeIn(150);
			// update current slide
			current = dest;
		} else if (e.keyCode == '39') {
			e.preventDefault();
			e.stopPropagation();
			var $this = $(this);
			var dest;
			dest = current + 1;
			if (dest > size - 1) {
				dest = 0;
			}

			// fadeOut current slide, fadeIn next/prev slide
			$('#lightbox_slider > li:eq(' + current + ')').fadeOut(150);
			$('#lightbox_slider > li:eq(' + dest + ')').fadeIn(150);
			// update current slide
			current = dest;
		} else if (e.keyCode == '27') {
			$('#wrapper_lightbox').fadeOut(300);
			$('body').removeClass("overflow-y-hidden");
		}

	}



	// navigation prev/next
	$('body').on('click', '.slider-nav', function(e) {
		// prevent link from firing and lightbox from accidentally closing
		e.preventDefault();
		e.stopPropagation();
		var $this = $(this);
		var dest;
		// check if prev arrow was clicked
		if ($this.hasClass('prev') && $this.hasClass('slider-nav')) {
			dest = current - 1;
			if (dest < 0) {
				dest = size - 1;
			}
		} else {
			// otherwise they clicked next
			dest = current + 1;
			if (dest > size - 1) {
				dest = 0;
			}
		}
		// fadeOut current slide, fadeIn next/prev slide
		$('#lightbox_slider > li:eq(' + current + ')').fadeOut(150);
		$('#lightbox_slider > li:eq(' + dest + ')').fadeIn(150);
		// update current slide
		current = dest;
	});
});
