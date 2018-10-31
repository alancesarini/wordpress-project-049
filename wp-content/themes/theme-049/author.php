<?php get_header(); ?>

<?php 
global $wp_query;
$author = $wp_query->get_queried_object();
$pic = get_cupp_meta( $author->ID, 'project049-author' );
$url = get_the_author_meta( 'user_url', $author->ID );
$bio = get_the_author_meta( 'user_description', $author->ID );
?>

<!-- Banner Section End -->
<!-- ARTICULADOS Start -->
<section class="articulados articulados_page autor-y-articulos-page">
  <div class="container">
  
    <div class="top_title_text">
        <span><?php echo $author->display_name; ?></span> 
      </div>
    <div class="apellido_slider">

      <?php 
        $prev_link = Project049_Frontoffice::get_author_link( 'prev' ); 
        if( Project049_Configuration::$mobile_detect->isMobile() ) {
          if( Project049_Configuration::$mobile_detect->isTablet() ) {
            $type = '-dark';
          } else {
            $type = '';
          }
        } else {
          $type = '-dark';
        }
        if( $prev_link ) {
      ?>
        <div class="page-prev"><a href="<?php echo $prev_link; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/prev<?php echo $type; ?>.png" alt=""></a></div>
      <?php } ?>

      <div class="row">
        <div class="col-lg-9 mx-auto">
          <div class="apellido_slideshow clearfix">
            <div>
              <img src="<?php echo $pic; ?>" title="<?php echo $author->display_name; ?>" alt="<?php echo $author->display_name; ?>" />
              <div class="slide_text">
                  <p>
                    <?php echo $bio; ?>
                  </p>
                  <?php if( $url != '' ) { ?>
                    <p><a href="<?php echo $url; ?>" target="_BLANK"><?php echo $url; ?></a></p>
                  <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php 
        $next_link = Project049_Frontoffice::get_author_link( 'next' ); 
        if( $next_link ) {
      ?>      
        <div class="page-next"><a href="<?php echo $next_link; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/next<?php echo $type; ?>.png" alt=""></a></div>
      <?php } ?>
    
    </div>

    <div class="row">  
 
    <?php 
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 9,
            'author' => $author->ID,
            'orderby' => 'date',
            'order' => 'DESC'
        );
        $query = new WP_Query( $args );
        while( $query->have_posts() ) { 
            $query->the_post();
            echo '<div class="col-lg-4 col-md-6">';
            get_template_part( 'partials/content', 'articulados' );
            echo '</div>';
        } 
        wp_reset_postdata(); 
    ?>

    </div>

    <div class="title_text open_articulados load-more" data-type="author" data-object="<?php echo $author->ID; ?>" data-page="2" data-count="9" data-pages="<?php echo Project049_Frontoffice::get_total_pages( 'author', $author->ID, 9 ); ?>">
        <span class="">ver +</span>
    </div>    
  </div>
</section> 
<!-- ARTICULADOS End -->


<?php get_footer(); ?>
