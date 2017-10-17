
<?php
require_once('config.php');
require_once('functions.php');

	session_start();

	if(user_logged_in()) {
		header('location: profile.php');
		die();
	}


if(isset($_POST['register'])) {

	$fname = $_POST['first_name']; 
	$lname = $_POST['last_name']; 
	$email = $_POST['Email']; 
	$password = $_POST['password']; 

	if(!email_exists()) {

	$error = array();

	if( $fname == NULL) {
		$error['fname'] = 'sorry! The First Name is Blank';
	}
	if( $lname == NULL) {
		$error['lname'] = 'sorry! The Last Name is Blank';
	}
	if( $email == NULL) {
		$error['email'] = 'sorry! The Email is Blank';
	}
	if( $password == NULL) {
		$error['password'] = 'sorry! The password is Blank';
	}
	elseif ( strlen($password) <= 6) {
		$error['password'] = 'sorry! The password must be 6 character long';
	}
	if(count($error) == 0) {
		$query = mysqli_query($connection,"INSERT INTO project1(first_name,last_name,email_address,password) VALUES('$fname','$lname','$email','$password')");
			if($query) {
				$success = "You have been successfully registered, now please <a href='login.php'>
				log in</a>";
			}
		}
	}
	else {
		echo 'Email already exists';
	}
	
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FORM</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="registration">
		<form action="" method="POST">
			<label for="first_name">First Name: </label>
			<input type="text" id="first_name" placeholder="input First Name" name="first_name"> <br>
				<div class="error">
					<?php if(isset($error['fname'])) {
						echo $error['fname'];
					} ?> <br>

				</div>

			<label for="last_name">Last Name: </label>
			<input type="text" id="last_name" placeholder="input Last Name" name="last_name"> <br>
				<div class="error">
					<?php if(isset($error['lname'])) {
						echo $error['lname'];
					} ?> <br>

				</div>

			<label for="Email">Email Here: </label>
			<input type="email" id="Email" placeholder="input Email" name="Email"> <br>
				<div class="error">
					<?php if(isset($error['email'])) {
						echo $error['email'];
					} ?> <br>

				</div>

			<label for="password">Password : </label>
			<input type="password" id="password" placeholder="input password" name="password"> <br>

				<div class="error">
					<?php if(isset($error['password'])) {
						echo $error['password'];
					} ?> <br>

				</div>

			<input type="submit" value="submit" name="register">

			<h4>Already have an account? please <a href="login.php">Log In</a></h4>

		</form>


		<div class="success">
			<?php
				if(isset($success)) {
					echo $success;
				}
				?>
		</div>
	</div>
	
</body>
</html>