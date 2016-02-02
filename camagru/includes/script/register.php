<?php

	require_once("db_connect.php");

	//Check var
	if (!isset($_POST['username']) || !isset($_POST['email']) || !isset($_POST['password']))
	{
		echo 'Error: the variables are unset or contain unset values';
		die();
	}

	//Check identical
	if ($_POST['username'] == $_POST['password'])
	{
		echo "The username and the password can't be identical";
		die();
	}

	//form check
	if (strlen($_POST['username']) < 5 || strlen($_POST['username']) > 15 || strlen($_POST['password']) < 5 || strlen($_POST['password']) > 255)
	{
		echo "Form fields have to be filled properly";
		die();
	}

	//Set var
	$username = htmlspecialchars($_POST['username']);

	//Check already used username
	$stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
	$stmt->bindValue(':username', $username);
	$stmt->execute();
	if ($stmt->fetchColumn() > 0)
	{
		echo "This username already exists";
		die();
	} 

	$email = htmlspecialchars($_POST['email']);

	//Check already used mail
	$stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
	$stmt->bindValue(':email', $email);
	$stmt->execute();
	if ($stmt->fetchColumn() > 0)
	{
		echo "This mail already exists";
		die();
	}  

	$password = hash("SHA256", $_POST['password']);
	$active_value = hash('md5', time());
	$link = "http://localhost:8080/activate.php?v=".$active_value;

	$stmt = $db->prepare('INSERT INTO users (username, password, email, active) VALUES (:username, :password, :email, :active_value)');
	$array = array(
	         ':username'   => $username,
	         ':password'    => $password,
	         ':email'    => $email,
	         ':active_value'   => $active_value);

	if ($stmt->execute($array))
		echo "Success";


		$headers  = 'MIME-Version: 1.0' . "\r\n";
	    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		mail($email, "Your Camagru activation link", "
			<div style='
							height: 55px;
			    			line-height: 52px;
			   				width: 100%;
			    			background-color: #0FBBB5;
			   				box-shadow: 0px 4px 10px 0.1px grey;
			   				text-align: center;
			   				border-radius: 10px;
			   				padding-top: 10px;
			'>
				<h1 style='font-family: Verdana'>Camagru</h1>
			</div>
			<div style='	text-align: center;
							width: 100%;
							padding-top: 20px;

						'>
			Please click this link to activate your account</br><a href=\"$link\">http://camagru.com/activate</a>
			</div>
			", $headers);

?>