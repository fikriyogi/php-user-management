<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: index.php");
}
include_once 'core/db_connect.php';

if(isset($_POST['btn-signup']))
{
	$uname = mysqli_real_escape_string($connect, $_POST['uname']);
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$upass = md5(mysqli_real_escape_string($connect, $_POST['pass']));
	
	if(mysqli_query($connect, "INSERT INTO users(username,email,password) VALUES('".$uname."','".$email."','".$upass."')"))
	{
            $msg = 'Congratulation you have successfully registered.';       
	}
	else
	{
            $msg = 'Error while registering you...';
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
							<h1 class="h2">Get started</h1>
							<p class="lead">
								Start creating the best possible user experience for you customers.
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form  method="POST">
										<div class="form-group">
											<label>Username</label>
											<input class="form-control form-control-lg" type="text" name="uname"  placeholder="Enter username" />
										</div>
										<div class="form-group">
											<label>Email</label>
											<input class="form-control form-control-lg" type="email" name="email"  placeholder="Enter your email" />
										</div>
										<div class="form-group">
											<label>Password</label>
											<input class="form-control form-control-lg" type="password" name="pass" placeholder="Enter password" />
										</div>
										<div class="form-group">
											<label>Confirm Password</label>
											<input class="form-control form-control-lg" type="password" name="cpassword" placeholder="Enter password" />
										</div>
										<div class="text-center mt-3">
											<!-- <a href="index.html" class="btn btn-lg btn-primary">Sign up</a> -->
											<button type="submit"  name="btn-signup" class="btn btn-lg btn-primary">Sign up</button>
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

	<?php
if (isset($_POST['submit'])) {
## connect mysql server
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	# check connection
	if ($mysqli->connect_errno) {
		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
		exit();
	}
## query database
	# prepare data for insertion
	$username	= $_POST['username'];
	$password	= $_POST['password'];
	$first_name	= $_POST['first_name'];
	$last_name	= $_POST['last_name'];
	$email		= $_POST['email'];
 
	# check if username and email exist else insert
	// u = username, e = emai, ue = both username and email already exists
	$exists = "";
	$result = $mysqli->query("SELECT username from users WHERE username = '{$username}' LIMIT 1");
	if ($result->num_rows == 1) {
		$exists .= "u";
	}	
	$result = $mysqli->query("SELECT email from users WHERE email = '{$email}' LIMIT 1");
	if ($result->num_rows == 1) {
		$exists .= "e";
	}
 
	if ($exists == "u") echo "<p><b>Error:</b> Username already exists!</p>";
	else if ($exists == "e") echo "<p><b>Error:</b> Email already exists!</p>";
	else if ($exists == "ue") echo "<p><b>Error:</b> Username and Email already exists!</p>";
	else {
		# insert data into mysql database
		$sql = "INSERT  INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`) 
				VALUES (NULL, '{$username}', '{$password}', '{$first_name}', '{$last_name}', '{$email}')";
 
		if ($mysqli->query($sql)) {
			redirect_to("login.php?msg=Registred successfully");
		} else {
			echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
			exit();
		}
	}
}
?>	

	<script src="js/app.js"></script>
</body>

</html>