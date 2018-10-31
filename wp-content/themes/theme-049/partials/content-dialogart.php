    <div class="dialogart_inner">
      <div class="row">
          <div class="col-xs-4 col-md-4">
            <div class="dialogart_pict">
                <a href="<?php the_permalink(); ?>">
                    <?php 
                      if( Project049_Configuration::$mobile_detect->isMobile() && !Project049_Configuration::$mobile_detect->isTablet() ) {
                        the_post_thumbnail( 'project049-post-single-vertical' ); 
                      } else {
                        the_post_thumbnail( 'project049-post-list-vertical' ); 
                      }
                      ?> 
                </a>
            </div>
          </div>
          <div class="col-xs-8 col-md-8">
            <div class="dialogart_text">
                <div class="tag clearfix">
                  <p>Dialogart // <?php the_category( ',' ); ?></p>
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
          </div>
      </div>
    </div>
 