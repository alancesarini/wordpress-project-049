<?php
if( Project049_Configuration::$mobile_detect->isMobile() && !Project049_Configuration::$mobile_detect->isTablet() ) {
    $logo_suffix = '-mobile';
} else {
    $logo_suffix = '-mobile';
}
?>

<div class="ver-todo-inner">
    <div class="container">
      <div class="todo_logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-project049<?php echo $logo_suffix; ?>.png" alt="project049"></a></div>
      <div class="search_todo clearfix">
        <div class="search_todo_in">
          <i class="fa fa-search" aria-hidden="true"></i>
        </div>
        <div class="todo_social">
          
          <?php Project049_Frontoffice::render_follow_us( '-white' ); ?>
          
        </div>
        <div class="todo_close"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cross.png"></div>
      </div>
      <div class="todo-1">
        <div class="row">
          <div class="col-md-4">
            <ul>
              <li><a href="<?php echo home_url( 'seccion/articulados' ); ?>">Articulados</a></li>
              <li><a href="<?php echo home_url( 'seccion/opus-shots' ); ?>">Opus Shots</a></li>
              <li><a href=<?php echo home_url( 'seccion/dialogart' ); ?>>Dialogart</a></li>
              <li><a href="<?php echo home_url( 'seccion/ex-nihil' ); ?>">Ex-Nihil</a></li>
              <li><a href="<?php echo home_url( 'seccion/admeme' ); ?>">ADMeme</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul>
              <li><a href="#">Somos project049</a></li>
              <li class="todo_sm"><a href="<?php echo home_url( 'manifiesto' ); ?>">Manifiesto</a></li>
              <li class="todo_sm"><a href="<?php echo home_url( 'autores' ); ?>">Autores</a></li>
              <li class="todo_sm"><a href="<?php echo home_url( 'contacto' ); ?>">Contacto</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul>
              <li class="todo_sm"><a href="<?php echo home_url( 'terminos-y-condiciones'); ?>">Términos y condiciones</a></li>
              <li class="todo_sm"><a href="<?php echo home_url( 'politica-de-privacidad-y-cookies' ); ?>">Política de<br>privacidad y<br>cookies</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="todo-2">
        <ul class="clearfix">
          <?php 
            $cats = get_categories(); 
            foreach( $cats as $cat ) { 
          ?>
            <li><a href="<?php echo get_category_link( $cat->term_id ); ?>"><?php echo $cat->name; ?></a></li>
            <?php } ?>
        </ul>
      </div>
      <div class="todo-3">
          <ul>
          <?php 
                $logos = Project049_Logo::get_logos(); 
                foreach( $logos as $logo ) {
                ?>              
                   <li><img src="<?php echo $logo; ?>" alt="logo" title="logo" class="img-fluid" /></li>
                <?php } ?>
          </ul>
        </div>
    </div>
  </div>