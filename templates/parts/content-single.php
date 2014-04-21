<?php
/**
 * @package sosimple
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
		wp_link_pages( array(
			'before' => '<p class="page-links">' . __( 'Pages:', 'sosimple' ),
			'after'  => '</p>',
		) );
		?>
	</div><!-- .entry-content -->
	
	<footer class="entry-footer">
		<?php get_template_part( 'templates/parts/entry', 'meta' ); ?>
	</footer><!-- .entry-footer -->
	
</article>