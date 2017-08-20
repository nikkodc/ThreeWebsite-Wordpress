<?php get_header(); ?>
<!-- SPECIFY THE SPECIFIC CATEGORY OF POSTS -->
<div class="container">
  <div class="row">
    <h1>
      <!-- SELECTED LINK -->
      <span class='label label-default'>
      <?php 
        if(is_category()){
          echo " Category".single_cat_title();
        }elseif(is_tag()){
          echo " Tag".single_tag_title();
        }elseif (is_author()){
          the_post();//for multiple author
          echo "Author: ".get_the_author();
          rewind_posts();//unaffected loop
        }elseif(is_day()){
          echo "Day archives: ".get_the_date();
        }elseif(is_month()){
          echo "Month archives: ".get_the_date('F Y');//month and year
        }elseif(is_year()){
          echo "Year archives: ".get_the_date('Y');
        }else{
          echo "Archives";
        }
      ?>
      </span>
    </h1><br>
    <div class="col-sm-9">
      <?php
        if(have_posts()):
          ?>
        
        <!-- ALTERNATIVE TO SPECIFY ARCHIVE TITLE -->
        <!-- <header class="page-header">
        <?php
          the_archive_title( '<h1 class="page-title">', '</h1>' );
          the_archive_description( '<div class="taxonomy-description">', '</div>' );
        ?>
        </header> -->
        <?php
          while (have_posts()): the_post(); ?>
             
            <?php if(has_post_thumbnail()): ?>
              <!-- IF THERE IS A PICTURE -->
                <div class="col-sm-12 post-content">
                  <div class="well">
                    <h1><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
                      
                      <div class="row" style="margin-bottom: 0; margin-top: 0;">
                        <div class="col-sm-3">
                          <div class="thumbnail">
                            <?php the_post_thumbnail(); ?>    
                          </div>
                        </div>
                        <div class="col-sm-9">
                          <?php the_content(); ?>
                        </div>
                      </div>

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
             
            <?php else: ?>
              <!-- IF NO PICTURE -->
              <div class="col-sm-12 post-content">
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
              
            <?php endif; ?>
          <?php endwhile;
          
          else:
            echo "<h1>No content</h1>";
          endif;      
      ?>
      <div class="clearfix"></div>
      <ul class="pager bg-info">
        <?php 
        //previou_posts_link()
        //next_posts_link
        //echo paginate_links();
        the_posts_pagination( array(    
        'mid_size' => 2,
        'prev_text' => ( '&laquo;'),
        'next_text' => ( '&raquo;'),
        //'before_page_number' =>  ( 'Page ' ) ,
        ) );
        ?>
      </ul>
    </div>
    <div class="col-sm-3 sidebar-content">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
