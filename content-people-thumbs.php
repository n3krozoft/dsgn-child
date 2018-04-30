<?php
/**
 * The template used for displaying projects on index view
 *
 * @package Designer
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post portfolio-column' ); ?>>

	<!-- Grab the featured image based on theme options -->
	
	<?php 
	
			$image_size = 'portfolio-'.get_option( 'designer_customizer_portfolio', 'tile' );
		
	
	if ( '' != get_the_post_thumbnail() ) {
		?>
		<a class="featured-image" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( $image_size ); ?></a>
	<?php }
	
	// grab "people" term image via ACF
	
	$acf_term_img = get_field('acf_ppl_image', $term);
	
//	echo '<div class="none">';
//	var_dump($acf_term_img);
//	echo '</div>';
	
	if ( !empty($acf_term_img) ) {
	
			// vars
				$url = $acf_term_img['url'];
				$title = $acf_term_img['title'];
				$alt = $acf_term_img['alt'];
				$caption = $acf_term_img['caption'];
			
				// thumbnail
				$size = $image_size;
				$thumb = $acf_term_img['sizes'][ $size ];
				$width = $acf_term_img['sizes'][ $size . '-width' ];
				$height = $acf_term_img['sizes'][ $size . '-height' ];
	
		?>
			
			<a class="featured-image" href="<?php echo get_term_link( $term->slug, 'people' ); ?>"><img width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="<?php echo $thumb; ?>" class="attachment-portfolio-tile wp-post-image" alt="<?php echo $alt; ?>" /></a>
			
		<?php
	
	} else {
	
		// echo '<p>(no image)</p>';
	}
	
	 ?>

	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php echo get_term_link( $term->slug, 'people' ); ?>" rel="bookmark"><?php echo $term->name ; ?></a></h1>

		<?php 
			
		
		?>
	</header><!-- .entry-header -->

</article><!-- #post-## -->