<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Designer
 */

get_header();

// Check for author description
$curauth = get_userdata( $post->post_author );
?>

	<div id="primary" class="content-area <?php if ( ! $curauth->description ) { echo "no-desc"; } ?>">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', get_post_format() );
			
			// If there is a MP4 video: generate video player
			
			
			 ?>

			<!-- If author has a bio, show it. -->
			<?php if ( $curauth->description ) { ?>
				<header class="author-info">
					<div class="author-profile">
						<div class="author-avatar">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php esc_attr_e( 'Posts by ', 'designer' ); ?> <?php the_author(); ?>">
									<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'designer_author_bio_avatar_size', 100 ) ); ?>
								</a>
						</div>

						<div class="author-description">
							<h2><?php printf( __( 'Published by %s', 'designer' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
						</div>
					</div>
				</header><!-- author-info -->
			<?php } ?>

			<?php 
			
			if ( has_term( '', 'project' )  ) { 
											
											// echo '<h1>Related content:</h1>';
											
											get_template_part( 'content', 'related' );
														
			//								$terms_projects = get_the_term_list( $post->ID, 'project', '', ', ', '' );
			//								
			//								echo $terms_projects;
						
						 }
			
			designer_post_nav(); 
						
			
			endwhile; // end of the loop. 
			
			
			// get_template_part( 'temp' );
				
			
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>