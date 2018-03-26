<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<p>Bonjour <?php echo $_SESSION['pseudo']; ?> </p>
		<a href="index.php">Déconnexion</a>
	</div>
</body>
</html>