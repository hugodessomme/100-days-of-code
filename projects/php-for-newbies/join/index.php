<?php
	// Gestion d'erreur de connexion (try, catch)
	try {
		// Connexion à la BDD
		$bdd = new PDO('mysql:host=localhost;dbname=github-php-for-newbies;charset=utf8', 'root', 'root');
	}
	catch(Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}

	// Jointure interne : Ancienne syntaxe (WHERE)
	$query = $bdd->query('
		SELECT j.nom AS nom_jeu, p.prenom AS prenom_proprietaire
		FROM jeux_video AS j, proprietaires AS p
		WHERE j.ID_proprietaire = p.ID
	');

	// OU (AS facultatif)
	// $query = $bdd->query('
	// 		SELECT j.nom nom_jeu, p.prenom prenom_proprietaire
	// 		FROM jeux_video j, proprietaires p
	// 		WHERE j.ID_proprietaire = p.ID
	// ');

	while($data = $query->fetch()) {
		echo $data['nom_jeu'] . ' => ' . $data['prenom_proprietaire'] . '<br>';
	}
	$query->closeCursor();



	// Jointure interne : Nouvelle syntaxe (JOIN)
	$query = $bdd->query('
		SELECT j.nom nom_jeu, p.prenom prenom_proprietaire
		FROM proprietaires p
		INNER JOIN jeux_video j
		ON j.ID_proprietaire = p.ID
	');

	while($data = $query->fetch()) {
		echo $data['nom_jeu'] . ' => ' . $data['prenom_proprietaire'] . '<br>';
	}
	$query->closeCursor();



	// Jointure externe (LEFT JOIN / RIGHT JOIN)
	$query = $bdd->query('
		SELECT j.nom nom_jeu, p.prenom prenom_proprietaire
		FROM proprietaires p
		LEFT JOIN jeux_video j
		ON j.ID_proprietaire = p.ID
	');

	while($data = $query->fetch()) {
		echo $data['nom_jeu'] . ' => ' . $data['prenom_proprietaire'] . '<br>';
	}
	$query->closeCursor();
?>