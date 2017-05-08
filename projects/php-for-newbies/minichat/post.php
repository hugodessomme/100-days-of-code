<?php
	// Si le formulaire a déjà été soumis, on enregistre le pseudo dans un cookie
	session_start();

	if( isset($_POST['pseudo'])) {
		setcookie('pseudo', htmlspecialchars($_POST['pseudo']), time() + 365*24*3600, null, null, false, true);
	}

	// Connexion à la BDD
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=github-php-for-newbies;charset=utf8', 'root', 'root');
	}
	catch(Execption $e) {
		die('Erreur : ' . $e->getMessage());
	}

	// Ajoute une entrée
	if( isset($_POST['pseudo']) AND isset($_POST['message']) ) {
		$pseudo = htmlspecialchars($_POST['pseudo']); // Contre la faille XSS
		$message = htmlspecialchars($_POST['message']); // Contre la faille XSS

		$query = $bdd->prepare('
			INSERT INTO minichat(pseudo, message)
			VALUES (:pseudo, :message)
		');
		$query->execute(array(
			'pseudo' => $pseudo,
			'message' => $message
		));
	}

	// On redirige sur le page listant les commentaires
	header('Location: index.php');

?>