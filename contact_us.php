<?php

	$error = "";
	$sM="";
	if($_POST) {
		
		if (!$_POST['name']){
            
            $error.= "*Please enter your name!<br>";
            
        }
        if (!$_POST["email"]) {
            
            $error .= "*An email address is required!<br>";
            
        }
		if (!$_POST['sub']){
            
            $error.= "*Please enter the title to your message!<br>"; 
            
        }
		if (!$_POST['message']){
            
            $error.= "*Please enter the message you want us to know!<br>";
            
        }
		if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            
            $error .= "*The email address is invalid!<br>";
            
        }
		if ($error != "") {
            
            $error = '<div class="alert alert-danger text-center" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';
            
        }
		else {
			
			$name=$_POST["name"];
			$email=$_POST["email"];
			$phone=$_POST["phone"];
			$sub=$_POST["sub"];
			$message=$_POST["message"];	
			$file_open = fopen("admin-access/contact_us.csv", "a");
			$no_rows = count(file("admin-access/contact_us.csv"));
			if($no_rows >1) {
				
				$no_rows = ($no_rows - 1) + 1;
				
			}
			$form_data = array(
				'Serial_Number' => $no_rows,
				'Name' => $name,
				'Email' => $email,
				'Phone'=>$phone,
				'Subject' => $sub,
				'Message' => $message
			);
			if(fputcsv($file_open,$form_data)){
				$sM = '<div class="alert alert-success text-center" role="alert">Your message was sent. We\'ll get back to you ASAP!</div>';
            } else {
                $error = '<div class="alert alert-danger text-center role="alert"><p>Your message couldn\'t be sent - please try again later!</p></div>';
			}
			$name='';
			$email='';
			$sub='';
			$phone='';
			$message='';
		
		}
		
	}
		
?>
<!doctype html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="doorhome.css">
	<link rel="stylesheet" href="contact_us.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 	
	<script src="https://use.fontawesome.com/84065b6a48.js"></script>
	<title>Contact Us - DOOR CAD ENGINEERING</title>
	<link rel="icon" href="Infodata/doorlogo.png" type="image/icon">
	
</head>
<body>
	<nav id="bgC" class="navbar navbar-expand-lg navbar-light bg-light">
  		<a href="index.html"><img id="logo" class="img-fluid" src="Infodata/doorlogo.png"></a>  
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  		</button>
  		<div class="collapse navbar-collapse" id="navbarNav">
    			<ul class="navbar-nav  mx-auto">
      				<li class="nav-item">
        				<a class="marginLeft nav-link" href="index.html">About Us</a>
      				</li>
      				<li class="nav-item">
        				<a class="marginLeft nav-link" href="sector.html">Sectors</a>
      				</li>
      				<li class="nav-item">
        				<a class="marginLeft nav-link" href="corporate.html">Corporate Training</a>
      				</li>
      				<li class="nav-item">
        				<a class="marginLeft nav-link" href="career.html">Career</a>
      				</li>
      				<li class="nav-item active">
        				<a class="marginLeft nav-link" href="#signin">Contact Us<span class="sr-only">(current)</span></a>
      				</li>
    			</ul>
  		</div>
	</nav>
	
	<div class="container">
	
		<h1 class="text-center">Drop Us A Message</h1>
		<h2 class="text-center">Please feel free to say anything to us. Our staff will reply as soon as possible.</h2>
		<div id="signin">
			<div><?php echo $sM.$error; ?></div>
			<form method=post>
                <div class="form-group row">
                    <label for="name" class="col-sm-4 col-form-label">Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Deepika R">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" name="email" placeholder="deepikar@gmail.com">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-4 col-form-label">Contact Number</label>
                    <div class="col-sm-8">
                        <input type="tel" id="phone" name="phone" pattern="+[0-9]{12}" placeholder="+912345676543">
                    </div>
                </div>
				<div class="form-group row">
                    <label for="sub" class="col-sm-4 col-form-label">Title</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="sub" name="sub">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="message" class="col-sm-4 col-form-label">Your Message</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="message" name="message" rows="5"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn">Send</button>
                    </div>
                </div>
            </form>
        </div>
		<div>
			<div class="marginTop">
				<h4><i class="fa fa-address-book" data-toggle="tooltip" data-placement="bottom" title="Address" aria-hidden="true"></i>
				ADDRESS</h4>
				<b>Land Mark: Oppt to Unoin Bank,</b><br>
				No: 65, Station Road,<br>
				Radha Nagar,<br>
				Chromepet,<br>
				Chennai-600044,<br>
				Tamil Nadu.
			</div>
			
			<div class="marginTop">
				<h4><a href="https://api.whatsapp.com/send/?phone=%2B919345574894&text=Hello!&type=phone_number&app_absent=0"><i class="fa fa-whatsapp" data-toggle="tooltip" data-placement="bottom" title="Whatsapp Number" aria-hidden="true"></i></a>
				PHONE</h4>
				<p><a href="tel:+919345574894">+91-93455 74894</a></p>
			</div>
			<div class="marginTop">
				<h4><i class="fa fa-envelope" data-toggle="tooltip" data-placement="bottom" title="Email ID" aria-hidden="true"></i>
				EMAIL</h4>
				<a href="mailto:doorcad@gmail.com">doorcad@gmail.com</a>
			</div>
			<div class="marginTop">
				<h4><i class="fa fa-laptop" data-toggle="tooltip" data-placement="bottom" title="Social Media" aria-hidden="true"></i>
				FOLLOW US ON THE SOCIAL MEDIA</h4>
				<a href="https://www.facebook.com/DOORCADEngineering"><i class="fa fa-facebook-square" data-toggle="tooltip" data-placement="bottom" title="Facebook" aria-hidden="true"></i></a>
				<a href="https://www.linkedin.com/company/doorcad"><i class="fa fa-linkedin-square" data-toggle="tooltip" data-placement="bottom" title="LinkedIn" aria-hidden="true"></i></a>
			</div>
		</div>
		<div>
			<img src="map.png" id="imgMap">
		</div>
	</div>
				
	<footer id="contactFooter" class="text-center">
		<div>&#169; 2020 Door Cad Engineering</div>
	</footer>
					
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>