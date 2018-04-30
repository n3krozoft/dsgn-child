<?php
/**
 * The template part for displaying the post meta information
 *
 * @package Designer
 */


// Get the post tags
$post_tags = get_the_tags();

// Get the Jetpack portfolio tags
$portfolio_tags = get_the_term_list( get_the_ID(), 'jetpack-portfolio-tag', '', _x(', ', '', 'designer' ), '' );

// Get the portfolio categories
$portfolio_cats = get_the_term_list( get_the_ID(), 'jetpack-portfolio-type', '', _x(', ', '', 'designer' ), '' );

?>

	<div class="entry-meta">
		<ul class="meta-list">
			<!-- Published date -->
			<li>
				<?php 
				
				// test if there's a ProjectDates custom field
				
				$project_dates = get_post_meta($post->ID, 'ProjectDates', true);
				
				$project_year = get_the_date('Y');
				
				$mem_date = mem_date_processing( 
					get_post_meta($post->ID, '_mem_start_date', true) , 
					get_post_meta($post->ID, '_mem_end_date', true)
				);			
				
				if ( $project_dates !== "" ) {
				
							?>
							<strong><?php _e( 'Date', 'designer' ); ?></strong>
							<a href="/<?php echo $project_year; ?>/">
							<?php echo $project_dates; ?>
							</a>
							<?php
				
				} else if ( $mem_date["start-iso"] !== "" ) { 
						
						?>
						<strong><?php _e( 'Date', 'designer' ); ?></strong>
						<a href="/<?php echo $project_year; ?>/">
						<?php echo $mem_date["date-short"]; ?>
						</a>
						<?php 
				
				} else {	
				
						 ?>
						<strong><?php _e( 'Published', 'designer' ); ?></strong>
						<a href="/<?php echo $project_year; ?>/">
						<?php echo get_the_date('Y'); ?>
						</a>
						<?php 
				
				} // end MEM date testing
				
				 ?>
			</li>

			<!-- Author posts link -->
			
			<?php 
			
			//  test for Project taxonomy
			
			if ( has_term( '', 'project' )  ) { ?>
			
							<li class="meta-cat">
								<strong><?php _e( 'Project', 'designer' ); ?></strong>
								<?php 
								
								$terms_projects = get_the_term_list( $post->ID, 'project', '', ', ', '' );
								
								echo $terms_projects;
			
								 ?>
							</li>
			
			<?php } ?>
			
			
			<!-- Categories for posts and portfolio items -->
			<?php if ( has_category() || $portfolio_cats ) { ?>

				<li class="meta-cat">
					<strong><?php _e( 'Category', 'designer' ); ?></strong>
					<?php if ( 'jetpack-portfolio' == get_post_type() ) {
						echo $portfolio_cats;

					} else {
						the_category( ', ' );

					} ?>
				</li>

			<?php } ?>

			<!-- Tags for posts and portfolio items -->
			<?php if ( is_single() && $post_tags || 'jetpack-portfolio' == get_post_type() && $portfolio_tags ) { ?>

				<li class="meta-tag">
					<strong><?php _e( 'Tags', 'designer' ); ?></strong>
					<?php if ( 'jetpack-portfolio' == get_post_type() ) {
						echo $portfolio_tags;

					} else {
						the_tags( '' );

					} ?>
				</li>

			<?php } 
			
			// People involved
			
			if ( is_single() ) {
				
				// test for People taxonomy
			
				$terms_ppl = get_the_term_list( $post->ID, 'people', '', ', ', '' );
				
				if ( $terms_ppl ) {
						
						// then output
						?><li class="meta-tag">
						<strong><?php _e( 'Personnel', 'designer' ); ?></strong>
						<?php
										
						echo $terms_ppl;
						
						?></li>
					<?php				
																
				}
				
				// test for Curators taxonomy
				
					$terms_curator = get_the_term_list( $post->ID, 'curators', '', ', ', '' );
					
					if ( $terms_curator ) {
							
							// then output
							?><li class="meta-tag">
							<strong><?php _e( 'Curator', 'designer' ); ?></strong>
							<?php
											
							echo $terms_curator;
							
							?></li>
						<?php				
																	
					}
			
			
			}
			
			
			
			?>


		</ul><!-- .meta-list -->
	</div><!-- .entry-meta -->
