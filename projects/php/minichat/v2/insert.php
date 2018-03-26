<?php
	// Connexion à la BDD
	include_once 'bdd.php';

	if( isset($_POST['comment']) ) {
		$pseudo = strip_tags($_POST['comment']['pseudo']);
		$message = strip_tags($_POST['comment']['message']);

		// Cookie
		setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);

		// Insert dans la BDD
		$query = $bdd->prepare('
			INSERT INTO minichat_update(pseudo, message, date_creation)
			VALUES (:pseudo, :message, NOW())
		');
		$query->execute(array(
			'pseudo' => $pseudo,
			'message' => $message
		));

		header('Location: index.php');

	} else {
		echo '<p>Que faites-vous ici ? <a href="index.php">Revenez plutôt par là</a></p>';
	}
?>