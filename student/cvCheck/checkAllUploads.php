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
        <h1 align="center">This Page Listed All Your CV Uploads</h1>
        <h4 class="text-center">Please Contact With Admin, If Any Upload Missed</h4><br>
<?php
 $student_email=$_SESSION["student_email"];
// Query for a list of all existing files
$sql = "SELECT * FROM `cvcheckUpload` WHERE `student_email`='$student_email'";
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
      <th scope="col"><b>CV Name</b></th>
     
      <th scope="col"><b>S-CV</b></th>
      <th scope="col"><b>Mentor</b></th>
      <th scope="col"><b>F-CV</b></th>
      <th scope="col"><b>Marks[10]</b></th>
      <th scope="col"><b>Remarks</b></th>
      
    </tr>
  </thead>
  <tbody>
    <tr>';
 
        // Print each file
        while($row = $result->fetch_assoc()) {
            $feedback=$row['mentorsize']?"Yes":"No";
            $marks=$row['marks']?$row['marks']:"NA";
            $Remarks=$row['mentorfeedback']?$row['mentorfeedback']:"NA";
            $Mentor=$row['mentorname']?$row['mentorname']:"NA";
            $FCV=$row['mentorsize']?"<a href='downloadmentorCV.php?id={$row['id']}'><i class='fa fa-download fa-2x' aria-hidden='true' style='color:red;'></i></a>":"NA";
            echo "
                <tr>
                    <td>{$row['studentcvname']}</td>
                    
                    <td><a href='downloadCV.php?id={$row['id']}'><i class='fa fa-download fa-2x' aria-hidden='true' style='color:green;'></i></a></td>
                    <td>{$Mentor}</td>
                    <td>{$FCV}</td>
                    <td>{$marks}</td>
                    <td>{$Remarks}</td>

                   
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


