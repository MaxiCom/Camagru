<?php 

	if (isset($_GET['error']) && !empty($_GET['error']) || (isset($emptypassword)))
	{
		echo '<div id="banner" class="banner redbanner">';

			if (isset($emptypassword))
				echo "Form fields have to be filled properly.";
			else if ($_GET['error'] == "activation")
				echo "This activation code is not valid.";
			else if ($_GET['error'] == "invalid_link")
	 			echo "This link is not valid.";
			else if ($_GET['error'] == "404")
				echo "Error 404: this page does not exists.";
			else if ($_GET['error'] == "alreadythispassword")
				echo "This is already your password.";

		echo "</div>";
	}
	elseif (isset($_GET['success']) && !empty($_GET['success']))
	{
		echo '<div id="banner" class="banner greenbanner">';

			if ($_GET['success'] == "passwordchange")
				echo "Your password has been changed.";
			else if ($_GET['success'] == "activation")
				echo "Your account is activated.";
	
		echo "</div>";
	}

?>