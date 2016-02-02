<?php

	date_default_timezone_set('Europe/Paris');
	define("DB_PATH", "/tmp/Database.db");

	try {
		
		if (!file_exists(DB_PATH))
			throw new Exception("Database not found, launch the config script before !", 1);

		$db = new PDO("sqlite:".DB_PATH);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch (Exception $e) {
		echo $e->getMessage();
	}

?>