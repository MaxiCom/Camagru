<?php
	
	require("database.php");
	
	if (file_exists(DB_PATH))
		unlink(DB_PATH);

	try {

		$db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch (Exception $e) {
		echo $e;
	}

	$db->query("CREATE TABLE IF NOT EXISTS users
				(
					name varchar(255),
					email varchar(255),
					password varchar(255),
					val varchar(255)
				)");

	$db->query("CREATE TABLE IF NOT EXISTS photos
				(
					image text,
					likes int,
					name varchar(255),
					time_stamp text
				)");
	
	$db->query("CREATE TABLE IF NOT EXISTS comments
				(
					content text,
					user_name text,
					pic_id int,
					time_stamp text
				)");

?>