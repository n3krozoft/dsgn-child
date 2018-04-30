<?php



/* Dashboard improvement
******************************/

function tabula_remove_dashboard_widgets() {
	// Globalize the metaboxes array, this holds all the widgets for wp-admin
	global $wp_meta_boxes;
	
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );

	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity'] );

	// RSS feeds:
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );

}
add_action( 'wp_dashboard_setup', 'tabula_remove_dashboard_widgets' );



/**
 * Show recent posts : 
 * https://gist.github.com/ms-studio/6069116
 */
 
function wps_recent_posts_dw() {
?>
   <ul class="dash-recent-posts" style="list-style-type: none;padding-left: 0;">
   		<style>
   			.dash-recent-posts .date {
   			}
   			.dash-recent-posts .separator {
   				padding: 0 0.4em;
   			}
   		</style>
     <?php
          global $post;
          $args = array( 
          	'posts_per_page' => 7,
          	'post_type' => array('post','page')
          );
          $myposts = get_posts( $args );
                foreach( $myposts as $post ) :  setup_postdata($post); 
                		
                		$post_edit_link = admin_url().'post.php?post='.get_the_ID().'&action=edit' ;
                		$sprtr = '<span class="separator">–</span>';
                ?>
                    <li>
                    <? the_date('j F','',''); echo $sprtr; ?>
                    <b><a href="<?php echo $post_edit_link; ?>"><?php the_title(); ?></a></b> 
                    <?php echo $sprtr; ?><span class=""><a href="<?php echo $post_edit_link; ?>">modifier</a> • 
                    <a href="<?php the_permalink(); ?>">voir</a></span></li>
          <?php endforeach; ?>
   </ul>
<?php
}
function add_wps_recent_posts_dw() {
       wp_add_dashboard_widget( 'wps_recent_posts_dw', __( 'Recent Posts' ), 'wps_recent_posts_dw' );
}
add_action('wp_dashboard_setup', 'add_wps_recent_posts_dw' );


