<?php
	// Header
	$title = 'Post - Blog';
	include 'templates/header.php';
?>

<h1>Mon super blog !</h1>
<a href="index.php">Retour à la liste des articles</a>

<?php
	// Connexion à la BDD
	include 'inc/bdd.php';
?>

<?php
	if( isset($_GET['id']) ) {
		// Récupère le post
		$query = $bdd->prepare('
			SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") AS date_creation
			FROM blog_post
			WHERE id = ?
		');
		$query->execute(array($_GET['id']));

		// Affichage du post
		$data = $query->fetch();
		if(empty($data)) {
			echo "<h3 style='color: red;'>Il n'existe pas d'article avec cet identifiant</p>";
		} else {
			include 'templates/post-detail.php';
		}
		$query->closeCursor();


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
			include 'templates/comment.php';
		}
		$query->closeCursor();


		// Formulaire d'ajout d'un comentaire
		include 'templates/add-comment.php';
	}
?>

<?php
	// Footer
	include 'templates/footer.php';
?>