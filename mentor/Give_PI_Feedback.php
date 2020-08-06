    <?php
    include '../DataBase/DB_Connection.php';
    session_start();
    $conn=OpenCon();
    if(!isset($_SESSION["mentor_email"])){
        echo "<script>
        window.location.href='../index.php';
        alert('unauthrise access');
        </script>";
    }
     // Make sure an ID was passed
    if(isset($_GET['id']) && isset($_GET['email'])) {
    // Get the ID
        $id = intval($_GET['id']);
     
        // Make sure the ID is in fact a valid ID
        if($id <= 0) {
             echo "<script>
        window.location.href='index.php';
        alert('Bad Request!!!!!');
        </script>";
        die('The ID is invalid!');
        }else{
   if(isset($_REQUEST["submit"])){
   
    $id = intval($_GET['id']);
    $knowledge=intval($_REQUEST["knowledge"]);
    //echo"<script>alert('$knowledge');</script>";
    $confidenece=intval($_REQUEST["confidenece"]);
    //echo"<script>alert('$confidenece');</script>";
    $attitude=intval($_REQUEST["attitude"]);
    //echo"<script>alert('$attitude');</script>";
    $presentation=intval($_REQUEST["presentation"]);
    //echo"<script>alert('$presentation');</script>";
    $skills=intval($_REQUEST["skills"]);
    //echo"<script>alert('$skills');</script>";
    $total=$knowledge+$confidenece+$attitude+$presentation+$skills;
    //echo"<script>alert('$total');</script>";
    $feedback_remark=$_REQUEST["feedback_remark"];
    if($knowledge > 20 || $confidenece > 20 || $attitude > 20 || $presentation > 20 || $skills > 20 || $knowledge==NULL || $confidenece==NULL || $attitude==NULL || $presentation==NULL || $skills==NULL){
        $message="Marks cant greater than 20 OR empty!!!";
         echo"<script>alert('$message');</script>";
    }else{
         $UpdateQuery="UPDATE 
         PersonalInterview SET 
         knowledge=$knowledge,
         confidenece=$confidenece,
         attitude=$attitude,
         presentation=$presentation,
         skills=$skills,
         total=$total,
         feedback_remark='$feedback_remark',
         feedback=true 
         WHERE id=$id"; 
         if(mysqli_query($conn,$UpdateQuery)){
         $message="Your Feedback Added!!!";
        echo "<script>alert('$message');</script>"; 
         }else{
            $message="Something Went Wrong!!!";
        echo "<script>alert('$message');</script>";
         }
    }
   }  
        }
    }
    else {
        echo 'Error! No ID was passed.';
    }
    
       

    ?>

    <!DOCTYPE html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="../image/title_logo.png" type="image/x-icon">

        <?php include '../utility/css/placementhub_4.3.1.php'; ?>
        <style>
        body{
            background-color: black;
            color: white;
        }
        fieldset.scheduler-border {
        border: 1px solid #e3dcdc;
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1.5em 0 !important;
        -webkit-box-shadow:  0px 0px 0px 0px #000;
                box-shadow:  0px 0px 0px 0px #000;
    }

        legend.scheduler-border {
            font-size: 1.2em !important;
            font-weight: bold !important;
            text-align: left !important;
            width:auto;
            padding:0 10px;
            border-bottom:none;
        }
        hr {
        height: 1px;
        color: white;
        background-color: white;
        border: none;
    }
    </style>
    </head>
    <body>
        <?php include 'component/NavBar.php'; ?>
         
        <div class="container"><br>
            <h1 align="center">Please Provide Your Feedback For PI</h1>
            <h4 class="text-center">Please Check Student Info Correct </h4><br>

   
  <?php 

  // echo "<script type='text/javascript'>alert('$message');</script>";
  echo "<form method='post' enctype='multipart/form-data'>
    <fieldset class='scheduler-border'>
      <legend class='scheduler-border'>PI-Feedback</legend>";
      $id = intval($_GET['id']);
      $student_email=$_GET['email'];
      $data="SELECT * FROM StudentData WHERE email='$student_email'";
      $Result=mysqli_query($conn,$data);
      $Row=mysqli_fetch_array($Result);
      echo "<div class='row'>
        <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
          <div class='form-group'>
            <div class='input-group mb-2'>
              <div class='input-group-prepend'>
                <div class='input-group-text'>";
                  echo '  

                  <img src="data:image/jpeg;base64,'.base64_encode($Row['profilepic'] ).'" class="rounded-circle" height="23px" width="23px" class="img-thumnail" />  

                  ';  
                echo "</div>
              </div>
              <input type='text' name='Student'  placeholder='"; echo $Row["name"];

              echo"' value='"; echo $Row["name"]; echo "'class='form-control' readonly>
            </div>
          </div>
        </div>
        <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
          <div class='form-group'>
            <div class='input-group mb-2'>
              <div class='input-group-prepend'>
                <div class='input-group-text'>RegisNo.</div>
              </div>
              <input type='text' name='RegisNo' placeholder='"; echo $Row["registration_no"];

              echo"' value='"; echo $Row["registration_no"]; echo "'class='form-control' readonly>
            </div>
          </div>
        </div>
        <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
          <div class='form-group'>
            <div class='input-group mb-2'>
              <div class='input-group-prepend'>
                <div class='input-group-text'>Email</div>
              </div>
              <input type='text' name='Email'   placeholder='"; echo $Row["email"];

              echo"' value='"; echo $Row["email"]; echo "'class='form-control' readonly>
            </div>
          </div>
        </div> 
      </div>

      <div class='row'>
        <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
          <div class='form-group'>
            <div class='input-group mb-2'>
              <div class='input-group-prepend'>
                <div class='input-group-text'>knowledge</div>
              </div>
              <input type='text' name='knowledge'  placeholder='[ XX / 20 ]' class='form-control'>
            </div>
          </div>
        </div>
        <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
          <div class='form-group'>
            <div class='input-group mb-2'>
              <div class='input-group-prepend'>
                <div class='input-group-text'>confidenece</div>
              </div>
              <input type='text' name='confidenece'  placeholder='[ XX / 20 ]' class='form-control'>
            </div>
          </div>
        </div>
        <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
          <div class='form-group'>
            <div class='input-group mb-2'>
              <div class='input-group-prepend'>
                <div class='input-group-text'>  attitude</div>
              </div>
              <input type='text' name='attitude'  placeholder='[ XX / 20 ]' class='form-control'>
            </div>
          </div>
        </div>

      </div>

      <div class='row'>
        <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
          <div class='form-group'>
            <div class='input-group mb-2'>
              <div class='input-group-prepend'>
                <div class='input-group-text'>  presentation</div>
              </div>
              <input type='text' name='presentation'  placeholder='[ XX / 20 ]' class='form-control'>
            </div>
          </div>

        </div>
        <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
          <div class='form-group'>
            <div class='input-group mb-2'>
              <div class='input-group-prepend'>
                <div class='input-group-text'>  skills  </div>
              </div>
              <input type='text' name='skills'  placeholder='[ XX / 20 ]' class='form-control'>
            </div>
          </div>

        </div>
        <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
          <div class='form-group'>
            <div class='input-group mb-2'>
              <div class='input-group-prepend'>
                <div class='input-group-text'>Remark</div>
              </div>
              <input type='text' name='feedback_remark'  placeholder='Your Remark...' class='form-control'>
            </div>
          </div>
        </div>
      </div>
      <hr>";
 
    

echo "     
<div class='text-center'>
  <button type='submit' name='submit' class='btn btn-lg btn-success'>Update Data!!!</button>
</div>
</fieldset>
</form>";

?>


<!-- *********************************************** -->


             </div>
        <?php include '../utility/js/placementhub_4.3.1.php'; ?>
    </body>
    </html>