<?php
	// Si le formulaire n'a pas été envoyé
	if( !isset($_POST['search-console']) OR !isset($_POST['search-price']) OR !isset($_POST['search-players']) ) {
?>

		<form action="form.php" name="form" method="post">
			<label>Console</label>
			<select name="search-console">
				<option value="NES">NES</option>
				<option value="Megadrive">Megadrive</option>
				<option value="Nintendo 64">Nintendo 64</option>
				<option value="GameCube">GameCube</option>
				<option value="Xbox">Xbox</option>
				<option value="PC">PC</option>
				<option value="SuperNes">SuperNes</option>
				<option value="PS2">PS2</option>
			</select>

			<label style="margin-left: 20px;">Prix</label>
			<input type="text" name="search-price" placeholder="Prix inferieur a...">

			<label style="margin-left: 20px;">Nombre de joueurs max</label>
			<select name="search-players">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="4">4</option>
				<option value="6">6</option>
				<option value="8">8</option>
				<option value="32">32</option>
			</select>

			<input type="submit">
		</form>

<?php
	// Si le formulaire a été envoyé
	} else {
		try {
			// Connexion à la BDD
			$bdd = new PDO('mysql:host=localhost;dbname=github-php-for-newbies;charset=utf8', 'root', 'root');
		}
		catch(Exception $e) {
			die('Erreur : ' . $e->getMessage());
		}

		// Requête SQL préparée
		$query = $bdd->prepare('
			SELECT nom, console, prix, nbre_joueurs_max
			FROM jeux_video
			WHERE console = :console AND prix <= :prix AND nbre_joueurs_max = :players
		');
		$query->execute(array(
			'console' => $_POST['search-console'],
			'prix' => $_POST['search-price'],
			'players' => $_POST['search-players']
		));

		// Affichage des résultats
		echo '<ul>';
		while( $entry = $query->fetch() ) {
			echo '<li style="margin-bottom: 10px;">' . $entry['nom'] . '<br>Console : ' . $entry['console'] . '<br>Prix : ' . $entry['prix'] . '<br>Joueurs max : ' . $entry['nbre_joueurs_max'];
		}
		echo '</ul>';
	}
?>