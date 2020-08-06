<?php

  $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "Placement123@";
 $db = "PlacementHub";
 $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
  // Check connection
if (mysqli_connect_errno())
{
  $Name="NotConnect";
 echo "<script type='text/javascript'>alert('$Name');</script>";
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>