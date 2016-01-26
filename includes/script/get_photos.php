<?php

	require_once("db_connect.php");
	session_start();

	$result = $db->query("SELECT rowid, * FROM photos ORDER BY rowid DESC");
	
	foreach ($result as $row)
	{?>
		<div class='post'>
			<div class='float-left'>
				<p><b><?php echo $row['name'];?></b> a posté</p>
			</div>
			<div class='float-right'>
				<p><?php echo $row['time_stamp'];
					//display X if logged
					if ($row['name'] == $_SESSION['logged']){?>
						<span data-name='<?php echo $row['rowid']; ?>' class='delete_span' onclick="delete_post(this)"><b>X</b></span>
					<?php } ?>
				</p>
			</div>
			<img height=360 src="<?php echo $row['image']; ?>"/>
		</div>
	<?php } ?>