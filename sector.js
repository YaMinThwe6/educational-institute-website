		function myFunction() {
			var dots = document.getElementById("dots");
			var moreText = document.getElementById("more");
			var btnText = document.getElementById("myBtn");

			if (dots.style.display === "none") {
				dots.style.display = "inline";
				btnText.innerHTML = "Read more";
				moreText.style.display = "none";
			} else {
				dots.style.display = "none";
				btnText.innerHTML = "Read less";
				moreText.style.display = "inline";
			}
		}
		
		var width = $(window).width();
	    
	    if((width<=1024)&&(width>=510)){
	        $(".wrapper").css("grid-template-columns","1fr 1fr");
	    }
	    else if(width<510){
	        $(".wrapper").css("grid-template-columns","1fr");
	        $('.wrapper1').css("grid-template-columns","1fr");
	    }