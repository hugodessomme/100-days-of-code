<?php
	// Connexion à la BDD
	include 'inc/bdd.php';

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