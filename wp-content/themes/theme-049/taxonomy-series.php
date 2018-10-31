<?php get_header(); ?>

<?php 
    $current_series = get_queried_object();

    $array_nav = array();
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'series',
                'field'    => 'term_id',
                'terms'    => $current_series->term_id,
            ),
        ),
        'meta_key' => '_series_part',
        'orderby' => 'meta_value_num',
        'order' => 'ASC'
    );
    $query = new WP_Query( $args );
    $i = 1;
    while( $query->have_posts() ) {
        $query->the_post();
        $array_nav[] = array(
            'i' => $i,
            'permalink' => get_the_permalink()
        );
        $i++;
    }
    wp_reset_postdata();
?>


<!-- Banner Section End -->
<!-- ARTICULADOS Start -->
<section class="articulados articulados_page">
  <div class="container">

      <div class="top_bar">
          <div class="top_title_text">
              <?php echo single_term_title(); ?>
          </div>
          <div class="top_pagination">
              <ul>
              <?php 
                foreach( $array_nav as $nav ) {
                    if( $nav['permalink'] != '' ) {
                        echo '<li><a href="' . $nav['permalink'] . '">' . $nav['i'] . '</a></li>';
                    } else {
                        echo '<li>' . $nav['i'] . '</li>';
                    }
                }
              ?>
              </ul>
          </div>
          <div class="share_sec">
          <?php           
            global $wp;
            $current_url = home_url( add_query_arg( array(), $wp->request ) );
          ?>

                  <?php Project049_Frontoffice::render_share_bar( '', $current_url ); ?>
                
            </div>
          </div>

    <div class="row">
      <div class="col-lg-8">
          <?php while( have_posts() ) { the_post() ?>

                <div class="articulados_inner articulados_big">
                    <div class="articulados_pict"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'project049-post-single' ); ?></a></div>
                    <div class="tag clearfix">
                        <p>Articulados // <?php the_category( ',' ); ?> // <?php echo wp_series_part( get_the_ID(), 0, true ); ?>/<?php echo wp_postlist_count( false, true ); ?></p>

                        <?php Project049_Frontoffice::render_share_bar(); ?>

                    </div>
                    <div class="articulados_content">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_excerpt(); ?>
                    </div>
                    <div class="articulados_bttn clearfix">
                        <p class="left_link">
                            <?php the_author_posts_link(); ?>
                        </p>
                    </div>
                </div>

          <?php } ?>

      </div>

      <div class="col-lg-4">
        <div class="articulados_sidebar">
            <?php get_sidebar( 'seccion' ); ?>
        </div>
      </div>
      
    </div>
      
  </div>

  <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="title_text">
              <div class="bottom_pagination">
                  <ul>
                  <?php 
                    foreach( $array_nav as $nav ) {
                        if( $nav['permalink'] != '' ) {
                            echo '<li><a href="' . $nav['permalink'] . '">' . $nav['i'] . '</a></li>';
                        } else {
                            echo '<li>' . $nav['i'] . '</li>';
                        }
                    }
                    ?>
                  </ul>
              </div>
          </div>
        </div>
      </div>    
  </div>

</section> 
<!-- ARTICULADOS End -->



<?php get_footer(); ?>