<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="A_REMPLIR"/>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<h1>Inscription</h1>

		<?php if( isset($_POST['inscription']) ) {

		}

		else {
			foreach($pseudos as $pseudo) {
				echo $pseudo['pseudo'];
			}
		?>

			<form method="post">
				<div class="form-group">
					<label for="inscription[pseudo]">Pseudo</label>
					<input type="text" id="inscription[pseudo]" name="inscription[pseudo]" class="form-control">
				</div>
				<div class="form-group">
					<label for="inscription[password]">Mot de passe</label>
					<input type="password" id="inscription[password]" name="inscription[password]" class="form-control">
				</div>
				<div class="form-group">
					<label for="inscription[password-confirm]">Confirmation de mot de passe</label>
					<input type="password" id="inscription[password-confirm]" name="inscription[password-confirm]" class="form-control">
				</div>
				<div class="form-group">
					<label for="inscription[email]">Email</label>
					<input type="email" id="inscription[email]" name="inscription[email]" class="form-control">
				</div>
				<div class="text-right"><input type="submit" class="btn btn-primary"></div>
			</form>
		<?php } ?>
	</div>
</body>
</html>