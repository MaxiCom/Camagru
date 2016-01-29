<!DOCTYPE html>
<html lang="fr">
	<head>
		<?php include("includes/head.html"); ?>
		<title>Camagru</title>
		<link rel="stylesheet" type="text/css" href="css/home.css">
	</head>
	<body>
		<?php include("includes/header.php"); ?>
		<div id="container">
			<ul>
				<li><h3>To upload a picture you can<h3></li>
				<li class="middle pointer" onclick="active_webcam();">Use your webcam</li>
				<li class="middle pointer" onclick="handle_input_file()">Choose an image file</li>
				<li id="li_gif" class="display_none">
					<table>
						<tr>
							<td id="beer" onclick="display_png(this)"></td>
							<td id="monkey" onclick="display_png(this)"></td>
							<td id="banana" onclick="display_png(this)"></td>
							<td onclick="clear_context()">Clear</td>
						</tr>
					</table>
				</li>
				<canvas id="canvasfile" class="display_none"></canvas>
				<canvas id="canvas" class="display_none"></canvas>
				<li id="livid" class="display_none"><video id="video"></video></li>
				<li id="lifile" class="display_none"></li>
				<li onclick="send_file()" class="pointer">Send</li>
			</ul>
			<div id="timeline">

			</div>
		</div>
		<input id="input_file" onchange="handleFiles(this);" type="file" accept="image/jpeg, image/png">

		<script type="text/javascript" src="javascript/home.js"></script>
	</body>
</html>