<<<<<<< Updated upstream
<?php get_header(); ?>

	<div class="container">
		<?php if( have_posts() ): ?>
					
			<?php while( have_posts() ): the_post(); ?>

				<div class="row">
					<div class="col-xs-2">
						<?php 
							// Récupère le chemin de l'image pour y attribuer la classe img-responsive
							if( $thumbnail_html = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail') ):

								$thumbnail_src = $thumbnail_html[0];
						?>
							<a href="<?php the_permalink(); ?>">
								<img src="<?php echo $thumbnail_src; ?>" class="img-responsive img-thumbnail" alt="">
							</a>
						<?php endif; ?>
					</div>
					<div class="col-xs-10">
						<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

						<?php 
							// Affiche la date + catégorie
							echo newbies_get_the_date_category(
								get_the_date( 'c' ),
								get_the_date(),
								get_the_category_list(', ')
							);
						?>
						<?php the_excerpt(); ?>
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

<?php get_footer(); ?>
=======
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Newbies</title>
	<?php wp_head(); ?>
</head>

<body>
	<h1>Coucou c'est moi !</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae ex culpa assumenda, nostrum similique delectus? Nesciunt placeat dicta consectetur sint repellendus provident nostrum autem veniam aut dolores, perspiciatis cumque magnam.</p>
</body>
</html>
>>>>>>> Stashed changes
