
<!-- Banner Section End -->
<!-- ARTICULADOS Start -->
<section class="articulados articulados_page dialogart-post">
  <div class="container">
   
    <div class="opus_main">
        <div class="row">
            <div class="col-lg-8">
              <div class="articulados_inner opus"> 
                <div class="clearfix">

                  <?php Project049_Frontoffice::render_share_bar(); ?>

                  <div class="link_tag">Opus-Shots // <?php the_category( ',' ); ?></div>
                  
                </div>
                <h1><?php the_title(); ?></h1>
                <div class="articulados_bttn clearfix">
                    <p class="left_link">
                      <?php the_author_posts_link(); ?>
                    </p>
                  </div>
        
                <div class="opus_content">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php the_post_thumbnail( 'project049-post-single-vertical', array( 'class' => 'alignleft' ) ); ?>
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>     
                  
              </div>
            </div>

            <div class="col-lg-4">
              <div class="articulados_sidebar">
                  <?php get_sidebar( 'articulo' ); ?>
              </div>  
            </div>
        
            
          </div>
    </div>
    
  </div>
</section> 
<!-- ARTICULADOS End -->