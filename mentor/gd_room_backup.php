<?php
include '../DataBase/DB_Connection.php';
session_start();
$conn=OpenCon();
if(!isset($_SESSION["email"])){
    echo "<script>
    window.location.href='../index.php';
    alert('unauthrise access');
    </script>";
}

if(isset($_REQUEST["gd_submit"])){
  $email =$_SESSION["email"];
  $check=$_REQUEST["gd_room_name"];
 //check if test gd room already exists...
$search="SELECT * FROM gd_room_creator where group_name='$check' AND email='$email'";
$result=mysqli_query($conn, $search);
$rows = mysqli_num_rows($result);
 if($rows){
  $message="Sorry! You can not create this GD Room. Same email and GD Room name combintion already found!!!";
 echo "<script type='text/javascript'>alert('$message');</script>";
}else{
  $_SESSION["gd_room_session"]=$_REQUEST["gd_room_name"];;
}
}

//unset gd room session
if(isset($_REQUEST["reset_gd_room_name"])){
unset($_SESSION["gd_room_session"]);
}

if(isset($_REQUEST["gd_submit"])){
  $gd_topic=$_REQUEST["gd_topic"];
 echo "<script type='text/javascript'>alert('$gd_topic');</script>";
  $date=$_REQUEST["date"];
 echo "<script type='text/javascript'>alert('$date');</script>";

  $time=$_REQUEST["time"];
 echo "<script type='text/javascript'>alert('$time');</script>";

  $student1=$_REQUEST["student1"];
 echo "<script type='text/javascript'>alert('$student1');</script>";

  $student2=$_REQUEST["student2"];
 echo "<script type='text/javascript'>alert('$student2');</script>";

  $student3=$_REQUEST["student3"];
 echo "<script type='text/javascript'>alert('$student3');</script>";

  $student4=$_REQUEST["student4"];
 echo "<script type='text/javascript'>alert('$student4');</script>";

  $student5=$_REQUEST["student5"];
 echo "<script type='text/javascript'>alert('$student5');</script>";

  $zoom_id=$_REQUEST["zoom_id"];
 echo "<script type='text/javascript'>alert('$zoom_id');</script>";

}





?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php include '../utility/js/placementhub_4.3.1.php'; ?>
    <?php include '../utility/css/placementhub_4.3.1.php'; ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="typeahead.min.js"></script>


     <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
/**/
.typeahead, .tt-query, .tt-hint {
    border: 1px solid #CCCCCC;
    font-size: 14px;
    height: 38px;
    outline: medium none;
    padding: 8px 12px;
    width: 350px;
}
.typeahead {
    background-color: #FFFFFF;
}
.typeahead:focus {
    border: 2px solid #0097CF;
}
.tt-query {
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
    color: #999999;
}
.tt-dropdown-menu {
    background-color: #FFFFFF;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 8px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    margin-top: 12px;
    padding: 8px 0;
   width: 350px;
}
.tt-suggestion {
    font-size: 14px;
    line-height: 24px;
    padding: 3px 20px;
}
.tt-suggestion.tt-is-under-cursor {
    background-color: #0097CF;
    color: #FFFFFF;
}
.tt-suggestion p {
    margin: 0;
}

</style>
</head>
<body>
    <?php include 'component/NavBar.php'; ?>
    
 <div class="container">

<h3 align="center">Welcome to Create GD Room Pannel.</a></h3><br />
  
       <?php 
   if(isset($_SESSION["gd_room_session"])){
        echo "<h1 class='text-center'>GD Room : ".$_SESSION["gd_room_session"]."</h1>";
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




 
    <form method="POST" enctype="multipart/form-data">
       <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12"><div class="form-group">
      <label >GD Topic:</label>
      <input type="text" name="gd_topic" class="form-control"  placeholder="topic for gd...">
    </div>

  </div>
    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                  <div class="form-group">
    <label >Date*:</label>
    <input type="date" min="<?php  echo date("Y-m-d")?>" max="2050-12-31" class="form-control" type="text" name="date"  placeholder="Choose Your DOB..." class="form-control">
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
                    <input type="text" name="student1" class="typeahead form-control" placeholder="search email to add...">
                </div>

            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                 <div class="form-group text-left">
                    <label>Student-2* </label><br>
                    <input type="text" name="student2" class="typeahead form-control" placeholder="search email to add...">
                </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">

            <div class="form-group text-left">
                    <label>Student-3 </label><br>
                    <input type="text" name="student3" class="typeahead form-control" placeholder="search email to add...">
                </div>
        </div>
        </div>
        <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <div class="form-group text-left">
                    <label>Student-4 </label><br>
                    <input type="text" name="student4" class="typeahead form-control" placeholder="search email to add...">
                </div>

            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                 <div class="form-group text-left">
                    <label>Student-5 </label><br>
                    <input type="text" name="student5" class="typeahead form-control" autocomplete="off" spellcheck="false" placeholder="search email to add...">
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
        <button type="submit" name="gd_submit" class="btn btn-success">Create GD ROOM !!!</button></div>
</form>


</div>
</body>
</html>

<script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'search.php?key=%QUERY',
        limit : 10
    });
});

  $('#timepicker').timepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>




