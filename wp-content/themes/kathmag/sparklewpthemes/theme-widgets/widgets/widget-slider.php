<?php
/**
 * Widget - Slider Post Widget
 *
 * @package Kathmag
 */

if ( ! class_exists( 'Kathmag_Recent_Slider_Post_Widget' ) ) :
	/**
	* Recent Posts Widget
	*/
	class Kathmag_Recent_Slider_Post_Widget extends WP_Widget
	{

		function __construct()
		{
			$opts = array(
				'classname' => 'km_posts_widget_layout_three widget_popular_posts',
				'description'	=> esc_html__( 'Displays posts in slider.', 'kathmag' )
			);

			parent::__construct( 'kathmag-widget-four', esc_html__( 'Kathmag: Slider Post', 'kathmag' ), $opts );
		}

		function widget( $args, $instance ) {
			
			$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			$post_cat = !empty( $instance[ 'post_cat' ] ) ? $instance[ 'post_cat' ] : 0;

			$posts_no = !empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 5;

			echo $args[ 'before_widget' ];
				if( !empty( $title ) ) :
					echo $args[ 'before_title' ];
						echo esc_html( $title );
					echo $args[ 'after_title' ];
				endif;

			$post_args = array(
				'cat' => absint( $post_cat ),
				'posts_per_page' => absint( $posts_no ),
				'post_type' => 'post'
			);

			$post_query = new WP_Query( $post_args );
			if( $post_query->have_posts() ) :
			?>
				<div class="owl-carousel km_p_w_l_t_carousel">
					<?php
						while( $post_query->have_posts() ) :
							$post_query->the_post(); 
							?>
				            <div class="item">
				                <div class="card post_card">
				                    <div class="post_fimage">
				                    	<?php
				                    		if( has_post_thumbnail() ) :
				                    			?>
				                    			<a href="<?php the_permalink(); ?>">
					                    			<?php
					                    			the_post_thumbnail( 'kathmag-thumbnail-3', array( 'class' => 'img-responsive', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
					                    			?>
				                    			</a>
				                    			<?php
				                    		endif;
				                    	?>
				                        <div class="post_meta_holder">
				                            <div class="post_title">
				                                <h3>
				                                	<a href="<?php the_permalink(); ?>">
				                                		<?php
				                                			the_title();
				                                		?>
				                                	</a>
				                                </h3>
				                            </div><!-- .post_title -->
				                            <div class="post_meta">
				                                <ul>
				                                    <?php
				                                    	kathmag_theme_tags( true, false, false );
				                                    ?>
				                                </ul>
				                            </div><!-- .post_meta -->
				                        </div><!-- .post_meta_holder -->
				                    </div><!-- .post_fimage -->
				                </div><!-- .card.post_card -->
				            </div><!-- item -->
				            <?php
		            	endwhile;
		            	wp_reset_postdata();
		            ?>
		        </div><!-- .owl-carousel.km_p_w_l_t_carousel -->
			<?php
			endif;
				
			echo $args[ 'after_widget' ]; 
		}

		function update( $new_instance, $old_instance ) {

			$instance = $old_instance;

            $instance['title']  	= sanitize_text_field( $new_instance['title'] );

            $instance['post_cat']  	= absint( $new_instance['post_cat'] );

            $instance['post_no']  	= absint( $new_instance['post_no'] );

            return $instance;
		}

		function form( $instance ) {
			$defaults = array(
                'title'       => '',
                'post_cat'	  => 0,
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
				<label for="<?php echo esc_attr( $this->get_field_id( 'post_cat' ) )?>"><strong><?php echo esc_html__( 'Select Category ', 'kathmag' ); ?></strong></label>
				<?php
					$cat_args = array(
						'orderby'	=> 'name',
						'hide_empty'	=> 0,
						'id'	=> $this->get_field_id( 'post_cat' ),
						'name'	=> $this->get_field_name( 'post_cat' ),
						'class'	=> 'widefat',
						'taxonomy'	=> 'category',
						'selected'	=> absint( $instance['post_cat'] ),
						'show_option_all'	=> esc_html__( 'Show Recent Posts', 'kathmag' )
					);
					wp_dropdown_categories( $cat_args );
				?>
			</p>

			<p>
                <label for="<?php echo esc_attr( $this->get_field_name('post_no') ); ?>">
                    <strong><?php esc_html_e('No of Posts', 'kathmag'); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('post_no') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_no') ); ?>" type="number" value="<?php echo esc_attr( $instance['post_no'] ); ?>" />   
            </p>
			
			<?php
		}
	}
endif;