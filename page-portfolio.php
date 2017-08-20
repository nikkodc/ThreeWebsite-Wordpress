<?php get_header(); ?>

<!-- DISPLAY ALL POSTS FROM A CATEGORY -->
<?php
$portfolio_category = new WP_Query(array(
	'post_type'=>'post', 
	'post_status'=>'publish',
	'cat' => 10, //specific category id
	'posts_per_page'=>-1,//number posts displayed
	'orderby' => 'title',
	'order' => 'ASC'
)); 
?>

<?php if ( $portfolio_category->have_posts() ) : ?>
    <?php while ( $portfolio_category->have_posts() ) : $portfolio_category->the_post(); ?>
    	<!-- content -->
    	<div class="content">
    		<div class="gallery">
    			<?php the_post_thumbnail('portfolio-thumbnail',array('class'=>'portfolio-image'));?>
	    		<div class="description">
	    			<a href="<?php the_permalink();?>"><h1><?php the_title(); ?></h1></a>
	        		<p><?php the_excerpt(); ?><a href="<?php the_permalink();?>">Read more&raquo;</a></p>
	    		</div>
    		</div>
    	</div>
        <!-- end of content -->
    <?php endwhile; ?>

    <!-- pevent loop destruction -->
    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<div class="clearfix"></div>
<?php get_footer(); ?>
