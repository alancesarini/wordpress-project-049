<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">

<link rel="icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon">

<title><?php echo wp_title( '' ); ?></title>

<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet"> 

<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/slick.min.css" rel="stylesheet">

<link href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" rel="stylesheet">

<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/addon.min.css?v=<?php echo Project049_Definitions::$scripts_version; ?>" rel="stylesheet">

 <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<header>
  <div class="container clearfix">
    <div class="logo">
        <a href="<?php echo home_url(); ?>">
            <?php Project049_Frontoffice::render_logo(); ?>
            <?php if( is_front_page() ) { ?>
                <h1>Project049</h1>
            <?php } ?>
        </a>
    </div>

    <nav class="navbar navbar-expand-md">
      <div class="search_icon tab_search"><i class="fa fa-search" aria-hidden="true"></i></div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar-mobile">
        <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav"> 
              <?php
                $menu_list = '';
                $menu_items = wp_get_nav_menu_items(12); 
                foreach( $menu_items as $menu_item ) {
                  $active = '';
                  if( strpos( $menu_item->url, get_queried_object()->slug ) > -1 ) {
                    $active = 'active';
                  }
                  if( $menu_item->menu_item_parent == 0 ) {
                      $parent = $menu_item->ID;
                      $menu_array = array();
                      foreach( $menu_items as $submenu ) {
                          if( $submenu->menu_item_parent == $parent ) {
                              $bool = true;
                              $menu_array[] = '<a href="' . $submenu->url . '" class="dropdown-item">' . $submenu->title . '</a>' ."\n";
                          }
                      }
                      if( $bool == true && count( $menu_array ) > 0 ) {
                      
                          $menu_list .= '<li class="nav-item ' . $active . '">' ."\n";
                          $menu_list .= '<a href="#" id="navbardrop" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">' . $menu_item->title . '</a>' ."\n";
                          
                          $menu_list .= '<div class="dropdown-menu">' ."\n";
                          $menu_list .= implode( "\n", $menu_array );
                          $menu_list .= '</div>' ."\n";
                          
                      } else {
                        $menu_list .= '
                          <li class="nav-item ' . $active . '">
                            <a class="nav-link" href="' . $menu_item->url . '">' . $menu_item->title . '</a>
                          </li>
                        ';
                      }
                  }
              ?>
              <?php
              }   
              echo $menu_list;            
              ?>
  
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" id="ver-todo">Ver todo</a>
          </li>
            
        </ul>
      </div>  
      <div class="collapse navbar-collapse" id="collapsibleNavbar-mobile">
        <div class="mobile_menu">
          <div class="mm-0 clearfix">
            <div class="m_logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-project049-mobile.png" alt="project049"></a></div>
            <div class="mm_search"><i class="fa fa-search" aria-hidden="true"></i></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar-mobile">
                <i class="fa fa-times" aria-hidden="true"></i>
            </button>
          </div>
          <div class="mm_search_open">
              <form>
                <input type="text" name="s">
                <input type="submit" value="search">
              </form>
            </div>
          <div class="mm-1">
              <?php Project049_Frontoffice::render_follow_us( '-white' ); ?>
          </div>
          <div class="mm-2">
            <ul>
              <li><a href="<?php echo home_url( 'seccion/articulados' ); ?>">Articulados</a></li>
              <li><a href="<?php echo home_url( 'seccion/opus-shots' ); ?>">Opus Shots</a></li>
              <li><a href="<?php echo home_url( 'seccion/dialogart' ); ?>">Dialogart</a></li>
              <li><a href="<?php echo home_url( 'seccion/ex-nihil' ); ?>">Ex-Nihil</a></li>
              <li><a href="<?php echo home_url( 'seccion/admeme' ); ?>">ADMeme</a></li>
            </ul>
          </div>
          <div class="mm-3">
            <ul>
              <li><a href="<?php echo home_url( 'manifiesto' ); ?>">Manifiesto</a></li>
              <li><a href="<?php echo home_url( 'autores' ); ?>">Autores</a></li>
              <li><a href="<?php echo home_url( 'contacto' ); ?>">Contacto</a></li>
            </ul>
          </div>
          <div class="mm-3">
            <ul>
              <li><a href="<?php echo home_url( 'terminos-y-condiciones' ); ?>">Términos y condiciones</a></li>
              <li><a href="<?php echo home_url( 'politica-de-privacidad-y-cookies' ); ?>">Política de<br>privacidad y<br>cookies</a></li>
            </ul>
          </div>
          <div class="mm-2">
            <ul>
            <?php 
              $cats = get_categories(); 
              foreach( $cats as $cat ) { 
              ?>
                <li><a href="<?php echo get_category_link( $cat->term_id ); ?>"><?php echo $cat->name; ?></a></li>
            <?php } ?>
            </ul>
          </div>
          <div class="mm-4">
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
      <div class="right_header">
        <div class="search_icon"><i class="fa fa-search" aria-hidden="true"></i></div>
        
        <div class="socail_network">
          
          <?php Project049_Frontoffice::render_follow_us(); ?>
          
        </div>
        
      </div>
      <div class="search_open">
        <div class="search_open_in">
          <form action="<?php echo home_url(); ?>">
            <input type="text" name="s" />
            <div class="search_close"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cross.png"></div>
            <input type="hidden" name="post_type" value="post" />
          </form>
        </div>
      </div>
    </nav>
  </div>
</header>
