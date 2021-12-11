<?php
	// REGISTER CUSTOM POST TYPES
	// You can register more, just duplicate the register_post_type code inside of the function and change the values. You are set!
	if ( ! function_exists( 'create_post_type' ) ){

		function create_post_type() {
		  // You'll want to replace the values below with your own.
		  // register_post_type('movies', // change the name
		  //   array(
		  //     'labels' => array(
		  //       'name' => __( 'Movies' ), // change the name
		  //       'singular_name' => __('Movie'
		  //        ), // change the name
		  //     ),
		  //     'description' => 'Movie List which we will be display on this blog.',
		  //     'public' => true,
		  //     'menu_position' => 75,
		  //     'supports' => array ( 'title','page template', 'custom-fields', 'page-attributes', 'thumbnail' ), // do you need all of these options?
		  //     'taxonomies' => array( 'category', 'post_tag' ), // do you need categories and tags?
		  //     'hierarchical' => true,
		  //     'menu_icon' => "dashicons-format-video",
		  //     'rewrite' => array ( 'slug' => __( 'movies' ) ) // change the name
		  //     )
		  //   );

		  $labels = array(
		    'name'                  => 'Movies',
		    'singular_name'         => 'Movie',
		    'menu_name'             => 'Movies',
		    'name_admin_bar'        => 'Movie',
		    'archives'              => 'Item Archives',
		    'attributes'            => 'Item Attributes',
		    'parent_item_colon'     => 'Parent Item:',
		    'all_items'             => 'All Items',
		    'add_new_item'          => 'Add New Item',
		    'add_new'               => 'Add New Movie',
		    'new_item'              => 'New Item',
		    'edit_item'             => 'Edit Item',
		    'update_item'           => 'Update Item',
		    'view_item'             => 'View Item',
		    'view_items'            => 'View Items',
		    'search_items'          => 'Search Item',
		    'not_found'             => 'Not found',
		    'not_found_in_trash'    => 'Not found in Trash',
		    'featured_image'        => 'Featured Image',
		    'set_featured_image'    => 'Set featured image',
		    'remove_featured_image' => 'Remove featured image',
		    'use_featured_image'    => 'Use as featured image',
		    'insert_into_item'      => 'Insert into item',
		    'uploaded_to_this_item' => 'Uploaded to this item',
		    'items_list'            => 'Items list',
		    'items_list_navigation' => 'Items list navigation',
		    'filter_items_list'     => 'Filter items list',
		  );
		  $args = array(
		    'label'                 => 'Movie',
		    'description'           => 'Movie Description',
		    'labels'                => $labels,
		    'supports'              => array( 'title','page template', 'custom-fields', 'page-attributes', 'thumbnail','editor','excerpt','slug'),
		    'hierarchical'          => true,
		    'public'                => true,
		    'show_ui'               => true,
		    'show_in_menu'          => true,
		    'menu_position'         => 75,
		    'menu_icon' => "dashicons-format-video",
		    'rewrite' => array ( 'slug' => __( 'movie' ) ), // change the name
		    'show_in_admin_bar'     => true,
		    'show_in_nav_menus'     => true,
		    'can_export'            => true,
		    'has_archive'           => true,
		    'exclude_from_search'   => true,
		    'publicly_queryable'    => true,
		    'capability_type'       => 'post',
		  );
		  register_post_type( 'movies', $args );
		  }
	}

//set custom post types
add_action( 'init', 'create_post_type' );


//Register Custom Taxonomy
function custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Movie_Cats', 'taxonomy general name' ),
		'singular_name'              => _x( 'Movie_Cat', 'taxonomy singular name' ),
		'menu_name'                  => __( 'Movie_Cat'),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,

		//'query_var'         => true,
        //'capabilities'      => array(),

		//'rewrite' => array ( 'slug' => 'movie_categories' ), 
		//'rewrite'=>false
	);
	register_taxonomy( 'movie_categories', array('movies'), $args );

}
add_action( 'init', 'custom_taxonomy');


?>
