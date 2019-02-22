<?php
require_once('../core/db_connect.php');
 


$position = $_POST['position'];


$i=1;
foreach($position as $k=>$v){
    $sql = "Update menu SET post_order_no=".$i." WHERE id=".$v;
    $connect->query($sql);


	$i++;
}


?>