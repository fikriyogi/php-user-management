
<?php
include "../core/db_connect.php";
 
	if(isset($_POST['btn-delete'])){
		foreach ($_POST['nisn'] as $nisn):
			mysqli_query($connect,"delete from siswa where nisn='$nisn'");
		endforeach;
 
		header('location:../user-list-custom.php');
	}
	else{
		?>
		<script>
			window.alert('Please check user to Delete');
			window.location.href='../user-list-custom.php';
		</script>
		<?php
	}

	if(isset($_POST['btn-bsm'])){
		foreach ($_POST['nisn'] as $nisn):
			mysqli_query($connect,"UPDATE `siswa` SET `thn_bsm` = '2018-12-12', bsm='1' WHERE `siswa`.`nisn` = '$nisn'");
		endforeach;
 
		header('location:../user-list-custom.php');
	}
	else{
		?>
		<script>
			window.alert('Please check user to Delete');
			window.location.href='../user-list-custom.php';
		</script>
		<?php
	}

	if(isset($_POST['btn-batal-bsm'])){
		foreach ($_POST['nisn'] as $nisn):
			mysqli_query($connect,"UPDATE `siswa` SET `thn_bsm` = '0000-00-00', bsm='0' WHERE `siswa`.`nisn` = '$nisn'");
		endforeach;
 
		header('location:../user-list-custom.php');
	}
	else{
		?>
		<script>
			window.alert('Please check user to Delete');
			window.location.href='../user-list-custom.php';
		</script>
		<?php
	}

	// tambah menu
	if(isset($_POST['tambah-menu'])){

		$title = $_POST['title'];
		$link = $_POST['link'];
		$parent = $_POST['parent'];
		$post_order_no = $_POST['post_order_no'];

		$sql=mysqli_query($connect,"INSERT INTO `menu` (`id`, `title`, `link`, `parent`, `post_order_no`) VALUES (NULL, '$title', '$link', '$parent', '$post_order_no');");
		
 
		header('location:../menu.php');
	}
 
?>