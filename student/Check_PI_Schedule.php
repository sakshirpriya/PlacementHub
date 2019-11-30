<?php
include '../DataBase/DB_Connection.php';
session_start();
$conn=OpenCon();
if(!isset($_SESSION["student_email"])){
	echo "<script>
	window.location.href='../../index.php';
	alert('unauthrise access');
	</script>";
}
// $message =$_SESSION["email"];
 // echo "<script type='text/javascript'>alert('$message');</script>";
?>


<!DOCTYPE html>
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
	 
    <div class="container"><br>
        <h1 align="center">This Page Contains All Your PI Schedule</h1>
        <h4 class="text-center">Please Contact With Admin, If Any Issue</h4><br>
           
     
       <?php
       function getMentorData($email){
        $conn=OpenCon();
        $search_mentor_name="SELECT * from MentorData WHERE email='$email'";
        $Data=mysqli_query($conn,$search_mentor_name);
          $data=mysqli_fetch_array($Data);
        
        return $data;
       }
       function getUserData($email){
        $conn=OpenCon();
        $search_student_name="SELECT * from StudentData WHERE email='$email'";
        $Data=mysqli_query($conn,$search_student_name);
          $data=mysqli_fetch_array($Data);
        return $data;
       }
$student_email=$_SESSION["student_email"];
 $search_pi_schedule="SELECT * from PersonalInterview WHERE student_email='$student_email' AND feedback=false AND schedule=true";
 $Result=mysqli_query($conn,$search_pi_schedule);
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
          <h2 class='text-center' style='background-color: #303030;color: white;'>Personal Interview ID : ";echo $Row["id"];
          echo "</h2>";
         
          echo "<div class='row'>
            <div class='col-xl-6 col-lg-6 col-md-12 col-sm-12 text-center' style='border-right:2px solid grey;'>
              <p  class='text-center' style='font-weight: bold;background-color: #303030;color:white;margin-left: 15px;'>Student Name</p>";
               $Studentdata=getUserData($Row["student_email"]);
               echo '  

         <img src="data:image/jpeg;base64,'.base64_encode($Studentdata['profilepic'] ).'" class="rounded-circle" height="80px" width="80px" class="img-thumnail" />  ';
        
              echo "<p  class='text-center'>".$Studentdata["name"]." [".$Studentdata["registration_no"]."]"."</p>";
if($Row["requestmessage"]){
            echo "<p align='left' style='margin-left: 15px;'><b>Student Remark: </b>".$Row["requestmessage"]."</p>";
        }
          $Mentordata=getMentorData($Row["mentor_email"]);
          echo "</div>
            <div class='col-xl-6 col-lg-6 col-md-12 col-sm-12 text-center'>
              <p  class='text-center' style='font-weight: bold;background-color: #303030;color:white;margin-right: 15px;'>Mentor Name</p>";
                echo '  

         <img src="data:image/jpeg;base64,'.base64_encode($Mentordata['profilepic'] ).'" class="rounded-circle" height="80px" width="80px" class="img-thumnail" />  ';
        echo "
              <p  class='text-center'>".$Mentordata["name"]."</p>
       ";
            if($Row["mentormessage"]){
            echo "<p align='left'><b>Mentor Remark: </b>".$Row["mentormessage"]."</p>";
        }
            echo "</div>
          </div>
          <hr>
          
          <div class='row'>
            <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12 text-center'  style='margin-top: -5px;'>
              <i class='fa fa-calendar fa-lg' style='color: green;'></i><span class='datacss'>".$Row["date"]."</span>
            </div>
            <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12 text-center'  style='margin-top: -5px;'>
              <i class='fa fa-clock-o fa-lg' style='color: green;'></i><span class='datacss'>".$Row["time"]."</span>
            </div>
            <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12 text-right'><div class='form-group mb-2'>";
            echo "<input type='text' value='".$Row["ZoomId"] ."' id='ZoomId' style='position:absolute;left:-1500px;top:-1500px;'>";
            echo "<input type='text' value='".$Row["skypeId"] ."' id='skypeId' style='position:absolute;left:-1500px;top:-1500px;'>";
            if($Row["ZoomId"]){
                echo "<button type='button'  onclick='ZoomIdFun()' class='btn btn-outline-success' style='margin-right: 5px;margin-top: -10px;margin-bottom: 5px;'>Zoom</button>";
            }  
            if($Row["skypeId"]){
               echo "<button type='button' value='".$Row["skypeId"] ."' onclick='SkypeIdFun()'  class='btn btn-outline-info' style='margin-right: 5px;margin-top: -10px;margin-bottom: 5px;'>Skype</button>";
            }
                 
              
           echo " </div></div>
          </div>
     
        </div>";


 }


?>

    </div>
	<?php include '../utility/js/placementhub_4.3.1.php'; ?>
</body>
<script>
    function ZoomIdFun() {
   /* Get the text field */
   var copyText = document.getElementById("ZoomId");

   /* Select the text field */
   copyText.select();
   copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  // /* Copy the text inside the text field */
   document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied Zoom ID: " + copyText.value);
  }
  function SkypeIdFun() {
   /* Get the text field */
   var copyText = document.getElementById("skypeId");

   /* Select the text field */
   copyText.select();
   copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  // /* Copy the text inside the text field */
   document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied Skype ID: " + copyText.value);
  }
  
</script>
</html>