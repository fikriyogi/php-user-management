
<?php
include "../core/db_connect.php";
 
	if(isset($_POST['nisn'])){
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
 
?>