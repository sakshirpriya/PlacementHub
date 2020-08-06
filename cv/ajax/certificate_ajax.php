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
else{

	 if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name =  $_POST['certificate'];
        $sql = "INSERT INTO certificates (id,certificate_name) VALUES (NULL,'$name')";

        if(mysqli_query($conn,$sql)){
          echo "success";

        }
      }

}
 

// $servername = "localhost";
// $username = "id8358665_prince";
// $password = "test123";
// $database = 'id8358665_resume';




      

?>