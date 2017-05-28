<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajouter un article - Blog</title>
</head>
<body>
<?php if( !isset($_POST['titre']) && !isset($_POST['contenu']) ) { ?>

		<form action="add.php" method="post">
			<fieldset>
				<legend>Ajouter un article</legend>
				<div><input type="text" name="titre" placeholder="titre"></div>
				<div><textarea name="contenu" placeholder="contenu" cols="30" rows="10"></textarea></div>
				<input type="submit">
			</fieldset>
		</form>

<?php
	} else {
		// Connexion à la BDD
		try {
			$bdd = new PDO('mysql:host=localhost;dbname=github-php-for-newbies;charset=utf8', 'root', 'root');
		}
		catch( Exception $e ) {
			die( 'Erreur : ' . $e->getMessage() );
		}

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
</body>
</html>