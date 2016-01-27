<?php
	
	require_once("db_connect.php");
	session_start();

	if (!isset($_POST['username']) || !isset($_POST['password']))
	{
		echo "Error: variable unset";
		die ();
	}

	if ($_POST['username'] == $_POST['password'])
	{
		echo "The username and the password can't be identical";
		die();
	}

	if (strlen($_POST['username']) < 5 || strlen($_POST['username']) > 15 || strlen($_POST['password']) < 5 || strlen($_POST['password']) > 255)
	{
		echo "Form fields have to be filled properly";
		die();
	}

	$username = htmlspecialchars($_POST['username']);
	$password = hash("SHA256", $_POST['password']);

	$stmt = $db->prepare("SELECT COUNT(*) FROM users where name = :name and password = :password and val=1");
	$stmt->bindValue(":name", $username);
	$stmt->bindValue(":password", $password);
	$stmt->execute();

	if ($stmt->fetchColumn() == 0)
	{
		echo "Wrong username of password or account is not activated";
		die ();
	}
	else
		$_SESSION['logged'] = $username;
	echo "Success";

?>