<?php

$template_directory = get_template_directory();

function akaka_section_live_css($key){
  $custom_css ='';
    	
  switch($key){

	case 'slider':	
	  //slider css	
	  $i=1;
	  $key = 'slider';
	  
	  $default_content = akaka_section_content_default($key);
	
	  $slider_title_typography_default     = array(
		  'font-family'    => 'Roboto',
		  'variant'        => '100',
		  'font-size'      => '56px',
		  'color'          => '#ffffff',
		  'text-transform' => 'Uppercase',
		  'text-align'     => 'center'
	  );
	  $slider_description_typography_default     = array(
			'font-family'    => 'Roboto',
			'variant'        => 'regular',
			'font-size'      => '20px',
			'color'          => '#ffffff',
			'text-transform' => 'none',
			'text-align'     => 'center'
		);	
	  $slider_button_typography_default     = array(
			'font-family'    => 'Roboto',
			'variant'        => '300',
			'font-size'      => '20px',
			'color'          => '#ffffff',
			'text-transform' => 'Uppercase',
			'text-align'     => 'center'
		);
		
	  $slider_title_typography = theta_get_typography( 'slider_title_typography', $slider_title_typography_default );
	  $slider_description_typography = theta_get_typography( 'slider_description_typography', $slider_description_typography_default );  
	  $slider_button_typography = theta_get_typography( 'slider_button_typography', $slider_button_typography_default );  
	  
	  $slider_button_background = esc_attr(get_theme_mod( 'slider_button_background', '#f55145' ));  
	  
	  $slider_button_background_hover = theta_change_color($slider_button_background,0.8);;
	
	
	  $j=0;

	
	  $custom_css .=".ct_slider_warp .carousel-caption h1.slider_title{ $slider_title_typography font-weight: lighter;}.ct_slider_warp .carousel-caption p.ct_slider_text{  $slider_description_typography font-weight: lighter;}.ct_slider .ct_slider_warp  a.btn{ $slider_button_typography background-color: $slider_button_background; border-color:$slider_button_background_hover;border-radius: 4px;font-weight: lighter; }.ct_slider .ct_slider_warp a:hover.btn{ background-color:$slider_button_background_hover;}";
	
	  
	  $repeater_value = get_theme_mod( 'repeater_slider',$default_content);	
	  if ( ! empty( $repeater_value ) ) :	
		foreach ( $repeater_value as $row ) : 
		  if ( isset( $row[ 'slider_page' ] ) && !empty( $row[ 'slider_page' ] ) ) :
			$sliders = akaka_get_slider_details($row[ 'slider_page' ]);
			
			$slide_image = $sliders['images'];
			
			$custom_css .=".ct_slider_item_".($j+1)."{background-image: url(".esc_url($slide_image).");background-size:auto 100%;background-position: center;}.ct_slider_item_".($j+1).":after {content: '';position: absolute;width: 100%;height: 100%;top: 0;left: 0;background-color: rgba(37, 46, 53, 0.5);}";
	
	 
		  endif;
		  
		  $j++;
		endforeach;	
	  endif;
	  //slider css end 
 	  break;


	case 'testimonials':
	//team
	  $i=7;
	  $key = 'testimonials';
	  //--------------public css set-------------------
	  $sections = akaka_get_section_default(); 
	  $default = $sections[$key];
	  
	  $default_content = akaka_section_content_default($key); 
		  
	  // section title hr	  
	  $title_typography_value = get_theme_mod( $key.'_title_typography', akaka_get_default_title_font($key) );
	  $title_bottom_hr_color  = esc_attr(theta_change_color($title_typography_value['color'],0.5));
	  
	  $custom_css .='section.ct_section_'.$i.' .section-title-hr { border-top: 1px solid '.$title_bottom_hr_color.';}
	  section.ct_section_'.$i.'  .section-title-hr:after {  border-top: 10px solid '.$title_bottom_hr_color.';}';
	  
	 
	  //background color and  opacity  
	  $section_background_color     = esc_attr(get_theme_mod( $key.'_section_background_color',$default['color'])); 
	  $section_background_opacity     = get_theme_mod( $key.'_section_background_opacity',1); 
	
	  // background
	  $section_background_image  = esc_url(get_theme_mod( $key.'_section_background_image',$default['img'])); 

		$background                    = theta_get_background( $section_background_color , $section_background_opacity );	
		$custom_css .='section.ct_section_'.$i.' {'.$background.' background-size: 100% auto;}';  
	  
		if ( $section_background_image != '' ){$custom_css .='section.ct_section_'.$i.' {background-image:url('.$section_background_image.');}';  } 

	  
	  //padding 
	  $padding_default = array( 'top' => $default['padding_top'] ,'bottom' => $default['padding_bottom'] ,'left' => '0' ,'right' => '0' );
	  $section_padding     = get_theme_mod( $key.'_section_padding',$padding_default);
		
	  $custom_css .='section.ct_section_'.$i.' .section_content{padding:'.esc_attr($section_padding['top']).' '.esc_attr($section_padding['right']).' '.esc_attr($section_padding['bottom']).' '.esc_attr($section_padding['left']).';}'; 
	  
	  $t_header_color = esc_attr(get_theme_mod( 'testimonials_header_bg_color','#f55145'));
	  
	  $custom_css .='section.ct_section_'.$i.' .ct_testimonials_text,section.ct_testimonials .rangle_r{background-color:'.$t_header_color.'}';
	  
 	  break;
	  

	
	case 'blog':	
		
	  $i=10;
	  $key = 'blog';
  
	  //--------------public css set-------------------
	  $sections = akaka_get_section_default(); 
	  
	  $default = $sections[$key];
		  
	  // section title hr	  
	  $title_typography_value = get_theme_mod( $key.'_title_typography', akaka_get_default_title_font($key) );
	  $title_bottom_hr_color  = esc_attr(theta_change_color($title_typography_value['color'],0.5));
	  
	  $custom_css .='section.ct_section_'.$i.' .section-title-hr { border-top: 1px solid '.$title_bottom_hr_color.';}
	  section.ct_section_'.$i.'  .section-title-hr:after {  border-top: 10px solid '.$title_bottom_hr_color.';}';
	  
	 
	  //background color and  opacity  
	  $section_background_color     = esc_attr(get_theme_mod( $key.'_section_background_color',$default['color'])); 
	  $section_background_opacity     = get_theme_mod( $key.'_section_background_opacity',1); 
	
	  $background                    = theta_get_background( $section_background_color , $section_background_opacity );	
	  $custom_css .='section.ct_section_'.$i.' {'.$background.' background-size: 100% auto;}';  
	  
	  // background_image 
	  $section_background_image     = esc_url(get_theme_mod( $key.'_section_background_image',$default['img'])); 
	  if ( $section_background_image != '' ){$custom_css .='section.ct_section_'.$i.' {background-image:url('.$section_background_image.');}';  } 
	  
	  //padding 
	  $padding_default = array( 'top' => $default['padding_top'] ,'bottom' => $default['padding_bottom'] ,'left' => '0' ,'right' => '0' );
	  $section_padding     = get_theme_mod( $key.'_section_padding',$padding_default);
		
	  $custom_css .='section.ct_section_'.$i.' .section_content{padding:'.esc_attr($section_padding['top']).' '.esc_attr($section_padding['right']).' '.esc_attr($section_padding['bottom']).' '.esc_attr($section_padding['left']).';}'; 
	
	  $blog_button_color_hover = esc_attr(get_theme_mod( 'blog_button_color_hover','#f55145'));
	  
	  $custom_css .= '
	  .ct_post_info{ border-bottom: 3px solid '.$blog_button_color_hover.';}
	  
	  .post_readmore_bttn { background-color: '.$blog_button_color_hover.'; color: #fff; border: 1px solid '.$blog_button_color_hover.';} 
	  .post_readmore_bttn:hover,.post_readmore_bttn:active { color: '.$blog_button_color_hover.';background-color:#fff;}';		

 	  break;	
	
		
	default:
	  $custom_css  = '';	
	  	  

  }
  
  return $custom_css;	
}



function akaka_section_live_js($key){
  $custom_js ='';
    	
  switch($key){

	case 'slider': 
	
	  $custom_js .= '	var height_all = jQuery(window).height();
		jQuery(".carousel-inner .item").css("height",height_all);	

		jQuery(window).resize(function() {
			var height_all = jQuery(window).height();
			jQuery(".carousel-inner .item").css("height",height_all);
		});';	
	
	
 	  break;
	
	case 'testimonials':
	  
	$custom_js .= 'var waypoint = new Waypoint({
	  element: jQuery(".ct_testimonials_animated"),
	  handler: function(direction) {
		jQuery(".ct_testimonials_animated").addClass("animated zoomIn"); 		 	
	  },
	  offset: "80%"
	});


	
	// Testimonials resize
	var height_w = jQuery("#ct_testimonials").height();
	var height_content = jQuery("#ct-testimonials-content").height();
	jQuery(".ct_testimonials_text").css("padding-top",(height_w - height_content)/2  ); 

	
	jQuery(window).resize(function() {
		var height_w = jQuery("#ct_testimonials").height();
		var height_content = jQuery("#ct-testimonials-content").height();
	
		jQuery(".ct_testimonials_text").css("padding-top",(height_w - height_content)/2  ); 		
	});	
	';  

 	  break;
	
	case 'blog':	
		
	  $custom_js .= 'var waypoint = new Waypoint({
		  element: jQuery(".ct_blog"),
		  handler: function(direction) {
			jQuery(".ct_blog .ct_post_img").addClass("animated rotateIn"); 
		  },
		  offset: "80%"
		});';
 	  break;	
	  
	default:
	  $custom_js  = '';	

  }
  return $custom_js;	

	
}