<?php
session_start();
if(!isset($_SESSION["mentor_email"])){
	echo "<script>
	window.location.href='../index.php';
	alert('unauthrise access');
	</script>";
}
if(isset($_SESSION["MCQ_Test_Name"])){
 $test_name=$_SESSION["MCQ_Test_Name"];
 $email=$_SESSION["mentor_email"];
 echo "<script type='text/javascript'>alert('$test_name');</script>";
 echo "<script type='text/javascript'>alert('$email');</script>";

$connect = new PDO("mysql:host=localhost;dbname=PlacementHub", "root", "Placement123@");

$query = "
INSERT INTO mcq_test_question_bank 
(Email,Test_name,Question, Option_A,Option_B,Option_C,Option_D,Answer) 
VALUES ('$email','$test_name',:Question, :Option_A, :Option_B, :Option_C, :Option_D,:Answer)
";

for($count = 0; $count<count($_POST['hidden_Question']); $count++)
{
 $data = array(
  ':Question' => $_POST['hidden_Question'][$count],
  ':Option_A' => $_POST['hidden_Option_A'][$count],
  ':Option_B' => $_POST['hidden_Option_B'][$count],
  ':Option_C' => $_POST['hidden_Option_C'][$count],
  ':Option_D' => $_POST['hidden_Option_D'][$count],
  ':Answer' => $_POST['hidden_Answer'][$count]
 );
 $statement = $connect->prepare($query);
 $statement->execute($data);
}
}
unset($_SESSION["MCQ_Test_Name"]);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1><?php echo $_SESSION["table_name_for_test"]; ?> </h1>
</body>
</html>