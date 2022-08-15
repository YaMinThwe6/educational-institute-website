<?php

    session_start();

    include('db.php');
    
    $error="";
    
    if($_POST) {
        
        $error="";
        
        $email = $_POST["email"];
        
        if (!$email]){
            
            $error.= "*Please enter your email ID!<br>";
            
        }
        
        if ($error != "") {
            
            $error = '<div class="alert alert-danger text-center" role="alert">' . $error . '</div>';
            
        }
        
        else if ($email){
            
            $query = "SELECT `email` FROM `admins` WHERE email = '".mysqli_real_escape_string($link, $email)."'";
            
            if($result=mysqli_query($link,$query)) {
            
                $row = mysqli_fetch_array ($result);
                
                if ($row[0] == $email) {
                    
                    
                    
                    
                } else {
        
                    $error.="*The email ID is not registered.";
                    if ($error != "") {
            
                        $error = '<div class="alert alert-danger text-center" role="alert">' . $error . '</div>';
            
                    }
                
                }  
                
            }
            
        }
        
    }    
            
?>
<!doctype html>

<html lang="en">
    
    <head>
        
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Recover My Account</title>
	    
	<link rel="icon" href="../Infodata/doorlogo.png" type="image/icon">

 	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 	
    <script type="text/javascript" src="../jquery.min.js"></script>
        
	<style type="text/css">
	
		         
        body{
                
            padding:0;
            margin:0;
            font-family:Arial, Helvetica, sans-serif;
            background-image:url("../review/cad.jpg");
            background-size:cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
                
        }
            
        #heading{
                
            color:#AB2526;
            text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;
            text-align:center;
                
        }
            
        #middle{
                
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background:rgb(0,0,0,0.5);
            padding:20px;
                
        }
            
        input{
                
            margin:30px 0px 10px 0px;
                
        }

	    .container{
                
			width:350px;
                
        }
 
	
        .btn{
            
            position:relative;
            left:32%;
            
        }
        
        .text-center{
            
             color:#AB2526;
             background:white;
             padding:7px;
            
        }

    </style>
	
    </head>
    
    <body>
        <h1 class="text-center"><b>Door Cad Engineering</b></h1>
        <div class="container" id="middle">
            
            <h4 id="heading">Recover Your Account</h4>
            
            <div><?php echo $error; ?></div>
            
            <form method="post">
    
                    <input type="email" name="email" class="form-control" id="email" placeholder="Registered Email ID">
                    <input type="submit" value="Send Mail!" class="btn btn-danger">
                
            </form>
            
        </div>

       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        
    </body>
    
</html>