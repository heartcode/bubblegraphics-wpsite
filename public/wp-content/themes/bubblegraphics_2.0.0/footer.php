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

global $javascripts_dir;
?>

<footer>
    <a href="mailto:claire@bubblegraphics.com?subject='Hello Claire!'">claire@bubblegraphics.com</a><span> | Some rights reserved © Copyright Claire Hughes 2013 – <a href="http://robertpataki.com" target="_blank">thanks Rob</a></span>
</footer>

<?php wp_footer(); ?>

<script type="text/javascript" src="<?php echo $javascripts_dir; ?>/application.js"></script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f2ee2bd14ac194e"></script>

</body>
</html>