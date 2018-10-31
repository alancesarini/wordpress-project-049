<?php get_header(); ?>

<?php 
$memes = array();
$_random_meme = Project049_Frontoffice::get_random_meme();
$memes = Project049_Frontoffice::get_latest_memes( 10, $_random_meme->ID );
$tags = get_the_tags( $memes[0]['ID'] ); 
$next_meme_link = Project049_Frontoffice::get_nextprev_meme_link( $_random_meme->ID, 'next' );
$prev_meme_link = Project049_Frontoffice::get_nextprev_meme_link( $_random_meme->ID, 'prev' );
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
                <img src="<?php echo $_random_meme->image; ?>" alt="<?php echo $_random_meme->title; ?>" title="<?php echo $_random_meme->title; ?>" class="img-fluid" />
            </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="articulados_sidebar admeme_sidebar">
          <div class="admeme_sidebar_coltroler clearfix">
            <?php if( $prev_meme_link !== 0 ) { ?>
              <div class="previos__coltroler"><a href="<?php echo $prev_meme_link; ?>">< anterior</a></div>
            <?php } ?>

            <?php if( $next_meme_link !== 0 ) { ?>
              <div class="next__coltroler"><a href="<?php echo $next_meme_link; ?>">siguiente ></a></div>
            <?php } ?>
          </div>
          <div class="copy_link">
            <form>
              <input type="text" id="single-link" value="<?php echo $_random_meme->permalink; ?>" />
            </form>
            <a href="#" class="copy-link">Copiar link</a>
          </div>

          <?php Project049_Frontoffice::render_share_bar( 'admeme', $_random_meme->permalink ); ?>

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

<?php get_footer(); ?>
 