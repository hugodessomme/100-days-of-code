<?php
	// Si le mot de passe est envoyé et est correct
	if( isset($_POST['password']) AND $_POST['password'] == "kangaroo" ) {
		echo "<p>Logged!<br>Here is the NASA password: 1234</p>";
	} else {
		echo "<p>Fail!</p>";
	}
?>