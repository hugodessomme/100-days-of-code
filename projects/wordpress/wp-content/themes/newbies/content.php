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
			echo newbies_get_metas(
				get_the_date( 'c' ),
				get_the_date(),
				get_the_category_list(', '),
				get_the_tag_list('', ', ')
			);
		?>
		<?php the_excerpt(); ?>
	</div>
</div>