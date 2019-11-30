<?php 
$email=$_SESSION["mentor_email"];
//echo "<script type='text/javascript'>alert('$email');</script>";

$query="SELECT * FROM MentorData WHERE email='$email'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
 //$message = $row["email"];
 //echo "<script type='text/javascript'>alert('$message');</script>";

 ?>  


    <div class="sticky-top shadow-lg mb-5 bg-white rounded" style="border: 1px solid grey;">
    	<div class="text-center">
<?php echo '  

         <img src="data:image/jpeg;base64,'.base64_encode($row['profilepic'] ).'" class="rounded-circle" height="150px" width="150px" class="img-thumnail" style="border-radius: 50%;margin-top: 10px;"/>  

         ';?>
 
        </div>
        <p class="text-center font-weight-bold" style="border-bottom: 1px solid grey;border-top: 1px solid grey;margin-top: 5px;"><?php echo $row["name"]; ?></p>
        <p class="text-center" style="border-bottom: 1px solid grey;"><?php echo $row["designation"]." @ ".$row["organization"]; ?></p>
        <p class="text-center" style="border-bottom: 1px solid grey;"><b>Joining Date: </b> <?php echo $row["joining_date"]; ?></p>
        <p class="text-center" style="border-bottom: 1px solid grey;"><b>Mobile: </b><?php echo $row["contact_no"]; ?></p>
         <p class="text-center" style="border-bottom: 1px solid grey;"><b>Email: </b><?php echo $row["email"]; ?></p>
        <p class="text-center" style="border-bottom: 1px solid grey;"><b>Cabin: </b><?php echo $row["cabin"]; ?></p>
       
        <div class="text-center">
          <a href="<?php echo $row['linkedin']; ?>" target="_blank" ><i class="fa fa-linkedin-square fa-2x" style="color: #1c85bd"></i></a>
          <a href="<?php echo $row['github']; ?>" target="_blank" ><i class="fa fa-github-square fa-2x" style="color: #0a0a0a"></i></a>
          <a href="<?php echo $row['facebook']; ?>" target="_blank" ><i class="fa fa-facebook-official fa-2x" style="color: #165bc9;"></i></a>
          <a href="<?php echo $row['twitter']; ?>" target="_blank" ><i class="fa fa-twitter-square fa-2x" style="color: #0eaeed"></i></a>
        </div>
      </div>