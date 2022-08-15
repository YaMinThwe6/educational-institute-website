	    var width = $(window).width();
	    if((width<=1024)&&(width>=821)){
	        $('#card').css({"grid-template-columns":"1fr 1fr 1fr","justify-items":"left","align-items":"left"});
	    }
	    else if((width<821)&&(width>=510)){
	        $('#card').css({"grid-template-columns":"1fr 1fr","justify-items":"left","align-items":"left"});
	        $('.wrapper2').css("grid-template-columns","1fr");
	    }
	   else if(width<510){
	        $('#card').css("grid-template-columns","1fr");
	        $('.wrapper1').css("grid-template-columns","1fr");
	        $('.wrapper2').css("grid-template-columns","1fr");
	    }