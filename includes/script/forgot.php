<?php

	require_once("db_connect.php");

	if (!isset($_POST['email']))
	{
		echo "Error: variable unset";
		die();
	}

	$email = htmlspecialchars($_POST['email']);
	$val = hash("md5", time());
	$link = "http://localhost:8080/recover.php?v=".$val;

	$stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
	$stmt->bindValue(':email', $email);
	$stmt->execute();
	if ($stmt->fetchColumn() == 0)
	{
		echo "Error: this mail is not registered";
		die();
	}

	$stmt = $db->prepare("SELECT val FROM users WHERE email = :email");
	$stmt->bindValue(':email', $email);
	$stmt->execute();
	if ($stmt->fetchColumn() != "1")
	{
		echo "Error: this account is not active or is already recovering password";
		die();
	}
	//le mail existe
	$stmt = $db->prepare("UPDATE users SET val = :val WHERE email = :email");
	$stmt->bindValue(':val', $val);
	$stmt->bindValue(':email', $email);
	$stmt->execute();	
	
	echo "Success";

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	mail($email, "Your Camagru recovery password link", "
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

				Please click this link to recover your password</br><a href=\"$link\">http://camagru.com/recover</a>

			</div>
		", $headers);
?>