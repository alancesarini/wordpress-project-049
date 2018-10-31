<?php 

  $memes = Project049_Frontoffice::get_latest_memes( 10, get_the_ID() );
  $tags = get_the_tags( get_the_ID() );

?>

<!-- Banner Section End -->
<!-- ARTICULADOS Start -->
<section class="articulados articulados_page">
  <div class="container">
    <div class="title_text">
      <span>ADMEME</span>
    </div>
    <div class="row">
      <div class="col-lg-9">
        <div class="articulados_inner articulados_big admeme_big">
            <div class="articulados_pict">
                <?php the_post_thumbnail( 'project049-admeme-single' ); ?>
            </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="articulados_sidebar admeme_sidebar">
          <div class="admeme_sidebar_coltroler clearfix">
            <div class="previos__coltroler"> <?php previous_post_link( '%link', '< anterior', TRUE ); ?></div>
            <div class="next__coltroler"><?php next_post_link( '%link', 'siguiente >', TRUE ); ?> </div>
          </div>
          <div class="copy_link">
            <form>
              <input type="text" id="single-link" value="<?php the_permalink(); ?>" />
            </form>
            <a href="#" class="copy-link">Copiar link</a>
          </div>

          <?php Project049_Frontoffice::render_share_bar( 'admeme' ); ?>

          <div class="sitebar_category">
              <ul class="clearfix">
                <?php foreach( $tags as $tag ) { ?>
                    <li><a href="<?php echo get_term_link( $tag->term_id ); ?>">#<?php echo $tag->name; ?></a></li>
                <?php } ?>
              </ul>
          </div>
        </div>
      </div>
    </div>

      <div id="container">
        <div class="gutter-sizer"></div>
        <div class="grid-sizer"></div>

        <div class="row row-memes">
          <?php foreach( $memes as $meme ) { ?>
            <div class="item">
                <a href="<?php echo $meme['permalink']; ?>"><img src="<?php echo $meme['image']; ?>" alt="<?php echo $meme['title']; ?>" title="<?php echo $meme['title']; ?>" class="img-fluid" /></a>
            </div>
          <?php } ?>
        </div>
      </div>

      <div class="title_text open_articulados admeme_pages load-more-json" style="margin-top: 30px" data-type="section" data-object="admeme" data-page="2" data-count="<?php echo Project049_Definitions::$posts_per_page; ?>" data-pages="<?php echo Project049_Frontoffice::get_total_pages( 'section', 'admeme', 10 ); ?>">
        <span class="">ver +</span>
      </div>   
   
  </div>
</section> 
<!-- ARTICULADOS End -->