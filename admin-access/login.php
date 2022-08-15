<?php

    session_start();

    include('db.php');
    
    $error="";
    
    if($_POST) {
        
        $error="";
        
        $email = $_POST["email"];
        
        $password = password_hash($_POST["password"] , PASSWORD_DEFAULT);
        
        if (!$email){
            
            $error.= "*Please enter your email address!<br>"; 
            
        }
        
        if (!$_POST["password"]){
            
            $error.= "*Please enter your password!<br>";
            
        }
        
        if ($error != "") {
            
            $error = '<div class="alert alert-danger text-center" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';
            
        }
        
        else if ($email && $_POST["password"]){
            
            $query = "SELECT `email` FROM `admins` WHERE email = '".mysqli_real_escape_string($link, $email)."'";
            
            if($result=mysqli_query($link,$query)) {
            
                $row = mysqli_fetch_array ($result);
                
                if ($row[0] == $email) {
                    
                    $query = "SELECT `password` FROM `admins` WHERE email = '".mysqli_real_escape_string($link, $email)."'";
            
                    if($result1 = mysqli_query($link,$query)) {
                       
                        $row1 = mysqli_fetch_array ($result1);
                        
                        if(password_verify($_POST['password'] , $row1[0])){
                                
                            $_SESSION['email']=$email;
                    
                            header("Location:data.php");
                    
                        } else {
                    
                            $error.= "*Invalid Password!<br>";
                            if ($error != "") {
            
                                $error = '<div class="alert alert-danger text-center" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';
            
                            }
                        
                        }
                
                    } else {
        
                    $error.="*The email ID is not registered.";
                        if ($error != "") {
            
                            $error = '<div class="alert alert-danger text-center" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';
            
                        }
                
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
        
        <title>Admin Login</title>
	    
	<link rel="icon" href="../Infodata/doorlogo.png" type="image/icon">

 	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 	
    <script type="text/javascript" src="jquery.min.js"></script>
        
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
                
            margin:30px 0px;
                
        }

	    .container{
                
			width:700px;
                
        }
 
	
        .btn{
            
            position:relative;
            left:43%;
            
        }
        
        .text-center{
            
             color:#AB2526;
             background:white;
             padding:7px;
            
        }
        
        a{
            color:grey;
        }

    </style>
	
    </head>
    
    <body>
        <h1 class="text-center"><b>Door Cad Engineering</b></h1>
        <div class="container" id="middle">
            
            <h1 id="heading">Admin</h1>
            
            <div><?php echo $error; ?></div>
            
            <form method="post">
    
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your Email ID">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
                    <input type="submit" value="Log In" class="btn btn-danger">
                    <a href="forget_password.php">Forgot password</a>
                
            </form>
            
        </div>

       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        
    </body>
    
</html>