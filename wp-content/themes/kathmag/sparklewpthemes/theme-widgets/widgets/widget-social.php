<?php
/**
 * Widget - Social Links
 *
 * @package Kathmag
 */

if ( ! class_exists( 'Kathmag_Social_Widget' ) ) :
	/**
	* Social Widget
	*/
	class Kathmag_Social_Widget extends WP_Widget
	{

		function __construct()
		{
			$opts = array(
				'classname' => 'widget_common widget_social',
				'description'	=> esc_html__( 'Displays Social Links.', 'kathmag' )
			);

			parent::__construct( 'kathmag-widget-two', esc_html__( 'Kathmag: Social', 'kathmag' ), $opts );
		}

		function widget( $args, $instance ) {
			
			$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			$facebook_link = !empty( $instance['facebook_link'] ) ? $instance['facebook_link'] : '';

			$twitter_link = !empty( $instance['twitter_link'] ) ? $instance['twitter_link'] : '';

			$instagram_link = !empty( $instance['instagram_link'] ) ? $instance['instagram_link'] : '';

			$youtube_link = !empty( $instance['youtube_link'] ) ? $instance['youtube_link'] : '';

			$vk_link = !empty( $instance['vk_link'] ) ? $instance['vk_link'] : '';

			$google_plus_link = !empty( $instance['google_plus_link'] ) ? $instance['google_plus_link'] : '';

			$linkedin_link = !empty( $instance['linkedin_link'] ) ? $instance['linkedin_link'] : '';

			$vimeo_link = !empty( $instance['vimeo_link'] ) ? $instance['vimeo_link'] : '';

			echo $args[ 'before_widget' ];
				if( !empty( $title ) ) :
					echo $args[ 'before_title' ];
						echo esc_html( $title );
					echo $args[ 'after_title' ];
				endif;
			?>
				<ul>
					<?php
						if( !empty( $facebook_link ) ) :
							?>
							<li>
								<a href="<?php echo esc_url( $facebook_link ); ?>">
									<i class="fa fa-facebook" aria-hidden="true"></i>
								</a>
							</li>
							<?php
						endif;
						if( !empty( $twitter_link ) ) :
							?>
							<li>
								<a href="<?php echo esc_url( $twitter_link ); ?>">
									<i class="fa fa-twitter" aria-hidden="true"></i>
								</a>
							</li>
							<?php
						endif;

						if( !empty( $instagram_link ) ) :
							?>
							<li>
								<a href="<?php echo esc_url( $instagram_link ); ?>">
									<i class="fa fa-instagram" aria-hidden="true"></i>
								</a>
							</li>
							<?php
						endif;

						if( !empty( $youtube_link ) ) :
							?>
							<li>
								<a href="<?php echo esc_url( $youtube_link ); ?>">
									<i class="fa fa-youtube-play" aria-hidden="true"></i>
								</a>
							</li>
							<?php
						endif;

						if( !empty( $vk_link ) ) :
							?>
							<li>
								<a href="<?php echo esc_url( $vk_link ); ?>">
									<i class="fa fa-vk" aria-hidden="true"></i>
								</a>
							</li>
							<?php
						endif;

						if( !empty( $google_plus_link ) ) :
							?>
							<li>
								<a href="<?php echo esc_url( $google_plus_link ); ?>">
									<i class="fa fa-google-plus" aria-hidden="true"></i>
								</a>
							</li>
							<?php
						endif;

						if( !empty( $linkedin_link ) ) :
							?>
							<li>
								<a href="<?php echo esc_url( $linkedin_link ); ?>">
									<i class="fa fa-linkedin-square" aria-hidden="true"></i>
								</a>
							</li>
							<?php
						endif;

						if( !empty( $vimeo_link ) ) :
							?>
							<li>
								<a href="<?php echo esc_url( $vimeo_link ); ?>">
									<i class="fa fa-vimeo" aria-hidden="true"></i>
								</a>
							</li>
							<?php
						endif;
					?>
				</ul>
			<?php
				
			echo $args[ 'after_widget' ]; 
		}

		function update( $new_instance, $old_instance ) {

			$instance = $old_instance;

            $instance['title']  = sanitize_text_field( $new_instance['title'] );

            $instance['facebook_link'] = esc_url_raw( $new_instance['facebook_link'] );

            $instance['twitter_link'] = esc_url_raw( $new_instance['twitter_link'] );

            $instance['instagram_link'] = esc_url_raw( $new_instance['instagram_link'] );

            $instance['youtube_link'] = esc_url_raw( $new_instance['youtube_link'] );

            $instance['vk_link'] = esc_url_raw( $new_instance['vk_link'] );

            $instance['google_plus_link'] = esc_url_raw( $new_instance['google_plus_link'] );

            $instance['linkedin_link'] = esc_url_raw( $new_instance['linkedin_link'] );

            $instance['vimeo_link'] = esc_url_raw( $new_instance['vimeo_link'] );

            return $instance;
		}

		function form( $instance ) {
			$defaults = array(
                'title'       => '',
                'facebook_link'	=> '',
                'twitter_link' => '',
                'instagram_link' => '',
                'youtube_link' => '',
                'vk_link' => '',
                'google_plus_link' => '',
                'linkedin_link' => '',
                'vimeo_link' => '',
            );

            $instance = wp_parse_args( (array) $instance, $defaults );
			?>
			<p>
                <label for="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>">
                    <strong><?php esc_html_e( 'Title', 'kathmag' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />   
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_name( 'facebook_link' ) ); ?>">
                    <strong><?php esc_html_e( 'Facebook Link', 'kathmag' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook_link' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['facebook_link'] ); ?>" />   
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_name( 'twitter_link' ) ); ?>">
                    <strong><?php esc_html_e( 'Twitter Link', 'kathmag' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter_link' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['twitter_link'] ); ?>" />   
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_name( 'instagram_link' ) ); ?>">
                    <strong><?php esc_html_e( 'Instagram Link', 'kathmag' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram_link' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['instagram_link'] ); ?>" />   
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_name( 'youtube_link' ) ); ?>">
                    <strong><?php esc_html_e( 'Youtube Link', 'kathmag' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube_link' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['youtube_link'] ); ?>" />   
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_name( 'vk_link' ) ); ?>">
                    <strong><?php esc_html_e( 'VK Link', 'kathmag' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vk_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vk_link' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['vk_link'] ); ?>" />   
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_name( 'google_plus_link' ) ); ?>">
                    <strong><?php esc_html_e( 'Google Plus', 'kathmag' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'google_plus_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'google_plus_link' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['google_plus_link'] ); ?>" />   
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_name( 'linkedin_link' ) ); ?>">
                    <strong><?php esc_html_e( 'Linkedin Link', 'kathmag' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin_link' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['linkedin_link'] ); ?>" />   
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_name( 'vimeo_link' ) ); ?>">
                    <strong><?php esc_html_e( 'Vimeo Link', 'kathmag' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vimeo_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vimeo_link' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['vimeo_link'] ); ?>" />   
            </p>
			<?php
		}
	}
endif;