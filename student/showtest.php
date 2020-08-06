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
 if(isset($_GET['test_name'])){
$test_name=$_GET['test_name'];
  
 }else{
  $message="No Test ID Present!!!";
  echo "<script>alert('$message');</script>";
 }
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../image/title_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  
  <?php include '../utility/css/placementhub_4.3.1.php'; ?>
  <style>
    .datacss{
          margin-left: 10px;
    }
  </style>
</head>
<body>
  <?php include 'component/NavBar.php'; ?>
  <?php include 'component/index_edit.php'; ?>
  

  <hr>
<style type="text/css">
  .style2 {
  color: black;
  font-weight: bold;
  font-family: sans-serif;
}
.style8 {
  color: #6633CC;
  font-weight: bold;
}
</style>
<?php
$query="SELECT * FROM mcq_test_question_bank WHERE Test_name='$test_name'";
$rs=mysqli_query($conn,$query);
echo "<table width=100%> <tr> <td width=30>&nbsp;<td> <table border=0>";
while($row = mysqli_fetch_array($rs))
{
echo "<tr><td><span class=style2>Question :&nbsp" . $row["Question"] . "</span></td></tr>";
echo "<tr><td><input type=radio value=1 name=ans class=style8>&nbsp&nbsp&nbsp&nbsp" . $row["Option_A"] . "</td></tr>";
echo "<tr><td><input type=radio value=2 name=ans class=style8>&nbsp&nbsp&nbsp&nbsp" . $row["Option_B"] . "</td></tr>";
echo "<tr><td><input type=radio value=3 name=ans class=style8>&nbsp&nbsp&nbsp&nbsp" . $row["Option_C"] . "</td></tr>";
echo "<tr><td><input type=radio value=4 name=ans class=style8>&nbsp&nbsp&nbsp&nbsp" . $row["Option_D"] . "</td></tr>";
echo "<tr><td><p class=w3-dropdown-hover><i>View Answer</i><span class=w3-dropdown-content w3-green w3-padding>".$row["Answer"]."</span></p><hr></td></tr>";
}
echo "</table>";
echo "</form>";
?>
</body>
</html>