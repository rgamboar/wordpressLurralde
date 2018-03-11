<?php
  //default data
 
function akaka_section_default_order() 
{
	$section_default = array( 	
			'slider',
			'blog',
			'testimonials',			
			);
				
	return $section_default;			
 
}
  
if ( !function_exists( 'akaka_get_default_title_font' ) ){
  function akaka_get_default_title_font($key)
  {  
  
	switch($key){

	case 'testimonials':
	  $section_title_default_font     = array(
			  'font-family'    => 'Roboto',
			  'variant'        => '100',
			  'font-size'      => '36px',
			  'color'          => '#f3f3f3',
			  'text-transform' => 'Uppercase',
			  'text-align'     => 'center'
		  ); 
	  
	  
	  break;

	
	case 'blog':
	  $section_title_default_font     = array(
			  'font-family'    => 'Roboto',
			  'variant'        => '100',
			  'font-size'      => '36px',
			  'color'          => '#ffffff',
			  'text-transform' => 'Uppercase',
			  'text-align'     => 'center'
		  ); 
	  break;	
	

	default:
	  $section_title_default_font     = array(
			  'font-family'    => 'Roboto',
			  'variant'        => '100',
			  'font-size'      => '36px',
			  'color'          => '#000000',
			  'text-transform' => 'Uppercase',
			  'text-align'     => 'center'
		  ); 
	}
	return $section_title_default_font;	
  
		 
  }
}

if ( !function_exists( 'akaka_get_description_font' ) ){
  function akaka_get_description_font($key)
  {  
  
	switch($key){
	case 'testimonials':
	  $section_description_default_font     = array(
			  'font-family'    => 'Roboto',
			  'variant'        => 'regular',
			  'font-size'      => '16px',
			  'color'          => '#ECECEC',
			  'text-transform' => 'none',
			  'text-align'     => 'center'
		  ); 
	  break;
	
	case 'blog':	
	  $section_description_default_font     = array(
			  'font-family'    => 'Roboto',
			  'variant'        => 'regular',
			  'font-size'      => '16px',
			  'color'          => '#DEDEDE',
			  'text-transform' => 'none',
			  'text-align'     => 'center'
		  );   
	  
	  
	  break;	
	
	  	
	default:
	  $section_description_default_font     = array(
			  'font-family'    => 'Roboto',
			  'variant'        => 'regular',
			  'font-size'      => '14px',
			  'color'          => '#999999',
			  'text-transform' => 'none',
			  'text-align'     => 'center'
		  );   
	}
	return $section_description_default_font;
		 
  }
}
	   

  //section public set
  
function akaka_get_section_default()//section public css
{ 
  $imagepath =  get_stylesheet_directory_uri() . '/custom/images/';    
  return $sections_default = array(
 
   	'testimonials'		 => array(
		'title'		 => __( 'Our customers say', 'akaka' ),
		'description'	=> __( 'You can write a description of the section here! You can write a description of the section here!', 'akaka' ),
  		'menu'		 => 'testimonials',				
  		'color'		 => '#ffffff',
  		'img'	 => '',
  		'padding_top'	 => '0px',
  		'padding_bottom'	 => '0px',
		
  	),  
 
   	'blog'		 => array(
		'title'		 => __( 'From The Blog', 'akaka' ),
		'description'	=> __( 'You can write a description of the section here!', 'akaka' ),
  		'menu'		 => 'blog',				
  		'color'		 => '#ffffff',
  		'img'	 => esc_url($imagepath.'post-bg.jpg'),
  		'padding_top'	 => '100px',
  		'padding_bottom'	 => '80px',
		
  	), 
	 
 	
  );
}

function akaka_section_content_default($key)
{  
  $imagepath =  get_stylesheet_directory_uri() . '/custom/images/'; 
  switch($key){

	case 'slider':	
		$default     = array(
			array(
				'slider_image' => esc_url($imagepath.'p/banner1.jpg'),
				'slider_title'  => esc_html__( 'Welcome to akaka fullpage', 'akaka' ),
				'slider_desc'  => esc_html__( 'Simple and easy to use, Akaka is the perfect solution to your business or personal needs!', 'akaka' ),			
				'slider_button_text'  => esc_html__( 'Check it out', 'akaka' ),			
				'slider_url'  => '#',
			),
			
			array(
				'slider_image' => esc_url($imagepath.'p/banner2.jpg'),
				'slider_title'  => esc_html__( 'Awesome theme', 'akaka' ),
				'slider_desc'  => esc_html__( 'Many preset sections, parallax scrolling, video background, and much more features.', 'akaka' ),			
				'slider_button_text'  => esc_html__( 'Downlaod Now', 'akaka' ),			
				'slider_url'  => '#',
			),		
			
			array(
				'slider_image' => esc_url($imagepath.'p/banner3.jpg'),
				'slider_title'  => esc_html__( 'Awesome theme', 'akaka' ),
				'slider_desc'  => esc_html__( 'Absolutely suited for your business or personal needs!', 'akaka' ),			
				'slider_button_text'  => esc_html__( 'Check it out', 'akaka' ),			
				'slider_url'  => '#',
			),
		);
 	  break;

	case 'testimonials':
	  $default     = array(
			array(
				'testimonials_page' => '',
				'testimonials_job' => esc_html__( 'Web Developer', 'akaka' ),																
			),
	
			array(
				'testimonials_page' => '',
				'testimonials_job' => esc_html__( 'Web Developer', 'akaka' ),			
																	
			),
	
			array(
				'testimonials_page' => '',
				'testimonials_job' => esc_html__( 'Web Developer', 'akaka' ),			
																	
			),
		);
 	  break;
	  

	
	default:
	  $default     = array();	
	  	  

  }
  return $default;
}


?>