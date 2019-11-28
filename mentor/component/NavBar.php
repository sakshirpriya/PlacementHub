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
   <a class="navbar-brand" href="../index.php">
    <img src="http://13.126.165.2/image/logo.png" width="120px" height="60px" class="d-inline-block align-top" alt="PlacementHub">
  </a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- <a class="navbar-brand" href="#">Fixed navbar</a> -->
  <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
    <ul class="navbar-nav">
     <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
     <li class="nav-item dropdown dropdown-hover">
      <a class="nav-link dropdown-toggle" href="internship_list.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Modules
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">Interview</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Practice</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="create_test_index.php">Add Test</a>
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
      <a class="dropdown-item" href="#" >Edit Profile</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">DashBoard</a>
      <div class="dropdown-divider"></div>
       <a class="dropdown-item" href="add_subject.php">Add Your Subject</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="create_test_index.php">Test</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="../common_files/logout.php">LogOut!!</a>
    </div>
  </li>
</ul>
</div>
</div>
</nav>
