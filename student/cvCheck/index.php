<?php
include '../../DataBase/DB_Connection.php';
session_start();
$conn=OpenCon();
if(!isset($_SESSION["student_email"])){
	echo "<script>
	window.location.href='../../index.php';
	alert('unauthrise access');
	</script>";
}








 // $message =$_SESSION["email"];
 // echo "<script type='text/javascript'>alert('$message');</script>";
?>


<!DOCTYPE html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="../../image/title_logo.png" type="image/x-icon">

	<?php include '../../utility/css/placementhub_4.3.1.php'; ?>
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
	<?php include '../component/NavBar.php'; ?>
	<div class="container"><br>
		<h1 align="center">Welcome to CV checker</h1>
		<h3 class="text-center">Please Select Your Mentor & Upload CV</h3><br>
		<form action="uploadCV.php" method="post" enctype="multipart/form-data">
				<fieldset class="scheduler-border">
    <legend class="scheduler-border">Choose Files</legend>
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
			<div class="form-group custom-file">
				<input type="file" name="uploaded_file" class="custom-file-input" id="customFile">
				<label class="custom-file-label" for="customFile">Choose file</label>
			</div><br><br>
			<div class="form-group">
				<input type="text" name="RequestMessage" class="form-control"  placeholder="Request Message">
			</div>
			<div class="text-center">
				<button type="submit" name="Request_GD" class="btn btn-primary">Upload</button>
				<button class="btn btn-success"><a href="checkAllUploads.php" style="color: white;">Browse</a></button>
			</div>
		</fieldset>
		</form>
	</div>
	<?php include '../../utility/js/placementhub_4.3.1.php'; ?>
</body>
</html>