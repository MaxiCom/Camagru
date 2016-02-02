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
					username varchar(255),
					password varchar(255),
					email varchar(255),
					active varchar(255)
				)");

	$db->query("CREATE TABLE IF NOT EXISTS pictures
				(
					username varchar(255),
					image text,
					likes int,
					time text
				)");
	
	$db->query("CREATE TABLE IF NOT EXISTS comments
				(
					username text,
					content text,
					on_picture_id int,
					time text
				)");

?>