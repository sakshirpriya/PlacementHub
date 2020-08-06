<!-- BOOTSTRAP VERSION : 4.3.1 -->
<?php include 'connection.php' ?>
<?php 


      if(isset($_POST['about_next'])){
          $name =  $_POST['full_name'];
          $designation =  $_POST['designation'];
          $linkedin =  $_POST['linkedin'];
          $email =  $_POST['email'];
          $phone =  $_POST['phone'];
          $message =  $_POST['message'];

        //Image Upload 
        $target_dir = 'template/uploads/'.$_FILES['imageUpload']['name'];
        if(move_uploaded_file($_FILES['imageUpload']['tmp_name'], $target_dir)){
      echo "file uploaded";


    }
    else
    {
      // echo "ERRORs";
      
    }
          
          $sql = "INSERT INTO about (id,person_name,designation,description,linkedin,email,phone,image) VALUES (NULL, '$name','$designation','$message','$linkedin','$email','$phone','$target_dir')";
         
       
          if(mysqli_query($conn,$sql)){
            echo "<script>window.location='education.php';</script>";
            echo "success";

          }
          else{
            echo "error: ".$sql;
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <script src="https://kit.fontawesome.com/5106db6593.js" crossorigin="anonymous"></script>
    <title>form</title>
    <style type="text/css">
        body{
    background: url(images/f6.png);
    background-repeat: no-repeat;
    background-position: top right; 
}


/*testing upload image*/

.avatar-upload {
  position: relative;
  max-width: 205px;
  margin: 50px auto;
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: 12px;
  z-index: 1;
  top: 10px;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #ffffff;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
.avatar-upload .avatar-edit input + label:after {
  content: "\f040";
  font-family: "FontAwesome";
  color: #757575;
  position: absolute;
  top: 10px;
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
}
.avatar-upload .avatar-preview {
  width: 192px;
  height: 192px;
  position: relative;
  border-radius: 100%;
  border: 6px solid #f8f8f8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

@media only screen and (max-width: 900px) {
  .container{
      width:auto;
  }
}

    </style>
  </head>
  <body>


    <div class="container shadow p-3 mb-5 bg-white rounded">
    <div class="row">
        <div class="col-sm-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend class="text-center header">About You</legend>
                       
                <!-- <div class="avatar-upload">
                    <div class="avatar-edit">
                        <input type='file' name="imageUpload" id="imageUpload" accept=".png, .jpg, .jpeg" />
                        <label for="imageUpload"></label>
                    </div>
                    <div class="avatar-preview">
                        <div id="imagePreview" style="background-image: url(images/profile.png);">
                        </div>
                    </div>
                </div>  --> 

                        <div class="form-group">
                            
                            <div class="col-md-12">
                                <input id="fname" name="full_name" type="text" placeholder="Full Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            
                            <div class="col-md-12">
                                <input id="lname" name="designation" type="text" placeholder="Designation" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            
                            <div class="col-md-12">
                                <input id="email" name="linkedin" type="text" placeholder="Linkedin Profile" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                           
                            <div class="col-md-12">
                                <input id="email" type="email" name="email" type="text" placeholder="Email id" class="form-control">
                            </div>
                        </div>

                       
                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            
                            <div class="col-md-12">
                                <textarea class="form-control" id="message" name="message" placeholder="Short description about you..." rows="5"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg" name="about_next">Next</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!--Image Upload Jquery-->
            <!-- <script>
                    function readURL(input) {
                            console.log("Sfdsf");
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                                $('#imagePreview').hide();
                                $('#imagePreview').fadeIn(650);
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                    $("#imageUpload").change(function() {
                        readURL(this);
                    });
            </script> -->
            
    <!--Ajax Upload -->

 
  </body>
</html>