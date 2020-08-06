<style>
  .dropdown:hover>.dropdown-menu {
    display: block;
  }
  .dropdown>.dropdown-toggle:active {
    /*Without this, clicking will make it sticky*/
    pointer-events: none;
  }
</style>

<nav class="navbar  navbar-expand-lg navbar-light bg-light">
  <div class="container">
   <a class="navbar-brand" href="http://13.126.165.2/mentor/index.php">
    <img src="http://13.126.165.2/image/logo.png" width="120px" height="60px" class="d-inline-block align-top" alt="PlacementHub">
  </a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- <a class="navbar-brand" href="#">Fixed navbar</a> -->
  <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
    <ul class="navbar-nav">
     <li class="nav-item active">
        <a class="nav-link" href="http://13.126.165.2/mentor/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="http://13.126.165.2/mentor/create_test_index.php">Create-Test<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="http://13.126.165.2/mentor/gd_index.php">GD-Room<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="http://13.126.165.2/mentor/cvCheck/index.php">Check-CV<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="http://13.126.165.2/mentor/PI_Request.php">Take-PI<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="http://13.126.165.2/mentor/Notification.php">Notifications<span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="http://13.126.165.2/mentor/ViewRatings/ViewRatings.php">Ratings<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="http://13.126.165.2/mentor/add_subject.php">Add-Subject<span class="sr-only">(current)</span></a>
      </li>
    

    <li class="nav-item dropdown dropdown-hover">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php
        $email=$_SESSION['mentor_email'];
        $query = "SELECT * FROM MentorData WHERE email='$email'";  
        $result = mysqli_query($conn, $query);  
        while($row = mysqli_fetch_array($result))  
        {  

         echo '  

         <img src="data:image/jpeg;base64,'.base64_encode($row['profilepic'] ).'" class="rounded-circle" height="35px" width="35px" class="img-thumnail" />  

         ';  
       }  
       ?> 
     </a>
     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="http://13.126.165.2/mentor/editprofile.php" >Edit Profile</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="../common_files/logout.php">LogOut!!</a>
    </div>
  </li>
</ul>
</div>
</div>
</nav>
