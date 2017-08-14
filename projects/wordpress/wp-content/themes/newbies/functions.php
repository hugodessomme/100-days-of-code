<?php
define('NEWBIES_VERSION', '1.0.0');

// Chargement des styles / scripts côté front
function newbies_scripts() {
	// Styles
	wp_enqueue_style('newbies_bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), NEWBIES_VERSION, 'all');
	wp_enqueue_style('newbies_main', get_template_directory_uri() . '/style.css', array('newbies_bootstrap'), NEWBIES_VERSION, 'all');

	// Scripts
	wp_enqueue_script('newbies_bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), NEWBIES_VERSION, true); // false: wp_head() VS true: wp_footer()
	wp_enqueue_script('newbies_main_js', get_template_directory_uri() . '/js/main.js', array('jquery', 'newbies_bootstrap_js'), NEWBIES_VERSION, true); // false: wp_head() VS true: wp_footer()
}
add_action('wp_enqueue_scripts', 'newbies_scripts');

// Chargement des styles / scripts côté back
function newbies_admin_scripts() {
	wp_enqueue_style('newbies_admin_bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), NEWBIES_VERSION, 'all');
}
// add_action('admin_init', 'newbies_admin_scripts'); A DECOMMENTER POUR TESTER

// Utilitaires
function newbies_setup() {
	// Active l'image à la une
	add_theme_support('post-thumbnails');

	// Supprime le numéro de version du head
	remove_action('wp_head', 'wp_generator');

	// Supprime les guillemets à la française
	remove_filter('the_content', 'wptexturize');

	// Affiche le title dans le head
	add_theme_support('title-tag');

	// Récupère le fichier de walker de navigation
	require_once('includes/wp-bootstrap-navwalker.php');

	// Active les menus
	register_nav_menus( array('primary' => 'principal') );
}
add_action('after_setup_theme', 'newbies_setup');

// Affichage de la date + catégorie
function newbies_get_the_date_category( $datetime, $date, $category ) {

	$output = '<p>publié le <time class="entry-date" datetime="';
	$output .= $datetime;
	$output .= '">';
	$output .= $date;
	$output .= '</time>, dans la catégorie ';
	$output .= $category;
	$output .= '</p>';

	return $output;
}