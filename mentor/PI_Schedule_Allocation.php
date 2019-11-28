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
// Make sure an ID was passed
if(isset($_GET['id'])) {
// Get the ID
    $id = intval($_GET['id']);
 
    // Make sure the ID is in fact a valid ID
    if($id <= 0) {
        $message="The ID is invalid!";
   echo "<script type='text/javascript'>alert('$message');</script>";
        
    }
    else {
    
 
        // Fetch the file information
        $query = "
            SELECT *
            FROM `PersonalInterview`
            WHERE `id` = {$id}";
        $result = $conn->query($query);
 
        if($result) {
            // Make sure the result is valid
            if($result->num_rows == 1) {
            // Get the row
                $row = mysqli_fetch_assoc($result);
 
                // Print headers
               
            $studentName=$_SESSION["studentName"];
            $registration_no=$_SESSION["registration_no"];
            $student_email=$row['student_email'];
            $requestmessage=$row['requestmessage'];
          
            
                
            }
            else {
                  $message="Error! No Request exists with that ID.";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                
            }
 
            // Free the mysqli resources
            @mysqli_free_result($result);
        }
        else {
            echo "Error! Query failed: <pre>{$conn->error}</pre>";
        }
       
    }
}
else {
     $message="Error! No ID was passed.";
                    echo "<script type='text/javascript'>
 window.location.href='index.php';
                    alert('$message');</script>";
                       
}
//time conversion
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
if(isset($_REQUEST["submit"])){
echo "<script>alert('$id')</script>";
    $Date=$_REQUEST["date"];
    echo "<script>alert('$Date')</script>";
    $Time=convertTime($_REQUEST["time"]);
    echo "<script>alert('$Time')</script>";

    $mentormessage=$_REQUEST["mentormessage"];
    echo "<script>alert('$mentormessage')</script>";
    if($Date ==NULL || $Time ==NULL){
        $message="Date and Time can't empty!!!";
    echo "<script>alert('$message')</script>";
    }else{
        if($skype ==NULL && $zoom==NULL){
    $message="SkypeId or ZoomId can't empty!!!";
    echo "<script>alert('$message')</script>";
        }else{
            $skypeId="live."+$skypeId;
            $ZoomId="https://zoom.us/j/"+$ZoomId;
            $Insert="UPDATE PersonalInterview SET date='$Date',time='$Time',mentormessage='$mentormessage',schedule=1,skypeId='$skypeId
            ',ZoomId='$ZoomId' WHERE id=$id";
        if(mysqli_query($conn,$Insert)){
           $message="Successfully added PI!!!";
    echo "<script>alert('$message')</script>";  
        }else{
            $message="Something Went Wrong!!!";
    echo "<script>alert('$message')</script>"; 
        }

        }
    }

}
?>


<!DOCTYPE html>
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
    <style>
    body{
        background-color: black;
        color: white;
    }
    fieldset.scheduler-border {
    border: 1px solid #e3dcdc;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

    legend.scheduler-border {
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;
        width:auto;
        padding:0 10px;
        border-bottom:none;
    }
    hr {
        height: 1px;
        color: white;
        background-color: white;
        border: none;
    }
</style>
</head>
<body>
    <?php include 'component/NavBar.php'; ?>
     
    <div class="container"><br>
        <h1 align="center">Please Allocate Time and Date to Student</h1>
        <h4 class="text-center">Please Contact With Admin, If Any Issue</h4><br>
          <form method="post" enctype="multipart/form-data">
                    <fieldset class="scheduler-border">
                <legend class="scheduler-border">Allocate Slot</legend>
                <form>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                            <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" placeholder="<?php echo $studentName;?>" readonly>
        
      </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                            <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control"  placeholder="<?php echo $student_email;?>" readonly>
        
      </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                            <div class="form-group">
        <label>Regist. No</label>
        <input type="text" class="form-control" placeholder="<?php echo $registration_no;?>" readonly>
      </div>
                        </div>
                    </div>
    <!--********************************************************************-->
     <div class="row">

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
        <label>Student Request Message [if any] </label>
         <div class="input-group-prepend"><label class="sr-only" for="inlineFormInputGroup">Username</label>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text"><?php echo $id;?></div>
            </div>
            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="<?php echo $requestmessage;?>" readonly>
          </div>
      </div>
                        </div>
                    </div>
                </div>
                  <hr>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                         <div class="form-group">
        <label>Select Date*</label>
        <input type="date" class="form-control" min="<?php  echo date("Y-m-d")?>" name="date" placeholder="Choose Date">
                    </div>
                </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                    <label>Select Time*:</label>
                   <input type="time"  id="timepicker" name="time" placeholder="choose time..." />
                </div>
                
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                     <div class="form-group">
       <label>SkypeId</label>
         <div class="input-group-prepend"><label class="sr-only" for="inlineFormInputGroup">Username</label>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text">live.</div>
            </div>
             <input type="text" class="form-control" name="SkypeId" placeholder="sakhi.priya">
          </div>
      </div>
                        </div>
                </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                   
                      <div class="form-group">
         <label>ZoomId:</label>
         <div class="input-group-prepend"><label class="sr-only" for="inlineFormInputGroup">Username</label>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text">https://zoom.us/j/</div>
            </div>
             <input type="text" class="form-control" name="ZoomId" placeholder="Y5394674117" />
          </div>
      </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                         <div class="form-group">
        <label>Your Remark</label>
        <textarea class="form-control" name="mentormessage" rows="3"></textarea>
      </div></div>
                    </div>
              
    <div class="text-center"><button type="submit" name="submit" class="btn btn-warning">Submit</button></div>
                </form>
                
            </fieldset>
            </form>
    </div>
   
</body>
<script>
   
  $('#timepicker').timepicker({
            uiLibrary: 'bootstrap4'
        }); 
</script>
</html>