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
	$designation= mysqli_real_escape_string($conn, $_REQUEST["designation"]);
	 // echo "<script type='text/javascript'>alert('$designation');</script>";

	$dob= mysqli_real_escape_string($conn, $_REQUEST["dob"]);
	 // echo "<script type='text/javascript'>alert('$dob');</script>";

	$contact_no= mysqli_real_escape_string($conn, $_REQUEST["contact_no"]);
	// echo "<script type='text/javascript'>alert('$contact_no');</script>";

	$cabin= mysqli_real_escape_string($conn, $_REQUEST["cabin"]);
	// echo "<script type='text/javascript'>alert('$cabin');</script>";

	$joining_date= mysqli_real_escape_string($conn, $_REQUEST["joining_date"]);
	// echo "<script type='text/javascript'>alert('$joining_date');</script>";

	$about= mysqli_real_escape_string($conn, $_REQUEST["about"]);
	 // echo "<script type='text/javascript'>alert('$about');</script>";

	$message_for_student= mysqli_real_escape_string($conn, $_REQUEST["message_for_student"]);
	// echo "<script type='text/javascript'>alert('$message_for_student');</script>";

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
	
	if($dob==NULL || $designation==NULL || $contact_no==NULL || $cabin==NULL || $joining_date==NULL || $about==NULL || $message_for_student==NULL || $linkedin==NULL || $github==NULL || $facebook==NULL || $twitter==NULL){
		$message = "Please Provide all field data!!!" ;
		echo "<script type='text/javascript'>alert('$message');</script>";
	}else{
		$email=$_SESSION['email'];
		echo "<script type='text/javascript'>alert('$email');</script>";

		$InsertData = "UPDATE MentorData SET dob='$dob',designation='$designation',contact_no='$contact_no',cabin='$cabin',joining_date='$joining_date',about='$about',message_for_student='$message_for_student',linkedin='$linkedin',github='$github',facebook='$facebook',twitter='$twitter' WHERE email='$email'";



		if(mysqli_query($conn, $InsertData))  
		{ 
   	//profile pic
	//Update DP
			if(isset($_POST["submit"])){
				$message = "image is not added!" ;
				echo "<script type='text/javascript'>alert('$message');</script>";
				$check = getimagesize($_FILES["profilepic"]["tmp_name"]);
				if($check !== false){
					$image = $_FILES['profilepic']['tmp_name'];
					$imgContent = addslashes(file_get_contents($image));
        //Insert image content into database
					$conndition=$_SESSION["email"];
					$insert = $conn->query("UPDATE MentorData SET profilepic='$imgContent' where email='$conndition'");
					if($insert){
						$message = "You have Completed Your Profile, Now You can Login";
						echo "<script type='text/javascript'>alert('$message');</script>";
						$insert = $conn->query("UPDATE MentorAuth SET status=true where email='$conndition'");
						if($insert){
							$message = "status Updated";
							echo "<script type='text/javascript'>alert('$message');</script>";
						}
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
		<h1 class="text-center">Welcome to Edit Profile Panel</h1>
		<h4 class="text-center">** If any field is not related to you, Kindly fill 'NA'</h4>
		<hr>
		<!-- add interships start here -->
		<form method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12"><div class="form-group">
					<label>Designation*: </label>
					<input type="text"  name="designation" class="form-control"placeholder="Enter Your Designation...">
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12"><div class="form-group">
				<label>Contact No*: </label>
				<div class="input-group mb-2">
					<div class="input-group-prepend">
						<div class="input-group-text">+91</div>
					</div>
					<input type="text" name="contact_no" class="form-control"placeholder="Enter Your Mobile No...">
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12"><div class="form-group">
			<label >Cabin*:</label>
			<input type="text" name="cabin" class="form-control"  placeholder="cabin eg. '32 Block 403-15'">
		</div>

	</div>
</div>
<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
		<label >Joinig Date*:</label>
		<input type="date" min="1947-01-01" max="<?php  echo date("Y-m-d")?>" class="form-control" type="text" name="joining_date"  placeholder="Choose Your Joining Date..." class="form-control">
	</div>
	<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12"><div class="form-group">
		<label >Date of Birth*:</label>
		<input type="date" min="1947-01-01" max="<?php  echo date("Y-m-d")?>" class="form-control" type="text" name="dob"  placeholder="Choose Your DOB..." class="form-control">
	</div>
</div>
<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
	<label for="exampleFormControlFile1">ProfilePic:</label>
	<input type="file" name="profilepic" class="form-control-file">
</div>
</div>

<!-- ************************* -->
<!-- ******************************* -->
<div class="row">
	<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
		<label>About Yourself*:</label>
		<textarea name="about" class="form-control" rows="3"></textarea>
	</div>
	<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
		<label>Message for Student*:</label>
		<textarea name="message_for_student" class="form-control" rows="3"></textarea>
	</div>
</div>
<!-- ************************* -->
<!-- ******************************* -->
<br>
<div class="row">
	<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
		<label >GitHub*:</label>
		<div class="input-group mb-2">
			<div class="input-group-prepend">
				<div class="input-group-text">https://github.com/</div>
			</div>
			<input type="text" name="github"  class="form-control" placeholder="NikhilKrDwivedi">

		</div>
	</div>
	<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
		<label >Linkedin*:</label>
		<div class="input-group mb-2">
			<div class="input-group-prepend">
				<div class="input-group-text">https://www.linkedin.com/in/</div>
			</div>
			<input type="text" name="linkedin"  class="form-control" placeholder="nikhilkrdwivedi">

		</div>
	</div>
</div>
<div class="row">
	<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
		<label >FaceBook*:</label>
		<div class="input-group mb-2">
			<div class="input-group-prepend">
				<div class="input-group-text">https://www.facebook.com/</div>
			</div>
			<input type="text" name="facebook"  class="form-control" placeholder="NikhilKrDwivedi">
		</div>

	</div>
	<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
		<label >Twitter*:</label>
		<div class="input-group mb-2">
			<div class="input-group-prepend">
				<div class="input-group-text">https://twitter.com/</div>
			</div>
			<input type="text" name="twitter"  class="form-control" placeholder="NikhilKrDwivedi">
		</div>

	</div>
</div><hr>
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