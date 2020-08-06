<?php
include '../DataBase/DB_Connection.php';
session_start();
$conn=OpenCon();
if(!isset($_SESSION["mentor_email"])){
	echo "<script>
	window.location.href='../index.php';
	alert('unauthrise access');
	</script>";
}
$email=$_SESSION["mentor_email"];
 // $message =$_SESSION["email"];
 // echo "<script type='text/javascript'>alert('$message');</script>";
if(isset($_REQUEST["add_subject"])){
  $SubjectStr =$_REQUEST["subject"];
  if($SubjectStr==NULL){
 $message ="Please Select atleast one Subject...";
 echo "<script type='text/javascript'>alert('$message');</script>";
  }else{
  $str_arr = explode (":", $SubjectStr);
  $subject_name=$str_arr[0];
  $subject_code=$str_arr[1];
 // echo "<script type='text/javascript'>alert('$SubjectStr');</script>";
 // echo "<script type='text/javascript'>alert('$subject_name');</script>";
 // echo "<script type='text/javascript'>alert('$subject_code');</script>";
  $Query="INSERT INTO mentor_subject_list (mentor_email,subject_name,subject_code) VALUES ('$email','$subject_name','$subject_code')";
 if(mysqli_query($conn,$Query)){
$message ="Your Subject Added...";
 echo "<script type='text/javascript'>alert('$message');</script>";
 }else{
  $message ="Course name and email combination already present...";
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
<body>
	<?php include 'component/NavBar.php'; ?>
	<hr>
  <div class="container-fluid">

    <!-- Main Body Start here -->
    <div class="row">
      <!-- first Dev Block starts here -->
      <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 ">
    </div>
    <!-- first Dev Block ends here -->



    <!-- second Div Block starts Here -->
    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
    <h1 class="text-center">Welcome to add subject Portal</h1>
    <h5 class="text-center">If you are dealing with more than one subject, Please add one by one...</h5>
    <form method="post">
      <fieldset class="scheduler-border">
    <legend class="scheduler-border">Select Subject</legend>
           
  <select name="subject" class="custom-select custom-select-lg mb-3">
                      <option selected>choose subject...</option>
        
                       <?php 
          $Search="SELECT * FROM add_subject";
          $result=mysqli_query($conn,$Search);
          while($row=mysqli_fetch_array($result)){
          echo  "<option value='".$row["subject_name"].":".$row["subject_code"]."'>".$row["subject_name"]."  [ ".$row["subject_code"]." ]"."</option>";
           
          }
        ?> 

                    </select>
   <div class="col text-center">
                     <button type="submit"  name="add_subject" class="btn btn-success">Add Subject</button>
                   </div>
                  </fieldset>
    </form>
</div>
<!-- second Div Block Ends Here -->


<!-- Third Div Block Starts Here -->
<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
 

</div>
<!-- Third Div Block Ends Here -->
</div>
<!-- Main Body End Here -->


</div>	


<?php include '../utility/js/placementhub_4.3.1.php'; ?>
</body>
</html>