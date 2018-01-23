<?php

require 'Controleur/Controleur.php';

try {
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'billet') {
			if (isset($_GET['id'])) {
				$idBillet = intval($_GET['id']);

				if ($idBillet != 0) {
					billet($idBillet);

					require 'viewBillet.php';
				}
				else
					throw new Exception("Identifiant de billet incorrect");
			}
			else
				throw New Exception("Identifiant de billet non défini");
		}
		else
			throw new Exception("Action non valide");
	}
	else {
		accueil();
	}
}
catch(Exception $e) {
	error($e->getMessage);
}