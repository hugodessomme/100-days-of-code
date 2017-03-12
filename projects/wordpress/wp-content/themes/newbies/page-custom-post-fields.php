<?php get_header(); ?>

<div class="row">
	<div class="col-sm-12">
		<?php 
		while( have_posts() ) : the_post();		
			the_content();
		endwhile;
		?>

		<?php 
			// Custom Post Type with Fields Loop
			$args = array(
						'post_type' => 'custom_post_fields'
					);
			$query = new WP_Query( $args );
		?>

		<?php
		while( $query->have_posts() ) : $query->the_post(); 
		?>
			<?php
			$meta = get_post_meta( $post->ID, 'your_fields', true ); 
			?>

			<div class="blog-post">
				<h2 class="blog-post-title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h2>
				<?php the_excerpt(); ?>
			</div>

		<?php 
		endwhile; 
		?>

	</div> <!-- /.col -->
</div>

<?php get_footer(); ?>