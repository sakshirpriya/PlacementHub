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
$email=$_SESSION["mentor_email"];

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

<div class="container">
<hr>
  <h3 align="center">Welcome to Your GD Feedback Pannel</a></h3>
<hr>
  <div class="row">
    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12"></div>
    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
      <form class="form-inline">
        <div class="form-group mx-sm-3 mb-2">
          <select name="gd_room_name" class="custom-select mb-3">
            <option value="">Choose GD Room</option>

            <?php 
            $Search="SELECT * FROM gd_room_creator WHERE email='$email' AND feedback=true";
            $result=mysqli_query($conn,$Search);
            while($row=mysqli_fetch_array($result)){
            echo  "<option value='".$row["gd_room_name"]."'>".$row["gd_room_name"]."</option>";
          }
          ?> 
        </select>
      </div>
      <button type="submit" name="search_filter" class="btn btn-primary mb-4">Search</button>
    </form>
  </div>
</div>

<!-- ********************************************** -->

<?php 
if(isset($_REQUEST["search_filter"])){
$gd_room_name=$_REQUEST["gd_room_name"];
// echo "<script type='text/javascript'>alert('$gd_room_name');</script>";
// echo "<script type='text/javascript'>alert('$email');</script>";

$Search="SELECT * FROM gd_feedback WHERE group_name='$gd_room_name' AND mentor_email='$email'";
echo "<form enctype='multipart/form-data'>
    <fieldset class='scheduler-border'>
      <legend class='scheduler-border'>";echo $gd_room_name; echo"</legend>";
$result=mysqli_query($conn,$Search);
while($row=mysqli_fetch_array($result)){
	$StudentEmail=$row["student_email"];
	$GetStudentdata="SELECT * FROM StudentData WHERE email='$StudentEmail'";
	$Result=mysqli_query($conn,$GetStudentdata);
 $Row=mysqli_fetch_array($Result);
    echo "<div class='row'>
      <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
        <div class='form-group'>
          <div class='input-group mb-2'>
            <div class='input-group-prepend'>
              <div class='input-group-text'>";
                 echo '  

            <img src="data:image/jpeg;base64,'.base64_encode($Row['profilepic'] ).'" class="rounded-circle" height="23px" width="23px" class="img-thumnail" />  

            ';    

                  
             echo "</div>
            </div>
            <input type='text' name='Student_1'  placeholder='";echo $Row["name"]; echo"' class='form-control' readonly>
          </div>
        </div>
      </div>
      <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
        <div class='form-group'>
          <div class='input-group mb-2'>
            <div class='input-group-prepend'>
              <div class='input-group-text'>RegisNo.</div>
            </div>
            <input type='text' name='RegisNo_1' placeholder='"; echo $Row["registration_no"];echo "' class='form-control' readonly>
          </div>
        </div>
      </div>
      <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
        <div class='form-group'>
          <div class='input-group mb-2'>
            <div class='input-group-prepend'>
              <div class='input-group-text'>Email</div>
            </div>
            <input type='text' name='Email_1'  placeholder='"; echo $Row["email"]; echo "'  class='form-control' readonly>
          </div>
        </div>
      </div> 
    </div>

    <div class='row'>
      <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
        <div class='form-group'>
          <div class='input-group mb-2'>
            <div class='input-group-prepend'>
              <div class='input-group-text'>language</div>
            </div>
            <input type='text' name='language_1'  placeholder='";echo $row["language"]; echo " / 20' class='form-control' readonly>
          </div>
        </div>
      </div>
      <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
        <div class='form-group'>
          <div class='input-group mb-2'>
            <div class='input-group-prepend'>
              <div class='input-group-text'>content</div>
            </div>
            <input type='text' name='content_1'  placeholder='";echo $row["content"]; echo " / 20' class='form-control' readonly>
          </div>
        </div>
      </div>
      <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
        <div class='form-group'>
          <div class='input-group mb-2'>
            <div class='input-group-prepend'>
              <div class='input-group-text'>confidence</div>
            </div>
            <input type='text' name='confidence_1'  placeholder='";echo $row["confidence"]; echo " / 20' class='form-control' readonly>
          </div>
        </div>
      </div>

    </div>

    <div class='row'>
      <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
        <div class='form-group'>
          <div class='input-group mb-2'>
            <div class='input-group-prepend'>
              <div class='input-group-text'>attitude</div>
            </div>
            <input type='text' name='attitude_1'  placeholder='";echo $row["attitude"]; echo " / 20' class='form-control' readonly>
          </div>
        </div>

      </div>
      <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
        <div class='form-group'>
          <div class='input-group mb-2'>
            <div class='input-group-prepend'>
              <div class='input-group-text'>interaction</div>
            </div>
            <input type='text' name='interaction_1' placeholder='";echo $row["interaction"]; echo " / 20' class='form-control' readonly>
          </div>
        </div>

      </div>
      <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
        <div class='form-group'>
          <div class='input-group mb-2'>
            <div class='input-group-prepend'>
              <div class='input-group-text'>total</div>
            </div>
            <input type='text' name='Student_1_Remark' placeholder='";echo $row["total"]; echo " / 100' class='form-control' readonly>
          </div>
        </div>
      </div>
    </div>
    <div class='row'>
      <div class='col-xl-12 col-lg-12 col-md-12 col-sm-12'>
        <div class='form-group'>
          <div class='input-group mb-2'>
            <div class='input-group-prepend'>
              <div class='input-group-text'>Your Remark</div>
            </div>
            <input type='text' name='Student_1_Remark'  placeholder='";echo $row["remark"]; echo "' class='form-control' readonly>
          </div>
        </div>
      </div>
    </div>
    <hr>";
  }
echo " </fieldset></form>";
}
?>
<!-- *********************************************** -->


 
</div>
</body>
</html>






