<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
   <form action="" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="EmailId" aria-describedby="emailHelp" placeholder="Enter email" name="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputName1">Name</label>
    <input type="text" class="form-control" id="NameId" placeholder="Name" name="Name">
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Subject</label>
    <input type="text" class="form-control" id="SubjectId" placeholder="Subject" name="Subject">
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Message</label>
    <input type="text" class="form-control" id="MessageId" placeholder="Message" name="Message">
  </div>
  <button type="submit" class="btn btn-primary" name="SendMail">Submit</button>
</form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

<?php 
require 'vendor/autoload.php'; 
// $API_KEY="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";
$API_KEY="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";
if(isset($_POST['SendMail'])){
  $Name= $_POST['Name'];
  $Email= $_POST['Email'];
  $Subject= $_POST['Subject'];
  $Message= $_POST['Message']; 
  $email = new \SendGrid\Mail\Mail(); 
$email->setFrom("maker.placementhub@gmail.com", "Nikhil Email");
$email->setSubject($Subject);
$email->addTo($Email, $Name);
$email->addContent("text/plain", $Message);
$email->addContent(
    "text/html", "<h1>ok fine</h1>"
);
$sendgrid = new \SendGrid($API_KEY);
if ($sendgrid->send($email)) {
  echo "sucessfully send";
}
// try {
//     $response = $sendgrid->send($email);
//     print $response->statusCode() . "\n";
//     print_r($response->headers());
//     print $response->body() . "\n";
// } catch (Exception $e) {
//     echo 'Caught exception: '. $e->getMessage() ."\n";
// }
}


?>
