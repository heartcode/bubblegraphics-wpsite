<div id="project-wrapper">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  	<div class="project-wrapper">
  	  <div id="spinner"></div>
  		<div id="project-images">
  		  <?php
    		  /*
    		  * Getting the images from the project folder
    		  */
    		  $customFields = get_post_custom_values('Folder', $post->ID);
    	    $projectFolder = 'projects/' . $customFields[0] . '/';
		  
    		  $results = array();
    		  $i = 0;
    		  if($handler = opendir($projectFolder)) {
            while (FALSE !== $file = readdir($handler)) {
              if ($file != "." && $file != ".." && $file != ".DS_Store" && $file !== 'thumbnail.jpg') {
                $results[$i] = $file;
                $i++;
              }
            }
    		  }
    		  
    		  sort($results);
    		  $i = 0;
    		  while ($i < sizeof($results)) {
    		    echo "<img class='project-image' src='" . site_url() . '/' . $projectFolder . $results[$i] . "'/>";
    		    $i++;
    		  }
    		  closedir($handler);
    		?>
  		</div>
  		
  		<div id="project-info">  
    	  <header class="entry-header">
      		<h1 class="entry-title"><?php the_title(); ?></h1>
      		<h2><?php 
  	        $customFields = get_post_custom_values('Subtitle', $post->ID);
  	        echo $customFields[0];
  	      ?></h2>
      		<?php if ( 'post' == get_post_type() ) : ?>
      		<?php endif; ?>
      	</header><!-- .entry-header -->
    		<?php the_content(); ?>
    		<nav id="prev-next-nav">
          <?php next_post_link('%link', '<img class="prev-next-post-links prev-post-link" src="' . get_bloginfo('template_url') . '/images/arrow-prev.png" alt="Previous project" />') ?>
          <?php previous_post_link('%link', '<img class="prev-next-post-links next-post-link" src="' . get_bloginfo('template_url') . '/images/arrow-next.png" alt="Next project" />') ?>
    		  <img class="prev-next-post-links page-top" src="<?php bloginfo('template_url'); ?>/images/arrow-up.png" alt="Go to top" />
    		  <a class="addthis_button" href="http://www.addthis.com/bookmark.php">
    		    <img class="prev-next-post-links" src="<?php bloginfo('template_url'); ?>/images/addthis.png" width="32" height="32" border="0" alt="Share" />
    		  </a>
    		</nav>
  		</div>
  		
  		<nav id="prev-next-nav-bottom">
        <?php next_post_link('%link', '<img class="prev-next-post-links prev-post-link" src="' . get_bloginfo('template_url') . '/images/arrow-prev.png" alt="Previous project" />') ?>
  		  <?php previous_post_link('%link', '<img class="prev-next-post-links next-post-link" src="' . get_bloginfo('template_url') . '/images/arrow-next.png" alt="Next project" />') ?>
  		  <img class="prev-next-post-links page-top" src="<?php bloginfo('template_url'); ?>/images/arrow-up.png" alt="Go to top" />
  		  
  		  <a class="addthis_button" href="http://www.addthis.com/bookmark.php">
  		    <img class="prev-next-post-links" src="<?php bloginfo('template_url'); ?>/images/addthis.png" width="32" height="32" border="0" alt="Share" />
  		  </a>
  		</nav>
  	</div><!-- .entry-content -->

  	<footer class="entry-meta">
		
  	</footer><!-- .entry-meta -->
  </article><!-- #post-<?php the_ID(); ?> -->
</div>
