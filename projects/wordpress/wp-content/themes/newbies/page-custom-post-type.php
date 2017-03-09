<?php get_header(); ?>

<div class="row">
	<div class="col-sm-12">

		<?php
			// Custom Post Type Loop
			$args = array(
						'post-type' => 'my_custom_post_type',
						'order_by' => 'menu_order',
						'order' => 'ASC'
					);
			$custom_query = new WP_Query( $args );			
		?>
		
		<?php while( $custom_query->have_posts() ) : $custom_query->the_post();	?>
	
			<div class="blog-post">
				<h2 class="blog-post-title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h2>
				<?php the_excerpt(); ?>
			</div>

		<?php endwhile; ?>

	</div>
</div>

<?php get_footer(); ?>