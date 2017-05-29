<?php
	// Header
	$title = 'Accueil - Blog';
	include 'templates/header.php';
?>

<h1>Mon super blog !</h1>

<?php
	// Connexion à la BDD
	include 'inc/bdd.php';

	// Récupère les 5 derniers articles
	$query = $bdd->query('
		SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") AS date_creation
		FROM blog_post
		ORDER BY date_creation DESC
		LIMIT 0, 5
	');

	// Affichage d'un résultat
	while( $data = $query->fetch() ) {
		include 'templates/post-list.php';
	}
	$query->closeCursor();

?>

<?php
	// Footer
	include 'templates/footer.php';
?>