<?php

require_once('functions.php');
if(file_exists(dirname(__FILE__).'/config.php')) {
	require_once(dirname(__FILE__).'/config.php');
}
	
	session_start();

	if(user_logged_in()) {
		header('location: profile.php');
		die();
	}
	if(isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	if($email!=NULL && $password!=NULL) {

		if(email_exists()) {

		$pass_query = mysqli_query($connection,"SELECT password FROM project1 where email_address = '$email' ");
		$row = mysqli_fetch_assoc($pass_query);

		if( $password == $row['password']) {
			$_SESSION['success'] = 'logged in';

			header('location: profile.php');
		}else {
			echo 'password does not match';
		}
	}
		else {
		echo 'Email does not match';
		}
	} 
else {
	echo 'please insert email and password';
}


	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>log in</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="registration">
		<form action="" method="POST">

			<label for="Email">Email Here: </label>
			<input type="email" id="Email" placeholder="input Email" name="email"> <br><br>

			<label for="password">Password : </label>
			<input type="password" id="password" placeholder="input password" name="password"> <br>

			<input type="submit" value="log in" name="login">

		</form>

		<p>If you are not existing user please <a href="index.php">register</a></p>
	</div>
	
</body>
</html>

