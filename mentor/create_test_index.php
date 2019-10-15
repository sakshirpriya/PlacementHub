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
</head>
<body>
	<?php include 'component/NavBar.php'; ?>
	<hr>
  <div class="container-fluid">

    <!-- Main Body Start here -->
    <div class="row">
      <!-- first Dev Block starts here -->
      <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 ">
   <?php include 'component/side_profile_card.php'; ?> 
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
<br>
<!-- Mentor command start here -->
<div class="card-deck">
  <div class="card shadow-lg mb-5 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-info btn-sm"><h2>MCQ Based Test</h2></button>
    <img src="../image/createtest.png" height="250px" class="card-img-top" alt="MCQ_Based_Test">
    <div class="card-body">
      <h5 class="card-title"><b>Key Notes:</b></h5>
      <p class="card-text">
        <ul>
          <li>This test consists of MCQ based question.</li>
          <li>You need to set marking schema.</li>
          <li>This test will have separate leaderboard.</li>
        </ul>
      </p>
    </div>
   
      <button type="button" class="btn btn-info btn-sm" style="margin-top: -30px;"><a href="MCQ_Based_Test.php">CREATE NOW!!!</a></button>
 
  </div>
  <div class="card shadow-lg mb-5 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-info btn-sm"><h2>Essay Writing Test</h2></button>
    <img src="../image/gdroom.png"  height="250px" class="card-img-top" alt="Essay_Writing_Test">
    <div class="card-body">
      <h5 class="card-title"><b>Key Notes:</b></h5>
      <p class="card-text">
        <ul>
          <li>You will assign topic.</li>
          <li>Choose word limit for topic.</li>
          <li>Give feedback to every essay writer.</li>
        </ul>
      </p>
    </div>
    
      <button type="button" class="btn btn-info btn-sm" style="margin-top: -30px;"><a href="Essay_Writing_Test.php">CREATE NOW!!!</a></button>
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
<!-- <div class="card-deck">
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
</div> -->
<!-- Mentor command end here -->

</div>
<!-- second Div Block Ends Here -->


<!-- Third Div Block Starts Here -->
<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
   <?php include 'component/about_and_message_card.php'; ?>
</div>
<!-- Third Div Block Ends Here -->
</div>
<!-- Main Body End Here -->


</div>	


<?php include '../utility/js/placementhub_4.3.1.php'; ?>
</body>
</html>