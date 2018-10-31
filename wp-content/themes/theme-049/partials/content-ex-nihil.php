    <div class="ex-nihil_inner">
      <div class="ex-nihil_pict">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail( 'project049-post-list' ); ?>
        </a>
      </div>
      <div class="tag clearfix">
        <p>Ex-Nihil // <?php the_category( ',' ); ?></p>
        <?php Project049_Frontoffice::render_share_bar(); ?>            
      </div>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>          
    </div>
