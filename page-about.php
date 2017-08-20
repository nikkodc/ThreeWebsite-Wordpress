<?php get_header(); ?>
<!-- DISPLAY ALL POSTS FROM A CATEGORY -->
<!-- <?php
$team_category = new WP_Query(array(
    'post_type'=>'post', 
    'post_status'=>'publish',
    'cat' => 13, //specific category id
    'posts_per_page'=>-1,//number posts displayed
    'orderby' => 'title',
    'order' => 'ASC'
)); 
?> -->

<!-- <?php
$about_category = new WP_Query(array(
  'post_type'=>'post', 
  'post_status'=>'publish',
  'cat' => 11, //specific category id
  'orderby' => 'title',
  'order' => 'ASC'
)); 
?> -->
<!-- DISPLAY SUB PAGES OF THIS PAGE -->
<div class="container post-content-about">
    <div class="row">
        <div class="col-sm-9 post-content">
            <!-- DISPLAYS SUB PAGES MENU -->
            <?php
                if (have_posts()) :
                    while (have_posts()) : the_post(); ?>
                        <?php
                        if ( has_children() OR $post->post_parent > 0 ) { ?>
                            <nav class="subpage-nav">
                                <ul class="breadcrumb">
                                    <li class="active"><?php echo get_the_title(get_subpage_id()); ?></li>
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
                    <?php endwhile;
                else :
                    echo '<p>No content found</p>';
                endif;
            ?>
            <div class="jumbotron">
                <!-- DISPLAY ABOUT PAGE CONTENT -->
                <?php the_content(); ?>
            </div>
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
