<?php
/**
 * Widget - Recent Posts
 *
 * @package Kathmag
 */

if ( ! class_exists( 'Kathmag_Recent_Posts_Widget' ) ) :
	/**
	* Recent Posts Widget
	*/
	class Kathmag_Recent_Posts_Widget extends WP_Widget
	{

		function __construct()
		{
			$opts = array(
				'classname' => 'custom_widget widget_recent_posts',
				'description'	=> esc_html__( 'Displays recent posts.', 'kathmag' )
			);

			parent::__construct( 'kathmag-widget-three', esc_html__( 'Kathmag: Recent', 'kathmag' ), $opts );
		}

		function widget( $args, $instance ) {
			
			$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			$posts_no = !empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 5;

			echo $args[ 'before_widget' ];
				if( !empty( $title ) ) :
					echo $args[ 'before_title' ];
						echo esc_html( $title );
					echo $args[ 'after_title' ];
				endif;

			$recent_args = array(
				'posts_per_page' => absint( $posts_no ),
				'post_type' => 'post'
			);

			$recent_query = new WP_Query( $recent_args );
			if( $recent_query->have_posts() ) :
			?>
				<div class="widget_content">
					<?php
						while( $recent_query->have_posts() ) :
							$recent_query->the_post();
							?>
							<div class="content_box clearfix">
								<?php
									if( has_post_thumbnail() ) :
										?>
										<div class="image_box img_hover_animation">
											<a href="<?php the_permalink(); ?>">
												<?php
													the_post_thumbnail( 'kathmag-thumbnail-2', array( 'class' => 'img-responsive', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
												?>
											</a>
										</div><!-- .image_box.img_hover_animation -->
										<?php
									endif;
								?>
								<div class="content_holder">
									<div class="post_title">
										<h4>
											<a href="<?php the_permalink(); ?>">
												<?php
													the_title();
												?>
											</a>
										</h4>
									</div><!-- .post_title -->
									<div class="post_meta">
										<ul>
											<?php
												kathmag_theme_tags( true, false, false );
											?>
										</ul>
									</div><!-- .post_meta -->
								</div><!-- .content_holder -->
							</div><!-- .content_box.clearfix -->
							<?php
						endwhile;
						wp_reset_postdata();
					?>
				</div><!-- .widget_content -->
			<?php
			endif;
				
			echo $args[ 'after_widget' ]; 
		}

		function update( $new_instance, $old_instance ) {

			$instance = $old_instance;

            $instance['title']  	= sanitize_text_field( $new_instance['title'] );

            $instance['post_no']  	= absint( $new_instance['post_no'] );

            return $instance;
		}

		function form( $instance ) {
			$defaults = array(
                'title'       => '',
                'post_no'	  => 5,
            );

            $instance = wp_parse_args( (array) $instance, $defaults );

			?>
			<p>
                <label for="<?php echo esc_attr( $this->get_field_name('title') ); ?>">
                    <strong><?php esc_html_e('Title', 'kathmag'); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />   
            </p>

			<p>
                <label for="<?php echo esc_attr( $this->get_field_name('post_no') ); ?>">
                    <strong><?php esc_html_e('No of Recent Posts', 'kathmag'); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('post_no') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_no') ); ?>" type="number" value="<?php echo esc_attr( $instance['post_no'] ); ?>" />   
            </p>
			
			<?php
		}
	}
endif;