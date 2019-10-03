<?php
include '../DataBase/DB_Connection.php';
session_start();
$conn=OpenCon();
if(!isset($_SESSION["email"])){
  echo "<script>
  window.location.href='../index.php';
  alert('unauthrise access');
  </script>";
}
 // $message =$_SESSION["email"];
 // echo "<script type='text/javascript'>alert('$message');</script>";
?>
<html>  
    <head>  
        <title>PHP - Sending multiple forms data through jQuery Ajax</title>  
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
       <?php include '../utility/css/placementhub_4.3.1.php'; ?>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body> 
  <?php include 'NavBar.php'; ?>
     
        <div class="container">
   <br />
   
   <h3 align="center">PHP - Sending multiple forms data through jQuery Ajax</a></h3><br />
   
   <div align="right" style="margin-bottom:5px;">
    <button type="button" name="add" id="add" class="btn btn-success btn-xs">Add</button>
   </div>
   <br />
   <form method="post" id="user_form">
    <div class="table-responsive">
     <table class="table table-striped table-bordered" id="user_data">
      <tr>
       <th>Question</th>
       <th>Option[A]</th>
       <th>Option[B]</th>
       <th>Option[C]</th>
       <th>Option[D]</th>
       <th>Answer</th>
       <th>Details</th>
       <th>Remove</th>
      </tr>
     </table>
    </div>
    <div align="center">
     <input type="submit" name="insert" id="insert" class="btn btn-primary" value="Insert" />
    </div>
   </form>

   <br />
  </div>
  <div id="user_dialog" title="Add Data">
   <div class="form-group">
    <label>Question</label>
    <input type="text" name="Question" id="Question" class="form-control" />
    <span id="error_Question" class="text-danger"></span>
   </div>
    <div class="form-group">
    <label>Option-A</label>
    <input type="text" name="Option_A" id="Option_A" class="form-control" />
    <span id="error_Option_A" class="text-danger"></span>
   </div>
   <div class="form-group">
    <label>Option-B</label>
    <input type="text" name="Option_B" id="Option_B" class="form-control" />
    <span id="error_Option_B" class="text-danger"></span>
   </div>
   <div class="form-group">
    <label>Option-C</label>
    <input type="text" name="Option_C" id="Option_C" class="form-control" />
    <span id="error_Option_C" class="text-danger"></span>
   </div>
   <div class="form-group">
    <label>Option-D</label>
    <input type="text" name="Option_D" id="Option_D" class="form-control" />
    <span id="error_Option_D" class="text-danger"></span>
   </div>
    <div class="form-group">
    <label>Answer</label>
    <input type="text" name="Answer" id="Answer" class="form-control" />
    <span id="error_Answer" class="text-danger"></span>
   </div>
  
   <div class="form-group" align="center">
    <input type="hidden" name="row_id" id="hidden_row_id" />
    <button type="button" name="save" id="save" class="btn btn-info">Save</button>
   </div>
  </div>
  <div id="action_alert" title="Action">

  </div>
       <?php include '../utility/css/placementhub_4.3.1.php'; ?>

    </body>  
</html> 

<script>  
$(document).ready(function(){ 
 
 var count = 0;

 $('#user_dialog').dialog({
  autoOpen:false,
  width:400
 });

 $('#add').click(function(){
  $('#user_dialog').dialog('option', 'title', 'Add Data');
  $('#Question').val('');
  $('#Option_A').val('');
  $('#Option_B').val('');
  $('#Option_C').val('');
  $('#Option_D').val('');
  $('#Answer').val('');
  $('#error_Question').text('');
  $('#error_Option_A').text('');
  $('#error_Option_B').text('');
  $('#error_Option_C').text('');
  $('#error_Option_D').text('');
  $('#error_Answer').text('');
  $('#Question').css('border-color', '');
  $('#Option_A').css('border-color', '');
  $('#Option_B').css('border-color', '');
  $('#Option_C').css('border-color', '');
  $('#Option_D').css('border-color', '');
  $('#Answer').css('border-color', '');
  $('#save').text('Save');
  $('#user_dialog').dialog('open');
 });

 $('#save').click(function(){
  var error_Question = '';
  var error_Option_A = '';
  var error_Option_B = '';
  var error_Option_C = '';
  var error_Option_D = '';
  var error_Answer = '';
  var Question = '';
  var Option_A = '';
  var Option_B = '';
  var Option_C = '';
  var Option_D = '';
  var Answer = '';
  if($('#Question').val() == '')
  {
   error_Question = 'First Name is required';
   $('#error_Question').text(error_Question);
   $('#Question').css('border-color', '#cc0000');
   Question = '';
  }
  else
  {
   error_Question = '';
   $('#error_Question').text(error_Question);
   $('#Question').css('border-color', '');
   Question = $('#Question').val();
  } 
  if($('#Option_A').val() == '')
  {
   error_Option_A = 'Last Name is required';
   $('#error_Option_A').text(error_Option_A);
   $('#Option_A').css('border-color', '#cc0000');
   Option_A = '';
  }
  else
  {
   error_Option_A = '';
   $('#error_Option_A').text(error_Option_A);
   $('#Option_A').css('border-color', '');
   Option_A = $('#Option_A').val();
  }
  if($('#Option_B').val() == '')
  {
   error_Option_B = 'Last Name is required';
   $('#error_Option_B').text(error_Option_B);
   $('#Option_B').css('border-color', '#cc0000');
   Option_B = '';
  }
  else
  {
   error_Option_B = '';
   $('#error_Option_B').text(error_Option_B);
   $('#Option_B').css('border-color', '');
   Option_B = $('#Option_B').val();
  }

  if($('#Option_C').val() == '')
  {
   error_Option_C = 'Last Name is required';
   $('#error_Option_C').text(error_Option_C);
   $('#Option_C').css('border-color', '#cc0000');
   Option_C = '';
  }
  else
  {
   error_Option_C = '';
   $('#error_Option_C').text(error_Option_C);
   $('#Option_C').css('border-color', '');
   Option_C = $('#Option_C').val();
  }


  if($('#Option_D').val() == '')
  {
   error_Option_D = 'Last Name is required';
   $('#error_Option_D').text(error_Option_D);
   $('#Option_D').css('border-color', '#cc0000');
   Option_D = '';
  }
  else
  {
   error_Option_D = '';
   $('#error_Option_D').text(error_Option_D);
   $('#Option_D').css('border-color', '');
   Option_D = $('#Option_D').val();
  }

  if($('#Answer').val() == '')
  {
   error_Answer = 'Last Name is required';
   $('#error_Answer').text(error_Answer);
   $('#Answer').css('border-color', '#cc0000');
   Answer = '';
  }
  else
  {
   error_Answer = '';
   $('#error_Answer').text(error_Answer);
   $('#Answer').css('border-color', '');
   Answer = $('#Answer').val();
  }


  if(error_Question != '' || error_Option_A != '' || error_Option_B != '' || error_Option_C != '' || error_Option_D != ''|| error_Answer != '')
  {
   return false;
  }
  else
  {
   if($('#save').text() == 'Save')
   {
    count = count + 1;
    output = '<tr id="row_'+count+'">';
    output += '<td>'+Question+' <input type="hidden" name="hidden_Question[]" id="Question'+count+'" class="Question" value="'+Question+'" /></td>';
    output += '<td>'+Option_A+' <input type="hidden" name="hidden_Option_A[]" id="Option_A'+count+'" value="'+Option_A+'" /></td>';
    output += '<td>'+Option_B+' <input type="hidden" name="hidden_Option_B[]" id="Option_B'+count+'" value="'+Option_B+'" /></td>';
    output += '<td>'+Option_C+' <input type="hidden" name="hidden_Option_C[]" id="Option_C'+count+'" value="'+Option_C+'" /></td>';
    output += '<td>'+Option_D+' <input type="hidden" name="hidden_Option_D[]" id="Option_D'+count+'" value="'+Option_D+'" /></td>';
    output += '<td>'+Answer+' <input type="hidden" name="hidden_Answer[]" id="Answer'+count+'" value="'+Answer+'" /></td>';
    output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">View</button></td>';
    output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
    output += '</tr>';
    $('#user_data').append(output);
   }
   else
   {
    var row_id = $('#hidden_row_id').val();
    output = '<td>'+Question+' <input type="hidden" name="hidden_Question[]" id="Question'+row_id+'" class="Question" value="'+Question+'" /></td>';
    output += '<td>'+Option_A+' <input type="hidden" name="hidden_Option_A[]" id="Option_A'+row_id+'" value="'+Option_A+'" /></td>';
    output += '<td>'+Option_B+' <input type="hidden" name="hidden_Option_B[]" id="Option_B'+row_id+'" value="'+Option_B+'" /></td>';
    output += '<td>'+Option_C+' <input type="hidden" name="hidden_Option_C[]" id="Option_C'+row_id+'" value="'+Option_C+'" /></td>';
    output += '<td>'+Option_D+' <input type="hidden" name="hidden_Option_D[]" id="Option_D'+row_id+'" value="'+Option_D+'" /></td>';
    output += '<td>'+Answer+' <input type="hidden" name="hidden_Answer[]" id="Answer'+row_id+'" value="'+Answer+'" /></td>';
    output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+row_id+'">View</button></td>';
    output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+row_id+'">Remove</button></td>';
    $('#row_'+row_id+'').html(output);
   }

   $('#user_dialog').dialog('close');
  }
 });

 $(document).on('click', '.view_details', function(){
  var row_id = $(this).attr("id");
  var Question = $('#Question'+row_id+'').val();
  var Option_A = $('#Option_A'+row_id+'').val();
  var Option_B = $('#Option_B'+row_id+'').val();
  var Option_C = $('#Option_C'+row_id+'').val();
  var Option_D = $('#Option_D'+row_id+'').val();
  var Answer = $('#Answer'+row_id+'').val();
  $('#Question').val(Question);
  $('#Option_A').val(Option_A);
  $('#Option_B').val(Option_B);
  $('#Option_C').val(Option_C);
  $('#Option_D').val(Option_D);
  $('#Answer').val(Answer);
  $('#save').text('Edit');
  $('#hidden_row_id').val(row_id);
  $('#user_dialog').dialog('option', 'title', 'Edit Data');
  $('#user_dialog').dialog('open');
 });

 $(document).on('click', '.remove_details', function(){
  var row_id = $(this).attr("id");
  if(confirm("Are you sure you want to remove this row data?"))
  {
   $('#row_'+row_id+'').remove();
  }
  else
  {
   return false;
  }
 });

 $('#action_alert').dialog({
  autoOpen:false
 });

 $('#user_form').on('submit', function(event){
  event.preventDefault();
  var count_data = 0;
  $('.Question').each(function(){
   count_data = count_data + 1;
  });
  if(count_data > 0)
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#user_data').find("tr:gt(0)").remove();
     $('#action_alert').html('<p>Data Inserted Successfully</p>');
     $('#action_alert').dialog('open');
    }
   })
  }
  else
  {
   $('#action_alert').html('<p>Please Add atleast one data</p>');
   $('#action_alert').dialog('open');
  }
 });
 
});  
</script>
