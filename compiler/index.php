<?php
include '../DataBase/DB_Connection.php';
 $conn = OpenCon();
 
 session_start();

if(!isset($_SESSION["student_email"])){
	echo "<script>
	window.location.href='../index.php';
	alert('Login in First');
	</script>";
}
?>

<html>
<head>
	<title>Online Compiler for Off-Campus Students</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../image/title_logo.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./styles/compiler-style.css" />		
	<link rel="stylesheet" type="text/css" href="./plugin/lib/codemirror.css">
	<link rel="stylesheet" type="text/css" href="./plugin/theme/monokai.css">
	<link rel="stylesheet" type="text/css" href="./plugin/theme/mdn-like.css">
	<link rel="stylesheet" type="text/css" href="./plugin/addon/hint/show-hint.css">



	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<script type="text/javascript" src="./js/jquery.form.js"></script>
	<script type="text/javascript" src="./plugin/lib/codemirror.js"></script>
	<script type="text/javascript" src="./plugin/mode/clike/clike.js"></script>
	<script type="text/javascript" src="./plugin/mode/python/python.js"></script>
	<script type="text/javascript" src="./js/default.js"></script>
	<script type="text/javascript" src="./plugin/addon/edit/closebrackets.js"></script>
	<script type="text/javascript" src="./plugin/addon/hint/show-hint.js"></script>
	<script type="text/javascript" src="./plugin/addon/hint/anyword-hint.js"></script>
	<!-- <script type="text/javascript" src="./js/compile.js"></script> -->
  </body>
</head>

<body>
	<div id="whole">
	<?php include '../student/component/NavBar.php'; ?>
	<div class="container">
		<div class="row">
			<div id="header" class="col-sm-12 text-center">
				<h2>Online Compiler</h2>
			</div>
			<div id="content" class="col-sm-12">
				<table class="table table-bordered fixed">
					<td width="700">	
						<form action="compile.php" method="post" id="form">
							<nav class="navbar navbar-light bg-light">
								<div>
									<select name="language" id="language" class="custom-select">
										<option value="cpp">C++ </option>
										<option value="c">C</option>										
										<option value="java">Java 1.8.0</option>
										<option value="python3">Python 3.5.2</option>
									</select>
								</div>
								<div>
									<select name="theme" id="theme" class="custom-select">
										<option value="dark">Dark</option>
										<option value="light">Light</option>
									</select>
								</div>
								<div>
									<input type="submit" value="Submit" id="submit" class="btn btn-outline-primary btn-sm">
									<input type="reset" value="Reset" class="btn btn-outline-danger btn-sm">
								</div>
							</nav>
								<textarea name="code" class="codemirror-textarea" id="code"></textarea>
								<span id="errorCode" class="error"></span><br/>
								<strong>Input please:</strong><br/>
								<textarea name="input" rows=5 cols=50 id="input"></textarea><br/><br/>
							</form>
					</td>
					<td class="code" width="400" class="text-center">
						<strong><br/>Output:<br/></strong>
						<span id="output"></span><br/>
					</td>
				</table>
			</div>
		</div>
	</div>
	</div>

</body>
</html>
