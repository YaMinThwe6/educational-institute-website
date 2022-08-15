$(document).ready(function () {
  			$(document).scroll(function () {
    					var $nav = $(".fixed-top");
    					$nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  			});
});

var elmnt = $("#carouselExampleIndicators").height();
elmnt = Math.round(elmnt/2.5) + "px";
$(".caption").css({"margin-bottom":elmnt});

var width = $(window).width();

if (width <= 1024) {
	 $('#pdf').css({"height":"200px","background-image":"url('review/rectangle.jpg')"});
	 $('.wrap').css({"padding-top": "0px","padding-right": "10px","padding-left": "10px","padding-bottom": "0px", "grid-template-columns":"1fr"});
}
if(width<510){
	  $('.wrapper1').css("grid-template-columns","1fr");
}
