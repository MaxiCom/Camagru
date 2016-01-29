<?php

	require_once("db_connect.php");
	session_start();

	if (!isset($_POST['id_picture']) || !isset($_POST['input_comment']))
	{
		echo "Error: variable unset";
		die ();
	}
	if (strlen($_POST['input_comment']) < 1 || strlen($_POST['input_comment']) > 140)
	{
		echo "Form fields have to be filled properly";
		die();
	}

	$stmt = $db->prepare("SELECT name FROM photos WHERE rowid = :pic_id");
	$stmt->bindValue(":pic_id", $_POST['id_picture']);
	$stmt->execute();

	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($row['name'] != $_SESSION['logged'])
	{
		$stmt = $db->prepare("SELECT email FROM users JOIN photos USING(name) WHERE photos.rowid = :pic_id");
		$stmt->bindValue(":pic_id", $_POST['id_picture']);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		mail($row["email"], "Camagru | Someone commented your pic", "
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
				Someone commented your pic on camagru</br><a href=\"http://localhost:8080\">http://camagru.com</a>
				</div>
				", $headers);
	}


	$comment = htmlspecialchars($_POST['input_comment']);
	$stmt = $db->prepare("INSERT INTO comments (content, user_name, pic_id, time_stamp) VALUES (:content, :username, :pic_id, :time)");
	$stmt->bindValue(":content", $comment);
	$stmt->bindValue(":username", $_SESSION['logged']);
	$stmt->bindValue(":pic_id", $_POST['id_picture']);
	$stmt->bindValue(":time", "Le ".date("d/m à h:i"));

	if ($stmt->execute())
		echo "Success";
?>