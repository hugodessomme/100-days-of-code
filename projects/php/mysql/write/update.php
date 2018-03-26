<?php

	try {
		$bdd = new PDO('mysql:host=localhost;dbname=github-php-for-newbies;charset=utf8', 'root', 'root');
	}
	catch(Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}

	// Update simple
	$nb_update = $bdd->exec('UPDATE jeux_video SET possesseur = \'Hugo\' WHERE possesseur = \'Valentin\'');

	// Update avec une requête préparée
	$id = 2;
	$new_possesseur = 'Hugo';

	$query = $bdd->prepare('
		UPDATE jeux_video
		SET possesseur = :new_possesseur WHERE ID = :id
	');
	$nb_update = $query->execute(array(
		'new_possesseur' => $new_possesseur,
		'id' => $id
	));

	echo $nb_update . ' modifications effectuées';
?>