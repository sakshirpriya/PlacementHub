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
// feedback inseration
function insertFeedback($student_email,$group_name,$email,$language,$content,$confidence,$attitude,$interaction,$total,$remark){
  $conn=OpenCon();
  $insert="INSERT INTO gd_feedback (student_email,group_name,mentor_email,language,content,confidence,attitude,interaction,total,remark) VALUES ('$student_email','$group_name','$email',$language,$content,$confidence,$attitude,$interaction,$total,'$remark')";
  if(mysqli_query($conn,$insert)){
    return true;
  }else{
     $UpdateQuery="UPDATE gd_feedback SET student_email='$student_email',group_name='$group_name',mentor_email='$email',language=$language,content=$content,confidence=$confidence,attitude=$attitude,interaction=$interaction,total=$total,remark='$remark' WHERE student_email='$student_email' AND group_name='$group_name'";
     if(mysqli_query($conn,$UpdateQuery)){
    return true;
  }else{
    return false;
  }
  }
}
$flag;
if (isset($_REQUEST["submit"])) {
$gd_room_name=$_SESSION["GDROOM"];
//Student-1
if($_REQUEST["Email_1"]){
$Email=$_REQUEST["Email_1"];
$language=intval($_REQUEST["language_1"]);
$content=intval($_REQUEST["content_1"]);
$confidence=intval($_REQUEST["confidence_1"]);
$attitude=intval($_REQUEST["attitude_1"]);
$interaction=intval($_REQUEST["interaction_1"]);
$StudentRemark=$_REQUEST["Student_1_Remark"];
$total=$language+$content+$confidence+$attitude+$interaction;
$flag=insertFeedback($Email,$gd_room_name,$email,$language,$content,$confidence,$attitude,$interaction,$total,$StudentRemark);
//echo "<script type='text/javascript'>alert('$flag');</script>";

}
//Student-2
if($_REQUEST["Email_2"]){
$Email=$_REQUEST["Email_2"];
$language=intval($_REQUEST["language_2"]);
$content=intval($_REQUEST["content_2"]);
$confidence=intval($_REQUEST["confidence_2"]);
$attitude=intval($_REQUEST["attitude_2"]);
$interaction=intval($_REQUEST["interaction_2"]);
$StudentRemark=$_REQUEST["Student_2_Remark"];
$total=$language+$content+$confidence+$attitude+$interaction;
$flag=insertFeedback($Email,$gd_room_name,$email,$language,$content,$confidence,$attitude,$interaction,$total,$StudentRemark);
//echo "<script type='text/javascript'>alert('$flag');</script>";

}
//Student-3
if($_REQUEST["Email_3"]){
$Email=$_REQUEST["Email_3"];
$language=intval($_REQUEST["language_3"]);
$content=intval($_REQUEST["content_3"]);
$confidence=intval($_REQUEST["confidence_3"]);
$attitude=intval($_REQUEST["attitude_3"]);
$interaction=intval($_REQUEST["interaction_3"]);
$StudentRemark=$_REQUEST["Student_3_Remark"];
$total=$language+$content+$confidence+$attitude+$interaction;
insertFeedback($Email,$gd_room_name,$email,$language,$content,$confidence,$attitude,$interaction,$total,$StudentRemark);
}
//Student-4
if($_REQUEST["Email_4"]){
$Email=$_REQUEST["Email_4"];
$language=intval($_REQUEST["language_4"]);
$content=intval($_REQUEST["content_4"]);
$confidence=intval($_REQUEST["confidence_4"]);
$attitude=intval($_REQUEST["attitude_4"]);
$interaction=intval($_REQUEST["interaction_4"]);
$StudentRemark=$_REQUEST["Student_4_Remark"];
$total=$language+$content+$confidence+$attitude+$interaction;
insertFeedback($Email,$gd_room_name,$email,$language,$content,$confidence,$attitude,$interaction,$total,$StudentRemark);
}
//Student-5
if($_REQUEST["Email_5"]){
$Email=$_REQUEST["Email_5"];
$language=intval($_REQUEST["language_5"]);
$content=intval($_REQUEST["content_5"]);
$confidence=intval($_REQUEST["confidence_5"]);
$attitude=intval($_REQUEST["attitude_5"]);
$interaction=intval($_REQUEST["interaction_5"]);
$StudentRemark=$_REQUEST["Student_5_Remark"];
$total=$language+$content+$confidence+$attitude+$interaction;
insertFeedback($Email,$gd_room_name,$email,$language,$content,$confidence,$attitude,$interaction,$total,$StudentRemark);
}
if($flag){
  $UpdateQuery="UPDATE gd_room_creator SET feedback=true WHERE email='$email' AND gd_room_name='$gd_room_name'";
  if(mysqli_query($conn,$UpdateQuery)){
    echo "<script>
  window.location.href='http://13.126.165.2/mentor/gd_feedback.php';
  alert('Update!');
</script>";
  }else{
   echo "<script>
  window.location.href='http://13.126.165.2/mentor/gd_feedback.php';
  alert('Not Update!');
</script>";
  }
  
}else{
  echo "<script>
  window.location.href='http://13.126.165.2/mentor/gd_feedback.php';
  alert('Something Went Wrong!!!');
</script>";
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
    <h3 align="center">Welcome to  GD Feedback Pannel.</a></h3>
<hr>
    <div class="row">
      <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12"></div>
      <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
        <form class="form-inline">
          <div class="form-group mx-sm-3 mb-2">
            <select name="gd_room_name" class="custom-select mb-3">
              <option value="">Choose GD Room</option>

              <?php 
              $Search="SELECT * FROM gd_room_creator WHERE email='$email' AND feedback=false";
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
  $_SESSION["GDROOM"]=$_REQUEST["gd_room_name"];
  $Search="SELECT * FROM gd_room_creator WHERE gd_room_name='$gd_room_name' AND feedback=false";
  $result=mysqli_query($conn,$Search);
  while($row=mysqli_fetch_array($result)){


  // echo "<script type='text/javascript'>alert('$message');</script>";
  echo "<form enctype='multipart/form-data'>
    <fieldset class='scheduler-border'>
      <legend class='scheduler-border'>";echo $row["gd_room_name"]; echo "</legend>";
      if($row["student_1"]!=NULL){
      $student_email=$row["student_1"];
      $data="SELECT * FROM StudentData WHERE email='$student_email'";
      $Result=mysqli_query($conn,$data);
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
              <input type='text' name='Student_1'  placeholder='"; echo $Row["name"];

              echo"' value='"; echo $Row["name"]; echo "'class='form-control'>
            </div>
          </div>
        </div>
        <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
          <div class='form-group'>
            <div class='input-group mb-2'>
              <div class='input-group-prepend'>
                <div class='input-group-text'>RegisNo.</div>
              </div>
              <input type='text' name='RegisNo_1' placeholder='"; echo $Row["registration_no"];

              echo"' value='"; echo $Row["registration_no"]; echo "'class='form-control'>
            </div>
          </div>
        </div>
        <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
          <div class='form-group'>
            <div class='input-group mb-2'>
              <div class='input-group-prepend'>
                <div class='input-group-text'>Email</div>
              </div>
              <input type='text' name='Email_1'   placeholder='"; echo $Row["email"];

              echo"' value='"; echo $Row["email"]; echo "'class='form-control'>
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
              <input type='text' name='language_1'  placeholder='[ XX / 20 ]' class='form-control'>
            </div>
          </div>
        </div>
        <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
          <div class='form-group'>
            <div class='input-group mb-2'>
              <div class='input-group-prepend'>
                <div class='input-group-text'>content</div>
              </div>
              <input type='text' name='content_1'  placeholder='[ XX / 20 ]' class='form-control'>
            </div>
          </div>
        </div>
        <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
          <div class='form-group'>
            <div class='input-group mb-2'>
              <div class='input-group-prepend'>
                <div class='input-group-text'>confidence</div>
              </div>
              <input type='text' name='confidence_1'  placeholder='[ XX / 20 ]' class='form-control'>
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
              <input type='text' name='attitude_1'  placeholder='[ XX / 20 ]' class='form-control'>
            </div>
          </div>

        </div>
        <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
          <div class='form-group'>
            <div class='input-group mb-2'>
              <div class='input-group-prepend'>
                <div class='input-group-text'>interaction</div>
              </div>
              <input type='text' name='interaction_1'  placeholder='[ XX / 20 ]' class='form-control'>
            </div>
          </div>

        </div>
        <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
          <div class='form-group'>
            <div class='input-group mb-2'>
              <div class='input-group-prepend'>
                <div class='input-group-text'>Remark</div>
              </div>
              <input type='text' name='Student_1_Remark'  placeholder='Your Remark...' class='form-control'>
            </div>
          </div>
        </div>
      </div>
      <hr>";
    }
    if($row["student_2"]!=NULL){
    $student_email=$row["student_2"];
    $data="SELECT * FROM StudentData WHERE email='$student_email'";
    $Result=mysqli_query($conn,$data);
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
            <input type='text' name='Student_2'  placeholder='"; echo $Row["name"];

            echo"' value='"; echo $Row["name"]; echo "'class='form-control'>
          </div>
        </div>
      </div>
      <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
       <div class='form-group'>
        <div class='input-group mb-2'>
          <div class='input-group-prepend'>
            <div class='input-group-text'>RegisNo.</div>
          </div>
          <input type='text' name='RegisNo_2' placeholder='"; echo $Row["registration_no"];

          echo"' value='"; echo $Row["registration_no"]; echo "'class='form-control'>
        </div>
      </div>
    </div>
    <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
      <div class='form-group'>
        <div class='input-group mb-2'>
          <div class='input-group-prepend'>
            <div class='input-group-text'>Email</div>
          </div>
          <input type='text' name='Email_2'   placeholder='"; echo $Row["email"];

          echo"' value='"; echo $Row["email"]; echo "'class='form-control'>
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
          <input type='text' name='language_2'  placeholder='[ XX / 20 ]' class='form-control'>
        </div>
      </div>
    </div>
    <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
      <div class='form-group'>
        <div class='input-group mb-2'>
          <div class='input-group-prepend'>
            <div class='input-group-text'>content</div>
          </div>
          <input type='text' name='content_2'  placeholder='[ XX / 20 ]' class='form-control'>
        </div>
      </div>
    </div>
    <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
      <div class='form-group'>
        <div class='input-group mb-2'>
          <div class='input-group-prepend'>
            <div class='input-group-text'>confidence</div>
          </div>
          <input type='text' name='confidence_2'  placeholder='[ XX / 20 ]' class='form-control'>
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
          <input type='text' name='attitude_2'  placeholder='[ XX / 20 ]' class='form-control'>
        </div>
      </div>

    </div>
    <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
      <div class='form-group'>
        <div class='input-group mb-2'>
          <div class='input-group-prepend'>
            <div class='input-group-text'>interaction</div>
          </div>
          <input type='text' name='interaction_2'  placeholder='[ XX / 20 ]' class='form-control'>
        </div>
      </div>

    </div>
    <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
      <div class='form-group'>
        <div class='input-group mb-2'>
          <div class='input-group-prepend'>
            <div class='input-group-text'>Remark</div>
          </div>
          <input type='text' name='Student_2_Remark'  placeholder='Your Remark...' class='form-control'>
        </div>
      </div>
    </div>
  </div>
  <hr>";
}
if($row["student_3"]!=NULL){
$student_email=$row["student_3"];
$data="SELECT * FROM StudentData WHERE email='$student_email'";
$Result=mysqli_query($conn,$data);
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
        <input type='text' name='Student_3'  placeholder='"; echo $Row["name"];

        echo"' value='"; echo $Row["name"]; echo "'class='form-control'>
      </div>
    </div>
  </div>
  <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'><div class='form-group'>
    <div class='input-group mb-2'>
      <div class='input-group-prepend'>
        <div class='input-group-text'>RegisNo.</div>
      </div>
      <input type='text' name='RegisNo_3' placeholder='"; echo $Row["registration_no"];

      echo"' value='"; echo $Row["registration_no"]; echo "'class='form-control'>
    </div>
  </div>
</div>
<div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
  <div class='form-group'>
    <div class='input-group mb-2'>
      <div class='input-group-prepend'>
        <div class='input-group-text'>Email</div>
      </div>
      <input type='text' name='Email_3'   placeholder='"; echo $Row["email"];

      echo"' value='"; echo $Row["email"]; echo "'class='form-control'>
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
        <input type='text' name='language_3'  placeholder='[ XX / 20 ]' class='form-control'>
      </div>
    </div>
  </div>
  <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
    <div class='form-group'>
      <div class='input-group mb-2'>
        <div class='input-group-prepend'>
          <div class='input-group-text'>content</div>
        </div>
        <input type='text' name='content_3'  placeholder='[ XX / 20 ]' class='form-control'>
      </div>
    </div>
  </div>
  <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
    <div class='form-group'>
      <div class='input-group mb-2'>
        <div class='input-group-prepend'>
          <div class='input-group-text'>confidence</div>
        </div>
        <input type='text' name='confidence_3'  placeholder='[ XX / 20 ]' class='form-control'>
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
        <input type='text' name='attitude_3'  placeholder='[ XX / 20 ]' class='form-control'>
      </div>
    </div>

  </div>
  <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
    <div class='form-group'>
      <div class='input-group mb-2'>
        <div class='input-group-prepend'>
          <div class='input-group-text'>interaction</div>
        </div>
        <input type='text' name='interaction_3'  placeholder='[ XX / 20 ]' class='form-control'>
      </div>
    </div>

  </div>
  <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
    <div class='form-group'>
      <div class='input-group mb-2'>
        <div class='input-group-prepend'>
          <div class='input-group-text'>Remark</div>
        </div>
        <input type='text' name='Student_3_Remark'  placeholder='Your Remark...' class='form-control'>
      </div>
    </div>
  </div>
</div>
<hr>";
}
if($row["student_4"]!=NULL){
$student_email=$row["student_4"];
$data="SELECT * FROM StudentData WHERE email='$student_email'";
$Result=mysqli_query($conn,$data);
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
        <input type='text' name='Student_4'  placeholder='"; echo $Row["name"];

        echo"' value='"; echo $Row["name"]; echo "'class='form-control'>
      </div>
    </div>
  </div>
  <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
    <div class='form-group'>
      <div class='input-group mb-2'>
        <div class='input-group-prepend'>
          <div class='input-group-text'>RegisNo.</div>
        </div>
        <input type='text' name='RegisNo_4' placeholder='"; echo $Row["registration_no"];

        echo"' value='"; echo $Row["registration_no"]; echo "'class='form-control'>
      </div>
    </div>
  </div>
  <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
    <div class='form-group'>
      <div class='input-group mb-2'>
        <div class='input-group-prepend'>
          <div class='input-group-text'>Email</div>
        </div>
        <input type='text' name='Email_4'   placeholder='"; echo $Row["email"];

        echo"' value='"; echo $Row["email"]; echo "'class='form-control'>
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
        <input type='text' name='language_4'  placeholder='[ XX / 20 ]' class='form-control'>
      </div>
    </div>
  </div>
  <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
    <div class='form-group'>
      <div class='input-group mb-2'>
        <div class='input-group-prepend'>
          <div class='input-group-text'>content</div>
        </div>
        <input type='text' name='content_4'  placeholder='[ XX / 20 ]' class='form-control'>
      </div>
    </div>
  </div>
  <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
    <div class='form-group'>
      <div class='input-group mb-2'>
        <div class='input-group-prepend'>
          <div class='input-group-text'>confidence</div>
        </div>
        <input type='text' name='confidence_4'  placeholder='[ XX / 20 ]' class='form-control'>
      </div>
    </div>
  </div>
  
</div>

<div class='row'>
  <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'><
    <div class='form-group'>
      <div class='input-group mb-2'>
        <div class='input-group-prepend'>
          <div class='input-group-text'>attitude</div>
        </div>
        <input type='text' name='attitude_4'  placeholder='[ XX / 20 ]' class='form-control'>
      </div>
    </div>

  </div>
  <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
    <div class='form-group'>
      <div class='input-group mb-2'>
        <div class='input-group-prepend'>
          <div class='input-group-text'>interaction</div>
        </div>
        <input type='text' name='interaction_4'  placeholder='[ XX / 20 ]' class='form-control'>
      </div>
    </div>

  </div>
  <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
    <div class='form-group'>
      <div class='input-group mb-2'>
        <div class='input-group-prepend'>
          <div class='input-group-text'>Remark</div>
        </div>
        <input type='text' name='Student_4_Remark'  placeholder='Your Remark...' class='form-control'>
      </div>
    </div>
  </div>
</div>
<hr>";
}
if($row["student_5"]!=NULL){
$student_email=$row["student_5"];
$data="SELECT * FROM StudentData WHERE email='$student_email'";
$Result=mysqli_query($conn,$data);
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
        <input type='text' name='Student_5'  placeholder='"; echo $Row["name"];

        echo"' value='"; echo $Row["name"]; echo "'class='form-control'>
      </div>
    </div>
  </div>
  <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
    <div class='form-group'>
      <div class='input-group mb-2'>
        <div class='input-group-prepend'>
          <div class='input-group-text'>RegisNo.</div>
        </div>
        <input type='text' name='RegisNo_5' placeholder='"; echo $Row["registration_no"];

        echo"' value='"; echo $Row["registration_no"]; echo "'class='form-control'>
      </div>
    </div>
  </div>
  <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
    <div class='form-group'>
      <div class='input-group mb-2'>
        <div class='input-group-prepend'>
          <div class='input-group-text'>Email</div>
        </div>
        <input type='text' name='Email_5'   placeholder='"; echo $Row["email"];

        echo"' value='"; echo $Row["email"]; echo "'class='form-control'>
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
        <input type='text' name='language_5'  placeholder='[ XX / 20 ]' class='form-control'>
      </div>
    </div>
  </div>
  <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
    <div class='form-group'>
      <div class='input-group mb-2'>
        <div class='input-group-prepend'>
          <div class='input-group-text'>content</div>
        </div>
        <input type='text' name='content_5'  placeholder='[ XX / 20 ]' class='form-control'>
      </div>
    </div>
  </div>
  <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
    <div class='form-group'>
      <div class='input-group mb-2'>
        <div class='input-group-prepend'>
          <div class='input-group-text'>confidence</div>
        </div>
        <input type='text' name='confidence_5'  placeholder='[ XX / 20 ]' class='form-control'>
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
        <input type='text' name='attitude_5'  placeholder='[ XX / 20 ]' class='form-control'>
      </div>
    </div>

  </div>
  <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
    <div class='form-group'>
      <div class='input-group mb-2'>
        <div class='input-group-prepend'>
          <div class='input-group-text'>interaction</div>
        </div>
        <input type='text' name='interaction_5'  placeholder='[ XX / 20 ]' class='form-control'>
      </div>
    </div>

  </div>
  <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
    <div class='form-group'>
      <div class='input-group mb-2'>
        <div class='input-group-prepend'>
          <div class='input-group-text'>Remark</div>
        </div>
        <input type='text' name='Student_5_Remark'  placeholder='Your Remark...' class='form-control'>
      </div>
    </div>
  </div>
</div>
<hr>";
}
echo "     


<div class='text-center'>
  <button type='submit' name='submit' class='btn btn-lg btn-success'>Update Data!!!</button>
</div>
</fieldset>
</form>";
}
}
?>


<!-- *********************************************** -->


</div>
</body>
</html>






