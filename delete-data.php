<?php
include('core/db_connect.php');
// $id = $_POST['id_dps'];
//echo $music_number;
// $id = $_POST['user_id'];
//echo $music_number;

if(isset($_GET['id']))
{
     $sql = "DELETE FROM `dps` WHERE id=".$_GET['id'];
     $query = mysqli_query($connect, $sql);
	 echo 'Deleted successfully.';
}
