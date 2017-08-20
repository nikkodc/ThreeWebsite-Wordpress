<?php get_header(); ?>
<!-- CONTENT OF SEARCH OUTPUT-->
<div class="container">
	<div class="row">
		<div class="col-sm-9 post-content">
			<?php 
			if( !is_page() && have_posts() ):?>
			<h1>Results for: <mark class="bg-success">"<?php the_search_query(); ?>"</mark></h1>
			<hr>
			<?php
				while( have_posts() ): the_post(); ?>
					<!-- USED TO CALL CONTENT-SEARCH.PHP AND DISPLAY CONTENT -->
					<?php get_template_part('content', 'search'); ?>
				<?php endwhile; ?>
				<!-- PAGINATION FUNCTION-->
				<div class="clearfix"></div>
				<ul class="pager jumbotron">

				<?php 
				//previou_posts_link()
				//next_posts_link
				//echo paginate_links();
				the_posts_pagination( array(	
				'mid_size'	=> 2,
				'prev_text'	=> ( '&laquo;'),
				'next_text'	=> ( '&raquo;'),
				//'before_page_number' =>  ( 'Page ' ) ,
				) );
				?>
				</ul>
				<?php else : ?>
					<h1>
						No results found for: <mark class="bg-danger">"<?php the_search_query(); ?>"</mark>
					</h1>
			<?php endif; ?>
		</div>
		<div class="col-sm-3 sidebar-content">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
