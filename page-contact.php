<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-9 post-content">
			<!-- DISPLAY CONTACT CONTENT -->
			<?php 
		        $contact_content = new WP_Query( 'pagename=contact' );
		        // "loop" through query (even though it's just one page) 
		        while ( $contact_content->have_posts() ) : $contact_content->the_post(); ?>
		            <!-- content -->
		         	<div class="jumbotron">
		            	<?php the_content(); ?>
		            </div>            
		            
		            <div class="row">
		            
			            
						<div class="col-sm-6">
							<div class="map-container contact-page">
		                      <?php the_post_thumbnail('full',array('class'=>'map')); ?>
		                    	<div class="map-overlay">
		                        	<img src="<?php echo get_template_directory_uri(); ?>/images/map_hover_33.jpg">
		                    	</div>
		                    </div>
						</div>
						<div >
							<?php if(comments_open() || get_comments_number()) :
							    	// CALL COMMMENTS.PHP 
							       	comments_template();
							       	endif;
							?>
						</div>
		            </div>  
                         
		              <!-- end of content -->
		          	<?php endwhile; ?>
		          	<!-- pevent loop destruction -->
		          	<?php wp_reset_postdata(); ?>
		
		</div>
		<div class="col-sm-3 sidebar-content">
			<?php get_sidebar(); ?>
		</div>
	</div>

</div>

<?php get_footer(); ?>
