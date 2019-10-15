<?php
include '../DataBase/DB_Connection.php';
session_start();
$conn=OpenCon();
if(!isset($_SESSION["student_email"])){
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
  <style>
    .datacss{
          margin-left: 10px;
    }
  </style>
</head>
<body>
	<?php include 'component/NavBar.php'; ?>
  <?php include 'component/index_edit.php'; ?>
  <?php 
$email=$_SESSION["student_email"];
//echo "<script type='text/javascript'>alert('$email');</script>";

$query="SELECT * FROM StudentData WHERE email='$email'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
 //$message = $row["email"];
 //echo "<script type='text/javascript'>alert('$message');</script>";

 ?>  

	<hr>
  <div class="container-fluid">

    <!-- Main Body Start here -->
    <div class="row">
      <!-- first Dev Block starts here -->
      <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 ">
<div class="card shadow-lg mb-3 bg-white rounded" >
    <button type="button" style="width: 100%;" class="btn btn-info btn-sm"><h2 class="float-left">Personal Information </h2><i class="fa fa-pencil fa-2x float-right"  data-toggle="modal" data-target="#PersonalData"  style="margin-right: 10px;margin-top: 7px;cursor: -webkit-grab; cursor: grab;" ></i></button>
     <div style="margin-top: 10px;margin-left: 10px;margin-right: 10px;">
      <div>
     <i class="fa fa-user-circle-o fa-2x"></i><span class="datacss"><?php echo $row["name"]; ?> </span></div><hr>
                <div><i class="fa fa-birthday-cake fa-2x"></i><span class="datacss"> <?php echo $row["dob"]; ?> </span></div><hr>
                <div><i class="fa fa-envelope fa-2x"></i><span class="datacss"> <?php echo $row["email"]; ?> </span></div><hr>
                <div><i class="fa  fa-phone fa-2x"></i><span class="datacss"><?php echo $row["mobile_no"]; ?> </span></div><hr>
                 <div><i class="fa fa-male fa-2x"></i><span class="datacss"><?php echo $row["father_name"]; ?> </span></div><hr>
                <div><i class="fa fa-female fa-2x"></i><span class="datacss"><?php echo $row["mother_name"]; ?> </span></div><hr>
                <div><i class="fa fa-home fa-2x"></i><span class="datacss"><?php echo $row["address"]; ?> </span></div></div><br
          >
                

    
  </div>
  <div class="card shadow-lg mb-3 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-info btn-sm"><h2 class="float-left">Collage Academics</h2><i class="fa fa-pencil fa-2x float-right"  data-toggle="modal" data-target="#CollageData"  style="margin-right: 10px;margin-top: 7px;cursor: -webkit-grab; cursor: grab;" ></i></button>
    <div style="margin-top: 10px;margin-left: 5px">
     <div><i class="fa  fa-graduation-cap fa-2x"></i><span class="datacss"><?php echo $row["college_name"]; ?> </span></div><hr>
     <div><i class="fa fa-book fa-2x"></i><span class="datacss"><?php echo $row["branch"]; ?> </span></div><hr>
     <div><i class="fa fa-id-card fa-2x"></i><span class="datacss"><?php echo $row["registration_no"]; ?> </span></div><hr>
     <div><i class="fa fa-bar-chart fa-2x"></i><span class="datacss"><?php echo $row["current_cgpa_percentage"]; ?> </span></div><hr>
     <div><i class="fa fa-calendar-check-o fa-2x"></i><span class="datacss"> <?php echo $row["passing_year"]; ?> </span></div><br
>
    </div>
  </div>
  <div class="card shadow-lg mb-3 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-info btn-sm"><h2 class="float-left">XII Academics</h2><i class="fa fa-pencil fa-2x float-right"  data-toggle="modal" data-target="#XIIData"  style="margin-right: 10px;margin-top: 7px;cursor: -webkit-grab; cursor: grab;" ></i></button><div style="margin-top: 10px;margin-left: 5px">
<div><i class="fa fa-university fa-2x"></i><span class="datacss"><?php echo $row["xii_school"]; ?></span></div><hr>
      <div><i class="fa fa-bar-chart fa-2x"></i><span class="datacss"><?php echo $row["xii_percentage"] .'  %'; ?></span></div><hr>
    <div><i class="fa fa-list-ul fa-2x"></i><span class="datacss"><?php echo $row["xii_board"]; ?></span></div><hr>
     <div><i class="fa fa-calendar-check-o fa-2x"></i><span class="datacss"><?php echo $row["xii_year"]; ?></span></div>
     
            </div>  <br
      >  
               
    
  </div>
   <div class="card shadow-lg mb-3 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-info btn-sm"><h2 class="float-left">X Academics</h2><i class="fa fa-pencil fa-2x float-right"  data-toggle="modal" data-target="#XData"  style="margin-right: 10px;margin-top: 7px;cursor: -webkit-grab; cursor: grab;" ></i></button>
     <div style="margin-top: 10px;margin-left: 5px">
      <div><i class="fa fa-university fa-2x"></i><span class="datacss"><?php echo $row["x_school"]; ?></span></div><hr>
      <div><i class="fa fa-bar-chart fa-2x"></i><span class="datacss"><?php echo $row["x_percentage"]; ?></span></div><hr>
    <div><i class="fa fa-list-ul fa-2x"></i><span class="datacss"><?php echo $row["x_board"]; ?></span></div><hr>
     <div><i class="fa fa-calendar-check-o fa-2x"></i><span class="datacss"><?php echo $row["x_year"]; ?></span></div>
    </div><br>
  </div>
   <div class="card ">
    <button type="button" style="width: 100%;" class="btn btn-info btn-sm"><h2 class="float-left">Media</h2><i class="fa fa-pencil fa-2x float-right"  data-toggle="modal" data-target="#MediaData"  style="margin-right: 10px;margin-top: 7px;cursor: -webkit-grab; cursor: grab;" ></i></button>
   <div class="text-center">
          <a href="<?php echo $row['linkedin']; ?>" target="_blank" ><i class="fa fa-linkedin-square fa-3x" style="color: #1c85bd"></i></a>
          <a href="<?php echo $row['github']; ?>" target="_blank" ><i class="fa fa-github-square fa-3x" style="color: #0a0a0a"></i></a>
          <a href="<?php echo $row['facebook']; ?>" target="_blank" ><i class="fa fa-facebook-official fa-3x" style="color: #165bc9;"></i></a>
          <a href="<?php echo $row['twitter']; ?>" target="_blank" ><i class="fa fa-twitter-square fa-3x" style="color: #0eaeed"></i></a>
        </div><br
  >
    
  </div>
      </div>
      <!-- first Dev Block ends here -->



      <!-- second Div Block starts Here -->
      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
          <?php echo '  

         <img src="data:image/jpeg;base64,'.base64_encode($row['cover'] ).' "style="width: 100%;height: 250px;""/>  

         ';?>
            
            <?php echo '  

         <img src="data:image/jpeg;base64,'.base64_encode($row['profilepic'] ).'"  width="160px" height="150px" style="border: 2px solid white;border-radius: 70%;margin-left: 50px;margin-top: -75px;""/>  

         ';?>
            <button class="btn btn-info" data-toggle="modal" data-target="#editProfile" style="float: right;border-radius: 25px;border: 1px solid grey; margin-top: 35px;">Edit Profile</button>
           
           <hr><hr><br>

   <!-- *************************************************************** -->


<!-- student command start here -->
<!-- first three card start here -->
<div class="card-deck" style="margin-top: 5px;">
  <div class="card shadow-lg mb-5 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-success btn-sm"><h2>Request gd Room</h2></button>
    <img src="../image/createtest.png" height="150px" class="card-img-top" alt="create_test">
    <div class="card-body">
      <h5 class="card-title"><b>Key Notes:</b></h5>
      <p class="card-text">
        <ul>
          <li>You can create different kind of test.</li>
          <li>You need to set marking schema.</li>
          <li>Every test will have separate dashboard.</li>
        </ul>
      </p>
    </div>
   
      <button type="button" class="btn btn-success btn-sm" style="margin-top: -30px;"><a href="create_test_index.php">Know More...</a></button>
 
  </div>
  <div class="card shadow-lg mb-5 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-success btn-sm"><h2>Check TimeTable</h2></button>
    <img src="../image/gdroom.png"  height="150px" class="card-img-top" alt="GD_Room">
    <div class="card-body">
      <h5 class="card-title"><b>Key Notes:</b></h5>
      <p class="card-text">
        <ul>
          <li>Request For GD Room.</li>
          <li>Check Time and Date.</li>
          <li>Check Your Result.</li>
        </ul>
      </p>
    </div>
    
      <button type="button" class="btn btn-success btn-sm" style="margin-top: -30px;"><a href="gd_room.php">Know More...</a></button>
  </div>
  <div class="card shadow-lg mb-5 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-success btn-sm"><h2>GD DashBoard</h2></button>
    <img src="../image/cvcheck.png" height="150px" class="card-img-top" alt="cv_check">
    <div class="card-body">
     <h5 class="card-title"><b>Key Notes:</b></h5>
      <p class="card-text">
        <ul>
          <li>Download student CV.</li>
          <li>Provide feedback on CV.</li>
          <li>Give others CV for reference.</li>
        </ul>
      </p>
    </div>
   
      <button type="button" class="btn btn-success btn-sm" style="margin-top: -30px;">Know More...</button>
  </div>
</div>
<!-- first three cards ends here -->



<!-- ************************************************************ -->

        <!-- Mentor command end here -->
      </div>
      <!-- second Div Block Ends Here -->


      <!-- Third Div Block Starts Here -->
      <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
<div class="card ">
    <button type="button" style="width: 100%;" class="btn btn-info btn-sm"><h2>Take Interview</h2></button>
    <img src="../image/take_interview.png" height="250px" class="card-img-top" alt="take_Interview">
    <div class="card-body">
      <h5 class="card-title"><b>Key Notes:</b></h5>
      <p class="card-text">
        <ul>
          <li>Accept take interview request.</li>
          <li>Create Zoom Meeting ID.</li>
          <li>Share time and other details.</li>
        </ul>
      </p>
    </div>
    
      <button type="button" class="btn btn-info btn-sm" style="margin-top: -30px;">Know More...</button>
  </div>

      </div>
      <!-- Third Div Block Ends Here -->
    </div>
    <!-- Main Body End Here -->


</div>	


<?php include '../utility/js/placementhub_4.3.1.php'; ?>
</body>
</html>