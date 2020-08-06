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
          $name =  $_POST['interest'];
          $sql = "INSERT INTO interest (id,interest_name) VALUES (NULL,'$name')";

          if(mysqli_query($conn,$sql)){
            echo "success";
            // header("location: https://v2018.api2pdf.com/chrome/url?url=http://13.126.165.2/cv/template/index.php&apikey=8827b1fd-ac9c-4176-a84a-df226d72a341");

          }
      }
      

      ?>