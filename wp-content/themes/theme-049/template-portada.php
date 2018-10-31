<?php 

/**
 * Template name: Portada
 */

get_header(); 

if( have_posts() ) {
    the_post();
}

if( Project049_Configuration::$mobile_detect->isMobile() && !Project049_Configuration::$mobile_detect->isTablet() ) {
  $posts_in_section = 2;
} else {
  $posts_in_section = 3;
}

?>

<?php Project049_Frontoffice::render_posts_slider(); ?>


<!-- ARTICULADOS Start -->
<section class="articulados articulados_home">
  <div class="container">
    <div class="title_text">
      <a href="<?php echo get_term_link( 'articulados', 'seccion' ); ?>"><span>ARTICULADOS</span></a>
    </div>
    <div class="row">

      <?php 
        $query = Project049_Frontoffice::get_posts_by_section( 'articulados', $posts_in_section );
        $i = 1;
        $class = '';
        while( $query->have_posts() ) {
            $query->the_post();
            if( 3 == $i ) {
              $class = 'hidden-xs-down';
            }
            echo '<div class="col-md-6 col-lg-4 ' . $class . '">';
            get_template_part( 'partials/content', 'articulados' );
            echo '</div>';
            $i++;
        } 
        wp_reset_postdata(); 
    ?>

    </div>
  </div>
</section> 
<!-- ARTICULADOS End -->

<!-- OPUS-SHOTS Start -->
<section class="articulados">
    <div class="container">
      <div class="title_text">
        <a href="<?php echo get_term_link( 'opus-shots', 'seccion' ); ?>"><span>OPUS-SHOTS</span></a>
      </div>
      <div class="row">

        <?php 
        $query = Project049_Frontoffice::get_posts_by_section( 'opus-shots', $posts_in_section );
        while( $query->have_posts() ) {
            $query->the_post();
            echo '<div class="col-md-6 col-lg-4">';
            get_template_part( 'partials/content', 'opus-shots' );
            echo '</div>';
        } 
        wp_reset_postdata(); 
        ?>
        
      </div>
    </div>
  </section>
<!-- OPUS-SHOTS End -->

<!-- DIALOGART Start -->
<section class="dialogart">
  <div class="container">
    <div class="title_text">
    <a href="<?php echo get_term_link( 'dialogart', 'seccion' ); ?>"><span>DIALOGART</span></a>
    </div>
    <div class="row">

        <?php 
        $query = Project049_Frontoffice::get_posts_by_section( 'dialogart', 2 );        
        while( $query->have_posts() ) {
            $query->the_post();
            echo '<div class="col-md-6">';            
            get_template_part( 'partials/content', 'dialogart' );
            echo '</div>';
        } 
        wp_reset_postdata(); 
        ?>

    </div>
  </div>
</section>
<!-- DIALOGART End -->

<!-- EX-NIHIL Start -->
<section class="ex-nihil">
  <div class="container">
    <div class="title_text">
        <a href="<?php echo get_term_link( 'ex-nihil', 'seccion' ); ?>"><span>EX-NIHIL</span></a>
    </div>
    <div class="row">

        <?php 
        $query = Project049_Frontoffice::get_posts_by_section( 'ex-nihil', 4 );        
        while( $query->have_posts() ) {
            $query->the_post();
            echo '<div class="col-md-6 col-lg-3">';
            get_template_part( 'partials/content', 'ex-nihil' );
            echo '</div>';
        } 
        wp_reset_postdata(); 
        ?>

    </div>
  </div>
</section>
<!-- EX-NIHIL End -->

<!-- ADMEME Start -->
<section class="admeme">
  <div class="container">
    <div class="title_text">
        <a href="<?php echo get_term_link( 'admeme', 'seccion' ); ?>"><span>ADMEME</span></a>
    </div>
    <div class="admeme_inner">

      <?php 
        $query = Project049_Frontoffice::get_posts_by_section( 'admeme', 10 );        
        while( $query->have_posts() ) {
            $query->the_post();
            get_template_part( 'partials/content', 'admeme' );
        }
        ?>

    </div>
    <div class="admeme_inner_mobile">
      <ul>

        <?php 
        while( $query->have_posts() ) {
            $query->the_post();
            get_template_part( 'partials/content', 'admeme-mobile' );
        }
        ?>

      </ul>
    </div>
  </div>
</section>
<!-- ADMEME End -->


<?php get_footer(); ?>