<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin - Blog</title>
</head>
<body>
	<p><a href="../index.php">Retour à la liste des articles</a> - <a href="add.php">Ajouter un article</a></p>

	<?php
		// Connexion à la BDD
		try {
			$bdd = new PDO('mysql:host=localhost;dbname=github-php-for-newbies;charset=utf8', 'root', 'root');
		}
		catch( Exception $e) {
			die( 'Erreur : ' . $e->getMessage() );
		}

		// Récupère tous les articles
		$query = $bdd->query('SELECT id, titre FROM blog_post ORDER BY titre');

		// Affichage d'un article
		echo '<h2>Tous les articles</h2>';
		echo '<ul>';
		while( $data = $query->fetch() ) {
			echo '<li>' . $data['titre'] . ' : <a href="delete.php?id='.$data['id'].'">Supprimer</a> - <a href="update.php?id='.$data['id'].'">Modifier</a></li>';
		}
		echo '</ul>';

		$query->closeCursor();
	?>
</body>
</html>