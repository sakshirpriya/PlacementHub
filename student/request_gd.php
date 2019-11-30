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
if(isset($_REQUEST["Request_GD"])){
$mentor_email=$_REQUEST["mentor_email"];
// echo $mentor_email;
$Remark=$_REQUEST["Remark"];
$insert="INSERT INTO gd_request (mentor_email,student_email,remark,status) VALUES ('$mentor_email','$student_email','$Remark',true)";
$result=mysqli_query($conn,$insert);
if($result){

 $message ="Your Request has been submitted!!!";
 echo "<script type='text/javascript'>alert('$message');</script>";
}else{

 $message ="Something went wrong!!!";
 echo "<script type='text/javascript'>alert('$message');</script>";
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
          <h1 class="text-center">Welcome to GD Request Room</h1>
          <h4 class="text-center">**Please Fill Details.</h4>
          <br><br>
          <form>
  <div class="form-row align-items-center">
    <div class="col-sm-5 my-1">
      <select name="mentor_email" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
    <option selected>Choose Mentor</option>
    <?php 
     $email =$_SESSION["student_email"];
 echo "<script type='text/javascript'>alert('$email');</script>";

        $Search="SELECT follower_list.mentor_email as mentor_email,MentorData.name as name FROM follower_list INNER JOIN MentorData on follower_list.mentor_email = MentorData.email WHERE student_email='$email' AND follow_status=true";
        $result=mysqli_query($conn,$Search);
        while($row=mysqli_fetch_array($result)){
          echo "<option value='".$row["mentor_email"]."'>".$row["name"]."</option>";
        }
        ?>
  </select>
    </div>
    <div class="col-sm-5 my-1">
      <div class="input-group">
       
        <input type="text" name="Remark" class="form-control"  placeholder="Request/Remark">
      </div>
    </div>
   
    <div class="col-auto my-1">
      <button type="submit" name="Request_GD" class="btn btn-primary">Request</button>
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