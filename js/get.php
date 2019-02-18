<?php
function total() {
	$connect = mysqli_connect('localhost', 'root', '', 'sistem_informasi_pemerintahan');
	$sql = "SELECT count(*) as total from siswa";
	$query = mysqli_query($connect, $sql);
	$data = mysqli_fetch_assoc($query);
	echo $data['total'];
}