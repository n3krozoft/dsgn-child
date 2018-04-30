<?php 


/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 
 * try to override DESIGNER functions
 */
 
// remove_action( 'after_setup_theme', 'designer_jetpack_setup', 99 );
 
function n4kr_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'post-wrapper',
		'footer'    => 'page',
		'render'    => 'n4kr_render_infinite_posts',
		'wrapper'   => 'new-infinite-posts', // false, // 
		'type'      => 'scroll' // 'click'
	) );
}
add_action( 'after_setup_theme', 'n4kr_jetpack_setup', 99 );

///* Render infinite posts by using template parts */
function n4kr_render_infinite_posts() {
	while ( have_posts() ) {
		the_post();
 		get_template_part( 'content', 'portfolio-thumbs' );
	} // endwhile
}