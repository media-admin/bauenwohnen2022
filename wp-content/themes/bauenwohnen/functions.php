<?php
/**
 * Theme Funktionen und allgemeine Definitionen für die Website "bauenwohnen.com"
 */

/* --- General Theme Functions --- */
function buw_theme_features() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats', array( 'gallery' ) );
}

add_action('initafter_setup_theme', 'buw_theme_features');



/* --- Make default excerpt available --- */
function buw_add_excerpts_to_pages() {
		add_post_type_support( 'page', 'excerpt' );
}

add_action( 'init', 'buw_add_excerpts_to_pages' );


/* --- Make Custom Background available --- */
add_theme_support( 'custom-background' );


/* --- Activate Thumbnail Images --- */
if ( ! function_exists( 'theme_slug_setup' ) ) :
 function theme_slug_setup() {
	add_theme_support( 'post-thumbnails' );
}
endif;
add_action( 'after_setup_theme', 'theme_slug_setup' );


/* --- Includes the Custom Shortcode Bibliothek of the actual Theme --- */
include( 'classes/custom-shortcodes.php' );


/* --- Support SVG Files --- */
function buw_add_upload_ext($checked, $file, $filename, $mimes){
	if(!$checked['type']){
		$wp_filetype = wp_check_filetype( $filename, $mimes );
		$ext = $wp_filetype['ext'];
		$type = $wp_filetype['type'];
		$proper_filename = $filename;

		if($type && 0 === strpos($type, 'image/') && $ext !== 'svg'){
			$ext = $type = false;
		}
		$checked = compact('ext','type','proper_filename');
	}
	return $checked;
}

add_filter('wp_check_filetype_and_ext', 'buw_add_upload_ext', 10, 4);





/* --- Defines the default expression for the "Read More"-Link --- */
function buw_read_more_text( $text, $post_id ) {
	return '<a class="more-link" href="' . get_permalink() . '">' . __( 'Read More' , 'bauenwohnen' ) . '</a>';
}

add_filter( 'the_content_more_link', 'buw_read_more_text', 10, 2 );


/* --- Replaces the IP address at comments (IP-Anonymisierung lt. DSGVO) --- */
function buw_replace_comment_ip() {
	 return "127.0.0.1";
}

add_filter( 'pre_comment_user_ip', 'buw_replace_comment_ip', 50);



/* --- Adds the Slug to the body tag's class --- */
function buw_add_slug_body_class( $classes ) {
	 global $post;
	if ( isset( $post ) ) {
	 $classes[] = $post->post_name;
	}
	return $classes;
}

add_filter( 'body_class', 'buw_add_slug_body_class' );



/* === Styles and Scripts === */
function buw_register_styles() {

	/* --- Import Cookie Script Stylesheets --- */
	wp_register_style( 'cookie-style', get_template_directory_uri() . '/assets/styles/dywc.css' );
	wp_enqueue_style( 'cookie-style' );

	/* --- Import Theme Styles via style.css --- */
	wp_register_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'style' );

}

add_action( 'wp_enqueue_scripts', 'buw_register_styles' );



function buw_register_scripts() {

	/* --- Import Main Scripts --- */
	wp_register_script( 'main', get_template_directory_uri() . '/assets/scripts/main.js', '', null, true );
	wp_enqueue_script( 'main' );

	/* --- Import Vendors Scripts --- */
	wp_register_script( 'vendors', get_template_directory_uri() . '/assets/scripts/vendors.js', '', null, true );
	wp_enqueue_script( 'vendors' );

	/* --- Import Modal Scripts --- */
	wp_register_script( 'modal', get_template_directory_uri() . '/assets/scripts/modal.js', '', null, true );
	wp_enqueue_script( 'modal' );

	/* --- Import Slick Scripts --- */
	wp_register_script( 'slick', get_template_directory_uri() . '/vendor/slick-1.8.1/slick/slick.min.js', '', null, true );
	wp_enqueue_script( 'slick' );

	/* --- Import Lightbox Scripts --- */
	// wp_register_script( 'lightbox', get_template_directory_uri() . '/vendor/lightbox2/dist/js/lightbox.js', '', null, true );
	// wp_enqueue_script( 'lightbox' );

	wp_register_script( 'swipe', get_template_directory_uri() . '/assets/scripts/modules/jquery.detect_swipe.min.js', '', null, true );
	wp_enqueue_script( 'swipe' );




	/* --- Import Cookie Notice Scripts --- */
	wp_register_script( 'dywc', get_template_directory_uri() . '/assets/scripts/dywc.js', '', null, true );
	wp_enqueue_script( 'dywc' );

	wp_register_script( 'cookie-notice', get_template_directory_uri() . '/assets/scripts/cookie-notice.js', '', null, true );
	wp_enqueue_script( 'cookie-notice' );


	/* --- Import Button Back-to-Top --- */
	wp_register_script( 'button-back-to-top', get_template_directory_uri() . '/assets/scripts/modules/button-back-to-top.js', '', null, true );
	wp_enqueue_script( 'button-back-to-top' );

}

add_action( 'wp_enqueue_scripts', 'buw_register_scripts' );



/* --- Menu Support --- */

function buw_register_menu() {
	register_nav_menu( 'nav-menu-main', 'Hauptnavigation', 'bauenwohnen' );
	register_nav_menu( 'nav-menu-footer', 'Footermenü', 'bauenwohnen' );
}

add_action( 'init', 'buw_register_menu' );


/* === Additional Functions === */

/* --- Makes showing the gallery thumbnails available --- */
function buw_get_backend_preview_thumb($post_ID) {
	$post_thumbnail_id = get_post_thumbnail_id($post_ID);
	if ($post_thumbnail_id) {
		$post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'thumbnail');
		return $post_thumbnail_img[0];
	}
}

function buw_preview_thumb_column_head($defaults) {
	$defaults['featured_image'] = 'Image';
	return $defaults;
}

add_filter('manage_posts_columns', 'buw_preview_thumb_column_head');


function buw_preview_thumb_column($column_name, $post_ID) {
	if ($column_name == 'featured_image') {
		$post_featured_image = buw_get_backend_preview_thumb($post_ID);
			if ($post_featured_image) {
				echo '<img src="' . $post_featured_image . '" />';
			}
	}
}

add_action('manage_posts_custom_column', 'buw_preview_thumb_column', 10, 2);



/* --- Extends CPT PROJECTS to make Tags available --- */
add_action('pre_get_posts', function($query) {
	// This will target the queries used to generate the tag archive template.
	// You may remove the `is_main_query()` condition if you want to get posts
	// by tag outside the loop.
	if (!is_admin() && is_tag() && $query->is_main_query()) {
		// Will set to something like: Array( 'post', 'portfolio' )
		$types = get_taxonomy('post_tag')->object_type;

		// Alter the query to only use the types which are registered to the
		// `post_tag` taxonomy.
		$query->set('project', $types);
	}
});



/* --- Register Google Maps --- */

// Method 1: Filter.
	function my_acf_google_map_api( $api ){
			$api['key'] = 'XXX';
			return $api;
	}
	add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

	// Method 2: Setting.
	function my_acf_init() {
			acf_update_setting('google_api_key', 'AIzaSyAzkr3qs7g4-R6ShYWXKiJ5JZ_i5orikC8');
	}
	add_action('acf/init', 'my_acf_init');





	/* --- Navigation Walker for HAUPTNAVIGATION --- */
	require_once( 'classes/navwalker.php' );
	require_once( 'classes/custom_navwalker.php' );




	/* --- Adding captions to lightboxes --- */

	add_action( 'wp_footer', function () { ?>
	<script>
	jQuery( document ).ready( function( $ ) {
			$.featherlightGallery.prototype.afterContent = function() {
					var caption = this.$currentTarget.find('img').attr('alt');
					this.$instance.find('.caption').remove();
					$('<div class="caption">').text(caption).appendTo(this.$instance.find('.featherlight-content'));
			};
	} );
	</script>
	<?php } );



	/* --- Navigation Walker for FOOTERMENÜ --- */
	class Footer_Walker extends Walker_Nav_Menu {

		function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {

		$classes = empty($item->classes) ? array () : (array) $item->classes;

		$class_names = join(' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );

			!empty ( $class_names ) and $class_names = ' class="'. esc_attr( $class_names ) . '"';

			$output .= '<li class="site-footer__navigation-list-item">';
			$attributes  = 'class="footer-navigation__item"';

			!empty( $item->attr_title ) and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
			!empty( $item->target ) and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
			!empty( $item->xfn ) and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
			!empty( $item->url ) and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';
			$title = apply_filters( 'the_title', $item->title, $item->ID );
			$item_output = $args->before
				. "<a  $attributes>"
				. $args->link_before
				. $title
				. '</a></li>'
				. $args->link_after
				. $args->after;
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
