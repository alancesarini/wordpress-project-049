<?php get_header(); ?>


<!-- Banner Section End -->
<!-- ARTICULADOS Start -->
<section class="articulados articulados_page">
  <div class="container">
    <div class="title_text">
      <span><?php single_term_title(); ?></span>
    </div>
    <div class="row">
     
    <?php 
      $i = 1;

    // Page structure for mobile devices
    if( Project049_Configuration::$mobile_detect->isMobile() && !Project049_Configuration::$mobile_detect->isTablet() ) {

      while( have_posts() ) { 
          the_post(); 
          if( 1 == $i ) {
      ?>
        <div class="col-lg-8">
            <div class="articulados_big">

                <?php get_template_part( 'partials/content', 'dialogart-big' ); ?>
                
            </div>
        </div>

        <?php } else { ?>    
        
        <div class="col-md-6">
    
            <?php get_template_part( 'partials/content', get_queried_object()->slug ); ?>
            
        </div>
        
        <?php } ?>

        <?php if( 3 == $i ) { ?>

            <div class="col-lg-4">
                <div class="articulados_sidebar">
                
                    <?php get_sidebar( 'seccion-dialogart' ); ?>
                
                </div>
            </div>

        <?php } ?>
            
        <?php
            $i++; 
        }
    
    // Page structure for non mobile devices
    } else { 

        while( have_posts() ) { 
            the_post(); 
            if( 1 == $i ) {
        ?>
          <div class="col-lg-8">
              <div class="articulados_big">
  
                  <?php get_template_part( 'partials/content', 'dialogart-big' ); ?>
                  
              </div>
          </div>
          <div class="col-lg-4">
              <div class="articulados_sidebar">
              
                  <?php get_sidebar( 'seccion-dialogart' ); ?>
              
              </div>
          </div>
  
          <?php } else { ?>    
          
          <div class="col-md-6">
      
              <?php get_template_part( 'partials/content', get_queried_object()->slug ); ?>
              
          </div>
          
          <?php 
              } 
              $i++; 
          }
    }        
        ?>

    </div>

    <div class="title_text open_articulados load-more" data-type="section" data-object="<?php echo get_queried_object()->slug; ?>" data-page="2" data-count="<?php echo Project049_Definitions::$posts_per_page; ?>" data-pages="<?php echo Project049_Frontoffice::get_total_pages( 'section', get_queried_object()->slug, 10 ); ?>">
        <span class="">ver +</span>
      </div>
  </div>
</section> 
<!-- ARTICULADOS End -->


<?php get_footer(); ?>
