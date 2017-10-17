<?php
require_once('functions.php');
session_start();
if(!user_logged_in()) {
	header('location: login.php');
	die();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profile page</title>
</head>
<body>
	<a href="admin/index.php">Admin Panel</a> <br>
	<a href="logout.php">log out</a>
	
</body>
</html>