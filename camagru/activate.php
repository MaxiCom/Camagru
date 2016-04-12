<?php

	require_once("includes/script/db_connect.php");

	if (!isset($_GET['v']) || (isset($_GET['v']) && empty($_GET['v'])))
	{
		header("Location: index.php?error=404");
		die();
	}
	
	$stmt = $db->prepare("UPDATE users SET active = 1 WHERE active = :active_value");
	$stmt->bindValue(':active_value', $_GET['v']);
	$stmt->execute();
	
	if ($stmt->rowCount() == 0)
		header("location: index.php?error=activation");
	else if ($stmt->rowCount() > 0)
		header("location: index.php?success=activation");
?>