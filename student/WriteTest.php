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
 
 // Make sure an ID was passed
    if(isset($_GET['testName'])) {
    // Get the ID
      $testName=$_GET['testName'];
        }
    else {
        echo 'Error! No ID was passed.';
    }
if(isset($_REQUEST["submit"])){
  $Essay=$_REQUEST["Essay"];
  $student_email=$_SESSION["student_email"];
  if($Essay){
    $insert="INSERT INTO EssayWriting (test_name,student_email,essay) values ('$testName','$student_email','$Essay')";
    if(mysqli_query($conn,$insert)){
$message="Uploaded!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
    }else{
      $message="something went wrong!!";
echo "<script type='text/javascript'>alert('$message');</script>";
    }
  }else{
    $message="Essay Can Not Empty!!";
echo "<script type='text/javascript'>alert('$message');</script>";

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
  hr {
    height: 1px;
    color: white;
    background-color: white;
    border: none;
  }
</style>
</head>
<body>
	<?php include 'component/NavBar.php'; ?>
  <?php include 'component/index_edit.php'; ?>
  

	<hr>
  <div class="container-fluid">

          <h1 class="text-center">Welcome to Essay Writing</h1>
          <hr><hr>

<?php 
if($testName){

// echo "<script type='text/javascript'>alert('$gd_room_name');</script>";
//echo "<script type='text/javascript'>alert('$testName');</script>";

$Search="SELECT * FROM essay_test_question_bank WHERE test_name='$testName'";

$result=mysqli_query($conn,$Search);
$row=mysqli_fetch_array($result);
// echo $row["test_name"];
// echo $row["topic"];
}
  ?>

  <form method='post' enctype='multipart/form-data'>
    <fieldset class='scheduler-border'>
      <legend class='scheduler-border'><?php echo $row["test_name"]; ?></legend>
<div class='row'>
       
        <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
          <div class='form-group'>
            <div class='input-group mb-2'>
              <div class='input-group-prepend'>
                <div class='input-group-text'>Word Limit</div>
              </div>
              <input type='text' name='Word' value='<?php echo $row["word_limit"]." Words"; ?>' class='form-control' readonly>
            </div>
          </div>
        </div>
        <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
          <div class='form-group'>
            <div class='input-group mb-2'>
              <div class='input-group-prepend'>
                <div class='input-group-text'>Time Limit</div>
              </div>
              <input type='text' name='Time' value='<?php echo $row["time_limit"]." Min"; ?>' class='form-control' readonly>
            </div>
          </div>
        </div>
        <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
          <div class='form-group'>
            <div class='input-group mb-2'>
              <div class='input-group-prepend'>
                <div class='input-group-text'>Category</div>
              </div>
              <input type='text' name='Category'   value='<?php echo "  ".$row["category"]; ?>' class='form-control' readonly>
            </div>
          </div>
        </div> 
      </div>

      
      <div class='row'>
      <div class='col-xl-12 col-lg-12 col-md-12 col-sm-12'>
          <div class='form-group'>
            <div class='input-group mb-2'>
              <div class='input-group-prepend'>
                <div class='input-group-text'>Topic</div>
              </div>
              <input type='text' value='<?php echo "  ".$row["topic"]; ?>' class='form-control' readonly>
            </div>
          </div>
        </div>
      </div>
      <hr>
 
      <div class="form-group">
    <label for="exampleFormControlTextarea1">Write Essay Here</label>
    <textarea class="form-control" name="Essay" rows="8"></textarea>
  </div>
   <div class="text-center">
   <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
  </div>
</fieldset>
</form>


      


</div>	


<?php include '../utility/js/placementhub_4.3.1.php'; ?>
</body>
</html>

