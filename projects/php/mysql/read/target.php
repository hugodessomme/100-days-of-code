<?php
	// Gestion d'erreur de connexion (try, catch)
	try {
		// Connexion à la BDD
		$bdd = new PDO('mysql:host=localhost;dbname=github-php-for-newbies;charset=utf8', 'root', 'root');
	}
	catch(Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}

	// Requete SQL préparée (marqueur "?")
	$pQuery = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = ? AND prix <= ?');
	$pQuery->execute(array($_GET['possesseur'], $_GET['prix'])); // On doit respecter l'ordre des variables

	echo '<p>Avec marqueurs "?"</p>';
	echo '<ul>';
	while($entry = $pQuery->fetch()) {
		echo '<li>' . $entry['nom'] . ' : ' . $entry['prix'] . '</li>';
	}
	echo '</ul>';

	$pQuery->closeCursor();

	// Requete SQL préparée (marqueur nominatif)
	$pNQuery = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = :possesseur AND prix <= :prix');
	$pNQuery->execute(array('possesseur' => $_GET['possesseur'], 'prix' => $_GET['prix'])); // On ne doit pas forcément respecter l'ordre des variables

	echo '<p>Avec marqueurs nominatifs</p>';
	echo '<ul>';
	while($entry = $pNQuery->fetch()) {
		echo '<li>' . $entry['nom'] . ' : ' . $entry['prix'] . '</li>';
	}
	echo '</ul>';

	$pQuery->closeCursor();
?>