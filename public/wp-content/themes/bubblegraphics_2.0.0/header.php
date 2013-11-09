<?php
  global $stylesheets_dir;
  global $javascripts_dir;
?>

<!DOCTYPE html>
  <!--
  Conditional IE Classes by Paul Irish.
  The idea and the source was taken from his article: http://paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/
  -->
<!--[if lt IE 8 ]>
  <html class="ie" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8 ]>
  <html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if (gt IE 9)|!(IE)]>
  <html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta name="description" content="<?php if ( is_single() ) {
    echo get_post_meta($post->ID, 'Description', true);
  } else {
    bloginfo('description');
  }
?>" />
<meta name="keywords" content="<?php if ( is_single() ) {
    $tags = wp_get_post_tags($post->ID, array( 'fields' => 'slugs' ));
    print_r(implode(', ', $tags));
  } else {
    echo 'print design, graphics design, branding, logo design, freelance graphic designer, freelance print designer, freelancer, advertising, packaging design, D&AD Student Awards, stationary design, brochure design, London, United Kingdom';
  }
?>" />
<meta name="author" content="Claire Hughes | Bubblegraphics" /> 

<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=1"/>
<link rel="apple-touch-icon" href="http://bubblegraphics.com/bubblegraphics-logo-iphone.jpg"/> 
<link rel="apple-touch-icon-precomposed" href="http://bubblegraphics.com/bubblegraphics-logo-iphone.jpg"/>

<?php if(!is_single()) { ?>
<link rel="image_src" type="image/jpeg" href="http://bubblegraphics.com/bubblegraphics-logo-iphone.jpg" / >
<link rel="image_url" type="image/jpeg" href="http://bubblegraphics.com/bubblegraphics-logo-iphone.jpg" / >
<meta property="og:image" content="http://bubblegraphics.com/bubblegraphics-logo-iphone.jpg" />
<?php } else { ?>
<?php $thumb = site_url() . '/projects/' . get_post_meta($post->ID, 'Folder', true) . '/thumbnail.jpg' ?>
<link rel="image_src" type="image/jpeg" href="<?php print($thumb); ?>" / >
<link rel="image_url" type="image/jpeg" href="<?php print($thumb); ?>" / >
<meta property="og:image" content="<?php print($thumb); ?>" />
<?php } ?>
<meta property="og:title" content="<?php if ( is_single() ) {
    print(bloginfo('name') . ' | ' . get_the_title($post->ID));
  } else if (is_page()){
    print(bloginfo('name') . ' | ' . get_the_title($page->ID));
  } else {
    print(bloginfo('name'));
  }
?>" />
<meta property="og:description" content="<?php if ( is_single() ) {
    echo get_post_meta($post->ID, 'Description', true);
  } else {
    bloginfo('description');
  }
?>" />
<meta property="og:locale" content="en_GB" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php if ( is_single() ) {
    print(get_permalink($post->ID));
  } else {
    print(site_url());
  }
?>" />
<meta property="og:site_name" content="<?php bloginfo('name');?>" />


<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;
	bloginfo('name');
	wp_title( '|', true, 'left' );
	
	?></title>
<link rel="shortcut icon" href="<?php bloginfo( 'stylesheet_directory' ); ?>/favicon.ico">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Habibi' type='text/css'>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $stylesheets_dir ?>/application.css" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo $javascripts_dir ?>/header.js"></script>
<![endif]-->
<?php
	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
	<header id="header-main">
			<a id="logo" href="<?php bloginfo('url'); ?>" target=_self></a>
			<nav id="access" role="navigation">
				<?php 
				  wp_nav_menu( array( 'theme_location' => '' ) );
				?>
			</nav>
	</header>