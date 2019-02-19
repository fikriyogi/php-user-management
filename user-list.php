			<?php include 'head.php'; ?>
			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Members</h1>

					<div class="row">
						<div class="col-12">
							<!-- Control buttons -->
							<div id="myBtnContainer">
  <button class="btn active" onclick="filterSelection('all')"> Show all</button>
              
								<?php 
								$sql = mysqli_query($connect, "SELECT * FROM dpsa");
								while($row=mysqli_fetch_array($sql)) {
								?>
							  <button class="btn " onclick="filterSelection('<?= $row['no_kk']?>')"> <?= $row['no_kk']?></button>
							<?php } ?>
          
							</div>

							<!-- The filterable elements. Note that some have multiple class names (this can be used if they belong to multiple categories) -->
							
							  <!-- <div class="filterDiv <?= $row['no_kk']?>"><?= $row['nama']?></div> -->
							
						</div>
					</div>

					<div class="row">
								<?php 
								$sql = mysqli_query($connect, "SELECT * FROM dpsa");
								while($row=mysqli_fetch_array($sql)) {
								?>
						<div class="col-md-4 filterDiv <?= $row['no_kk']?>">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0"><?= $row['nama']?></h5>
								</div>
								<div class="card-body">
									<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
									<a href="#" class="card-link">Card link</a>
									<a href="#" class="card-link">Another link</a>
								</div>
							</div>
						</div>
					<?php } ?>
					</div>


					<!-- separete -->
					<div class="row">
						<div class="col-4">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Hoverable Rows</h5>
									<h6 class="card-subtitle text-muted">Below you can view members for the site below.</h6>
								</div>
								<div class="widget-body">
                            <ul class="widget-chat-list">
                                <li>
                                    <a href="#" data-toggle="chat-detail">
                                        <div class="chat-image">
                                            <img src="img/avatars/user_1.jpg" alt="" />
                                        </div>
                                        <div class="chat-info has-new">
                                            <h4>Jengo Chima (1)</h4>
                                            <p>
                                                Aliquam erat volutpat. Etiam vulputate arcu feugiat ante imperdiet, ut bibendum ipsum rhoncus.
                                            </p>
                                            <span class="chat-time">08:41</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="chat-detail">
                                        <div class="chat-image">
                                            <img src="img/avatars/user_2.jpg" alt="" />
                                        </div>
                                        <div class="chat-info">
                                            <h4>Pontus Dragomir</h4>
                                            <p>
                                                <i class="fa fa-check send-icon text-success-light"></i> Sed quis ante rutrum, cursus enim sit amet, placerat turpis.
                                            </p>
                                            <span class="chat-time">YESTERDAY</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="chat-detail">
                                        <div class="chat-image">
                                            <img src="img/avatars/user_3.jpg" alt="" />
                                        </div>
                                        <div class="chat-info">
                                            <h4>Lovro Étienne</h4>
                                            <p>
                                                <i class="fa fa-check send-icon text-success-light"></i> Morbi ultrices diam vitae placerat suscipit. Morbi consectetur ante et ex mollis eleifend.
                                            </p>
                                            <span class="chat-time">YESTERDAY</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="chat-detail">
                                        <div class="chat-image">
                                            <img src="img/avatars/user_4.jpg" alt="" />
                                        </div>
                                        <div class="chat-info">
                                            <h4>Kendal Matheus</h4>
                                            <p>
                                                <i class="fa fa-check send-icon text-success-light"></i> Aenean consectetur in velit vitae faucibus. Fusce libero est, euismod eu erat eu, luctus rutrum nunc.
                                            </p>
                                            <span class="chat-time">YESTERDAY</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="chat-detail">
                                        <div class="chat-image">
                                            <img src="img/avatars/user_5.jpg" alt="" />
                                        </div>
                                        <div class="chat-info">
                                            <h4>Eivind Andrew</h4>
                                            <p>
                                                <i class="fa fa-check send-icon text-success-light"></i> Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                            </p>
                                            <span class="chat-time">YESTERDAY</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            
                        </div>
							</div>
							
						</div>
						<div class="col-8">
							
						</div>
					</div>					

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
												$a="SELECT * FROM  dps";
												$b=mysqli_query($connect,$a);
												while($row=mysqli_fetch_array($b)){
												@$nomor++;
											?>
											<tr id="<?= $row['id']; ?>" style="background-color: <?php if ($row['tps'==1]) { echo "#fff"; } else { echo "#fff"; }?> ">
												<td><a href="php/cetak/cetak-kartu-identitas-user.php?id=<?= $row['id']?>"><?= $row['nama']?></a></td>
												<td>System Architect</td>
												<td>Edinburgh</td>
												<td>61</td>
												<td></td>
												<td> <button class="btn btn-danger btn-sm remove">Delete</button></td>
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

						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<div class="card-actions float-right">
								<button class="btn btn-primary"><i class="far fa-plus"></i> Add</button></div>
									<h5 class="card-title">Hoverable Rows</h5>
									<h6 class="card-subtitle text-muted">Below you can view members for the site below.</h6>
								</div>
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th>Name</th>
											<th>Phone Number</th>
											<th>Date of Birth</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$a="SELECT * FROM  ";
											$b=mysqli_query($connect,$a);
											while($row=mysqli_fetch_array($b)){
											@$nomor++;
										?>
										<tr>
											<td>
												<a href="php/cetak/cetak-kartu-identitas-user.php?id=<?= $row['id']?>"><img src="img/avatars/avatar-5.jpg" target="_blank" width="48" height="48" class="rounded-circle mr-2" alt="Avatar"> <?= $row['nama'] ?></a>
											</td>
											<td>864-348-0485</td>
											<td><?php 
													$ni = $row['nik'];
													QRcode::png($ni, "img/images/$ni.png", "L", 3, 3);
													echo "<img src='img/images/$ni.png'  />";
												?></td>
											<td><div class="btn-group">
											<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-smile"></i></button>
											<div class="dropdown-menu">
												<a class="dropdown-item" href="#">Action</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item" href="#">Separated link</a>
											</div>
										</div></td>
										</tr>
										<?php } ?>
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
	<script type="text/javascript">
	filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1); 
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current control button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>

	<!-- Ajax Delete -->
	<script type="text/javascript">
		  $(".remove").click(function(){
	        var id = $(this).parents("tr").attr("id");


	        if(confirm('Are you sure to remove this record ?'))
	        {
	            $.ajax({
	               url: 'delete-data.php',
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