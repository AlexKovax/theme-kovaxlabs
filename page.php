<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Kovaxlabs
 * @since Kovaxlabs 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content">
                    <?php the_content(); ?>                    
            </div>
    </article>
<?php endwhile; ?>

<?php get_footer(); ?>