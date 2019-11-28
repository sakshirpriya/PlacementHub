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
   
<br>
<!-- Mentor command start here -->
<div class="card-deck">
    <div class="card shadow-lg mb-5 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-warning btn-sm"><h2>Check Request</h2></button>
    <img src="../image/cvcheck.png" height="250px" class="card-img-top" alt="cv_check">
  
      <button type="button" class="btn btn-info btn-sm" style="margin-top: -30px;"><a href="gd_Request.php">Click Here</a></button>
  </div>
  <div class="card shadow-lg mb-5 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-warning btn-sm"><h2>Create Room</h2></button>
    <img src="../image/createtest.png" height="250px" class="card-img-top" alt="create_test">
   

   
      <button type="button" class="btn btn-info btn-sm" style="margin-top: -30px;"><a href="gd_room.php">Click Here</a></button>
 
  </div>
  <div class="card shadow-lg mb-5 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-warning btn-sm"><h2>GD TimeTable</h2></button>
    <img src="../image/gdroom.png"  height="250px" class="card-img-top" alt="GD_Room">
   
      <button type="button" class="btn btn-info btn-sm" style="margin-top: -30px;"><a href="gd_timetable.php">Click Here</a></button>
  </div>

</div>
<div class="card-deck">
     <div class="card shadow-lg mb-5 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-warning btn-sm"><h2>Give Feedback</h2></button>
    <img src="../image/gdroom.png"  height="250px" class="card-img-top" alt="GD_Room">
   
      <button type="button" class="btn btn-info btn-sm" style="margin-top: -30px;"><a href="gd_feedback.php">Click Here</a></button>
  </div>
  <div class="card shadow-lg mb-5 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-warning btn-sm"><h2>Your Feedback</h2></button>
    <img src="../image/gdroom.png"  height="250px" class="card-img-top" alt="GD_Room">
   
      <button type="button" class="btn btn-info btn-sm" style="margin-top: -30px;"><a href="your_feedback.php">Click Here</a></button>
  </div>
  <div class="card shadow-lg mb-5 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-warning btn-sm"><h2>GD Dashboard</h2></button>
    <img src="../image/gdroom.png"  height="250px" class="card-img-top" alt="GD_Room">
   
      <button type="button" class="btn btn-info btn-sm" style="margin-top: -30px;"><a href="gd_feedback.php">Click Here</a></button>
  </div>
</div>


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