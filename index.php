<?php
include 'DataBase/DB_Connection.php';
 $conn = OpenCon();
 
 session_start();
//Student Registration
if(isset($_REQUEST["Register_as_a_Student"]))
{
//$Name=$_REQUEST["FullName"];
  $email= mysqli_real_escape_string($conn, $_REQUEST["Student_email"]);
  $password1= md5(mysqli_real_escape_string($conn, $_REQUEST["password1"]));
  $password2= md5(mysqli_real_escape_string($conn, $_REQUEST["password2"]));
  if($email==NULL || $password1== NULL || $password2==NULL){
    $message = "Some Requried field(*) is Empty!";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
  else{
    if($password2!==$password1){
      $message = "I am afraid that password is not matching!!!";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }else{
      $search = "SELECT email FROM StudentAuth WHERE email='$email'"; 
      $result=mysqli_query($conn, $search);
      $row = mysqli_num_rows($result);
        if($row){
          $message = "Email is already existed." ;
          echo "<script type='text/javascript'>alert('$message');</script>";
        }else{

        $InsertDataAuth = "INSERT INTO StudentAuth (email,password1,password2,status) VALUES ('$email','$password1','$password2',false)"; 
        $InsertData = "INSERT INTO StudentData (email) VALUES ('$email')"; 

        if(mysqli_query($conn, $InsertData) && mysqli_query($conn, $InsertDataAuth))  
        {  

          $message = "congratulations, Your account has been created...Please login and update your profile." ;
          echo "<script type='text/javascript'>alert('$message');</script>";

        }else{
          $message = "Something, went wrong!!!!" ;
          echo "<script type='text/javascript'>alert('$message');</script>";
        }

      }
    }
  }
}
// Employee registration
if(isset($_REQUEST["Regitser_as_a_Mentor"]))
{

  $email= mysqli_real_escape_string($conn, $_REQUEST["mentor_email"]);
  $password1= md5(mysqli_real_escape_string($conn, $_REQUEST["password1"]));
  $password2= md5(mysqli_real_escape_string($conn, $_REQUEST["password2"]));
  $organization= mysqli_real_escape_string($conn, $_REQUEST["organization_name"]);
  if($email==NULL || $password1== NULL || $password2==NULL||$organization==NULL){
    $message = "Some Requried field(*) is Empty!";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
  else{
    if($password2!==$password1){
      $message = "I am afraid that password is not matching!!!";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }else{
      $query = "SELECT email FROM MentorAuth";  
      $result = mysqli_query($conn, $query);
      $count=0;
      while($row = mysqli_fetch_array($result))  
      {  
        if($row['email']==$email){
          $count=$count+1;
          $message = "Email is already

 existed." ;
          echo "<script type='text/javascript'>alert('$message');</script>";
          break;
        }
      }
      if($count==0){

        $InsertDataAuth = "INSERT INTO MentorAuth (email,password1,password2,status) VALUES ('$email','$password1','$password2',false)"; 
        $InsertData = "INSERT INTO MentorData (email,organization) VALUES ('$email','$organization')"; 

        if(mysqli_query($conn, $InsertData) && mysqli_query($conn, $InsertDataAuth))  
        {  

          $message = "congratulations, Your account has been created...Please login" ;
          echo "<script type='text/javascript'>alert('$message');</script>";

        }

      }
    }
  }
}

    //Student login
if(isset($_REQUEST["login_as_a_Student"]))
{
//$Name=$_REQUEST["FullName"];
  $email= mysqli_real_escape_string($conn, $_REQUEST["Student_email"]);
  $password= md5(mysqli_real_escape_string($conn, $_REQUEST["password"]));

  if($email==NULL || $password== NULL){
    $message = "Some Requried field(*) is Empty!";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
  else{
    
    $query = "SELECT email,password1,status FROM StudentAuth where email='$email'";  
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result))  
    {  
      if($row['email']==$email && $row['password1']==$password){
         
        $_SESSION["student_email"] = $email;

        if($row['status']==false){
          echo "<script>
window.location.href='student/editprofile.php';
</script>";
        }else{
          echo "<script>
window.location.href='student/index.php';
</script>";
        }
        
      }else{
        $message = "wrong cridentials for login!!" ;
        echo "<script type='text/javascript'>alert('$message');</script>";
      }
    }

    
  }
}
  //Employee login
if(isset($_REQUEST["login_as_a_Mentor"]))
{
//$Name=$_REQUEST["FullName"];
  $email= mysqli_real_escape_string($conn, $_REQUEST["mentor_email"]);
  $password= md5(mysqli_real_escape_string($conn, $_REQUEST["password"]));

  if($email==NULL || $password== NULL){
    $message = "Some Requried field(*) is Empty!";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
  else{
    
    $query = "SELECT email,password1,status FROM MentorAuth where email='$email'";  
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result))  
    {  
      if($row['email']==$email && $row['password1']==$password){
        
         
        $_SESSION["mentor_email"] = $email;
        if($row['status']==false){
           $message = "Please, Complete Your Profile First !!!!";
    echo "<script type='text/javascript'>alert('$message');</script>";
          echo "<script>
window.location.href='mentor/editprofile.php';
</script>";
        }else{
          echo "<script>
window.location.href='mentor/index.php';
</script>";
        }
        
      }else{
        $message = "wrong cridentials for login!!" ;
        echo "<script type='text/javascript'>alert('$message');</script>";
      }
    }

    
  }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="image/title_logo.png" type="image/x-icon">
   <?php include 'utility/css/placementhub_4.3.1.php'; ?>

  </head>
  <body>
  
       <!-- nav bar start here -->

 <!-- https://codepen.io/Weezlo/pen/NRWZRb -->
 <!-- https://1stwebdesigner.com/open-source-modal-login-signup/ -->
<style>
  .dropdown:hover>.dropdown-menu {
  display: block;
}

.dropdown>.dropdown-toggle:active {
  /*Without this, clicking will make it sticky*/
    pointer-events: none;
}

</style>

 <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
       <a class="navbar-brand" href="index.php">
    <img src="image/logo.png" width="120px" height="60px" class="d-inline-block align-top" alt="PlacementHub">
  </a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- <a class="navbar-brand" href="#">Fixed navbar</a> -->
  <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
    <ul class="navbar-nav">
     <!--  <li class="nav-item active">
        <a class="nav-link" href="index.php">interview<span class="sr-only">(current)</span></a>
      </li> -->
     <!--  <li class="nav-item">
        <a class="nav-link" href="#">INTERNSHIPS</a>
      </li> -->
       <li class="nav-item dropdown dropdown-hover">
        <a class="nav-link dropdown-toggle" href="internship_list.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Modules
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Interview</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Practice</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Test</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Mentors</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Company</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Build CV</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Other</a>
        </div>
      </li>
      
        <li class="nav-item dropdown dropdown-hover">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Login/Register
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Register_as_a_Student">Register as a Student</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Regitser_as_an_Employee">Regitser as a Mentor</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#StudentLogin">Login as a Student</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#EmployeeLogin">Login as a Mentor</a>
        </div>
      </li>
    </ul>
  </div>
</div>
</nav>
<!-- login as a Student Modal start -->
<div class="modal fade" id="StudentLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Please Enter the Cridentials:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
           <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="Student_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  
         <button type="submit" name="login_as_a_Student" class="btn btn-success">login!!!</button>
       </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary">Register!!!</button>
      </div> -->
    </div>
  </div>
</div>
<!-- login as a Student Modal end -->
<!-- login as a Employee Modal start -->
<div class="modal fade" id="EmployeeLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Please Enter the Cridentials:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
           <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="mentor_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  
         <button type="submit" name="login_as_a_Mentor" class="btn btn-success">login!!!</button>
       </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary">Register!!!</button>
      </div> -->
    </div>
  </div>
</div>
<!-- login as a Employee Modal end -->

<!-- Register as a Student Modal start -->
<div class="modal fade" id="Register_as_a_Student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Please Fill The Details:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
           <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="Student_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password1" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password2" class="form-control" id="exampleInputPassword1" placeholder="Confirm-Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
         <button type="submit" name="Register_as_a_Student" class="btn btn-primary">Submit</button>
       </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary">Register!!!</button>
      </div> -->
    </div>
  </div>
</div>
<!-- Register as a Student Modal end -->

<!-- Register as a Student Modal start -->
<div class="modal fade" id="Regitser_as_an_Employee" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Please Fill The Details:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
           <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="mentor_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
     <div class="form-group">
    <label for="exampleInputEmail1">organization Name</label>
                        <select name="organization_name" class="custom-select">
  <option disabled>Open this select menu</option>
  <option value="Lovely Professional University-Punjab">Lovely Professional University-Punjab</option>
  <option value="Other">Other</option>
</select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password1" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password2" class="form-control" id="exampleInputPassword1" placeholder="Confirm-Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
         <button type="submit" name="Regitser_as_a_Mentor" class="btn btn-primary">Submit</button>
       </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary">Register!!!</button>
      </div> -->
    </div>
  </div>
  <!-- navbar end here -->
</div>


<!-- Main Body Start here -->
<div class="container" style="margin-top: 20px;">
<div class="row">
  <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12"><img src="image/homepage.png" class="img-fluid" width="100%" ></div>
  <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12" style="border-left: 2px solid #e3e8e5;">
    <h1 class="text-center" style="margin-top: 18%;">Welcome to PlacementHub</h1>
    <h3 class="text-center" style="margin-top: 2%;">A Better Place to Learn...</h3>

  </div>
</div>
</div>
<!-- Main Body End Here -->



   <?php include 'utility/js/placementhub_4.3.1.php'; ?>
  </body>
</html>




