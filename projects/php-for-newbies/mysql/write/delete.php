<?php

	try {
		$bdd = new PDO('mysql:host=localhost;dbname=github-php-for-newbies;charset=utf8', 'root', 'root');
	}
	catch(Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}

	// Delete simple
	$nb_delete = $bdd->exec('DELETE FROM jeux_video WHERE ID = 53');

	// Delete avec une requête préparée
	$id = 51;

	$query = $bdd->prepare('
		DELETE FROM jeux_video
		WHERE ID = :id
	');
	$nb_delete = $query->execute(array(
		'id' => $id
	));
	echo $nb_delete . ' suppression(s)';

?>