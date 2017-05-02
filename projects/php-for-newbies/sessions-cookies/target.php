<?php
	// Initialisation de session
	session_start();

	// Modification d'un cookie existant
	setcookie('premium', 'oui', time() + 365*24*3600, null, null, false, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sessions and Cookies</title>
</head>
<body>
	<h1>Bonjour <?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?></h1>
	<p>Vous avez <?php echo $_SESSION['age']; ?> ans.</p>
	<p>Premium ? <?php echo $_COOKIE['premium'] ?>.</p>
</body>
</html>