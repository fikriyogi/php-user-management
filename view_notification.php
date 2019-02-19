<?php
$con = mysqli_connect("localhost", "root", "", "user-management");
if(isset($_POST['view'])){
// $con = mysqli_connect("localhost", "root", "", "notif");
if($_POST["view"] != '')
{
   $update_query = "UPDATE users SET status = 1 WHERE status=0";
   mysqli_query($con, $update_query);
}
$query = "SELECT * FROM users ORDER BY id DESC LIMIT 5";
$result = mysqli_query($con, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{
  $output .= "
  <a href='#' class='list-group-item'>
										<div class='row no-gutters align-items-center'>
											<div class='col-2'>
												<img src='img/avatars/avatar-5.jpg' class='avatar img-fluid rounded-circle' alt='Kathy Davis'>
											</div>
											<div class='col-10 pl-2'>
												<div class='text-dark'>". $row['username'] . "</div>
												<div class='text-muted small mt-1'>". $row['email'] . "</div>
												<div class='text-muted small mt-1'>15m ago</div>
											</div>
										</div>
									</a>
  ";
}
}
else{
    $output .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
}
$status_query = "SELECT * FROM users WHERE status=0";
$result_query = mysqli_query($con, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
echo json_encode($data);
}
?>