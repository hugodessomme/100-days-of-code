<?php
	// Header
	$title = 'Ajouter un article - Admin Blog';
	include '../templates/header.php';
?>

<?php
	if( !isset($_POST['titre']) && !isset($_POST['contenu']) ) {
		// Formulaire d'jaout d'un article
		include '../templates/admin/post-add.php';

	} else {
		// Connexion à la BDD
		include '../inc/bdd.php';

		// Crée un nouvel article
		$query = $bdd->prepare('
			INSERT INTO blog_post(titre, contenu, date_creation)
			VALUES (:titre, :contenu, NOW())
		');
		$query->execute(array(
			'titre' => $_POST['titre'],
			'contenu' => $_POST['contenu'],
		));
		$query->closeCursor();

		header('Location: index.php');
	}
?>

<?php
	// Footer
	include '../templates/footer.php';
?>