<?php get_header(); ?>

	<div class="container">
		<?php if( have_posts() ): ?>
					
			<?php while( have_posts() ): the_post(); ?>

				<div class="row">
					<div class="col-xs-12">
						<h1><?php the_title(); ?></h1>
						
						<?php  
							echo newbies_get_the_date_category(
								get_the_date( 'c'),
								get_the_date(),
								get_the_category_list(', ')
							);
						?>

						<p><?php the_content(); ?></p>
					</div>
				</div>
			<?php endwhile; ?>

			<div class="row">
				<div class="col-xs-12">
					<nav class="pager">
						<ul>
							<li><?php previous_post_link(); ?></li>
							<li><?php next_post_link(); ?></li>
						</ul>
					</nav>
				</div>
			</div>

		<?php else: ?>
			<div class="row">
				<div class="col-xs-12">
					<p>Pas de résultats</p>
				</div>
			</div>
		<?php endif; ?>
	</div>

<?php get_footer(); ?>