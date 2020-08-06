<?php 
    
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "Placement123@";
 $db = "PlacementHub";
 $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
 if (mysqli_connect_errno())
{
  $Name="NotConnect";
 echo "<script type='text/javascript'>alert('$Name');</script>";
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
    
    
    
        if($_SERVER["REQUEST_METHOD"] == "POST") {
              $name =  $_POST['project_name'];
              $year =  $_POST['year'];
              $msg =  $_POST['description'];
              $sql = "INSERT INTO projects (id,project_name,p_description,p_date) VALUES (NULL,'$name','$msg','$year')";

              if(mysqli_query($conn,$sql)){
                echo "success";
              }
              else
              {
                  echo "error: ".$sql;
              }
          }
    
          
          
?>