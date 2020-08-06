
    <?php
    $key=$_GET['key'];
    $array = array();
    $con=mysqli_connect("localhost","root","Nikhil123.@","PlacementHub");
    $query=mysqli_query($con, "select * from StudentAuth where email LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['email'];
    }
    echo json_encode($array);
    // mysqli_close($con);
?>
