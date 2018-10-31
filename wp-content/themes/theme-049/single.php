<?php get_header(); ?>

<?php 

while( have_posts() ) {
    the_post();
}



if( has_term( 'admeme', 'seccion' ) ) { 
  get_template_part( 'partials/single', 'meme' );
} elseif( has_term( 'articulados', 'seccion' ) ) {
  get_template_part( 'partials/single', 'articulados' );
} elseif( has_term( 'opus-shots', 'seccion' ) ) {
  get_template_part( 'partials/single', 'opus-shots' );
} elseif( has_term( 'ex-nihil', 'seccion' ) ) {
  get_template_part( 'partials/single', 'ex-nihil' );
} elseif( has_term( 'dialogart', 'seccion' ) ) {
  get_template_part( 'partials/single', 'dialogart' );
} 
   
get_footer();
