<?php
	include("includes/script/db_connect.php");

	session_start();

	if (isset($_SESSION['logged']))
		include("includes/home.php");
	else
		include("includes/login.php");

?>
