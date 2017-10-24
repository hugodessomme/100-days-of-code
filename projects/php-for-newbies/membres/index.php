<?php
	include_once('model/db.php');

	/* Routing */

	// Défaut : Inscription
	if(!isset($_GET['page']) || $_GET['page'] == 'index') {
		include_once('controller/inscription/index.php');
	}