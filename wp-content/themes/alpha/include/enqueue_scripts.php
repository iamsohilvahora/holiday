<?php
/**
 * Enqueue scripts and styles.
 */
function alpha_scripts() {
	
	wp_enqueue_style( 'alpha-style', get_stylesheet_uri());
	wp_enqueue_style('alpha-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('alpha-fontawsome', get_template_directory_uri() . '/css/font-awesome.css');
	wp_enqueue_style("alpha-custom", get_template_directory_uri() . "/css/custom.css");

	wp_enqueue_style( 'alpha-fonts', get_template_directory_uri() . '/css/fonts.css');
	wp_enqueue_style( 'alpha-slick-css', get_template_directory_uri() . '/css/slick.css');
	
    wp_enqueue_style( 'alpha-responsive', get_template_directory_uri() . '/css/responsive.css');
   
    wp_enqueue_script('jquery');
	wp_enqueue_script('alpha-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20151215', true);
    wp_enqueue_script( 'alpha-slick-js', get_template_directory_uri() . '/js/slick.js', array(), '20151215', true ); 
    wp_enqueue_script( 'alpha-custom', get_template_directory_uri() . '/js/custom.js', array(), '20151215', true ); 
    wp_localize_script( 'alpha-custom', 'value1', "Test");

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'alpha_scripts' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function alpha_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'alpha_content_width', 640 );
}
add_action( 'after_setup_theme', 'alpha_content_width', 0 );

function alpha_base_scripts($lat, $lng, $zoom='10', $mapid = 'map-canvas', $address, $marker='') {
	$add = str_replace(" ","+",json_encode($address));
	$array = array(
			'lat' => $lat,
			'lng' => $lng,
			'zoom' => $zoom,
			'mapId' => $mapid,
			'address' => $address,
			'marker' => $marker
		);
		
wp_enqueue_script('google_script', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDLQt5xHcWYvW9avm5jp27mCwMHEkPFhb4');
wp_enqueue_script('map', get_template_directory_uri() .'/js/map.js', array('jquery'), '1.0.0');
wp_localize_script( 'map', 'gcode', $array);
}
