<?php include 'head.php'; ?>
<!-- tes edit-->
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Menu </h1>
		<!-- separete -->
		
			<form method="POST" action="php/action.php">
		<div class="row">
			<div class="col-4">
				<div class="card">
					
					<div class="card-header">
						<h5 class="card-title">Add Menu</h5>
						<h6 class="card-subtitle text-muted">
					</div>
					<div class="card-body">
<?php
include 'core/db_connect.php';
$id = $_GET['edit']; 
$query=mysqli_query($connect,"SELECT * FROM menu WHERE id='$id'");
        while($r=mysqli_fetch_array($query)){ 
?>
<input type="hidden" name="id" value="<?= $r['id']; ?>">

						<div class="form-group">
							<label class="form-label">Title</label>
							<input type="text" class="form-control" name="title" value="<?= $r['title']; ?>">
						</div>

						<div class="form-group">
							<label class="form-label">Link</label>
							<input type="text" class="form-control" name="link" value="<?= $r['link']; ?>">
						</div>
						<div class="form-group">
							<label class="form-label">Parent</label>
							<input type="text" class="form-control" name="parent" value="<?= $r['parent']; ?>">
						</div>
						<div class="form-group">
							<label class="form-label">Order</label>
							<input type="text" class="form-control" name="post_order_no" value="<?= $r['post_order_no']; ?>">
						</div>
						<div class="form-group">
							<label class="form-label">Email address</label>
							<select class="form-control select2" data-toggle="select2">
								<optgroup label="Alaskan/Hawaiian Time Zone">
									<option value="AK">Alaska</option>
									<option value="HI">Hawaii</option>
								</optgroup>
							</select>
						</div>

						<button type="submit" id="edit-menu" name="edit-menu" class="btn btn-primary"><span class="glyphicon glyphicon-trash"></span> Edit</button>
						
							<?php } ?>			

					</div>
				</div>
			
			</div>

		

		</div>
	</form>

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
<!-- select2 -->
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
<!-- menu order -->
<script type="text/javascript">
    $( ".row_position" ).sortable({
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            $('.row_position>tr').each(function() {
                selectedData.push($(this).attr("id"));
            });
            updateOrder(selectedData);
        }
    });


    function updateOrder(data) {
        $.ajax({
            url:"php/sort-menu.php",
            type:'post',
            data:{position:data},
            success:function(){
                alert('your change successfully saved');
            }
        })
    }
</script>

<script src="js/app.js"></script>
</body>

</html>