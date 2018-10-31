<div class="articulados_inner articulados_big">
    <div class="row">
        <div class="col-lg-6">
            <div class="articulados_pict">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'project049-post-single-vertical' ); ?>
                </a>
            </div>
            <p>&nbsp;</p>
        </div>
        <div class="col-lg-6">
            <div class="tag no-padd clearfix">
                <p>Articulados // <?php the_category( ',' ); ?></p>
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