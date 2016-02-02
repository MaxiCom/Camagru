<?php

	require_once("db_connect.php");	
		
	session_start();

	$_POST['base64'] = file_get_contents("php://input");
	
	$stmt = $db->prepare('INSERT INTO pictures (username, image, likes, time) VALUES (:username, :image, 0, :time)');
	$stmt->bindValue(":username", $_SESSION['logged']);
	$stmt->bindValue(":image", $_POST['base64']);
	$stmt->bindValue(":time", "Le ".date("d/m à h:i"));
	if ($stmt->execute())
		echo "Success";

?>