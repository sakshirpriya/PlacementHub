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
 $student_email=$_SESSION["student_email"];
if(isset($_REQUEST["Request_PI"])){
$mentor_email=$_REQUEST["mentor_email"];
 $SearchName="SELECT * from MentorData WHERE email='$mentor_email'";
 $data=mysqli_query($conn,$SearchName);
 $row = mysqli_fetch_assoc($data);
 $MentorName=$row["name"];
$RequestMessage=$_REQUEST["RequestMessage"];
if($mentor_email == NULL || $RequestMessage==NULL){
 $message ="Please Fill All Fields !!!";
 echo "<script type='text/javascript'>alert('$message');</script>";
}else{
	$insert="INSERT INTO PersonalInterview (mentor_email,requestmessage,student_email,schedule,mentorname) VALUES ('$mentor_email','$RequestMessage','$student_email',false,'$MentorName')";
$result=mysqli_query($conn,$insert);
if($result){

 $message ="Your Request has been submitted!!!";
 echo "<script type='text/javascript'>alert('$message');</script>";
}else{

 $message ="Something went wrong!!!";
 echo "<script type='text/javascript'>alert('$message');</script>";
}
}

}






  //$message =$_SESSION["email"];
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
	<?php include 'component/NavBar.php'; ?>
  <?php include 'component/index_edit.php'; ?>
 

	<hr>
  <div class="container-fluid">

    <!-- Main Body Start here -->
    <div class="row">
      <!-- first Dev Block starts here -->
      <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 ">

    
    </div>
     
      <!-- first Dev Block ends here -->



      <!-- second Div Block starts Here -->
      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
          <h1 class="text-center">Welcome to Request Personal Interview</h1>
          <h4 class="text-center">**Please Fill Details.</h4>
          <br><br>
          <form method="post" enctype="multipart/form-data">
				<fieldset class="scheduler-border">
    <legend class="scheduler-border">Choose Mentor & Do Request</legend>
			<div class="form-group">
				<select name="mentor_email" class="custom-select my-1 mr-sm-2">
					<option selected>Choose Mentor</option>
					<?php 
					$email =$_SESSION["student_email"];
					//echo "<script type='text/javascript'>alert('$email');</script>";

					$Search="SELECT follower_list.mentor_email as mentor_email,MentorData.name as name FROM follower_list INNER JOIN MentorData on follower_list.mentor_email = MentorData.email WHERE student_email='$email' AND follow_status=true";
					$result=mysqli_query($conn,$Search);
					while($row=mysqli_fetch_array($result)){
						echo "<option value='".$row["mentor_email"]."'>".$row["name"]."</option>";
					}
					?>
				</select>
			</div>
		
			<div class="form-group">
				<input type="text" name="RequestMessage" class="form-control"  placeholder="Request Message">
			</div>
			<div class="text-center">
				<button type="submit" name="Request_PI" class="btn btn-success">Make Request!!!</button>
				
			</div>
		</fieldset>
		</form>
      </div>
       
      <!-- Third Div Block Starts Here -->
      <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">


      </div>
      <!-- Third Div Block Ends Here -->
    </div>
    <!-- Main Body End Here -->


</div>	


<?php include '../utility/js/placementhub_4.3.1.php'; ?>
</body>
</html>