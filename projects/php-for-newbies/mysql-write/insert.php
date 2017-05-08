<?php

	try {
		$bdd = new PDO('mysql:host=localhost;dbname=github-php-for-newbies;charset=utf8', 'root', 'root');
	}
	catch(Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}

	// Insert simple
	$bdd->exec('
		INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires)
		VALUES (\'Tomb Raider\', \'Hugo\', \'PC\', 5, 1, \'Une référence historique\')
	');

	// Insert avec une requête préparée
	$nom = 'Hearthstone';
	$possesseur = 'Valentin';
	$console = 'PC';
	$prix = 0;
	$nbre_joueurs_max = 1;
	$commentaires = "Addictif !";

	$query = $bdd->prepare('
		INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires)
		VALUES (:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)
	');
	$query->execute(array(
		'nom' => $nom,
		'possesseur' => $possesseur,
		'console' => $console,
		'prix' => $prix,
		'nbre_joueurs_max' => $nbre_joueurs_max,
		'commentaires' => $commentaires
	));

	echo 'Le jeu a bien été ajouté';
?>