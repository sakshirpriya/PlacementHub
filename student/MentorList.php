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
<body style="background-color: #f5fcfb;">
	<?php include 'component/NavBar.php'; ?>
 
 <div class="container">
<div class="container"><br>
        <h1 align="center">This Page Contains All Mentor Whom You Follow</h1>
        <h4 class="text-center">Please Contact With Admin, If Any Issue</h4><br>
<?php
 $student_email=$_SESSION["student_email"];
// Query for a list of all existing files
$sql = "SELECT * FROM `follower_list` WHERE `student_email`='$student_email' AND `follow_status`=true";
$result = $conn->query($sql);
 
// Check if it was successfull
if($result) {
    // Make sure there are some files in there
    if($result->num_rows == 0) {
        echo "<h1 class='text-center' style='color:red;'>There are no request for GD as of now!!!!</h1>";
    }
    else {
        // Print the top of a table
        echo '<div class="table-responsive text-center"><table class="table table-hover table-striped table-dark" style="color:white;">
  <thead class="thead-dark">
    <tr>
      <th scope="col"><b>Mentor</b></th>
      <th scope="col"><b>Name</b></th>
      <th scope="col"><b>Email</b></th>
      <th scope="col"><b>contact_no</b></th>
      <th scope="col"><b>Ratings</b></th>

      
      
    </tr>
  </thead>
  <tbody>
    <tr>';
 
        // Print each file
        while($row = $result->fetch_assoc()) {
          $mentor_email=$row["mentor_email"];
          $SearchMentorData="SELECT * FROM MentorData WHERE email='$mentor_email'";
$MentorDataResult=mysqli_query($conn,$SearchMentorData);
$Data=mysqli_fetch_array($MentorDataResult);


           // echo "<script type='text/javascript'>alert('$message');</script>";
            $Name=$Data["name"];
            $Email=$Data["email"];
            $contact_no=$Data["contact_no"];
            $DP="<img src='data:image/jpeg;base64,".base64_encode($Data["profilepic"] )."' class='rounded-circle' height='35px' width='35px' class='img-thumnail' />";
                        
            // $Mentor=$row['mentorname']?$row['mentorname']:"NA";
            // $RequestMessage=$row['remark']?$row['remark']:"NA";
            $GiveFeedback="<a href='MentorRatings/index.php?mentor_email=".$Data["email"]."'><i class='fa fa-clock-o fa-2x' aria-hidden='true' style='color:pink;'></i></i></a>";
           
            echo "
                <tr>
                    
                    
                    <td>{$DP}</td>
                    <td>{$Name}</td>
                   
                  
                    <td>{$Email}</td>
                     <td>{$contact_no}</td>
                    
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

 	<!-- container ends here -->
 </div>
<?php include '../utility/js/placementhub_4.3.1.php'; ?>
</body>
</html>

