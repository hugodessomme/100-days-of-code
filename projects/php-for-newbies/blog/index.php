<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Accueil - Blog</title>
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

<?php
	// Connexion à la BDD
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=github-php-for-newbies;charset=utf8', 'root', 'root');
	}
	catch(Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}

	// Récupère les 5 derniers articles
	$query = $bdd->query('
		SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") AS date_creation
		FROM blog_post
		ORDER BY date_creation DESC
		LIMIT 0, 5
	');

	// Affichage d'un résultat
	while( $data = $query->fetch() ) {
		echo '<div class="news">';
		echo '<h3>' . htmlspecialchars($data['titre']) . ' le ' . $data['date_creation'] . '</h3>';
		echo '<p>' . nl2br(htmlspecialchars($data['contenu'])) . '</p>';
		echo '<a href="comments.php?id='.$data['id'].'">Commentaires</a>';
		echo "</div>";
	}
	$query->closeCursor();

?>

</body>
</html>