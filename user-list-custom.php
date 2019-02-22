<?php include 'head.php'; ?>
<!-- tes edit-->
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Daftar Siswa </h1>
		<!-- separete -->
    <div class="row">
      <div class="col-8">
        <div class="form-group">
                      <input type="text" id="myInput" onkeyup="myFunction()"  class="form-control" placeholder="Search for names..">
                    </div>
        <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."> -->
      </div>
      <div class="col-2">
        <div class="btn-group">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-globe-americas"></i> New</button>
          <div class="dropdown-menu" style="    top: 6px;">
            <a class="dropdown-item" href="#">Ajukan Mendapat PIP / BSM</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
          </div>
        </div>
      </div>
    </div>
		
		<div class="row">
      
			<div class="col-12">

        <table class="table table-striped table-bordered table-hover" id="myTable">
      <thead>
        <th><input type="checkbox" id="check-all"></th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Address</th>
 
      </thead>
      <form method="POST" action="php/delete-banyak.php">
      <tbody>
      <?php
        include('core/db_connect.php');
 
        $query=mysqli_query($connect,"select * from `siswa`");
        while($row=mysqli_fetch_array($query)){
          ?>
          <tr>
            <td align="center"><input type="checkbox"  class="check-item" value="<?php echo $row['nisn']; ?>" name="nisn[]"></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['rombel']; ?></td>
            <td><?php echo $row['alamat']; ?></td>   
          </tr>
          <?php
        }
 
      ?>
      </tbody>
    </table>
      <a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a> || 
      <button type="submit" id="btn-delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>
      </form>
            
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
<!-- pencarian -->
<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>
<script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    $("#check-all").click(function(){ // Ketika user men-cek checkbox all
      if($(this).is(":checked")) // Jika checkbox all diceklis
        $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
      else // Jika checkbox all tidak diceklis
        $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
    });
    
    $("#btn-delete").click(function(){ // Ketika user mengklik tombol delete
      var confirm = window.confirm("Apakah Anda yakin ingin menghapus data-data ini?"); // Buat sebuah alert konfirmasi
      
      if(confirm) // Jika user mengklik tombol "Ok"
        $("#form-delete").submit(); // Submit form
    });
  });
  </script>
<script src="js/app.js"></script>
</body>

</html>