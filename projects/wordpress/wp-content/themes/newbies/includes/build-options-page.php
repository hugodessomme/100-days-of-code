<?php

function newbies_build_options_page() {
	$theme_opts = get_option('newbies_opts');
?>

	<div class="wrap">
		<div class="container">

			<?php if( isset($_GET['status']) && $_GET['status'] == 1) {
				echo '<div class="alert alert-success">Mise à jour effectuée avec succès</div>';
			} ?>

			<div class="jumbotron">
				<h1 class="h2">Paramètres du site</h1>
			</div>

			<form action="admin-post.php" id="form-newbies-options" class="form-horizontal" method="post">
				<input type="hidden" name="action" value="newbies_save_options">
				<?php
					//add_action('admin_post_newbies_save_options', );
					wp_nonce_field('newbies_options_verify');
				?>

				<?php // @todo EP5S02  ?>
				<div class="col-xs-12">
					<h1 class="h2">Image du logo en page d'accueil (haut de page)</h1>

					<div class="row">
						<div class="col-lg-5">
							<img style="margin-bottom: 20px;" id="img-preview-01" src="<?php echo $theme_opts['image_01_url']; ?>" class="img-responsive img-thumbnail" alt="">
						</div>

						<div class="col-lg-6 col-lg-offset-1">
							<button class="btn-btn-primary btn-lg btn-select-img" type="button" id="btn_img_01">
								Choisir une image pour le logo
							</button>
						</div>
					</div>
				</div>

				<div class="col-xs-12">
					<div class="form-group">
						<label for="newbies_legend_01" class="col-sm-2 control-label">Légende</label>

						<div class="col-sm-10">
							<input
								type="text"
								id="newbies_legend_01"
								name="newbies_legend_01"
								value="<?php echo $theme_opts['legend_01']; ?>"
								style="width: 100%;">
						</div>
					</div>
				</div>

				<div><button id="validator" type="submit" class="btn btn-success btn-lg">Mettre à jour</button></div>
			</form>
		</div>
	</div>

<?php
}