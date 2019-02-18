<?php
// Include / load file koneksi.php
include "koneksi.php";

// Ambil data yang dikirim dari form
$nis = mysqli_real_escape_string($connect, $_POST['nis']); // Ambil data nis dan masukkan ke variabel nis
$nama = mysqli_real_escape_string($connect, $_POST['nama']); // Ambil data nama dan masukkan ke variabel nama
$jenis_kelamin = mysqli_real_escape_string($connect, $_POST['jenis_kelamin']); // Ambil data jenis_kelamin dan masukkan ke variabel jenis_kelamin
$telp = mysqli_real_escape_string($connect, $_POST['telp']); // Ambil data telp dan masukkan ke variabel telp
$alamat = mysqli_real_escape_string($connect, $_POST['alamat']); // Ambil data alamat dan masukkan ke variabel alamat

//Cek Input data
if($nis!="" && $nama!="" && $jenis_kelamin!="" && $telp!="" && $alamat!=""){
	// Cek apakah user ingin mengubah fotonya atau tidak
	if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
		// Ambil data foto yang dipilih dari form
		$foto = $_FILES['foto']['name'];
		$tmp = $_FILES['foto']['tmp_name'];
		
		// Rename nama fotonya dengan menambahkan tanggal dan jam upload
		$fotobaru = date('dmYHis').$foto;
		
		// Set path folder tempat menyimpan fotonya
		$path = "foto/".$fotobaru;
	
		// Proses upload
		// Cek apakah gambar berhasil diupload atau tidak
		if(move_uploaded_file($tmp, $path)){ // Jika proses upload sukses
			// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
			$sqlcek = mysqli_query($connect, "SELECT * FROM siswa WHERE nis='".$nis."'");
			$data = mysqli_fetch_array($sqlcek); // Ambil data dari hasil eksekusi $sqlcek
			
			// Cek apakah file foto sebelumnya ada di folder foto
			if(is_file("foto/".$data['foto'])) // Jika foto ada
				unlink("foto/".$data['foto']); // Hapus file foto sebelumnya yang ada di folder foto
			
			// Proses ubah ke Database
			mysqli_query($connect, "UPDATE siswa SET nama='".$nama."', jenis_kelamin='".$jenis_kelamin."', telp='".$telp."', alamat='".$alamat."', foto='".$fotobaru."' WHERE nis='".$nis."'");
			
			// Load ulang view.php agar data diubah tadi bisa terubah di tabel pada view.php
			ob_start();
			include "view.php";
			$html = ob_get_contents();
			ob_end_clean();
			
			// Buat variabel reponse yang nantinya akan diambil pada proses ajax ketika sukses
			$response = array(
				'status'=>'sukses', // Set status
				'pesan'=>'Perubahan data dengan NIS : '.$nis.' berhasil disimpan', // Set pesan
				'html'=>$html // Set html
			);
		}else{ // Jika proses upload gagal
			$response = array(
				'status'=>'gagal', // Set status
				'pesan'=>'Gambar gagal untuk diupload', // Set pesan
			);
		}
	}else{ // Jika user tidak menceklis checkbox yang ada di form, lakukan :
		// Proses ubah ke Database
		mysqli_query($connect, "UPDATE siswa SET nama='".$nama."', jenis_kelamin='".$jenis_kelamin."', telp='".$telp."', alamat='".$alamat."' WHERE nis='".$nis."'");
		
		// Load ulang view.php agar data diubah tadi bisa terubah di tabel pada view.php
		ob_start();
		include "view.php";
		$html = ob_get_contents();
		ob_end_clean();
		
		// Buat variabel reponse yang nantinya akan diambil pada proses ajax ketika sukses
		$response = array(
			'status'=>'sukses', // Set status
			'pesan'=>'Data NIS : '.$nis.' berhasil diubah', // Set pesan
			'html'=>$html // Set html
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
