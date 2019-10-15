<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 4 TimePicker</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <?php 
if(isset($_REQUEST["submit"])){
    echo $_REQUEST["t"];
    echo gettype($_REQUEST["t"])."\n"; 
    // use of explode 
$string = $_REQUEST["t"]; 
$str_arr = explode (":", $string);  
print_r($str_arr); 
function convertTime($str_arr) {

  $hours = $str_arr[0];
  $minutes = $str_arr[1];
  if ($hours > 12) {
    $meridian = 'PM';
    $hours -= 12;
  } else if ($hours < 12) {
    $meridian = 'AM';
    if ($hours == 0) {
      $hours = 12;
    }
  } else {
    $meridian = 'PM';
  }
  echo($hours.':'.$minutes.' '.$meridian);
}
convertTime($str_arr);
}

    ?>
    <form>
        <input type="text" id="timepicker" name="t" width="276" />
    <input type="submit" name="submit">
    </form>
    <script>
        $('#timepicker').timepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
</body>
</html>