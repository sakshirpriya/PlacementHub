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

if(isset($_REQUEST["essay_submit"])){
  $email =$_SESSION["mentor_email"];
  $check=$_REQUEST["essay_test_name"];
  if($check==NULL){
    $message="Test name can not empty.....";
 echo "<script type='text/javascript'>alert('$message');</script>";

  }else{
     //check if test already exists...
$search="SELECT * FROM essay_test_question_bank where test_name='$check' AND email='$email'";
$result=mysqli_query($conn, $search);
$rows = mysqli_num_rows($result);
 if($rows){
  $message="Sorry! You can not create . Same email and test name combintion already found!!!";
 echo "<script type='text/javascript'>alert('$message');</script>";
}else{
  $_SESSION["Essay_Test_Session"]=$_REQUEST["essay_test_name"];
}
  }
}

//unset gd room session
if(isset($_REQUEST["reset_essay_test"])){
unset($_SESSION["Essay_Test_Session"]);
}

if(isset($_REQUEST["add_essay_test"])){
  $topic=$_REQUEST["topic"];
 // echo "<script type='text/javascript'>alert('$gd_topic');</script>";
  $word_limit=$_REQUEST["word_limit"];
 // echo "<script type='text/javascript'>alert('$date');</script>";
  $category=$_REQUEST["category"];
 // echo "<script type='text/javascript'>alert('$time');</script>";

  $time_limit=$_REQUEST["time_limit"];
 // echo "<script type='text/javascript'>alert('$student1');</script>";
  $test_name=$_SESSION["Essay_Test_Session"];
  $email=$_SESSION["mentor_email"];

  if($topic==NULL || $word_limit==NULL || $category==NULL || $time_limit==NULL || $test_name==NULL){
    $message="Some (*) fields are empty!!!!";
 echo "<script type='text/javascript'>alert('$message');</script>";

  }else{
    $insert="INSERT INTO essay_test_question_bank (email,test_name,topic,word_limit,category,time_limit) VALUES ('$email','$test_name','$topic','$word_limit','$category','$time_limit')";
    if(mysqli_query($conn,$insert)){
      unset($_SESSION["Essay_Test_Session"]);
      $message="Test Successfully created!!!!";
 echo "<script type='text/javascript'>alert('$message');</script>";

 

    }else{
       $message="Something went wrong......";
 echo "<script type='text/javascript'>alert('$message');</script>";
    }
  }

 
}





?>
<html>  
    <head>  
        <title>Welcome to Create Essay Test.</title>  

    <link rel="icon" href="../image/title_logo.png" type="image/x-icon">

       <?php include '../utility/css/placementhub_4.3.1.php'; ?>


    </head>  
    <body> 
	<?php include 'component/NavBar.php'; ?>
  
     
        <div class="container">
   <br />
   
     <h3 align="center">Welcome to Create test Pannel.</a></h3><br />
  
       <?php 
   if(isset($_SESSION["Essay_Test_Session"])){
        echo "<h1 class='text-center'>Test Name : ".$_SESSION["Essay_Test_Session"]."</h1>";
   }else{
 echo '<form method="POST">
           <div class="form-group" align="center">
    <label>Enter Test Name</label>
    <input type="text" name="essay_test_name" class="form-control"  placeholder="Enter Test Name..."><br>
         <button type="submit" name="essay_submit" class="btn btn-success">Test Name !!!</button>
    

  </div>

       </form>';
   }
   ?>


  <?php if(isset($_SESSION["Essay_Test_Session"])){

    echo ' <div align="right" style="margin-bottom:5px;"><form method="POST">
      <button type="submit" name="reset_essay_test" class="btn btn-danger btn-xs">Reset Test</button>

    </form>
   </div>
   <br />
   
   <form>
   <div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				 <label >Essay Topic*:</label>
    <input type="text" name="topic" class="form-control"  placeholder="Please Enter the Topic of Essay..."><br>

		</div>
		</div>
	<div class="row">
			<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
				 <label >Word Limit*:</label>
  <select name="word_limit" class="custom-select custom-select-lg mb-3">
                      <option selected>Choose Word Limit*</option>
                      <option value="100">0-100 Word</option>
                      <option value="150">0-150 Word</option>
                      <option value="200">0-200 Word</option>
                      <option value="250">0-250 Word</option>
                      <option value="300">0-300 Word</option>
                      <option value="400">0-400 Word</option>
                      <option value="500">0-500 Word</option>
                    </select>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
    <label >Category*:</label>
  <select name="category" class="custom-select custom-select-lg mb-3">
                      <option selected>Choose Category*</option>
                      <option value="expository">expository</option>
                      <option value="persuasive">persuasive</option>
                      <option value="analytical">analytical</option>
                      <option value="argumentative">argumentative</option>
                    </select>
 
</div>
<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
				<label >Time Limit*:</label>
  <select name="time_limit" class="custom-select custom-select-lg mb-3">
                      <option selected>Choose Time Limit*</option>
                      <option value="10">10 Min</option>
                      <option value="15">15 Min</option>
                      <option value="20">20 Min</option>
                      <option value="25">25 Min</option>
                      <option value="30">30 Min</option>
                      <option value="35">35 Min</option>
                      <option value="40">40 Min</option>
                      <option value="45">45 Min</option>
                      <option value="50">50 Min</option>
                      <option value="55">55 Min</option>
                      <option value="60">60 Min</option>
                    </select>
			</div>
		</div>
<div class="form-group" align="center">
   
    <button type="submit" name="add_essay_test" class="btn btn-info">Save</button>
   </div>
		</form>
		<p style="font-weight:14px;">
		<b>
		</b></p>

  ';
  }?>
   </div>
       <?php include '../utility/js/placementhub_4.3.1.php'; ?>

    </body>  
</html> 
