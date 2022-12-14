<?php

/* === BAUEN UND WOHNEN CUSTOM POST TYPES === */
function buw_post_types() {

	add_post_type_support( 'team', 'thumbnail' );
	add_post_type_support( 'team', 'excerpt' );

	add_filter( 'buw_gallery_metabox_post_types', function( $types ) {
		$types[] = 'gallery';
		return $types;
	} );


	/* --- Custom Post Type PROJEKTE --- */
	$labels = array(
		'name' =>  'Projekte',
		'add_new' => 'Neues Projekt erstellen',
		'edit_item' => 'Projekt bearbeiten',
		'singular_name' => 'Projekt',
		'all_items' => 'Alle Projekte',
		'supports' => array('title', 'editor', 'author', 'custom-fields',
	));

	register_post_type( 'project', array(
		'show_in_rest' => true,
		'public' => true,
		'show_ui' => true,
		'labels' => $labels,
		'taxonomies' => array('post_tag'),
		'supports' => ['editor', 'revisions', 'thumbnail', 'title', 'excerpt', 'custom-fields'],
		'has_archive' => false,
		'exclude_from_search' => false,
		'rewrite' => array('slug' => 'projekt', 'with_front' => true, 'pages' => true, 'feeds' => true,),
		'menu_position' => 10,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => false,
		'publicly_queryable'  => true,
		'menu_icon' => 'dashicons-hammer'
	));

	add_post_type_support( 'project', 'thumbnail' );



	/* --- Custom Post Type HAUSTYPEN --- */
	$labels = array(
		'name' =>  'Haustypen',
		'add_new' => 'Neue Haustype erstellen',
		'edit_item' => 'Haustype bearbeiten',
		'singular_name' => 'Haustype',
		'all_items' => 'Alle Haustypen',
		'supports' => array('title', 'editor', 'author', 'custom-fields',
	));

	register_post_type( 'housetype', array(
		'show_in_rest' => true,
		'public' => true,
		'show_ui' => true,
		'labels' => $labels,
		'taxonomies' => array('post_tag'),
		'supports' => ['editor', 'revisions', 'thumbnail', 'title', 'excerpt', 'custom-fields'],
		'has_archive' => false,
		'exclude_from_search' => false,
		'rewrite' => array('slug' => 'giardino-oberwaltersdorf', 'with_front' => false, 'pages' => true, 'feeds' => true,),
		'menu_position' => 10,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => false,
		'publicly_queryable'  => true,
		'menu_icon' => 'dashicons-admin-multisite'
	));

	add_post_type_support( 'project', 'thumbnail' );




	/* --- Custom Post Type HIGHLIGHTS --- */
	$labels = array(
		'name' =>  'Highlights',
		'add_new' => 'Neues Highlight anlegen',
		'edit_item' => 'Highlight bearbeiten',
		'singular_name' => 'Highlight',
		'all_items' => 'Alle Highlights',
		'supports' => array('title', 'editor', 'author', 'custom-fields',
	));

	register_post_type( 'highlight', array(
		'show_in_rest' => true,
		'public' => true,
		'show_ui' => true,
		'labels' => $labels,
		'taxonomies' => array('post_tag'),
		'supports' => ['editor', 'revisions', 'thumbnail', 'title', 'excerpt', 'custom-fields'],
		'has_archive' => false,
		'exclude_from_search' => false,
		'rewrite' => array('slug' => 'projekt', 'with_front' => true, 'pages' => true, 'feeds' => true,),
		'menu_position' => 10,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => false,
		'publicly_queryable'  => true,
		'menu_icon' => 'dashicons-star-filled'
	));

	add_post_type_support( 'highlight', 'thumbnail' );


	/* --- Custom Post Type FAQ ---

	$labels = array(
		'name' =>  'FAQs',
		'add_new' => 'Neue FAQ erstellen',
		'edit_item' => 'FAQ bearbeiten',
		'singular_name' => 'FAQ',
		'all_items' => 'Alle FAQs',
		'supports' => array('title', 'editor', 'author', 'custom-fields',
	));

	register_post_type( 'faq', array(
		'show_in_rest' => true,
		'public' => true,
		'show_ui' => true,
		'taxonomies' => array( 'faq-category' ),
		'labels' => $labels,
		'supports' => ['editor', 'page-attributes', 'revisions', 'thumbnail', 'title', 'custom-fields'],
		'has_archive' => false,
		'exclude_from_search' => false,
		'rewrite' => array('slug' => 'faq', 'with_front' => true, 'pages' => true, 'feeds' => true,),
		'menu_position' => 11,
		'show_in_admin_bar'   => false,
		'show_in_nav_menus'   => false,
		'publicly_queryable'  => true,
		'menu_icon' => 'dashicons-lightbulb'
	));

	*/


	/* --- Custom Post Type TESTIMONIALS ---
	$labels = array(
		'name' =>  'Bewertungen',
		'add_new' => 'Neue Bewertung einstellen',
		'edit_item' => 'Bewertung bearbeiten',
		'singular_name' => 'Bewertung',
		'all_items' => 'Alle Bewertungen',
		'supports' => array('title', 'editor', 'author', 'custom-fields'
	));

	register_post_type( 'testimonial', array(
		'show_in_rest' => true,
		'public' => true,
		'show_ui' => true,
		'taxonomies' => array( 'testimonial-category' ),
		'labels' => $labels,
		'supports' => ['editor', 'page-attributes', 'revisions', 'thumbnail', 'title', 'custom-fields'],
		'has_archive' => false,
		'exclude_from_search' => false,
		'rewrite' => array('slug' => 'testimonial'),
		'menu_position' => 12,
		'show_in_admin_bar'   => false,
		'show_in_nav_menus'   => false,
		'publicly_queryable'  => true,
		'menu_icon' => 'dashicons-format-status'
	));

	add_post_type_support( 'testimonial', 'thumbnail' );

	*/


	/* --- Custom Post Type JOBS ---
	$labels = array(
		'name' =>  'Jobs',
		'add_new' => 'Neuen Job einstellen',
		'edit_item' => 'Job bearbeiten',
		'singular_name' => 'Job',
		'all_items' => 'Alle Jobs',
		'supports' => array('title', 'editor', 'author', 'custom-fields'
	));

	register_post_type( 'job', array(
		'show_in_rest' => true,
		'public' => true,
		'show_ui' => true,
		'labels' => $labels,
		'supports' => ['editor', 'page-attributes', 'revisions', 'excerpt', 'thumbnail', 'title', 'custom-fields'],
		'has_archive' => false,
		'exclude_from_search' => false,
		'rewrite' => array('slug' => 'jobs'),
		'menu_position' => 13,
		'show_in_admin_bar'   => false,
		'show_in_nav_menus'   => false,
		'publicly_queryable'  => true,
		'menu_icon' => 'dashicons-nametag'
	));

	add_post_type_support( 'job', 'thumbnail' );

	*/




	add_post_type_support( 'company-details', 'thumbnail' );

}



/* === BAUEN UND WOHNEN CUSTOM TAXONOMIES === */
function buw_taxonomies() {

	/* --- Custom Taxonomie FAQ-KATEGORIE --- */
	$labels = array(
		'name' => _x( 'FAQ-Kategorie', 'taxonomy general name' ),
		'singular_name' => _x( 'FAQ-Kategorie', 'taxonomy singular name' ),
		'search_items' =>  __( 'FAQ-Kategorien durchsuchen' ),
		'popular_items' => __( 'Meist benutzte FAQ-Kategorien' ),
		'all_items' => __( 'Alle FAQ-Kategorien' ),
		'parent_item' => __( '??bergeordnete FAQ-Kategorie' ),
		'parent_item_colon' => __( '??bergeordnete FAQ-Kategorien:' ),
		'edit_item' => __( 'FAQ-Kategorie bearbeiten' ),
		'update_item' => __( 'FAQ-Kategorie aktualisieren' ),
		'add_new_item' => __( 'Neue FAQ-Kategorien hinzuf??gen' ),
		'new_item_name' => __( 'Name der neuen FAQ-Kategorien' ),
	);

	register_taxonomy('faq-category', array('faqs'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'faqs' ),
	));


	/* --- Custom Post Type SLIDER --- */
	$labels = array(
		'name' =>  'Header Slider',
		'add_new' => 'Neues Slider-Bild erstellen',
		'edit_item' => 'Slider-Bild bearbeiten',
		'singular_name' => 'Slider',
		'all_items' => 'Alle Slider',
		'supports' => array('title', 'editor', 'author', 'custom-fields'
	));

	register_post_type( 'slider', array(
		'show_in_rest' => true,
		'public' => true,
		'show_ui' => true,
		'labels' => $labels,
		'has_archive' => false,
		'exclude_from_search' => true,
		'menu_position' => 7,
		'show_in_admin_bar'   => false,
		'show_in_nav_menus'   => false,
		'publicly_queryable'  => true,
		'menu_icon' => 'dashicons-superhero'
	));

	add_post_type_support( 'slider', 'thumbnail' );


	/* --- Custom Post Type COMPANY-DETAILS --- */
	$labels = array(
		'name' =>  'Firmendetails',
		'supports' => array('title', 'editor', 'author', 'custom-fields'
	));

	register_post_type( 'company-details', array(
		'show_in_rest' => true,
		'public' => true,
		'show_ui' => true,
		'labels' => $labels,
		'supports' => ['revisions', 'editor', 'title', 'custom-fields'],
		'has_archive' => false,
		'exclude_from_search' => true,
		'menu_position' => 15,
		'show_in_admin_bar'   => false,
		'show_in_nav_menus'   => false,
		'publicly_queryable'  => true,
		'menu_icon' => 'dashicons-building'
	));


	/* --- Custom Post Type AKTUELLER HINWEIS --- */
	$labels = array(
		'name' =>  'Hinweis',
		'add_new' => 'Neuen Hinweis erstellen',
		'edit_item' => 'Hinweis bearbeiten',
		'singular_name' => 'Hinweis',
		'all_items' => 'Alle Hinweise',
		'supports' => array('title', 'editor', 'author', 'custom-fields',
	));

	register_post_type( 'notification', array(
		'show_in_rest' => true,
		'public' => true,
		'show_ui' => true,
		'supports' => ['editor', 'page-attributes', 'revisions', 'thumbnail', 'title', 'custom-fields'],
		'labels' => $labels,
		'has_archive' => false,
		'exclude_from_search' => true,
		'rewrite' => array('slug' => 'hinweise'),
		'menu_position' => 5,
		'show_in_admin_bar'   => false,
		'show_in_nav_menus'   => false,
		'publicly_queryable'  => true,
		'menu_icon' => 'dashicons-bell'
	));


	/* --- Custom Post Type PARTNER ---
	$labels = array(
		'name' =>  'Partner',
		'add_new' => 'Neuen Partner anlegen',
		'edit_item' => 'Partner bearbeiten',
		'singular_name' => 'Partner',
		'all_items' => 'Alle Partner',
		'supports' => array('title', 'editor', 'author', 'custom-fields'
	));

	register_post_type( 'partner', array(
		'show_in_rest' => true,
		'public' => true,
		'show_ui' => true,
		'taxonomies' => array( 'partner-category' ),
		'labels' => $labels,
		'supports' => ['editor', 'revisions', 'thumbnail', 'title', 'custom-fields'],
		'has_archive' => false,
		'exclude_from_search' => false,
		'menu_position' => 14,
		'show_in_admin_bar'   => false,
		'show_in_nav_menus'   => false,
		'publicly_queryable'  => true,
		'menu_icon' => 'dashicons-networking'
	));

	add_post_type_support( 'partner', 'thumbnail' );
	*/


	/* --- Custom Taxonomie TESTIMONIAL-KATEGORIE ---
	$labels = array(
		'name' => _x( 'Bewertungs-Kategorie', 'taxonomy general name' ),
		'singular_name' => _x( 'Bewertungs-Kategorie', 'taxonomy singular name' ),
		'search_items' =>  __( 'Bewertungs-Kategorien durchsuchen' ),
		'popular_items' => __( 'Meist benutzte Bewertungs-Kategorien' ),
		'all_items' => __( 'Alle Bewertungs-Kategorien' ),
		'parent_item' => __( '??bergeordnete Bewertungs-Kategorie' ),
		'parent_item_colon' => __( '??bergeordnete Bewertungs-Kategorien:' ),
		'edit_item' => __( 'Bewertungs-Kategorie bearbeiten' ),
		'update_item' => __( 'Bewertungs-Kategorie aktualisieren' ),
		'add_new_item' => __( 'Neue Bewertungs-Kategorien hinzuf??gen' ),
		'new_item_name' => __( 'Name der neuen Bewertungs-Kategorie' ),
	);

	register_taxonomy('testimonial-category', array('testimonials'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'testimonials' ),
	));
	*/


	/* --- Custom Taxonomie PARTNER-KATEGORIE ---
	$labels = array(
		'name' => _x( 'Partner-Kategorien', 'taxonomy general name' ),
		'singular_name' => _x( 'Partner-Kategorie', 'taxonomy singular name' ),
		'search_items' =>  __( 'Partner-Kategorien durchsuchen' ),
		'popular_items' => __( 'Meist benutzte Partner-Kategorien' ),
		'all_items' => __( 'Alle Partner-Kategorien' ),
		'parent_item' => __( '??bergeordnete Partner-Kategorie' ),
		'parent_item_colon' => __( '??bergeordnete Partner-Kategorien:' ),
		'edit_item' => __( 'Partner-Kategorie bearbeiten' ),
		'update_item' => __( 'Partner-Kategorie aktualisieren' ),
		'add_new_item' => __( 'Neue Partner-Kategorien hinzuf??gen' ),
		'new_item_name' => __( 'Name der neuen Partner-Kategorie' ),
	);

	register_taxonomy('partner-category', array('partners'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
		'query_var' => true,
	));
	*/

}

add_action('init', 'buw_post_types');
add_action( 'init', 'buw_taxonomies', 0 );

?>