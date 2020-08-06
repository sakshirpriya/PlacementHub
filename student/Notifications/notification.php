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

 //$message = $row["email"];
 //echo "<script type='text/javascript'>alert('$message');</script>";

 ?>  
<div class="card ">
    <button type="button" style="width: 100%;" class="btn btn-info btn-sm"><h2><i class="fa fa-bell-o" aria-hidden="true"></i>Notifications</h2></button>
    <?php
    $FindNotifications="SELECT * FROM Notifications ORDER BY date DESC, time  DESC LIMIT 3";
    $NotificationsData=mysqli_query($conn,$FindNotifications);
    while($row=mysqli_fetch_assoc($NotificationsData)){
     echo "<div class='row' style='padding:5px;'>
  <div class='col-xl-12 col-lg-12 col-md-12 col-sm-12'><b><i class='fa fa-bolt fa-lg' aria-hidden='true'></i> : </b>".$row["notification"]."</div>
</div>";
echo "<br>";
      echo " <div class='row'>
            <div class='col-xl-6 col-lg-6 col-md-12 col-sm-12 text-center'  style='margin-top: -5px;'>
              <i class='fa fa-calendar fa-lg' style='color: green;'></i><span class='datacss'>".$row["date"]."</span>
            </div>
            <div class='col-xl-6 col-lg-6 col-md-12 col-sm-12 text-center'  style='margin-top: -5px;'>
              <i class='fa fa-clock-o fa-lg' style='color: green;'></i><span class='datacss'>".$row["time"]."</span>
            </div>
            
          </div>";
          echo "<hr>";
      
    }

     ?>
   
    
      <button type="button" class="btn btn-info btn-lg"><a href="Notifications/index.php" style="color: white; font-weight: bold;">All Notifications</a></button>
  </div>
<br>

<?php $email=$_SESSION["student_email"];
//echo "<script type='text/javascript'>alert('$email');</script>";

$query="SELECT * FROM StudentData WHERE email='$email'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);?>
   <div class="card shadow-lg mb-3 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-info btn-sm"><h2 class="float-left">XII Academics</h2><i class="fa fa-pencil fa-2x float-right"  data-toggle="modal" data-target="#XIIData"  style="margin-right: 10px;margin-top: 7px;cursor: -webkit-grab; cursor: grab;" ></i></button><div style="margin-top: 10px;margin-left: 5px">
<div><i class="fa fa-university fa-2x"></i><span class="datacss"><?php echo $row["xii_school"]; ?></span></div><hr>
      <div><i class="fa fa-bar-chart fa-2x"></i><span class="datacss"><?php echo $row["xii_percentage"] .'  %'; ?></span></div><hr>
    <div><i class="fa fa-list-ul fa-2x"></i><span class="datacss"><?php echo $row["xii_board"]; ?></span></div><hr>
     <div><i class="fa fa-calendar-check-o fa-2x"></i><span class="datacss"><?php echo $row["xii_year"]; ?></span></div>
     
            </div>  <br
      >  
               
    
  </div>
   <div class="card shadow-lg mb-3 bg-white rounded">
    <button type="button" style="width: 100%;" class="btn btn-info btn-sm"><h2 class="float-left">X Academics</h2><i class="fa fa-pencil fa-2x float-right"  data-toggle="modal" data-target="#XData"  style="margin-right: 10px;margin-top: 7px;cursor: -webkit-grab; cursor: grab;" ></i></button>
     <div style="margin-top: 10px;margin-left: 5px">
      <div><i class="fa fa-university fa-2x"></i><span class="datacss"><?php echo $row["x_school"]; ?></span></div><hr>
      <div><i class="fa fa-bar-chart fa-2x"></i><span class="datacss"><?php echo $row["x_percentage"]; ?></span></div><hr>
    <div><i class="fa fa-list-ul fa-2x"></i><span class="datacss"><?php echo $row["x_board"]; ?></span></div><hr>
     <div><i class="fa fa-calendar-check-o fa-2x"></i><span class="datacss"><?php echo $row["x_year"]; ?></span></div>
    </div><br>
  </div>