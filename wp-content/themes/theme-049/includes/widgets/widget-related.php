<?php
/*
Plugin Name: Project049 - Artículos relacionados
Description: Muestra los artículos relacionados por categoría
Author: Blogestudio
Version: 1.0
*/


class project049_widget_related extends WP_Widget {

	function project049_widget_related() {

		$widget_ops = array( 'classname' => 'project049_widget_related', 'description' => 'Muestra los artículos relacionados' );
		$this->WP_Widget( 'project049_widget_related', 'Project049 - Artículos relacionados', $widget_ops );

	}

	function form( $instance ) {
        
        $instance = wp_parse_args( (array) $instance, array( 'title' => 'RELACIONADOS' ) );
        $title = $instance[ 'title' ];
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Título: 
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo attribute_escape( $title ); ?>" />
            </label>			
        </p>		
        <?php

    }

    function update( $new_instance, $old_instance ) {

        $instance = $old_instance;	
        $instance[ 'title' ] = $new_instance[ 'title' ];
        return $instance;

    }
	
	function widget( $args, $instance ) {

		echo $before_widget;

		$title = $instance['title'];
		
		?>

		<?php // ************************ Begin Widget Code ******************************************/ ?>

        <div class="widget widget-related">
            <h2><span><?php echo $title; ?></span></h2>
                <ul class="clearfix">
                <?php
					$post_cats = wp_get_post_terms( get_the_ID(), 'category', array( 'fields' => 'term_id' ) );
					$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'cat__in' => $post_cats,
						'post__not_in' => array( get_the_ID() ),
						'posts_per_page' => 6,
						'orderby' => 'date',
						'order' => 'DESC'
					);

					$query = new WP_Query( $args );

					while( $query->have_posts() ) {
						$query->the_post();                
                ?>  
                
                    <li>
                        <div class="sidebar_pict">
                           <?php the_post_thumbnail( 'project049-thumb', array( 'class' => 'img-responsive' ) ); ?>                            
                        </div>
                        <div class="sidebar_text">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <span class="post-author"><?php the_author_posts_link(); ?></span>
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
