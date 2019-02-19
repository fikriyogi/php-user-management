<?php include 'head.php'; 

if (isset($_POST['upload'])) {

// Baca lokasi file sementar dan nama file dari form (fupload)
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
// $ext = pathinfo($path, PATHINFO_EXTENSION);
$no_surat = $_POST['no_surat'];
// Tentukan folder untuk menyimpan file
$folder = "files/$nama_file";

// tanggal sekarang
// $tgl_upload = date("Ymd");

// Apabila file berhasil di upload
if (move_uploaded_file($lokasi_file,"$folder")){
  echo $msg = "<div class='alert alert-success alert-dismissible' role='alert'>
    <div class='alert-icon'>
        <i class='far fa-fw fa-bell'></i>
    </div>
    <div class='alert-message'>
        <strong><b>$nama_file</b> sukses di upload!</strong> A simple danger alert—check it out!
    </div>

    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
    </button>
</div>";
  
  

  // Masukkan informasi file ke database
  // $konek = mysqli_connect("localhost","root","","cerdas");

  $query = "INSERT INTO upload (nama_file, no_surat, deskripsi, tgl_upload, user)
            VALUES('$nama_file', '$_POST[no_surat]', '$_POST[deskripsi]', CURRENT_TIMESTAMP(), '$_SESSION[user]')";
            
  mysqli_query($connect, $query);
}
else{
  echo $msg = "<div class='alert alert-danger alert-dismissible' role='alert'>
    <div class='alert-icon'>
        <i class='far fa-fw fa-bell'></i>
    </div>
    <div class='alert-message'>
        <strong>File di upload!</strong> A simple danger alert—check it out!
    </div>

    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
    </button>
</div>";
}
}
?>

<!-- hapus file dari database dan folder -->
<!-- $res=mysql_query("SELECT file FROM tbl_uploads WHERE id=".$_GET['remove_id']);
$row=mysql_fetch_array($res);
mysql_query("DELETE FROM tbl_uploads WHERE id=".$_GET['remove_id']);
unlink("uploads/".$row['file']); -->

<!-- tes edit-->
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Surat Menyurat </h1>
		<!-- separete -->
				<form enctype="multipart/form-data" method="POST" action="">
		<div class="row">
			
			<div class="col-8">
				<div class="form-group">
					<label class="form-label">Email address</label>
					<input type="text" class="form-control" name="no_surat"> value="142/SD Negeri/<?= no_surat()?>/<?= date("Y")?>">
				</div>

				<textarea name="deskripsi" data-provide="markdown" rows="14"></textarea>


			</div>
			<div class="col-4">
				<div class="form-group">
					<label class="form-label w-100">File input</label>
					<input type="file" name="fupload">
					<small class="form-text text-muted">Example block-level help text here.</small>
				</div>
				<div class="form-group">
					<label class="form-label">Email address</label>
					<select class="form-control select2" data-toggle="select2">
				            <optgroup label="Alaskan/Hawaiian Time Zone">
				              <option value="AK">Alaska</option>
				              <option value="HI">Hawaii</option>
				            </optgroup>
				            <optgroup label="Pacific Time Zone">
				              <option value="CA">California</option>
				              <option value="NV">Nevada</option>
				              <option value="OR">Oregon</option>
				              <option value="WA">Washington</option>
				            </optgroup>
			          </select>
				</div>

				<div class="form-group">
					<label class="form-label">Single Date Picker</label>
					<input class="form-control" type="text" name="datesingle" />
				</div>

				<div class="form-group">
					<input class="btn btn-primary" type="submit" name="upload" value="Upload">
				</div>

				
			</div>
		</div>
	</form>
		<div class="row">
			<div class="col-12">
				<!-- <?= $msg ?> -->

				<div class="card">
								<div class="card-header">
									<h5 class="card-title">Condensed Table</h5>
									<h6 class="card-subtitle text-muted">Add <code>.table-sm</code> to make tables more compact by cutting cell padding in half.</h6>
								</div>
								<table class="table table-striped table-hover table-sm">
									<thead>
										<tr>
											<th>Operation System</th>
											<th class="text-right">Users</th>
											<th class="text-right">Users</th>
											<th class="text-right">Share</th>
										</tr>
									</thead>
									<tbody>
										<?php
  // $konek = mysqli_connect("localhost","root","","cerdas");
include "core/db_connect.php";

  $query = "SELECT * FROM upload ORDER BY id_upload DESC";
  $hasil = mysqli_query($connect, $query);

  while ($r = mysqli_fetch_array($hasil)){

if ($r['id_upload'] > 0) {
 	
										echo '<tr>
											<td>' . $r["nama_file"] .'</td>
											<td>.' . get_file_extension($r["nama_file"]) .'</td>
											<td class="text-right">' . $r["deskripsi"] .'</td>
											<td class="text-right"><a href="files/' . $r["nama_file"] . '">Download</a></td>
										</tr>';
									} else {
										echo "noting";
									}
									} ?>
									</tbody>
								</table>
							</div>



			</div>

		



		</div>


	</div>
</main>

		<footer class="footer">
			<div class="container-fluid">
				<div class="row text-muted">
					<div class="col-6 text-left">
						<p class="mb-0">
							&copy; <a href="index.html" class="text-muted">Vuze</a>
						</p>
					</div>
					<div class="col-6 text-right">
						<ul class="list-inline">
							<li class="list-inline-item">
								<a class="text-muted" href="#">About us</a>
							</li>
							<li class="list-inline-item">
								<a class="text-muted" href="#">Help</a>
							</li>
							<li class="list-inline-item">
								<a class="text-muted" href="#">Contact</a>
							</li>
							<li class="list-inline-item">
								<a class="text-muted" href="#">Terms & Conditions</a>
							</li>
						</ul>
					</div>

				</div>
			</div>
		</footer>
	</div>
</div>
<!-- Load Font Awesome's CSS for Bootstrap Markdown pseudo element icons -->
					<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
					 crossorigin="anonymous">

<script>
						document.addEventListener("DOMContentLoaded", function(event) {
							// Select2
							$('.select2').each(function() {
								$(this)
									.wrap('<div class="position-relative"></div>')
									.select2({
										placeholder: 'Select value',
										dropdownParent: $(this).parent()
									});
							})
							// Daterangepicker
							$('input[name="daterange"]').daterangepicker({
								opens: 'left'
							});
							$('input[name="datetimes"]').daterangepicker({
								timePicker: true,
								opens: 'left',
								startDate: moment().startOf('hour'),
								endDate: moment().startOf('hour').add(32, 'hour'),
								locale: {
									format: 'M/DD hh:mm A'
								}
							});
							$('input[name="datesingle"]').daterangepicker({
								singleDatePicker: true,
								showDropdowns: true
							});
							var start = moment().subtract(29, 'days');
							var end = moment();

							function cb(start, end) {
								$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
							}
							$('#reportrange').daterangepicker({
								startDate: start,
								endDate: end,
								ranges: {
									'Today': [moment(), moment()],
									'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
									'Last 7 Days': [moment().subtract(6, 'days'), moment()],
									'Last 30 Days': [moment().subtract(29, 'days'), moment()],
									'This Month': [moment().startOf('month'), moment().endOf('month')],
									'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
								}
							}, cb);
							cb(start, end);
						});
					</script>
<!-- Ajax Delete -->
<script type="text/javascript">
  $(".remove").click(function(){
   var id = $(this).parents("tr").attr("id");


   if(confirm('Are you sure to remove this record ?'))
   {
       $.ajax({
          url: 'banned-users.php',
          type: 'GET',
          data: {id: id},
          error: function() {
             alert('Something is wrong');
          },
          success: function(data) {
               $("#"+id).remove();
               alert("Record removed successfully");  
          }
       });
   }
});

</script>
<script src="js/app.js"></script>
</body>

</html>