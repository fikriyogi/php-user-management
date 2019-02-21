<?php
require_once ("../../core/db_connect.php");

$sql = "SELECT * FROM tbl_comment ORDER BY parent_comment_id asc, comment_id desc";

$result = mysqli_query($connect, $sql);
$record_set = array();
while ($row = mysqli_fetch_assoc($result)) {
    array_push($record_set, $row);
}
mysqli_free_result($result);

mysqli_close($connect);
echo json_encode($record_set);
?>