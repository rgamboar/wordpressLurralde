<section id="ct_testimonials" class="ct_section ct_testimonials ct_section_7 ">

<?php
//testimonials
  $i=7;
  $key = 'testimonials';
  $custom_css = '';
  //--------------public css set-------------------
  $sections = akaka_get_section_default(); 
  $default = $sections[$key];
  
  $default_content = akaka_section_content_default($key); 
  
  //--------------section css set-------------------
  
  $repeater_value = get_theme_mod( 'repeater_testimonials',$default_content);	
    
?> 
	<div  id="ct-testimonials-content" class="section_content">
    	<div class="ct_testimonials_text">
			<h1 class="section_title "><?php echo esc_html( get_theme_mod( $key.'_section_title', $default['title'] ) );  ?></h1>
			<?php if ( get_theme_mod( $key.'_section_description', $default['description'] ) != '' ) : ?>
				<p class="section_text"><?php echo esc_html( get_theme_mod( $key.'_section_description', $default['description'] ) ); ?></p>
			<?php endif; ?>            
            
        </div>
        <div class="rangle"><div class="rangle_r"></div></div>
        
        <div class="ct_testimonials_list container">
			<div class="row">
            
            
			<?php  
              $k=0;

              if ( ! empty( $repeater_value ) ) :	
                foreach ( $repeater_value as $row ) : 
                  if ( isset( $row[ 'testimonials_page' ] ) && !empty( $row[ 'testimonials_page' ] ) ) :
				  $testimonial[$k] = akaka_get_testimonial_details($row[ 'testimonials_page' ]);
             ?>
				<div class="col-md-4">
	 				<div class="ct_testimonials_animated" >
						<div class="magee-testimonial-box">
    						<div class="testimonial-content">
      							<p class="testimonial-quote">
                                	<?php echo esc_html($testimonial[$k][ 'content' ]);?>
                              	</p>
    						</div>
    						<div class="testimonial-vcard style1">
      							<div class="testimonial-avatar">
                                <?php echo get_avatar( $testimonial[$k][ 'user_email' ], '60' ) ;?>
                                	<!--img src="<?php echo get_avatar( $testimonial[$k][ 'user_email' ], '60' ) ;?>" class="img-circle"-->
                                </div>
                                <div class="testimonial-author">
                                    <h4 class="name"><?php echo esc_html($testimonial[$k][ 'name' ]);?></h4>
                                    <div class="title"><?php echo esc_html($row[ 'testimonials_job' ]);?></div>
                                </div>
    						</div>
                      	</div>
                    </div>
               	</div>               			
			 <?php
			      $k++;
                  endif;
                endforeach;	
              endif;
            ?>            
            
  
                   
          	</div><!--div class="row"-->            
        </div>



	</div>
	<div class="clear"></div>
</section><!--<section id="ct_testimonials" class="ct_section ct_testimonials ct_section_<?php echo $i;?> ">-->

