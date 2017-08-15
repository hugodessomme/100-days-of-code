<?php
define('NEWBIES_VERSION', '1.0.0');
/////////////////////////////////////////////
// Chargement des styles / scripts côté front
/////////////////////////////////////////////

function newbies_scripts() {
	// Styles
	wp_enqueue_style('newbies_bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), NEWBIES_VERSION, 'all');
	wp_enqueue_style('newbies_main', get_template_directory_uri() . '/style.css', array('newbies_bootstrap'), NEWBIES_VERSION, 'all');

	// Scripts
	wp_enqueue_script('newbies_bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), NEWBIES_VERSION, true); // false: wp_head() VS true: wp_footer()
	wp_enqueue_script('newbies_main_js', get_template_directory_uri() . '/js/main.js', array('jquery', 'newbies_bootstrap_js'), NEWBIES_VERSION, true); // false: wp_head() VS true: wp_footer()
}
add_action('wp_enqueue_scripts', 'newbies_scripts');

/////////////////////////////////////////////



////////////////////////////////////////////
// Chargement des styles / scripts côté back
////////////////////////////////////////////

function newbies_admin_init() {

	function newbies_admin_scripts() {
		if( !isset($_GET['page']) || $_GET['page'] != "newbies_theme_opts") {
			return;
		}
		wp_enqueue_style('newbies_admin_bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), NEWBIES_VERSION, 'all');
	} // end newbies_admin_scripts
	add_action('admin_enqueue_scripts', 'newbies_admin_scripts');

	include('includes/save-options-page.php');
	add_action('admin_post_newbies_save_options', 'newbies_save_options');

} // end newbies_admin_init
add_action('admin_init', 'newbies_admin_init');

////////////////////////////////////////////



//////////////
// Utilitaires
//////////////

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

//////////////



////////////////////////////////////////////////
// Affichage de la date + catégorie + étiquettes
////////////////////////////////////////////////

function newbies_get_metas( $datetime, $date, $category, $tags ) {

	$output = '<p>publié le <time class="entry-date" datetime="';
	$output .= $datetime;
	$output .= '">';
	$output .= $date;
	$output .= '</time>, dans la catégorie ';
	$output .= $category;
	$output .= ' avec les étiquettes : ' . $tags;
	$output .= '</p>';

	return $output;
}

////////////////////////////////////////////////



//////////////////////////////////////////
// Modifie le texte de suite de l'excerpt
//////////////////////////////////////////

function newbies_excerpt( $more ) {
	return ' <a class="more-link" href="' . get_permalink() . '">' . '[lire la suite]' . '</a>';
}
add_filter('excerpt_more', 'newbies_excerpt');

//////////////////////////////////////////



//////////////////////////
// Activation des options
//////////////////////////

function  newbies_activ_options() {
	$theme_opts = get_option('newbies_opts');

	if( !$theme_opts ) {
		$opts = array(
			'img_01_url' => '',
			'legend_01' => ''
		);
		add_option('newbies_opts', $opts);
	}
}
add_action('after_switch_theme', 'newbies_activ_options');

function newbies_admin_menus() {
	add_menu_page(
		'Newbies Options',
		'Options du thème',
		'publish_pages',
		'newbies_theme_opts',
		'newbies_build_options_page'
	);

	include('includes/build-options-page.php'); // fonction newbies_buil_options_page
}
add_action('admin_menu', 'newbies_admin_menus');

//////////////////////////



/////////////////////
// Sidebar et widgets
/////////////////////

function newbies_widgets_init() {
	register_sidebar( array(
		'name'          => 'Footer Widget Zone',
		'id'            => 'widgetized-footer',
		'description'   => 'Widgets affichés dans le footer : 4 au maximum',
		'before_widget' => '<div id="%1$s" class="col-xs-3 %2$s"><div class="inside-widget">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h2 class="h3 text-center">',
		'after_title'   => '</h2>'
	));
}
add_action( 'widgets_init', 'newbies_widgets_init');

/////////////////////