<?php

	/* Gestion de l'inscription d'un utilisateur */
	if(isset($_POST['inscription'])) {
		$pseudo = strip_tags($_POST['inscription']['pseudo']);
		$pass = hash('sha256', $_POST['inscription']['pass']);
		$pass2 = hash('sha256', $_POST['inscription']['pass2']);
		$email = strip_tags($_POST['inscription']['email']);

		/* Vérifie si le pseudo existe déjà */
		include_once('model/inscription/check_pseudo_exists.php');
		if(check_pseudo_exists($pseudo)) {
			echo "Le pseudo existe déjà !";
		}

		/* Vérifie si les mots de passe sont identiques */
		elseif($pass !== $pass2) {
			echo "Les mots de passe ne sont pas identiques";
		}

		/* Vérifie si l'email est correct */
		elseif(!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}.[a-z]{2,4}$#', $email)) {
			echo "Le format d'email est incorrect";
		}

		/* Ajoute l'utilisateur à la BDD */
		else {
			include_once('model/inscription/create_user.php');
			create_user($pseudo, $pass, $email);

			echo "Compte crée !";
		}
	}

	// Affiche la vue
	include_once('view/inscription/index.php');