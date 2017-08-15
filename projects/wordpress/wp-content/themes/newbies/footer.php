	<footer>
		<div class="container">
			<div class="row">
				<?php if ( is_active_sidebar( 'widgetized-footer' ) ) : ?>

					<?php dynamic_sidebar( 'widgetized-footer' ); ?>

				<?php else: ?>
					<p>Texte de fallback</p>
				<?php endif; ?>
			</div>
		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>