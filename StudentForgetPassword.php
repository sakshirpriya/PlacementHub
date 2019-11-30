<?php 
include 'DataBase/DB_Connection.php';
$conn = OpenCon();
 session_start();

require 'vendor/autoload.php'; 
if(isset($_REQUEST["ForgetPassword"])){
	$EMAIL =$_REQUEST["email"];
	$OTP=mt_rand(100000,999999);
	//echo $OTP;
	$search="SELECT * FROM StudentAuth where email='$EMAIL'";
	$result=mysqli_query($conn,$search);
	$num_rows = mysqli_num_rows($result);
	if($num_rows){
		//Upadate otp in database
		$InsertOTP = "UPDATE StudentAuth SET otp='$OTP' WHERE email='$EMAIL'";
		
		if(mysqli_query($conn,$InsertOTP)){
			
			$API_KEY="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";
 
  $Subject= "Password Reset Link From PlacementHub";
  $Message= "Password Reset Link From PlacementHub"; 
  $email = new \SendGrid\Mail\Mail(); 
		$email->setFrom("maker.placementhub@gmail.com", "Password Reset");
		$email->setSubject($Subject);
		$email->addTo($EMAIL, $EMAIL);
		$email->addContent("text/plain", $Message);
		$email->addContent(
    "text/html", "<a href='http://13.126.165.2/Studentreset.php?EMAIL=".$EMAIL."&OTP=".$OTP."'>Click To Reset password</a><br>
      <h2>Your OTP : ".$OTP."</h2>"
    

);
$sendgrid = new \SendGrid($API_KEY);
if ($sendgrid->send($email)) {
 $message = "Please Check Your email for OTP or Reset Link!";
    echo "<script type='text/javascript'>alert('$message');</script>";
    $_SESSION["EMAIL"]=$EMAIL;
     echo "<script>
  window.location.href='Studentreset.php';
  </script>";
}



		}else{
			$message = "OTP NOT INSERTED!!!";
    echo "<script type='text/javascript'>alert('$message');</script>";
		}
		




	}
	else{
		$message = "Something went Wrong!!!!";
    echo "<script type='text/javascript'>alert('$message');</script>";
	}
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Forget Password !!!</title>
    <style>
	body{
		background-color: black;
		color: white;
	}
	fieldset.scheduler-border {
    border: 1px solid #e3dcdc;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

    legend.scheduler-border {
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;
        width:auto;
        padding:0 10px;
        border-bottom:none;
    }
</style>
  </head>
  <body>
    <div class="container">
    	<div class="row">
    		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12"></div>
    		<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" style="margin-top: 100px;">
<form>
	<div class="text-center">
	<img src="image/forgot-pwd.png" align="center" alt="Forget Password">
</div>
<fieldset class="scheduler-border">
    <legend class="scheduler-border">Forget Password</legend>
  <div class="form-group" style="margin-top: 25px;">
    
    <input type="email" class="form-control" name="email"  placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="text-center">
  <button type="submit" name="ForgetPassword" class="btn btn-primary" >Forget Password</button>
  	
  </div>
</fieldset>
</form>

    		</div>
    		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12"></div>
    	</div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>