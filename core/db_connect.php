 <?php 

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "user-management";

$connect = new Mysqli($servername, $username, $password, $dbname);

if($connect->connect_error) {
	die("Connection Failed : " . $connect->error);
} 


?> 

<?php
ob_start(); //ditambahkan untuk mengabaikan pengiriman header, berlaku juga untuk mengabaikan pesan error header
$host="localhost";
$user="root";
$pass="";
$db="user-management";
$connect=mysqli_connect($host,$user,$pass,$db);
?>
