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


<!DOCTYPE html>
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
</style>
</head>
<body>
	<?php include 'component/NavBar.php'; ?>
	 
    <div class="container-fluid"><br>
        <h1 align="center">This Page Listed All PI Student</h1>
        <h4 class="text-center">Please Contact With Admin, If Any Upload Missed</h4><br>
<?php
 $mentor_email=$_SESSION["mentor_email"];
// Query for a list of all existing files
$sql = "SELECT * FROM `PersonalInterview` WHERE `mentor_email`='$mentor_email' AND `feedback`=false";
$result = $conn->query($sql);
 
// Check if it was successfull
if($result) {
    // Make sure there are some files in there
    if($result->num_rows == 0) {
        echo "<h1 class='text-center' style='color:red;'>There are no files in the database for you!!!!</h1>";
    }
    else {
        // Print the top of a table
        echo '<div class="table-responsive text-center"><table class="table table-hover table-striped table-dark""  style="color:white;">
  <thead class="thead-dark">
    <tr>
      <th scope="col"><b>PI-ID</b></th>
      <th scope="col"><b>Student</b></th>
      <th scope="col"><b>Name</b></th>
      <th scope="col"><b>Regist.No</b></th>
      <th scope="col"><b>Mentor</b></th>
      <th scope="col"><b>Feedback</b></th>

      
      
    </tr>
  </thead>
  <tbody>
    <tr>';
 
        // Print each file
        while($row = $result->fetch_assoc()) {
        	$student_email=$row["student_email"];
        	$SearchStudentData="SELECT * FROM StudentData WHERE email='$student_email'";
$StudentDataResult=mysqli_query($conn,$SearchStudentData);
$Data=mysqli_fetch_array($StudentDataResult);


        	 // echo "<script type='text/javascript'>alert('$message');</script>";
						$studentName=$Data["name"];
                        $profilepic='<img src="data:image/jpeg;base64,'.base64_encode($Data['profilepic'] ).'" class="rounded-circle" height="35px" width="35px" class="img-thumnail" />';
						$registration_no=$Data["registration_no"];
						$_SESSION["studentName"]=$studentName;
						$_SESSION["registration_no"]=$registration_no;
						// $student_email=$row['student_email'];
                        $_SESSION["profilepic"]=$profilepic;

						
           
            $Mentor=$row['mentorname']?$row['mentorname']:"NA";
            $RequestMessage=$row['RequestMessage']?$row['RequestMessage']:"NA";
            $GiveFeedback="<a href='Give_PI_Feedback.php?id={$row['id']}&email={$row['student_email']}'><i class='fa fa-commenting-o fa-2x' aria-hidden='true' style='color:pink;'></i></i></a>";
           
            echo "
                <tr>
                    
                    
                    <td>{$row['id']}</td>
                    <td>{$profilepic}</td>
                    <td>{$studentName}</td>
                    <td>{$registration_no}</td>
                    
                
                    <td>{$Mentor}</td>
                    
                    
                    <td>{$GiveFeedback}</td>

                   
                </tr>";
                
        }
 
        // Close table
        echo '</tbody>
</table></div>
';
    }
 
    // Free the result
    $result->free();
}
else
{
    echo 'Error! SQL query failed:';
    echo "<pre>{$conn->error}</pre>";
}

?>

    </div>
	<?php include '../utility/js/placementhub_4.3.1.php'; ?>
</body>
</html>