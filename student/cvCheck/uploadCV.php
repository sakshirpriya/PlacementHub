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
// Check if a file has been uploaded
if(isset($_FILES['uploaded_file'])) {
    // Make sure the file was sent without errors
    if($_FILES['uploaded_file']['error'] == 0) {
      
 $student_email=$_SESSION["student_email"];
 $mentor_email=$_REQUEST["mentor_email"];
 $SearchName="SELECT * from MentorData WHERE email='$mentor_email'";
 $data=mysqli_query($conn,$SearchName);
 $row = mysqli_fetch_assoc($data);
 $MentorName=$row["name"];
 $RequestMessage=$_REQUEST["RequestMessage"];
 // $mentor_email=$_SESSION["mentor_email"];
        // Gather all required data
        $studentcvname = $conn->real_escape_string($_FILES['uploaded_file']['name']);
        $studentfiletype = $conn->real_escape_string($_FILES['uploaded_file']['type']);
        $studentdata = $conn->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
        $studentsize = intval($_FILES['uploaded_file']['size']);
 
        // Create the SQL query
        $query = "
            INSERT INTO `cvcheckUpload` (
                `studentcvname`,`studentfiletype`,`studentsize`,
                `studentdata`,`studentcreated`,`mentor_email`,`student_email`,`feedback`,`RequestMessage`,`mentorname`
            )
            VALUES (
                '{$studentcvname}', 
                '{$studentfiletype}', 
                '{$studentsize}', 
                '{$studentdata}', 
                NOW(),
                '{$mentor_email}',
                '{$student_email}',
                false,
                '{$RequestMessage}',
                '{$MentorName}'
                
            )";
 
        // Execute the query
        $result = $conn->query($query);
 
        // Check if it was successfull
        if($result) {
            
             echo "<script>
    window.location.href='index.php';
    alert('Success! Your file was successfully added!');
    </script>";
        }
        else {
            echo 'Error! Failed to insert the file'
               . "<pre>{$conn->error}</pre>";
        }
    }
    else {
        echo 'An error accured while the file was being uploaded. '
           . 'Error code: '. intval($_FILES['uploaded_file']['error']);
    }
 
    // Close the mysql connection
    //$conn->close();
}
else {
    echo 'Error! A file was not sent!';
}
 
// Echo a link back to the main page
echo '<p>Click <a href="index.php">here</a> to go back</p>';
?>
 
 