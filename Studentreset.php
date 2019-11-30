<?php
include 'DataBase/DB_Connection.php';
 $conn = OpenCon();
 session_start();
if($_GET['EMAIL'] && $_GET['OTP'])
{
  $email=$_GET['EMAIL'];
  $otp=$_GET['OTP'];
  $select="SELECT email,otp from StudentAuth where email='$email' AND otp='$otp'";
  $result=mysqli_query($conn,$select);
  $num_rows = mysqli_num_rows($result);
  if($num_rows)
  {$_SESSION["email"]=$email;
    echo "<script>
  window.location.href='StudentChangePassword.php';
  </script>";
  }else{
    $message = "Invalid Link!!!!";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
}
if(isset($_REQUEST["StudentChangePassword"])){
$email=$_SESSION["EMAIL"];
    echo "<script type='text/javascript'>alert('$email');</script>";

   $password1= md5(mysqli_real_escape_string($conn, $_REQUEST["Password1"]));
    echo "<script type='text/javascript'>alert('$password1');</script>";

  $password2= md5(mysqli_real_escape_string($conn, $_REQUEST["Password2"]));
    echo "<script type='text/javascript'>alert('$password2');</script>";

  $otp= mysqli_real_escape_string($conn, $_REQUEST["otp"]);
    echo "<script type='text/javascript'>alert('$otp');</script>";

  if($password1 == NULL || $password2 == NULL || $otp==NULL){
    $message = "Some Requried field(*) is Empty!";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }else{
     if($password2!==$password1){
      $message = "I am afraid that password is not matching!!!";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }else{
      $Search="SELECT otp FROM StudentAuth WHERE email='$email'";
      $result=mysqli_query($conn,$Search);
      while ($row = mysqli_fetch_array($result)) {
        $x=$row["otp"];
        echo "<script type='text/javascript'>alert('$x');</script>";
     
        if($row["otp"]==$otp){
          $otp=0;
          $InsertOTP = "UPDATE StudentAuth SET otp='$otp' , password1='$password1',password2='$password2' WHERE email='$email'";
    
    if(mysqli_query($conn,$InsertOTP)){
      $message = "Your Password has been changed, Please Login...";
      echo "<script type='text/javascript'>alert('$message');</script>";
      echo "<script>
  window.location.href='index.php';
  </script>";
    }else{
      $message = "Something went wrong";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
  }else{
 $message = "Invalid OTP";
      echo "<script type='text/javascript'>alert('$message');</script>";
  }
      }
      
    }
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

      <title>Reset Now!!!!</title>
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

    <?php
    
if(isset($_SESSION["EMAIL"])){
echo "<div class='container'>
      <div class='row'>
        <div class='col-xl-3 col-lg-3 col-md-3 col-sm-12'></div>
        <div class='col-xl-6 col-lg-6 col-md-12 col-sm-12' style='margin-top: 100px;'>
<form>
  <div class='text-center'>
  <img src='image/forgot-pwd.png' align='center' alt='Forget Password'>
</div>
<fieldset class='scheduler-border'>
    <legend class='scheduler-border'>Reset Now</legend>
  <div class='form-group' style='margin-top: 25px;'>
    <small id='emailHelp' class='form-text text-muted'>Please never share your email with anyone else.</small>
    <input type='text' class='form-control' name='otp'  placeholder='enter otp'><br>

    <small id='emailHelp' class='form-text text-muted'>Please make password with alphanumeric.</small>
    <input type='Password' class='form-control' name='Password1'  placeholder='enter password'><br>
    <small id='emailHelp' class='form-text text-muted'>Please make password with alphanumeric.</small>
    <input type='Password' class='form-control' name='Password2'  placeholder='confirm password'>
   
  </div>
  <div class='text-center'>
  <button type='submit' name='StudentChangePassword' class='btn btn-success' >Change Password</button>
    
  </div>
</fieldset>
</form>

        </div>
        <div class='col-xl-3 col-lg-3 col-md-3 col-sm-12'></div>
      </div>
    </div>"
;
}

?>
  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>