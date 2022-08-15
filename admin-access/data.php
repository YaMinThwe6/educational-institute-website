<?php

    session_start();
    
    include('db.php');
    
    if($_SESSION['email']){
    
        if($_POST){
            
            if($_POST['logout']) {
                session_destroy();
                unset($_SESSION['email']);
                header('location:login.php');
            }
            
        }    
    
    } else {
    
        header("Location:login.php");
        
    }

?>
<!doctype html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script type="text/javascript" src="../jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="../doorhome.css"> 	
	<script src="https://use.fontawesome.com/84065b6a48.js"></script>
	<title>Door Cad Engineering</title>
	<link rel="icon" href="../Infodata/doorlogo.png" type="image/icon">
	<style type="text/css">
	    
	    .text-right{
	        
	        float:right;
	        
	    }
	    
	</style>

</head>
<body>
	<nav id="bgC" class="navbar navbar-expand-lg navbar-light bg-light">
  		<a href="../index.html"><img id="logo" class="img-fluid" src="../Infodata/doorlogo.png"></a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  		</button>
  		<div class="collapse navbar-collapse" id="navbarNav">
    			<ul class="navbar-nav  mx-auto">
      				<li class="nav-item">
        				<a class="marginLeft nav-link" href="../index.html">About Us</a>
      				</li>
      				<li class="nav-item">
        				<a class="marginLeft nav-link" href="../sector.html">Sectors</a>
      				</li>
      				<li class="nav-item">
        				<a class="marginLeft nav-link" href="../corporate.html">Corporate Training</a>
      				</li>
      				<li class="nav-item">
        				<a class="marginLeft nav-link" href="../career.html">Career</a>
      				</li>
      				<li class="nav-item">
        				<a class="marginLeft nav-link" href="../contact_us.php">Contact Us</a>
      				</li>
    			</ul>
  		</div>
	</nav>
	<div class="container">
		<div class="table-responsive">
			<h1 class="text-center">Client's Queries</h1>
			<div class="text-right">
				<form method="post"><input name="logout" type="submit" class="btn btn-secondary" value="Log Out"></form>
			</div>
			<div class="text-center">
				<button type="button" name="load_data" id="load_data" class="btn btn-info">Load</button>
			</div><br />
			<div id="client_data">
			
			</div>
		</div>
	</div>
	<div id="nav2">
		<p id="footerHead">DOOR CAD ENGINEERING Training and Service</p>
		<div class="wrapper1">
			<div>
				<ul>
					<li><a class="footerMenu" href="../index.html">About Us</a></li>
					<li><a class="footerMenu" href="../sector.html">Sectors</a></li>
					<li><a class="footerMenu" href="../corporate.html">Corporate Training</a></li>
					<li><a class="footerMenu" href="../career.html">Career</a></li>
					<li><a class="footerMenu" href="../contact_us.php ">Contact Us</a></li>
				</ul>
			</div>
			<div>
				<p class="navBot" id="footerContact">Contact Us</p>
				<address  class="navBot" id="address">
					<a class="fontawesome" href="#"><i class="fa fa-address-book" data-toggle="tooltip" data-placement="bottom" title="Address" aria-hidden="true"></i></a>
					<b>Land Mark: Oppt to Unoin Bank,</b><br>
					No: 65, Station Rd,Radha Nagar,<br>
					Chromepet,<br>
					Chennai-600044,<br>
					Tamil Nadu.
				</address>
				<a class="fontawesome" href="#"><i class="fa fa-whatsapp" data-toggle="tooltip" data-placement="bottom" title="Whatsapp Number" aria-hidden="true"></i></a><a href="tel:+919345574894" class="navBot">+91-93455 74894</a><br>
				<a class="fontawesome" href="#"><i class="fa fa-envelope" data-toggle="tooltip" data-placement="bottom" title="Email ID" aria-hidden="true"></i></a><a href="mailto:doorcad@gmail.com" class="navBot">doorcad@gmail.com</a>
				<a class="fontawesome" href="https://www.facebook.com/DOORCADEngineering"><br><i class="fa fa-facebook-square" data-toggle="tooltip" data-placement="bottom" title="Facebook" aria-hidden="true"></i></a>
				<a class="fontawesome" href="#"><i class="fa fa-linkedin-square" data-toggle="tooltip" data-placement="bottom" title="LinkedIn" aria-hidden="true"></i></a>
			</div>	
		</div>
	</div>
	
	<footer class="text-center">
		<div>&#169; 2020 Door Cad Engineering</div>
	</footer>
	
	<script type="text/javascript">

		$(document).ready(function(){
			$("#load_data").click(function(){
				$.ajax({
					url:"contact_us.csv",
					dataType:"text",
					success:function(data){
						var client_data = data.split(/\r?\n|\r/);
						var table_data = '<table class="table table-bordered table-striped">';
						for(var count=0; count< client_data.length; count++) {
							var cell_data = client_data[count].split(",");
							table_data += '<tr>';
							for(var cell_count = 0;cell_count < cell_data.length;cell_count++) {
								if(count===0){
									table_data +='<th>'+cell_data[cell_count]+'</th>';
								}
								else {
									table_data +='<td>'+cell_data[cell_count]+'</td>';
								}
							}
							table_data +='</tr>';
						}
						table_data += '</table>';
						$("#client_data").html(table_data);
					}
				});
			});
		});
	
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>