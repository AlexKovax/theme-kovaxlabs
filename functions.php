<?php
/*
 * Kovaxlabs functions and definitions
 *
 * @package WordPress
 * @subpackage Kovaxlabs
 * @since Kovaxlabs 1.0
 */


///////////
// INIT //
/////////
       
//If the project requires menus
/*
    register_nav_menus(
        array(
            'primary' => 'Primary Navigation',
            'secondary' => 'Secondary Navigation'
        ) 
    ); */

//Set the content width if requires 
//if ( ! isset( $content_width ) )
//    $content_width = 640;

//Add RSS links to <head> section
add_theme_support( 'automatic-feed-links' );

//Fonction pour heriter du template parent dans les enfants (sous cat blog)
/*
 function inherit_template() { 
  if (is_category()) {
    $catid = get_query_var('cat');
    if ( file_exists(TEMPLATEPATH . '/category-' . $catid . '.php') ) {
      include( TEMPLATEPATH . '/category-' . $catid . '.php');
      exit;
    }

    $cat = &get_category($catid);
    $parent = $cat->category_parent;
	
    while ($parent) {
      $cat = &get_category($parent);
      if ( file_exists(TEMPLATEPATH . '/category-' . $cat->cat_name . '.php') ) { //changer ID en name
        include (TEMPLATEPATH . '/category-' . $cat->cat_name . '.php'); //changer ID en name
        exit;
      }

      $parent = $cat->category_parent;
    }
  }
}
add_action('template_redirect', 'inherit_template', 1);
*/

//Thumbs support
add_theme_support( 'post-thumbnails' );

//Additional cropping size
if ( function_exists( 'add_image_size' ) ) { 
	//add_image_size( 'size-name', width, height, true ); //ex
}


//////////////
// FILTERS //
////////////

//function f(){}
//add_filter('hook','f',priority);

/*function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');*/


////////////
// UTILS //
//////////
function get_ID_by_slug($page_name) {
	global $wpdb;
	$page_name = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$page_name."'");
	return $page_name;
}

function get_category_id($cat_name){
	$term = get_term_by('slug', $cat_name, 'category');
	return $term->term_id;
}

function gen_list_cat($slug){
	echo '<ul class="listCatNav">';
	$id=get_category_id($slug);
	wp_list_categories(
		array(
			'child_of'=>$id,
			'hide_empty' => 0,
			'title_li' => "")
	);
	echo '</ul>';
}

function get_cat_link_by_slug($slug){
	$cat = get_category_by_slug($slug); 
  $catID = $cat->term_id;
	return get_category_link($catID);
}

function get_page_link_by_slug($page_slug) {
	$page = get_page_by_path($page_slug);
	if ($page) :
		return get_permalink( $page->ID );
	else :
		return "#";
	endif;
}

//test if a post is in a descendant category
if ( ! function_exists( 'post_is_in_descendant_category' ) ) {
    function post_is_in_descendant_category( $cats, $_post = null ) {
        foreach ( (array) $cats as $cat ) {
            // get_term_children() accepts integer ID only
            $descendants = get_term_children( (int) $cat, 'category' );
            if ( $descendants && in_category( $descendants, $_post ) )
                    return true;
        }
        return false;
    }
}


function postimage($size=large, $qty=-1,$id=0) {
	$i=0;
	if ( $images = get_children(array( 'post_parent' => get_the_ID(), 'post_type' => 'attachment', 'numberposts' => $qty,'post_mime_type' => 'image',))){
		$images=array_reverse($images);
		foreach( $images as $image ) {
			//print_r($image);
			$attachmenturl=wp_get_attachment_image_src($image->ID, "single-main");
			$attachmentlarge=wp_get_attachment_image_src($image->ID, "large");
			$attachmentimage=wp_get_attachment_image( $image->ID, $size );

			echo "<div class='".(($i==0) ? "imgGalleryFirst" : "imgGallery")." thumb' >";
			echo $attachmentimage;
			echo "</div>\n";
			$i++;
		}
	} else {
		//nothing...
	}
}

function width_gallery(){
	$i=0;
	if ( $images = get_children(array( 'post_parent' => get_the_ID(), 'post_type' => 'attachment', 'numberposts' => $qty,'post_mime_type' => 'image',))){
			return count($images)*150;
	} else {
		return 0;
	}
}


////////////////
// Externals //
//////////////

/***************************************************************************
* @Author: Boutros AbiChedid
* @Description: Function that puts WordPress Website in maintenance mode.
****************************************************************************/
function activate_maintenance_mode() {
    //If the current user is NOT an 'Administrator' or NOT 'Super Admin' then display Maintenance Page.
    if ( !(current_user_can( 'administrator' ) ||  current_user_can( 'super admin' ))) {
        //Kill WordPress execution and display HTML maintenance message.
        wp_die('<h1>Blackdandy.fr est en travaux</h1><p>Le site fait peau neuve...</p>', 'Maintenance Mode');
    }
}
//Hooks the 'activate_maintenance_mode' function on to the 'get_header' action.
//add_action('get_header', 'activate_maintenance_mode');



?>
