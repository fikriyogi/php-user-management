<?php
// Include / load file koneksi.php
include "koneksi.php";

// Ambil data yang dikirim dari form
$nis = mysqli_real_escape_string($connect, $_POST['nis']); // Ambil data nis dan masukkan ke variabel nis
$nama = mysqli_real_escape_string($connect, $_POST['nama']); // Ambil data nama dan masukkan ke variabel nama
$jenis_kelamin = mysqli_real_escape_string($connect, $_POST['jenis_kelamin']); // Ambil data jenis_kelamin dan masukkan ke variabel jenis_kelamin
$telp = mysqli_real_escape_string($connect, $_POST['telp']); // Ambil data telp dan masukkan ke variabel telp
$alamat = mysqli_real_escape_string($connect, $_POST['alamat']); // Ambil data alamat dan masukkan ke variabel alamat
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;

// Set path folder tempat menyimpan fotonya
$path = "foto/".$fotobaru;

//Cek Input data kosong atau tidak
if($nis!="" && $nama!="" && $jenis_kelamin!="" && $telp!="" && $alamat!=""){
	if(strlen($nis)==10){
		// Proses upload
		// Cek apakah gambar berhasil diupload atau tidak
		if(move_uploaded_file($tmp, $path)){ // Jika proses upload sukses
			// Proses simpan ke Database
			mysqli_query($connect, "INSERT INTO siswa VALUES('".$nis."','".$nama."','".$jenis_kelamin."','".$telp."','".$alamat."','".$fotobaru."')");
			
			// Load ulang view.php agar data yang baru bisa muncul di tabel pada view.php
			ob_start();
			include "view.php";
			$html = ob_get_contents();
			ob_end_clean();
			
			// Buat variabel reponse yang nantinya akan diambil pada proses ajax ketika sukses
			$response = array(
				'status'=>'sukses', // Set status
				'pesan'=>'Data atas NIS : '.$nis.' berhasil disimpan', // Set pesan
				'html'=>$html // Set html
			);
		}else{ // Jika proses upload gagal
			$response = array(
				'status'=>'gagal', // Set status
				'pesan'=>'Gambar gagal untuk diupload', // Set pesan
			);
		}
	}else{
		$response = array(
			'status'=>'gagal', // Set status
			'pesan'=>'NIS Harus 10 digit', // Set pesan
		);
	}
}else{ // Jika Data Inputan Kosong
	$response = array(
		'status'=>'gagal', // Set status
		'pesan'=>'Data Tidak Boleh Kosong', // Set pesan
	);
}

echo json_encode($response); // konversi variabel response menjadi JSON
?>
