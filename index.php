<?php get_header(); ?>
<!-- OPEN ALL THE CONTENT OF SPECIFIC CATEGORY -->
<div class="container">
  <div class="row">
    <div class="col-sm-9 post-content">
      <?php
        if(have_posts()):
          while (have_posts()): the_post(); ?>
            <header class="search-content-header">
              <h1><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
              <small class="bg-info" class="post-info">Date posted: <?php the_time('F j, Y g:i a'); ?> | Posted by: <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> | Posted in
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
              </small>
            </header> 
            <?php if(has_post_thumbnail()): ?>
              <!-- IF THERE IS A PICTURE -->
              <div class="clearfix">
                <div class="col-sm-4">
                  <div class="thumbnail">
                    <?php the_post_thumbnail(); ?>    
                  </div>
                </div>
                <div class="col-sm-8">
                  <?php the_content(); ?>  
                </div>
                
              </div>
              <hr>
            <?php else: ?>
              <!-- IF NO PICTURE -->
              <div class="col-sm-12">
                <?php the_content(); ?>
                <hr>
              </div>
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
