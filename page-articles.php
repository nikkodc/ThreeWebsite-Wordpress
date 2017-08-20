<?php get_header(); ?>

<!-- DISPLAY ALL POSTS FROM A CATEGORY -->
<?php
$article_category = new WP_Query(array(
	'post_type'=>'post', 
	'post_status'=>'publish',
	'cat' => 9, //specific category id
	'orderby' => 'title',
	'order' => 'ASC'
)); 
?>

<div class="container">
	<div class="row">
		<div class="col-sm-9 post-content">
			<?php 
				// if user login is admin
				if(current_user_can('administrator')) :
			 ?>
			<!-- <div class="jumbotron article-post">
				<h1>Article post</h1>
				<p><input type="text" name="article-title" class="form-control" placeholder="Article title" required></p>
				<p><textarea name="article-content" class="form-control" placeholder="Article content" rows="5"></textarea></p>
				<p><button class="btn btn-primary pull-right post-article-button" type="submit">Submit</button></p>
			</div> -->
			<?php endif; ?>
				
			<div class="clearfix"></div>
		
			<?php if ( $article_category->have_posts() ) : ?>
			    <?php while ( $article_category->have_posts() ) : $article_category->the_post(); ?>
			    	
					<div class="col-sm-12">
						<div class="well">
		                  <h1><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
		                  <?php the_content(); ?>
		                  <blockquote>
		                    <span class="glyphicon glyphicon-calendar"></span>
		                    <a href="<?php the_permalink();?>"><?php the_time('F j, Y'); ?></a>&nbsp;
		                    <span class="glyphicon glyphicon-user"></span>
		                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>&nbsp;
		                    <span class="glyphicon glyphicon-folder-open"></span> 
		                      <?php
		                        $categories = get_the_category();
		                        $separator = ", ";
		                        $output = '';
		                        if ($categories) {
		                          foreach ($categories as $category) {
		                            $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>'  . $separator;
		                          }
		                            echo trim($output, $separator);
		                        }
		                      ?>
		                    &nbsp;
		                    <?php if(get_comments_number()==0): ?>
		                      <span class="glyphicon glyphicon-comment"></span>
		                      <a href="<?php comments_link();?>">Leave a comment</a>
		                    <?php else: ?>
		                      <span class="glyphicon glyphicon-comment"></span>
		                      <a href="<?php comments_link();?>"><span class="badge"><?php comments_number(); ?></span></a>
		                    <?php endif; ?>
		                  </blockquote>
		                </div>	
					</div>

			    <?php endwhile; ?>
			    <!-- pevent loop destruction -->
			    <?php wp_reset_postdata(); ?>
			<?php else : ?>
			    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>
			<div class="clearfix"></div>
			<div class="jumbotron">
				<h2>About the author</h2>
				<div class="row">
					<div class="col-sm-2">
						<div class="thumbnail">
							<?php echo get_avatar(get_the_author_meta('ID'),112) ?>
						</div>
							
					</div>
					<div class="col-sm-10">
						<p><?php echo get_the_author_meta('nickname') ?></p>
						<p><?php echo get_the_author_meta('description') ?></p>
						<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>">View all posts by <?php echo get_the_author_meta('nickname') ?></a>
					</div>
				</div>
			</div>
		</div>
			
		<div class="col-sm-3 sidebar-content">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>


<?php get_footer(); ?>
