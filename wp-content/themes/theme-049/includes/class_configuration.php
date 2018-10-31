<?php

if( !class_exists( 'Project049_Configuration' ) ) {

	class Project049_Configuration {

		private static $_this;

		private static $_version;

		public static $mobile_detect;

		function __construct() {
		
			self::$_this = $this;

			self::$_version = '1.0.0';

			/*-----------------------------------------------------------------------------------*/
			// Class for detecting mobile devices
			/*-----------------------------------------------------------------------------------*/
			self::$mobile_detect = new Mobile_Detect();

			/*-----------------------------------------------------------------------------------*/
			// Add support for thumbnails
			/*-----------------------------------------------------------------------------------*/
			add_theme_support( 'post-thumbnails' ); 	

			/*-----------------------------------------------------------------------------------*/
			// Add a taxonomy to the posts
			/*-----------------------------------------------------------------------------------*/
			add_action( 'init' , array( $this, 'register_section_tax' ) );

			/*-----------------------------------------------------------------------------------*/
			// Add new image sizes
			/*-----------------------------------------------------------------------------------*/
			add_image_size( 'project049-slider', 1032, 562, true );
			add_image_size( 'project049-post-list-vertical', 164, 302, true );

			add_image_size( 'project049-post-list', 358, 234, true ); //1			
			add_image_size( 'project049-post-list-small', 261, 182, true ); //1
			add_image_size( 'project049-admeme-slider', 227, 161, true ); //1
			
			add_image_size( 'project049-post-single', 747, 415, true ); //2
			add_image_size( 'project049-post-list-exnihil', 553, 321, true ); //2

			add_image_size( 'project049-thumb', 97, 69, true );
			add_image_size( 'project049-post-single-vertical', 358, 512, true );

			add_image_size( 'project049-admeme-single', 844, 632, true );

			add_image_size( 'project049-author', 518, 518, true );

			add_image_size( 'project049-carousel-mobile', 272, 320, true );

			/*-----------------------------------------------------------------------------------*/
			// Register the widget areas
			/*-----------------------------------------------------------------------------------*/				
			register_sidebars( 1,
				array(
					'name' => 'Sidebar sección',
					'before_widget' => '<div class="widget">',
					'after_widget'  => '</div>',
					'before_title'  => '<h2>',
					'after_title'   => '</h2>'
				)				
			);	
			register_sidebars( 1,
				array(
					'name' => 'Sidebar artículo',
					'before_widget' => '<div class="widget">',
					'after_widget'  => '</div>',
					'before_title'  => '<h2>',
					'after_title'   => '</h2>'
				)				
			);			
			register_sidebars( 1,
				array(
					'name' => 'Sidebar sección DIALOGART',
					'before_widget' => '<div class="widget">',
					'after_widget'  => '</div>',
					'before_title'  => '<h2>',
					'after_title'   => '</h2>'
				)				
			);	

			/*-----------------------------------------------------------------------------------*/
			// Load JS and CSS for the frontend screens
			/*-----------------------------------------------------------------------------------*/
			add_action( 'wp_enqueue_scripts', array( $this, 'load_js_css' ) );

			/*-----------------------------------------------------------------------------------*/			
			// Filter the excerpt to make it shorter
			/*-----------------------------------------------------------------------------------*/						
			add_filter( 'excerpt_length', array( $this, 'shorten_excerpt' ), 999 );

			/*-----------------------------------------------------------------------------------*/
			// Register menus
			/*-----------------------------------------------------------------------------------*/
			add_action( 'init', array( $this, 'register_menus' ) );

			/*-----------------------------------------------------------------------------------*/
			// Register the widgets
			/*-----------------------------------------------------------------------------------*/
			add_action( 'widgets_init', array( $this, 'register_widgets' ) );			

		}

		/*-----------------------------------------------------------------------------------*/
		// Register menus
		/*-----------------------------------------------------------------------------------*/
		function register_menus() {
		
			register_nav_menu( 'headermenu', __( 'Menú cabecera' ) );

		}

		/*-----------------------------------------------------------------------------------*/
		// Shorten excerpt 
		/*-----------------------------------------------------------------------------------*/		
		function shorten_excerpt( $length ) {

			return 20;
		
		}	

		/*-----------------------------------------------------------------------------------*/
		// Register a taxonomy for posts
		/*-----------------------------------------------------------------------------------*/
		function register_section_tax() {

			$labels = array(
				'name'              => __( 'Secciones' ),
				'singular_name'     => __( 'Sección' ),
				'search_items'      => __( 'Busca sección' ),
				'all_items'         => __( 'Todas las secciones' ),
				'parent_item'       => __( 'Sección superior' ),
				'parent_item_colon' => __( 'Sección superior:' ),
				'edit_item'         => __( 'Editar sección' ), 
				'update_item'       => __( 'Actualizar sección' ),
				'add_new_item'      => __( 'Añadir sección' ),
				'new_item_name'     => __( 'Nueva sección' ),
				'menu_name'         => __( 'Tipos de secciones' ),
			);
			$args = array(
				'labels' => $labels,
				'hierarchical' => true
			);
			register_taxonomy( 'seccion', 'post', $args );	

		}

		/*-----------------------------------------------------------------------------------*/
		// Load assets
		/*-----------------------------------------------------------------------------------*/
		function load_js_css() {

			wp_register_script( 'bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.js', array( 'jquery' ), Project049_Definitions::$scripts_version, true );
			wp_register_script( 'slick', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ), Project049_Definitions::$scripts_version, true );						
			wp_register_script( 'masonry', get_stylesheet_directory_uri() . '/assets/js/masonry.pkgd.js', array( 'jquery' ), Project049_Definitions::$scripts_version, true );						
			wp_register_script( 'project049-main', get_stylesheet_directory_uri() . '/assets/js/main.min.js', array( 'jquery', 'bootstrap', 'slick', 'masonry' ), Project049_Definitions::$scripts_version, true );
			
			wp_enqueue_script( 'bootstrap' );
			wp_enqueue_script( 'slick' );
			wp_enqueue_script( 'masonry' );
			wp_enqueue_script( 'project049-main' );

		}

		/*-----------------------------------------------------------------------------------*/
		// Register the widgets
		/*-----------------------------------------------------------------------------------*/
		function register_widgets() {
			
			include( 'widgets/widget-related.php' );			
			include( 'widgets/widget-popular.php' );			
			register_widget( 'project049_widget_related' );
			register_widget( 'project049_widget_popular' );

		}		

		static function this() {
		
			return self::$_this;
		
		}

	}

}

new Project049_Configuration();