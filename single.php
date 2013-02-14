<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Kovaxlabs
 * @since Kovaxlabs 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <nav id="nav-single" class="navigation">
        <?php previous_post_link('%link', 'Prev', TRUE); ?> 
        <?php next_post_link('%link', 'Next', TRUE); ?>
    </nav>

    <article id="post-<?php the_ID(); ?>" <?php post_class("single"); ?>>
        <?php the_content(); ?>
    </article>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
