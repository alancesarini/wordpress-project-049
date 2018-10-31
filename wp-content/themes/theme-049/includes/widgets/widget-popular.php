<?php
/*
Plugin Name: Project049 - Artículos más vistos
Description: Muestra los artículos más vistos
Author: Blogestudio
Version: 1.0
*/


class project049_widget_popular extends WP_Widget {

	function project049_widget_popular() {

		$widget_ops = array( 'classname' => 'project049_widget_popular', 'description' => 'Muestra los artículos más vistos' );
		$this->WP_Widget( 'project049_widget_popular', 'Project049 - Artículos más vistos', $widget_ops );

	}

	function form( $instance ) {
        
        $instance = wp_parse_args( (array) $instance, array( 'title' => 'LO MÁS VISTO', 'count' => 6 ) );
        $title = $instance[ 'title' ];
        $count = $instance[ 'count' ];
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Título: 
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo attribute_escape( $title ); ?>" />
            </label>			
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'count' ); ?>">Nº de posts a mostrar: 
                <input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" value="<?php echo attribute_escape( $count ); ?>" />
            </label>			
        </p>        		
        <?php

    }

    function update( $new_instance, $old_instance ) {

        $instance = $old_instance;	
        $instance[ 'title' ] = $new_instance[ 'title' ];
        $instance[ 'count' ] = $new_instance[ 'count' ];
        return $instance;

    }
	
	function widget( $args, $instance ) {

		echo $before_widget;

		$title = $instance['title'];
		$count = $instance['count'];
		
		?>

		<?php // ************************ Begin Widget Code ******************************************/ ?>

        <div class="widget widget-related">
            <h2><span><?php echo $title; ?></span></h2>
                <ul class="clearfix">
                <?php
                    $posts = wp_most_popular_get_popular( array( 'limit' => $count, 'post_type' => 'post', 'range' => 'all_time' ) );

					foreach( $posts as $post ) {  
                        $terms = wp_get_post_terms( $post->ID, 'seccion' );
                        foreach( $terms as $term ) {
                            if( 'admeme' == $term->slug || 'dialogart' == $term->slug ) {
                                $thumb_size = 'full';
                            } else {
                                $thumb_size = 'project049-thumb';
                            }
                        }
                ?>  
                
                    <li>
                        <div class="sidebar_pict">
                           <?php echo get_the_post_thumbnail( $post->ID, $thumb_size, array( 'class' => 'img-responsive' ) ); ?>                            
                        </div>
                        <div class="sidebar_text">
                            <h3><a href="<?php echo get_the_permalink( $post->ID ); ?>"><?php echo get_the_title( $post->ID ); ?></a></h3>
                            <span class="post-author"><?php echo get_the_author( $post->ID ); ?></span>
                        </div>
                    </li>

                <?php } ?>
                
              </ul>
          </div>

		<?php // ************************ End Widget Code ******************************************/ ?>

		<?php

		echo $after_widget;

	}

}


?>
