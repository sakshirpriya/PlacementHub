<!-- BOOTSTRAP VERSION : 4.3.1 -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="mystyle.css">

    <title>ADD Interests</title>
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
                <form id="interest_form" class="form-horizontal" >
                    <fieldset>
                        <legend class="text-center header">Add Interests</legend>

                        <span id = "store_interest" >
                            
                         </span>
                        <div class="form-group text-center">
                           
                            <div class="col-md-12">
                              <ul id="list">
                                  <li>
                                  <input id="interest" name="interest" type="text" placeholder="Interest Name" class="form-control">
                                  </li>
                              </ul>
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                            <input id="test" type="button" onclick="send_server()" class="btn btn-primary btn-lg m-2" value = "+" name="skill_next"> 
                            </div>

                            <div class="col-md-12 text-center">
                            <input type="button" id="myBtn" class="btn btn-primary btn-lg" onclick="clickevent()" value = "Next">    
                             <!-- onclick="location.href='template/index.php'" -->
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
  const list1 = document.getElementById("store_interest");
  var x = document.getElementById('interest')
  console.log(list);
  document.getElementById('test').addEventListener("click",function(){

    var temp = document.getElementById('interest').value;

    const item1 = `<li style="list-style-type:none;">
       <span>&#x2713; ${temp}</span>
    </li>`;

    const position = "beforeend";
    list1.insertAdjacentHTML(position, item1);

    x.value = "";

  });
</script>

<script> 

          
  function send_server(){
            console.log("innn");
              // Creating the XMLHttpRequest object
              var request = new XMLHttpRequest();
              
              // Instantiating the request object
              request.open("POST", "ajax/interests_ajax.php");
              
              // Defining event listener for readystatechange event
              request.onreadystatechange = function() {
                  // Check if the request is compete and was successful
                  if(this.readyState === 4 && this.status === 200) {
                      // Inserting the response from server into an HTML element
                      document.getElementById("result").innerHTML = this.responseText;
                  }
              };
              
              // Retrieving the form data
              var myForm = document.getElementById("interest_form");
              var formData = new FormData(myForm);

              // Sending the request to the server
              request.send(formData);

            }

</script>


  

<script>
// document.getElementById("#myBtn").addEventListener("click", function(){

  function clickevent(){
 

  setTimeout(redirect, 10000);

  window.location.href = "https://v2018.api2pdf.com/chrome/url?url=http://13.126.165.2/cv/template/index.php&apikey=ba96f609-dffb-4559-aaf4-42a9bf6270e3";

  // ba96f609-dffb-4559-aaf4-42a9bf6270e3
  // 8827b1fd-ac9c-4176-a84a-df226d72a341
  
}

function redirect(){
  window.location.href = "template/index.php"; 
}
 
// });
</script>










    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>