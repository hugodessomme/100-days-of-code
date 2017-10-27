<?php
	include_once('model/db.php');

	/* Routing */

	// Défaut : Inscription
	if(!isset($_GET['page']) || $_GET['page'] == 'inscription') {
		include_once('controller/inscription/index.php');
	}

	// Login
	elseif($_GET['page'] == 'login') {
		include_once('controller/login/index.php');
	}

	// Logout
	elseif($_GET['page'] == 'logout') {
		include_once('controller/logout/index.php');
	}