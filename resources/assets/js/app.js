function isElementInViewport (el) {
    if (typeof jQuery === "function" && el instanceof jQuery) {
        el = el[0];
    }

    var rect = el.getBoundingClientRect();

    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && 
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

// Calculate sidebar width based on menu-button--open right offset so the menu-button--close is on the same position as --open
function resizeSidebar() {
  var offset_right = ($(window).width() - ($('.menu-button--open').offset().left + $('.menu-button--open').outerWidth()));

  var sidebar_width = (offset_right * 2) + 37;

  $('.sidebar').css('max-width', sidebar_width);
}

$(document).ready(function () {

  // Toggle sidebar menu
  $('button[data-action="toggle-menu"]').on('click', function () {
		$(this).toggleClass('header__button--toggled'); 

    $('.sidebar, body').toggleClass('sidebar--toggled');
	}); 

  // Initialize WOW.js
  new WOW().init();
  
  // Reset animation delay on elements not in viewport
  var animated_elements = $('.wow');

  animated_elements.each(function (key) {
    var element = animated_elements[key];

    if (!isElementInViewport(element)) {
      $(element).attr('data-wow-delay', '200ms');
    }
  });

  resizeSidebar();
}); 