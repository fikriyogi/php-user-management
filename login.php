<?php
session_start();
include_once 'core/db_connect.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: index.php");
}

if(isset($_POST['btn-login']))
{
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$upass = mysqli_real_escape_string($connect, $_POST['pass']);
	

	$res=mysqli_query($connect, "SELECT * FROM users WHERE email='$email' and banned='0'");
	$sql = mysqli_query($connect, "UPDATE users SET status='1'  WHERE email='$email'");
	$log = mysqli_query($connect, "INSERT INTO log SET email='$email'");
	$row=mysqli_fetch_array($res);
	
	if($row['password']==md5($upass))
	{
		$_SESSION['user'] = $row['id'];
		header("Location: index.php");
	}
	elseif ($row['banned']==1) {
		$_SESSION['user'] = $row['id'];
		echo "Anda terblokir, Hubungi admin";
	}
	else
	{
          $err = "<div class='alert alert-danger alert-dismissible' role='alert'>
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

	
	?>
<?php
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 4 Admin Template">
	<meta name="author" content="Bootlab">

	<title>Vuze - Responsive Admin Template</title>

	<link href="css/app.css" rel="stylesheet">

</head>

<body>
	<main class="main h-100 w-100">
		<div class="container h-100">
			<div class="row h-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Welcome back, Chris</h1>
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>
							<?php echo @$err;?>

						<div class="card">
							<div class="card-body">
								
								<div class="m-sm-4">
									<div class="text-center">
										<img src="img/avatars/avatar.jpg" alt="Andrew Jones" class="img-fluid rounded-circle" width="132" height="132" />
									</div>
									<form method="POST">
										<div class="form-group">
											<label>Email</label>
											<input class="form-control form-control-lg" type="text" name="email" placeholder="Enter your email" />
										</div>
										<div class="form-group">
											<label>Password</label>
											<input class="form-control form-control-lg" type="password" name="pass"  placeholder="Enter your password" />
											<small>
            <a href="pages-reset-password.html">Forgot password?</a>
          </small>
										</div>
										<div>
											<div class="custom-control custom-checkbox align-items-center">
												<input type="checkbox" class="custom-control-input" value="remember-me" name="remember" checked>
												<label class="custom-control-label text-small">Remember me next time</label>
											</div>
										</div>
										<div class="text-center mt-3">
											<!-- <a href="index.html" class="btn btn-lg btn-primary">Sign in</a> -->
											<button type="submit"  name="btn-login" class="btn btn-lg btn-primary">Sign in</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>
</body>

</html>