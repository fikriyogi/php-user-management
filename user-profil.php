<?php include 'head.php'; ?>
			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Profil</h1>
					<div class="row">
						<div class="col-md-4 col-xl-4">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">Profile Details</h5>
								</div>
								<div class="card-body text-center">
									<img src="img/avatars/avatar-4.jpg" alt="Marie Salter" class="img-fluid rounded-circle mb-2" width="128" height="128" />
									<h4 class="card-title mb-0"><?php echo $userRow['username']; ?></h4>
									<div class="text-muted mb-2">Lead <?php echo $userRow['email']; ?></div>

									<div>
										<a class="btn btn-primary btn-sm" href="#">Follow</a>
										<a class="btn btn-primary btn-sm" href="#"><span data-feather="message-square"></span> Message</a>
									</div>
								</div>
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">Skills</h5>
									<a href="#" class="badge tag badge-primary mr-1 my-1">HTML</a>
									<a href="#" class="badge tag badge-primary mr-1 my-1">JavaScript</a>
									<a href="#" class="badge tag badge-primary mr-1 my-1">Sass</a>
									<a href="#" class="badge tag badge-primary mr-1 my-1">Angular</a>
									<a href="#" class="badge tag badge-primary mr-1 my-1">Vue</a>
									<a href="#" class="badge tag badge-primary mr-1 my-1">React</a>
									<a href="#" class="badge tag badge-primary mr-1 my-1">Redux</a>
									<a href="#" class="badge tag badge-primary mr-1 my-1">UI</a>
									<a href="#" class="badge tag badge-primary mr-1 my-1">UX</a>
								</div>
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">About</h5>
									<ul class="list-unstyled mb-0">
										<li class="mb-1"><span data-feather="home" class="feather-sm mr-1"></span> Lives in <a href="#">San Francisco, SA</a></li>

										<li class="mb-1"><span data-feather="briefcase" class="feather-sm mr-1"></span> Works at <a href="#">GitHub</a></li>
										<li class="mb-1"><span data-feather="map-pin" class="feather-sm mr-1"></span> From <a href="#">Boston</a></li>
									</ul>
								</div>
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">Elsewhere</h5>
									<ul class="list-unstyled mb-0">
										<li class="mb-1"><span class="fas fa-globe fa-fw mr-1"></span> <a href="#"><?php echo $userRow['email']; ?></a></li>
										<li class="mb-1"><span class="fab fa-twitter fa-fw mr-1"></span> <a href="#">Twitter</a></li>
										<li class="mb-1"><span class="fab fa-facebook fa-fw mr-1"></span> <a href="#">Facebook</a></li>
										<li class="mb-1"><span class="fab fa-instagram fa-fw mr-1"></span> <a href="#">Instagram</a></li>
										<li class="mb-1"><span class="fab fa-linkedin fa-fw mr-1"></span> <a href="#">LinkedIn</a></li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-md-8 col-xl-8">
							<div class="card">
								<div class="card-header">
									<div class="card-actions float-right">
										<div class="dropdown show">
											<a href="#" data-toggle="dropdown" data-display="static">
              <i class="align-middle" data-feather="more-horizontal"></i>
            </a>

											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#editUser">Edit Profil</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
											</div>
										</div>
									</div>
									<h5 class="card-title mb-0">Activities</h5>
								</div>
								<div class="card-body h-100">

									<div class="media">
										<img src="img/avatars/avatar-5.jpg" width="36" height="36" class="rounded-circle mr-2" alt="Kathy Davis">
										<div class="media-body">
											<small class="float-right text-navy">5m ago</small>
											<strong>Kathy Davis</strong> started following <strong>Marie Salter</strong><br />
											<small class="text-muted">Today 7:51 pm</small><br />

										</div>
									</div>

									<hr />
									<a href="#" class="btn btn-primary btn-block">Load more</a>
								</div>
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

	<!-- Modal -->
	
	<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">

			<form>
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Default <?php echo $userRow['username']; ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
				</div>
				<div class="modal-body m-3">
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="inputEmail4">Username</label>
												<input type="text" class="form-control" value="<?php echo $userRow['username']; ?>">
											</div>
											<div class="form-group col-md-6">
												<label for="inputEmail4">Email</label>
												<input type="email" class="form-control" value="<?php echo $userRow['email']; ?>">
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="inputPassword4">Password</label>
												<input type="password" class="form-control" id="inputPassword4" placeholder="Password">
											</div>
										</div>
										<div class="form-group">
											<label for="inputAddress">Address</label>
											<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
										</div>
										<div class="form-group">
											<label for="inputAddress2">Address 2</label>
											<input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
										</div>
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="inputCity">City</label>
												<input type="text" class="form-control" id="inputCity">
											</div>
											<div class="form-group col-md-4">
												<label for="inputState">State</label>
												<select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
              </select>
											</div>
											<div class="form-group col-md-2">
												<label for="inputZip">Zip</label>
												<input type="text" class="form-control" id="inputZip">
											</div>
										</div>
										<div class="form-group">
											<label class="custom-control custom-checkbox m-0">
              <input type="checkbox" class="custom-control-input">
              <span class="custom-control-label">Check me out</span>
            </label>
										</div>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
			</form>


		</div>
	</div>

	<script src="js/app.js"></script>
</body>

</html>