<?php 
    
include 'connection.php';


    if($_SERVER["REQUEST_METHOD"] == "POST") {
          $name =  $_POST['skill'];
          $sql = "INSERT INTO skills (id,skill_name) VALUES (NULL,'$name')";
          if(mysqli_query($conn,$sql)){
          }
          else
          {
            echo"error";
          }
      }

      
      

      ?>