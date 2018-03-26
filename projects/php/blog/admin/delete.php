<?php
	include '../inc/bdd.php';

	// Supprime l'article
	$query = $bdd->prepare('
		DELETE FROM blog_post
		WHERE id = ?
	');
	$query->execute(array($_GET['id']));

	header('Location: index.php');
?>