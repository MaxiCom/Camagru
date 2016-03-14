<?php

	require_once("db_connect.php");
	session_start();

	$result = $db->query("SELECT rowid, * FROM pictures ORDER BY rowid DESC");
	
	foreach ($result as $row)
	{?>
		
		<div class='post'>
			<div class='float-left'>
				<p>
					<b><?php echo $row['username'];?></b> Posted
				</p>
			</div>

			<div class='float-right'>
				<p>
					<?php echo $row['time'];
						//display X if logged
						if ($row['username'] == $_SESSION['logged']){?>
							<span data-name='<?php echo $row['rowid']; ?>' class='pointer' onclick="delete_post(this)"><b>X</b></span>
					<?php } ?>
				</p>
			</div>

			<img height=360 src="<?php echo $row['image']; ?>"/>

			<p id="likes"><?php echo $row['likes'];?> Like

				<!-- si n'a pas like afficher le bouton -->
				<?php if (!isset($_SESSION["liked_on_picture_id_".$row['rowid']])) { ?>
					<button onclick="like_post(this)" class='float-right' name='<?php echo $row['rowid']; ?>' id="like_button">Like</button>
				<?php } ?>
			</p>

				<?php
					//display comment
					$result_comment = $db->query('SELECT * FROM comments WHERE on_picture_id='.$row['rowid'].'');					
					foreach ($result_comment as $row_comment)
					{?>
						
						<div class='comment'>
							<p><b><?php echo $row_comment['username'] ?></b><span class='float-right'><?php echo $row_comment['time'] ?></span></p>
							<p class='content'><?php echo $row_comment['content'] ?></p>
						</div>

					<?php }	?>

			<form id="div_comment" onsubmit="return post_comment(this)">
				<input type="hidden" id="id_picture" value="<?php echo $row['rowid']; ?>">
				<input type="text" id="input_comment" size="50" required  pattern=".{1,140}" placeholder="Comment ...">
				<input type="submit">
			</form>
		</div>

	<?php } ?>