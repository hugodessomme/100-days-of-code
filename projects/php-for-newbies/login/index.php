<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<h1>Login</h1>
	<p>Help: This animal jumps in Australia</p>
	<form action="target.php" method="post">
		<input type="password" name="password">
		<input type="submit">
	</form>

	<h2>The same but on a single page</h2>
	<?php
		// Si le mot de passe n'est pas envoyé ou incorrect
		if( !isset($_POST['password-single']) OR $_POST['password-single'] != "kangaroo" ) {
	?>
		<form action="index.php" method="post">
			<?php
				// Si le mot des passe est envoyé et incorrect
				if( isset($_POST['password-single']) AND $_POST['password-single'] != "kangaroo" ) {
					echo "<p>Fail!</p>";
				}
			?>

			<input type="password" name="password-single">
			<input type="submit">
		</form>
	<?php
		} else {
			echo "<p>Logged!<br>Here is the NASA password: 1234</p>";
		}
	?>
</body>
</html>