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
          $name =  $_POST['skill'];
          $sql = "INSERT INTO skills (id,skill_name) VALUES (NULL,'$name')";
          if(mysqli_query($conn,$sql)){
          }
          else
          {
            echo"error";
          }
      }

      
      

      ?>