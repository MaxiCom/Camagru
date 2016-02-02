<!DOCTYPE html>
<html>
	<head>
		<?php include_once("includes/head.html"); ?>
		<title>Log into Camagru</title>
		<link rel="stylesheet" type="text/css" href="/css/login.css">
	</head>
	<body>
		<?php include("includes/header.php"); ?>
		<?php include("includes/banner.php"); ?>
		<div id="container">
			<table>
				<tbody>
					<tr>
						<td id="table_login" onclick="switch_form(this)">Log in</td>
						<td id="table_register" onclick="switch_form(this)">Register</td>
						<td id="table_forgot" onclick="switch_form(this)">Forgot ?</td>
					</tr>
				</tbody>
			</table>

			<form autocomplete="off" onsubmit="return form_login(this)" id="form_login">
				<label for="username1">Username: </label><input size="17" pattern=".{5,15}" required title="5 letters min. - 15 max." type="text" id="username1" name="username"></br>
				<label for="password1">Password: </label><input size="17" pattern=".{5,255}" required title="5 letters min. - 255 max." type="password" id="password1" name="password"></br>
				<input type="submit" value="Log in" />
			</form>

			<form autocomplete="off" onsubmit="return form_register(this)" id="form_register" class="display_none">
				<label for="username2">Username: </label><input size=17 pattern=".{5,15}" required title="5 letters min. - 15 max." type="text" id="username2" name="username"></br>
				<label for="password2">Password: </label><input size=17 pattern=".{5,255}" required title="5 letters min. - 255 max." type="password" id="password2" name="password"></br>
				<label for="email2">Email: </label><input size=17 pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required type="text" id="email2" name="email"></br>
				<input type="submit" value="Register" />
			</form>

			<form autocomplete="off" onsubmit="return form_forgot(this)" id="form_forgot" class="display_none">
				<label for="email3">Mail: </label><input size=17 pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required type="text" id="email3" name="forgotemail"></br>
				<input type="submit" value="Send mail">
			</form>
		</div>

		<?php include("includes/footer.html"); ?>
		<script type="text/javascript" src="/javascript/global.js"></script>
		<script type="text/javascript" src="/javascript/login.js"></script>
	</body>
</html>