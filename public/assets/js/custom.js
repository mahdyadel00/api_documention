jQuery(function ($) {
	'use strict';

	/* ---------------------------------------- */
	// sticky header
	/* ---------------------------------------- */
	var navbarSticky = $('#sticker').parent();
	if (navbarSticky.hasClass('sticky-header')) {
		$(window).on('load', function () {
			headerSticky();
		});
		$(window).on('scroll', function () {
			headerSticky();
		});
	}

	function headerSticky() {
		var scrollToTop = $(window).scrollTop();
		if (scrollToTop > 46) {
			$('#sticker').parent().addClass('sticky');
			$('body').addClass('sticky-header');
		} else {
			$('#sticker').parent().removeClass('sticky');
			$('body').removeClass('sticky-header');
		}
	}

	// dropdown menu access using keyboard
	function keyboardAccessNavMenu() {
		// Get all the link elements within the primary menu.
		var links,
			i,
			len,
			menu = document.querySelector('.menu-turbo-menu-container>ul');

		if (!menu) {
			return false;
		}

		links = menu.getElementsByTagName('a');

		// Each time a menu link is focused or blurred, toggle focus.
		for (i = 0, len = links.length; i < len; i++) {
			links[i].addEventListener('focus', toggleFocus, true);
			links[i].addEventListener('blur', toggleFocus, true);
		}

		//Sets or removes the .focus class on an element.
		function toggleFocus() {
			var self = this;

			// Move up through the ancestors of the current link until we hit .primary-menu.
			while (-1 === self.className.indexOf('navbar-nav')) {
				// On li elements toggle the class .focus.
				if ('li' === self.tagName.toLowerCase()) {
					if (-1 !== self.className.indexOf('focus')) {
						self.className = self.className.replace(' focus', '');
					} else {
						self.className += ' focus';
					}
				}
				self = self.parentElement;
			}
		}
	}
	keyboardAccessNavMenu();

	/* ---------------------------------------- */
	// dropdown menu toggle
	/* ---------------------------------------- */
	var screenWidth = window.innerWidth;

	function mobileMenuDropdownAccordion() {
		$('.menu-item-has-children>.dropdown-toggle').on('click', function (e) {
			e.preventDefault();
			var element = $(this).parent('.menu-item-has-children');
			if (element.hasClass('active')) {
				element.removeClass('active');
				element.find('.menu-item-has-children').removeClass('active');
				element.find('.dropdown-menu').slideUp();
			} else {
				element.addClass('active');
				element.children('.dropdown-menu').slideDown();
				element
					.siblings('.menu-item-has-children')
					.children('.dropdown-menu')
					.slideUp();
				element.siblings('.menu-item-has-children').removeClass('active');
				element
					.siblings('.menu-item-has-children')
					.find('.menu-item-has-children')
					.removeClass('active');
				element
					.siblings('.menu-item-has-children')
					.find('.dropdown-menu')
					.slideUp();
			}
			e.stopPropagation();
		});
	}

	if (screenWidth < 992) {
		mobileMenuDropdownAccordion();
	}

	/* ---------------------------------------- */
	// init Isotope
	/* ---------------------------------------- */
	var qsRegex, selectFilter, ratingFilter;
	var $grid = $('.rq-car-grid').isotope({
		itemSelector: '.rq-filter-grid-item',
		layoutMode: 'masonry',
		filter() {
			var $this = $(this);
			var searchResult = qsRegex ? $this.text().match(qsRegex) : true;
			var selectResult = selectFilter ? $this.is(selectFilter) : true;
			var ratingResult = ratingFilter ? $this.is(ratingFilter) : true;
			return searchResult && selectResult && ratingResult;
		},
	});

	/* ---------------------------------------- */
	// imagesLoaded
	/* ---------------------------------------- */
	$grid.imagesLoaded().progress(function () {
		$grid.isotope('layout');
	});

	/* ---------------------------------------- */
	// category change function
	/* ---------------------------------------- */
	$('#category-option').on('change', function () {
		selectFilter = $(this).val() ? '.' + $(this).val() : null;
		$grid.isotope();
	});

	/* ---------------------------------------- */
	// rating change function
	/* ---------------------------------------- */
	$('#car-rating').on('change', function () {
		ratingFilter = $(this).val() ? '.' + $(this).val() + 'star' : null;
		$grid.isotope();
	});

	/* ---------------------------------------- */
	// use value of search field to filter
	/* ---------------------------------------- */
	var $quicksearch = $('#quicksearch').keyup(
		debounce(function () {
			qsRegex = new RegExp($quicksearch.val(), 'gi');
			$grid.isotope();
		})
	);

	/* ---------------------------------------- */
	// change is-checked class on buttons
	/* ---------------------------------------- */
	$('.button-group').each(function (i, buttonGroup) {
		var $buttonGroup = $(buttonGroup);
		$buttonGroup.on('click', 'button', function () {
			$buttonGroup.find('.is-checked').removeClass('is-checked');
			$(this).addClass('is-checked');
		});
	});

	/* ---------------------------------------- */
	// debounce on filtering
	/* ---------------------------------------- */
	function debounce(fn, threshold) {
		var timeout;
		threshold = threshold || 100;
		return function debounced() {
			clearTimeout(timeout);
			var args = arguments;
			var _this = this;
			function delayed() {
				fn.apply(_this, args);
			}
			timeout = setTimeout(delayed, threshold);
		};
	}

	/* ---------------------------------------- */
	// wooCommerce mini cart js
	/* ---------------------------------------- */
	var miniCartSelector = $(
		'#main-wrapper .header .turbo-mini-cart .cart-counter'
	);
	miniCartSelector.click(function () {
		$(this).parent().toggleClass('active');
	});
});

/* ---------------------------------------- */
// site loader
/* ---------------------------------------- */
document.onreadystatechange = function () {
	var turboLoader = document.querySelector('.turbo-loader');
	if (document.readyState == 'complete') {
		setTimeout(() => {
			turboLoader.classList.add('fade-out');
		}, 200);
		setTimeout(() => {
			turboLoader.classList.add('complete');
		}, 600);
	}
};
