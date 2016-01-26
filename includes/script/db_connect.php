<?php

	define("DB_PATH", "/tmp/Database.db");

	try {
		if (!file_exists(DB_PATH))
			throw new Exception("Database not found", 1);

		$db = new PDO("sqlite:".DB_PATH);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if (!$db->query("SELECT 1 from users"))
			throw new Exception("Table not found, the database is corrupted", 1);
		if (!$db->query("SELECT 1 from photos"))
			throw new Exception("Table not found, the database is corrupted", 1);
		if (!$db->query("SELECT 1 from comments"))
			throw new Exception("Table not found, the database is corrupted", 1);
	} catch (Exception $e) {
		echo "Database not found or corrupted, launch the config script before !";
		die();
	}
	
?>