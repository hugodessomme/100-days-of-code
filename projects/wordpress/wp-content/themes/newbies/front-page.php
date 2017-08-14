<?php get_header(); ?>

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