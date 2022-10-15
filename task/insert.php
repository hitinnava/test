<?php
  include"dbcon.php";
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    } 
          echo $username=$_POST['username'];
          echo $email=$_POST['email'];
          echo $name=$_POST['name'];
          echo $pass=$_POST['password'];
          echo $number=$_POST['number'];
         if(isset($_FILES['Photo']))
        {
          "File".$File=$_FILES['Photo']['tmp_name'];
        }

          if(mysqli_query($con,"INSERT INTO `users` (username,email,phoneNo,password,name) VALUES ('$username','$email','$number','$pass','$name')"))
          {
            echo "Inserted";
      if(isset($_FILES['Photo']))
        {
          $allowed =  array('jpeg','jpg','png');
          $ext = pathinfo($_FILES['txtPhoto']['name'], PATHINFO_EXTENSION);
          if(!in_array($ext,$allowed) )
          {
          echo 'Only  .png, .jpg, .jpeg are allowed';
          }
          if (!file_exists('images'))
          {
          mkdir('images', 0777, true);
          }
          if (!file_exists("images/Boardofdirectors"))
          {
          mkdir("images/Boardofdirectors", 0777, true);
          }
          $uploaddir="images/Boardofdirectors";

          $uploaddirSave="images/Boardofdirectors";
          $uploadLeftSideData = "$uploaddirSave/".$_FILES['txtPhoto']['name'];
          if(move_uploaded_file($_FILES['txtPhoto']['tmp_name'], $uploadLeftSideData))
          {
            //echo "File Uploaded";
            if(mysqli_query($conn,"update tblboardofdirectors set Photo='$uploadLeftSideData' where BoardOfDirectorId='$BoardOfDirectorId'"))
            {
              echo "Updated";
            }
            else
            {
              echo mysqli_error($conn);
            }
          }
        }
          }
          else
          {
            echo mysqli_error($con);
          }
 ?>