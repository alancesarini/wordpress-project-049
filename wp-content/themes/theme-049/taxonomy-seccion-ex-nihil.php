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
      while( have_posts() ) { 
          the_post(); 
      ?>
        
        <div class="col-md-6">
    
            <?php get_template_part( 'partials/content', get_queried_object()->slug ); ?>
            
        </div>
        
        <?php } ?>

    </div>

    <div class="title_text open_articulados load-more" data-type="section" data-object="<?php echo get_queried_object()->slug; ?>" data-page="2" data-count="2" data-pages="<?php echo Project049_Frontoffice::get_total_pages( 'section', get_queried_object()->slug, 2 ); ?>">
        <span class="">ver +</span>
      </div>
  </div>
</section> 
<!-- ARTICULADOS End -->


<?php get_footer(); ?>
