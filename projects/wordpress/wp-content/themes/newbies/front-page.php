<?php get_header(); ?>

<?php
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 2
	);
	$query = new WP_Query($args);
?>

<?php if( $query->have_posts() ): ?>
	<div class="container">
		<div class="row">
			<?php while( $query->have_posts() ): $query->the_post(); ?>

				<div class="col-xs-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2><?php the_title(); ?></h2>
						</div>
						<div class="panel-body">
							<?php
								the_post_thumbnail(
									'medium',
									array('class' => 'img-responsive')
								);
							?>

							<?php the_excerpt(); ?>
						</div>
						<div class="panel-footer">
							<?php
								// Affiche la date + catégorie
								echo newbies_get_metas(
									get_the_date( 'c' ),
									get_the_date(),
									get_the_category_list(', '),
									get_the_tag_list('', ', ')
								);
							?>
						</div>
					</div>
				</div>

			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
<?php endif; ?>

	<div class="container">
		<?php if( have_posts() ): ?>

			<?php while( have_posts() ): the_post(); ?>
				<div class="row">
					<div class="col-xs-12">
						<?php the_content(); ?>
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