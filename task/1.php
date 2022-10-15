<!DOCTYPE html>
<html>
<head>
  <title>task</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container" style="margin-top: 100px;width:800px" >
    <form id="formid"  method='post' action="insert.php"> 
      <div class="form-group">
        <label for="Full Name">Full Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name">
      </div>
      
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="Mobile number">Mobile Number</label>
        <input type="text" class="form-control" id="number" placeholder="Mobile Number">
      </div>
      <div class="form-group">
        <label for="img">uplode image</label>
        <input type="file" class="form-control" id="photo">
      </div>
      <div class="form-group">
        <label for="username">username</label>
        <input type="text" class="form-control" id="username" placeholder="user name">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary " id="submit" value='Save'>Submit</button>
    </form>
</div>
</body>
</html>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

  $('#formid').submit(function(e)
  {
    e.preventDefault();
    var fd = new FormData();
    var file_data = $('input[type="file"]')[0].files; 
      fd.append("photo", file_data[0]);
    var other_data = $('form').serializeArray();
    $.each(other_data,function(key,input)
    {
      fd.append(input.name,input.value);
    });
    fd.append("Flag",$("#submit").val());
  
    $.ajax({
      url: "insert.php",
      data: fd,
      contentType: false,
      processData: false,
      type: 'POST',
      success:function(data, textStatus, jqXHR) 
      {
        alert(data);        
        
        $('#DivRecords').html(data);
        ResetEditor();
      },
      error: function(jqXHR, textStatus, errorThrown) 
      {
        //if fails      
      }
    });
    e.preventDefault(); //STOP default action
  });
});
    function ResetEditor(){
      $("#user_id").val("");
      $("#name").val("");
      $("#email").val("");
      $("#number").val("");
      $("#username").val("");
      $("#submit").val('Save');
    }
</script>