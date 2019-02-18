			<?php include 'head.php'; ?>
			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Members</h1>
					<!-- separete -->
					
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Buttons</h5>
									<h6 class="card-subtitle text-muted">This extension provides a framework with common options that can be used with DataTables.</h6>
								</div>
								<div class="card-body">
									<table id="datatables-buttons" class="table table-striped" style="width:100%">
										<thead>
											<tr>
												<th>Name</th>
												<th>Position</th>
												<th>Office</th>
												<th>Banned</th>
												<th>Start date</th>
												<th>Salary</th>
											</tr>
										</thead>
										<tbody>
											 <?php
        $mysqli = new mysqli("localhost", "root", "", "user-management");
        $sql = "SELECT * FROM users";
        $users = $mysqli->query($sql);
        while($row = $users->fetch_assoc()){

        ?>
										<tr id="<?= $row['id']; ?>">
											<td><a href="php/cetak/cetak-kartu-identitas-user.php?id=<?= $row['id']?>"><?= $row['username']?></a></td>
											<td>System Architect</td>
											<td>Edinburgh</td>
											<td>61</td>
											<td></td>
											<td>
<?php if ($row['banned']==1) { echo "<button class='btn btn-danger btn-sm remove'>Banned</button>"; } else { echo "<button class='btn btn-success btn-sm remove'>Aktif</button>"; } ?>
											 </td>

										</tr>
										<?php } ?>
										</tbody>
										<tfoot>
											<tr>
												<th>Name</th>
												<th>Position</th>
												<th>Office</th>
												<th>Age</th>
												<th>Start date</th>
												<th>Salary</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>

						<script>
						document.addEventListener("DOMContentLoaded", function(event) {
							// Datatables basic
							$('#datatables-basic').DataTable({
								responsive: true
							});
							// Datatables with Buttons
							var datatablesButtons = $('#datatables-buttons').DataTable({
								lengthChange: !1,
								buttons: ["copy", "print"],
								responsive: true
							});
							datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)")
						});
					</script>
						

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