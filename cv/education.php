<!-- BOOTSTRAP VERSION : 4.3.1 -->
<?php include 'connection.php' ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <script src = "app.js"></script>
    <title>Education form</title>
<style>
    @media only screen and (max-width: 900px) {
  .container{
      width:auto;
  }
}
</style>
  </head>
  <body>

    
 <!-- action="ajax/skill_ajax.php" -->

    <div class="container shadow p-3 mb-5 bg-white rounded">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" id="education_form" method="post">
                    <fieldset>
                        <legend class="text-center header">Education</legend>
                        
                        <span id="store_education">
                            <!-- Storing all the inserted Values ... -->
                        </span>

                        <div class="col-sm-12">

                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="institute" name="institute" type="text" placeholder="Institute Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="class" name="class" type="text" placeholder="Branch/Class" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="place" name="place" type="text" placeholder="Place" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="percentage" name="percentage" type="text" placeholder="Percentage/CGPA" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="year" name="year" type="text" placeholder="Admission - Passing Year" class="form-control">
                            </div>
                        </div>

                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                            <input id="test" type="button" onclick="send_server()" class="btn btn-primary btn-lg m-2" value = "+" name="education_next"> 
                            </div>

                            <div class="col-md-12 text-center">
                            <input type="button" class="btn btn-primary btn-lg" value = "Next" onclick="location.href='project.php'">  
                            </div>


                        </div>


                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
  
  const list = document.getElementById("list");
  const list1 = document.getElementById("store_education");
  var institute = document.getElementById('institute')
  var classes = document.getElementById('class')
  var place = document.getElementById('place')
  var percentage = document.getElementById('percentage')
  var year = document.getElementById('year')
  
  console.log(list);
  document.getElementById('test').addEventListener("click",function(){

    // var temp = a.value;

    const item1 = `
    <div class="col-sm-12 rounded border shadow-sm mb-3">
        <div class="col-sm-12 mt-1 mb-1"><span>${institute.value}</span><span style="float:right">${classes.value}</span></div>
        
        <div class="col-sm-12 mt-1 mb-1"><span>${place.value}    |    </span><span>${percentage.value}</span><span style="float:right">${year.value}</span></div>
    </div>
    `;

    const position = "beforeend";
    list1.insertAdjacentHTML(position, item1);

    institute.value = "";
    classes.value = "";
    place.value = "";
    percentage.value = "";
    year.value = "";

  });
</script>

<script> 

          
  function send_server(){
            console.log("innn");
              // Creating the XMLHttpRequest object
              var request = new XMLHttpRequest();
              
              // Instantiating the request object
              request.open("POST", "ajax/education_ajax.php");
              
              // Defining event listener for readystatechange event
              request.onreadystatechange = function() {
                  // Check if the request is compete and was successful
                  if(this.readyState === 4 && this.status === 200) {
                      // Inserting the response from server into an HTML element
                      document.getElementById("result").innerHTML = this.responseText;
                  }
              };
              
              // Retrieving the form data
              var myForm = document.getElementById("education_form");
              var formData = new FormData(myForm);

              // Sending the request to the server
              request.send(formData);

            }

</script>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      
      
 
 
 </body>
</html>