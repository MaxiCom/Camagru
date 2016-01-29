<?php

	require_once("includes/script/db_connect.php");

	if (!isset($_GET['v']) || (isset($_GET['v']) && empty($_GET['v']))) 
	{
		header("Location: index.php");
		die();
	}

	if (isset($_POST['newpassword']))
	{
		if (empty($_POST['newpassword']) || (!empty($_POST['newpassword']) && (strlen($_POST['newpassword']) < 5 || strlen($_POST['newpassword']) > 255)))
				$emptypassword = 1;
			else
			{
				$stmt = $db->prepare("UPDATE users SET password = :password, val=1 WHERE val = :currentval");
				$stmt->bindValue(':currentval', $_GET['v']);
				$stmt->bindValue(':password', hash("SHA256", $_POST['newpassword']));
				$stmt->execute();

				header("Location: index.php?success=passwordchange");
				die();
			}
	}

	$stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE val = :currentval");
	$stmt->bindValue(':currentval', $_GET['v']);
	$stmt->execute();
	
	if ($stmt->fetchColumn() == 0)
	{
		header("Location: index.php?error=invalid_link");
		die();
	}

?>
<!DOCTYPE html>
<html>
	<head>

		<?php include_once("includes/head.html"); ?>
		<title>Recover your password</title>
		<link rel="stylesheet" type="text/css" href="/css/login.css">

	</head>
	<body>
		<?php include("includes/header.php"); ?>
		<?php include("includes/banner.php"); ?>
		<div id="container">
			<form action="" method="POST" autocomplete="off" id="password_form">
				<label for="newpassword">New password: </label><input required pattern=".{5,255}" title="5 letters min. - 255 max." type="password" name="newpassword"></br>
				<input type="submit" value="Change password">
			</form>
		</div>
		<script type="text/javascript" src="javascript/login.js"></script>
	</body>
</html>