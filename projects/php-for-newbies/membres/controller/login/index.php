<?php

	/* Gestion de la connexion d'un utilisateur */
	if(isset($_POST['login'])) {
		$pseudo = strip_tags($_POST['login']['pseudo']);
		$pass = hash('sha256', $_POST['login']['pass']);

		/* Vérifie la correspondance du pseudo / mot de passe */
		include_once('model/login/check_login.php');
		if(check_login($pseudo, $pass)){
			session_start();
			$_SESSION['pseudo'] = $pseudo;

			header('Location: index.php?page=logout');
		} else {
			echo "Mauvais identifiant / mot de passe";
		}
	}

	// Affiche la vue
	include_once('view/login/index.php');