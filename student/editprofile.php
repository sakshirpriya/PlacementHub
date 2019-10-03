<?php
 include '../DataBase/DB_Connection.php';
session_start();
$conn=OpenCon();
if(!isset($_SESSION["email"])){
	echo "<script>
window.location.href='../index.php';
alert('unauthrise access');
</script>";
}

if(isset($_REQUEST["submit"])){
	$today = date("Y-m-d"); 
	 echo "<script type='text/javascript'>alert('$today');</script>";

	$title= mysqli_real_escape_string($conn, $_REQUEST["title"]);
	 // echo "<script type='text/javascript'>alert('$title');</script>";
	$company= mysqli_real_escape_string($conn, $_REQUEST["company"]);
	 // echo "<script type='text/javascript'>alert('$company');</script>";
	$starting_date= mysqli_real_escape_string($conn, $_REQUEST["starting_date"]);
	 // echo "<script type='text/javascript'>alert('$starting_date');</script>";
	$location= mysqli_real_escape_string($conn, $_REQUEST["location"]);
	 // echo "<script type='text/javascript'>alert('$location');</script>";
	$job_type= mysqli_real_escape_string($conn, $_REQUEST["job_type"]);
	 // echo "<script type='text/javascript'>alert('$job_type');</script>";
	$duration= mysqli_real_escape_string($conn, $_REQUEST["duration"]);
	 // echo "<script type='text/javascript'>alert('$duration');</script>";
	$stippened= mysqli_real_escape_string($conn, $_REQUEST["stippened"]);
	 // echo "<script type='text/javascript'>alert('$stippened');</script>";
	$apply_by= mysqli_real_escape_string($conn, $_REQUEST["apply_by"]);
	 echo "<script type='text/javascript'>alert('$apply_by');</script>";
	$available_position= mysqli_real_escape_string($conn, $_REQUEST["available_position"]);
	 // echo "<script type='text/javascript'>alert('$available_position');</script>";
	$about_company= mysqli_real_escape_string($conn, $_REQUEST["about_company"]);
	 // echo "<script type='text/javascript'>alert('$about_company');</script>";
	$about_internship= mysqli_real_escape_string($conn, $_REQUEST["about_internship"]);
	 // echo "<script type='text/javascript'>alert('$about_internship');</script>";
	$who_can_apply= mysqli_real_escape_string($conn, $_REQUEST["who_can_apply"]);
	 // echo "<script type='text/javascript'>alert('$who_can_apply');</script>";
	$perks= mysqli_real_escape_string($conn, $_REQUEST["perks"]);
	 // echo "<script type='text/javascript'>alert('$perks');</script>";
	$skills= mysqli_real_escape_string($conn, $_REQUEST["skills"]);
	 // echo "<script type='text/javascript'>alert('$skills');</script>";
	if($title==NULL || $company==NULL || $starting_date==NULL || $location==NULL || $job_type==NULL || $duration==NULL || $stippened==NULL || $apply_by==NULL || $available_position==NULL || $about_company==NULL || $about_internship==NULL || $who_can_apply==NULL || $perks==NULL || $skills==NULL){
$message = "Please Provide all field data!!!" ;
      echo "<script type='text/javascript'>alert('$message');</script>";
	}else{
		$email=$_SESSION['email'];
		 echo "<script type='text/javascript'>alert('$email');</script>";

		$InsertData = "INSERT INTO InternshipData (email,title,company,location,job_type,starting_date,duration,stippened,posted_on,apply_by,about_company,about_internship,available_position,skills,who_can_apply,perks) VALUES ('$email','$title','$company','$location','$job_type','$starting_date','$duration','$stippened','$today','$apply_by','$about_company','$about_internship','$available_position','$skills','$who_can_apply','$perks')";
		if(mysqli_query($conn, $InsertData))  
   { 
   	//profile pic
	//Update DP
	if(isset($_POST["submit"])){
		$message = "image is not added!" ;
      echo "<script type='text/javascript'>alert('$message');</script>";
    $check = getimagesize($_FILES["company_logo"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['company_logo']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        //Insert image content into database
    	$conndition=$_SESSION["email"];
        $insert = $conn->query("UPDATE InternshipData SET company_logo='$imgContent' where email='$conndition'");
         if($insert){
           $message = "Profile Pic Field Updated!";
	    echo "<script type='text/javascript'>alert('$message');</script>";
	    $message = "Admin is added!" ;
      echo "<script type='text/javascript'>alert('$message');</script>";
        }else{

           $message =  "File upload failed, please try again.";
   echo "<script type='text/javascript'>alert('$message');</script>";
            
        } 


    }
    else{
        
           $message = "Please select an image file to upload.";
   echo "<script type='text/javascript'>alert('$message');</script>";
	}
}
 

}else{
   $message = "Admin is not added!" ;
      echo "<script type='text/javascript'>alert('$message');</script>";
}

	}


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	   <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	  <?php include '../utility/css/placementhub_4.3.1.php'; ?>

</head>
<body>
<div class="container">
	<h3 class="text-center">Welcome to Add Internship Panel</h3>
	<hr>
	<!-- add interships start here -->
	<form method="POST" enctype="multipart/form-data">
		<div class="row">
			<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12"><div class="form-group">
    <label>Name*: </label>
    <input type="text"  name="name" class="form-control"placeholder="Enter Your Full Name...">
  </div>
</div>
			<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12"><div class="form-group">
    <label>Father*: </label>
    <input type="text"  name="father_name" class="form-control"placeholder="Enter Father Name...">
  </div></div>
  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12"><div class="form-group">
    <label >Mother*:</label>
    <input type="text" name="mather_name" class="form-control"  placeholder="Enter Mother Name...">
  </div>

</div>
		</div>
		<div class="row">
			<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
				 <label >D.O.B*:</label>
 <input type="date" name="apply_by" min="1947-01-01" max="<?php  echo date("Y-m-d")?>" class="form-control" type="text" name="dob"  placeholder="Choose Your DOB..." class="form-control">
			</div>
			<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12"><div class="form-group">
    <label>Mobile*:</label>
    <input type="text"  name="mobile_no" class="form-control" placeholder="Enter Mobile No..">
  </div>
</div>
<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
				<label >Duration*:</label>
 <input type="text" name="duration"  placeholder="1,2,3,4.." class="form-control">
			</div>
		</div>

		<!-- ************************* -->
		<!-- ******************************* -->
		<div class="row">
			<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
				<label >Stippened*:</label>
 <input type="text" name="stippened"  class="form-control" placeholder="₹1000-2000/Month, Non-Paid ..">
			</div>
			<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
				 <label >Apply By*:</label>
 <input type="date" name="apply_by" max="3000-12-31" 
        min="<?php  echo date("Y-m-d")?>" class="form-control">
			</div>
			<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
				 <label >Available Position*:</label>
 <input type="text" name="available_position"  class="form-control" placeholder="1,2,3,4..">
			</div>
		</div><hr>
		<!-- ************************* -->
		<!-- ******************************* -->
		<div class="row">
			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
				<label>About Company*:</label>
    <textarea name="about_company" class="form-control" rows="3"></textarea>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
				<label>About Intership*:</label>
    <textarea name="about_internship" class="form-control" rows="3"></textarea>
			</div>
		</div>
		<!-- ************************* -->
		<!-- ******************************* --><br>
		<div class="row">
			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
				<label>Who can apply?:</label>
    <textarea name="who_can_apply" class="form-control" rows="3"></textarea>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
				<label>Perks:</label>
    <textarea name="perks" class="form-control" rows="3"></textarea>
			</div>
		</div>
		<!-- ************************* -->
		<!-- ******************************* --><br>
		<div class="row">
			<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12">
				<label>Skills:</label>
    <textarea name="skills" class="form-control" rows="3" placeholder="avaScript, jQuery, Ruby on Rails and Nginx..."></textarea>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
				 <label for="exampleFormControlFile1">Logo:</label>
    <input type="file" name="company_logo" class="form-control-file">
  
			</div>
		</div><br>
		<!-- ************************* -->

		<div class="text-center">
			<button type="submit" name="submit" class="btn btn-lg btn-success">Add Intership!!!</button>
		</div>
		
	</form>

	<!-- add interships ends here -->
</div><br>


   <?php include '../utility/js/placementhub_4.3.1.php'; ?>
</body>
</html>