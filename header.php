<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Kovaxlabs
 * @since Kovaxlabs 1.0
 */

?><!DOCTYPE html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie ie9 lte9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		
                <title>
                    <?php
			wp_title( '|', true, 'right' );
                    ?>
                </title>
                
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		
                <!-- pingback -->
                <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
                
                <!-- CSS -->
                <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />	

                <!-- fonts -->

                <!-- scripts -->
                <script src="//code.jquery.com/jquery-1.9.1.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>
                        
                <script>
                    $(document).ready(function(){
                        //INIT
                    });                
                </script>
                
	</head>
	<body <?php body_class(); ?>>
                        
            <header role="banner">
                    <h1>
                        Title...
                    </h1>
            </header>

            <nav role="navigation">
                <ul>
                <?php 
                    $menu_name = 'primary';
                    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
                        $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );      
                        $menu_items = wp_get_nav_menu_items($menu->term_id);
                        foreach ( (array) $menu_items as $key => $menu_item ) {
                            echo '<li><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
                        }
                    }
                ?> 
                </ul>                
            </nav>

            <section id="content" role="main">