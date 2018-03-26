<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Minichat amélioré</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1 class="text-center">Minichat amélioré</h1>

		<div class="row">
			<div class="col-sm-6 col-sm-push-3">

				<?php /* Envoi d'un message */ ?>
				<h2>Envoyer un message</h2>

				<form action="insert.php" method="post" class="form-horizontal">
					<div class="form-group">
						<label for="comment[pseudo]" class="control-label col-sm-3">Pseudo :</label>
						<div class="col-sm-9">
							<input type="text" id="comment[pseudo]" name="comment[pseudo]" class="form-control" value="<?php if( isset($_COOKIE['pseudo']) ) { echo $_COOKIE['pseudo']; } ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="comment[message]" class="control-label col-sm-3">Message :</label>
						<div class="col-sm-9">
							<textarea id="comment[message]" name="comment[message]" class="form-control"></textarea>
						</div>
					</div>

					<div class="text-right"><input type="submit" value="Publier" class="btn btn-primary"></div>
				</form>

				<?php /* Liste des messages */ ?>
				<h2>Messages</h2>



						<?php
							include_once 'bdd.php';

							$query = $bdd->query('
								SELECT pseudo, message, DATE_FORMAT(date_creation, "le %d/%m/%Y, à %Hh%imin%ss") AS date_creation
								FROM minichat_update
								ORDER BY date_creation DESC'
							);

							while( $data = $query->fetch() ) {
								echo '<div class="panel panel-default">';
								echo '<div class="panel-heading">';
								echo '<p class="panel-title h3" style="margin-top: 0;">' . $data['pseudo'] . '<span class="badge pull-right">' . $data['date_creation'] . '</span></p>';
								echo '</div>';
								echo '<div class="panel-body">' . $data['message'] . '</div>';
								echo '</div>';
							}
						?>

			</div> <?php /* /.col */ ?>
		</div> <?php /* /.row */ ?>
	</div> <?php /* /.container */ ?>
</body>
</html>