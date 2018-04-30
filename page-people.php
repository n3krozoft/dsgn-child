<?php

/*
Template Name: N3People
*/


/**
 * @package Designer
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
				
					<!-- Grab the featured image -->
					<?php if ( '' != get_the_post_thumbnail() ) { ?>
						<a class="featured-image" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'large-image' ); ?></a>
					<?php } ?>
				
					<div class="entry-content">
						<?php the_content(); ?>
				</div><!-- .entry-content -->
					<?php edit_post_link( __( 'Edit', 'designer' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
				</article><!-- #post-## -->
						<?php
						
						echo '<h2>Collaborators</h2>';
						
						// we need to query Terms of The "People" Taxonomy.
						
//						if ( false === ( $n3kr_ppl_query = get_transient( 'n3kr_ppl_queryxx' ) ) ) {
						    // It wasn't there, so regenerate the data and save the transient
						    
						    $args = array(
						            'show_option_all'    => '',
						            	'orderby'            => 'slug',
						            	'order'              => 'ASC',
						            	'style'              => 'list',
						            	'taxonomy'           => 'people',
						            	'walker'             => null
						           );
						    
						    	$n3kr_ppl_query = get_categories( $args );
						    						    
//							set_transient( 'n3kr_ppl_query2', $n3kr_ppl_query, 5); // 60*60*48 = 48 heures
//							} // end of get_transient test 	
							
							if ($n3kr_ppl_query) {
							
										?>
										<div class="portfolio-wrapper <?php echo esc_attr( get_option( 'designer_customizer_portfolio', 'tile' ) ); ?>">
										
															<?php
															foreach($n3kr_ppl_query as $term) { 
															
															    // get_template_part( 'content', 'people-thumbs' );
															    include( get_stylesheet_directory() . '/content-people-thumbs.php' );
															
															} 
															
															?>
										
										</div><!-- .portfolio-wrapper -->
										<?php
										
										
										echo '<ul>';
							
							    	
							    	
							    	echo '</ul>';
							}
						
						// END querying for "People"
							
						?>
					
				
				<?php
								
				?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>