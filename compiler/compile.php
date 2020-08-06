<?php
	$languageID=$_POST["language"];	
	switch($languageID)
	{
		case "c":
		{
			include("./compilers/c.php");
			break;
		}
		case "cpp":
		{
			include("./compilers/cpp.php");
			break;
		}
		case "java":
		{
			include("./compilers/java.php");
			break;
		}
		case "python3":
		{
			include("./compilers/python3.php");
			break;
		}
			
	}
?>
