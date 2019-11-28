
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

if($_GET['mentor_email'] && $_GET['subject_name']);
{
	$mentor_email=$_GET['mentor_email'];
	// echo "<script type='text/javascript'>alert('$mentor_email');</script>";

	$subject_name=$_GET['subject_name'];
	// echo "<script type='text/javascript'>alert('$subject_name');</script>";

	//echo $mentor_email;
	$student_email=$_SESSION["student_email"];
	//echo "<br>".$student_email;
	$search="SELECT * from follower_list where mentor_email='$mentor_email' and student_email='$student_email' and subject_name='$subject_name'";
	$result=mysqli_query($conn,$search);
	$row=mysqli_fetch_row($result);
	$count=mysqli_num_rows($result);

	//echo "<script type='text/javascript'>alert('$count')</script>";


	//echo "<br>".$count;
	if($count==1){
		$followCode=1;
		if($row[3]){
			$followCode=0;
		}
	// echo "<script type='text/javascript'>alert('$followCode');</script>";

		$updateFollowStatus="UPDATE follower_list
		SET follow_status = '$followCode'
		WHERE mentor_email='$mentor_email' and student_email='$student_email' and subject_name='$subject_name'";

		if(mysqli_query($conn,$updateFollowStatus) && $followCode==1){
			$message ="You start following him!!!";
			echo "<script type='text/javascript'>alert('$message');</script>";
			echo "<script>
			window.location.href='mentor_index.php';
			</script>";
		}else{
			if(mysqli_query($conn,$updateFollowStatus)){
				$message ="You unfollowed him!!!";
			echo "<script type='text/javascript'>alert('$message');</script>";
			echo "<script>
			window.location.href='mentor_index.php';
			</script>";
			}
			
		}
	
	}else{
		$todayDate=date("Y-m-d");
		$insert="INSERT INTO follower_list (mentor_email,student_email, subject_name,follow_status,follow_date) values ('$mentor_email','$student_email','$subject_name',true,'$todayDate')";
		if(mysqli_query($conn,$insert)){
			$message ="You start following him!!!";
			echo "<script type='text/javascript'>alert('$message');</script>";
			echo "<script>
			window.location.href='mentor_index.php';
			</script>";
		}else{
			$message ="contact to Admin...";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}
}

?>