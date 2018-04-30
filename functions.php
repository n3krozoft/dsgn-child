<?php 



/* Allow Automatic Updates
 ******************************
 * http://codex.wordpress.org/Configuring_Automatic_Background_Updates
 */

add_filter( 'auto_update_plugin', '__return_true' );
add_filter( 'auto_update_theme', '__return_true' );
add_filter( 'allow_major_auto_core_updates', '__return_true' );



if ( function_exists( 'add_image_size' ) ) { 
	//add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
	add_image_size( 'landscape', 304, 184, true ); //(cropped)
}


function custom_register_styles() {

	/**
	 * Custom CSS
	 */

	// the MAIN stylesheet
	wp_enqueue_style(
			'main',
			get_stylesheet_directory_uri() . '/css/dev/00-main.css', // main.css
			false, // dependencies
			null // version
	);
	
	wp_enqueue_style(
			'googlefonts',
			'https://fonts.googleapis.com/css?family=Pathway+Gothic+One', // main.css
			false, // dependencies
			null // version
	);

	wp_dequeue_style( 'designer-fonts' );
	
	wp_dequeue_style( 'designer-style' );

//	wp_dequeue_script( 'moka-flex-slider' );
	
	wp_enqueue_script( 
	// the MAIN JavaScript file -- development version
			'main-script',
			get_stylesheet_directory_uri() . '/js/scripts.js', // scripts.js
			array('jquery'), // dependencies
			null, // version
			true // in footer
	);

}

add_action( 'wp_enqueue_scripts', 'custom_register_styles', 21 );



/*
 * File Upload Security
 
 * Sources: 
 * http://www.geekpress.fr/wordpress/astuce/suppression-accents-media-1903/
 * https://gist.github.com/herewithme/7704370
 
 * See also Ticket #22363
 * https://core.trac.wordpress.org/ticket/22363
 * and #24661 - remove_accents is not removing combining accents
 * https://core.trac.wordpress.org/ticket/24661
*/ 

add_filter( 'sanitize_file_name', 'remove_accents', 10, 1 );
add_filter( 'sanitize_file_name_chars', 'sanitize_file_name_chars', 10, 1 );
 
function sanitize_file_name_chars( $special_chars = array() ) {
	$special_chars = array_merge( array( '’', '‘', '“', '”', '«', '»', '‹', '›', '—', 'æ', 'œ', '€','é','à','ç','ä','ö','ü','ï','û','ô','è' ), $special_chars );
	return $special_chars;
}

/* Disable Comments for Media */

function filter_media_comment_status( $open, $post_id ) {
	$post = get_post( $post_id );
	if( $post->post_type == 'attachment' ) {
		return false;
	}
	return $open;
}
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );

/* More Functions */

require_once( 'functions/post-types.php' );

require_once( 'functions/infinite-scroll.php' );

/* Exclude "projects" from category listing 

	* source: http://wordpress.stackexchange.com/questions/156252/exclude-one-category-from-get-the-term-list
*/


function get_modified_term_list( $id = 0, $taxonomy, $before = '', $sep = '', $after = '', $exclude = array() ) {
    $terms = get_the_terms( $id, $taxonomy );
    $term_links = array();

    if ( is_wp_error( $terms ) )
        return $terms;

    if ( empty( $terms ) )
        return false;

    foreach ( $terms as $term ) {

        if(!in_array($term->term_id,$exclude)) {
            $link = get_term_link( $term, $taxonomy );
            if ( is_wp_error( $link ) )
                return $link;
            $term_links[] = '<a href="' . $link . '" rel="tag">' . $term->name . '</a>';
        }
    }

    return $before . join( $sep, $term_links ) . $after;
}


/* admin interface
******************************/

if ( is_user_logged_in() ) {
		require_once('functions/admin.php');
}