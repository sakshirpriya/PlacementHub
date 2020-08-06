<?php
include '../DataBase/DB_Connection.php';
session_start();
$conn=OpenCon();
if(!isset($_SESSION["mentor_email"])){
	echo "<script>
	window.location.href='../index.php';
	alert('unauthrise access');
	</script>";
}
 // $message =$_SESSION["email"];
 // echo "<script type='text/javascript'>alert('$message');</script>";
if(isset($_REQUEST["notify"])){
  $date= date("Y-m-d");
  $time=date("H:m:s");
  $mentor_email=$_SESSION["mentor_email"];
 
  $Notification=$_REQUEST["Notification"];
  if($Notification){
    $Insert="INSERT INTO Notifications (mentor_email,notification,date,time)VALUES ('$mentor_email','$Notification','$date','$time')";
    if(mysqli_query($conn,$Insert)){
      $message="We Pushed Your Notification To All Students.";
  echo "<script type='text/javascript'>alert('$message');</script>";
}else{
  $message="Something Went Wrong, Please Try Again!!!";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
  
  }else{
  $message ="Please Add Notification Message, It Can not Empty";
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
    <link rel="icon" href="../image/title_logo.png" type="image/x-icon">
  
	<?php include '../utility/css/placementhub_4.3.1.php'; ?>
</head>
<body>
	<?php include 'component/NavBar.php'; ?>
	<hr>
  <div class="container-fluid">


    <!-- Main Body Start here -->
    <div class="row">
      <!-- first Dev Block starts here -->
      <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 ">
   <?php include 'component/side_profile_card.php'; ?>
    </div>
    <!-- first Dev Block ends here -->


    <!-- second Div Block starts Here -->
    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
<?php include 'HeaderDashboard/HeaderDashBoard.php'; ?>
<form> 
	<div class="form-group">
    <label for="exampleFormControlTextarea1"><h3>Push Notification to all Students.{<b>Only Followers.</b>}</h3></label>
    <textarea class="form-control shadow-lg mb-3 bg-white rounded" name="Notification" rows="4"></textarea>
  </div>
  <button type="submit" name="notify" class="btn btn-primary float-right">Submit</button>
</form><br><br>
<br>
<!-- Mentor command start here -->
<div class="card-deck">
  <div class="card shadow-lg mb-5 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-warning btn-sm"><h2>Create Test</h2></button>
    <img src="../image/createtest.png" height="250px" class="card-img-top" alt="create_test">
    
   
      <button type="button" class="btn btn-info btn-sm" style="margin-top: -30px;"><a href="create_test_index.php" style="color: white;">CHECK ALL</a></button>
 
  </div>
  <div class="card shadow-lg mb-5 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-warning btn-sm"><h2>GD Room</h2></button>
    <img src="../image/gdroom.png"  height="250px" class="card-img-top" alt="GD_Room">
    
    
      <button type="button" class="btn btn-info btn-sm" style="margin-top: -30px;"><a href="gd_index.php" style="color: white;">CHECK ALL</a></button>
  </div>
  <div class="card shadow-lg mb-5 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-warning btn-sm"><h2>Check CV</h2></button>
    <img src="../image/cvcheck.png" height="250px" class="card-img-top" alt="cv_check">
    
   
      <button type="button" class="btn btn-info btn-sm" style="margin-top: -30px;"><a href="cvCheck/index.php" style="color: white;">CHECK ALL</a></button>
  </div>
</div>
<!-- ************************************************** -->
<div class="card-deck">
  <div class="card shadow-lg mb-5 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-warning btn-sm"><h2>Take Interview</h2></button>
    <img src="../image/take_interview.png" height="250px" class="card-img-top" alt="take_Interview">
       
      <button type="button" class="btn btn-info btn-sm" style="margin-top: -30px;"><a href="PI_Request.php" style="color: white;">CHECK ALL</a></button>
  </div>
 <div class="card shadow-lg mb-5 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-warning btn-sm"><h2>Notifications</h2></button>
    <img src="../image/must_do_ques.jpg"  height="250px" class="card-img-top" alt="must_do_ques">
    
   
     <button type="button" class="btn btn-info btn-sm" style="margin-top: -30px;"><a href="Notification.php" style="color: white;">CHECK ALL</a></button>
  </div>
  <div class="card shadow-lg mb-5 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-warning btn-sm"><h2>View Ratings</h2></button>
    <img src="../image/search.jpg" height="250px" class="card-img-top" alt="search">
   
   
      <button type="button" class="btn btn-info btn-sm" style="margin-top: -30px; "><a href="ViewRatings/ViewRatings.php" style="color: white;">CHECK ALL</a></button>
  </div>
</div>
<!-- Mentor command end here -->

</div>
<!-- second Div Block Ends Here -->


<!-- Third Div Block Starts Here -->
<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
 
  <?php include 'component/about_and_message_card.php'; ?>

</div>
<!-- Third Div Block Ends Here -->
</div>
<!-- Main Body End Here -->


</div>	


<?php include '../utility/js/placementhub_4.3.1.php'; ?>
</body>
</html>