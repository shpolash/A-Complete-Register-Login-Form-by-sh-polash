<?php
require_once('config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

 <form action="" method="POST">
 	<input type="email" name = 'email'>
 	<input type="submit" value="show" name="registery">

 </form>
	
</body>
</html>

<?php

if(isset($_POST['registery'])) {
	$email = $_POST['email'];

	$query = mysqli_query($connection,"SELECT * from project1 where email_address = '$email'");

	if(mysqli_num_rows($query) >=1) {
		echo 'email already exists';
	}

 }
