<?php 
    $series = get_the_terms( get_the_ID(), 'series' );
    $current_series = null;
    foreach( $series as $s ) {
        $current_series = $s;
    }

    $current_post_id = get_the_ID();
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

        if( get_the_ID() == $current_post_id ) {
            $tmp_array = array(
                'i' => $i,
                'permalink' => ''
            );
        } else {
            $tmp_array = array(
                'i' => $i,
                'permalink' => get_the_permalink()
            );
        }
        $array_nav[] = $tmp_array;
        $i++;
    }
    wp_reset_postdata();
?>


<!-- Banner Section End -->
<!-- ARTICULADOS Start -->
<section class="articulados articulados_page opus_shots_page">
  <div class="container">
    <div class="top_bar">
    <div class="top_title_text">
        <?php echo $current_series->name; ?>
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
    
          <li><a href="<?php echo get_series_link( $current_series->term_id ); ?>" class="var">Ver serie</a></li>
        </ul>
    </div>
    <div class="share_sec">

        <?php Project049_Frontoffice::render_share_bar( '', get_series_link( $current_series->term_id )  ); ?>
          
      </div>
    </div>
    <div class="opus_main">
        <div class="row">
            <div class="col-lg-8">
              <div class="articulados_inner opus">
                <div class="clearfix">

                  <?php Project049_Frontoffice::render_share_bar( 'opus-single' ); ?>

                  <div class="link_tag_m">
                    <div class="link_tag ">Opus-Shots // <?php the_category( ',' ); ?> // <?php echo wp_series_part( get_the_ID(), 0, true ); ?>/<?php echo wp_postlist_count( false, true ); ?></div>
                  </div>
                </div>
                <h1><?php the_title(); ?></h1>
                <div class="articulados_bttn clearfix">
                    <p class="left_link">
                      <?php the_author_posts_link(); ?>
                    </p>
                  </div>
        
                <div class="opus_content">
                  <p>
                    <?php the_post_thumbnail( 'project049-post-single' ); ?>
                  </p>
                  <?php the_content(); ?>
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
    
          <li><a href="<?php echo get_series_link( $current_series->term_id ); ?>" class="var">Ver serie</a></li>
        </ul>
    </div>
  </div>
</section> 
<!-- ARTICULADOS End -->