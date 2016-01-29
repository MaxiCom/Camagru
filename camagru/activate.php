<?php

	require_once("includes/script/db_connect.php");

	if (!isset($_GET['v']) || (isset($_GET['v']) && empty($_GET['v'])))
	{
		header("Location: index.php?error=404");
		die();
	}
	
	$stmt = $db->prepare("UPDATE users SET val = 1 WHERE val = :currentval");
	$stmt->bindValue(':currentval', $_GET['v']);
	$stmt->execute();
	if ($stmt->rowCount() == 0)
		header("location: index.php?error=activation");
	else if ($stmt->rowCount() > 0)
		header("location: index.php?success=activation");
?>