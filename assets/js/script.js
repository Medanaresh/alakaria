$(document).ready(function () {
	function setHeight() {
		var $window = $(window);
		windowHeight = $(window).innerHeight();
		if ($window.width() >= 320 && $window.width() <= 767) {
			$('#header').css('min-height', windowHeight);
		}
		else if ($window.width() >= 768 && $window.width() <= 992) {
			$('#header').css('min-height', 0);
		}
		else if ($window.height() >= 1080 && $window.height() <= 1500) {
			$('#header').css('min-height', windowHeight);
			$('.big_screen').css('display', 'flex').css('align-items', 'center');
		}
		else if ($window.height() >= 1501 && $window.height() <= 1950) {
			$('#header').css('min-height', windowHeight);
			$('.big_screen').css('display', 'flex').css('align-items', 'center');
			$('.single_snap').css('top', '360px');
		}
		else {
			$('#header').css('min-height', windowHeight);
		}
	};
	setHeight();
	$(window).resize(function () {
		setHeight();
	});
	$(".element").each(function () {
		var $this = $(this);
		$this.typed({
			strings: $this.attr('data-elements').split(',')
			, typeSpeed: 100
			, backDelay: 3000
		});
	});
	$(window).load(function () {
		$('#main_loader').fadeOut('slow');
		if (Modernizr.csstransforms3d) {
			window.sr = ScrollReveal();
			sr.reveal('.snap_middle', {
				origin: 'bottom'
				, distance: '100px'
				, duration: 1300
				, delay: 400
				, opacity: 1
				, scale: 0
				, easing: 'ease-in'
				, reset: true
			});
			sr.reveal('.snap_left_2', {
				origin: 'right'
				, distance: '100px'
				, duration: 1300
				, delay: 600
				, rotate: {
					x: 0
					, y: 0
					, z: 15
				}
				, opacity: 0
				, scale: 0
				, easing: 'ease-in'
				, reset: true
			});
			sr.reveal('.snap_left_3', {
				origin: 'right'
				, distance: '100px'
				, duration: 1300
				, delay: 800
				, rotate: {
					x: 0
					, y: 0
					, b: 25
				}
				, opacity: 0
				, scale: 0
				, easing: 'ease-in'
				, reset: true
			});
			sr.reveal('.snap_left_4', {
				origin: 'left'
				, distance: '100px'
				, duration: 1300
				, delay: 600
				, rotate: {
					x: 0
					, y: 0
					, a: 15
				}
				, opacity: 0
				, scale: 0
				, easing: 'ease-in'
				, reset: true
			});
			sr.reveal('.snap_left_5', {
				origin: 'left'
				, distance: '100px'
				, duration: 1300
				, delay: 800
				, rotate: {
					x: 0
					, y: 0
					, c: 25
				}
				, opacity: 0
				, scale: 0
				, easing: 'ease-in'
				, reset: true
			});
			sr.reveal('.home_slide1', {
				origin: 'right'
				, distance: '50px'
				, duration: 1300
				, delay: 600
				, opacity: 0.6
				, scale: 0
				, easing: 'linear'
				, reset: true
			});
			sr.reveal('.home_slide2', {
				origin: 'right'
				, distance: '50px'
				, duration: 1300
				, delay: 1800
				, opacity: 0
				, scale: 0
				, easing: 'linear'
				, reset: true
			});
			sr.reveal('.home_slide3', {
				origin: 'right'
				, distance: '50px'
				, duration: 1300
				, delay: 3000
				, opacity: 0
				, scale: 0
				, easing: 'linear'
				, reset: true
			});
			sr.reveal('.animate_left_40', {
				origin: 'left'
				, distance: '40px'
				, duration: 800
				, delay: 400
				, opacity: 0
				, scale: 0
				, easing: 'linear'
				, reset: true
			});
			sr.reveal('.animate_top_60', {
				origin: 'top'
				, distance: '60px'
				, duration: 800
				, delay: 400
				, opacity: 0
				, scale: 0
				, easing: 'linear'
				, reset: true
			});
			sr.reveal('.animate_bottom_60', {
				origin: 'bottom'
				, distance: '60px'
				, duration: 800
				, delay: 400
				, opacity: 0
				, scale: 0
				, easing: 'linear'
				, reset: true
			});
			sr.reveal('.animate_fade_in', {
				duration: 800
				, delay: 400
				, opacity: 0
				, scale: 0
				, easing: 'linear'
				, reset: true
			});
		}
	});
	$("#myNavbar a").on('click', function (event) {
		event.preventDefault();
		var hash = this.hash;
		$('html, body').animate({
			scrollTop: $(hash).offset().top
		}, 800, function () {
			window.location.hash = hash;
		});
	});
	$(window).scroll(function () {
		if ($(this).scrollTop() > 600) {
			$('.scrollup').fadeIn();
		}
		else {
			$('.scrollup').fadeOut();
		}
	});
	$('.scrollup').click(function () {
		$("html, body").animate({
			scrollTop: 0
		}, 600);
		return false;
	});
	var ost = 0;
	$(window).scroll(function () {
		var cOst = $(this).scrollTop();
		if (cOst == 0) {
			$('.navbar').addClass('top-nav-collapse');
			$('.navbar').removeClass('scroll_menu');
		}
		else if (cOst < ost) {
			$('.navbar').addClass('top-nav-collapse').addClass('default');
			$('.navbar').addClass('scroll_menu');
		}
		else {
			$('.navbar').addClass('default').removeClass('top-nav-collapse');
			$('.navbar').addClass('scroll_menu').removeClass('top-nav-collapse');
		}
		ost = cOst;
	});
	$('body').scrollspy({
		target: ".navbar"
		, offset: 50
	});
	$(".review").owlCarousel({
		dots: true
		, autoplay: false
		, mouseDrag: true
		, nav: false
		, loop: true
		, margin: 20
		, responsiveClass: true
		, responsive: {
			0: {
				items: 1
			}
			, 400: {
				items: 1
			}
			, 768: {
				items: 2
			}
			, 1000: {
				items: 2
			}
		}
	});
	$('#amazing_img').slick({
		slidesToShow: 1
		, slidesToScroll: 1
		, arrows: true
		, autoplay: false
		, draggable: true
		, fade: true
		, asNavFor: '#amazing_cont'
	});
	$('#amazing_cont').slick({
		slidesToShow: 1
		, slidesToScroll: 1
		, asNavFor: '#amazing_img'
		, dots: false
		, arrows: true
		, autoplay: false
		, focusOnSelect: true
	});
	var swiper = new Swiper('.swiper-container', {
		nextButton: '.swiper-button-next'
		, prevButton: '.swiper-button-prev'
		, spaceBetween: 0
		, loop: true
		, initialSlide: 1
		, preloadImages: true
		, autoplayDisableOnInteraction: false
		, autoplay: false
		, effect: 'coverflow'
		, centeredSlides: true
		, slidesPerView: 3
		, coverflow: {
			rotate: 0
			, stretch: 100
			, depth: 100
			, modifier: 1
			, slideShadows: false
		}
		, breakpoints: {
			480: {
				slidesPerView: 1
			, }
			, 768: {
				slidesPerView: 2
			, }
			, 992: {
				slidesPerView: 3
			, }
		}
	});
	var $sync1 = $("#sync1")
		, $sync2 = $("#sync2")
		, $sync3 = $(".sync3")
		, flag = false
		, duration = 300;
	$sync1.owlCarousel({
		items: 1
		, autoplay: false
		, margin: 10
		, nav: false
		, dots: false
	}).on('changed.owl.carousel', function (e) {
		if (!flag) {
			flag = true;
			var a = e.property.value++;
			$(".team-images").removeClass("current_dot");
			$('.team-images').eq(a).addClass("current_dot");
			$sync3.trigger('to.owl.carousel', [e.item.index, duration, true]);
			$sync2.trigger('to.owl.carousel', [e.item.index, duration, true]);
			flag = false;
		}
	});
	$sync2.owlCarousel({
		margin: 20
		, items: 1
		, nav: false
		, autoplay: false
		, center: false
		, dotsEach: false
		, dots: true
		, dotsContainer: '#carousel-custom-dots'
	, }).on('click', '.owl-item', function () {
		$sync1.trigger('to.owl.carousel', [$(this).index(), duration, true]);
		$sync3.trigger('to.owl.carousel', [$(this).index(), duration, true]);
	}).on('changed.owl.carousel', function (e) {
		if (!flag) {
			flag = true;
			var a = e.property.value++;
			$(".team-images").removeClass("current_dot");
			$('.team-images').eq(a).addClass("current_dot");
			$sync3.trigger('to.owl.carousel', [e.item.index, duration, true]);
			$sync1.trigger('to.owl.carousel', [e.item.index, duration, true]);
			flag = false;
		}
	});
	$(".team-images").eq(0).addClass("current_dot");
	$('.team-images').click(function (e) {
		$(".team-images").removeClass("current_dot");
		$(this).addClass("current_dot");
		$sync2.trigger('to.owl.carousel', [$(this).index(), duration, true]);
		$sync1.trigger('to.owl.carousel', [$(this).index(), duration, true]);
	});
	$('.counter').counterUp({
		delay: 10
		, time: 900
	});
	$(".client-owl").owlCarousel({
		dots: true
		, autoplay: true
		, nav: false
		, autoplayTimeout: 2000
		, smartSpeed: 1000
		, loop: true
		, margin: 20
		, responsiveClass: true
		, responsive: {
			0: {
				items: 2
			}
			, 400: {
				items: 3
			}
			, 700: {
				items: 4
			}
			, 1000: {
				items: 6
				, loop: true
			}
		}
	});
});
$(".gradient-color-1").click(function () {
	$("#color").attr("href", "assets/css/color/gradient-color-1.css");
	return false;
});
$(".gradient-color-2").click(function () {
	$("#color").attr("href", "assets/css/color/gradient-color-2.css");
	return false;
});
$(".gradient-color-3").click(function () {
	$("#color").attr("href", "assets/css/color/gradient-color-3.css");
	return false;
});
$(".gradient-color-4").click(function () {
	$("#color").attr("href", "assets/css/color/gradient-color-4.css");
	return false;
});
$(".gradient-color-5").click(function () {
	$("#color").attr("href", "assets/css/color/gradient-color-5.css");
	return false;
});
$(".color-1").click(function () {
	$("#color").attr("href", "assets/css/color/color-1.css");
	return false;
});
$(".color-2").click(function () {
	$("#color").attr("href", "assets/css/color/color-2.css");
	return false;
});
$(".color-3").click(function () {
	$("#color").attr("href", "assets/css/color/color-3.css");
	return false;
});
$(".color-4").click(function () {
	$("#color").attr("href", "assets/css/color/color-4.css");
	return false;
});
$(".color-5").click(function () {
	$("#color").attr("href", "assets/css/color/color-5.css");
	return false;
});
$(".color-6").click(function () {
	$("#color").attr("href", "assets/css/color/color-6.css");
	return false;
});
$(".color-7").click(function () {
	$("#color").attr("href", "assets/css/color/color-7.css");
	return false;
});
$(".color-8").click(function () {
	$("#color").attr("href", "assets/css/color/color-8.css");
	return false;
});
$('.color-picker').animate({
	left: '-239px'
});
$('.color-picker a.handle').click(function (e) {
	e.preventDefault();
	var div = $('.color-picker');
	if (div.css('left') === '-239px') {
		$('.color-picker').animate({
			left: '0px'
		});
	}
	else {
		$('.color-picker').animate({
			left: '-239px'
		});
	}
});
(function (i, s, o, g, r, a, m) {
	i['GoogleAnalyticsObject'] = r;
	i[r] = i[r] || function () {
		(i[r].q = i[r].q || []).push(arguments)
	}, i[r].l = 1 * new Date();
	a = s.createElement(o), m = s.getElementsByTagName(o)[0];
	a.async = 1;
	a.src = g;
	m.parentNode.insertBefore(a, m)
})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
ga('create', 'UA-86115696-1', 'auto');
ga('send', 'pageview');