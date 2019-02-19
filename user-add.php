<?php 
include 'head.php'; 
if(isset($_POST['btn-add-user']))
{
	$uname = mysqli_real_escape_string($connect, $_POST['uname']);
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$upass = md5(mysqli_real_escape_string($connect, $_POST['pass']));
	
	if(mysqli_query($connect, "INSERT INTO users(username,email,password) VALUES('".$uname."','".$email."','".$upass."')"))
	{
            $msg = "<div class='alert alert-success alert-dismissible' role='alert'>
                        <div class='alert-icon'>
                            <i class='far fa-fw fa-bell'></i>
                        </div>
                        <div class='alert-message'>
                            <strong>Hello there!</strong> A simple danger alert—check it out!
                        </div>

                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";       
	}
	else
	{
            $msg = "<div class='alert alert-danger alert-dismissible' role='alert'>
                        <div class='alert-icon'>
                            <i class='far fa-fw fa-bell'></i>
                        </div>
                        <div class='alert-message'>
                            <strong>Hello there!</strong> A simple danger alert—check it out!
                        </div>

                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
	}
}

?>

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Add User</h1>

        <div class="row">
            <div class="col-md-4 col-xl-3">


                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Profile Settings</h5>
                    </div>

                    <div class="list-group list-group-flush" role="tablist">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account" role="tab">Account</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#password" role="tab">Password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">Privacy and safety</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">Email notifications</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">Web notifications</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">Widgets</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">Your data</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">Delete account</a>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-xl-9">
                
                <?= @$msg ?>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="account" role="tabpanel">

                        <div class="card">
                            <div class="card-header">
                                <div class="card-actions float-right">
                                    <div class="dropdown show">
                                        <a href="#" data-toggle="dropdown" data-display="static">
                  <i class="align-middle" data-feather="more-horizontal"></i>
                </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title mb-0">Public info</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="inputUsername">Username</label>
                                                <input type="text" class="form-control" name="uname" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputUsername">Email</label>
                                                <input type="text" class="form-control" name="email"  placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputUsername">Password</label>
                                                <input type="password" class="form-control" name="pass" placeholder="Password">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputUsername">Biography</label>
                                                <textarea rows="2" class="form-control" id="inputBio" placeholder="Tell something about yourself"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text-center">
                                                <img alt="Andrew Jones" src="img/avatars/avatar.jpg" class="rounded-circle img-responsive mt-2" width="128" height="128" />
                                                <div class="mt-2">
                                                    <span class="btn btn-primary"><i class="fas fa-upload"></i> Upload</span>
                                                </div>
                                                <small>For best results, use an image at least 128px by 128px in .jpg format</small>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" name="btn-add-user" class="btn btn-primary">Save changes</button>
                                </form>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <div class="card-actions float-right">
                                    <div class="dropdown show">
                                        <a href="#" data-toggle="dropdown" data-display="static">
                  <i class="align-middle" data-feather="more-horizontal"></i>
                </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title mb-0">Private info</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputFirstName">First name</label>
                                            <input type="text" class="form-control" id="inputFirstName" placeholder="First name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputLastName">Last name</label>
                                            <input type="text" class="form-control" id="inputLastName" placeholder="Last name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail4">Email</label>
                                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
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
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>

                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="password" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-actions float-right">
                                    <div class="dropdown show">
                                        <a href="#" data-toggle="dropdown" data-display="static">
                  <i class="align-middle" data-feather="more-horizontal"></i>
                </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title mb-0">Password</h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Password</h5>

                                <form>
                                    <div class="form-group">
                                        <label for="inputPasswordCurrent">Current password</label>
                                        <input type="password" class="form-control" id="inputPasswordCurrent">
                                        <small><a href="#">Forgot your password?</a></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPasswordNew">New password</label>
                                        <input type="password" class="form-control" id="inputPasswordNew">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPasswordNew2">Verify password</label>
                                        <input type="password" class="form-control" id="inputPasswordNew2">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>

                            </div>
                        </div>
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

<script src="js/app.js"></script>
</body>

</html>