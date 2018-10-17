<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo THEME_FAVICONS;?>/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo THEME_FAVICONS;?>/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo THEME_FAVICONS;?>/favicon-16x16.png">
<link rel="manifest" href="<?php echo THEME_FAVICONS;?>/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <ul class="skip-link screen-reader-text">
        <li><a href="#content" class="screen-reader-shortcut"><?php esc_html_e( 'Skip to content', '_s' ); ?></a></li>
        <li><a href="#footer" class="screen-reader-shortcut"><?php esc_html_e( 'Skip to footer', '_s' ); ?></a></li>
    </ul>
    
    <div class="sticky-header">   
        <header id="masthead" class="site-header" role="banner" itemscope itemtype="https://schema.org/WPHeader">
            <div class="wrap">
                        
                <div class="row align-middle large-unstack">
                    
                          
                    <div class="columns site-branding shrink">
                        <div class="site-title">
                        <?php
                        $site_url = home_url();
                        $logo = sprintf('<img src="%sheader/logo.png" alt="site logo" />', trailingslashit( THEME_IMG ) );                    
                        printf('<a href="%s" title="%s">%s</a>',
                                $site_url, get_bloginfo( 'name' ), $logo );
                        ?>
                        </div>
                    </div><!-- .site-branding -->
                    
                    <nav id="site-navigation" class="nav-primary column" role="navigation" aria-label="Main" itemscope itemtype="https://schema.org/SiteNavigationElement">            
                        
                        <?php
                            // Desktop Menu
                            $args = array(
                                'theme_location' => 'primary',
                                'menu' => 'Primary Menu',
                                'container' => '',
                                'container_class' => '',
                                'container_id' => '',
                                'menu_id'        => 'primary-menu',
                                'menu_class'     => 'menu',
                                'before' => '',
                                'after' => '',
                                'link_before' => '',
                                'link_after' => '',
                                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
                             );
                            wp_nav_menu($args);
                        ?>
                        
                    </nav>
                    
                </div>
    
                
                
            </div><!-- wrap -->
             
        </header><!-- #masthead -->
    </div>

<div id="page" class="site-container">

	<div id="content" class="site-content">