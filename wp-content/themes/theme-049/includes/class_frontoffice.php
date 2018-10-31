<?php

if( !class_exists( 'Project049_Frontoffice' ) ) {

	class Project049_Frontoffice {

		private static $_this;

        private static $_version;
        
		function __construct() {
		
			self::$_this = $this;

            self::$_version = '1.0.0';	

			/*-----------------------------------------------------------------------------------*/												
			// Ajax action to load more posts
			/*-----------------------------------------------------------------------------------*/												
			add_action( 'wp_ajax_project049_load_posts', array( $this, 'load_posts_ajax' ) );            
			add_action( 'wp_ajax_nopriv_project049_load_posts', array( $this, 'load_posts_ajax' ) );            
			add_action( 'wp_ajax_project049_load_posts_json', array( $this, 'load_posts_ajax_json' ) );            
			add_action( 'wp_ajax_nopriv_project049_load_posts_json', array( $this, 'load_posts_ajax_json' ) );            

		}

		/*-----------------------------------------------------------------------------------*/
        // Render the posts slider
		/*-----------------------------------------------------------------------------------*/
        public static function render_posts_slider() {

            $posts_slider = get_option( Project049_Backoffice::$prefix . 'posts_slider' );
            if( is_array( $posts_slider ) && count( $posts_slider ) > 0 ) {
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'post__in' => $posts_slider
                );
                $query = new WP_Query( $args );
                if( $query->have_posts() ) {
                    if( Project049_Configuration::$mobile_detect->isMobile() && !Project049_Configuration::$mobile_detect->isTablet() ) {
                        $thumbnail_size = 'project049-carousel-mobile';
                    } else {
                        $thumbnail_size = 'project049-slider';
                    }
            ?>
                <div class="banner">
                    <div class="center">
                        <?php while( $query->have_posts() ) { $query->the_post(); ?>
                            <div>
                            <div class="slide">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( $thumbnail_size ); ?></a>
                                <div class="banner_content">
                                <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                                <?php the_excerpt(); ?>
                                </div>
                            </div>
                            </div>                        
                        <?php } ?>
                    </div>
                </div>
            <?php } } 

            wp_reset_postdata();

        }

		/*-----------------------------------------------------------------------------------*/
        // Render the follow us icons
		/*-----------------------------------------------------------------------------------*/
        public static function render_follow_us( $color = '' ) {
        ?>

            <ul class="clearfix">
              <li>Follow us</li>
              <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-facebook<?php echo $color; ?>.svg" alt="facebook" title="facebook" /></a></li>
              <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-instagram<?php echo $color; ?>.svg" alt="instagram" title="instagram" /></a></li>
              <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-twitter<?php echo $color; ?>.svg" alt="twitter" title="twitter" /></a></li>
            </ul>

        <?php
        }

		/*-----------------------------------------------------------------------------------*/
        // Render the share icons
		/*-----------------------------------------------------------------------------------*/
        public static function render_share_bar( $type = '', $url = '' ) {

            if( '' == $url ) {
                $url = get_the_permalink();
            }
            $facebook_url = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode( $url );
            $twitter_url = 'https://twitter.com/home?status=' . urlencode( $url );
            $googleplus_url = 'https://plus.google.com/share?url=' . urlencode( $url );

            if( 'opus' == $type ) {
            ?>
                  <div class="compaire">
                    <ul>
                      <li>compartir serie</li>
                      <li><a href="<?php echo $facebook_url; ?>" target="_BLANK"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-facebook.svg" alt="facebook" title="facebook" /></a></li>
                      <li><a href="<?php echo $twitter_url; ?>" target="_BLANK"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-twitter.svg" alt="twitter" title="twitter" /></a></li>
                      <li><a href="<?php echo $googleplus_url; ?>" target="_BLANK"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    </ul>
                  </div>  
                  
            <?php } elseif( 'opus-single' == $type ) { ?>

                  <div class="compaire">
                    <ul>
                      <li>compartir</li>
                      <li><a href="<?php echo $facebook_url; ?>" target="_BLANK"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-facebook.svg" alt="facebook" title="facebook" /></a></li>
                      <li><a href="<?php echo $twitter_url; ?>" target="_BLANK"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-twitter.svg" alt="twitter" title="twitter" /></a></li>
                      <li><a href="<?php echo $googleplus_url; ?>" target="_BLANK"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    </ul>
                  </div>  

            <?php } elseif( 'admeme' == $type ) { ?>     

                <div class="compartir_social clearfix">
                    <p>compartir</p>
                    <div class="social_icon">
                    <ul class="clearfix">
                        <li><a href="<?php echo $facebook_url; ?>" target="_BLANK"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-facebook.svg" alt="facebook" title="facebook" /></a></li>
                        <li><a href="<?php echo $twitter_url; ?>" target="_BLANK"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-twitter.svg" alt="twitter" title="twitter" /></a></li>
                        <li><a href="<?php echo $googleplus_url; ?>" target="_BLANK"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    </ul>
                    </div>
                </div>

            <?php } else { ?>             

            <div class="tag_icon">
                <a href="javascript:void(0)">
                    <!--<span class="fa fa-share-alt"></span>-->
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-share.png" alt="compartir" title="compartir" />
                </a>
            </div>
            <div class="social_share clearfix">
                <ul class="clearfix">
                    <li><a href="<?php echo $facebook_url; ?>" target="_BLANK"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-facebook-white.svg" alt="facebook" title="facebook" /></a></li>
                    <li><a href="<?php echo $twitter_url; ?>" target="_BLANK"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-twitter-white.svg" alt="twitter" title="twitter" /></a></li>
                    <li><a href="<?php echo $googleplus_url; ?>" target="_BLANK"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                  </ul>
                <a href="javascript:void(0)" class="close_share"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cross.png" alt=""></a>
            </div>

        <?php
            }
        }

        /*-----------------------------------------------------------------------------------*/				
        // Return the query with posts by section
        /*-----------------------------------------------------------------------------------*/				
        public static function get_posts_by_section( $section, $count, $exclude = 0 ) {

            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => $count,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'seccion',
                        'field'    => 'slug',
                        'terms'    => $section,
                    )
                ),
                'orderby' => 'date',
                'order' => 'DESC'             
            );

            if( $exclude > 0 ) {
                $args['post__not_in'] = array( $exclude );
            }
            $query = new WP_Query( $args );

            return $query;

        }

        /*-----------------------------------------------------------------------------------*/				
        // Return an array with the latest memes
        /*-----------------------------------------------------------------------------------*/				
        public static function get_latest_memes( $count, $exclude ) {

            $query = Project049_Frontoffice::get_posts_by_section( 'admeme', $count, $exclude );
            while( $query->have_posts() ) {
                $query->the_post(); 
                $memes[] = array(
                    'ID' => get_the_ID(),
                    'title' => get_the_title(),
                    'image' => get_the_post_thumbnail_url( get_the_ID(), 'project049-admeme-single' ), 
                    'permalink' => get_the_permalink()
                );
            }
            wp_reset_postdata();

            return $memes;

        }

        /*-----------------------------------------------------------------------------------*/				
        // Return the latest meme
        /*-----------------------------------------------------------------------------------*/				
        public static function get_latest_meme() {

            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'seccion',
                        'field'    => 'slug',
                        'terms'    => 'admeme',
                    )
                )            
            );
            $query = new WP_Query( $args );
            while( $query->have_posts() ) {
                $query->the_post();
                $_meme = new stdClass();
                $_meme->ID = get_the_ID();
                $_meme->title = get_the_title();
                $_meme->image = get_the_post_thumbnail_url( get_the_ID(), 'project049-admeme-single' );
                $_meme->permalink = get_the_permalink();
            }
            wp_reset_postdata();

            return $_meme;

        }

        /*-----------------------------------------------------------------------------------*/				
        // Return a random meme
        /*-----------------------------------------------------------------------------------*/				
        public static function get_random_meme() {

            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'seccion',
                        'field'    => 'slug',
                        'terms'    => 'admeme',
                    )
                )            
            );
            $query = new WP_Query( $args );
            $total_memes = $query->found_posts;
            $memes = array();
            while( $query->have_posts() ) {
                $query->the_post();
                $memes[] = get_the_ID();
            }
            wp_reset_postdata();
            $random_index = rand( 0, $total_memes - 1 );

            global $post;
            $post = get_post( $memes[$random_index] );

            $_meme = new stdClass();
            $_meme->ID = get_the_ID();
            $_meme->title = get_the_title();
            $_meme->image = get_the_post_thumbnail_url( get_the_ID(), 'project049-admeme-single' );
            $_meme->permalink = get_the_permalink();
            
            return $_meme;

        }

        /*-----------------------------------------------------------------------------------*/				
        // Get the next/prev meme link
        /*-----------------------------------------------------------------------------------*/				
        public static function get_nextprev_meme_link( $meme_id, $which ) {

            $prev = 0;
            $next = 0;

            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'seccion',
                        'field'    => 'slug',
                        'terms'    => 'admeme',
                    )
                    ),
                'orderby' => 'date',
                'order' => 'DESC'           
            );
            $query = new WP_Query( $args );
            $memes = array();
            while( $query->have_posts() ) {
                $query->the_post();
                $memes[] = get_the_ID();
            }

            $i = 0;
            foreach( $memes as $meme ) {
                if( $meme == $meme_id ) {
                    if( $i > 0 ) {
                        $next = $memes[$i-1];
                    }
                    if( $i < count( $memes ) - 1 ) {
                        $prev = $memes[$i+1];
                    }
                }
                $i++;
            }

            if( 'prev' == $which ) {
                if( $prev > 0 ) {
                    global $post;
                    $post = get_post( $prev );
                    $prev = get_the_permalink();
                }
                return $prev;
            } else {
                if( $next > 0 ) {
                    global $post;
                    $post = get_post( $next );
                    $next = get_the_permalink();
                }                
                return $next;
            }

        }

        /*-----------------------------------------------------------------------------------*/				
		// Load more posts
		/*-----------------------------------------------------------------------------------*/								
		public static function load_posts_ajax() {

            $type = sanitize_text_field( $_POST['type'] );
            $object = sanitize_text_field( $_POST['object'] );
            $count = intval( $_POST['count'] );
            $page = intval( $_POST['page'] );

            $args = self::get_query_args( $type, $object, $count, $page );
             
            $query = new WP_Query( $args );
            $html = '';
            ob_start();
			if( $query->have_posts() ) {
				while( $query->have_posts() ) {
                    $query->the_post();
                    if( 'search' == $type ) {
                        echo '<div class="col-lg-4 col-md-6">';
                        get_template_part( 'partials/content', 'articulados' );
                        echo '</div>';
                    } elseif( 'author' == $type) {
                        echo '<div class="col-lg-4 col-md-6">';
                        get_template_part( 'partials/content', 'articulados' );
                        echo '</div>';                          
                    } elseif( 'admeme' == $object ) {
                        echo '<div class="item"><a href="';
                        the_permalink();
                        echo '">';
                        the_post_thumbnail( 'project049-admeme-single', array( 'class' => 'img-fluid' ) );
                        echo '</a></div>';
                    } else {
                        switch( $object ) {
                            case 'articulados':
                            case 'opus-shots':
                                echo '<div class="col-lg-4 col-md-6">';
                                break;
                            case 'ex-nihil':
                            case 'dialogart':
                                echo '<div class="col-md-6">';
                                break;
                        }
                        get_template_part( 'partials/content', $object );
                        echo '</div>';                        
                    }
				}
                $html = ob_get_contents();
                ob_end_clean();     
                wp_reset_postdata();
            } 
            die($html);
		
        }

        /*-----------------------------------------------------------------------------------*/				
		// Load more posts (JSON)
		/*-----------------------------------------------------------------------------------*/								
		public static function load_posts_ajax_json() {

            $type = sanitize_text_field( $_POST['type'] );
            $object = sanitize_text_field( $_POST['object'] );
            $count = intval( $_POST['count'] );
            $page = intval( $_POST['page'] );

            $args = self::get_query_args( $type, $object, $count, $page );
             
            $query = new WP_Query( $args );
            $items = array();
			if( $query->have_posts() ) {
				while( $query->have_posts() ) {
                    $query->the_post();
                    $items[] = array(
                        'permalink' => get_the_permalink(),
                        'thumbnail' => get_the_post_thumbnail_url( get_the_ID(), 'project049-admeme-single' )
                    );
				}  
                wp_reset_postdata();
            } 
            die( json_encode( $items ) );
		
        }

        /*-----------------------------------------------------------------------------------*/				
        // Return the total of pages for a given type of query
        /*-----------------------------------------------------------------------------------*/				
        public static function get_total_pages( $type, $object, $count ) {

            $pages = 0;

            $args = self::get_query_args( $type, $object, $count, 0 );
            $query = new WP_Query( $args );
            $total = $query->found_posts;
            if( intval( $total ) > 0 ) {
                $pages = intval( $total / $count );
                if( $total % $count > 0 ) {
                    $pages++;
                }  
            }

            return $pages;

        }

        /*-----------------------------------------------------------------------------------*/				
        // Set the arguments for the query to load more posts
        /*-----------------------------------------------------------------------------------*/				
        public static function get_query_args( $type, $object, $count, $page ) {

            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $count,
                'post_status' => 'publish'
            );  

            switch( $type ) {
                case 'tag':
                    $args['tag'] = $object; 
                    break;
                case 'author':
                    $args['author'] = $object;
                    break;
                case 'section':
                    $args['tax_query'] = array(
                        array(
                            'taxonomy' => 'seccion',
                            'field'    => 'slug',
                            'terms'    => $object,
                        )
                    );
                    break;
                case 'search':
                    $args['s'] = $object;
            }

            if( $page > 0 ) {
                $args['paged'] = $page;
            }

            return $args;

        }

        /*-----------------------------------------------------------------------------------*/				
        // Returns the link to the next or previous author page
        /*-----------------------------------------------------------------------------------*/				        
        public static function get_author_link( $which ) {

            global $wp_query;
            $current_author = $wp_query->get_queried_object();

            $args = array(
                'role__in' => array( 'author', 'contributor', 'editor' ),
                'fields' => 'ID',
                'orderby' => 'display_name', 
                'order' => 'ASC'
            );

            $query = new WP_User_Query( $args );
            $authors = $query->get_results();
            $tmp_author = false;
            $position = array_search( $current_author->ID, $authors );

            if( $position !== false ) {
                if( 'prev' == $which ) {
                    if( 0 == $position ) {
                        $tmp_author = false;
                    } else {
                        $tmp_author = $authors[ $position - 1 ];
                    }
                } elseif( 'next' == $which ) {
                    if( $position == count( $authors ) - 1 ) {
                        $tmp_author = false;
                    } else {
                        $tmp_author = $authors[ $position + 1 ];
                    }
                }                  
            }

            if( $tmp_author !== false ) {
                $author_url = get_author_posts_url( $tmp_author );
            } else {
                $author_url = false;
            }

            return $author_url;

        }

        /*-----------------------------------------------------------------------------------*/				
        // Render the page logo in different resolutions
        /*-----------------------------------------------------------------------------------*/				
        function render_logo() {

            if( Project049_Configuration::$mobile_detect->isTablet() ) {
                $image_name = '-tablet';
            } elseif( Project049_Configuration::$mobile_detect->isMobile() ) {
                $image_name = '-mobile';
            } else {
                $image_name = '';
            }

            echo "<img src='" . get_stylesheet_directory_uri() . "/assets/images/logo-project049" . $image_name . ".png' alt='project049' title='project049' />";
            
        }

        /*-----------------------------------------------------------------------------------*/				
        // Return the link to the series a post belongs to
        /*-----------------------------------------------------------------------------------*/				
        function get_series_link( $post_id ) {

            $series = get_the_terms( $post_id, 'series' );
            $current_series = null;
            foreach( $series as $s ) {
                $current_series = $s;
            }
            $link = get_series_link( $current_series->term_id );
            return $link;

        }
        
		static function this() {
		
			return self::$_this;
		
		}

    }

}

new Project049_Frontoffice();