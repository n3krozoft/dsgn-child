<?php
/*
Template Name: N3Frontpage
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- Get the portfolio page content -->
			<div class="portfolio-content">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php // get_template_part( 'content', 'page' ); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
						<header class="entry-header">
							<h1 class="entry-title"><?php the_content(); ?></h1>
						</header><!-- .entry-header -->
						
					</article><!-- #post-## -->
					

				<?php endwhile; // end of the loop. ?>
			</div>

			<!-- Get the portfolio items -->
			<?php
				if ( get_query_var( 'paged' ) ) :
					$paged = get_query_var( 'paged' );
				elseif ( get_query_var( 'page' ) ) :
					$paged = get_query_var( 'page' );
				else :
					$paged = 1;
				endif;

				$args = array(
					'post_type'      => 'post',
					'posts_per_page' => 8,
					'paged'          => $paged,
					'orderby' => 'date',
					'order' => 'DESC',
					'tax_query' => array(
							array(
								'taxonomy' => 'n3kr_type',
								'field'    => 'slug',
								'terms'    => array('featured'),
							),
						),
				);
				$project_query = new WP_Query ( $args );
				if ( $project_query -> have_posts() ) :
			?>

				<div class="portfolio-wrapper <?php echo esc_attr( get_option( 'designer_customizer_portfolio', 'tile') ); ?>">

					<?php /* Start the Loop */ ?>
					<?php while ( $project_query -> have_posts() ) : $project_query -> the_post(); ?>

						<?php get_template_part( 'content', 'portfolio-thumbs' ); ?>

					<?php endwhile; ?>

				</div><!-- .portfolio-wrapper -->

			<?php else : ?>

				<section class="no-results">

					<div class="page-content">
						<?php if ( current_user_can( 'publish_posts' ) ) : ?>

							<p class="get-started">No results</p>

						<?php endif; ?>
					</div><!-- .page-content -->
				</section><!-- .no-results -->

			<?php endif; ?>

			<?php wp_reset_query(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>