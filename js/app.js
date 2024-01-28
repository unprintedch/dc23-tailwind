(() => {
  // resources/js/app.js
  window.addEventListener("load", function() {
    const burgerIcon = document.querySelector(".burger-menu");
    const burgerIconClose = document.querySelector(".burger-menu-close");
    const overlayOffcanvas = document.querySelector(".overlay");
    const dropdownMenuHasChildren = document.querySelectorAll("li.menu-item.menu-item-has-children");
    const offcanvasMenu = document.getElementById("offcanvas-menu");
    const body = document.querySelector("body");
    let scrollpos = window.scrollY;
    const header = document.querySelector("header");
    const header_height = header.offsetHeight;
    window.addEventListener("scroll", function() {
      scrollpos = window.scrollY;
      if (scrollpos >= header_height) {
        header.classList.add("scrolled");
      } else {
        header.classList.remove("scrolled");
      }
    });
    if (scrollpos >= header_height) {
      header.classList.add("scrolled");
    } else {
      header.classList.remove("scrolled");
    }
    Array.from(dropdownMenuHasChildren).forEach((element) => {
      var dropdownArrow = document.createElement("div");
      dropdownArrow.className = "dropdown-arrow";
      element.appendChild(dropdownArrow);
      dropdownArrow.addEventListener("click", () => {
        if (element.classList.contains("open")) {
          element.classList.remove("open");
        } else {
          element.classList.add("open");
        }
      });
    });
    if (burgerIcon) {
      burgerIcon.addEventListener("click", function() {
        burgerIcon.classList.toggle("close-mode");
        burgerIconClose.classList.toggle("close-mode");
        offcanvasMenu.classList.toggle("open");
        overlayOffcanvas.classList.toggle("open");
        body.classList.toggle("overflow-hidden");
        offcanvasMenu.classList.toggle("overflow-y-scroll");
      });
    }
    if (burgerIconClose) {
      burgerIconClose.addEventListener("click", function() {
        burgerIcon.classList.toggle("close-mode");
        burgerIconClose.classList.toggle("close-mode");
        offcanvasMenu.classList.toggle("open");
        overlayOffcanvas.classList.toggle("open");
        body.classList.toggle("overflow-hidden");
        offcanvasMenu.classList.toggle("overflow-y-scroll");
      });
    }
    document.addEventListener("keyup", function(event) {
      if (event.code === "Escape") {
        if (offcanvasMenu.classList.contains("open")) {
          offcanvasMenu.classList.remove("open");
          overlayOffcanvas.classList.remove("open");
          body.classList.remove("overflow-hidden");
        }
      }
    });
    if (overlayOffcanvas) {
      overlayOffcanvas.addEventListener("click", function() {
        if (overlayOffcanvas.classList.contains("open") && offcanvasMenu.classList.contains("open")) {
          offcanvasMenu.classList.remove("open");
          overlayOffcanvas.classList.remove("open");
          body.classList.remove("overflow-hidden");
        }
      });
    }
  });
  jQuery(document).ready(function($) {
    var current, size;
    $(".wp-block-gallery a").click(function(e) {
      e.preventDefault();
      var image_href = $(this).attr("href");
      var slideNum = $(".wp-block-gallery a").index(this);
      if ($("#wrapper_lightbox").length > 0) {
        $("#wrapper_lightbox").fadeIn(300);
      } else {
        var lightbox = '<div id="wrapper_lightbox"><svg xmlns="http://www.w3.org/2000/svg" width="2rem" class="icon-close" viewBox="0 0 384 512"><path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/></svg><ul id="lightbox_slider"></ul><svg xmlns="http://www.w3.org/2000/svg" width="2.5rem" viewBox="0 0 448 512" class="prev slider-nav"><path d="M7.4 273.4C2.7 268.8 0 262.6 0 256s2.7-12.8 7.4-17.4l176-168c9.6-9.2 24.8-8.8 33.9 .8s8.8 24.8-.8 33.9L83.9 232 424 232c13.3 0 24 10.7 24 24s-10.7 24-24 24L83.9 280 216.6 406.6c9.6 9.2 9.9 24.3 .8 33.9s-24.3 9.9-33.9 .8l-176-168z"/></svg><svg xmlns="http://www.w3.org/2000/svg" width="2.5rem" viewBox="0 0 448 512" class="next slider-nav"><path d="M440.6 273.4c4.7-4.5 7.4-10.8 7.4-17.4s-2.7-12.8-7.4-17.4l-176-168c-9.6-9.2-24.8-8.8-33.9 .8s-8.8 24.8 .8 33.9L364.1 232 24 232c-13.3 0-24 10.7-24 24s10.7 24 24 24l340.1 0L231.4 406.6c-9.6 9.2-9.9 24.3-.8 33.9s24.3 9.9 33.9 .8l176-168z"/></svg></div><!-- #wrapper_lightbox -->';
        $("body").append(lightbox);
        $("body").addClass("overflow-y-hidden");
        $(".wp-block-gallery").find(".wp-block-image a").each(function() {
          var $href = $(this).attr("href");
          $("#lightbox_slider").append('<li><img src="' + $href + '"></li>');
        });
      }
      size = $("#lightbox_slider > li").length;
      $("#lightbox_slider > li").hide();
      $("#lightbox_slider > li:eq(" + slideNum + ")").show();
      current = slideNum;
    });
    $("body").on("click", "#wrapper_lightbox", function() {
      $("#wrapper_lightbox").fadeOut(300);
      $("body").removeClass("overflow-y-hidden");
    });
    document.onkeydown = checkKey;
    function checkKey(e) {
      e = e || window.event;
      if (e.keyCode == "37") {
        e.preventDefault();
        e.stopPropagation();
        var $this = $(this);
        var dest;
        dest = current - 1;
        if (dest < 0) {
          dest = size - 1;
        }
        $("#lightbox_slider > li:eq(" + current + ")").fadeOut(150);
        $("#lightbox_slider > li:eq(" + dest + ")").fadeIn(150);
        current = dest;
      } else if (e.keyCode == "39") {
        e.preventDefault();
        e.stopPropagation();
        var $this = $(this);
        var dest;
        dest = current + 1;
        if (dest > size - 1) {
          dest = 0;
        }
        $("#lightbox_slider > li:eq(" + current + ")").fadeOut(150);
        $("#lightbox_slider > li:eq(" + dest + ")").fadeIn(150);
        current = dest;
      } else if (e.keyCode == "27") {
        $("#wrapper_lightbox").fadeOut(300);
        $("body").removeClass("overflow-y-hidden");
      }
    }
    $("body").on("click", ".slider-nav", function(e) {
      e.preventDefault();
      e.stopPropagation();
      var $this = $(this);
      var dest;
      if ($this.hasClass("prev") && $this.hasClass("slider-nav")) {
        dest = current - 1;
        if (dest < 0) {
          dest = size - 1;
        }
      } else {
        dest = current + 1;
        if (dest > size - 1) {
          dest = 0;
        }
      }
      $("#lightbox_slider > li:eq(" + current + ")").fadeOut(150);
      $("#lightbox_slider > li:eq(" + dest + ")").fadeIn(150);
      current = dest;
    });
  });
})();
