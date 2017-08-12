<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" conten="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, delectus?">
	<?php wp_head(); ?>
</head>

<body>
	<header>
		<nav class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Project name</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="./">Active</a></li>
						<li><a href="../navbar-fixed-top/">Lien</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>
	</header>

	<div class="container">
		<?php if( have_posts() ): ?>
					
			<?php while( have_posts() ): the_post(); ?>
				<div class="row">
					<div class="col-xs-2">
						<?php the_post_thumbnail('thumbnail', ['class' => 'img-responsive']); ?>
					</div>
					<div class="col-xs-10">
						<h1><?php the_title(); ?></h1>
						<p><?php the_excerpt(); ?></p>
					</div>
				</div>
			<?php endwhile; ?>

		<?php else: ?>
			<div class="row">
				<div class="col-xs-12">
					<p>Pas de résultats</p>
				</div>
			</div>
		<?php endif; ?>
	</div>

<?php wp_footer(); ?>
</body>
</html>