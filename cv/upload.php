<?php
		echo "<pre>";
		print_r($_FILES);
		// var_dump($_FILES);
		echo "</pre>";

		if(move_uploaded_file($_FILES['file']['tmp_name'], "uploads/{$_FILES['file']['name']}")){
			echo "file uploaded";
		}
		else
		{
			echo "ERROR";
			
		}


// $uploaddir = '/uploads/';
// $uploadfile = $uploaddir.basename($_FILES['file']['name']);

// if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile))
//    {
// 	send_OK();
// 	echo"successs";
//    } 
// else
//     send_error("ERROR - uploading file");




?>