<header>
	<div id="header_container">
		<div id="left">
			<h1><span <?php if (isset($_SESSION['logged'])) echo "onclick='refresh_timeline();'"; ?>>Camagru</span></h1>
		</div>
		<div id="right">
			<?php if (isset($_SESSION['logged'])) { ?>
				<table>
					<tr>
						<td>Welcome <b><?php echo $_SESSION['logged']; ?></b></td>
						<td><span onclick="Disconnect()">Log out</span></td>
					</tr>
				</table>	
			<?php } ?>			
		</div>

	</div>
</header>