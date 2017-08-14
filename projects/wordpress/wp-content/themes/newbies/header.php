<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php if (is_home() ): ?>
		<meta name="description" content="Page d'accueil">
	<?php endif; ?>

	<?php if (is_front_page() ): ?>
		<meta name="description" content="Page d'accueil statique">
	<?php endif; ?>

	<?php if (is_page() && !is_front_page() ): ?>
		<meta name="description" content="Page">
	<?php endif; ?>

	<?php if (is_category() ): ?>
		<meta name="description" content="<?php single_cat_title(''); ?>">
	<?php endif; ?>

	<?php if (is_tag() ): ?>
		<meta name="description" content="<?php single_tag_title(''); ?>">
	<?php endif; ?>

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

				<?php
		            wp_nav_menu( array(
		                'menu'              => 'top-menu',
		                'theme_location'    => 'primary',
		                'depth'             => 2,
		                'container'         => 'div',
		                'container_class'   => 'collapse navbar-collapse',
		                'container_id'      => 'navbar',
		                'menu_class'        => 'nav navbar-nav navbar-right',
		                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
		                'walker'            => new WP_Bootstrap_Navwalker())
		            );
		        ?>
			</div>
		</nav>
	</header>