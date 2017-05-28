<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Post - Blog</title>
	<style>
		h1,h3{text-align:center}
		h3{background-color:#000;color:#fff;font-size:.9em;margin-bottom:0}
		.news p{background-color:#CCC;margin-top:0}
		.news{width:70%;margin:auto}
		a{text-decoration:none;color:#00f}
	</style>
</head>
<body>

<h1>Mon super blog !</h1>
<a href="index.php">Retour à la liste des articles</a>

<?php
	// Connexion à la BDD
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=github-php-for-newbies;charset=utf8', 'root', 'root');
	}
	catch (Exception $e) {
		die('Erreur ' . $e->getMessage());
	}
?>

<?php if( isset($_GET['id']) ) { ?>

	<?php
		// Récupère le post
		$query = $bdd->prepare('
			SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") AS date_creation
			FROM blog_post
			WHERE id = ?
		');
		$query->execute(array($_GET['id']));

		// Affichage du post
		$data = $query->fetch();
		echo '<div class="news">';
		echo '<h3>' . htmlspecialchars($data['titre']) . ' le ' . $data['date_creation'] . '</h3>';
		echo '<p>' . nl2br(htmlspecialchars($data['contenu'])) . '</p>';
		echo '</div>';
		$query->closeCursor();
	?>

	<?php
		// Récupère les commentaires du post
		$query = $bdd->prepare('
			SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, "%d/%m/%Y à %Hh%imin%ss") AS date_commentaire
			FROM blog_comments
			WHERE id_post = ?
			ORDER BY date_commentaire DESC
		');
		$query->execute(array($_GET['id']));

		echo '<h2>Commentaires</h2>';

		// Affichage des commentaires
		while( $data = $query->fetch() ) {
			echo '<p><strong>' . htmlspecialchars($data['auteur']) . '</strong> le ' . $data['date_commentaire'] . '</p>';
			echo '<p>' . nl2br(htmlspecialchars($data['commentaire'])) . '</p>';
		}
		$query->closeCursor();
	?>

	<form action="comments_insert.php" method="post">
		<fieldset>
			<legend>Ajouter un commentaire</legend>
			<div><input type="text" name="auteur" placeholder="auteur"></div>
			<div><textarea name="commentaire" placeholder="commentaire"></textarea></div>
			<input type="hidden" name="id_post" value="<?php echo $_GET['id']; ?>">
			<input type="submit">
		</fieldset>
	</form>

<?php } // endif ?>

</body>
</html>