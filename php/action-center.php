<?php
include '../core/db_connect.php';
// Add User
if(isset($_POST['btn-add-user']))
{
	$uname = mysqli_real_escape_string($connect, $_POST['uname']);
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$upass = md5(mysqli_real_escape_string($connect, $_POST['pass']));
	
	if(mysqli_query($connect, "INSERT INTO users(username,email,password) VALUES('".$uname."','".$email."','".$upass."')"))
	{
            $msg = 'Congratulation you have successfully registered.';       
	}
	else
	{
            $msg = 'Error while registering you...';
	}
}

