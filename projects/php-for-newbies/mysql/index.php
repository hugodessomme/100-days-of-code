<?php
	// Gestion d'erreur de connexion (try, catch)
	try {
		// Connexion à la BDD
		$bdd = new PDO('mysql:host=localhost;dbname=github-php-for-newbies;charset=utf8', 'root', 'root');
	}
	catch(Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}

	// Requête SQL
	$query = $bdd->query('SELECT * FROM jeux_video WHERE possesseur=\'Patrick\' AND prix < 20 ORDER BY nom LIMIT 1, 2');

	// On boucle sur chaque entrée et on les affiche
	while($entry = $query->fetch()) {
		echo '<p>';
		echo 'Nom : ' . $entry['nom'] . '<br>';
		echo 'Possesseur : ' . $entry['possesseur'] . '<br>';
		echo 'Prix : ' . $entry['prix'] . '<br>';
		echo 'Console : ' . $entry['console'] . '<br>';
		echo 'Nb joueurs max : ' . $entry['nbre_joueurs_max'] . '<br>';
		echo 'Commentaires : ' . $entry['commentaires'] . '<br>';
		echo '</p>';
	}
	$query->closeCursor();

?>

<a href="target.php?possesseur=Michel&prix=30">Requête préparée</a>
<a href="form.php">Formulaire de recherche</a>
