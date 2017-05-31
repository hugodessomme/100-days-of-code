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
		$id = $_GET['id'];

		// Récupère le post
		$query = $bdd->prepare('
			SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") AS date_creation
			FROM blog_post
			WHERE id = ?
		');
		$query->execute(array($id));

		// Affichage du post
		$data = $query->fetch();
		if(empty($data)) {
			echo "<h3 style='color: red;'>Il n'existe pas d'article avec cet identifiant</p>";
		} else {
			include 'templates/post-detail.php';
		}
		$query->closeCursor();

		// Définition de la pagination
		$nb_comments_par_page = 2;

		if( isset($_GET['comment']) ) {
			$first_comment = ($_GET['comment'] * $nb_comments_par_page) - $nb_comments_par_page;
		} else {
			$first_comment = 0;
		}

		// Récupère les commentaires du post
		$query = $bdd->prepare('
			SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, "%d/%m/%Y à %Hh%imin%ss") AS date_commentaire
			FROM blog_comments
			WHERE id_post = ?
			ORDER BY date_commentaire DESC
			LIMIT '.$first_comment.', '.$nb_comments_par_page.'
		');
		$query->execute(array($id));

		echo '<h2>Commentaires</h2>';

		// Affichage des commentaires
		while( $data = $query->fetch() ) {
			include 'templates/comment.php';
		}
		$query->closeCursor();

		// Système de pagination
		$query = $bdd->prepare('
			SELECT COUNT(*) AS nb_comments
			FROM blog_comments
			WHERE id_post = ?
		');
		$query->execute(array($id));
		$data = $query->fetch();

		$nb_pages = ceil( $data['nb_comments'] / $nb_comments_par_page );

		if( $data['nb_comments'] <= $nb_comments_par_page ) {
			echo "Il n'y a pas besoin de pagination";
		} else {
			echo '<ul>';
			for( $i = 1; $i <= $nb_pages; $i++ ) {
				echo '<li><a href="comments.php?id=' . $id . '&amp;comment=' . $i . '">' . $i . '</a></li>';
			}
			echo '</ul>';
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