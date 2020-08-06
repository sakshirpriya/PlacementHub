<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysqli_connect("localhost","root","Nikhil123.@","Testing");
    $query=mysqli_query($con, "select * from tbl_customer where CustomerName LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['CustomerName'];
    }
    echo json_encode($array);
    mysqli_close($con);
?>
