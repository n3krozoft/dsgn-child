<?php 



// custom taxonomies
// source: http://net.tutsplus.com/?p=11658
// et http://codex.wordpress.org/Function_Reference/register_taxonomy
add_action( 'init', 'build_taxonomies', 0 );

function build_taxonomies() {

register_taxonomy( 'n3kr_type',
	'post',
	array(
		'hierarchical' => true,
		'labels' => array(
		    'name' => _x( 'Content types', 'taxonomy general name' ),
		    'singular_name' => _x( 'Content type', 'taxonomy singular name' ),
		    'search_items' =>  __( 'Search' ),
		    'all_items' => __( 'All types' ),
		    'parent_item' => __( 'Parent' ),
		    'parent_item_colon' => __( 'Parents:' ),
		    'edit_item' => __( 'Edit' ), 
		    'update_item' => __( 'Update' ),
		    'add_new_item' => __( 'Add new' ),
		    'new_item_name' => __( 'New type' ),
		    'menu_name' => __( 'Content types' ),
		  ),
		'query_var' => true,
		'rewrite' => array( 'slug' => 'content-type' ),
		'rewrite' => true
	)
);


register_taxonomy('project',
		array( 'post' ),
		array( 
 		'hierarchical' => false, 
 		'label' => 'Projects',
 		'labels'  => array(
 			'name'                => _x( 'Projects', 'taxonomy general name' ),
 			'singular_name'       => _x( 'Project', 'taxonomy singular name' ),
 			'search_items'        => __( 'Search Projects' ),
 			'popular_items'              => __( 'Most used' ),
 					'all_items'                  => __( 'All' ),
 					'parent_item'                => null,
 					'parent_item_colon'          => null,
 					'edit_item'                  => __( 'Modify' ),
 					'update_item'                => __( 'Update' ),
 			'menu_name'           => __( 'Projects' )
 		),
 		'show_ui' => true,
 		'query_var' => true,
 		'rewrite' => array('slug' => 'project'),
 		'singular_label' => 'Project') 
 );
 

register_taxonomy('people',
		array( 'post' ),
		array( 
 		'hierarchical' => false, 
 		'label' => 'People',
 		'labels'  => array(
 			'name'                => _x( 'People', 'taxonomy general name' ),
 			'singular_name'       => _x( 'People', 'taxonomy singular name' ),
 			'search_items'        => __( 'Search People' ),
 			'popular_items'              => __( 'Most used' ),
 					'all_items'                  => __( 'All' ),
 					'parent_item'                => null,
 					'parent_item_colon'          => null,
 					'edit_item'                  => __( 'Modify' ),
 					'update_item'                => __( 'Update' ),
 			'menu_name'           => __( 'People' )
 		),
 		'show_ui' => true,
 		'query_var' => true,
 		'rewrite' => array('slug' => 'agents'),
 		'singular_label' => 'People') 
 );
 
 register_taxonomy('curators',
 		array( 'post' ),
 		array( 
  		'hierarchical' => false, 
  		'label' => 'Curators',
  		'labels'  => array(
  			'name'                => _x( 'Curators', 'taxonomy general name' ),
  			'singular_name'       => _x( 'Curator', 'taxonomy singular name' ),
  			'search_items'        => __( 'Search Curators' ),
  			'popular_items'              => __( 'Most used' ),
  					'all_items'                  => __( 'All' ),
  					'parent_item'                => null,
  					'parent_item_colon'          => null,
  					'edit_item'                  => __( 'Modify' ),
  					'update_item'                => __( 'Update' ),
  			'menu_name'           => __( 'People' )
  		),
  		'show_ui' => true,
  		'query_var' => true,
  		'rewrite' => array('slug' => 'curators'),
  		'singular_label' => 'Curator') 
  );
 
}


