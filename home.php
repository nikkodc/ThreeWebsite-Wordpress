<?php get_header(); ?>

<!-- GET POSTS OF CATEGORY PROJECT -->
<?php
$project_category = new WP_Query(array(
  'post_type'=>'post', 
  'post_status'=>'publish',
  'cat' => 12, //specific category id
  'orderby' => 'title',
  'order' => 'ASC'
)); 
?>

<!-- PROJECT CATEGORY -->
    <!-- content -->
      <!-- <?php if ( $project_category->have_posts() ) : ?>
        <?php while ( $project_category->have_posts() ) : $project_category->the_post(); ?>
          <table class="table-project slide-content">
            <tr>
              <td class="table-project-arrow text-center">
                <a onclick="showContent(-1)"><i class="fa fa-long-arrow-left" style="font-size:40px;"></i></a>
                <a onclick="showContent(1)"><i class="fa fa-long-arrow-right" style="font-size:40px;"></i></a>   
              </td>
              <td class="table-project-content">
                <h1><?php the_title(); ?></h1>
                  <?php the_content(); ?>
                <br>
                <a href="<?php the_permalink(); ?>">VIEW PROJECT</a>
              </td>
              <td class="table-project-image">
                <?php the_post_thumbnail(); ?>
              </td>
            </tr>
          </table>    
        <?php endwhile; ?>
            <!-- pevent loop destruction
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <p>No content found</p>
      <?php endif; ?> --> 




<!-- CAROUSEL CONTENT -->
<div class="container-fluid">
  <div class="row no-col-padding vcenter">
    
    <div class="col-sm-2 text-center">
      <div class="arrow project-arrow">
        <a href="#myCarousel" data-slide="prev">
          <i class="fa fa-long-arrow-left"></i>
        </a>
        <a  href="#myCarousel" data-slide="next">
          <i class="fa fa-long-arrow-right"></i>
        </a> 
      </div>           
    </div>

    <div class="col-sm-10">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">    
        <!-- Indicators -->
        <ol class="carousel-indicators"> 
        <?php $slideNum=0; ?>
        <?php $slideClass; ?>
        <?php if ( $project_category->have_posts() ) : ?>
          <?php while ( $project_category->have_posts() ) : $project_category->the_post(); ?>
            <?php 
              if($slideNum==0){
                $slideClass="active";
              } 
              else{
                $slideClass="x";
              }
            ?>
            <li data-target="#myCarousel" data-slide-to="<?php echo $slideNum++; ?>" class="<?php echo $slideClass; ?>"> </li>
            <?php endwhile; ?>
            <!-- pevent loop destruction -->
            <?php wp_reset_postdata(); ?>
          <?php else : ?>
            <p>No content found</p>
          <?php endif; ?>          
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <?php $slideNum=1; ?>
          <?php $itemClass; ?>
          <?php if ( $project_category->have_posts() ) : ?>
            <?php while ( $project_category->have_posts() ) : $project_category->the_post(); ?>
              <?php 
                if($slideNum==1){
                  $itemClass="item active";
                } 
                else{
                  $itemClass="item";
                }
                  $slideNum++;
              ?>
                <div class="<?php echo $itemClass; ?>">
                  <table class="table-project">
                    <tr>
                      <td class="table-project-content">
                        <div class="arrow clearfix hidden-arrow">
                          <a href="#myCarousel" data-slide="prev">
                            <i class="fa fa-long-arrow-left left"></i>
                          </a>
                          <a  href="#myCarousel" data-slide="next">
                            <i class="fa fa-long-arrow-right right"></i>
                          </a>
                        </div>
                        <h1><?php the_title(); ?></h1>
                        <p><?php the_content(); ?></p>
                        <br>
                        <a class="view-project" href="<?php the_permalink(); ?>">VIEW PROJECT</a>
                        <br><br>
                      </td>
                      <td class="table-project-image">
                        <?php the_post_thumbnail(); ?>
                      </td>
                    </tr>
                  </table>
                </div>
              <?php endwhile; ?>
              <!-- pevent loop destruction -->
              <?php wp_reset_postdata(); ?>
            <?php else : ?>
              <p>No content found</p>
            <?php endif; ?>
        </div> <!-- CAROUSEL INNER DIV -->
      </div><!-- CAROUSEL SLIDE -->
    </div><!-- COLLUMN 10 -->

  </div>
</div>
   



<!--SELECTED PROJECTS-->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-1">
    </div>
    <div class="col-sm-4">
      <blockquote class="bq">
        <b>SELECTED</b>
        <h1>PROJECTS</h1>
      </blockquote>
    </div>
    <div class="col-sm-1">
    </div>
    <div class="col-sm-5">
      <div class="project-text">
        <p>Three stands for "Functional, Timeless and Innovative". That's what powers our work when it comes to any kind of design, be it a simple marketing website or a full-stack application. Below you can find a couple of works we think best represent our three strenght points.
            </p>
      </div>
    </div>
    <div class="col-sm-1">
    </div>
  </div>
</div>
    <!--END OF SELECTED PROJECTS-->
 

<!-- DISPLY PORTFOLIO -->
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

<div class="container-fluid">
  <div class="row no-col-padding">
    <?php if ( $portfolio_category->have_posts() ) : ?>
        <?php while ( $portfolio_category->have_posts() ) : $portfolio_category->the_post(); ?>
          <!-- content -->
          <div class="image-container portfolio">
            <a href="<?php the_permalink();?>"><?php the_post_thumbnail('portfolio-thumbnail');?>
              <div class="image-overlay text-center">
                <div class="image-hover-content">
                  <b>WEBSITE</b><br>
                  <h1><?php the_title(); ?></h1>
                </div>
              </div>
            </a>
          </div>     
          <!-- end of content -->
        <?php endwhile; ?>
        <!-- pevent loop destruction -->
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>
    <div class="clearfix"></div>
  </div>
</div>
<!-- END OF DISPLAY PORTFOLIO -->



<!-- ABOUT CATEGORY -->
<div class="container-fluid">
  <div class="row no-col-padding">
    <?php
      // query for the about page
      $about_content = new WP_Query( 'pagename=about' );
      // "loop" through query (even though it's just one page) 
      while ( $about_content->have_posts() ) : $about_content->the_post();
    ?>

      <div class="col-sm-12">
        <table class="table-about">
          <tr>
            <td class="table-about-image">
              <?php the_post_thumbnail(); ?>
            </td>
            <td class="table-about-content">
                <?php the_content(); ?>
                <a href="<?php echo get_page_link(89); ?>">READ MORE</a>
            </td>
            <td class="table-about-readmore text-center">
              <a href="<?php echo get_page_link(89); ?>">READ MORE</a>
            </td>
          </tr>
        </table>
      </div>

    <?php 
    endwhile;
      // reset post data (important!)
      wp_reset_postdata();
    ?>

  </div>
</div> 
<!-- END OF ABOUT -->

<!--MEET THE SUPERSTARS-->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-1">
    </div>
    <div class="col-sm-4">
      <blockquote class="bq">
        <b>MEET THE</b>
        <h1>SUPERSTARS</h1>
      </blockquote>
    </div>
    <div class="col-sm-1">
    </div>
    <div class="col-sm-5">
      <div class="project-text">
        <p>We're a small team but we sure know how to do our job. Below are the awesome heroes behind Three, the people that make it all happen. The people that ensure you and your business are thriving. The people who we couldnâ€™t live without. We also know how to pose.
        </p>
      </div>
    </div>
    <div class="col-sm-1">
    </div>
  </div>
</div>
<!--END OF MEET THE SUPERSTARS-->

<!-- TEAM CATEGORY -->
<?php
$team_category = new WP_Query(array(
    'post_type'=>'post', 
    'post_status'=>'publish',
    'cat' => 13, //specific category id
    'posts_per_page'=>-1,//number posts displayed
    'orderby' => 'title',
    'order' => 'ASC'
)); 
?>

<div class="container-fluid">
  <div class="row no-col-padding vcenter">
    <div class="col-sm-1">
      <!-- space -->
    </div>
    <div class="col-sm-10 team-slide">
      <div class="carousel carouselTeam slide" id="myCarouselTeam">
        <div class="carousel-inner carousel2">
          <?php $count=1; ?>
          <?php $item; ?>
          <?php if ( $team_category->have_posts() ) : ?>
                    <?php while ( $team_category->have_posts() ) : $team_category->the_post(); ?>
                      <?php 
                        if($count==1){
                          $item="item itemTeam active";
                        }
                        else{
                          $item="item itemTeam";
                        }
                        $count++;
                       ?>
                        <div class="<?php echo $item; ?>">
                          <div class="image-container project-team">
                            <a href="<?php the_permalink();?>"><?php the_post_thumbnail();?>
                              <div class="image-overlay text-center">
                                <div class="image-hover-content">
                                  <h1><?php the_title(); ?></h1>
                                </div>
                              </div>
                            </a>
                          </div> 
                        </div> 

                    <?php endwhile; ?>
                    <!-- prevent loop destruction -->
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>
        </div>
        <div class="arrow hidden-arrow">
        <a href="#myCarouselTeam" data-slide="prev">
          <i class="fa fa-long-arrow-left left"></i>
        </a>
        <a href="#myCarouselTeam" data-slide="next">
          <i class="fa fa-long-arrow-right right"></i>
        </a> 
      </div>
      </div>
    </div>
    <div class="col-sm-1 text-center">
      <div class="arrow project-team-arrow">
        <a href="#myCarouselTeam" data-slide="prev">
          <i class="fa fa-long-arrow-left"></i>
        </a>
        <a href="#myCarouselTeam" data-slide="next">
          <i class="fa fa-long-arrow-right"></i>
        </a> 
      </div> 
    </div>
  </div><!-- row -->
</div>


<!-- CONTACT CATEGORY -->
<div class="container-fluid">
  <div class="row no-col-padding">
    <div class="col-sm-2"></div>
      <?php 
        $contact_content = new WP_Query( 'pagename=contact' );
        // "loop" through query (even though it's just one page) 
        while ( $contact_content->have_posts() ) : $contact_content->the_post(); ?>
            <!-- content -->
            <div class="col-sm-10">
              <table class="table-contact">
                <tr>
                  <td class="table-contact-content">
                    <?php the_content(); ?>
                    <br>
                    <a href="<?php echo get_page_link(95); ?>">GET A QUOTE</a>
                  </td>
                  <td class="table-contact-image">
                    
                    <div class="map-container">
                      <?php the_post_thumbnail('full',array('class'=>'map')); ?>
                      <div class="map-overlay">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/map_hover_33.jpg">
                      </div>
                    </div>
                      
                  </td>
                </tr>
              </table>
            </div>
              <!-- end of content -->
          <?php endwhile; ?>
          <!-- pevent loop destruction -->
          <?php wp_reset_postdata(); ?>
  </div>
</div> 

<style>
/* override position and transform in 3.3.x */
.carousel2 .item.left.active {
  transform: translateX(-33%);
}
.carousel2 .item.right.active {
  transform: translateX(33%);
}

.carousel2 .item.next {
  transform: translateX(33%)
}
.carousel2 .item.prev {
  transform: translateX(-33%)
}

.carousel2 .item.right,
.carousel2 .item.left { 
  transform: translateX(0);
}


.carousel-control.left,.carousel-control.right {background-image:none;}
</style>

<?php get_footer(); ?>
