<?php

// Add CSS / JS
function startwordpress_scripts() 
{
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.5' );
	wp_enqueue_style( 'blog', get_template_directory_uri() . '/css/blog.css' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery'), '3.3.5', true );
}
add_action( 'wp_enqueue_scripts', 'startwordpress_scripts' );



// Add Google Fonts
function startwordpress_google_fonts() 
{
		wp_register_style('OpenSans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800');
		wp_enqueue_style( 'OpenSans');
}
add_action( 'wp_print_styles', 'startwordpress_google_fonts' );



// Wordpress Title
add_theme_support( 'title-tag' );



// Support Featured Images
add_theme_support( 'post-thumbnails' );



// Custom menu
// 1.Add a menu in admin
function custom_settings_add_menu() 
{
	add_menu_page( 'Paramètres personnalisés', 'Paramètres personnalisés', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99 );
}
add_action( 'admin_menu', 'custom_settings_add_menu' );


// 2. Add a form
function custom_settings_page()
{ ?>
	
	<div class="wrap">
		<h1>Custom Settings</h1>
		<form method="post" action="options.php">
			<?php 
				settings_fields( 'section' );
				do_settings_sections( 'theme-options' );
				submit_button();
			?>
		</form>
	</div>

<?php }

// 3. Add inputs
function setting_twitter() 
{ ?>
	 <input type="text" name="twitter" id="twitter" value="<?php echo get_option( 'twitter' ); ?>">
<?php }

function setting_github()
{ ?>
	 <input type="text" name="github" id="github" value="<?php echo get_option( 'github' ); ?>">
		
<?php }

// 4. Add action (save) on these inputs
function custom_settings_page_setup() 
{
	add_settings_section( 'section', 'All settings', null, 'theme-options' );
	add_settings_field( 'twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'section' );
	add_settings_field( 'github', 'Github URL', 'setting_github', 'theme-options', 'section' );

	register_setting( 'section', 'twitter' );
	register_setting( 'section', 'github' );
}
add_action( 'admin_init', 'custom_settings_page_setup' );



// Custom post type
function custom_post()
{
	register_post_type( 
		'custom_post',
		array(
			'labels' => array(
				'name' => __( 'Custom Post' ),
				'all_items' => __( 'Tous les Custom Post' )
			),
			'menu_icon' => 'dashicons-carrot',
			'public' => true,
			'has_archive' => true,
			'supports' => array(
				'title', 
				'editor',
				'thumbnail',
				'custom-fields'
			)
		) 
	);
}
add_action( 'init', 'custom_post' ); 




// Custom post type for custom fields
function custom_post_fields()
{
	register_post_type( 
		'custom_post_fields',
		array(
			'labels' => array(
				'name' => __( 'Custom post fields' ),
				'all_items' => __(' Tous les Custom Post Fields')
			),
			'public' => true,
			'has_archive' => true,
			'supports' => array(
				'title', 
				'editor',
				'excerpt',
				'thumbnail'
			),
			'taxonomies' => array(
				'post_tag',
				'category'
			)
		) 
	);
	register_taxonomy_for_object_type( 'post_tag', 'custom_post_fields' );
	register_taxonomy_for_object_type( 'category', 'custom_post_fields' );
}
add_action( 'init', 'custom_post_fields' );



// Add meta box
function metabox_custom_post_fields()
{
	add_meta_box(
		'meta_box', // $id
		'Meta Box', // $title
		'show_metabox_custom_post_fields', // $callback
		'custom_post_fields', // $screen
		'normal', // $context
		'high' // $priority
	);
}
function show_metabox_custom_post_fields()
{
	global $post;
	$meta = get_post_meta( $post-> ID, 'meta_box', true); ?>

	<input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

<?php }
add_action( 'add_meta_boxes', 'metabox_custom_post_fields' );
