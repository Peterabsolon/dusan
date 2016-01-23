/**
 * Checks if an element is in the viewport area
 *
 * @param  {float}  x width percentage
 * @param  {float}  y height percentage
 * @return {Boolean}  visibility
 */
$.fn.isOnScreen = function(x, y){
    
    if(x == null || typeof x == 'undefined') x = 1;
    if(y == null || typeof y == 'undefined') y = 1;
    
    var win = $(window);
    
    var viewport = {
        top : win.scrollTop(),
        left : win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();
    
    var height = this.outerHeight();
    var width = this.outerWidth();
 
    if(!width || !height){
        return false;
    }
    
    var bounds = this.offset();
    bounds.right = bounds.left + width;
    bounds.bottom = bounds.top + height;
    
    var visible = (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
    
    if(!visible){
        return false;   
    }
    
    var deltas = {
        top : Math.min( 1, ( bounds.bottom - viewport.top ) / height),
        bottom : Math.min(1, ( viewport.bottom - bounds.top ) / height),
        left : Math.min(1, ( bounds.right - viewport.left ) / width),
        right : Math.min(1, ( viewport.right - bounds.left ) / width)
    };
    
    return (deltas.left * deltas.right) >= x && (deltas.top * deltas.bottom) >= y;
    
};

/**
 * Calculate sidebar width based on menu-button--open right offset so the menu-button--close is on the same position as --open
 *
 * @return {void}
 */
function resizeSidebar () {
	var offset_right = ($(window).width() - ($('.menu-button--open').offset().left + $('.menu-button--open').outerWidth()));

	var sidebar_width = (offset_right * 2) + 37;

	if ($(window).width() >= 768) {
		$('.sidebar').css('max-width', sidebar_width);
	} else {
		$('.sidebar').css('max-width', 'none');
	}
}

$(document).ready(function () {

	// Initialize WOW.js
	new WOW().init();

	// Initialize lightgallery.js
	if ($(window).width() >= 768) {
		$(".lightgallery").each(function(){
			$(this).lightGallery({
				mode: 'lg-fade',
				selector: '.lightgallery__item'
			});
		});
	}

	// Toggle sidebar menu
	$('button[data-action="toggle-menu"]').on('click', function () {
		$(this).toggleClass('menu-button--toggled'); 

		$('.sidebar, body').toggleClass('sidebar--toggled');
	});

	// Reset animation delay on elements not in viewport
	var animated_elements = $('.wow');

	animated_elements.each(function (key) {
		var element = animated_elements[key];

		if (!$(element).isOnScreen(1, 0.1)) {
	    	$(element).attr('data-wow-delay', '200ms');
		}
	});

	resizeSidebar();

	$(window).on('resize', function () {
		resizeSidebar();
	});

}); 