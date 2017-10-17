<?php
require_once('config.php');
function email_exists() {
	global $email;
	global $connection;
	$query = mysqli_query($connection,"SELECT * FROM project1 where email_address = '$email'");
	if(mysqli_num_rows($query) == 1) {
		return true;
	}
}

function user_logged_in() {
	if(isset($_SESSION['success'])) {
		return true;
	}
}

?>