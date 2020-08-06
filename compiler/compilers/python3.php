<?php
	$CC="python3";
	$code=$_POST["code"];
	$input=$_POST["input"];
	$filename_code="main.py";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$command=$CC." ".$filename_code;
	$command_error=$command." 2>".$filename_error;

	// Used to check the error
	$check=0;

	if(trim($code)=="")
	die("The code area is empty");

	$file_code=fopen($filename_code,"w+");
	fwrite($file_code,$code);
	fclose($file_code);
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);
	exec("chmod 777 $filename_error");

	shell_exec($command_error);
	$error=file_get_contents($filename_error);

	// Execution time start
	$executionStartTime = microtime(true);

	if(trim($error)=="")
	{
		if(trim($input)=="")
		{
			$output=shell_exec($command);
		}
		else
		{
			$command=$command." < ".$filename_in;
			$output=shell_exec($command);
		}
		echo "<pre>$output</pre>";
	}
	else
	{
		echo "<pre>$error</pre>";
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
	else if($check==0 && $seconds>10)
	{
		// Time Limit Exceed
		echo "<pre>Verdict : TLE</pre>";
	}
	else if($check==0)
	{
		echo "<pre>Verdict : AC</pre>";
	}

	exec("rm $filename_code");
	exec("rm *.txt");
?>