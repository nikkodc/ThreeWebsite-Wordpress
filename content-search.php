<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- THIS IS WHERE THE RESULTS OF SEARCH OUTPUT WILL APPEAR -->
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
			
		<?php endif; ?>
		
</article>