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
      <!-- first Div Block starts here -->
      <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 ">   
      </div>
      <!-- first Div Block ends here -->
      <!-- second Div Block starts Here -->
      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
        <h1 class="text-center">GD Timetable</h1>
        
       <?php
       function getUserNameOfMentor($email){
        $conn=OpenCon();
        $search_mentor_name="SELECT * from MentorData WHERE email='$email'";
        $Data=mysqli_query($conn,$search_mentor_name);
          $data=mysqli_fetch_array($Data);
          $name=$data["name"];
        return $name;
       }
       function getUserNameOfStudent($email){
        $conn=OpenCon();
        $search_mentor_name="SELECT * from StudentData WHERE email='$email'";
        $Data=mysqli_query($conn,$search_mentor_name);
          $data=mysqli_fetch_array($Data);
          $name=$data["name"]." [".$data["registration_no"]."]";
        return $name;
       }
$mentor_email=$_SESSION["mentor_email"];
 $search_for_group_details="SELECT * from gd_room_creator WHERE email='$mentor_email' AND feedback=false";
 $Result=mysqli_query($conn,$search_for_group_details);
 while($Row=mysqli_fetch_array($Result)){
  // echo $Row["email"]."<br>";
  // echo $Row["gd_room_name"]."<br>";
  // echo $Row["student_1"]."<br>";
  // echo $Row["student_2"]."<br>";
  // echo $Row["student_3"]."<br>";
  // echo $Row["student_4"]."<br>";
  // echo $Row["student_5"]."<br>";
  // echo $Row["zoom_id"]."<br>";
  // echo $Row["topic"]."<br>";
  // echo $Row["date"]."<br>";
  // echo $Row["time"]."<br>";
 echo "<hr>";
echo "<div style='border: 2px solid grey;'>
          <h2 class='text-center' style='background-color: #303030;color: white;'>";echo $Row["gd_room_name"];
          echo "</h2>";
          if($Row["topic"]){
            echo "<p style='background-color: #fc0373;color: white;margin-top: 5px;'><b style='margin-left: 5px;'>Topic : </b>".$Row["topic"]."</p>";
          }
          echo "<div class='row'>
            <div class='col-xl-6 col-lg-6 col-md-12 col-sm-12' style='border-right:2px solid grey;'>
              <p  class='text-center' style='font-weight: bold;background-color: #303030;color:white;margin-left: 15px;'>Group Members</p>";
          if ($Row["student_1"]) {
            echo "<div  style='margin-left: 10px;'>
     <i class='fa fa-user-circle-o fa-lg' style='color: #b103fc;'></i><span class='datacss'>".getUserNameOfStudent($Row["student_1"])."</span></div>";
          }
           if ($Row["student_2"]) {
            echo "<div  style='margin-left: 10px;'>
     <i class='fa fa-user-circle-o fa-lg' style='color: #fc8003;'></i><span class='datacss'>".getUserNameOfStudent($Row["student_2"])."</span></div>";
          }
           if ($Row["student_3"]) {
            echo "<div  style='margin-left: 10px;'>
     <i class='fa fa-user-circle-o fa-lg' style='color: #11a624;'></i><span class='datacss'>".getUserNameOfStudent($Row["student_3"])."</span></div>";
          }
           if ($Row["student_4"]) {
            echo "<div  style='margin-left: 10px;'>
     <i class='fa fa-user-circle-o fa-lg' style='color: #9b7be0;'></i><span class='datacss'>".getUserNameOfStudent($Row["student_4"])."</span></div>";
          }
           if ($Row["student_5"]) {
            echo "<div  style='margin-left: 10px;'>
     <i class='fa fa-user-circle-o fa-lg' style='color: #f5008f;'></i><span class='datacss'>".getUserNameOfStudent($Row["student_5"])."</span></div>";
          }
          echo "</div>
            <div class='col-xl-6 col-lg-6 col-md-12 col-sm-12 text-center'>
              <p  class='text-center' style='font-weight: bold;background-color: #303030;color:white;margin-right: 15px;'>Mentor</p>
              <img src='../image/title_logo.png'  width='75px' height='75px'>
              <p  class='text-center'>".getUserNameOfMentor($Row["email"])."</p>

            </div>
          </div>
          <hr>
          
          <div class='row'>
            <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12 text-center'  style='margin-top: -5px;'>
              <i class='fa fa-calendar fa-lg' style='color: green;'></i><span class='datacss'>".$Row["date"]."</span>
            </div>
            <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12 text-center'  style='margin-top: -5px;'>
              <i class='fa fa-clock-o fa-lg' style='color: green;'></i><span class='datacss'>".$Row["time"]."</span>
            </div>
            <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12 text-right'>
              <a href='". $Row["zoom_id"]."' target='blank' class='btn btn-outline-success' style='margin-right: 5px;margin-top: -10px;margin-bottom: 5px;'>Join Room</a>
            </div>
          </div>
     
        </div>";


 }


?>
        


      </div>
      <!-- second Div Block Ends Here -->
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