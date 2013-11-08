<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Bubblegraphics
 * @subpackage Bubblegraphics
 * @since Bubblegraphics 1.0
 */
get_header(); ?>
<div class="wrapper">
		<div id="primary">
			<div id="content" role="main">

      <div id="spinner"></div>

			<?php if ( have_posts() ) : ?>
        <ul id="project-thumbnails">
  				<?php /* Start the Loop */ ?>
  				<?php while ( have_posts() ) : the_post(); ?>

  					<li>
    					<a href="<?php the_permalink();?>" target="_self">
    					  <div class="project-thumbnail-img-wrapper">
    					    <?php
    					      /*
              		  * Getting the images from the project folder
              		  */
              		  $customFields = get_post_custom_values('Folder', $post->ID);
              	    $projectFolder = 'projects/' . $customFields[0] . '/';

              		  $results = array();
              		  if($handler = opendir($projectFolder)) {
                      while (FALSE !== $file = readdir($handler)) {
                        if ($file === 'thumbnail.jpg') {
                          echo "<img class='project-thumbnail' src='" . site_url() . '/' . $projectFolder . $file . "' />";
                          break;
                        }
                      }
              		  }
              		  closedir($handler);
    					    ?>
    					    <div class="project-thumbnail-info-fader"></div>
    					  </div>
    					  <div class="project-thumbnail-info-wrapper">
  					      <div class="project-thumbnail-info-title">
    					      <?php the_title(); ?>
    					    </div>
    					    <div class="project-thumbnail-info-line"></div>
    					    <div class="project-thumbnail-info-subtitle">
    					      <?php 
    					        $customFields = get_post_custom_values('Subtitle', $post->ID);
    					        echo $customFields[0];
    					      ?>
  					      </div>
  					    </div>
  					  </a>
  					</li>
          
  				<?php endwhile; ?>
        </ul>
			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</div><!-- #primary -->
</div>
<?php get_footer(); ?>