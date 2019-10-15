<?php 
//profile pic
  //Update DP
      if(isset($_POST["submit_pic_data"])){
        // $message = "image is not added!" ;
        // echo "<script type='text/javascript'>alert('$message');</script>";
        $check = getimagesize($_FILES["pic_data"]["tmp_name"]);
        $PicDataDataUpdated=$_REQUEST["PicDataDataUpdated"];
        if($check !== false){
          $image = $_FILES['pic_data']['tmp_name'];
          $imgContent = addslashes(file_get_contents($image));
        //Insert image content into database
          $conndition=$_SESSION["student_email"];
          $update = $conn->query("UPDATE StudentData SET $PicDataDataUpdated='$imgContent' where email='$conndition'");
          if($update){
            
           $message = "Pic uploaded!!!";
          echo "<script type='text/javascript'>alert('$message');</script>";


        }
        else{

          $message = "Please select an image file to upload.";
          echo "<script type='text/javascript'>alert('$message');</script>";
        }
      }

    }

?>
<!-- Register as a Student Modal start -->
<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Please Fill The Details:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">
          <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text">Options</label>
  </div>
   <select class="custom-select" name="PicDataDataUpdated">
    <option selected>Choose...</option>
    <option value="profilepic">Profile Pic</option>
    <option value="cover">Cover Pic</option>
  </select>
</div>
  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">Upload</span>
  </div>
  <div class="custom-file">
    <input type="file" name="pic_data" class="custom-file-input" id="inputGroupFile01">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>
  
  
         <button type="submit" name="submit_pic_data" class="btn btn-primary">upload</button>
       </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary">Register!!!</button>
      </div> -->
    </div>
  </div>
  <!-- navbar end here -->
</div>

<?php
 $conndition=$_SESSION["student_email"];
if (isset($_REQUEST["submit_personal_data"])) {
  $dataforupdate=$_REQUEST["dataforupdate"];
  $whereToUpdate=$_REQUEST["PersonalDataUpdated"];
 $update = $conn->query("UPDATE StudentData SET $whereToUpdate='$dataforupdate' where email='$conndition'");
 if($update){
      $message = "Data Updated...";
          echo "<script type='text/javascript'>alert('$message');</script>";
 }else{
      $message = "something went wrong...";
          echo "<script type='text/javascript'>alert('$message');</script>";
 }

}

?>

<!-- Personal data Start Here -->

<div class="modal fade" id="PersonalData" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Choose What you Want to update:</h5>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">
   
  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text">Options</label>
  </div>
  <select class="custom-select" name="PersonalDataUpdated">
    <option selected>Choose...</option>
    <option value="name">name</option>
    <option value="dob">dob</option>
    <option value="mobile_no">mobile</option>
    <option value="father_name">father's name</option>
    <option value="mother_name">Mother's name</option>
    <option value="address">address</option>
  </select>
</div>
  
   <div class="form-group">
    <label>Provide Data:</label>
    <input type="text" class="form-control" name="dataforupdate" placeholder="Enter date...">
    
  </div>
         <button type="submit" name="submit_personal_data" class="btn btn-primary">UpDate!!!</button>
       </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary">Register!!!</button>
      </div> -->
    </div>
  </div>

</div>

<!-- Personal data end Here -->


<?php
 $conndition=$_SESSION["student_email"];
if (isset($_REQUEST["submit_college_data"])) {
  $dataforupdate=$_REQUEST["dataforupdate"];
  $whereToUpdate=$_REQUEST["CollageDataUpdated"];
 $update = $conn->query("UPDATE StudentData SET $whereToUpdate='$dataforupdate' where email='$conndition'");
 if($update){
      $message = "Data Updated...";
          echo "<script type='text/javascript'>alert('$message');</script>";
 }else{
      $message = "something went wrong...";
          echo "<script type='text/javascript'>alert('$message');</script>";
 }

}

?>
<!-- Collage data Start Here -->

<div class="modal fade" id="CollageData" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Choose What you Want to update:</h5>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">
   
  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text">Options</label>
  </div>
  <select class="custom-select" name="CollageDataUpdated">
    <option selected>Choose...</option>
    <option value="college_name">College Name</option>
    <option value="current_cgpa_percentage">current cgpa or percentage</option>
    <option value="passing_year">Passing Year</option>
    <option value="branch">Branch</option>
    <option value="registration_no">Registration No</option>
    
  </select>
</div>
  
   <div class="form-group">
    <label>Provide Data:</label>
    <input type="text" class="form-control" name="dataforupdate" placeholder="Enter date...">
    
  </div>
         <button type="submit" name="submit_college_data" class="btn btn-primary">UpDate!!!</button>
       </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary">Register!!!</button>
      </div> -->
    </div>
  </div>

</div>

<!-- Collage data end Here -->

<?php
 $conndition=$_SESSION["student_email"];
if (isset($_REQUEST["submit_xii_data"])) {
  $dataforupdate=$_REQUEST["dataforupdate"];
  $whereToUpdate=$_REQUEST["XIIDataUpdated"];
 $update = $conn->query("UPDATE StudentData SET $whereToUpdate='$dataforupdate' where email='$conndition'");
 if($update){
      $message = "Data Updated...";
          echo "<script type='text/javascript'>alert('$message');</script>";
 }else{
      $message = "something went wrong...";
          echo "<script type='text/javascript'>alert('$message');</script>";
 }

}

?>

<!-- XII data Start Here -->

<div class="modal fade" id="XIIData" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Choose What you Want to update:</h5>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">
   
  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text">Options</label>
  </div>
  <select class="custom-select" name="XIIDataUpdated">
    <option selected>Choose...</option>
    <option value="xii_school">XII School</option>
    <option value="xii_percentage">XII Board percentage</option>
    <option value="xii_board">XII board</option>
    <option value="xii_year">XII Year</option>    
  </select>
</div>
  
   <div class="form-group">
    <label>Provide Data:</label>
    <input type="text" class="form-control" name="dataforupdate" placeholder="Enter date...">
    
  </div>
         <button type="submit" name="submit_xii_data" class="btn btn-primary">UpDate!!!</button>
       </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary">Register!!!</button>
      </div> -->
    </div>
  </div>

</div>

<!-- XII data end Here -->


<?php
 $conndition=$_SESSION["student_email"];
if (isset($_REQUEST["submit_x_data"])) {
  $dataforupdate=$_REQUEST["dataforupdate"];
  $whereToUpdate=$_REQUEST["XDataUpdated"];
 $update = $conn->query("UPDATE StudentData SET $whereToUpdate='$dataforupdate' where email='$conndition'");
 if($update){
      $message = "Data Updated...";
          echo "<script type='text/javascript'>alert('$message');</script>";
 }else{
      $message = "something went wrong...";
          echo "<script type='text/javascript'>alert('$message');</script>";
 }

}

?>

<!-- X data Start Here -->

<div class="modal fade" id="XData" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Choose What you Want to update:</h5>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">
   
  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text">Options</label>
  </div>
  <select class="custom-select" name="XDataUpdated">
    <option selected>Choose...</option>
    <option value="x_school">X School</option>
    <option value="x_percentage">X Board cgpa or percentage</option>
    <option value="x_board">X Board</option>
    <option value="x_year">X Year</option>    
  </select>
</div>
  
   <div class="form-group">
    <label>Provide Data:</label>
    <input type="text" class="form-control" name="dataforupdate" placeholder="Enter date...">
    
  </div>
         <button type="submit" name="submit_x_data" class="btn btn-primary">UpDate!!!</button>
       </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary">Register!!!</button>
      </div> -->
    </div>
  </div>

</div>

<!-- X data end Here -->

<!-- X data Start Here -->

<div class="modal fade" id="MediaData" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Choose What you Want to update:</h5>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">
   
  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text">Options</label>
  </div>
  <select class="custom-select" name="MediaDataUpdated">
    <option selected>Choose...</option>
    <option value="facebook">facebook</option>
    <option value="twitter">twitter</option>
    <option value="github">github</option>
    <option value="linkden">linkden</option>    
  </select>
</div>
  
   <div class="form-group">
    <label>Provide complete profile link:</label>
    <input type="text" class="form-control" name="dataforupdate" placeholder="Enter date...">
    
  </div>
         <button type="submit" name="submit_x_data" class="btn btn-primary">UpDate!!!</button>
       </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary">Register!!!</button>
      </div> -->
    </div>
  </div>

</div>

<!-- X data end Here -->