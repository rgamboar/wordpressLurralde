<section id="ct_blog" class="ct_section ct_blog ct_section_10 ">
<?php
//blog
  $i=10;
  $key = 'blog';
  
  $sections = akaka_get_section_default(); 
  
  $default = $sections[$key];
	  
  //--------------section css set-------------------
  
  $blog_article_number = get_theme_mod( 'blog_article_number',3);
  
  $blog_url = esc_url(get_theme_mod( 'blog_url',''));  
  
  $blog_categories = esc_html(get_theme_mod( 'blog_categories',''));

  $blog_button_text = esc_html(get_theme_mod( 'blog_button_text',__( 'Read The Blog', 'akaka' )));

?> 

	<div id="ct-blog-post" class="section_content overlay">

        <div class="ct-title  container">
        
        	<?php if ( get_theme_mod( $key.'_section_title', $default['title'] ) != '' ) : ?>        
            <h1 class="section_title "><?php echo esc_html( get_theme_mod( $key.'_section_title', $default['title'] ) );  ?></h1>
            <span class="top-left-deco"></span> 
            <span class="top-right-deco"></span>
            <span class="bottom-deco"></span>
            
			<?php endif; ?>
			<?php if ( get_theme_mod( $key.'_section_description', $default['description'] ) != '' ) : ?>
				<p class="section_text"><?php echo esc_html( get_theme_mod( $key.'_section_description', $default['description'] ) ); ?></p>
			<?php endif; ?>
        </div>  
     
        <div class="ct_post_list  container">

			<div class="row">
            
                <?php
		
					// Pull all the categories into an array
					//Pull all the categories into an array
					$options_categories = array();
					$options_categories_obj = get_categories();
					foreach ($options_categories_obj as $category) {
						$options_categories[$category->cat_name] = $category->cat_ID;
					}

					$options_cat_id = array();


					if($options_categories){
						foreach ( $options_categories as $cat_name => $cat ) {
							if(!empty($blog_categories)){	
							if (!in_array($cat_name, $blog_categories)){$options_cat_id[]= $cat;}	
							}
						}
					}		
				
					
					if(empty($options_cat_id)){
						
						$query_posts = array( 
						'showposts' => $blog_article_number,// $post_list_num
						'ignore_sticky_posts' => 1,
						
						 ); 

					}else{
					
						$query_posts =  array( 
						  'showposts' => $blog_article_number, 
						  'ignore_sticky_posts' => 1,
						  'category__in' => $options_cat_id,
						 );
					}
					$the_query = new WP_Query( $query_posts );
					 
                    if ($the_query->have_posts()) :  while ($the_query->have_posts()) : $the_query->the_post();                             
                ?>
                    <div class="col-md-4 ct_clear_margin_padding">  
                    
              			<div class="col-md-12  ct_clear_margin_padding">
                            <div id="post-3420" class="ct_vertical_column ct_clear_margin_padding">
                                <div class="ct_post_img">
                                    <a href="<?php the_permalink(); ?>">
                                    <?php
										$exclude_id = get_the_ID();
										$thumb_array = akaka_get_blog_thumbnail($exclude_id);
                                    ?>
                                        <img src="<?php if($thumb_array['fullpath'] != ''){echo esc_url($thumb_array['fullpath']);}?>" /> 

                                        <div class="meta">
                                            <i class="fa fa-search fa-2x" aria-hidden="true"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>


						<div class="col-md-12 ct_blog_info">
                            <div class="ct_post_info">
                                <h3><?php the_title(); ?></h3>
                                <p class="post-meta-2"><i class="fa fa-calendar-times-o" aria-hidden="true"></i> <?php the_time('M d, y');?></p>   
                                <div class="post-content"><?php the_excerpt();?> </div>  
                                <div class="ct_post_readmore"><a class="post_readmore_bttn" href="<?php the_permalink(); ?>"><?php echo esc_html__('Read More','akaka'); ?></a></div>             
                            </div>
                        </div>                    
                    
                    </div><!--div class="ct_row ct_clear_margin_padding"-->

                <?php 
				
					endwhile; 
					wp_reset_postdata();
					endif;
					
				 ?>                             

                <p class="clear"></p>                             

                
				<div class="ct_post_more">
                    <a href="<?php echo esc_url($blog_url); ?>" class="casems"><span><?php if($blog_button_text!=''){echo esc_html($blog_button_text);}else{echo esc_html__( 'Read The Blog', 'akaka' );}?></span> <i></i></a>
                </div> 	                
                
                
                                                          
            </div>	
        </div>



	</div>
	<div class="clear"></div>
</section><!--section id="ct_contact" class="ct_section ct_contact ct_section_9 "-->

