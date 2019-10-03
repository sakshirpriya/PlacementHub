<?php

//insert.php
echo "string";
$connect = new PDO("mysql:host=localhost;dbname=Testing", "root", "Nikhil123.@");

$query = "
INSERT INTO tbl_sample 
(Question, Option_A,Option_B,Option_C,Option_D,Answer) 
VALUES (:Question, :Option_A, :Option_B, :Option_C, :Option_D,:Answer)
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

?>