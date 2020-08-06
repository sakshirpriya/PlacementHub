      <?php
// followers list
$conn=OpenCon();
$mentor_email=$_SESSION["mentor_email"];
$follower="SELECT count(*) as total from follower_list where mentor_email='$mentor_email' AND follow_status=true";
$result=mysqli_query($conn,$follower);
$data=mysqli_fetch_assoc($result);
$follower=$data['total'];
$PI="SELECT count(*) as total from PersonalInterview where mentor_email='$mentor_email' AND feedback=true";
$result=mysqli_query($conn,$PI);
$data=mysqli_fetch_assoc($result);
$PI=$data['total'];
$Ratings="SELECT count(*) as total, sum(Total) as sumofrating from MentorRatings where mentor_email='$mentor_email'";
$result=mysqli_query($conn,$Ratings);
$data=mysqli_fetch_assoc($result);
$Ratings=(($data["sumofrating"]/$data["total"])*2)/10;
  $Tests="SELECT count(*) as total from test_creator_data where email='$mentor_email'";
$result=mysqli_query($conn,$Tests);
$data=mysqli_fetch_assoc($result);
$Tests=$data["total"];
  

?>
     <div class="card-deck">
      <div class="card shadow-lg mb-5 bg-white rounded">
        <div class="card-body">
          <p class="card-title" style="margin-top: -15px;"><h2 class="text-center" style="font-weight: bold;">Tests</h2></p><hr>
          <p class="card-title text-center" style="margin-top: -20px; font-size: 55px; font-weight: bold;"><?php echo $Tests; ?></p>
        </div>
        <button type="button" class="btn btn-danger btn-sm" style="margin-top: -30px;"></button>
      </div>

      <div class="card shadow-lg mb-5 bg-white rounded">
        <div class="card-body">
         <p class="card-title" style="margin-top: -15px;"><h2 class="text-center" style="font-weight: bold;">Followers</h2></p><hr>
         <p class="card-title text-center" style="margin-top: -20px; font-size: 55px; font-weight: bold;"><?php echo $follower; ?></p>
       </div>
       <button type="button" class="btn btn-info btn-sm" style="margin-top: -30px;"></button>
     </div>
     <div class="card shadow-lg mb-5 bg-white rounded">
      <div class="card-body">
       <p class="card-title" style="margin-top: -15px;"><h2 class="text-center" style="font-weight: bold;">Interviews</h2></p><hr>
       <p class="card-title text-center" style="margin-top: -20px; font-size: 55px; font-weight: bold;"><?php echo $PI; ?></p>
     </div>
     <button type="button" class="btn btn-primary btn-sm" style="margin-top: -30px;"></button>
   </div>

   <div class="card shadow-lg mb-5 bg-white rounded">
    <div class="card-body">
    	<p class="card-title" style="margin-top: -15px;"><h2 class="text-center" style="font-weight: bold;">Ratings</h2></p><hr>
      <p class="card-title text-center" style="margin-top: -20px; font-size: 55px; font-weight: bold;"><?php echo $Ratings; ?></p>
    </div>
    <button type="button" class="btn btn-success btn-sm" style="margin-top: -30px;"></button>
  </div>
</div>