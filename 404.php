<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Kovaxlabs
 * @since Kovaxlabs 1.0
 */

get_header(); ?>

<article id="post-0" class="post error404 not-found" role="main">
    <h1>Error 404</h1>
    <p>Page not foud</p>
    <?php
            get_search_form();
            // add focus to search <input>
            echo '<script>document.getElementById(\'s\') && document.getElementById(\'s\').focus();</script>'.PHP_EOL;
    ?>
</article>

<?php get_footer(); ?>
