    <div class="articulados_inner">
    <div class="articulados_pict">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail( 'project049-post-list' ); ?>
        </a>
    </div>
    <div class="tag clearfix">
        <p>Opus-Shots // <?php the_category( ',' ); ?> // <?php echo wp_series_part( get_the_ID(), 0, true ); ?>/<?php echo wp_postlist_count( false, true ); ?></p>
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
        <p class="float_right">
            <a href="<?php echo Project049_Frontoffice::get_series_link( get_the_ID() ); ?>">Ver serie</a>        
        </p>
    </div>
    </div>
