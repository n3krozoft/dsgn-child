<?php 


			// $terms_array = get_the_term_list( $post->ID, 'project', '', ', ', '' );
			
			$current_id = get_the_ID();
			
			$project_terms = get_the_terms( $post->ID, 'project' );
			
			foreach($project_terms as $term) {
					// add item to array...
					$terms_array[] = array( 
							"name" => $term->name, 
					    	"url" => get_tag_link($term->term_id),
					    	"count" => $term->count,
					    	"id" => $term->term_id,
					   );
				}
			
			$terms_count = $terms_array[0]["count"];
			
			// echo 'terms count: '.$terms_count;
			
			echo '<h2>'.$terms_array[0]["name"].'</h2>';
			
			if ( $terms_count >= 2 ) {
			
			// new query with Tag ID: $series_array[0]["id"]
			
//			$args = array(
//					// 'post_type'      => 'jetpack-portfolio',
//					'posts_per_page' => 10,
//					'post__not_in'   => array( get_the_ID() ),
//					'orderby'        => 'rand'
//				);
				
				$project_query = new WP_Query( array(
					'posts_per_page' => 10,
					// 'tag_id' => $terms_array[0]["id"],
					'tax_query' => array(
							array(
								'taxonomy' => 'project',
								'field'    => 'term_id',
								'terms'    => $terms_array[0]["id"],
							),
						),
					// exclude the current post:
					'post__not_in' => array( $current_id ),
//					'meta_key' => '_mem_start_date',
					'orderby'  => 'date',
					'order'  => 'DESC',
					) );
				
				
				// $project_query = new WP_Query ( $args );
				
				if ( $project_query -> have_posts() ) :
			?>

				<div class="portfolio-wrapper <?php echo esc_attr( get_option( 'designer_customizer_portfolio', 'tile' ) ); ?>">

					<?php while ( $project_query -> have_posts() ) : $project_query -> the_post();

						get_template_part( 'content', 'portfolio-thumbs' );

					endwhile;
					wp_reset_postdata();
					?>

				</div><!-- .portfolio-wrapper -->
			<?php endif;
			
			} // 