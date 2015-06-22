<?php

add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
function custom_theme_setup() {
	add_theme_support( 'post-thumbnails', array('post', 'page') );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );


add_image_size('slider-thumb', 620, 405, true);

add_filter( 'image_size_names_choose', 'meus_tamanhos' );
function meus_tamanhos( $sizes ) {
    return array_merge( $sizes, array(
        'slider-thumb' => 'Slider Thumb'
    ) );
}

register_nav_menus( array(
	'primary' => 'Menu Principal',
));

/*if( !function_exists('get_the_content_with_format') ):
	function get_the_content_with_format ($more_link_text = '', $stripteaser = 0, $more_file = '') {
	$content = get_the_content($more_link_text, $stripteaser, $more_file);
	$content = preg_replace("/\[caption.*\[\/caption\]/", '', $content);
	$content = apply_filters('the_content', $content);
	$content = strip_tags($content, '<p><a>');
	return $content;
}
endif;*/

function the_post_thumbnail_caption() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo '<figcaption>'.$thumbnail_image[0]->post_excerpt.'</figcaption>';
  }
}

function custom_posts_per_page( $query ) {
   if (($query->is_archive() || $query->is_tag() || $query->is_category()) && $query->is_main_query() ) {
    	$query->set( 'posts_per_page', 10 );
    }
}
add_action( 'pre_get_posts', 'custom_posts_per_page' );


function ml_widgets_init() {

	// Default Sidebars

	register_sidebar( array(
		'name' => 'Blog Sidebar',
		'id' => 'side-blog',
		'description' => 'Barra lateral do blog',
		'before_widget' => '<div id="%1$s" class="sidebar-nav">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}
add_action( 'widgets_init', 'ml_widgets_init' );

function custom_tag_cloud_widget($args) {
	$args['number'] = 50; //adding a 0 will display all tags
	$args['largest'] = 16; //largest tag
	$args['smallest'] = 16; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	$args['separator'] = ' | '; //tag font unit
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'custom_tag_cloud_widget' );


/**
 * Extend WordPress search to include custom fields
 *
 * http://adambalee.com
 */

/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {    
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }
    
    return $join;
}
add_filter('posts_join', 'cf_search_join' );

/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where( $where ) {
    global $pagenow, $wpdb;
   
    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );


/* REMOVE DIMENTION ATTR IMG */
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

function catch_first_image() {
  /*global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  
  if(preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches)){
    $first_img = $matches [1] [0];
    return $first_img;
  }
  else {*/
    $first_img = get_template_directory_uri()."/img/default-post-img-l.jpg";
    return $first_img;
  /*}*/
}

//IMG FUNCTIONS
function my_default_image_size () {
    return 'full'; 
}

add_filter( 'pre_option_image_default_size', 'my_default_image_size' );

update_option('image_default_link_type','none');



