<?php
$mysqli = new mysqli("localhost", "root", "", "user-management");
// $id = $_POST['user_id'];
//echo $music_number;

if(isset($_GET['id']))
{
     $sql = "UPDATE `users` SET `banned` = '1' WHERE `users`.`id`=".$_GET['id'];
     $mysqli->query($sql);
	 echo 'Deleted successfully.';
}


