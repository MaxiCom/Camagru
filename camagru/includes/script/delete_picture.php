<?php

	require_once("db_connect.php");	
	session_start();

	$stmt = $db->prepare("DELETE FROM comments WHERE on_picture_id = :id_post");
	$stmt->bindValue(':id_post', $_POST['id_post']);
	$stmt->execute();

	$stmt = $db->prepare("DELETE FROM pictures WHERE rowid = :id_post AND username = :username");
	$stmt->bindValue(':id_post', $_POST['id_post']);
	$stmt->bindValue(':username', $_SESSION['logged']);
	$stmt->execute();

	unset($_SESSION["liked_on_picture_id_".$_POST['id_post']]);

	if ($stmt->rowCount())
		echo "Success";
	else
		echo "There's a problem";
?>