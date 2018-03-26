<?php
	// Vérification des identifiants / mot de passe
	if( isset($_POST['login']) && isset($_POST['password']) ) {

		$login = htmlspecialchars($_POST['login']);
		$password = htmlspecialchars($_POST['password']);

		if( $login !== 'root' || $password !== 'root' ) {
			echo '<p>Login / mot de passe incorrects</p>';
			echo '<p><a href="index.php">Retour</a></p>';
		} else {
			header('Location: dashboard.php');
		}

	} else {
?>

<form action="index.php" method="post">
	<fieldset>
		<legend>Login / Mot de passe</legend>
		<div><input type="text" name="login" placeholder="Login"></div>
		<div><input type="password" name="password" placeholder="Mot de passe"></div>
		<input type="submit">
	</fieldset>
</form>

<?php
	}
?>