    <?php
    include '../DataBase/DB_Connection.php';
    session_start();
    $conn=OpenCon();
    if(!isset($_SESSION["student_email"])){
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
      $PIData="SELECT * FROM PersonalInterview WHERE id=$id";
      $PIResult=mysqli_query($conn,$PIData);
      $PIRow=mysqli_fetch_array($PIResult);
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
              <input type='text' value='".$PIRow["knowledge"]."'  placeholder='[ XX / 20 ]' class='form-control' readonly>
            </div>
          </div>
        </div>
        <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
          <div class='form-group'>
            <div class='input-group mb-2'>
              <div class='input-group-prepend'>
                <div class='input-group-text'>confidenece</div>
              </div>
              <input type='text' value='".$PIRow["confidenece"]."'  placeholder='[ XX / 20 ]' class='form-control' readonly>
            </div>
          </div>
        </div>
        <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
          <div class='form-group'>
            <div class='input-group mb-2'>
              <div class='input-group-prepend'>
                <div class='input-group-text'>attitude</div>
              </div>
              <input type='text' value='".$PIRow["attitude"]."' placeholder='[ XX / 20 ]' class='form-control'readonly readonly>
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
              <input type='text' value='".$PIRow["presentation"]."'  placeholder='[ XX / 20 ]' class='form-control' readonly>
            </div>
          </div>

        </div>
        <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
          <div class='form-group'>
            <div class='input-group mb-2'>
              <div class='input-group-prepend'>
                <div class='input-group-text'>  skills  </div>
              </div>
              <input type='text' value='".$PIRow["skills"]."' placeholder='[ XX / 20 ]' class='form-control' readonly>
            </div>
          </div>

        </div>
        <div class='col-xl-4 col-lg-4 col-md-12 col-sm-12'>
          <div class='form-group'>
            <div class='input-group mb-2'>
              <div class='input-group-prepend'>
                <div class='input-group-text'>total</div>
              </div>
              <input type='text' value='".$PIRow["total"]."' placeholder='Your Remark...' class='form-control' readonly>
            </div>
          </div>
        </div>
      </div>
      <div class='row'>
      <div class='col-xl-12 col-lg-12 col-md-12 col-sm-12'>
          <div class='form-group'>
            <div class='input-group mb-2'>
              <div class='input-group-prepend'>
                <div class='input-group-text'>Remark</div>
              </div>
              <input type='text' value='".$PIRow["feedback_remark"]."' placeholder='Your Remark...' class='form-control' readonly>
            </div>
          </div>
        </div>
      </div>
      <hr>";
 
    

echo "     
</fieldset>
</form>";

?>


<!-- *********************************************** -->


             </div>
        <?php include '../utility/js/placementhub_4.3.1.php'; ?>
    </body>
    </html>