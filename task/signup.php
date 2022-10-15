<!DOCTYPE html>
<html>
<head>
  <title>task</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container" style="margin-top: 100px;width:800px" >
    <form id="formid"> 
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
      <button type="submit" class="btn btn-primary " id="submit">Submit</button>
    </form>
</div>
</body>
</html>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $("#submit").click(function() {

                var name= $("#name").val();
                var number= $("#number").val();
                var username= $("#username").val();
                var password= $("#exampleInputPassword1").val();
                var email = $("#email").val();
                $.ajax({
                    type: "POST",
                    url: "insert.php",
                    data: {name : name , email : email , number : number , username : username , password : password},
                    success: function(data) {
                       alert(data);
                    }
                });

  });
});
</script>