<?php
	// Header
	$title = 'Accueil - Blog';
	include 'templates/header.php';
?>

<h1>Mon super blog !</h1>

<?php
	// Connexion à la BDD
	include 'inc/bdd.php';

	// Définition de la pagination
	$nb_posts_par_page = 5;

	if( isset($_GET['page']) ) {
		$first_post = ($_GET['page'] * $nb_posts_par_page) - $nb_posts_par_page;
	} else {
		$first_post = 0;
	}

	// Récupère les 5 derniers articles
	$query = $bdd->prepare('
		SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") AS date_creation
		FROM blog_post
		ORDER BY date_creation DESC
		LIMIT '.$first_post.', '.$nb_posts_par_page.'
	');
	$query->execute();

	// Affichage d'un résultat
	while( $data = $query->fetch() ) {
		include 'templates/post-list.php';
	}
	$query->closeCursor();

	// Système de pagination
	$query = $bdd->query('SELECT COUNT(*) AS nb_posts FROM blog_post');
	$data = $query->fetch();

	if( $data['nb_posts'] <= $nb_posts_par_page ) {
		echo "<p>Il n'y a pas besoin de pagination</p>";
	} else {
		$nb_pages = ceil( $data['nb_posts'] / $nb_posts_par_page ); // Arrondit à l'entier supérieur

		echo '<ul>';
		for( $i = 1; $i <= $nb_pages; $i++ ) {
			echo '<li><a href="index.php?page=' . $i . '">' . $i . '</a></li>';
		}
		echo '</ul>';
	}

	$query->closeCursor();
?>

<?php
	// Footer
	include 'templates/footer.php';
?>