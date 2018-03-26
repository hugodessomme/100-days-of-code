<?php
	// Vérifie qu'un fichier existe et qu'il n'y a pas d'erreur de transfert
	if( isset($_FILES['file']) AND $_FILES['file']['error'] === 0 ) {

		// Vérifie que le fichier pèse moins d'1Mo
		if( $_FILES['file']['size'] <= 1000000) {

			// Récupère l'extension du fichier
			$extension = pathinfo($_FILES['file']['name']);
			$extension = $extension['extension'];
			$extension_ok = array('jpg', 'jpeg', 'png', 'gif');

			// Sauvegarde le fichier en local si l'extension fait partie de celles autorisées
			if( in_array($extension, $extension_ok) ) {
				move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . basename($_FILES['file']['name']));

				echo "Saved!";
			}
		}
	}
?>