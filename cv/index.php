<?php 
  include 'connection.php';
  if(isset($_POST['start'])){
      // echo"testing";
      
     $sql = $conn->query("SELECT * FROM about");
     $row_count1= mysqli_num_rows($sql);
     
     $sql = $conn->query("SELECT * FROM skills");
     $row_count2= mysqli_num_rows($sql);
     
     $sql = $conn->query("SELECT * FROM certificates");
     $row_count3= mysqli_num_rows($sql);
     
     $sql = $conn->query("SELECT * FROM education");
     $row_count4= mysqli_num_rows($sql);
     
     $sql = $conn->query("SELECT * FROM projects");
     $row_count5= mysqli_num_rows($sql);
     
     $sql = $conn->query("SELECT * FROM interest");
     $row_count6= mysqli_num_rows($sql);
     
    if($row_count1>0 && $row_count2>0 && $row_count30 && $row_count4>0 && $row_count5>0 && $row_count6>0){
            echo "<script>window.location='form.php';</script>";
            echo "success";

          }
          else{
            // echo "data already present!!";
            if($row_count1!=0){
                $conn->query("DELETE FROM about");
            }
            if($row_count1!=0){
                $conn->query("DELETE FROM skills");
            }
            if($row_count1!=0){
                $conn->query("DELETE FROM certificates");
            }
            if($row_count1!=0){
                $conn->query("DELETE FROM education");
            }
            if($row_count1!=0){
                $conn->query("DELETE FROM projects");
            }
            if($row_count1!=0){
                $conn->query("DELETE FROM interest");
            }
            
             echo "<script>window.location='form.php';</script>";
          }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <title>CV-Builder</title>

    <style>
     
/*Set background to full image */
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  background-image: url("images/f3-min.jpg");

  height: 100%; 

  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.container-fluid{
    margin:0px;
    padding:0px;
}

/* New Button css */
.btn {
    border: none;
    font-family: 'Lato';
    font-size: inherit;
    color: inherit;
    background: none;
    cursor: pointer;
    padding: 25px 80px;
    display: inline-block;
    margin: 15px 30px;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 700;
    outline: none;
    position: relative;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
}

.btn:after {
    content: '';
    position: absolute;
    z-index: -1;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
}

/* elements for icons */
.btn:before {
    font-family: 'FontAwesome';
    speak: none;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    position: relative;
    -webkit-font-smoothing: antialiased;
}

.btn-sep {
    padding: 25px 60px 25px 120px;
}

.btn-sep:before {
    background: rgba(0,0,0,0.15);
}

.btn-1 {
    background: #3498db;
    color: #fff;
}

.btn-1:hover {
    background: #2980b9;
}

.btn-1:active {
    background: #2980b9;
    top: 2px;
}

.btn-1:before {
    position: absolute;
    height: 100%;
    left: 0;
    top: 0;
    line-height: 3;
    font-size: 140%;
    width: 60px;
}

.icon-info:before {
    content: "\f15b";
}

.content {
  position: absolute; 
  left: 0; 
  right: 0; 
  margin-left: auto; 
  margin-right: auto; 
  margin-top:15%;
  width: auto;
}

@media only screen and (max-width: 900px) {
  

} 

    </style>
  </head>
  <body>

<div class=" bg" style="text-align: center; ">
   
    <div id="content" class="content">
        <h1>Create your own Resume here</h1>
            <form  method="POST">
            <button class="btn btn-1 btn-sep icon-info" type="submit" name="start">Start</button>
            </form>
       
    </div>
</div>
       



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script>
      
      $(window).resize(function(){
 If($(window).width()>900){
  $('#content').removeClass('content');
 }
});
  </script>
  </body>
</html>