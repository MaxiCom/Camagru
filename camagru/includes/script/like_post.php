<?php

	require_once("db_connect.php");
	
	session_start();

	if (!isset($_POST['id_picture']))
	{
		echo "Error: variable unset";
		die ();
	}

	$stmt = $db->prepare("UPDATE photos SET likes=likes+1 WHERE rowid = :id_picture");
	$stmt->bindValue(":id_picture", $_POST['id_picture']);
	$stmt->execute();

	$_SESSION["pic_id_".$_POST['id_picture']] = "1";
	echo "Success";
?>