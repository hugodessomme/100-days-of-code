<?php
	// Header
	$title = 'Modifier un article - Admin Blog';
	include '../templates/header.php';
?>

<?php
	// Connexion à la BDD
	include '../inc/bdd.php';
?>

<?php
	if( !isset($_POST['titre']) && !isset($_POST['contenu']) ) {

		// Récupère les données l'article
		$query = $bdd->prepare('
			SELECT *
			FROM blog_post
			WHERE id = ?
		');
		$query->execute(array($_GET['id']));
		$data = $query->fetch();
		include '../templates/admin/post-update.php';
		$query->closeCursor();

	} else {
		// Met à jour l'article
		$query = $bdd->prepare('
			UPDATE blog_post
			SET titre = :titre, contenu = :contenu
			WHERE id = :id
		');
		$query->execute(array(
			'id' => $_GET['id'],
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