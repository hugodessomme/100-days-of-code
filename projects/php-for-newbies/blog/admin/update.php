<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modifier un article - Blog</title>
</head>
<body>
<?php
	// Connexion à la BDD
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=github-php-for-newbies;charset=utf8', 'root', 'root');
	}
	catch( Exception $e) {
		die( 'Erreur : ' . $e->getMessage() );
	}
?>

<?php if( !isset($_POST['titre']) && !isset($_POST['contenu']) ) { ?>

<?php
	// Récupère les données l'article
	$query = $bdd->prepare('
		SELECT *
		FROM blog_post
		WHERE id = ?
	');
	$query->execute(array($_GET['id']));
	$data = $query->fetch();
?>

		<form action="update.php?id=<?php echo $data['id']; ?>" method="post">
			<fieldset>
				<legend>Modifier un article</legend>
				<div><input type="text" name="titre" value="<?php echo $data['titre']; ?>"></div>
				<div><textarea name="contenu" cols="30" rows="10"><?php echo $data['contenu'] ?></textarea></div>
				<input type="submit">
			</fieldset>
		</form>

<?php
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

</body>
</html>