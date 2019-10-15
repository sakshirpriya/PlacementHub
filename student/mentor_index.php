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
<body>
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
	if(strcmp($_REQUEST["subject"], "ALL") !== 0){

 	
 	$subject_Filter=$_REQUEST["subject"];
	$Search="SELECT MentorData.name as name, MentorData.email as email, mentor_subject_list.subject_name as subject
FROM MentorData
INNER JOIN mentor_subject_list ON mentor_subject_list.mentor_email=MentorData.email WHERE mentor_subject_list.subject_name='$subject_Filter'";
$result=mysqli_query($conn,$Search);
echo "<form method='post'>
    <div class='table-responsive'>
     <table class='table table-bordered' >
     	<thead class='table-primary'>
      <tr class='text-center'>
       <th scope='col'>Mentor Name</th>
      <th scope='col'>Subject Name</th>
      <th scope='col'>View Profile</th>
      <th scope='col'>Follow Him</th>
      </tr>
    </thead><tbody>";
while ($row=mysqli_fetch_array($result)) {
	// echo $row["name"];

	echo "
       <tr>
      <td>".$row["name"]."</td>
      <td>".$row["subject"]."</td>
      <td><div align='center'>
     <input type='submit' name='insert' id='insert' class='btn btn-success' value='View' />
    </div></td>
      <td> <div align='center'>
     <input type='submit' name='insert' id='insert' class='btn btn-info' value='Follow' />
    </div></td>
    </tr>";
    
   
}
echo " </tbody>
     </table>
    </div>
   
   </form>";
 
	
		
 }else{
$Search="SELECT MentorData.name as name, MentorData.email as email, mentor_subject_list.subject_name as subject
FROM MentorData
INNER JOIN mentor_subject_list ON mentor_subject_list.mentor_email=MentorData.email";
$result=mysqli_query($conn,$Search);
echo "<form method='post'>
    <div class='table-responsive'>
     <table class='table table-bordered' >
     	<thead class='table-primary'>
      <tr class='text-center'>
       <th scope='col'>Mentor Name</th>
      <th scope='col'>Subject Name</th>
      <th scope='col'>View Profile</th>
      <th scope='col'>Follow Him</th>
      </tr>
    </thead><tbody>";
while ($row=mysqli_fetch_array($result)) {
	// echo $row["name"];

	echo "
       <tr>
      <td>".$row["name"]."</td>
      <td>".$row["subject"]."</td>
      <td><div align='center'>
     <input type='submit' name='insert' id='insert' class='btn btn-success' value='View' />
    </div></td>
      <td> <div align='center'>
     <input type='submit' name='insert' id='insert' class='btn btn-info' value='Follow' />
    </div></td>
    </tr>";
    
   
}
echo " </tbody>
     </table>
    </div>
   
   </form>";



}

}
?>


 	<!-- container ends here -->
 </div>
<?php include '../utility/js/placementhub_4.3.1.php'; ?>
</body>
</html>
