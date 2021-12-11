<?php 
 function nfi_remove_version() {
 	return '';
 }

 function df_disable_comments_post_types_support() {
 	$post_types = get_post_types();
 	foreach ($post_types as $post_type) {
 		if(post_type_supports($post_type, 'comments')) {
 			remove_post_type_support($post_type, 'comments');
 			remove_post_type_support($post_type, 'trackbacks');
 		}
 	}
 }

 // Hide existing comments
 function df_disable_comments_hide_existing_comments($comments) {
 	$comments = array();
 	return $comments;
 }

// Close comments on the front-end
 function df_disable_comments_status() {
 	return false;
 }
 // Remove comments page in menu
 function df_disable_comments_admin_menu() {
 	remove_menu_page('edit-comments.php');
 }


 // Redirect any user trying to access comments page
 function df_disable_comments_admin_menu_redirect() {
 	global $pagenow;
 	if ($pagenow === 'edit-comments.php') {
 		wp_redirect(admin_url()); exit;
 	}
 }

 // Remove comments metabox from dashboard
 function df_disable_comments_dashboard() {
 	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
 }

 // Remove comments links from admin bar
 function df_disable_comments_admin_bar() {
 	if (is_admin_bar_showing()) {	remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
 	}
 }

 /* remove search functionality */
 function fb_filter_query( $query, $error = true ) {
 	if ( is_search() ) {
 		$query->is_search = false;
 		$query->query_vars[s] = false;
 		$query->query[s] = false;
	
 		// to error
		if ( $error == true ) {
     }
    }
 }

// Google Map 
function my_acf_google_map_api( $api ){
  $api['key'] = 'AIzaSyDLQt5xHcWYvW9avm5jp27mCwMHEkPFhb4';
 return $api;
}

function alpha_inc_link_fillter($link = null, $target = null)
{
	if(empty($link)){
		return;
	}
	$href_link = null;
	if(!empty($link) && $link != null){
		if($link == '#' ){
			$href_link = $link;
			$target = '';
		} else {
			$url =  trim($link);
			if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
				$href_link= "http://" . $url;
			} else {
				$href_link = trim($link);
			}
		}
	}
	if ($target == true){
		return 'href="'.$href_link.'" target="_blank"';
	}else{
		return 'href="'.$href_link.'"';
	}
}

// ===================================
// Button Group For Clone
// ===================================
function button_group($field_name) {
  if(!empty($field_name) && is_array($field_name)) {
    $button_link = '';
    $button_link_type = $field_name['button_link'];
    $internal_link = $field_name['button_internal_link'];
    $external_link = $field_name['button_external_link'];
    if(($button_link_type == 'button_internal_link') && !empty($internal_link)) {
      $button_link = alpha_inc_link_fillter($internal_link,false);
    } elseif(($button_link_type == 'button_external_link') && !empty($external_link)) {
      $button_link = alpha_inc_link_fillter($external_link,true);
    }
    if(!empty($button_link)) {
      return $button_link;
    } else {
      return '';
    }
  } else {
    return;
  }
}

// ===================================
// Get Template Part
// ===================================
function alpha_get_template_part($slug = null, $name = null, array $params = array()) {
  global $posts, $post, $wp_did_header, $wp_query, $wp_rewrite, $wpdb, $wp_version, $wp, $id, $comment, $user_ID;
  do_action("get_template_part_{$slug}", $slug, $name);
  $templates = array();
  if (isset($name))
    $templates[] = "{$slug}-{$name}.php";
    $templates[] = "{$slug}.php";
    $_template_file = locate_template($templates, false, false);
  if (is_array($wp_query->query_vars)) {
    extract($wp_query->query_vars, EXTR_SKIP);
  }
  extract($params, EXTR_SKIP);
  require($_template_file);
}

// ===================================
//  Get Template part for ajax 
// ===================================
function alpha_return_get_template_part($slug = null, $name = null, array $params = array()) {
    $slug=str_replace("//","/",$slug);
    global $wp_query;
    do_action("get_template_part_{$slug}", $slug, $name);
    $templates = array();
    if (isset($name))
        $templates[] = "{$slug}-{$name}.php";
        $templates[] = "{$slug}.php";
        $_template_file = locate_template($templates, false, false);
    if (is_array($wp_query->query_vars)) {
        extract($wp_query->query_vars, EXTR_SKIP);
    }
    extract($params, EXTR_SKIP);
    if(!empty($_template_file)){
        ob_start();
        include($_template_file);
        $var=ob_get_contents();
        ob_end_clean();
        return $var;
    }
}

// ===================================
//  Text Limit 
// ===================================
function remove_empty_p($content) {
  $content = force_balance_tags($content);
  $content = preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
  $content = preg_replace('~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content);
  return $content;
}

function alpha_limitText($string,$limit, $allowedTags = ""){
	if(!empty($string)){
		$string = strip_tags($string,$allowedTags);
		if (strlen($string) > $limit) {
			$stringCut = substr($string, 0, $limit);
			$string = substr($stringCut, 0, strrpos($stringCut, ' '))  .  '...'; 
		}
		return $string;
	}else{
	return false;	
	}
}

//Add options page for acf
//if(function_exists('acf_add_options_page')) {
//  acf_add_options_page('General Setting');
//}

function page_label_link($options, $field, $the_post) {
	$options['post_status'] = array('publish');
	return $options;
}

function relationship_view_url($options, $field, $the_post) {
  $options['post_status'] = array('publish');
  return $options;
 }

 
 function edit_tribe_widget_after_title() {
  global $post;
  $event = $post;
  $event_content = $post->post_content;
  echo alpha_limitText($event_content,100);
}

//Feature  image instruction
function add_featured_image_instruction($content) {
  global $post;
  $post_type = get_post_type();

  //var_dump($post_type);
  if($post_type == 'page' ){
    // if(get_page_template_slug()=='tp-home.php'){
    //   $content .= '<p><b>Recommended 1920 , 1080 pixels</b></p>';
    // }
    $content .= '<p>Your featured image size Recommended <b> 312*312</b></p>';
  }
  elseif($post_type == 'post'){
    $content .= '<p><b>Recommended 1130 , 1646 pixels</b></p>';
  }
  else {
    $content .= '<p><b>Recommended 1920 , 1080 pixels</b></p>';
  }
   return $content;
}

// ACF General Settings admin menu
/*
if( function_exists('acf_add_options_page') ) {

  $Parent = acf_add_options_page(array(
  'page_title'  => 'General Settings',
  'menu_title'  => 'General Settings',
  'menu_slug'  => 'general-settings',
  'capability'  => 'edit_posts',
  'redirect'  => false
  ));
}
*/

// Check function exists.
if( function_exists('acf_add_options_sub_page') ) {
    // Add parent.
    $parent = acf_add_options_page(array(
        'page_title'  => __('Theme General Settings'),
        'menu_title'  => __('General Settings'),
        'redirect'    => false,
    ));    

    // Add sub page.
    $child = acf_add_options_sub_page(array(
        'page_title'  => __('Social Settings'),
        'menu_title'  => __('Social'),
        'parent_slug' => $parent['menu_slug'],
    ));
  }

// // You can register more, just duplicate the register_post_type code inside of the function and change the values. You are set!
// // REGISTER CUSTOM POST TYPES
// if ( ! function_exists( 'create_post_type' ) ){

// function create_post_type() {
//   // You'll want to replace the values below with your own.
//   // register_post_type('movies', // change the name
//   //   array(
//   //     'labels' => array(
//   //       'name' => __( 'Movies' ), // change the name
//   //       'singular_name' => __('Movie'
//   //        ), // change the name
//   //     ),
//   //     'description' => 'Movie List which we will be display on this blog.',
//   //     'public' => true,
//   //     'menu_position' => 75,
//   //     'supports' => array ( 'title','page template', 'custom-fields', 'page-attributes', 'thumbnail' ), // do you need all of these options?
//   //     'taxonomies' => array( 'category', 'post_tag' ), // do you need categories and tags?
//   //     'hierarchical' => true,
//   //     'menu_icon' => "dashicons-format-video",
//   //     'rewrite' => array ( 'slug' => __( 'movies' ) ) // change the name
//   //     )
//   //   );

//   $labels = array(
//     'name'                  => 'Movies',
//     'singular_name'         => 'Movie',
//     'menu_name'             => 'Movies',
//     'name_admin_bar'        => 'Movie',
//     'archives'              => 'Item Archives',
//     'attributes'            => 'Item Attributes',
//     'parent_item_colon'     => 'Parent Item:',
//     'all_items'             => 'All Items',
//     'add_new_item'          => 'Add New Item',
//     'add_new'               => 'Add New Movie',
//     'new_item'              => 'New Item',
//     'edit_item'             => 'Edit Item',
//     'update_item'           => 'Update Item',
//     'view_item'             => 'View Item',
//     'view_items'            => 'View Items',
//     'search_items'          => 'Search Item',
//     'not_found'             => 'Not found',
//     'not_found_in_trash'    => 'Not found in Trash',
//     'featured_image'        => 'Featured Image',
//     'set_featured_image'    => 'Set featured image',
//     'remove_featured_image' => 'Remove featured image',
//     'use_featured_image'    => 'Use as featured image',
//     'insert_into_item'      => 'Insert into item',
//     'uploaded_to_this_item' => 'Uploaded to this item',
//     'items_list'            => 'Items list',
//     'items_list_navigation' => 'Items list navigation',
//     'filter_items_list'     => 'Filter items list',
//   );
//   $args = array(
//     'label'                 => 'Movie',
//     'description'           => 'Movie Description',
//     'labels'                => $labels,
//     'supports'              => array( 'title','page template', 'custom-fields', 'page-attributes', 'thumbnail','editor'),
//     'hierarchical'          => false,
//     'public'                => true,
//     'show_ui'               => true,
//     'show_in_menu'          => true,
//     'menu_position'         => 75,
//     'menu_icon' => "dashicons-format-video",
//     'rewrite' => array ( 'slug' => __( 'movies' ) ), // change the name
//     'show_in_admin_bar'     => true,
//     'show_in_nav_menus'     => true,
//     'can_export'            => true,
//     'has_archive'           => false,
//     'taxonomies' => array( 'category', 'post_tag' ), // do you need categories and tags?
//     'exclude_from_search'   => false,
//     'publicly_queryable'    => false,
//     'capability_type'       => 'post',
//   );
//   register_post_type( 'movies', $args );
//   }
// }

// pagination
  function pagination($pages = '', $range = 3){
      $showitems = ($range * 2)+1;
   
      global $paged;
      if(empty($paged)) $paged = 1;
   
      if($pages == '')
      {
          global $wp_query;
          $pages = $wp_query->max_num_pages;
          if(!$pages)
          {
              $pages = 1;
          }
      }
   
      if(1 != $pages)
      {
          echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
          if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
          if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
   
          for ($i=1; $i <= $pages; $i++)
          {
              if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
              {
                  echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
              }
          }
   
          if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
          if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
          echo "</div>\n";
      }
  }

  //Pagination Code for wordpress
  function get_next_post_id( $post_id ) {
    // Get a global post reference since get_adjacent_post() references it
    global $post;

    // Store the existing post object for later so we don't lose it
    $oldGlobal = $post;

    // Get the post object for the specified post and place it in the global variable
    $post = get_post( $post_id );

    // Get the post object for the previous post
    $next_post = get_next_post();

    // Reset our global object
    $post = $oldGlobal;

    if ( '' == $next_post ) {
    return 0;
    }

    return $next_post->ID;
  }

  function get_previous_post_id( $post_id ) {
    global $post;

    $oldGlobal = $post;

    // Get the post object for the specified post and place it in the global variable
    $post = get_post( $post_id );

    // Get the post object for the previous post
    $pre_post = get_previous_post();

    // Reset our global object
    $post = $oldGlobal;

    if ( '' == $pre_post ) {
    return 0;
    }

    return $pre_post->ID;
  }

  // Custom Excerpt function for Advanced Custom Fields
  function custom_field_excerpt() {
    global $post;
    $text = get_field('content'); //Replace 'your_field_name'
    if ( '' != $text ) {
      $text = strip_shortcodes( $text );
      $text = apply_filters('the_content', $text);
      $text = str_replace(']]>', ']]>', $text);
      $excerpt_length = 40; // 20 words
      //$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
      
      $excerpt_more = apply_filters('excerpt_more', ' ' . '... <a href="'.get_permalink($post->ID).'">Read More</a>');
      $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
      
      //$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
      //$text= $text.'... <a href="'.get_permalink($post->ID).'">Read More</a>';

    }
    return apply_filters('the_excerpt', $text);
  }


//get category of cpt on archive page
function my_get_posts( $query ) {
    if( !is_admin() ) {
        if ( !is_post_type_archive() && $query->is_archive() ) {
            $query->set( 'post_type', array( 'post', 'movies' ) );
        }
        return $query;
    }
}

//get search post of cpt on search page
function my_cptui_add_post_type_to_search( $query ) {
  if ( $query->is_search() ) {
    // Replace these slugs with the post types you want to include.
    $cptui_post_types = array( 'movies' );

    $query->set(
      'post_type',
      array_merge(
        array( 'post' ),
        $cptui_post_types
      )
    );
     return $query;
  }


}

//custom pagination
// function pagination_bar( $custom_query ) {
//   $total_pages = $custom_query->max_num_pages;
//   $big = 999999999; // need an unlikely integer

//   if ($total_pages > 1){
//     $current_page = max(1, get_query_var('paged'));

//     echo paginate_links(array(
//     'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
//      'format' => '/page/%#%',
//     //'format' => '?paged=%#%',
//     'current' => $current_page,
//     'total' => $total_pages,
//     ));
//   }
// }

//Default Pagination
// Numbered Pagination
if ( !function_exists( 'wpex_pagination' ) ) {
  
  function wpex_pagination() {
    
    $prev_arrow = is_rtl() ? '→' : '←';
    $next_arrow = is_rtl() ? '←' : '→';
    
    global $wp_query;
    $total = $wp_query->max_num_pages;
    $big = 999999999; // need an unlikely integer
    if( $total > 1 )  {
       if( !$current_page = get_query_var('paged') )
         $current_page = 1;
       if( get_option('permalink_structure') ) {
         $format = 'page/%#%/';
       } else {
         $format = '&paged=%#%';
       }
      echo paginate_links(array(
        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format'    => $format,
        'current'   => max( 1, get_query_var('paged') ),
        'total'     => $total,
        'mid_size'    => 3,
        'type'      => 'list',
        'prev_text'   => $prev_arrow,
        'next_text'   => $next_arrow,
       ) );
    }
  }
  
}