<?php
include('core/db_connect.php');
if($_POST)
	{
		$q=$_POST['search'];
		$sql_res="select * from mhsasia where nama like '%$q%' or nik like '%$q%' order by nik LIMIT 5";
		$run = mysqli_query($connect,$sql_res);
		while($row=mysqli_fetch_array($run))
	{
		$nama=$row['nama'];
		$nik=$row['nik'];
		$b_username='<strong>'.$q.'</strong>';
		$b_email='<strong>'.$q.'</strong>';
		$final_username = str_ireplace($q, $b_username, $nama);
		$final_email = str_ireplace($q, $b_email, $nik);
	?>
	<div class="show" align="left">
		<a href="profil.php?uid=<?php echo $nik; ?>">
	<img src="author.PNG" style="width:40px; height:40px; float:left; margin-right:6px;" /><span class="name"><?php echo $final_username; ?></span>&nbsp;<br/><?php echo $final_email; ?></a><br/><br>
	</div>
	<?php
		}
	}
?>