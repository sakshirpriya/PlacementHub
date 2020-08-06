<?php
require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	    	if(isset($_POST['submit']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['link']) && isset($_POST['content'])){
	    		$name=$_POST['name'];
	    		$email=$_POST['email'];
	    		$phone=$_POST['phone'];
	    		$link=$_POST['link'];
	    		$content=$_POST['content'];

	    		$sql="INSERT INTO stories ( name, email, link, phone, content) VALUES ( '$name', '$email', '$link', '$phone','$content')";
			            if($conn->query($sql) === TRUE){
			              header( "refresh:1; url=../index.php" );
			              echo "Details added successfully!!";
			            }else{
			              echo "Error: " . $sql . "<br>" . $conn->error;
			            }
	    	}
    	}
?>