<!-- DISPLAY SUBPAGES CONTENT -->
<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-9 post-content">
			<?php
			if (have_posts()) :
				while (have_posts()) : the_post(); ?>
					<?php
					if ( has_children() OR $post->post_parent > 0 ) { ?>
						<nav class="subpage-nav">
							
							<ul class="breadcrumb">
								<li><a href="<?php echo get_the_permalink(get_subpage_id()); ?>"><?php echo get_the_title(get_subpage_id()); ?></a></li>
								<?php
								$args = array(
									'child_of' => get_subpage_id(),
									'title_li' => ''
								);
								?>
								<?php wp_list_pages($args); ?>
							</ul>
						</nav>
					<?php } ?>
					<div class="jumbotron">
						<h2>Our <?php the_title(); ?></h2>
						<?php the_content(); ?>
					</div>
					
						
				<?php endwhile;
				else :
					echo '<p>No content found</p>';
				endif;
			?>

		</div>
		<div class="col-sm-3">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
