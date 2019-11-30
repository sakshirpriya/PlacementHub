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
// Make sure an ID was passed
if(isset($_GET['id'])) {
// Get the ID
    $id = intval($_GET['id']);
 
    // Make sure the ID is in fact a valid ID
    if($id <= 0) {
        die('The ID is invalid!');
    }
    else {
    
 
        // Fetch the file information
        $query = "
            SELECT `studentfiletype`, `studentcvname`, `studentsize`, `studentdata`
            FROM `cvcheckUpload`
            WHERE `id` = {$id}";
        $result = $conn->query($query);
 
        if($result) {
            // Make sure the result is valid
            if($result->num_rows == 1) {
            // Get the row
                $row = mysqli_fetch_assoc($result);
 
                // Print headers
                header("Content-Type: ". $row['studentfiletype']);
                header("Content-Length: ". $row['studentsize']);
                header("Content-Disposition: attachment; filename=". $row['studentcvname']);
 
                // Print data
                echo $row['studentdata'];
            }
            else {
                echo 'Error! No image exists with that ID.';
            }
 
            // Free the mysqli resources
            @mysqli_free_result($result);
        }
        else {
            echo "Error! Query failed: <pre>{$conn->error}</pre>";
        }
        @mysqli_close($conn);
    }
}
else {
    echo 'Error! No ID was passed.';
}
?>