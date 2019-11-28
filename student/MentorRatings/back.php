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
if(isset($_REQUEST["submit"])){
    $Knowledge=round($_REQUEST["Knowledge"], 1);
    $Skill=round($_REQUEST["Skill"], 1);
    $Behaviour=round($_REQUEST["Behaviour"], 1);
    $Availability=round($_REQUEST["Availability"], 1);
    $Interactions=round($_REQUEST["Interactions"], 1);
    $Feedback=$_REQUEST["Feedback"];
    $checkForPublish=$_REQUEST["check"];
    $checkIfZero=round(floatval(0), 1);
    if($Skill===$checkIfZero || $Knowledge === $checkIfZero || $Behaviour === $checkIfZero || $Availability===$checkIfZero || $Interactions===$checkIfZero){
        $Message="You cant leave blank in ratings.";
    echo "<script type='text/javascript'>alert('$Message');</script>";
    }else{
        $mentor_email="text@gmail.com";
        $student_email=$_SESSION["student_email"];
        $showCommentToPublicDomain=($checkForPublish==="on")?1:0;
    $Search="SELECT COUNT(*) as total from MentorRatings WHERE student_email='$student_email' AND mentor_email='$mentor_email'";
    $result=mysqli_query($conn,$Search);
    $ratingExists=mysqli_fetch_assoc($result);
    $ratingExists=$ratingExists['total'];
    // echo "<script type='text/javascript'>alert('$ratingExists');</script>";
    if($ratingExists){
        // $Message="Thiis is update";
    // echo "<script type='text/javascript'>alert('$Message');</script>";

        $UpdateRatings="UPDATE MentorRatings SET Knowledge=$Knowledge,
            Skill=$Skill,
            Availability=$Availability,
            Interactions=$Interactions,
            Behaviour=$Behaviour,
            Feedback='$Feedback',
            checkForPublish=$showCommentToPublicDomain WHERE student_email='$student_email' AND mentor_email='$mentor_email'
            ";
            if(mysqli_query($conn,$UpdateRatings)){
               $Message="Your ratings are updated!!!.";
    echo "<script type='text/javascript'>alert('$Message');</script>"; 
    echo "<script>
    window.location.href='http://13.126.165.2/student/index.php';
    </script>";
            }else{
                $Message="Something went wrong!!!";
    echo "<script type='text/javascript'>alert('$Message');</script>";
            }
  }else{
      $Message="Thiis is Insert";
    echo "<script type='text/javascript'>alert('$Message');</script>";

 $InsertRatings="INSERT INTO MentorRatings (mentor_email,student_email,Knowledge,Skill,Availability,
 Interactions,Behaviour,Feedback,checkForPublish) VALUES ('$mentor_email','$student_email',$Knowledge,$Skill,
$Availability,$Interactions,$Behaviour,'$Feedback',$showCommentToPublicDomain)";
    // $InsertRatings="INSERT INTO `MentorRatings` (`mentor_email`, `student_email`, `Knowledge`, `Skill`, `Behaviour`, `Availability`, `Interactions`, `Feedback`, `checkForPublish`) VALUES ('az@gmail.com', 'a@gmail.com', 8.5, 7.5, 6.5, 4.5, 10, 'ok', '1')";
            if(mysqli_query($conn,$InsertRatings)){
               $Message="Your ratings are updated!!!.";
    echo "<script type='text/javascript'>alert('$Message');</script>";
    echo "<script>
    window.location.href='http://13.126.165.2/student/index.php';
    </script>"; 
            }else{
                $Message="Something went wrong";
    echo "<script type='text/javascript'>alert('$Message');</script>";
            }
  }
    
    }
   
    

}


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="icon" href="../../image/title_logo.png" type="image/x-icon">
<?php include '../../utility/js/placementhub_4.3.1.php'; ?>
    <?php include '../../utility/css/placementhub_4.3.1.php'; ?>
    
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<link rel="stylesheet" type="text/css" href="RatingStyle.css">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="RatingStyle.js"></script>

<!------ Include the above in your HEAD tag ---------->

<style>
    body{
        background-color: black;
        }
        .labelCss{
        color: white;
        font-weight: bold;
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
   
 
</style>
</head>
<body>
    <!-- start -->
   

 <div class="container-fluid" style="background-color: #f0ebeb; height: 75px;">
   <a class="navbar-brand"  href="../index.php" style="margin-left: 200px; margin-top: -10px;">
    <img src="http://13.126.165.2/image/logo.png" width="120px" height="60px" alt="PlacementHub">
  </a>
</div>


    
 
    <!-- ends -->
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
            <div class="text-center" style="grey;">
                <img src="1.jpg" width="160" height="160" style="border-radius: 50%;">
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12"></div>
    </div>
    <div class="text-center">
        <h2>Bootstrap star rating example by Sakshi Priya</h2>
    <br/>
	<form> 
            <fieldset class="scheduler-border">
    <legend class="scheduler-border">Give a rating for Skill:</legend>      
   <!-- <label for="input-1" class="control-label labelCss"></label> -->
    <input id="input-1" name="Skill" class="rating rating-loading" data-min="0" data-max="10" data-step="0.5" value="0">
</fieldset>
     <fieldset class="scheduler-border">
    <legend class="scheduler-border">Give a rating for Knowledge:</legend>  
    <!-- <label for="input-2" class="control-label labelCss"></label> -->
    <input id="input-2" name="Knowledge" class="rating rating-loading" data-min="0" data-max="10" data-step="0.5" value="0">
</fieldset>
    <fieldset class="scheduler-border">
    <legend class="scheduler-border">Give a rating for Availability:</legend>  
    <!-- <label for="input-3" class="control-label labelCss"></label> -->
    <input id="input-3" name="Availability" class="rating rating-loading" data-min="0" data-max="10" data-step="0.5" value="0">
   </fieldset>
   <fieldset class="scheduler-border">
    <legend class="scheduler-border">Give a rating for Behaviour:</legend> 
   <!--  <label for="input-4" class="control-label labelCss">Give a rating for PHP:</label> -->
    <input id="input-4" name="Behaviour" class="rating rating-loading" data-min="0" data-max="10" data-step="0.5" value="0">
    </fieldset>
    <fieldset class="scheduler-border">
    <legend class="scheduler-border">Give a rating for Interactions:</legend>
    <!-- <label for="input-5" class="control-label labelCss"></label> -->
    <input id="input-5" name="Interactions" class="rating rating-loading" data-min="0" data-max="10" data-step="0.5" value="0">
    </fieldset>
    <fieldset class="scheduler-border">
    <legend class="scheduler-border">Give a Overall Feedback:</legend>
    <!-- <label for="input-5" class="control-label labelCss"></label> -->
     <div class="form-group">
    
    <textarea class="form-control"  name="Feedback" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
    </fieldset>
     <div class="form-check">
    <input type="checkbox" name="check" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1" style="margin-left: 25px;font-size: 20px;">Can we publish your feedback in public domain?</label>
  </div><br><div>
   <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
  </div>
</form>
</div>
</div>
    
   

</body>
</html>

<!------ Include the above in your HEAD tag ---------->
