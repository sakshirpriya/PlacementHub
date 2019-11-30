    <?php
    include '../../DataBase/DB_Connection.php';
    session_start();
    $conn=OpenCon();
    if(!isset($_SESSION["mentor_email"])){
        echo "<script>
        window.location.href='../../index.php';
        alert('unauthrise access');
        </script>";
    }
    // Make sure an ID was passed
    if(isset($_GET['id'])) {
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
                        $studentName =$_SESSION["studentName"];
                        $registration_no =$_SESSION["registration_no"];
                        $studentemail =$_SESSION["studentemail"];
                        $studentcvname =$_SESSION["studentcvname"];
            }
        }
            
        

    else {
        echo 'Error! No ID was passed.';
    }

    if(isset($_REQUEST["submit"])){
        // echo "<script type='text/javascript'>alert('$id');</script>";
        $mentorfeedback= mysqli_real_escape_string($conn, $_REQUEST["mentorfeedback"]);
         // echo "<script type='text/javascript'>alert('$mentorfeedback');</script>";
        $marks= $_REQUEST["marks"];
         // echo "<script type='text/javascript'>alert('$marks');</script>";

        if($marks==NULL || $mentorfeedback==NULL){
            $message="Marks or Feedback is empty!!!";
          echo "<script type='text/javascript'>alert('$message');</script>";
        }else{
            $UpdateQuery="UPDATE cvcheckUpload SET marks=$marks,mentorfeedback='$mentorfeedback',feedback=true,mentorcreated=NOW() WHERE id='$id'"; 
            if($conn->query($UpdateQuery)){
                 // $message="Marks and Feedback Uploaded!!!";
                 // echo "<script type='text/javascript'>alert('$message');</script>";
                 /**********************PDF UPLOAD*****************************/
                 // Check if a file has been uploaded
    if(isset($_FILES['uploaded_file'])) {
         $message="one";
              //   echo "<script type='text/javascript'>alert('$message');</script>";
        // Make sure the file was sent without errors
        if($_FILES['uploaded_file']['error'] == 0) {
          $message="two";
                // echo "<script type='text/javascript'>alert('$message');</script>";
     
            $mentorcvname = $conn->real_escape_string($_FILES['uploaded_file']['name']);
            // echo "<script type='text/javascript'>alert('$mentorcvname');</script>";
            $mentorfiletype = $conn->real_escape_string($_FILES['uploaded_file']['type']);
            // echo "<script type='text/javascript'>alert('$mentorfiletype');</script>";
            $mentordata = $conn->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
            // echo "<script type='text/javascript'>alert('$mentordata');</script>";
            $mentorsize = intval($_FILES['uploaded_file']['size']);
           //  $v=gettype($id);
           // // echo "<script type='text/javascript'>alert('$v');</script>";
           //  $id=intval($id);
           //  $v=gettype($id);
            // Create the SQL query
$updateData="UPDATE cvcheckUpload SET mentorcvname='$mentorcvname',mentorfiletype='$mentorfiletype',mentorsize=$mentorsize,mentordata='$mentordata' WHERE id=$id";
            // Execute the query
     //echo "<script type='text/javascript'>alert('$updateData');</script>";
     
            // Check if it was successfull
            if($conn->query($updateData)) {
                echo "<script type='text/javascript'>alert('$updateData');</script>";
                 echo "<script>
        window.location.href='index.php';
        alert('Success! Your file was successfully added!');
        </script>";
            }
            else {
                $null=NULL;
                $updateAgain="UPDATE `cvcheckUpload` SET 
                `mentorcvname`='{$null}',
                 `mentorfiletype`='{$null}',
                  `mentorsize`={$null},
                   `mentordata`='{$null}',
                    `mentorcreated`='{$null}',
                    `marks`='{$null}',
                    `mentorfeedback`='{$null}',
                    `feedback`=false
                     WHERE id='{$id}'";
                     // Execute the query
            $result = $conn->query($updateAgain);
            if($result){
               echo "<script>
        window.location.href='index.php';
        alert('Fail! Your file is not uploaded, Try again!!!');
        </script>";  
            }
                
            }
        }
        else {
            
                $message="An error accured while the file was being uploaded!!!";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo "<script>
        window.location.href='index.php';
        </script>"; 
        }
     
       
    }
                 /**********************PDF UPLOAD*****************************/
            }else{
                 $message="Something Went Wrong!!!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
       
    }
    ?>

    <!DOCTYPE html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="../../image/title_logo.png" type="image/x-icon">

        <?php include '../../utility/css/placementhub_4.3.1.php'; ?>
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
        <?php include '../component/NavBar.php'; ?>
         
        <div class="container"><br>
            <h1 align="center">Please Provide Your Feedback For CV</h1>
            <h4 class="text-center">Please Check Student Info Correct </h4><br>

    <form method="post" enctype="multipart/form-data">
                    <fieldset class="scheduler-border">
                <legend class="scheduler-border">Give FeedBack</legend>
                <form>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
        <label>Student Name</label>
        <input type="text" class="form-control" placeholder="<?php echo $studentName;?>" readonly>
        
      </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
        <label>Student Email</label>
        <input type="email" class="form-control"  placeholder="<?php echo $studentemail;?>" readonly>
        
      </div>
                        </div>
                    </div>
    <!--********************************************************************-->
     <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
        <label>Student Registration No</label>
        <input type="text" class="form-control" placeholder="<?php echo $registration_no;?>" readonly>
      </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
        <label>CV Name </label>
         <div class="input-group-prepend"><label class="sr-only" for="inlineFormInputGroup">Username</label>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text"><?php echo $id;?></div>
            </div>
            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="<?php echo $studentcvname;?>" readonly>
          </div>
      </div>
                        </div>
                    </div>
                </div>
                  <hr>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                         <div class="form-group">
        <label>Give Marks [On 10 Scale]*</label>
        <input type="text" class="form-control" name="marks" placeholder="Enter Marks">
                    </div>
                </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <label>Provide Sample CV[Optional]</label>
                        <div class="custom-file">
        

      <input type="file" class="custom-file-input" name="uploaded_file" id="customFile">
      <label class="custom-file-label" for="customFile">Choose file</label>
    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                         <div class="form-group">
        <label>Your Remark</label>
        <textarea class="form-control" name="mentorfeedback" rows="3"></textarea>
      </div></div>
                    </div>
              
    <div class="text-center"><button type="submit" name="submit" class="btn btn-warning">Submit</button></div>
                </form>
                
            </fieldset>
            </form>



             </div>
        <?php include '../../utility/js/placementhub_4.3.1.php'; ?>
    </body>
    </html>