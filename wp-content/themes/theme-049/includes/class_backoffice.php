<?php

if( !class_exists( 'Project049_Backoffice' ) ) {

	class Project049_Backoffice {

		private static $_this;

        private static $_version;
        
		public static $prefix;

		function __construct() {
		
			self::$_this = $this;

            self::$_version = '1.0.0';	
            
			self::$prefix = '_project049_';

			/*-----------------------------------------------------------------------------------*/
			// Load JS and CSS for the admin screens
			/*-----------------------------------------------------------------------------------*/
			add_action( 'admin_enqueue_scripts', array( $this, 'load_js_css_admin' ) );				

            /*-----------------------------------------------------------------------------------*/
			// Add JS code to the footer
			/*-----------------------------------------------------------------------------------*/			
            add_action( 'wp_footer', array( $this, 'render_ajax_url' ) );
            
			/*-----------------------------------------------------------------------------------*/						
            // Add menu item to the backoffice
			/*-----------------------------------------------------------------------------------*/						            
			add_action( 'admin_menu', array( $this, 'add_menu_item' ) );

			/*-----------------------------------------------------------------------------------*/						
            // Save options
			/*-----------------------------------------------------------------------------------*/						            
			add_action( 'admin_post_project049_save_options', array( $this, 'save_options' ) );

			/*-----------------------------------------------------------------------------------*/												
			// Ajax action to return posts based on a text search
			/*-----------------------------------------------------------------------------------*/												
			add_action( 'wp_ajax_project049_get_posts', array( $this, 'get_posts_ajax' ) );

		}

		/*-----------------------------------------------------------------------------------*/
		// Load assets for the backend
		/*-----------------------------------------------------------------------------------*/
		function load_js_css_admin() {

			wp_register_script( 'project049-select2', get_stylesheet_directory_uri() . '/assets/js/select2.min.js', array( 'jquery' ), Project049_Definitions::$scripts_version, true );						
			wp_register_script( 'project049-select2-lang', get_stylesheet_directory_uri() . '/assets/js/select2-language-es.js', array( 'jquery' ), Project049_Definitions::$scripts_version, true );						
			wp_register_script( 'project049-main-admin', get_stylesheet_directory_uri() . '/assets/js/main-admin.min.js', array( 'jquery', 'project049-select2' ), Project049_Definitions::$scripts_version, true );
			wp_register_style( 'project049-select2-css', get_stylesheet_directory_uri() . '/assets/css/select2.min.css', false, Project049_Definitions::$scripts_version );

			wp_enqueue_script( 'project049-select2' );
			wp_enqueue_script( 'project049-select2-lang' );
			wp_enqueue_script( 'project049-main-admin' );
			wp_enqueue_style( 'project049-select2-css' );

		}

		/*-----------------------------------------------------------------------------------*/
		// Render the AJAX url in the footer
		/*-----------------------------------------------------------------------------------*/
		function render_ajax_url() {

			echo "<script>var ajaxurl = '" . admin_url( 'admin-ajax.php' ) . "';</script>";

		}

        /*-----------------------------------------------------------------------------------*/
		// Add new page to the backoffice menu
		/*-----------------------------------------------------------------------------------*/		
		function add_menu_item() {

			add_menu_page( 'Project049', 'Project049', 'manage_options', 'project049_config', array( $this, 'render_config_page' ) );

		}

		/*-----------------------------------------------------------------------------------*/		
		// Render the config page
		/*-----------------------------------------------------------------------------------*/		
		function render_config_page() {

            $project049_nonce = wp_create_nonce( 'project049_nonce' ); 

            $meta_posts_slider = self::$prefix . 'posts_slider';
			$posts_slider = get_option( $meta_posts_slider );
			
			$json_posts_slider = array();
			if( is_array( $posts_slider ) ) {
                foreach( $posts_slider as $post_id ) {
                    $post_title = get_the_title( $post_id );
                    $json_posts_slider[] = array( 'id' => $post_id, 'text' => $post_title, 'selected' => 'true' );
                }
            }			
		?>

			<?php if( isset( $_GET['updated'] ) && 1 == intval( $_GET['updated'] ) ) { ?>
				<div class="updated settings-error notice is-dismissible">
					<p>Se han guardado los cambios correctamente.</p>
				</div>
			<?php } ?>

			<form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
			<div id="poststuff">
                
                <div id="postbox-container-project049-slider" class="postbox-container" style="width:100%;max-width:600px;clear:both">
                    <div id="normal-sortables" class="meta-box-sortables ui-sortable">
                        <div id="project049_metabox_info_1" class="postbox ">
                            <button type="button" class="handlediv button-link" aria-expanded="true"><span class="toggle-indicator" aria-hidden="true"></span></button>
                            <h2 class="hndle ui-sortable-handle"><span>Artículos del slider de portada</span></h2>
                            <div class="inside">	
                                <p>
                                    <label for="<?php echo $meta_posts_slider; ?>">Selecciona los artículos:</label>
                                    <select id="<?php echo $meta_posts_slider; ?>" name="<?php echo $meta_posts_slider; ?>[]" multiple="multiple">
                                    </select>			
                                </p>																				
                            </div>
                        </div>
                    </div>
                </div>   

            </div>

            <p style="clear:both">
                <input type="hidden" name="project049_nonce" value="<?php echo $project049_nonce; ?>" />	
                <input type="hidden" name="action" value="project049_save_options" />
                <input type="submit" name="submit" id="submit" class="button button-primary" value="Guardar" />			
            </p>	
            </form>	
            

			<script>
                var project049_posts_slider = <?php echo json_encode( $json_posts_slider ); ?>;
            </script>
		
		<?php
		}

		/*-----------------------------------------------------------------------------------*/		
		// Save Project049 configuration
		/*-----------------------------------------------------------------------------------*/		
		function save_options() {

            if( isset( $_POST['project049_nonce'] ) && wp_verify_nonce( $_POST['project049_nonce'], 'project049_nonce') ) {	
                $meta_posts_slider = self::$prefix . 'posts_slider';
                $posts_slider = $_POST[$meta_posts_slider];
				if( is_array( $posts_slider ) && count( $posts_slider ) > 0 ) {
					update_option( $meta_posts_slider, $posts_slider );
				}  				              
			}
			header( 'Location: ' . admin_url( 'admin.php?page=project049_config&updated=1' ) );
			die();	

        }
        
		/*-----------------------------------------------------------------------------------*/				
		// Returns posts for the autocomplete fields
		/*-----------------------------------------------------------------------------------*/								
		function get_posts_ajax() {

			$search = sanitize_text_field( $_GET['q'] ); 
            $array_events = array();

			$args = array(
				'post_type' => 'post',
				'posts_per_page' => -1,
				'post_status' => 'publish',
				's' => $search,
				'orderby' => 'title',
				'order' => 'ASC'
 			);

			$query = new WP_Query( $args );
			if( $query->have_posts() ) {
				while( $query->have_posts() ) {
					$query->the_post();
					$array_events[] = array( 'id' => get_the_ID(), 'text' => get_the_title() );
				}
				wp_reset_postdata();
				die( json_encode( array( 'results' => $array_events ) ) );			
            } else {
				die( json_encode( array( 'results' => array() ) ) );
            }
		
		}
		        
		static function this() {
		
			return self::$_this;
		
		}

	}

}

new Project049_Backoffice();