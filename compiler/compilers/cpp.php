<!-- C Compiler -->
<?php
	$CC="g++ --std=c++11";
	$out="timeout 5s ./a.out";
	$code=$_POST["code"];
	$input=$_POST["input"];
	$filename_code="main.c";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$executable="a.out";
	$command=$CC." -lm ".$filename_code;	
	$command_error=$command." 2>".$filename_error;

	// Used to check the error
	$check=0;

	if(trim($code)=="")
	die("The code area is empty");
	
	// Writing the code to main.cpp
	$file_code=fopen($filename_code,"w+");
	fwrite($file_code,$code);
	fclose($file_code);

	// Writing the inputs to input.txt
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);


	exec("chmod 777 $executable"); 
	exec("chmod 777 $filename_error");
	shell_exec($command_error);
	# Getting the error string from error.txt
	$error=file_get_contents($filename_error);

	// Execution time start
	$executionStartTime = microtime(true);

	if(trim($error)=="")
	{
		if(trim($input)=="")
		{
			$output=shell_exec($out); // Executing the program having no inputs
		}
		else
		{
			$out=$out." < ".$filename_in; // Executing the program with inputs
			$output=shell_exec($out);
		}
        echo "<textarea id='div' class='form-control' name='output' rows='10' cols='50'>$output</textarea>";
	}
	else if(!strpos($error,"error"))
	{
		echo "<pre>$error</pre>";
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
        echo "<textarea id='div' class='form-control' name='output' rows='10' cols='50'>$output</textarea>";
	}
	else
	{
		echo "<pre>$error</pre>";
		$check=1;
	}

	// Execution time ends
	$executionEndTime = microtime(true);
	$seconds = $executionEndTime - $executionStartTime;
	$seconds = sprintf('%0.2f', $seconds);	
	echo "<pre>Compiled And Executed In: $seconds s</pre>";

	if($check==1)
	{
		// Compilation Error
		echo "<pre>Verdict : CE</pre>";
	}
	else if($check==0 && $seconds>3)
	{
		// Time Limit Exceed
		echo "<pre>Verdict : TLE</pre>";
	}
	else if($check==0)
	{
		echo "<pre>Verdict : AC</pre>";
	}

	// Removing the files from the server
	exec("rm $filename_code");
	exec("rm *.o");
	exec("rm *.txt");
	exec("rm $executable");
?>