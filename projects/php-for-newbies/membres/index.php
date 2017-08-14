<?php
	include_once('model/sql_connect.php');

	// Routing
	if( isset($_GET['page']) AND $_GET['page'] == 'inscription') {
		include_once('controller/inscription/index.php');
	}

	else {
?>

<a href="?page=inscription">Inscription</a>

<?php } ?>


