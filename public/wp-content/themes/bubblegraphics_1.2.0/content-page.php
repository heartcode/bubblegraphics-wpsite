<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<div class="wrapper">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  	<header class="entry-header">
  	</header><!-- .entry-header -->

  	<div>
  		<?php the_content(); ?>
  		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
  	</div><!-- .entry-content -->
  	<footer class="entry-meta">
		
  	</footer><!-- .entry-meta -->
  </article><!-- #post-<?php the_ID(); ?> -->
</div>