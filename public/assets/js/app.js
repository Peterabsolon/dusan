// Fix for SVG background images in WebKit
function loadSVG(svgpath){
     if( /webkit/gi.test(navigator.userAgent.toLowerCase()) ){
       var obj = document.createElement('object');
       obj.setAttribute('type', 'image/svg+xml');
       obj.setAttribute('data', svgpath);
       obj.setAttribute('width', '1');
       obj.setAttribute('height', '1');
       obj.setAttribute('style', 'width: 0px; height: 0px; position: absolute;visibility : hidden');
       document.getElementsByTagName('html')[0].appendChild(obj);
     }
}

window.onload = function(){
  loadSVG('images/site/sprite.svg');
}

$(document).ready(function(){
	
  $('button[data-action="toggle-menu"]').on('click', function(){
		$(this).toggleClass('header__button--toggled'); 

    $('.sidebar, body').toggleClass('sidebar--toggled');
	}); 
  
}); 