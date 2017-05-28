<?php
	// Connexion à la BDD
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=github-php-for-newbies;charset=utf8', 'root', 'root');
	}
	catch (Exception $e) {
		die('Erreur ' . $e->getMessage());
	}

	// Ajoute le commentaire
	$query = $bdd->prepare('
		INSERT INTO blog_comments(id_post, auteur, commentaire, date_commentaire)
		VALUES (:id_post, :auteur, :commentaire, NOW())
	');
	$query->execute(array(
		'id_post' => $_POST['id_post'],
		'auteur' => $_POST['auteur'],
		'commentaire' => $_POST['commentaire']
	));

	header('Location: comments.php?id='.$_POST['id_post'].'');
?>