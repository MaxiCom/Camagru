<header>
	<div id="header_container">
		
		<div id="left">
			<h1 class="pointer" <?php if (isset($_SESSION['logged'])) echo "onclick='refresh_timeline();'";?> >Camagru</h1>
		</div>

		<div id="right">
			<!-- if logged -->		
			<?php if (isset($_SESSION['logged'])) { ?>
				<table>
					<tr>
						<td>Welcome <b><?php echo $_SESSION['logged']; ?></b></td>
						<td><span class="pointer" id="logout_button" onclick="Disconnect()">Log out</span></td>
					</tr>
				</table>	
			<?php } ?>
				
		</div>
	</div>
</header>