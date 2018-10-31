<?php get_header(); ?>

<?php 
    while( have_posts() ) {
        the_post();
    }
?>


<!-- Banner Section End -->
<!-- ARTICULADOS Start -->
<section class="articulados articulados_page manifiesto">
  <div class="container">
  
    <div class="top_title_text">
        <span><?php the_title(); ?></span> 
    </div>

    <div class="row">
        <div class="col-lg-8 offset-lg-2 col-md-12">
                
            <?php the_content(); ?>
            
        </div>
       
    </div>

  </div>
</section> 
<!-- ARTICULADOS End -->

<?php get_footer(); ?>