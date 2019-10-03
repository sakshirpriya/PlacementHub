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
 // $message =$_SESSION["email"];
 // echo "<script type='text/javascript'>alert('$message');</script>";
?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php include '../utility/css/placementhub_4.3.1.php'; ?>
</head>
<body>
	<?php include 'NavBar.php'; ?>
	<hr>
  <div class="container-fluid">

    <!-- Main Body Start here -->
    <div class="row">
      <!-- first Dev Block starts here -->
      <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 ">
       <div class="sticky-top shadow-lg mb-5 bg-white rounded" style="border: 1px solid grey;">

        <div class="text-center">
          <img src="https://cdn.pixabay.com/photo/2018/01/15/07/51/woman-3083384_960_720.jpg" width="200px" height="200px" alt="ProfilePic" style=" border-radius: 50%;margin-top: 10px;">
        </div>
        <p class="text-center font-weight-bold" style="border-bottom: 1px solid grey;border-top: 1px solid grey;margin-top: 5px;">Avul Pakir Jainulabdeen Abdul Kalam</p>
        <p class="text-center" style="border-bottom: 1px solid grey;">Product Intern (Backend) at Egnify Technologies Pvt Ltd </p>
        <p class="text-center" style="border-bottom: 1px solid grey;"><b>Joining Date: </b> 20-10-1998</p>
        <p class="text-center" style="border-bottom: 1px solid grey;"><b>Mobile:</b>9628032001</p>
        <p class="text-center" style="border-bottom: 1px solid grey;"><b>Cabin:</b>34 Block 415-12</p>
        <p class="text-center" style="border-bottom: 1px solid grey;"><b>Mobile:</b>9628032001</p>
        <div class="text-center">
          <a href=""><i class="fa fa-linkedin-square fa-2x" style="color: #1c85bd"></i></a>
          <a href=""><i class="fa fa-github-square fa-2x" style="color: #0a0a0a"></i></a>
          <a href=""><i class="fa fa-facebook-official fa-2x" style="color: #165bc9;"></i></a>
          <a href=""><i class="fa fa-twitter-square fa-2x" style="color: #0eaeed"></i></a>
        </div>
      </div>
    </div>
    <!-- first Dev Block ends here -->


    <!-- second Div Block starts Here -->
    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
     <div class="card-deck">
      <div class="card shadow-lg mb-5 bg-white rounded">
        <div class="card-body">
          <p class="card-title" style="margin-top: -15px;"><h2 class="text-center" style="font-weight: bold;">Tests</h2></p><hr>
          <p class="card-title text-center" style="margin-top: -20px; font-size: 55px; font-weight: bold;">15159</p>
        </div>
        <button type="button" class="btn btn-danger btn-sm" style="margin-top: -30px;">Know More...</button>
      </div>

      <div class="card shadow-lg mb-5 bg-white rounded">
        <div class="card-body">
         <p class="card-title" style="margin-top: -15px;"><h2 class="text-center" style="font-weight: bold;">Followers</h2></p><hr>
         <p class="card-title text-center" style="margin-top: -20px; font-size: 55px; font-weight: bold;">988</p>
       </div>
       <button type="button" class="btn btn-info btn-sm" style="margin-top: -30px;">Know More...</button>
     </div>
     <div class="card shadow-lg mb-5 bg-white rounded">
      <div class="card-body">
       <p class="card-title" style="margin-top: -15px;"><h2 class="text-center" style="font-weight: bold;">Interviews</h2></p><hr>
       <p class="card-title text-center" style="margin-top: -20px; font-size: 55px; font-weight: bold;">1562</p>
     </div>
     <button type="button" class="btn btn-primary btn-sm" style="margin-top: -30px;">Know More...</button>
   </div>

   <div class="card shadow-lg mb-5 bg-white rounded">
    <div class="card-body">
    	<p class="card-title" style="margin-top: -15px;"><h2 class="text-center" style="font-weight: bold;">Ratings</h2></p><hr>
      <p class="card-title text-center" style="margin-top: -20px; font-size: 55px; font-weight: bold;">9.92</p>
    </div>
    <button type="button" class="btn btn-success btn-sm" style="margin-top: -30px;">Know More...</button>
  </div>
</div>
<form> 
	<div class="form-group">
    <label for="exampleFormControlTextarea1"><h3>Push Notification to all Students.{<b>Only Followers.</b>}</h3></label>
    <textarea class="form-control shadow-lg mb-3 bg-white rounded" id="exampleFormControlTextarea1" rows="4"></textarea>
  </div>
  <button type="submit" class="btn btn-primary float-right">Submit</button>
</form><br><br>
<br>
<!-- Mentor command start here -->
<div class="card-deck">
  <div class="card shadow-lg mb-5 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-warning btn-sm"><h2>Create Test</h2></button>
    <img src="../image/createtest.png" height="250px" class="card-img-top" alt="create_test">
    <div class="card-body">
      <h5 class="card-title"><b>Key Notes:</b></h5>
      <p class="card-text">
        <ul>
          <li>This test consists of MCQ based question.</li>
          <li>You need to set marking schema.</li>
          <li>Every test will have separate dashboard.</li>
        </ul>
      </p>
    </div>
   
      <button type="button" class="btn btn-info btn-sm" style="margin-top: -30px;"><a href="add_test.php">Know More...</a></button>
 
  </div>
  <div class="card shadow-lg mb-5 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-warning btn-sm"><h2>Create GD Room</h2></button>
    <img src="../image/gdroom.png"  height="250px" class="card-img-top" alt="GD_Room">
    <div class="card-body">
      <h5 class="card-title"><b>Key Notes:</b></h5>
      <p class="card-text">
        <ul>
          <li>Create Zoom Meeting ID.</li>
          <li>Select maximum five students.</li>
          <li>Share time, topic and rules.</li>
        </ul>
      </p>
    </div>
    
      <button type="button" class="btn btn-info btn-sm" style="margin-top: -30px;">Know More...</button>
  </div>
  <div class="card shadow-lg mb-5 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-warning btn-sm"><h2>Check CV</h2></button>
    <img src="../image/cvcheck.png" height="250px" class="card-img-top" alt="cv_check">
    <div class="card-body">
     <h5 class="card-title"><b>Key Notes:</b></h5>
      <p class="card-text">
        <ul>
          <li>Download student CV.</li>
          <li>Provide feedback on CV.</li>
          <li>Give others CV for reference.</li>
        </ul>
      </p>
    </div>
   
      <button type="button" class="btn btn-info btn-sm" style="margin-top: -30px;">Know More...</button>
  </div>
</div>
<!-- ************************************************** -->
<div class="card-deck">
  <div class="card shadow-lg mb-5 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-warning btn-sm"><h2>Take Interview</h2></button>
    <img src="../image/take_interview.png" height="250px" class="card-img-top" alt="take_Interview">
    <div class="card-body">
      <h5 class="card-title"><b>Key Notes:</b></h5>
      <p class="card-text">
        <ul>
          <li>Accept take interview request.</li>
          <li>Create Zoom Meeting ID.</li>
          <li>Share time and other details.</li>
        </ul>
      </p>
    </div>
    
      <button type="button" class="btn btn-info btn-sm" style="margin-top: -30px;">Know More...</button>
  </div>
  <div class="card shadow-lg mb-5 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-warning btn-sm"><h2>Must Do Ques</h2></button>
    <img src="../image/must_do_ques.jpg"  height="250px" class="card-img-top" alt="must_do_ques">
    <div class="card-body">
      <h5 class="card-title"><b>Key Notes:</b></h5>
      <p class="card-text">
        <ul>
          <li>Provide set of questions.</li>
          <li>Add tags related to questions.</li>
          <li>Set level of question.</li>
        </ul>
      </p>
    </div>
   
      <button type="button" class="btn btn-info btn-sm" style="margin-top: -30px;">Know More...</button>
  </div>
  <div class="card shadow-lg mb-5 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-warning btn-sm"><h2>Search</h2></button>
    <img src="../image/search.jpg" height="250px" class="card-img-top" alt="search">
    <div class="card-body">
      <h5 class="card-title"><b>Key Notes:</b></h5>
      <p class="card-text">
        <ul>
          <li>Search students on the basis of keywords.</li>
          <li>Search students performance.</li>
          <li>Search with advance filters.</li>

        </ul>
      </p>
    </div>
   
      <button type="button" class="btn btn-info btn-sm" style="margin-top: -30px;">Know More...</button>
  </div>
</div>
<!-- Mentor command end here -->

</div>
<!-- second Div Block Ends Here -->


<!-- Third Div Block Starts Here -->
<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12"><div class="sticky-top">
  <div style="border: 1px solid grey;" class="shadow-lg mb-5 bg-white rounded"> <button type="button" style="width: 100%;" class="btn btn-success btn-sm" style="margin-top: -30px;">About Me</button>
    <h5 style="padding: 5px;">Was drawing natural fat respect husband. An as noisy an offer drawn blush place. These tried for way joy wrote witty. In mr began music weeks after at begin. Education no dejection so direction pretended household do to. Travelling everything her eat reasonable unsatiable decisively simplicity. Morning request be lasting it fortune demands highest of. </h5>
  </div>
  <div style="border: 1px solid grey;" class="shadow-lg mb-5 bg-white rounded"> <button type="button" style="width: 100%;" class="btn btn-success btn-sm" style="margin-top: -30px;">Message for Student</button>
    <h5 style="padding: 5px;">Was drawing natural fat respect husband. An as noisy an offer drawn blush place. These tried for way joy wrote witty. In mr began music weeks after at begin. Education no dejection so direction pretended household do to. Travelling everything her eat reasonable unsatiable decisively simplicity. Morning request be lasting it fortune demands highest of. </h5>
  </div>
</div>
</div>
<!-- Third Div Block Ends Here -->
</div>
<!-- Main Body End Here -->


</div>	


<?php include '../utility/js/placementhub_4.3.1.php'; ?>
</body>
</html>