<?php get_header(); ?>

	<div class="container">

		<?php if( have_posts() ): ?>

			<?php while( have_posts() ): the_post(); ?>
				<?php the_ID(); ?>

				<?php get_template_part('content'); ?>

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