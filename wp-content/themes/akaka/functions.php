<?php

function akaka_setup(){

	//====free demo====
	require_once( get_stylesheet_directory() . '/custom/setup.php');
	require_once( get_stylesheet_directory().'/custom/inc.php');		
	require_once( get_stylesheet_directory().'/custom/akaka-config.php');
	//====free demo end====	

}
add_action( 'after_setup_theme', 'akaka_setup' );


	
function akaka_custom_scripts()
{
	$theme_info = wp_get_theme();
		
	wp_enqueue_style('theta-style',  get_template_directory_uri() .'/style.css',array('theta-base','font-awesome','bootstrap'),$theme_info->get( 'Version' ), false);
	wp_enqueue_style('akaka-style', get_stylesheet_uri(),array('theta-style'), $theme_info->get( 'Version' ) );	
	
	
	
	wp_enqueue_style(
		'akaka-custom-style',
		get_template_directory_uri() . '/css/custom_script.css'
	);
	
	$custom_css = '';
	$color = '#F55145';	
	//header css
 	if ( get_theme_mod( 'theme_color','#F55145') ){
		$color = esc_attr(get_theme_mod( 'theme_color','#F55145')) ;
	}	
				
	$color_hover = theta_change_color($color,0.8);
	$color_rbg = theta_hex2rgb( $color );

	$header_color_rbg = theta_hex2rgb( '#ffffff' );

	
	if( is_front_page() ){	
		$custom_css .= '	
		#theta-top-search span.theta-close-search-field{ color:'.$color.';}#theta-top-search .theta-search-form input{ color:#EFEFEF;}
		header.fixed{background-color:transparent;}
		header.changeh{background-color:rgba(0,0,0,0.5) ;	}
		
		#footer {   position: absolute; }

		';
	}

	// get sction live css
	$sortable_value = maybe_unserialize( get_theme_mod( 'home_layout', akaka_section_default_order() ) );
	

	if ( ! empty( $sortable_value ) ) : 
	  foreach ( $sortable_value as $checked_value ) :
	  
		$custom_css .= akaka_section_live_css($checked_value);

	  endforeach;
	endif; 
	
	
	
    wp_add_inline_style( 'akaka-custom-style', $custom_css );
		
		

	wp_enqueue_script('waypoints', get_stylesheet_directory_uri().'/custom/js/jquery.waypoints.min.js', array( 'jquery' ), '4.0.0', true );	
	wp_enqueue_script('fullPage', get_stylesheet_directory_uri().'/custom/js/jquery.fullPage.js', array( 'jquery' ), '2.5.4', true ); 
	
	wp_enqueue_script('theta-main', get_template_directory_uri().'/js/main.js', array( 'jquery' ),$theme_info->get( 'Version' ), true );	
	wp_enqueue_script('akaka-main', get_stylesheet_directory_uri().'/custom/js/main.js', array( 'jquery' ),$theme_info->get( 'Version' ), true );		
	
	wp_add_inline_script( 'akaka-main', akaka_script_method() );
				
}

add_action( 'wp_enqueue_scripts', 'akaka_custom_scripts' );


function akaka_script_method() {	
	$custom_js = 'jQuery(document).ready(function($){';
	
	//front-page
	$custom_js .= 'var height = jQuery(window).height();
	var width = jQuery(window).width();';
	
	require_once(get_template_directory().'/inc/Mobile_Detect.php');
	
	
	$detect = new Mobile_Detect;	
	
	if (!$detect->isMobile() && is_front_page() && !is_home() ) {
		
		$custom_js .= "jQuery('#theta-section-warp').fullpage({
			'sectionSelector': '.ct_section',
			'scrollBar': true,
			'scrollingSpeed': 500,
			'loopBottom':false ,
			'easing': 'linear',

			anchors: [".akaka_js_menu()."],
			menu: '.menu'
		});
		";	
	}else{
		
		$custom_js .= 'jQuery(".fullpage-nav").css("display","none");';
		
	}
	
	

	if(is_front_page() ){
		// get sction live js
		$sortable_value = maybe_unserialize( get_theme_mod( 'home_layout', akaka_section_default_order() ) );
		
	
		if ( ! empty( $sortable_value ) ) : 
		  foreach ( $sortable_value as $checked_value ) :
		  
			$custom_js .= akaka_section_live_js($checked_value);
	
		  endforeach;
		endif; 
	}	
	
	
	$custom_js .= '});';
	

	return $custom_js;
}



if ( ! function_exists( 'akaka_get_section_menu' ) ) {
	function akaka_get_section_menu(){
		$section_menu = '';
		$sortable_value = maybe_unserialize( get_theme_mod( 'home_layout',akaka_section_default_order() ) );	
		if ( ! empty( $sortable_value ) ) : 
		  foreach ( $sortable_value as $checked_value ) :
			$section_menu .= '<li data-menuanchor="'.$checked_value.'"><a href="#'.$checked_value.'">'.ucfirst(esc_html(get_theme_mod( $checked_value.'_section_menu_title',$checked_value) )).'</a></li>';
		  endforeach;
		endif; 
	
		return $section_menu;
	}

}

if ( ! function_exists( 'akaka_js_menu' ) ) {
	function akaka_js_menu(){
		$section_menu = '';

		$sortable_value = maybe_unserialize( get_theme_mod( 'home_layout',akaka_section_default_order() ) );
		
	
		if ( ! empty( $sortable_value ) ) : 
		  foreach ( $sortable_value as $checked_value ) :
			$section_menu .= '\''.$checked_value.'\',';
		  endforeach;
		endif; 
	
		return $section_menu;
	}

}

/* this function gets thumbnail from Post Thumbnail or Custom field or First post image */
if ( ! function_exists( 'akaka_get_blog_thumbnail' ) ) {
	function akaka_get_blog_thumbnail($post_id)
	{
		if(has_post_thumbnail())
		{
			
			$ct_post_thumbnail_fullpath=wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), "Full");
			$thumb_array['fullpath'] = $ct_post_thumbnail_fullpath[0];
		
		}else{
			$post_content = get_post($post_id)->post_content;
			$thumb_array['fullpath'] = theta_catch_that_image($post_content);
		}	
		
		if($thumb_array['fullpath']=="" )
		{
			$thumb_array['fullpath'] = esc_url(get_theme_mod( 'blog_feature_img',get_template_directory_uri()."/images/default.jpg"));		
		}		

		return $thumb_array;
		
	}
}

function akaka_get_slider_details($page_id)
{
	$slider = array();
 	$page_data = get_page( $page_id ); 	
	
	$slider['title'] = $page_data->post_title;
	$slider['content'] = $page_data->post_content;	
	
	$ct_post_thumbnail_fullpath=wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), "Full");
	$slider['images'] = $ct_post_thumbnail_fullpath[0];
	
	return 	$slider;
}

function akaka_get_testimonial_details($page_id)
{
	$testimonial = array();
	
	$page_data = get_page($page_id);
	$author_id = $page_data->post_author;	

	$testimonial['name'] = get_the_author_meta( 'user_nicename' ,$author_id );
	$testimonial['user_email'] = get_the_author_meta( 'user_email' ,$author_id );

	$testimonial['content'] = $page_data->post_content;	
	
	return 	$testimonial;
}
