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
    <script src="https://kit.fontawesome.com/5106db6593.js" crossorigin="anonymous"></script>
    <title>Project form</title>
<style>
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
        <div class="col-md-12">
            <div class="well well-sm">
                <form id = "project_form" action="ajax/project_ajax.php" class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header">Add Projects</legend>
                    <span id="store_projects">
                            <!-- Store project list here ... -->
                    </span>

                    <div class = "col-sm-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="project_name" name="project_name" type="text" placeholder="Project Name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="year" name="year" type="text" placeholder="Year" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea class="form-control" id="description" name="description" placeholder="Short description about your project..." rows="5"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                            <input id="test" type="button" onclick="send_server()" class="btn btn-primary btn-lg m-2" value = "+" name="skill_next"> 
                            </div>

                            <div class="col-md-12 text-center">
                            <input type="button" class="btn btn-primary btn-lg" value = "Next" onclick="location.href='skill.php'">    
                            
                        </div>


                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
  
  const list = document.getElementById("store_projects");
  var project = document.getElementById('project_name')
  var year = document.getElementById('year')
  console.log(list);
  document.getElementById('test').addEventListener("click",function(){


    const item1 = `<div class = "col-sm-12 border shadow-sm rounded mb-3">
        <span>${project.value}</span><span style="float:right">${year.value}</span>
    </div>`;

    const position = "beforeend";
    list.insertAdjacentHTML(position, item1);

    project.value = "";
    year.value = "";

  });
</script>

<script> 

          
  function send_server(){
            console.log("innn");
              // Creating the XMLHttpRequest object
              var request = new XMLHttpRequest();
              
              // Instantiating the request object
              request.open("POST", "ajax/project_ajax.php");
              
              // Defining event listener for readystatechange event
              request.onreadystatechange = function() {
                  // Check if the request is compete and was successful
                  if(this.readyState === 4 && this.status === 200) {
                      // Inserting the response from server into an HTML element
                      document.getElementById("result").innerHTML = this.responseText;
                  }
              };
              
              // Retrieving the form data
              var myForm = document.getElementById("project_form");
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