<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<form method="post" action="index.php" style="width: 600px;margin: auto;" class="form-horizontal">
			<fieldset>
				<legend>Inscription</legend>

				<div class="form-group">
					<label for="inscription[pseudo]" class="control-label col-xs-4">Pseudo</label>
					<div class="col-xs-8">
						<input
							type="text"
							class="form-control"
							name="inscription[pseudo]"
							id="inscription[pseudo]">
					</div>
				</div>
				<div class="form-group">
					<label for="inscription[pass]" class="control-label col-xs-4">Mot de passe</label>
					<div class="col-xs-8">
						<input
							type="password"
							class="form-control"
							name="inscription[pass]"
							id="inscription[pass]">
					</div>
				</div>
				<div class="form-group">
					<label for="inscription[pass2]" class="control-label col-xs-4">Retapez le mot de passe</label>
					<div class="col-xs-8">
						<input
							type="password"
							class="form-control"
							name="inscription[pass2]"
							id="inscription[pass2]">
					</div>
				</div>
				<div class="form-group">
					<label for="inscription[email]" class="control-label col-xs-4">Email</label>
					<div class="col-xs-8">
						<input
							type="text"
							class="form-control"
							name="inscription[email]"
							id="inscription[email]">
					</div>
				</div>

				<input type="submit" class="btn btn-block btn-primary">
				<p class="text-right"><a href="?page=login">Se connecter</a></p>
			</fieldset>
		</form>
	</div>

</body>
</html>