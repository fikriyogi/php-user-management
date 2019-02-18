$(document).ready(function(){
	// Sembunyikan loading simpan, loading ubah, loading hapus, pesan error, pesan sukes, dan tombol reset
	$("#loading-simpan, #loading-ubah, #loading-hapus, #pesan-error, #pesan-sukses, #btn-reset").hide();
	
	$('#datatable-responsive').DataTable();
	
	// validasi data tidak boleh kosong
	// nim
	$('#error-nim-1').hide();
	$('#error-nim-2').hide();
	$('#error-nim-3').hide();
	$('#icon-nim-success').hide();
	$('#icon-nim-error').hide();
	$('#nis').blur(function(){
		nis = $('#nis').val();
		if(nis===""){
			$('#form-nis').addClass("has-error");
			$('#form-nis').addClass("has-feedback");
			$('#error-nim-1').show();
			$('#error-nim-2').hide();
			$('#error-nim-3').hide();
			$('#icon-nim-success').hide();
			$('#icon-nim-error').show();
		}else{
			if(nis.match(/^[0-9]+$/)){
				if(nis.length > 9){
					$('#form-nis').removeClass("has-error");
					$('#form-nis').addClass("has-success");
					$('#form-nis').addClass("has-feedback");
					$('#error-nim-1').hide();
					$('#error-nim-2').hide();
					$('#error-nim-3').hide();
					$('#icon-nim-success').show();
					$('#icon-nim-error').hide();
				}else{
					$('#form-nis').addClass("has-error");
					$('#form-nis').addClass("has-feedback");
					$('#error-nim-1').hide();
					$('#error-nim-2').hide();
					$('#error-nim-3').show();
					$('#icon-nim-success').hide();
					$('#icon-nim-error').show();
				}
			}else{
				$('#form-nis').addClass("has-error");
				$('#form-nis').addClass("has-feedback");
				$('#error-nim-1').hide();
				$('#error-nim-2').show();
				$('#error-nim-3').hide();
				$('#icon-nim-success').hide();
				$('#icon-nim-error').show();
			}
		}
	});
	
	// nama
	$('#error-nama-1').hide();
	$('#error-nama-2').hide();
	$('#icon-nama-success').hide();
	$('#icon-nama-error').hide();
	$('#nama').blur(function(){
		nama = $('#nama').val();
		if(nama===""){
			$('#form-nama').addClass("has-error");
			$('#form-nama').addClass("has-feedback");
			$('#error-nama-1').show();
			$('#error-nama-2').hide();
			$('#icon-nama-success').hide();
			$('#icon-nama-error').show();
		}else{
			if(nama.match(/^[a-z A-Z]+$/)){
				$('#form-nama').removeClass("has-error");
				$('#form-nama').addClass("has-success");
				$('#form-nama').addClass("has-feedback");
				$('#error-nama-1').hide();
				$('#error-nama-2').hide();
				$('#icon-nama-success').show();
				$('#icon-nama-error').hide();
			}else{
				$('#form-nama').addClass("has-error");
				$('#form-nama').addClass("has-feedback");
				$('#error-nama-1').hide();
				$('#error-nama-2').show();
				$('#icon-nama-success').hide();
				$('#icon-nama-error').show();
			}
		}
	});
	
	// Jenis Kelamin
	$('#error-jenis_kelamin-1').hide();
	$('#jenis_kelamin').change(function(){
		jenis_kelamin = $('#jenis_kelamin').val();
		if(jenis_kelamin===""){
			$('#form-jenis_kelamin').addClass("has-error");
			$('#error-jenis_kelamin-1').show();
		}else{
			$('#form-jenis_kelamin').removeClass("has-error");
			$('#form-jenis_kelamin').addClass("has-success");
			$('#error-jenis_kelamin-1').hide();
		}
	});
	
	// telp
	$('#error-telp-1').hide();
	$('#error-telp-2').hide();
	$('#icon-telp-success').hide();
	$('#icon-telp-error').hide();
	$('#telp').blur(function(){
		telp = $('#telp').val();
		if(telp===""){
			$('#form-telp').addClass("has-error");
			$('#form-telp').addClass("has-feedback");
			$('#error-telp-1').show();
			$('#error-telp-2').hide();
			$('#icon-telp-success').hide();
			$('#icon-telp-error').show();
		}else{
			if(telp.match(/^[0-9]+$/)){
				$('#form-telp').removeClass("has-error");
				$('#form-telp').addClass("has-success");
				$('#form-telp').addClass("has-feedback");
				$('#error-telp-1').hide();
				$('#error-telp-2').hide();
				$('#icon-telp-success').show();
				$('#icon-telp-error').hide();
			}else{
				$('#form-telp').addClass("has-error");
				$('#form-telp').addClass("has-feedback");
				$('#error-telp-1').hide();
				$('#error-telp-2').show();
				$('#icon-telp-success').hide();
				$('#icon-telp-error').show();
			}
		}
	});
	
	// alamat
	$('#error-alamat-1').hide();
	$('#error-alamat-2').hide();
	$('#icon-alamat-success').hide();
	$('#icon-alamat-error').hide();
	$('#alamat').blur(function(){
		alamat = $('#alamat').val();
		if(alamat===""){
			$('#form-alamat').addClass("has-error");
			$('#form-alamat').addClass("has-feedback");
			$('#error-alamat-1').show();
			$('#error-alamat-2').hide();
			$('#icon-alamat-success').hide();
			$('#icon-alamat-error').show();
		}else{
			$('#form-alamat').removeClass("has-error");
			$('#form-alamat').addClass("has-success");
			$('#form-alamat').addClass("has-feedback");
			$('#error-alamat-1').hide();
			$('#error-alamat-2').hide();
			$('#icon-alamat-success').show();
			$('#icon-alamat-error').hide();
		}
	});
	
	// End Validasi
	
	$("#tutup").click(function(){
		$('#error-nim-1').hide();
		$('#error-nim-2').hide();
		$('#icon-nim-success').hide();
		$('#icon-nim-error').hide();
		
		$('#form-nis').removeClass("has-error");
		$('#form-nis').removeClass("has-success");
		$('#form-nis').removeClass("has-feedback");
		
		$('#error-nama-1').hide();
		$('#error-nama-2').hide();
		$('#icon-nama-success').hide();
		$('#icon-nama-error').hide();
		
		$('#form-nama').removeClass("has-error");
		$('#form-nama').removeClass("has-success");
		$('#form-nam').removeClass("has-feedback");
		
		$('#error-jenis_kelamin-1').hide();
		$('#form-jenis_kelamin').removeClass("has-error");
		$('#form-jenis_kelamin').removeClass("has-success");
		
		$('#error-telp-1').hide();
		$('#error-telp-2').hide();
		$('#icon-telp-success').hide();
		$('#icon-telp-error').hide();
		
		$('#form-telp').removeClass("has-error");
		$('#form-telp').removeClass("has-success");
		$('#form-telp').removeClass("has-feedback");
		
		$('#error-alamat-1').hide();
		$('#error-alamat-2').hide();
		$('#icon-alamat-success').hide();
		$('#icon-alamat-error').hide();
		
		$('#form-alamat').removeClass("has-error");
		$('#form-alamat').removeClass("has-success");
		$('#form-alamat').removeClass("has-feedback");
	});
	
	$("#btn-tambah").click(function(){ // Ketika tombol tambah diklik
		$("#btn-ubah, #checkbox_foto").hide(); // Sembunyikan tombol ubah dan checkbox foto
		$("#btn-simpan").show(); // Munculkan tombol simpan
		
		// Set judul modal dialog menjadi Form Simpan Data
		$("#modal-title").html("Form Simpan data");
	});
	
	$("#btn-simpan").click(function(){ // Ketika tombol simpan di klik
		// Buat variabel data untuk menampung data hasil input dari form
		var data = new FormData();
		
		data.append('nis', $("#nis").val()); // Ambil data nis
		data.append('nama', $("#nama").val()); // Ambil data nama
		data.append('jenis_kelamin', $("#jenis_kelamin").val()); // Ambil data jenis kelamin
		data.append('telp', $("#telp").val()); // Ambil data telepon
		data.append('alamat', $("#alamat").val()); // Ambil data alamat
		
		// Ambil data foto yang dipilih pada form, dan masukkan ke variabel data
		data.append('foto', $("#foto")[0].files[0]);
		
		$("#loading-simpan").show(); // Munculkan loading simpan
		
		$.ajax({
			url: 'proses_simpan.php', // File tujuan
			type: 'POST', // Tentukan type nya POST atau GET
			data: data, // Set data yang akan dikirim
			processData: false,
			contentType: false,
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil
				$("#loading-simpan").hide(); // Sembunyikan loading simpan
				
				if(response.status == "sukses"){ // Jika Statusnya = sukses
					// Ganti isi dari div view dengan view yang diambil dari proses_simpan.php
					$("#view").html(response.html);
					
					/*
					 * Ambil pesan suksesnya dan set ke div pesan-sukses
					 * Lalu munculkan div pesan-sukes nya
					 * Setelah 10 detik, sembunyikan kembali pesan suksesnya
					 */
					$("#pesan-sukses").html(response.pesan).fadeIn().delay(10000).fadeOut();
					
					$("#form input, #form select").val(""); // Untuk meng-clear isian pada form
					$("#form-modal").modal('hide'); // Close / Tutup Modal Dialog
				}else{ // Jika statusnya = gagal
					/*
					 * Ambil pesan errornya dan set ke div pesan-error
					 * Lalu munculkan div pesan-error nya
					 */
					$("#pesan-error").html(response.pesan).show();
				}
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
				alert(xhr.responseText); // munculkan alert
			}
		});
	});
	
	$("#btn-ubah").click(function(){ // Ketika tombol ubah di klik
		// Buat variabel data untuk menampung data hasil input dari form
		var data = new FormData();
		
		data.append('nis', $("#nis").val()); // Ambil data nis
		data.append('nama', $("#nama").val()); // Ambil data nama
		data.append('jenis_kelamin', $("#jenis_kelamin").val()); // Ambil data jenis kelamin
		data.append('telp', $("#telp").val()); // Ambil data telepon
		data.append('alamat', $("#alamat").val()); // Ambil data alamat
		
		// Cek apakah checkbox ubah foto di ceklis
		if($("#ubah_foto").is(":checked")) // Jika di ceklis
			data.append('ubah_foto', $("#ubah_foto").val()); // Ambil data ubah foto (dari checkbox foto)
		
		// Ambil data foto yang dipilih pada form, dan masukkan ke variabel data
		data.append('foto', $("#foto")[0].files[0]);
		
		$("#loading-ubah").show(); // Munculkan loading ubah
		
		$.ajax({
			url: 'proses_ubah.php', // File tujuan
			type: 'POST', // Tentukan type nya POST atau GET
			data: data, // Set data yang akan dikirim
			processData: false,
			contentType: false,
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil
				$("#loading-ubah").hide(); // Sembunyikan loading ubah
				
				if(response.status == "sukses"){ // Jika Statusnya = sukses
					// Ganti isi dari div view dengan view yang diambil dari proses_ubah.php
					$("#view").html(response.html);
					
					/*
					 * Ambil pesan suksesnya dan set ke div pesan-sukses
					 * Lalu munculkan div pesan-sukes nya
					 * Setelah 10 detik, sembunyikan kembali pesan suksesnya
					 */
					$("#pesan-sukses").html(response.pesan).fadeIn().delay(10000).fadeOut();
					
					$("#form input, #form select").val(""); // Untuk meng-clear isian pada form
					$("#form-modal").modal('hide'); // Close / Tutup Modal Dialog
				}else{ // Jika statusnya = gagal
					/*
					 * Ambil pesan errornya dan set ke div pesan-error
					 * Lalu munculkan div pesan-error nya
					 */
					$("#pesan-error").html(response.pesan).show();
				}
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
				alert(xhr.responseText); // Munculkan alert
			}
		});
	});
	
	$("#btn-hapus").click(function(){ // Ketika tombol hapus di klik
		// Buat variabel data untuk menampung data hasil input dari form
		var data = new FormData();
		data.append('nis', $("#data-nis").val()); // Ambil data nis
		
		$("#loading-hapus").show(); // Munculkan loading hapus
		
		$.ajax({
			url: 'proses_hapus.php', // File tujuan
			type: 'POST', // Tentukan type nya POST atau GET
			data: data, // Set data yang akan dikirim
			processData: false,
			contentType: false,
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil
				$("#loading-hapus").hide(); // Sembunyikan loading hapus
				
				// Ganti isi dari div view dengan view yang diambil dari proses_hapus.php
				$("#view").html(response.html);
				
				/*
				 * Ambil pesan suksesnya dan set ke div pesan-sukses
				 * Lalu munculkan div pesan-sukes nya
				 * Setelah 10 detik, sembunyikan kembali pesan suksesnya
				 */
				$("#pesan-sukses").html(response.pesan).fadeIn().delay(10000).fadeOut();
				
				$("#delete-modal").modal('hide'); // Close / Tutup Modal Dialog
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
				alert("ERROR : "+xhr.responseText); // Munculkan alert
			}
		});
	});
	
	$('#form-modal').on('hidden.bs.modal', function (e){ // Ketika Modal Dialog di Close / tertutup
		$("#btn-reset").click(); // Klik tombol reset agar form kembali bersih
		$("#nis").removeAttr('readonly'); // Enable textbox nis
		
	});
});
