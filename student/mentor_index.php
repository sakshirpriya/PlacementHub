<?php
include '../DataBase/DB_Connection.php';
session_start();
$conn=OpenCon();
if(!isset($_SESSION["student_email"])){
	echo "<script>
	window.location.href='../index.php';
	alert('unauthrise access');
	</script>";
}
 







 // $message =$_SESSION["email"];
 // echo "<script type='text/javascript'>alert('$message');</script>";
?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../image/title_logo.png" type="image/x-icon">
  
	<?php include '../utility/css/placementhub_4.3.1.php'; ?>
 
</head>
<body style="background-color: #f5fcfb;">
	<?php include 'component/NavBar.php'; ?>
  <?php include 'component/index_edit.php'; ?>
  <?php 
$email=$_SESSION["student_email"];
//echo "<script type='text/javascript'>alert('$email');</script>";

$query="SELECT * FROM StudentData WHERE email='$email'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
 //$message = $row["email"];
 //echo "<script type='text/javascript'>alert('$message');</script>";

 ?>  
 <div class="container">
 <hr>
 <div class="row">
 	<div class="col-xl-7 col-lg-7 col-md-12 col-sm-12"></div>
 	<div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
	<form class="form-inline">
 		<div class="form-group mx-sm-3 mb-2">
 			<select name="subject" class="custom-select mb-3">
 				<option selected>Choose Filter</option>
 				<option value="ALL">All Mentors</option>
 				<?php 
 				$Search="SELECT * FROM add_subject";
 				$result=mysqli_query($conn,$Search);
 				while($row=mysqli_fetch_array($result)){
 					echo  "<option value='".$row["subject_name"]."'>".$row["subject_name"]."  [".$row["subject_code"]."]"."</option>";
 				}
 				?> 
 			</select>
 		</div>
 		<button type="submit" name="search_filter" class="btn btn-primary mb-4">Search</button>
 	</form>
 	</div>
 </div>


 <hr>

<?php 



if(isset($_REQUEST["search_filter"])){
	$Search_Filter=$_REQUEST["subject"];
		if($Search_Filter==="ALL"){
$Search="SELECT MentorData.profilepic as profilepic,MentorData.name as name, MentorData.email as email, mentor_subject_list.subject_name as subject_name
FROM MentorData
INNER JOIN mentor_subject_list ON mentor_subject_list.mentor_email=MentorData.email";
$result=mysqli_query($conn,$Search);
$student_email=$_SESSION["student_email"];
echo "
<div class='row'>";

	while ($row=mysqli_fetch_array($result)) {
		$mentor_email=$row["email"];
		$subject_name=$row["subject_name"];
		$URLFORFOLLOW="followMentor.php?mentor_email=".$row["email"]."&subject_name=".$row["subject_name"];
		$search="SELECT * from follower_list where mentor_email='$mentor_email' and student_email='$student_email' and follow_status=true and subject_name='$subject_name'";
  $result2=mysqli_query($conn,$search);
  $count=mysqli_num_rows($result2);
  
  $followstatus='';
  if($count){
  	$followstatus='Followed';
  	// echo "<script type='text/javascript'>alert('$followstatus');</script>";
  }else{
  	$followstatus='Follow';
  	// echo "<script type='text/javascript'>alert('$followstatus');</script>";
  }
	echo "
	<div class='col-xl-4 col-lg-4 col-md-6 col-sm-12 text-center' style='padding: 10px;'>
		<img src='data:image/jpeg;base64,".base64_encode($row['profilepic'] )."' width='120px' height='120px' style='border-radius: 50%' class='text-justify'>
		<h5 class='text-center'><b>".$row["name"]."</b> </h5>
		<h4 class='text-center'>".$row["subject_name"]."</h4>
		<form class='form-inline'>
 	  <div class='col text-center'>
 		<a class='btn btn-info' href='".$URLFORFOLLOW."' style='border-radius: 20px;border: 2px solid grey; width: 110px;'>";echo $followstatus; echo "</a>
 		
 	</div>
 	</form>
 		</div>";
	
// 	$count=$count+1;

// 	if($count%3==0){
// 	echo "<h1>ok</h1><br>";
// }
	

}
echo "</div>";
		}else{
			$Search="SELECT MentorData.profilepic as profilepic,MentorData.name as name, MentorData.email as email, mentor_subject_list.subject_name as subject_name
FROM MentorData
INNER JOIN mentor_subject_list ON mentor_subject_list.mentor_email=MentorData.email WHERE subject_name='$Search_Filter'";
$result=mysqli_query($conn,$Search);
$student_email=$_SESSION["student_email"];
echo "
<div class='row'>";

	while ($row=mysqli_fetch_array($result)) {
		$mentor_email=$row["email"];
		$subject_name=$row["subject_name"];
		$URLFORFOLLOW="followMentor.php?mentor_email=".$row["email"]."&subject_name=".$row["subject_name"];
		$search="SELECT * from follower_list where mentor_email='$mentor_email' and student_email='$student_email' and follow_status=true and subject_name='$subject_name'";
  $result2=mysqli_query($conn,$search);
  $count=mysqli_num_rows($result2);
  
  $followstatus='';
  if($count){
  	$followstatus='Followed';
  	// echo "<script type='text/javascript'>alert('$followstatus');</script>";
  }else{
  	$followstatus='Follow';
  	// echo "<script type='text/javascript'>alert('$followstatus');</script>";
  }
	echo "
	<div class='col-xl-4 col-lg-4 col-md-6 col-sm-12 text-center' style='padding: 10px;'>
		<img src='data:image/jpeg;base64,".base64_encode($row['profilepic'] )."' width='120px' height='120px' style='border-radius: 50%' class='text-justify'>
		<h5 class='text-center'><b>".$row["name"]."</b> </h5>
		<h4 class='text-center'>".$row["subject_name"]."</h4>
		<form class='form-inline'>
 	  <div class='col text-center'>
 		<a class='btn btn-info' href='".$URLFORFOLLOW."' style='border-radius: 20px;border: 2px solid grey; width: 110px;'>";echo $followstatus; echo "</a>
 		
 	</div>
 	</form>
 		</div>";
	
// 	$count=$count+1;

// 	if($count%3==0){
// 	echo "<h1>ok</h1><br>";
// }
	

}
echo "</div>";
		}

}else{
	$Search="SELECT MentorData.profilepic as profilepic,MentorData.name as name, MentorData.email as email, mentor_subject_list.subject_name as subject_name
FROM MentorData
INNER JOIN mentor_subject_list ON mentor_subject_list.mentor_email=MentorData.email";
$result=mysqli_query($conn,$Search);
$student_email=$_SESSION["student_email"];
echo "
<div class='row'>";

	while ($row=mysqli_fetch_array($result)) {
		$mentor_email=$row["email"];
		$subject_name=$row["subject_name"];
		$URLFORFOLLOW="followMentor.php?mentor_email=".$row["email"]."&subject_name=".$row["subject_name"];
		$search="SELECT * from follower_list where mentor_email='$mentor_email' and student_email='$student_email' and follow_status=true and subject_name='$subject_name'";
  $result2=mysqli_query($conn,$search);
  $count=mysqli_num_rows($result2);
  
  $followstatus='';
  if($count){
  	$followstatus='Followed';
  	// echo "<script type='text/javascript'>alert('$followstatus');</script>";
  }else{
  	$followstatus='Follow';
  	// echo "<script type='text/javascript'>alert('$followstatus');</script>";
  }
	echo "
	<div class='col-xl-4 col-lg-4 col-md-6 col-sm-12 text-center' style='padding: 10px;'>
		<img src='data:image/jpeg;base64,".base64_encode($row['profilepic'] )."' width='120px' height='120px' style='border-radius: 50%' class='text-justify'>
		<h5 class='text-center'><b>".$row["name"]."</b> </h5>
		<h4 class='text-center'>".$row["subject_name"]."</h4>
		<form class='form-inline'>
 	  <div class='col text-center'>
 		<a class='btn btn-info' href='".$URLFORFOLLOW."' style='border-radius: 20px;border: 2px solid grey; width: 110px;'>";echo $followstatus; echo "</a>
 		
 	</div>
 	</form>
 		</div>";
	
// 	$count=$count+1;

// 	if($count%3==0){
// 	echo "<h1>ok</h1><br>";
// }
	

}
echo "</div>";
}
?>
<!-- login as a Employee Modal start -->
<div class="modal fade" id="EmployeeLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Please Enter the Cridentials:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
           <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="mentor_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  
         <button type="submit" name="login_as_a_Mentor" class="btn btn-success">login!!!</button>
       </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary">Register!!!</button>
      </div> -->
    </div>
  </div>
</div>
<!-- login as a Employee Modal end -->

 	<!-- container ends here -->
 </div>
<?php include '../utility/js/placementhub_4.3.1.php'; ?>
</body>
</html>

