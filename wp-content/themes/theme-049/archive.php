<?php get_header(); ?>


<!-- Banner Section End -->
<!-- ARTICULADOS Start -->
<section class="articulados articulados_page tag-page">
  <div class="container">
    <div class="top_title_text">
        <h1>
        <?php 
        if( is_search() ) {
          $search_string = get_search_query();
          echo 'buscando' . '"' . $search_string . '"';
          $type = 'search';
          $object = $search_string;
        } else {
          $tag = get_queried_object(); 
          echo $tag->name;
          $type = 'tag';
          $object = $tag->slug;
        }
        ?>
        </h1>
    </div>
    <div class="row">
      <?php 
      while( have_posts() ) { 
          the_post(); 
          echo '<div class="col-lg-4">';
          get_template_part( 'partials/content', 'articulados' );
          echo '</div>';
      } 
      ?>
    </div>
    <div class="title_text open_articulados load-more" data-type="<?php echo $type; ?>" data-object="<?php echo $object; ?>" data-page="2" data-count="<?php echo Project049_Definitions::$posts_per_page; ?>" data-pages="<?php echo Project049_Frontoffice::get_total_pages( $type, $object, 10 ); ?>">
        <span class="">ver +</span>
    </div>
  </div>
</section> 
<!-- ARTICULADOS End -->

<?php get_footer(); ?>