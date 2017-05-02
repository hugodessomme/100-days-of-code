<?php
	// Initialisation de session
	session_start();
	$_SESSION['prenom'] = "Bruce";
	$_SESSION['nom'] = "Wayne";
	$_SESSION['age'] = 27;

	// Initialisation d'un cookie en mode httpOnly
	setcookie('premium', 'non', time() + 365*24*3600, null, null, false, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sessions & Cookies</title>
</head>
<body>

	<a href="target.php">Lien</a>

</body>
</html>