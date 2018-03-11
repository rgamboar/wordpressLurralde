<?php
/**
 * Kirki Advanced Customizer
 * This is a sample configuration file to demonstrate all fields & capabilities.
 * @package akaka
 */
// Early exit if Kirki is not installed

 $imagepath =  get_stylesheet_directory_uri() . '/custom/images/'; 
 
  if ( !class_exists( 'Kirki' ) ) {
	return;
  }
  

  Kirki::add_config( 'akaka_settings', array(
  	'capability'	 => 'edit_theme_options',
  	'option_type'	 => 'theme_mod',
  ) );
 
 


//==========homepage ==========
  Kirki::add_panel( 'homepage', array(
  	'priority'	 => 10,
  	'title'		 => __( 'Homepage Settings', 'akaka' ),
    'description'	 => __( 'Homepage options for akaka theme', 'akaka' ),
  ) );
  
// Homepage Layout
  //homepage section setting   
  Kirki::add_section( 'homepage_layout', array(
  	'title'		 => __( 'Homepage Layout', 'akaka' ),
  	'panel'		 => 'homepage',
  	'priority'	 => 10,
  ) );

  Kirki::add_section( 'slider_section', array(
  	'title'		 => __( 'Slider Settings', 'akaka' ),
  	'panel'		 => 'homepage',
  	'priority'	 => 10,
  ) );
  Kirki::add_section( 'blog_section', array(
  	'title'		 => __( 'Blog Post Settings', 'akaka' ),
  	'panel'		 => 'homepage',
  	'priority'	 => 10,
  ) );
  
  Kirki::add_section( 'testimonials_section', array(
  	'title'		 => __( 'Testimonials Settings', 'akaka' ),
  	'panel'		 => 'homepage',
  	'priority'	 => 10,
  ) );  
    
  


  Kirki::add_field( 'akaka_settings', array(
  	'type'				 => 'custom',
  	'settings'			 => 'front_page_info',
  	'label'				 => __( 'Switch "Front page displays" to "A static page"', 'akaka' ),
  	'section'			 => 'homepage_layout',
  	'description'		 => sprintf( __( 'Your homepage is not static page. In order to set up the home page as shown in the official demo on our website (one page front page with sections), you will need to set up your front page to use a static page instead of showing your latest blog posts. Check the %s page for more informations.', 'akaka' ), '<a href="' . esc_url(admin_url( 'options-reading.php' )) . '"><strong>' . __( 'Theme info', 'akaka' ) . '</strong></a>' ),
  	'priority'			 => 10,
  	'active_callback'	 => array(
  		array(
  			'setting'	 => 'show_on_front',
  			'operator'	 => '!=',
  			'value'		 => 'page',
  		),
  	),
  ) );

// Homepage Layout   sortable 
  Kirki::add_field( 'akaka_settings', array(
  	'type'		 => 'sortable',
  	'settings'	 => 'home_layout',
  	'label'		 => esc_attr__( 'Homepage Blocks', 'akaka' ),
  	'section'	 => 'homepage_layout',
  	'help'		 => esc_attr__( 'Drag and Drop and enable the homepage blocks.', 'akaka' ),
	'default'     => akaka_section_default_order(),
  	'choices'	 => array(
		'slider'			 => esc_html__( 'Slider', 'akaka' ),
  		'testimonials'		 => esc_html__( 'Testimonials', 'akaka' ),
  		'blog'		 => esc_html__( 'Blog Post', 'akaka' ),	
  	),
  	'priority'	 => 10,	
	
  ) );
  
  if ( !function_exists('theta_themes_pro')) {   
	Kirki::add_field( 'akaka_settings', array(
		  'type'			 => 'custom',
		  'settings'		 => 'pro-features',
		  'label'			 => __( 'Akaka PRO', 'akaka' ),
		  'description'	 => __( 'Available in Akaka PRO: Feature Section, Gallery Section, Service Section, Facts / Number Section, Our Team Section, Pricing Section, Testimonials Section, Clients Section,Contact Us Section,Download Section, Google Map, Custom Colors, Google Fonts, video(include Youtube) Backgrounds, Animations, Custom Footer Link and much more...', 'akaka' ),
		  'section'		 => 'homepage_layout',
		  'default'		 => '<a class="install-now button-primary button" href="' . esc_url( 'https://www.coothemes.com/themes/theta.php' ) . '" aria-label="Akaka PRO" data-name="Akaka PRO">' . __( 'Discover Akaka PRO', 'akaka' ) . '</a>',
		  'priority'		 => 10,
	  ) ); 
  }
	
  
//slider
  Kirki::add_field( 'akaka_settings', array(
	  'type'		 => 'text',
	  'settings'	 => 'slider_section_menu_title',
	  'label'		 => __( 'Main Menu Title', 'akaka' ),
	  'default'	 => 'slider',
	  'section'	 => 'slider_section',
	  'priority'	 => 10,
  ) ); 

    Kirki::add_field( 'akaka_settings', array(
  	'type'		 => 'repeater',
  	'label'		 => __( 'Slider', 'akaka' ),
  	'section'	 => 'slider_section',
  	'priority'	 => 10,
  	'settings'	 => 'repeater_slider',
	'default'     => array(
		array(
			'slider_page' => '',		
			'slider_button_text'  => esc_html__( 'Check it out', 'akaka' ),			
			'slider_url'  => '#',
		),
		
		array(
			'slider_page' => '',	
			'slider_button_text'  => esc_html__( 'Downlaod Now', 'akaka' ),			
			'slider_url'  => '#',
		),		
		
		array(
			'slider_page' => '',
			'slider_button_text'  => esc_html__( 'Check it out', 'akaka' ),			
			'slider_url'  => '#',
		),
	),
  	'fields'	 => array(
  		'slider_page'	 => array(
  			'type'		 => 'dropdown-pages',
  			'label'		 => __( 'Select page', 'akaka' ),
  			'default'	 => '',
  		),

  		'slider_button_text'	 => array(
  			'type'		 => 'text',
  			'label'		 => __( 'Button Text', 'akaka' ),
  			'default'	 => '',
  		),		
  		'slider_url'	 => array(
  			'type'		 => 'text',
  			'label'		 => __( 'URL', 'akaka' ),
  			'default'	 => '',
  		),
  	),
	
    'row_label'			 => array(
  		'type'	 => 'text',
  		'value'	 => __( 'Slide', 'akaka' ),
  	),
  ) ); 
  
  Kirki::add_field( 'akaka_settings', array(
	'type'        => 'color',
	'settings'    => 'slider_button_background',
	'label'       => __( 'Slider Button Background Color', 'akaka' ),
	'section'     => 'slider_section',
	'default'     => '#F55145',
	'priority'    => 10,
	'choices'     => array(
		'alpha' => true,
	),
	
  ) );  
 
  Kirki::add_field( 'akaka_settings', array(
	'type'        => 'number',
	'settings'    => 'slide_time',
	'label'       => esc_attr__( 'Slide Time', 'akaka' ),
	'section'     => 'slider_section',
	'default'     => 5000,
	'choices'     => array(
		'min'  => 0,
		'max'  => 30000,
		'step' => 500,
	),
  ) );    
  
  Kirki::add_field( 'akaka_settings', array(
	'type'        => 'typography',
	'settings'    => 'slider_title_typography',
	'label'       => esc_attr__( 'Title Typography', 'akaka' ),
	'section'     => 'slider_section',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => '100',
		'font-size'      => '56px',
		'color'          => '#ffffff',
		'text-transform' => 'Uppercase',
		'text-align'     => 'center'
	),
	'priority'    => 10,

  ) );

  Kirki::add_field( 'akaka_settings', array(
	'type'        => 'typography',
	'settings'    => 'slider_description_typography',
	'label'       => esc_attr__( 'Description Typography', 'akaka' ),
	'section'     => 'slider_section',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '20px',

		'color'          => '#ffffff',
		'text-transform' => 'none',
		'text-align'     => 'center'
	),
	'priority'    => 10,

  ) );



  Kirki::add_field( 'akaka_settings', array(
	'type'        => 'typography',
	'settings'    => 'slider_button_typography',
	'label'       => esc_attr__( 'Button Text Typography', 'akaka' ),
	'section'     => 'slider_section',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => '300',
		'font-size'      => '20px',
		'color'          => '#ffffff',
		'text-transform' => 'Uppercase',
		'text-align'     => 'center'
	),
	'priority'    => 10,

  ) );  
  
//slider end


//==Sections base settings=====
  //$sections in inc.php
  $sections = akaka_get_section_default();
  foreach ( $sections as $keys => $values ) {
 
  	Kirki::add_field( 'akaka_settings', array(
  		'type'		 => 'text',
  		'settings'	 => $keys . '_section_title',
  		'label'		 => __( 'Section Title', 'akaka' ),
  		'default'	 => $values[ 'title' ],
  		'section'	 => $keys . '_section',
  		'priority'	 => 10,
  	) );
	
  	Kirki::add_field( 'akaka_settings', array(
  		'type'		 => 'textarea',
  		'settings'	 => $keys . '_section_description',
  		'label'		 => __( 'Section Description', 'akaka' ),
  		'default'	 => $values[ 'description' ],
  		'section'	 => $keys . '_section',
  		'priority'	 => 10,
  	) ); 
 
  	Kirki::add_field( 'akaka_settings', array(
  		'type'		 => 'text',
  		'settings'	 => $keys . '_section_menu_title',
  		'label'		 => __( 'Main Menu Title', 'akaka' ),
  		'default'	 => $values[ 'menu' ],
  		'section'	 => $keys . '_section',
  		'priority'	 => 10,
  	) ); 
 
    //background_color
  	Kirki::add_field( 'akaka_settings', array(
  		'type'		 => 'color',
  		'settings'	 => $keys . '_section_background_color',
  		'label'		 => __( 'Section Background Color', 'akaka' ),
  		'section'	 => $keys . '_section',
  		'default'	 => $values[ 'color' ],
  		'priority'	 => 10,
  	) ); 
 
 
    //background_image
    Kirki::add_field( 'akaka_settings', array(
    	'type'        => 'image',
    	'settings'    => $keys . '_section_background_image',
    	'label'       => __( 'Section Background Image', 'akaka' ),
    	'section'	 => $keys . '_section',
    	'default'     => $values[ 'img' ],
    	'priority'    => 10,

    ) );
	
	//background_opacity
	Kirki::add_field( 'akaka_settings', array(
		'type'        => 'slider',
		'settings'    => $keys . '_section_background_opacity',
		'label'       => __( 'Section Background Opacity', 'akaka' ),
    	'section'	 => $keys . '_section',
		'default'     => 1,
		'choices'     => array(
			'min'  => '0',
			'max'  => '1',
			'step' => '0.1',
		),
	) );
	
	//padding
	Kirki::add_field( 'akaka_settings', array(
		'type'        => 'spacing',
		'settings'	 => $keys . '_section_padding',
		'label'       => __( 'Section Padding Control', 'akaka' ),
		'section'	 => $keys . '_section',
		'default'     => array(
			'top'    => $values[ 'padding_top' ],
			'bottom' => $values[ 'padding_bottom' ],
			'left'   => '0',
			'right'  => '0',
		),
		'priority'    => 10,
	) );


  	Kirki::add_field( 'akaka_settings', array(
  		'type'			 => 'toggle',
  		'settings'		 => $keys . '_typography_setting_enable',
  		'label'			 => __( 'Title / Description Typography Setting', 'akaka' ),
  		'description'	 => __( 'Enable or disable Title / Description Typography', 'akaka' ),
  		'section'		 => $keys . '_section',
  		'default'		 => 1,
  		'priority'		 => 10,
  	) );
	
	//title_typography
	Kirki::add_field( 'akaka_settings', array(
	  'type'        => 'typography',
	  'settings'    => $keys . '_title_typography',
	  'label'       => $keys . esc_attr__( ' Title Typography', 'akaka' ),
  	  'section'	    => $keys . '_section',
	  'default'     => akaka_get_default_title_font($keys),
	  'priority'    => 10,
	  'output'      => array(
		array(
			'element' => 'section.ct_'.$keys.' .section_title',
		),
	  ), 
	  'required'	 => array(
		  array(
			  'setting'	 => $keys . '_typography_setting_enable',
			  'operator'	 => '==',
			  'value'		 => 1,
		  ),
	  )	  
	  
	   
	  
	) );
  
    //description_typography
	Kirki::add_field( 'akaka_settings', array(
	  'type'        => 'typography',
	  'settings'    => $keys . '_description_typography',
	  'label'       => $keys .esc_attr__( ' Description Typography', 'akaka' ),
  	  'section'	    => $keys . '_section',
	  'default'     => akaka_get_description_font($keys),
	  'priority'    => 10,
	  
	  
	  'output'      => array(
		array(
			'element' => 'section.ct_'.$keys.' .section_content,section.ct_'.$keys.' p',
		),
	  ),
	  
	  'required'	 => array(
		  array(
			  'setting'	 => $keys . '_typography_setting_enable',
			  'operator'	 => '==',
			  'value'		 => 1,
		  ),
	  )	  
	  	  
	  
	  
	) );

  }  
//==Sections base settings end=====  


//testimonials
  Kirki::add_field( 'akaka_settings', array(
	'type'        => 'color',
	'settings'    => 'testimonials_header_bg_color',
	'label'       => __( 'Header Background Color', 'akaka' ),
	'section'     => 'testimonials_section',
	'default'     => '#00AAD5',
	'priority'    => 10,

  ) );    

  Kirki::add_field( 'akaka_settings', array(
  	'type'		 => 'repeater',
  	'label'		 => __( 'Testimonials', 'akaka' ),
  	'section'	 => 'testimonials_section',
  	'priority'	 => 10,
  	'settings'	 => 'repeater_testimonials',
	
	'default'     => akaka_section_content_default('testimonials'),
  	'fields'	 => array(
  		'testimonials_page'	 => array(
  			'type'		 => 'dropdown-pages',
  			'label'		 => __( 'Customer testimonials page', 'akaka' ),
  			'default'	 =>'',
  		),	

  		'testimonials_job'	 => array(
  			'type'		 => 'text',
  			'label'		 => __( 'Customer Job', 'akaka' ),
  			'default'	 =>'',
  		),	

  	),
	
    'row_label'			 => array(
  		'type'	 => 'text',
  		'value'	 => __( 'Testimonials Item', 'akaka' ),
  	),
  ) );


//blog//,
  
  Kirki::add_field( 'akaka_settings', array(
	'type'        => 'select',
	'settings'    => 'blog_article_number',
	'label'			 => __( 'Displays the number of articles', 'akaka' ),
	'section'     => 'blog_section',
	'default'     => '3',
	'priority'    => 10,

	'choices'     => array(
		'3' => 3,
		'6' => 6,
		'9' => 9,
		'12' => 12,
	),
  ) );  
  
  Kirki::add_field( 'akaka_settings', array(
	  'type'		 => 'text',
	  'settings'	 => 'blog_url',
	  'label'		 => __( 'Blog URL', 'akaka' ),
	  'default'	 => '',
	  'section'	 => 'blog_section',
	  'priority'	 => 10,
  ) );  
  
  Kirki::add_field( 'akaka_settings', array(
	  'type'		 => 'text',
	  'settings'	 => 'blog_button_text',
	  'label'		 => __( 'Button Text', 'akaka' ),
	  'default'	 => __( 'Read The Blog', 'akaka' ),
	  'section'	 => 'blog_section',
	  'priority'	 => 10,
  ) );  
  
  Kirki::add_field( 'akaka_settings', array(
	'type'        => 'color',
	'settings'    => 'blog_button_color_hover',
	'label'       => __( 'Button Hover Background Color', 'akaka' ),
	'section'     => 'blog_section',
	'default'     => '#F55145',
	'priority'    => 10,

  ) );  
  
  
  // Pull all the categories into an array
  $options_categories = array();
  $options_categories_obj = get_categories();

  foreach ($options_categories_obj as $category) {
	$options_categories[$category->cat_name] = $category->cat_name;
  }			  
   
  Kirki::add_field( 'akaka_settings', array(
	'type'        => 'multicheck',
	'settings'    => 'blog_categories',
	'label'		  => __( 'The following categories are forbidden to appear on the homepage', 'akaka' ),
	'section'     => 'blog_section',
	'default'     => '',
	'priority'    => 10,
	'choices'     => $options_categories,
	
	
  ) );    
   
  Kirki::add_field( 'akaka_settings', array(
	'type'        => 'image',
	'settings'    => 'blog_feature_img',
	'label'       => __( 'Homepage Article Default Feature image', 'akaka' ),
	'section'     => 'blog_section',
	'default'     => esc_url($imagepath.'default-thumbnail.jpg'),
	'priority'    => 10,
  ) );


//==========homepage end==========
