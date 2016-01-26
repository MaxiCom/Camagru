<?php

	require_once("db_connect.php");
	date_default_timezone_set('Europe/Paris');		
	session_start();

	$_POST['base64'] = file_get_contents("php://input");
	
	$stmt = $db->prepare('INSERT INTO photos (image, likes, name, time_stamp) VALUES (:image, 0, :name, :time)');
	$stmt->bindValue(":image", $_POST['base64']);
	$stmt->bindValue(":name", $_SESSION['logged']);
	$stmt->bindValue(":time", "Le ".date("d/m à h:i"));
	if ($stmt->execute())
		echo "Success";

?>