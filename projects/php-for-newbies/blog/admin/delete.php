<?php
	// Connexion à la BDD
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=github-php-for-newbies;charset=utf8', 'root', 'root');
	}
	catch( Exception $e) {
		die( 'Erreur : ' . $e->getMessage() );
	}

	// Supprime l'article
	$query = $bdd->prepare('
		DELETE FROM blog_post
		WHERE id = ?
	');
	$query->execute(array($_GET['id']));

	header('Location: index.php');
?>