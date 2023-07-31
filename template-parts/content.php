<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package top-car-delivery
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php top_car_delivery_post_thumbnail(); ?>

	<header class="entry-header">
		<?php
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				top_car_delivery_posted_on();
				?>

		</div><!-- .entry-meta -->
		<?php endif; 
		
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title white-text-color">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a class="white-text-color" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
		<?php the_excerpt(); ?>
	</header><!-- .entry-header -->


	<footer class="entry-footer">
		<?php top_car_delivery_read_more(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
