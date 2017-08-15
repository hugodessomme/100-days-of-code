<?php

function newbies_save_options() {
	if( !current_user_can('publish_pages') ) {
		wp_die('Vous n\'êtes pas autorisé à effectuer cette opération');
	}
	check_admin_referer('newbies_options_verify');

	$opts = get_option('newbies_opts');

	$opts['legend_01'] = sanitize_text_field( $_POST['newbies_legend_01'] );
	update_option('newbies_opts', $opts);

	wp_redirect( admin_url('admin.php?page=newbies_theme_opts&status=1') );
	exit;
}