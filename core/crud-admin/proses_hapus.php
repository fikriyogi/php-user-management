<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data NIS
$nis = mysqli_real_escape_string($connect, $_POST['nis']);

$sqlcek = mysqli_query($connect, "SELECT * FROM siswa WHERE nis='".$nis."'");
$data = mysqli_fetch_array($sqlcek); // Ambil data dari hasil eksekusi $sqlcek

// Cek apakah file fotonya ada di folder foto
if(is_file("foto/".$data['foto'])) // Jika foto ada
	unlink("foto/".$data['foto']); // Hapus file fotonya yang ada di folder foto

// Query untuk menghapus data siswa berdasarkan NIS yang dikirim
mysqli_query($connect, "DELETE FROM siswa WHERE nis='".$nis."'");

// Load ulang view.php agar data diubah tadi bisa terubah di tabel pada view.php
ob_start();
include "view.php";
$html = ob_get_contents();
ob_end_clean();

// Buat variabel reponse yang nantinya akan diambil pada proses ajax ketika sukses
$response = array(
	'pesan'=>'Data atas NIS : '.$nis.' berhasil dihapus', // Set pesan
	'html'=>$html // Set html
);
echo json_encode($response); // konversi variabel response menjadi JSON
?>
