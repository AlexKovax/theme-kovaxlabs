<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Kovaxlabs
 * @since Kovaxlabs 1.0
 */
?>
        <div class="spacer"></div>
        
    </section><!-- #main -->                

     <footer>
        Footer...
    </footer>

    <?php
        /* Always have wp_footer() just before the closing </body>
         * tag of your theme, or you will break many plugins, which
         * generally use this hook to reference JavaScript files.
         */
        wp_footer();
    ?>
    
    </body>
</html>