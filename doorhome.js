$(function () {
  			$(document).scroll(function () {
    					var $nav = $(".fixed-top");
    					$nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  			});
});

var elmnt = $("#carouselExampleIndicators").height();
elmnt = Math.round(elmnt/2.5) + "px";
$(".caption").css({"margin-bottom":elmnt});
