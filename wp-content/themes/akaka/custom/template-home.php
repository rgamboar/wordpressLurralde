<?php
/**
 *
 * Template name: Homepage
 * The template for displaying homepage.
 *
 * @package akaka
 */

get_header();?>  



<!--p style="height:2500px">asdfasdfasdfas d</p-->

<div id="theta-section-warp" class="theta-section-warp">
<?php
  $section_default = akaka_section_default_order();
  
 $sortable_value = maybe_unserialize( get_theme_mod( 'home_layout',$section_default ) );

  
  if ( ! empty( $sortable_value ) ) : 
	foreach ( $sortable_value as $checked_value ) :
	  get_template_part( '/custom/section/homepage-'.esc_attr( $checked_value ), '' );
	endforeach;
  endif;  
						
?>

<?php get_footer(); ?>