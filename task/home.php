<?php 
include('dbcon.php');
include('session.php'); 
$result=mysqli_query($con, " select * from users where user_id = '$session_id' ") or die('Error In Session');
$row=mysqli_fetch_array($result);
 ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style type="text/css">
	.logoutcss{
	margin-right: 50%;
    display: flex;
    align-content: flex-end;
    flex-wrap: wrap;
    flex-direction: column;
	}
</style>
</head>
<body color='black'>
<p style="font-size: 25px;" class="logoutcss"><a href="logout.php" style=" ">Log out</a></p>
  <div class="container-fluid" style="width:800px">
    <form id=""> 
    	<input type="text" class="hidden" id="user_id" >
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
        <label for="username">username</label>
        <input type="text" class="form-control" id="username" placeholder="user name">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary " id="submit2" value="Save" />Submit</button>
    </form>
<?php
include('dbcon.php');
?>
<div id="divRecords">
	
</div>
</div>
</body>
</html>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">


		function DeleteRecord(user_id)
		{
			var c=confirm("Do you want to delete this record");
			if(c)
			{
				$.post("delete.php",{
					Flag:"DeleteRecord",
					user_id:user_id // at this location ie at last parameter of ajax
				},function(data,success){
					alert(data);
					ShowRecords();
				})
			}
		}
		function ShowRecords(){
			$.post("Operations.php",{
				Flag:"ShowRecords"
			},function(data,success){
				//Display the records in div tag
				$("#divRecords").html(data);
			});
		}
		function ShowInEditor(user_id){
			$("#user_id").val($("#tduser_id"+user_id).html());
			$("#name").val($("#tdName"+user_id).html());
			$("#email").val($("#tdemail"+user_id).html());
			$("#number").val($("#tdphone"+user_id).html());
			$("#username").val($("#tdname"+user_id).html());
			$("#exampleInputPassword1").val($("#tdpassword"+user_id).html());
			$("#submit").val("Update");
			$("#name").focus();
		}
		function ResetEditor(){
			$("#user_id").val("");
			$("#name").val("");
			$("#email").val("");
			$("#number").val("");
			$("#username").val("");
			$("#submit").val('Save');
		}
$(document).ready( function () {
	ShowRecords();
		$("#submit2").click(function(e) {
				e.preventDefault();
				$.post("Operations.php",{
					Flag:"Save",
					user_id:$("#user_id").val(),
					name:$("#name").val(),
					email:$("#email").val(),
					username:$("#username").val(),
					number:$("#number").val(),
					pass:$("#exampleInputPassword1").val(),
					//IsMarried:$("#lstIsMarried").val()
				},function(data,success){
					alert(data);
					ShowRecords();
					ResetEditor();
				});
			});
} );
</script>