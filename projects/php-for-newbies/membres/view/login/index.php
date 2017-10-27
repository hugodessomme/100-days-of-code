<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<form method="post" style="width: 600px;margin: auto;" class="form-horizontal">
			<fieldset>
				<legend>Connexion</legend>

				<div class="form-group">
					<label for="login[pseudo]" class="control-label col-xs-4">Pseudo</label>
					<div class="col-xs-8">
						<input
							type="text"
							class="form-control"
							name="login[pseudo]"
							id="login[pseudo]">
					</div>
				</div>
				<div class="form-group">
					<label for="login[pass]" class="control-label col-xs-4">Mot de passe</label>
					<div class="col-xs-8">
						<input
							type="password"
							class="form-control"
							name="login[pass]"
							id="login[pass]">
					</div>
				</div>

				<input type="submit" class="btn btn-block btn-primary">
				<p class="text-right"><a href="?page=inscription">S'inscrire</a></p>
			</fieldset>
		</form>
	</div>

</body>
</html>