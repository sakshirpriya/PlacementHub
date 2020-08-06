<?php
include '../DataBase/DB_Connection.php';
session_start();
$conn=OpenCon();
// if(!isset($_SESSION["mentor_email"])){
// 	echo "<script>
// 	window.location.href='../index.php';
// 	alert('unauthrise access');
// 	</script>";
// }
 // $message =$_SESSION["email"];
 // echo "<script type='text/javascript'>alert('$message');</script>";

if (isset($_REQUEST["Subject_Submit"])){
  $Subject_Name=$_REQUEST["Subject_Name"];
  $Subject_Code=$_REQUEST["Subject_Code"];
  $date=date("d-m-Y");
  $added_by="admin@gmail.com" ;
  if($Subject_Name==NULL || $Subject_Code==NULL){
$message ="Please check if some fields are empty....";
 echo "<script type='text/javascript'>alert('$message');</script>";
  }else{
    $insert="INSERT INTO add_subject (subject_name,subject_code,added_by) VALUES ('$Subject_Name','$Subject_Code','$added_by')";
    if(mysqli_query($conn,$insert)){
      $message ="You have successfully added subject....";
 echo "<script type='text/javascript'>alert('$message');</script>";
    }else{
$message ="something went wrong, please contact to developers...";
 echo "<script type='text/javascript'>alert('$message');</script>"; 
   
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
    <link rel="icon" href="../image/title_logo.png" type="image/x-icon">
  
	<?php include '../utility/css/placementhub_4.3.1.php'; ?>
</head>
<body>
	<?php include 'component/NavBar.php'; ?>
	<hr>
  <div class="container">

    <form method="post">
  <div class="form-group">
    <label>Subject Name**</label>
    <input type="text" name="Subject_Name" class="form-control" placeholder="Enter Subject Name... eg. 'Basics of Programming' ">
  </div>
  <div class="form-group">
    <label>Subject Code**</label>
    <input type="text" name="Subject_Code" class="form-control" placeholder="Enter Subject Code... eg. CSE-202">
  </div>
  
  <button type="submit" name="Subject_Submit" class="btn btn-primary">Submit</button>
</form>

</div>	
<?php include '../utility/js/placementhub_4.3.1.php'; ?>
</body>
</html>