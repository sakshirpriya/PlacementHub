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
  

	<hr>

<h3 align="center">Select Test which you want to give</h3>
<?php 
            $Search="SELECT DISTINCT Test_name FROM mcq_test_question_bank";
            $result=mysqli_query($conn,$Search);
            echo "<table class='table table-striped'>";
            while($row=mysqli_fetch_array($result)){
            echo  "<tr><td align=center ><a href=showtest.php?test_name=".$row["Test_name"]."><font size=4>".$row["Test_name"]."</font></a>";
          }
          ?> 
</body>
</html>