<?php 

/**
 * Template name: Autores
 */

get_header(); 

?>

<section class="articulados articulados_page listado_autores_page">
  <div class="container">
    <div class="top_title_text">
      <h1>Autores</h1>
    </div>
    
    <div class="autores_main">
      <div class="row">
        <?php 
            $authors = get_users( array( 'role__in' => array( 'author', 'contributor', 'editor' ), 'orderby' => 'display_name', 'order' => 'ASC' ) ); 
            foreach( $authors as $author ) {
                $pic = get_cupp_meta( $author->ID, 'project049-author' );
                $url = get_the_author_meta( 'user_url', $author->ID );

        ?>
            <div class="col-md-6 col-lg-3">
            <div class="autores_inner">
                <a href="<?php echo get_author_posts_url( $author->ID ); ?>" class="author-url"><img src="<?php echo $pic; ?>" title="<?php echo $author->display_name; ?>" alt="<?php echo $author->display_name; ?>" />
                <a href="<?php echo get_author_posts_url( $author->ID ); ?>" class="author-url"><h2><?php echo $author->display_name; ?></h2></a>
                <?php if( $url != '' ) { ?>
                    <a href="<?php echo $url; ?>" target="_BLANK"><?php echo $url; ?></a>
                <?php } ?>
            </div>
            </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>