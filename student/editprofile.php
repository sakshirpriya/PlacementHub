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
$email=$_SESSION["student_email"];
if(isset($_REQUEST["submit"])){
	$name= mysqli_real_escape_string($conn, $_REQUEST["name"]);
	 // echo "<script type='text/javascript'>alert('$name');</script>";

	$registration_no= mysqli_real_escape_string($conn, $_REQUEST["registration_no"]);
	 // echo "<script type='text/javascript'>alert('$registration_no');</script>";

	$dob= mysqli_real_escape_string($conn, $_REQUEST["dob"]);
	// echo "<script type='text/javascript'>alert('$dob');</script>";

	$mobile_no= mysqli_real_escape_string($conn, $_REQUEST["mobile_no"]);
	// echo "<script type='text/javascript'>alert('$mobile_no');</script>";

	$father_name= mysqli_real_escape_string($conn, $_REQUEST["father_name"]);
	// echo "<script type='text/javascript'>alert('$father_name');</script>";

	$mother_name= mysqli_real_escape_string($conn, $_REQUEST["mother_name"]);
	 // echo "<script type='text/javascript'>alert('$mother_name');</script>";

	$address= mysqli_real_escape_string($conn, $_REQUEST["address"]);
	 // echo "<script type='text/javascript'>alert('$address');</script>";



	$college_name= mysqli_real_escape_string($conn, $_REQUEST["college_name"]);
	 // echo "<script type='text/javascript'>alert('$college_name');</script>";

	$branch= mysqli_real_escape_string($conn, $_REQUEST["branch"]);
	 // echo "<script type='text/javascript'>alert('$branch');</script>";

	$current_cgpa_percentage= mysqli_real_escape_string($conn, $_REQUEST["current_cgpa_percentage"]);
	 // echo "<script type='text/javascript'>alert('$current_cgpa_percentage');</script>";

	$passing_year= mysqli_real_escape_string($conn, $_REQUEST["passing_year"]);
	// echo "<script type='text/javascript'>alert('$passing_year');</script>";

	$xii_school= mysqli_real_escape_string($conn, $_REQUEST["xii_school"]);
	 // echo "<script type='text/javascript'>alert('$xii_school');</script>";

	$xii_percentage= mysqli_real_escape_string($conn, $_REQUEST["xii_percentage"]);
	 // echo "<script type='text/javascript'>alert('$xii_percentage');</script>";

	$xii_board= mysqli_real_escape_string($conn, $_REQUEST["xii_board"]);
	 // echo "<script type='text/javascript'>alert('$xii_board');</script>";

	$xii_year= mysqli_real_escape_string($conn, $_REQUEST["xii_year"]);
	// echo "<script type='text/javascript'>alert('$xii_year');</script>";


		$x_school= mysqli_real_escape_string($conn, $_REQUEST["x_school"]);
	 // echo "<script type='text/javascript'>alert('$x_school');</script>";

	$x_percentage= mysqli_real_escape_string($conn, $_REQUEST["x_percentage"]);
	 // echo "<script type='text/javascript'>alert('$x_percentage');</script>";

	$x_board= mysqli_real_escape_string($conn, $_REQUEST["x_board"]);
	 // echo "<script type='text/javascript'>alert('$x_board');</script>";

	$x_year= mysqli_real_escape_string($conn, $_REQUEST["x_year"]);
	// echo "<script type='text/javascript'>alert('$x_year');</script>";
	$about= mysqli_real_escape_string($conn, $_REQUEST["about"]);
	 // echo "<script type='text/javascript'>alert('$about');</script>";

	$career_goal= mysqli_real_escape_string($conn, $_REQUEST["career_goal"]);
	 // echo "<script type='text/javascript'>alert('$career_goal');</script>";


	$linkedin= mysqli_real_escape_string($conn, $_REQUEST["linkedin"]);
	$linkedin="https://www.linkedin.com/in/".$linkedin;
	// echo "<script type='text/javascript'>alert('$linkedin');</script>";

	$github= mysqli_real_escape_string($conn, $_REQUEST["github"]);
	$github="https://github.com/".$github;
	// echo "<script type='text/javascript'>alert('$github');</script>";

	$facebook= mysqli_real_escape_string($conn, $_REQUEST["facebook"]);
	$facebook="https://www.facebook.com/".$facebook;
	// echo "<script type='text/javascript'>alert('$facebook');</script>";

	$twitter= mysqli_real_escape_string($conn, $_REQUEST["twitter"]);
	$twitter="https://twitter.com/".$twitter;
	 // echo "<script type='text/javascript'>alert('$twitter');</script>";
	
	if($name==NULL || $registration_no==NULL || $dob==NULL || $father_name==NULL ||$mother_name ==NULL || $mobile_no==NULL || $address==NULL || $branch==NULL || $college_name==NULL || $current_cgpa_percentage==NULL || $passing_year==NULL || $xii_percentage==NULL || $xii_year==NULL || $xii_board==NULL || $xii_school==NULL || $x_year==NULL || $x_board==NULL || $x_percentage==NULL || $x_school==NULL || $about==NULL|| $career_goal==NULL){
		$message = "Please Provide all field data!!!" ;
		echo "<script type='text/javascript'>alert('$message');</script>";
	}else{
		// $email=$_SESSION['student_email'];
		// echo "<script type='text/javascript'>alert('$email');</script>";

		$InsertData = "UPDATE StudentData SET name='$name',registration_no='$registration_no',dob='$dob',father_name='$father_name',mother_name='$mother_name',mobile_no='$mobile_no',address='$address',branch='$branch',college_name='$college_name',current_cgpa_percentage='$current_cgpa_percentage',passing_year='$passing_year',linkedin='$linkedin',github='$github',facebook='$facebook',twitter='$twitter',xii_percentage='$xii_percentage',xii_year='$xii_year',xii_board='$xii_board',xii_school='$xii_school', x_percentage='$x_percentage',x_year='$x_year',x_board='$x_board',x_school='$x_school',about='$about',career_goal='$career_goal' WHERE email='$email'";



		if(mysqli_query($conn, $InsertData))  
		{ 

				 $insert = $conn->query("UPDATE StudentAuth SET status=true where email='$email'");
            if($insert){
              $_SESSION["student_email"] = $email;
              echo "<script>
	window.location.href='index.php';
	</script>";
            }
          else{

            $message =  "somthing went wrong";
            echo "<script type='text/javascript'>alert('$message');</script>";

          }

}
   else{
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
    <link rel="icon" href="../image/title_logo.png" type="image/x-icon">

	<?php include '../utility/css/placementhub_4.3.1.php'; ?>
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
		<h1 class="text-center">Welcome to Edit Profile Panel</h1>
		<h4 class="text-center">** If any field is not related to you, Kindly fill 'NA'</h4>
		<hr>
		<!-- add interships start here -->
		<form method="POST" enctype="multipart/form-data">
			<fieldset class="scheduler-border">
    <legend class="scheduler-border">Personal Details</legend>
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
					<div class="form-group">
					<label>Name*: </label>
					<input type="text"  name="name" class="form-control"placeholder="Enter Your Name...">
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12"><div class="form-group">
		<label >Registration No*:</label>
		<input type="text"  name="registration_no"  placeholder="Enter Your Registration No ..." class="form-control">
	</div>
</div>
<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12"><div class="form-group">
		<label >Date of Birth*:</label>
		<input type="date" min="1947-01-01" max="<?php  echo date("Y-m-d")?>" class="form-control" type="text" name="dob"  placeholder="Choose Your DOB..." class="form-control">
	</div>
</div>		
</div>

<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
		<div class="form-group">
		<label >Mobile No*:</label>
		<div class="input-group mb-2">
					<div class="input-group-prepend">
						<div class="input-group-text">+91</div>
					</div>
					<input type="text" name="mobile_no"  placeholder="Choose Your Mobile No..." class="form-control">
				</div>
		</div>
	</div>
	<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
		<div class="form-group">
				<label>Father's Name*: </label>
					<input type="text" name="father_name" class="form-control"placeholder="Enter Your Father's Name...">
			</div>
		</div>
		<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12"><div class="form-group">
			<label >Mother' Name*:</label>
			<input type="text" name="mother_name" class="form-control"  placeholder="Enter Your Mother' Name">
		</div>

	</div>
	
</div>

	<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="form-group">
					<label>Address*: </label>
					<div class="input-group mb-2">
					<div class="input-group-prepend">
						<div class="input-group-text">Eg.</div>
					</div>
					<input type="text"  name="address" class="form-control"placeholder="eg. Maa Durga Chauraha, Asni Road, Husainganj, Fatehpur, Uttar Pradesh-212651">
				</div>
				</div>
			</div>
			</div>
</fieldset>
<!-- ************************************************* -->
<fieldset class="scheduler-border">
    <legend class="scheduler-border">College</legend>
    <div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
		<div class="form-group">
			<label >College Name*:</label>
			<div class="input-group mb-2">
					<div class="input-group-prepend">
						<div class="input-group-text">Eg.</div>
					</div>
		<input type="text" name="college_name" placeholder="Lovely Professional University" class="form-control"></div>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
		<div class="form-group">
		<label >Branch Name*:</label>
		<input type="text" name="branch"  placeholder="Choose Your Branch Name..." class="form-control">
	</div>
	</div>
	<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12"><div class="form-group">
		<label >Current CGPA/Percentage*:</label>
		<input type="text" name="current_cgpa_percentage"  placeholder="Eg: 8.55 / 84%..." class="form-control">
	</div>
</div>
<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
	<div class="form-group">
	<label>Passing Year*:</label>
	<input type="date" name="passing_year" max="2050-12-31" min="<?php  echo date("Y-m-d")?>" class="form-control">
</div>
</div>
</div>

</fieldset>

<!-- ************************************************* -->
<fieldset class="scheduler-border">
    <legend class="scheduler-border">XII Academics</legend>
<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12"><div class="form-group">
		<label >School Name*:</label>
		<div class="input-group mb-2">
					<div class="input-group-prepend">
						<div class="input-group-text">Eg.</div>
					</div>
		<input type="text" name="xii_school"  placeholder="Jawahar Navodaya Vidyalaya" class="form-control">
		</div>
	</div>
	</div></div>

<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
		<div class="form-group">
		<label >Percentage*:</label>
		<input type="text" name="xii_percentage"  placeholder="up to two decimal palce eg. 75.45%" class="form-control">
	</div>
</div>
	<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12"><div class="form-group">
		<label >Board*:</label>
		<input type="text" name="xii_board"  placeholder="Choose Your XII Board..." class="form-control">
	</div>
</div>
<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
	<div class="form-group">
	<label>Passing Year*:</label>
	<input type="date" name="xii_year" min="1947-12-31" max="<?php  echo date("Y-m-d")?>" class="form-control">
</div>
</div>
</div>
</fieldset>
<!-- ************************* -->

<!-- ************************************************* -->

<fieldset class="scheduler-border">
    <legend class="scheduler-border">X Academics</legend>
<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
		<div class="form-group">
<label >School Name*:</label>
<div class="input-group mb-2">
					<div class="input-group-prepend">
						<div class="input-group-text">Eg.</div>
					</div>
		<input type="text" name="x_school"  placeholder="Jawahar Navodaya Vidyalaya" class="form-control">
		</div>
	</div>
	</div>
	</div>

<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
		<div class="form-group">
		<label >Percentage/CGPA*:</label>
		<input type="text" name="x_percentage"  placeholder="up to two decimal palce eg. 75.45%/9.6" class="form-control">
	</div>
</div>
	<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12"><div class="form-group">
		<label >Board*:</label>
		<input type="text" name="x_board"  placeholder="Choose Your XII Board..." class="form-control">
	</div>
</div>
<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
	<div class="form-group">
	<label>Passing Year*:</label>
	<input type="date" name="x_year" min="1947-12-31" max="<?php  echo date("Y-m-d")?>" class="form-control">
</div>
</div>
</div>
</fieldset>
<!-- ************************* -->
<!-- ******************************* -->
<fieldset class="scheduler-border">
    <legend class="scheduler-border">Career</legend>
<div class="row">
	<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12"><div class="form-group">
		<label>About Yourself*:</label>
		<textarea name="about" class="form-control" rows="3"></textarea>
	</div>
	</div>
	<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
		<div class="form-group">
		<label>Career Goal*:</label>
		<textarea name="career_goal" class="form-control" rows="3"></textarea>
	</div>
</div>
</div>
</fieldset>
<!-- ************************* -->
<!-- ******************************* -->
<fieldset class="scheduler-border">
    <legend class="scheduler-border">Media</legend>
<div class="row">
	<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
			<div class="form-group">
		<label >GitHub:</label>
		<div class="input-group mb-2">
			<div class="input-group-prepend">
				<div class="input-group-text">https://github.com/</div>
			</div>
			<input type="text" name="github"  class="form-control" placeholder="NikhilKrDwivedi">
</div>
		</div>
	</div>
	<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
			<div class="form-group">
		<label >Linkedin:</label>
		<div class="input-group mb-2">
			<div class="input-group-prepend">
				<div class="input-group-text">https://www.linkedin.com/in/</div>
			</div>
			<input type="text" name="linkedin"  class="form-control" placeholder="nikhilkrdwivedi">
		</div>

		</div>
	</div>
</div>
<div class="row">
	<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
			<div class="form-group">
		<label >FaceBook:</label>
		<div class="input-group mb-2">
			<div class="input-group-prepend">
				<div class="input-group-text">https://www.facebook.com/</div>
			</div>
			<input type="text" name="facebook"  class="form-control" placeholder="NikhilKrDwivedi">
		</div>
</div>
	</div>
	<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
			<div class="form-group">
		<label >Twitter:</label>
		<div class="input-group mb-2">
			<div class="input-group-prepend">
				<div class="input-group-text">https://twitter.com/</div>
			</div>
			<input type="text" name="twitter"  class="form-control" placeholder="NikhilKrDwivedi">
		</div>
</div>
	</div>
</div>
</fieldset>
<!-- ************************* -->
<br>
<!-- ************************* -->

<div class="text-center">
	<button type="submit" name="submit" class="btn btn-lg btn-success">Update Data!!!</button>
</div>

</form>

<!-- add interships ends here -->
</div><br>


<?php include '../utility/js/placementhub_4.3.1.php'; ?>
</body>
</html>