<?php
include '../DataBase/DB_Connection.php';
session_start();
$conn=OpenCon();
if(!isset($_SESSION["mentor_email"])){
    echo "<script>
    window.location.href='../index.php';
    alert('unauthrise access');
    </script>";
}
$email =$_SESSION["mentor_email"];
if(isset($_REQUEST["gd_submit"])){
  
  $check=$_REQUEST["gd_room_name"];
 if(!$check==NULL){
//check if test gd room already exists...
$search="SELECT * FROM gd_room_creator where gd_room_name='$check' AND email='$email'";
$result=mysqli_query($conn, $search);
$rows = mysqli_num_rows($result);
 if($rows){
  $message="Sorry! You can not create this GD Room. Same email and GD Room name combintion already found!!!";
 echo "<script type='text/javascript'>alert('$message');</script>";
}else{
  $_SESSION["gd_room_session"]=$_REQUEST["gd_room_name"];;
}
 }

}

//unset gd room session
if(isset($_REQUEST["reset_gd_room_name"])){
unset($_SESSION["gd_room_session"]);
}


function convertTime($str_arr) {
  $str_arr = explode (":", $str_arr); 
  $hours = $str_arr[0];
  $minutes = $str_arr[1];
  if ($hours > 12) {
    $meridian = 'PM';
    $hours -= 12;
  } else if ($hours < 12) {
    $meridian = 'AM';
    if ($hours == 0) {
      $hours = 12;
    }
  } else {
    $meridian = 'PM';
  }
  $returnValue=$hours.':'.$minutes.' '.$meridian;
  return $returnValue;
}


if(isset($_REQUEST["gd_room_submit"])){
  $gd_room_name=$_SESSION["gd_room_session"];
  $gd_topic=$_REQUEST["gd_topic"];
  $date=$_REQUEST["date"];
  $time=convertTime($_REQUEST["time"]);
  $student1=$_REQUEST["student1"];
  $student2=$_REQUEST["student2"];
  $student3=$_REQUEST["student3"];
  $student4=$_REQUEST["student4"];
  $student5=$_REQUEST["student5"];
  if($student1){
   $update="UPDATE gd_request SET gd_room_name='$gd_room_name',status=false WHERE mentor_email='$email' AND student_email='$student1' AND status=true";
  mysqli_query($conn,$update);
  }
  if($student2){
     $update="UPDATE gd_request SET gd_room_name='$gd_room_name',status=false WHERE mentor_email='$email' AND student_email='$student2' AND status=true";
  mysqli_query($conn,$update);
  }
  if($student3){
     $update="UPDATE gd_request SET gd_room_name='$gd_room_name',status=false WHERE mentor_email='$email' AND student_email='$student3' AND status=true";
  mysqli_query($conn,$update);
  }
  if($student4){
     $update="UPDATE gd_request SET gd_room_name='$gd_room_name',status=false WHERE mentor_email='$email' AND student_email='$student4' AND status=true";
  mysqli_query($conn,$update);
  }
  if($student5){
     $update="UPDATE gd_request SET gd_room_name='$gd_room_name',status=false WHERE mentor_email='$email' AND student_email='$student5' AND status=true";
  mysqli_query($conn,$update);
  }
  $zoom_id=$_REQUEST["zoom_id"];
if($gd_room_name==NULL || $date == NULL || $time ==NULL || $zoom_id ==NULL || $student1==NULL || $student2==NULL){
  $message="(*) fields can not be empty...";
  echo "<script type='text/javascript'>alert('$message');</script>";
}else{
    $insert="INSERT INTO gd_room_creator (email,gd_room_name,student_1,student_2,student_3,student_4,student_5,zoom_id,topic,date,time) VALUES ('$email','$gd_room_name','$student1','$student2','$student3','$student4','$student5','$zoom_id','$gd_topic','$date','$time')";
    if(mysqli_query($conn,$insert)){
      unset($_SESSION["gd_room_session"]);
      $message="congratulations! You hahve successfully created gr room.... ";
  echo "<script type='text/javascript'>alert('$message');</script>";
}else{
  $message="something went wrong, Please try again...";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
}


}





?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../image/title_logo.png" type="image/x-icon">
<?php include '../utility/js/placementhub_4.3.1.php'; ?>
    <?php include '../utility/css/placementhub_4.3.1.php'; ?>
   


     <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  
</head>
<body>
    <?php include 'component/NavBar.php'; ?>
    
 <div class="container">

<h3 align="center">Welcome to Create GD Room Pannel.</a></h3><br />
  
       <?php 
   if(isset($_SESSION["gd_room_session"])){
        echo "<h1 class='text-center'>GD Room Name: ".$_SESSION["gd_room_session"]."</h1>";
        echo '<div align="right" style="margin-bottom:5px;"><form method="POST">
      <button type="submit" name="reset_gd_room_name" class="btn btn-danger btn-xs">Reset GD Room Name</button></form>
   </div>';
   }else{
 echo '<form method="POST">
           <div class="form-group" align="center">
    <label>Enter Test Name</label>
    <input type="text" name="gd_room_name" class="form-control"  placeholder="Enter GD Room Name..."><br>
         <button type="submit" name="gd_submit" class="btn btn-success">GD ROOM Name !!!</button>
    

  </div>

       </form>';
   }
   ?>

<?php 
if (isset($_SESSION["gd_room_session"])) {
  echo '<form method="POST" enctype="multipart/form-data">
       <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12"><div class="form-group">
      <label >GD Topic:</label>
      <input type="text" name="gd_topic" class="form-control"  placeholder="topic for gd...">
    </div>

  </div>
    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                  <div class="form-group">
    <label >Date*:</label>
    <input type="date" min="';echo date("Y-m-d");
    echo '" max="2050-12-31" class="form-control" type="text" name="date"  placeholder="Choose Your DOB..." class="form-control">
  </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <div class="form-group text-left">
                    <label>Time*:</label>
                   <input type="text"  id="timepicker" name="time" placeholder="choose time..." />
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <div class="form-group text-left">
                    <label>Student-1* </label><br>
                     <select name="student1" class="custom-select my-1 mr-sm-2">
    <option>Choose Mentor</option>';
    $email =$_SESSION["mentor_email"];
     $Search="SELECT * from gd_request where mentor_email='$email' AND status=true";
      $Result=mysqli_query($conn,$Search);
      while($Row=mysqli_fetch_array($Result)){
        $student_email=$Row["student_email"];
        $search="SELECT email as student_email, registration_no, name FROM StudentData Where email='$student_email'";
        $result=mysqli_query($conn,$search);
        while($row=mysqli_fetch_array($result)){
          echo "<option value='".$row["student_email"]."'>".$row["name"]." [".$row["registration_no"]."]"."</option>";
        }
       
      }
        
        echo '
  </select>
                </div>

            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                 <div class="form-group text-left">
                    <label>Student-2* </label><br>
                     <select name="student2" class="custom-select my-1 mr-sm-2">
    <option value="">Choose Mentor</option>';
     $email =$_SESSION["mentor_email"];
     $Search="SELECT * from gd_request where mentor_email='$email' AND status=true";
      $Result=mysqli_query($conn,$Search);
      while($Row=mysqli_fetch_array($Result)){
        $student_email=$Row["student_email"];
        $search="SELECT email as student_email, registration_no, name FROM StudentData Where email='$student_email'";
        $result=mysqli_query($conn,$search);
        while($row=mysqli_fetch_array($result)){
          echo "<option value='".$row["student_email"]."'>".$row["name"]." [".$row["registration_no"]."]"."</option>";
        }
       
      }
        
        echo '
  </select>
                </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">

            <div class="form-group text-left">
                    <label>Student-3 </label><br>
                     <select name="student3" class="custom-select my-1 mr-sm-2">
    <option value="">Choose Mentor</option>';
     $email =$_SESSION["mentor_email"];
     $Search="SELECT * from gd_request where mentor_email='$email' AND status=true";
      $Result=mysqli_query($conn,$Search);
      while($Row=mysqli_fetch_array($Result)){
        $student_email=$Row["student_email"];
        $search="SELECT email as student_email, registration_no, name FROM StudentData Where email='$student_email'";
        $result=mysqli_query($conn,$search);
        while($row=mysqli_fetch_array($result)){
          echo "<option value='".$row["student_email"]."'>".$row["name"]." [".$row["registration_no"]."]"."</option>";
        }
       
      }
        
        echo '
  </select>
                </div>
        </div>
        </div>
        <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <div class="form-group text-left">
                    <label>Student-4 </label><br>
                    <select name="student4" class="custom-select my-1 mr-sm-2">
    <option value="">Choose Mentor</option>';
    $email =$_SESSION["mentor_email"];
     $Search="SELECT * from gd_request where mentor_email='$email' AND status=true";
      $Result=mysqli_query($conn,$Search);
      while($Row=mysqli_fetch_array($Result)){
        $student_email=$Row["student_email"];
        $search="SELECT email as student_email, registration_no, name FROM StudentData Where email='$student_email'";
        $result=mysqli_query($conn,$search);
        while($row=mysqli_fetch_array($result)){
          echo "<option value='".$row["student_email"]."'>".$row["name"]." [".$row["registration_no"]."]"."</option>";
        }
       
      }
        
        echo '
  </select>
                </div>

            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                 <div class="form-group text-left">
                    <label>Student-5 </label><br>
                     <select name="student5" class="custom-select my-1 mr-sm-2">
    <option value="">Choose Mentor</option>';
     $email =$_SESSION["mentor_email"];
     $Search="SELECT * from gd_request where mentor_email='$email' AND status=true";
      $Result=mysqli_query($conn,$Search);
      while($Row=mysqli_fetch_array($Result)){
        $student_email=$Row["student_email"];
        $search="SELECT email as student_email, registration_no, name FROM StudentData Where email='$student_email'";
        $result=mysqli_query($conn,$search);
        while($row=mysqli_fetch_array($result)){
          echo "<option value='".$row["student_email"]."'>".$row["name"]." [".$row["registration_no"]."]"."</option>";
        }
       
      }
        
        echo '
  </select>
                </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">

            <div class="form-group text-left">
                    <label>Zoom ID*:</label><br>
      <input type="text" name="zoom_id" class="form-control"  placeholder="topic for gd...">
                    
                </div>
        </div>
        </div>
        <div align="center">
        <button type="submit" name="gd_room_submit" class="btn btn-success">Create GD ROOM !!!</button></div>
</form>';
}


?>


 
    


</div>
</body>
</html>

<script>
 
  $('#timepicker').timepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>




