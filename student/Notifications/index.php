<?php
include '../../DataBase/DB_Connection.php';
session_start();
$conn=OpenCon();
if(!isset($_SESSION["student_email"])){
    echo "<script>
    window.location.href='../../index.php';
    alert('unauthrise access');
    </script>";
} 
// Close the mysql connection
// $conn->close();
?>



<!DOCTYPE html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../../image/title_logo.png" type="image/x-icon">

    <?php include '../../utility/css/placementhub_4.3.1.php'; ?>
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
    <?php include '../component/NavBar.php'; ?>
    <div class="container-fluid"><br>
        <h1 align="center">This Page Listed All Your Notifications.</h1>
        <h4 class="text-center">Please Contact With Admin, If Any Upload Missed</h4><br>
<?php

 $FindNotifications="SELECT * FROM Notifications ORDER BY date DESC, time  DESC ";
    $result=mysqli_query($conn,$FindNotifications);
 
// Check if it was successfull
if($result) {
    // Make sure there are some files in there
    if($result->num_rows == 0) {
       echo "<h1 class='text-center' style='color:red;'>There are no notification in the database for you!!!!</h1>";
           }
    else {
        // Print the top of a table
        echo '<div class="table-responsive text-center"><table class="table table-hover table-striped table-dark""  style="color:white;">
  <thead class="thead-dark">
    <tr>
      <th scope="col"><b>ID</b></th>
     
      <th scope="col"><b>Notification</b></th>
      <th scope="col"><b>Mentor</b></th>
      <th scope="col"><b>Date</b></th>
      <th scope="col"><b>Time</b></th>
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
                        $MentorName=$Data["name"];
                        $profilepic='<img src="data:image/jpeg;base64,'.base64_encode($Data['profilepic'] ).'" class="rounded-circle" height="35px" width="35px" class="img-thumnail" />';
                        $Email=$Data["email"];
                        

            $ID=$row['id']?$row['id']:"NA";
            $Notifications=$row['notification']?$row['notification']:"NA";
            $Date=$row['date']?$row['date']:"NA";
            $time=$row['time']?$row['time']:"NA";
            echo "
                <tr>
                    <td>{$ID}</td>
                    
                
                    <td>{$Notifications}</td>
                    <td>{$profilepic}</td>
                    <td>{$MentorName}</td>
                    <td>{$Date}</td>
                    <td>{$time}</td>

                   
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
    <?php include '../../utility/js/placementhub_4.3.1.php'; ?>
</body>
</html>


