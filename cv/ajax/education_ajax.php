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
          $institute =  $_POST['institute'];
          $class =  $_POST['class'];
          $place =  $_POST['place'];
          $percentage =  $_POST['percentage'];
          $year =  $_POST['year'];
          $sql = "INSERT INTO education (id,institute_name,class,location,passing_date,percentage) VALUES (NULL,'$institute','$class','$place','$year','$percentage')";
          if(mysqli_query($conn,$sql)){
            echo "success";
          }
          else
          {
            echo"error";
          }
      }

      
      

      ?>