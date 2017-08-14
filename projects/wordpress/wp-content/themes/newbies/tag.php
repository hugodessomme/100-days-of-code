<?php get_header(); ?>

	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1 class="lead">Articles avec l'étiquette <?php single_tag_title(); ?></h1>
			</div>
		</div>

		<?php if( have_posts() ): ?>

			<?php while( have_posts() ): the_post(); ?>

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