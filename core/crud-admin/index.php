<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Data Siswa</title>

		<!-- Load File bootstrap.min.css yang ada difolder css -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Load File bootstrap.min.css yang ada difolder css -->
		<link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
		<!-- Load File bootstrap.min.css yang ada difolder css -->
		<link href="css/responsive.bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style>
		.align-middle{
			vertical-align: middle !important;
		}
		</style>
	</head>
	<body>
		<!-- Membuat Menu Header / Navbar -->
		<nav class="navbar navbar-inverse" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#" style="color: white;"><b>Manajemen Data Siswa</b></a>
				</div>
				<p class="navbar-text navbar-right hidden-xs">
					<a href="http://www.mynotescode.com" style="color: white;" class="navbar-link">www.mynotescode.com</a>
				</p>
			</div>
		</nav>
		
		<div style="padding: 0 15px;">
			<button type="button" id="btn-tambah" data-toggle="modal" data-target="#form-modal" class="btn btn-success pull-right">
				<span class="glyphicon glyphicon-plus"></span> &nbsp;Tambah Data
			</button>
			<h2>Data Siswa</h2>	
			
			<div id="pesan-sukses" class="alert alert-success"></div>
			<hr>
			<!--
			-- Buat sebuah div dengan id="view" yang digunakan untuk menampung data 
			-- yang ada pada tabel siswa di database
			-->
			<div id="view"><?php include "view.php"; ?></div>
		</div>
		
		<!-- 
		-- Membuat sebuah tag div untuk Modal Dialog untuk Form Tambah dan Ubah
		-- Beri id "form-modal" untuk tag div tersebut
		-->
		<div id="form-modal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
						<h4 class="modal-title">
							<!-- Beri id "modal-title" untuk tag span pada judul modal -->
							<span id="modal-title"></span>
						</h4>
					</div>
					<div class="modal-body">
						<!-- Beri id "pesan-error" untuk menampung pesan error -->
						<div id="pesan-error" class="alert alert-danger"></div>
						
						<!-- Beri id "form" untuk tag form -->
						<form id="form">
							<!-- 
							-- Beri id untuk masing-masing form input
							-- textbox nis : id="nis"
							-- textbox nama : id="nama"
							-- combobox jenis kelamin : id="jenis_kelamin"
							-- textbox no.telepon : id="telp"
							-- textarea alamat : id="alamat"
							-- checkbox foto : id="checkbox_foto"
							-- input file foto : id="foto"
							-->
							<div class="form-group" id="form-nis">
								<label>NIS</label>
								<input type="text" class="form-control" id="nis" name="nis" placeholder="NIS" maxlength="10">
								<span id="error-nim-1" class="help-block">NIS Tidak Boleh Kosong</span>
								<span id="error-nim-2" class="help-block">NIS Harus Menggunakan Angka</span>
								<span id="error-nim-3" class="help-block">NIS Harus 10 digit</span>
								<span id="icon-nim-success" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
								<span id="icon-nim-error" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
							</div>
							<div class="form-group" id="form-nama">
								<label>Nama</label>
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" maxlength="50">
								<span id="error-nama-1" class="help-block">Nama Tidak Boleh Kosong</span>
								<span id="error-nama-2" class="help-block">Nama Harus Menggunakan Hurup</span>
								<span id="icon-nama-success" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
								<span id="icon-nama-error" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
							</div>
							<div class="form-group" id="form-jenis_kelamin">
								<label>Jenis Kelamin</label>
								<select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
									<option value="">Pilih</option>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
								<span id="error-jenis_kelamin-1" class="help-block">Jenis Kelamin Tidak Boleh Kosong</span>
							</div>
							<div class="form-group" id="form-telp">
								<label>No. Telepon</label>
								<input type="text" class="form-control" id="telp" name="telp" placeholder="No. Telepon" maxlength="15">
								<span id="error-telp-1" class="help-block">No. Telepon Tidak Boleh Kosong</span>
								<span id="error-telp-2" class="help-block">No. Telepon Harus Menggunakan Angka</span>
								<span id="icon-telp-success" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
								<span id="icon-telp-error" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
							</div>
							<div class="form-group" id="form-alamat">
								<label>Alamat</label>
								<textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat"></textarea>
								<span id="error-alamat-1" class="help-block">Alamat Tidak Boleh Kosong</span>
								<span id="error-alamat-2" class="help-block">Alamat Harus Menggunakan Angka</span>
								<span id="icon-alamat-success" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
								<span id="icon-alamat-error" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
							</div>
							<div class="form-group" id="form-alamat">
								<label>Foto</label>
								<div id="checkbox_foto">
									<input type="checkbox" id="ubah_foto" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto
								</div>
								<input type="file" class="form-control" id="foto">
							</div>
							<button type="reset" id="btn-reset"></button>
						</form>
					</div>
					<div class="modal-footer">
						<!-- Beri id "loading-simpan" untuk loading ketika klik tombol simpan -->
						<div id="loading-simpan" class="pull-left">
							<b>Sedang menyimpan...</b>
						</div>
						
						<!-- Beri id "loading-ubah" untuk loading ketika klik tombol ubah -->
						<div id="loading-ubah" class="pull-left">
							<b>Sedang mengubah...</b>
						</div>
						
						<!-- Beri id "btn-simpan" untuk tombol simpan nya -->
						<button type="button" class="btn btn-primary" id="btn-simpan">Simpan</button>
						
						<!-- Beri id "btn-ubah" untuk tombol simpan nya -->
						<button type="button" class="btn btn-primary" id="btn-ubah">Simpan</button>
						
						<button type="button" id="tutup" class="btn btn-default" data-dismiss="modal">Batal</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- 
		-- Membuat sebuah tag div untuk Modal Dialog untuk Form Tambah dan Ubah
		-- Beri id "form-modal" untuk tag div tersebut
		-->
		<div id="delete-modal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
						<h4 class="modal-title">
							Konfirmasi
						</h4>
					</div>
					<div class="modal-body">
						<!--
						-- Beri id "data-nis" untuk textbox nis yang digunakan untuk menampung
						-- data nis yang akan dihapus
						-->
						<input type="hidden" id="data-nis">
						
						Apakah anda <b>NIM : <span id="txtnis"></span></b> yakin ingin menghapus data ini?
					</div>
					<div class="modal-footer">
						<!-- Beri id "loading-hapus" untuk loading ketika klik tombol hapus -->
						<div id="loading-hapus" class="pull-left">
							<b>Sedang meghapus...</b>
						</div>
						
						<!-- Beri id "btn-hapus" untuk tombol hapus nya -->
						<button type="button" class="btn btn-primary" id="btn-hapus">Ya</button>
						
						<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Load File jquery.min.js yang ada difolder js -->
		<script src="js/jquery.min.js"></script>
		
		<!-- Load File bootstrap.min.js yang ada difolder js -->
		<script src="js/bootstrap.min.js"></script>
		
		<!-- Load File jquery.dataTables.min.js yang ada difolder js -->
		<script src="js/datatables.min.js"></script>
		<!-- Load File dataTables.responsive.min.js yang ada difolder js -->
		<script src="js/dataTables.responsive.min.js"></script>
		<!-- Load File jquery.dataTables.min.js yang ada difolder js -->
		<script src="js/dataTables.bootstrap.min.js"></script>
		
		<!-- Load file ajax.js yang ada di folder js -->
		<script src="js/ajax.js"></script>
	</body>
</html>

