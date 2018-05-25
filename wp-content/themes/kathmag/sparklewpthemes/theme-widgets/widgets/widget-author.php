<?php
/**
 * Widget - Author
 *
 * @package Kathmag
 */


if ( ! class_exists( 'Kathmag_Author_Widget' ) ) :
	/**
	* Author Widget
	*/
	class Kathmag_Author_Widget extends WP_Widget
	{

		function __construct()
		{
			$opts = array(
				'classname' => 'widget_common widget_about',
				'description'	=> esc_html__( 'Displays short information of Author', 'kathmag' )
			);

			parent::__construct( 'kathmag-widget-one', esc_html__( 'Kathmag: Author', 'kathmag' ), $opts );
		}

		function widget( $args, $instance ) {

			$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
			
			$author_page        = !empty( $instance['author_page'] ) ? $instance['author_page'] : ''; 

            $author_designation    	= !empty( $instance['author_designation'] ) ? $instance['author_designation'] : '';

			echo $args[ 'before_widget' ];
				if( !empty( $title ) ) :
					echo $args[ 'before_title' ];
						echo esc_html( $title );
					echo $args[ 'after_title' ];
				endif;

				$author_args = array(
					'page_id'	=> absint( $author_page ),
					'post_type' => 'page'
				); 

				$author_query = new WP_Query( $author_args );

				if( $author_query->have_posts() ) :
					while( $author_query->have_posts() ) :
						$author_query->the_post();
						?>
						<div class="card widget_card">
							<?php
								if( has_post_thumbnail() ) :
									?>
	                                <div class="author_fimage">
	                                    <?php
	                                    	the_post_thumbnail( 'kathmag-thumbnail-4', array( 'class' => 'img-responsive', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
	                                    ?>
	                                </div><!-- .author_fimage -->
	                            	<?php
                            	endif;
                            ?>
                            <div class="the_content">
                            	<div class="author_name">
                            		<h4>
                            			<?php
                            				the_title();
                            			?>
                            		</h4>
                            	</div><!-- .author_name -->
                            	<?php
                            		if( !empty( $author_designation ) ) :
		                            	?>
		                            	<div class="author_sub">
		                            		<p>
		                            			<?php
		                            				echo esc_html( $author_designation );
		                            			?>
		                            		</p>
		                            	</div><!-- .author_sub -->
		                            	<?php
                            		endif;
                            	?>
                            	<div class="author_desc">
                            		<?php
                            			the_content();
                            		?>
                            	</div><!-- .author_desc -->
                            </div><!-- .the_content -->
                        </div><!-- .card.widget_card -->
						<?php
					endwhile;
					wp_reset_postdata();
				endif;
			echo $args[ 'after_widget' ]; 
		}

		function update( $new_instance, $old_instance ) {

			$instance = $old_instance;

			$instance['title']  	= sanitize_text_field( $new_instance['title'] );

            $instance['author_page']        = absint( $new_instance['author_page'] );

            $instance['author_designation']    	= sanitize_text_field( $new_instance['author_designation'] );

            return $instance;
		}

		function form( $instance ) {
			$defaults = array(
				'title' => '',
                'author_page' => '',
                'author_designation' => '',
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
				<label for="<?php echo esc_attr( $this->get_field_id( 'author_page' ) )?>"><strong><?php echo esc_html__( 'Author Page', 'kathmag' ); ?></strong></label>
				<?php
					wp_dropdown_pages( array(
	                    'id'               => esc_attr( $this->get_field_id( 'author_page' ) ),
	                    'class'            => 'widefat',
	                    'name'             => esc_attr( $this->get_field_name( 'author_page' ) ),
	                    'selected'         => esc_attr( $instance[ 'author_page' ] ),
	                    'show_option_none' => esc_html__( '&mdash; Select Page &mdash;', 'kathmag' ),
	                    )
	                );
				?>
			</p>
			<p>
                <label for="<?php echo esc_attr( $this->get_field_name( 'author_designation' ) ); ?>">
                    <strong><?php esc_html_e( 'Author Designation', 'kathmag' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'author_designation' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'author_designation' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['author_designation'] ); ?>" />   
            </p>
			<?php			
		}
	}
endif;
