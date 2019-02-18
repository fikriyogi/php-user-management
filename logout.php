<?php
session_start();

include_once 'connect.php';
if(!isset($_SESSION['user']))
{
	header("Location: login.php");
}
else if(isset($_SESSION['user'])!="")
{
	header("Location: index.php");
}

if(isset($_GET['logout']))
{

	$sql = mysqli_query($connect, "UPDATE users SET status='0'  WHERE user_id=".$_SESSION['user']);
	// $logout = mysqli_query($connect, "INSERT INTO log SET jenis_log='logout' and email=".$_SESSION['user']);
	session_destroy();
	unset($_SESSION['user']);
	header("Location: login.php");
}
?>
