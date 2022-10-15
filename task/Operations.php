<?php
include('dbcon.php');
$Flag=$_POST["Flag"];
	if($Flag=="Save")
	{
		   $user_id=$_POST['user_id'];
		   $username=$_POST['username'];
           $email=$_POST['email'];
           $name=$_POST['name'];
           $pass=$_POST['pass'];
           $number=$_POST['number'];
           if($user_id==""){
	          if(mysqli_query($con,"INSERT INTO `users` (username,email,phoneNo,password,name) VALUES ('$username','$email','$number','$pass','$name')"))
	          {
	            echo "Inserted";
	          }
	          else
	          {
	            echo mysqli_error($con);
	          }
           }
           else
           {
          	 if(mysqli_query($con,"Update users set name='$name', password='$pass', phoneNo='$number', email='$email', username='$username' where user_id='$user_id' "))
			{
				echo "Updated Successfully";
			}
			else
			{
				echo "Failed to Update - Reason : " . mysqli_error($con);
			}
          }

	}
	if($Flag=="ShowRecords")
	{	
		$rstEmployee=mysqli_query($con,"select * from users ");
		if(mysqli_num_rows($rstEmployee)!=0)
		{
			echo "<table class='table' id='myTable'>
						<thead>
							<tr>
								<th>name</th>
								<th>Email</th>
								<th>Phone No</th>
								<th>Username</th>
								<th>Password</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>";
			while($rwEmployee=mysqli_fetch_array($rstEmployee,MYSQLI_ASSOC))
			{
				$user_id =$rwEmployee["user_id"];
				$email=$rwEmployee["email"];
				$Name=$rwEmployee["name"];
				$phoneNo=$rwEmployee["phoneNo"];
				$name=$rwEmployee["name"];
				$password=$rwEmployee["password"];
				echo "<tr>
						<td class='hidden' id='tduser_id$user_id'>$user_id</td>
						<td id='tdName$user_id'>$Name</td>
						<td id='tdemail$user_id'>$email</td>
						<td id='tdphone$user_id'>$phoneNo</td>
						<td id='tdname$user_id'>$name</td>
						<td id='tdpassword$user_id'>$password</td>
						<td><input type='button' class='btn btn-xs btn-info' value='Edit' onClick='ShowInEditor($user_id);' /></td>
						<td><input type='button' class='btn btn-xs btn-danger' value='Delete' onClick='DeleteRecord($user_id);' /></td>
					</tr>";
			}
			echo "</table>";
		}
		}
?>