<?php
/*
Template Name: About
*/

function kr_body_class( $classes ) {
  unset( $classes[array_search('page-template-default', $classes )] );
  $classes[] = 'page-builder';
  return $classes;
}
add_filter( 'body_class', 'kr_body_class', 99 );

get_header(); ?>

<?php
_s_get_template_part( 'template-parts/global', 'hero' );
_s_get_template_part( 'template-parts/about', 'background-image' );

?>

<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main">
	<?php
        _s_get_template_part( 'template-parts/about', 'mission' );
        _s_get_template_part( 'template-parts/about', 'partnership' );
        _s_get_template_part( 'template-parts/about', 'culture' );
        _s_get_template_part( 'template-parts/about', 'leadership' );
        _s_get_template_part( 'template-parts/about', 'story' );
	?>
	</main>


</div>

<?php
get_footer();
