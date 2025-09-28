/*
  Theme Name: Expoint | Courier & Logistics HTML Template
  Author: Capricorn_Theme
  Creation Date: 01 Oct 2020
  Version: 1.0
*/

/* [Table of Contents]

* 01. Mobile Menu
  02. Header Search Form

  03. Owl Carousel
        - Hero Area Slider
        - Testimonial Carousel
		- Testimonial Carousel # 02
		- Service Slider
		- Client Carousel
  04. Sticky Area
  05. Progress Bar
  06. Counter Up
  07. Isotope
  08. Wow Animation
  09. Scroll to the Top
  10. Active & Remove Class
  11. Menu Active Color
  12. Preloader

*/
(function ($) {
	"use strict";

	// Mobile Menu

	$(".navbar-toggler").on("click", function () {
		$(this).toggleClass("active");
	});

	$(".navbar-nav li a").on("click", function () {
		$(".sub-nav-toggler").removeClass("active");
	});

	var subMenu = $(".navbar-nav .sub-menu");

	if (subMenu.length) {
		subMenu
			.parent("li")
			.children("a")
			.append(function () {
				return '<button class="sub-nav-toggler"> <i class="fa fa-angle-down"></i> </button>';
			});

		var subMenuToggler = $(".navbar-nav .sub-nav-toggler");

		subMenuToggler.on("click", function () {
			$(this).parent().parent().children(".sub-menu").slideToggle();
			return false;
		});
	}

	//Header Search Form
	if ($(".search-btn").length) {
		$(".search-btn").on("click", function () {
			$("body").addClass("search-active");
		});
		$(".close-search, .search-back-drop").on("click", function () {
			$("body").removeClass("search-active");
		});
	}

	// Client Carousel


	//jQuery Sticky Area
	$('.sticky-area').sticky({
		topSpacing: 0,
	});

	//Progress Bar JS

	$("#bar1").barfiller({
		barColor: "#FFD857",
		duration: 5000,
	});

	$("#bar2").barfiller({
		barColor: "#FFD857",
		duration: 6000,
	});

	$("#bar3").barfiller({
		barColor: "#FFD857",
		duration: 7000,
	});

	$("#bar4").barfiller({
		barColor: "#FFD857",
		duration: 5000,
	});

	$("#bar5").barfiller({
		barColor: "#FFD857",
		duration: 6000,
	});

	$("#bar6").barfiller({
		barColor: "#FFD857",
		duration: 7000,
	});

	//Counter Up

	$(".counter-number span").counterUp({
		delay: 10,
		time: 1000,

	});

	//Isotope Filter

	$('.port-menu li').on('click', function () {
		var selector = $(this).attr('data-filter');

		$('.port-menu li').removeClass("active");

		$(this).addClass("active");

		$(".portfolio-list").isotope({
			filter: selector,
			percentPosition: true,
		});

	});


	//jQuery Animation
	new WOW().init(

	);

	// SCROLLTO THE TOP

	// Show or hide the sticky footer button
	$(window).on("scroll", function () {
		if ($(this).scrollTop() > 6000) {
			$('.go-top').fadeIn(200);
		} else {
			$('.go-top').fadeOut(200);
		}
	});


	// Animate the scroll to top
	$('.go-top').on("click", function (event) {
		event.preventDefault();

		$('html, body').animate({
			scrollTop: 0
		}, 1500);
	});

	// Active & Remove Class

	$(".single-price-item").on("mouseover", function () {
		$(".single-price-item").removeClass("active");
		$(this).addClass("active");
	});

	// Menu Active Color

	$(".main-menu .navbar-nav .nav-link").on("mouseover", function () {
		$(".main-menu .navbar-nav .nav-link").removeClass("active");
		$(this).addClass("active");
	});

	// Preloader
	setTimeout(function () {
		$("#loader").fadeOut(600);
	}, 200);

	jQuery(window).on("load", function () {
		jQuery(".site-preloader-wrap, .slide-preloader-wrap").fadeOut(1000);
	});


}(jQuery));

jQuery(document).ready(function ($) {
    "use strict";

    function elementskit_event_manager(_event, _selector, _fn){
        $(document).on(_event, _selector, _fn);
    }

    elementskit_event_manager('click', '.elementskit-dropdown-has > a', function (e) {
		e.preventDefault();

		var menu = $(this).parents('.elementskit-navbar-nav');
		var li = $(this).parent();
		var dropdown = li.find('>.elementskit-dropdown');

		dropdown.find('.elementskit-dropdown-open').removeClass('elementskit-dropdown-open');

		jQuery(window).on('resize', function() {
			if (jQuery(window).width() > 991) {
				jQuery(dropdown).removeClass('elementskit-dropdown-open');
			}
		})
		if(dropdown.hasClass('elementskit-dropdown-open')){
			dropdown.removeClass('elementskit-dropdown-open');
		}else{
			dropdown.addClass('elementskit-dropdown-open');
		}

	});

	elementskit_event_manager('click', '.elementskit-menu-toggler', function (e) {
		e.preventDefault();
		var parent_conatiner = $(this).parents('.elementskit-menu-container').parent();
		if(parent_conatiner.length < 1){
			parent_conatiner = $(this).parent();
		}
		var off_canvas_class = parent_conatiner.find('.elementskit-menu-offcanvas-elements');

		jQuery(window).on('resize', function() {
			if (jQuery(window).width() > 991) {
				off_canvas_class.removeClass('active');
			}
		})
		if(off_canvas_class.hasClass('active')){
			off_canvas_class.removeClass('active');
		}else{
			off_canvas_class.addClass('active');
		}

	});


}); // end ready function
