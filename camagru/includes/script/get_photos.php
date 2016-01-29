<?php

	require_once("db_connect.php");
	session_start();

	$result = $db->query("SELECT rowid, * FROM photos ORDER BY rowid DESC");
	
	foreach ($result as $row)
	{?>
		<div class='post'>
			<div class='float-left'>
				<p>
					<b><?php echo $row['name'];?></b> a posté
				</p>
			</div>
			<div class='float-right'>
				<p><?php echo $row['time_stamp'];
					
					//display X if logged
					if ($row['name'] == $_SESSION['logged']){?>
						<span data-name='<?php echo $row['rowid']; ?>' class='pointer' onclick="delete_post(this)"><b>X</b></span>
					<?php } ?>
				</p>
			</div>
			<img height=360 src="<?php echo $row['image']; ?>"/>
			<p id="likes">
				<?php echo $row['likes'];?> Likes
				<!-- si n'a pas like afficher le bouton -->
				<?php if (!isset($_SESSION["pic_id_".$row['rowid']])) { ?>
					<button onclick="like_post(this)" class='float-right' name='<?php echo $row['rowid']; ?>' id="like_button">Like</button>
				<?php } ?>
			</p>
				<?php
					//display comment
					$result_comment = $db->query('SELECT * FROM comments WHERE pic_id='.$row['rowid'].'');					
					foreach ($result_comment as $row_comment)
					{
						echo "<div class='comment'>
								<p><b>".$row_comment['user_name']."</b><span class='float-right'>".$row_comment['time_stamp']."</span></p>
								<p class='content'>".$row_comment['content']."</p>
							  </div>";
					}	
				?>
			<form id="div_comment" onsubmit="return post_comment(this)">
				<input type="hidden" id="id_picture" value="<?php echo $row['rowid']; ?>">
				<input type="text" id="input_comment" size="50" required  pattern=".{1,140}" placeholder="Comment ...">
				<input type="submit">
			</form>
		</div>
	<?php } ?>