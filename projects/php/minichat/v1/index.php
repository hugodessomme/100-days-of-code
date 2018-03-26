<?php
	// Connexion à la BDD
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=github-php-for-newbies;charset=utf8', 'root', 'root');
	}
	catch(Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
?>

<?php /* Formulaire d'ajout d'un commentaire */ ?>
<form action="post.php" method="post">
	<fieldset>
		<legend>Votre message</legend>

		<label for="pseudo">Pseudo : </label>
		<input
			type="text"
			name="pseudo"
			id="pseudo"
			value="<?php if( isset($_COOKIE['pseudo']) ) { echo $_COOKIE['pseudo']; } ?>"><br>

		<label for="message">Message : </label>
		<input type="text" name="message" id="message"><br>
	</fieldset>
	<input type="submit">
</form>

<?php /* Rafraîcihir les commentaires */ ?>
<a href="index.php">Rafraîchir les commentaires</a>

<?php
	// Affiche les commentaires
	$query = $bdd->query('SELECT * FROM minichat ORDER BY id DESC LIMIT 0, 10');

	echo '<ul>';
	while( $entry = $query->fetch() ) {
		echo '<li><p><strong>' . htmlspecialchars($entry['pseudo']) . '</strong></p>';
		echo '<p><em>' . htmlspecialchars($entry['message']) . '</em></p></li>';
	}
	echo '</ul>';

	$query->closeCursor();
?>