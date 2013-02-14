<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage Kovaxlabs
 * @since Kovaxlabs 1.0
 */
?>


<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
    <article id="post-0" class="post error404 not-found" role="main">
        <h1>Error 404</h1>
        <p>Page not foud</p>
        <?php
                get_search_form();
                // add focus to search <input>
                echo '<script>document.getElementById(\'s\') && document.getElementById(\'s\').focus();</script>'.PHP_EOL;
        ?>
    </article>
<?php endif; ?>

<?php
	/* Start the Loop.
	 */
?>
<?php while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class("loop"); ?>>        
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail("thumbnail");?>
        </a>
        <h2 class="entry-title">                  
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h2>   

        <footer class="entry-utility">
            <?php the_excerpt(); ?>
        </footer>
    </article>

<?php endwhile; // End the loop. Whew. ?>
