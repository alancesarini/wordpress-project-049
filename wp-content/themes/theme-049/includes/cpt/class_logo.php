<?php

if( !class_exists( 'Project049_Logo' ) ) {
	
	class Project049_Logo {

		private static $_version;

		public static $prefix;

		/*-----------------------------------------------------------------------------------*/
		// Class constructor
		/*-----------------------------------------------------------------------------------*/
		public function __construct() {

			self::$_version = '1.0.0';

			self::$prefix = '_project049_logo_';

			// Register CPT
			add_action( 'init', array( $this, 'register_cpt' ) );			

		}

		/*-----------------------------------------------------------------------------------*/
		// Register custom post type "Logo"
		/*-----------------------------------------------------------------------------------*/
		function register_cpt() {

			$labels = array(
				'name'               => __( 'Logos de patrocinadores' ),
				'singular_name'      => __( 'logo' ),
				'add_new'            => __( 'Añade nuevo logo' ),
				'add_new_item'       => __( 'Añade nuevo logo' ),
				'edit_item'          => __( 'Editar' ),
				'new_item'           => __( 'Nuevo' ),
				'all_items'          => __( 'Todos' ),
				'view_item'          => __( 'Ver' ),
				'search_items'       => __( 'Buscar' ),
				'not_found'          => __( 'No se han encontrado logos' ),
				'not_found_in_trash' => __( 'No se han encontrado logos en la papelera' ), 
				'parent_item_colon'  => '',
				'menu_name'          => 'Logos de patrocinadores'
			);
			$args = array(
				'labels'        => $labels,
				'description'   => 'Logos de patrocinadores',
                'public'        => true,
                'exclude_from_search' => true,
                'publicly_queryable' => false,
				'menu_position' => 21,
				'hierarchical'  => false,
				'supports'      => array( 'title', 'thumbnail', 'page-attributes' ),
				'has_archive'   => false
			);
			register_post_type( 'logo_patrocinador', $args );	

		}

		/*-----------------------------------------------------------------------------------*/
        // Get all logos
		/*-----------------------------------------------------------------------------------*/
        public static function get_logos() {

            $args = array(
                'post_type' => 'logo_patrocinador',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'menu_order'
            );

            $array_logos = array();
            $query = new WP_Query( $args );
            if( $query->have_posts() ) {
                while( $query->have_posts() ) {
					$query->the_post();
                    $array_logos[] = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                }
            }
            return $array_logos;

        }
	}
}

new Project049_Logo();