<?php get_header(); ?>

<!-- OPEN THE CONTENT OF SPECIFIC POST -->
<div class="container">
	<div class="row">
		<div class="col-sm-9 post-content">
			<?php
				if(have_posts()):
					while (have_posts()): the_post(); ?>
						<blockquote class="bg-success">
							<header class="search-content-header">
								<h1><?php the_title(); ?></h1>
								<span class="glyphicon glyphicon-calendar"></span> Date posted: <?php the_time('F j, Y g:i a'); ?>
								<br><span class="glyphicon glyphicon-user"></span> Posted by: <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
								<br><span class="glyphicon glyphicon-folder-open"></span> Posted in
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
								
							</header>
						</blockquote>
							
						<?php if(has_post_thumbnail()): ?>
							<!-- IF THERE IS A PICTURE -->
							<div class="col-sm-4">
								<div class="thumbnail">
									<?php the_post_thumbnail(); ?>		
								</div>
							</div>
							<div class="col-sm-8 jumbotron">
								<?php the_content(); ?>
							</div>
						    <?php if(comments_open() || get_comments_number()) :
						    	// CALL COMMMENTS.PHP 
						       	comments_template();
						       	endif;
						    ?>

						<?php else: ?>
							<!-- IF NO PICTURE -->
							<div class="col-sm-12 jumbotron">
								<?php the_content(); ?>
							</div>
							<?php if(comments_open() || get_comments_number()) :
						    	// CALL COMMMENTS.PHP 
						       	comments_template();
						       	endif;
						    ?>
						<?php endif; ?>
					<?php endwhile;
					else:
						echo "<h1>No content</h1>";
					endif;			
			?>
		</div>
		<div class="col-sm-3 sidebar-content">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
