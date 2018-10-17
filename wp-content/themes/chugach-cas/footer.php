<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */
?>

</div><!-- #content -->

<?php
   _s_get_template_part( 'template-parts/global', 'footer-cta' );
?>

<footer class="site-footer" role="contentinfo" itemscope itemtype="https://schema.org/WPFooter">
    <div class="wrap">
        <?php            
        $copyright = sprintf( '<p>&copy; %s ALL AMERICAN OIL FIELD, LLC.</p>', 
                                  date( 'Y' ) );
                                  
        $designer  = sprintf( '<p>All rights reserved. <a href="%1$s" target="_blank">Seattle Web Design</a> by <a href="%1$s" target="_blank">Sayenko design</a></p>', 'https://www.sayenkodesign.com/' );
                                                    
        printf( '<div class="column row footer-copyright">%s%s</div>', $copyright, $designer );

        ?>
     </div>
 
 </footer><!-- #colophon -->

<?php 
 
wp_footer(); 
?>
</body>
</html>
