$(document).ready(function(){

  new WOW().init();
	
  $('button[data-action="toggle-menu"]').on('click', function(){
		$(this).toggleClass('header__button--toggled'); 

    $('.sidebar, body').toggleClass('sidebar--toggled');
	}); 

  $('.services__item').each(function(){
    $(this).addClass('loaded');
  });

  $(window).scroll(function(event) {
    
    var win = $(window);
    var elements = $(".to-load");

    // Already visible modules
    elements.each(function(i, el) {
      var el = $(el);
      if (el.visible(true)) {
        el.addClass("already-visible"); 
      } 
    });

    win.scroll(function(event) {
      
      elements.each(function(i, el) {
        var el = $(el);
        if (el.visible(true)) {
          el.addClass("loaded"); 
        } 
      });
      
    });
    
  });  
}); 