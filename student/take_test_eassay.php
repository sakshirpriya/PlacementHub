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
 
if(isset($_REQUEST["WritingZone"])){
	$test_name=$_REQUEST["essaySelect"];
	$student_email=$_SESSION["student_email"];
	// echo "<script>
	// alert('$test_name');
	// </script>";
	$check="SELECT * FROM EssayWriting test_name='$test_name' AND student_email='$student_email'";
	$result=mysqli_query($conn,$check);
$row = mysqli_num_rows($result);
if($row){
	echo "<script>
	window.location.href='../index.php';
	alert('You have already done with this test.');
	</script>";
}else{
	echo "<script>
	window.location.href='http://13.126.165.2/student/WriteTest.php?testName=".$test_name."';
	
	</script>";

}
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
  <div class="container-fluid">

    <!-- Main Body Start here -->
    <div class="row">
      <!-- first Dev Block starts here -->
      <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 ">

    
    </div>
     
      <!-- first Dev Block ends here -->



      <!-- second Div Block starts Here -->
      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 text-center">
          <h1 class="text-center">Welcome to Essay Writing</h1>
          <h4 class="text-center">**Please Fill Details.</h4>
          <br><br>
          <form>
  <div class="form-row align-items-center">
 
      <select name="essaySelect" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
    <option selected>Choose Essay</option>
    <?php 
     $email =$_SESSION["student_email"];
 //echo "<script type='text/javascript'>alert('$email');</script>";

        $Search="SELECT * from essay_test_question_bank";
        $result=mysqli_query($conn,$Search);
        while($row=mysqli_fetch_array($result)){
          echo "<option value='".$row["test_name"]."'>".$row["test_name"]." -> ".$row["topic"]."</option>";
        }
        ?>
  </select>
   
   
   
    
  </div>
  <br>
  <div class="row">
    <div class="col text-center">
       <button type="submit" name="WritingZone" class="btn btn-primary">Enter Into Writing Zone!</button>
    </div>
  </div>
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

