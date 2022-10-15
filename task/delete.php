<?php
include('dbcon.php');
	$user_id=$_POST["user_id"];
		if(mysqli_query($con,"DELETE FROM users where user_id='$user_id'"))
		{
			echo "Successfully Deleted The Record";
		}
		else
		{
			echo "Failed to Delete Record - Reason : " . mysqli_error($con);
		}
?>