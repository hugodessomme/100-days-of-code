<?php
	// Header
	$title = 'Accueil - Admin Blog';
	include '../templates/header.php';
?>
	<p><a href="../index.php">Retour à la liste des articles</a> - <a href="add.php">Ajouter un article</a></p>

	<?php
		include '../inc/bdd.php';

		// Récupère tous les articles
		$query = $bdd->query('SELECT id, titre FROM blog_post ORDER BY titre');

		// Affichage d'un article
		echo '<h2>Tous les articles</h2>';
		echo '<ul>';
		while( $data = $query->fetch() ) {
			include '../templates/admin/post-settings.php';
		}
		echo '</ul>';
		$query->closeCursor();
	?>

<?php
	// Footer
	include '../templates/footer.php';
?>