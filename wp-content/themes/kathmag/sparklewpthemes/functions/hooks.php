<?php
/**
 * Registration of hooks used in the theme
 *
 * @package Kathmag
 */

if( ! function_exists( 'kathmag_enable_frontpage_action' ) ) :
    /**
     * Enable Front Page Action
     *
     * @since 1.0.0
     */
    function kathmag_enable_frontpage_action() {

        $enable_front_page = kathmag_get_option( 'kathmag_enable_front_page' );

		if( 1 != $enable_front_page ){

           if ( 'posts' == get_option( 'show_on_front' ) ) {

                   include( get_home_template() );

           }
              else {

                   include( get_page_template() );
           }
       } 
		
    }
endif;
add_action( 'kathmag_enable_frontpage', 'kathmag_enable_frontpage_action', 10 );



if( ! function_exists( 'kathmag_breadcrumb_action' ) ) :
    /**
     * Enable Front Page Action
     *
     * @since 1.0.0
     */
    function kathmag_breadcrumb_action() {
    	$enable_breadcrumb = kathmag_get_option( 'kathmag_enable_breadcrumb' );

    	if( $enable_breadcrumb == 1 ) :
	    	if( !is_home() ) :
		    	?>
		        <div class="breadcrumb">
		        	<div class="list_title">
			        	<h2>
	                     <?php 
	                       if( is_category() || is_archive() ){

	                           the_archive_title( '<span>', '</span>' );

	                       }elseif( is_search() ){

	                           /* translators: %s: search query. */
	                           printf( esc_html__( 'Search Results for: %s', 'kathmag' ), '<span>' . get_search_query() . '</span>' );

	                       }elseif( is_404() ){

	                           esc_html_e('Error Page', 'kathmag');

	                       }else{

	                            the_title(); 
	                       }
	                     ?>
	                   </h2>
	               </div>
		        	<?php
		                $breadcrumb_args = array(
		                    'show_browse' => false,
		                );
		                kathmag_breadcrumb_trail( $breadcrumb_args );
		            ?>
		        </div><!-- .breadcrumb -->
		        <?php
		    endif;
		endif;
    }
endif;
add_action( 'kathmag_breadcrumb', 'kathmag_breadcrumb_action', 10 );


if( ! function_exists( 'kathmag_pagination_action' ) ) :
    /**
     * Pagination declaration of the theme.
     *
     * @since 1.0.0
     */
    function kathmag_pagination_action() {
    ?>
        <div class="row clearfix">
            <div class="col-sm-12">
                <?php
                    the_posts_pagination( 
                        array(
                            'mid_size'  => 2,
                            'prev_text' => esc_html__( '&laquo;', 'kathmag' ),
                            'next_text' => esc_html__( '&raquo;', 'kathmag' ),
                        ) 
                    );
                ?>
            </div><!-- .col-* -->
        </div><!-- .row.clearfix -->
    <?php
    }
endif;
add_action( 'kathmag_pagination', 'kathmag_pagination_action', 10 );


/*
 * Hook - Header Advertisement
 */
if( !function_exists( 'kathmag_header_advertisement_action' ) ) {
	/**
     * Header Advertisement Action
     *
     * @since 1.0.0
     */
	function kathmag_header_advertisement_action() {
		if( is_active_sidebar( 'advt-1' ) ) {
			?>
			<div class="col-md-8 col-sm-8 col-xs-12">
	            <div class="header_advt">
	                <?php
	                	dynamic_sidebar( 'advt-1' );
	                ?>
	            </div><!-- .header_advt -->
	        </div><!-- .col-* -->
			<?php
		}
	}
}
add_action( 'kathmag_header_advertisement', 'kathmag_header_advertisement_action', 10 );

/*
 * Hook - Advertisement One
 */
if( !function_exists( 'kathmag_advertisement_one_action' ) ) {
	/**
     * Advertisement One
     *
     * @since 1.0.0
     */
	function kathmag_advertisement_one_action() {
		if( is_active_sidebar( 'advertisement-1' ) ) {
			?>
			<div class="km_advertisement_one km_custom_widget advertisement km_section_spacing">
				<div class="km_advertisement_inner">
					<div class="km_container">
						<div class="advertisement_area">
							<?php
								dynamic_sidebar( 'advertisement-1' );
							?>
						</div><!-- .advertisement_area -->
					</div><!-- .km_container -->
				</div><!-- .km_advertisement_inner -->
	        </div><!-- .km_advertisement_one -->
			<?php
		}
	}
}
add_action( 'kathmag_advertisement_one', 'kathmag_advertisement_one_action', 10 );

/*
 * Hook - Advertisement Two
 */
if( !function_exists( 'kathmag_advertisement_two_action' ) ) {
	/**
     * Advertisement Two
     *
     * @since 1.0.0
     */
	function kathmag_advertisement_two_action() {
		if( is_active_sidebar( 'advertisement-2' ) ) {
			?>
			<div class="km_advertisement_two km_custom_widget advertisement km_section_spacing">
				<div class="km_advertisement_inner">
					<div class="km_container">
						<div class="advertisement_area">
							<?php
								dynamic_sidebar( 'advertisement-2' );
							?>
						</div><!-- .advertisement_area -->
					</div><!-- .km_container -->
				</div><!-- .km_advertisement_inner -->
	        </div><!-- .km_advertisement_two -->
			<?php
		}
	}
}
add_action( 'kathmag_advertisement_two', 'kathmag_advertisement_two_action', 10 );


/*
 * Hook - Ticker News
 */
if( !function_exists( 'kathmag_ticker_news_action' ) ) {

	function kathmag_ticker_news_action() {

		$enable_ticker_news = kathmag_get_option( 'kathmag_enable_ticker_news' );

        $ticker_news_title = kathmag_get_option( 'kathmag_ticker_news_title' );

        $ticker_news_cats = kathmag_get_option( 'kathmag_ticker_news_cat' );

        $ticker_news_no = kathmag_get_option( 'kathmag_ticker_news_no' );

        $ticker_args = array(
            'post_type' => 'post',
            'cat' => $ticker_news_cats,
            'posts_per_page' => absint( $ticker_news_no ),
        );

        $ticker_query = new WP_Query( $ticker_args );

        if( $enable_ticker_news == 1 && $ticker_query->have_posts() ) :
            ?>
            <div class="km_container">
                <div class="ticker_wrap clearfix">
                    <?php
                        if( !empty( $ticker_news_title ) ) :
                            ?>
                            <span class="ticker_haeading">
                                <?php
                                    echo esc_html( $ticker_news_title );
                                ?>
                            </span>
                            <?php
                        endif;
                    ?>
                    <div class="news_ticker">
                        <ul>
                            <?php
                                while( $ticker_query->have_posts() ) :
                                    $ticker_query->the_post();
                                    ?>
                                    <li>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php
                                                the_title();
                                            ?>
                                        </a>
                                    </li>
                                    <?php
                                endwhile;
                                wp_reset_postdata();
                            ?>
                        </ul>
                    </div><!-- // news_ticker -->
                </div>
            </div>
            <?php
        endif;
	}
}
add_action( 'kathmag_ticker_news', 'kathmag_ticker_news_action', 10 );

/*
 * Hook - Banner Layout
 */
if( !function_exists( 'kathmag_banner_layout_action' ) ) {
	/**
     * Banner Layout Action
     *
     * @since 1.0.0
     */
	function kathmag_banner_layout_action() {

		$enable_banner = kathmag_get_option( 'kathmag_enable_banner' );

		$banner_elements = kathmag_get_option( 'kathmag_banner_elements' );

		if( $banner_elements ) {
			$banner_elements = json_decode( $banner_elements );

			foreach( $banner_elements as $banner ) {
				if( $banner->category && ( $banner->enable == 'on' ) ) {

					$banner_layout = $banner->layout;

					if( $banner_layout == 'layout_one' || $banner_layout == 'layout_three' ) {
						$banner_args = array(
							'cat' => $banner->category,
							'number' => $banner->post_no,
							'enable' => $banner->enable
						);
					} else {
						$banner_args = array(
							'cat' => $banner->category,
							'enable' => $banner->enable
						);
					}

					if( $banner_layout == 'layout_one' ) {
						kathmag_banner_one( $banner_args );
					} else if( $banner_layout == 'layout_two' ){
						kathmag_banner_two( $banner_args );
					} else {
						kathmag_banner_three( $banner_args );
					}
				}
			}
		}
	}
}
add_action( 'kathmag_banner_layout', 'kathmag_banner_layout_action', 10 );

/*
 * Function - Banner Layout One
 */
if( !function_exists( 'kathmag_banner_one' ) ) {
	
	function kathmag_banner_one( $args ) {

	    if( !empty( $args['cat'] ) ) {
	        $banner_args = array(
	            'post_type' => 'post',
	            'cat' => $args['cat'],
	            'posts_per_page' => absint( $args['number'] ),
	        );
	    }
	    $banner_query = new WP_Query( $banner_args );

	    if( $banner_query->have_posts() ) :
			?>
			<div class="km_banner">
		        <div class="banner_inner">
		            <div class="km_container">
		                <div class="owl-carousel km_g_banner km_banner_layout_two">
		                    <?php
	                            while( $banner_query->have_posts() ) :
	                                $banner_query->the_post();
	                                ?>
	                                <div class="item">
	                                    <div class="col">
	                                        <?php
	                                            if( has_post_thumbnail() ) :
	                                                ?>
	                                                <div class="banner_post_holder" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);">
	                                                <?php
	                                            else :
	                                                ?><div class="banner_post_holder">
	                                                <?php
	                                            endif;
	                                        ?>
	                                            <div class="post_meta">
	                                                <div class="post_title">
	                                                    <h2>
	                                                        <a href="<?php the_permalink(); ?>">
	                                                            <?php
	                                                                the_title();
	                                                            ?>
	                                                        </a>
	                                                    </h2>
	                                                </div><!-- .post_title -->
	                                                <?php
	                                                	$enable_date = kathmag_get_option( 'kathmag_enable_post_date' );

	                                                	if( $enable_date == 1 ) :
			                                                ?>
			                                                <div class="posted_date">
			                                                    <?php
			                                                        echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . get_the_date() . '</a>';
			                                                    ?>
			                                                </div><!-- .posted_date -->
			                                                <?php
	                                                	endif;
	                                                ?>
	                                            </div><!-- .post_meta -->
	                                            <div class="mask"></div><!-- .mask -->
	                                        </div><!-- .banner_post_holder -->
	                                    </div><!-- .col-* -->
	                                </div><!-- .item -->
	                                <?php
	                            endwhile;
	                            wp_reset_postdata();
	                        ?>
		                </div><!-- .owl-carousel.km_g_banner.km_banner_layout_two -->
		            </div><!-- .km_container -->
		        </div><!-- .banner_inner -->
		    </div><!-- .km_banner -->
			<?php
		endif;
	}
}


/*
 * Function - Banner Layout Two
 */
if( !function_exists( 'kathmag_banner_two' ) ) {
	function kathmag_banner_two( $args ) {

		if( !empty( $args['cat'] ) ) {
	        $banner_args = array(
	            'post_type' => 'post',
	            'cat' => $args['cat'],
	            'posts_per_page' => 3,
	        );
	    }

	    $banner_query = new WP_Query( $banner_args );

	    if( $banner_query->have_posts() ) :
			?>
			<div class="km_banner km_banner_layout_three">
	            <div class="banner_inner">
	                <div class="km_container">
	                    <div class="row">
	                        <?php
	                            $count = 0;
	                            while( $banner_query->have_posts() ) :
	                                $banner_query->the_post();
	                                if( $count < 1 ) :
	                                    ?>
	                                    <div class="col-md-8 col-sm-12 col-xs-12 gutter_left">
	                                        <div class="card post_card">
	                                            <div class="post_fimage">
	                                            	<a href="<?php the_permalink(); ?>">
		                                                <?php
		                                                    if( has_post_thumbnail() ) :
		                                                    	the_post_thumbnail( 'kathmag-thumbnail-1', array( 'class' => 'img-responsive', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
		                                                    endif;
		                                                ?>
		                                            </a>
	                                                <div class="post_meta">
	                                                    <div class="post_title">
	                                                        <h2>
	                                                            <a href="<?php the_permalink(); ?>">
	                                                                <?php
	                                                                    the_title();
	                                                                ?>
	                                                            </a>
	                                                        </h2>
	                                                    </div><!-- .post_title -->
	                                                    <?php
		                                                	$enable_date = kathmag_get_option( 'kathmag_enable_post_date' );

		                                                	if( $enable_date == 1 ) :
				                                                ?>
				                                                <div class="posted_date">
				                                                    <?php
				                                                        echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . get_the_date() . '</a>';
				                                                    ?>
				                                                </div><!-- .posted_date -->
				                                                <?php
		                                                	endif;
		                                                ?>
	                                                </div><!-- .post_meta -->
	                                                <div class="mask"></div><!-- .mask -->
	                                            </div><!-- .post_fimage -->
	                                        </div><!-- .card.post_card -->
	                                    </div><!-- .col-* -->
	                                    <?php
	                                endif;
	                                $count = $count + 1;
	                            endwhile;
	                            wp_reset_postdata();
	                        ?>
	                        <div class="col-md-4 col-sm-12 col-xs-12 gutter_right">
	                            <div class="right_post_holder">
	                                <div class="row">
	                                    <?php
	                                        $count = 0;
	                                        while( $banner_query->have_posts() ) :
	                                            $banner_query->the_post();
	                                            if( $count >= 1 ) :
	                                                ?>
	                                                <div class="col-md-12 col-sm-6 col-xs-12 gutter_right_top">
	                                                    <div class="card post_card">
	                                                        <div class="post_fimage">
	                                                        	<a href="<?php the_permalink(); ?>">
		                                                            <?php
		                                                                if( has_post_thumbnail() ) :
			                                                                the_post_thumbnail( 'kathmag-thumbnail-1', array( 'class' => 'img-responsive', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
		                                                                endif;
		                                                            ?>
		                                                        </a>
	                                                            <div class="post_meta">
	                                                                <div class="post_title">
	                                                                    <h2>
	                                                                        <a href="<?php the_permalink(); ?>">
	                                                                            <?php
	                                                                                the_title();
	                                                                            ?>
	                                                                        </a>
	                                                                    </h2>
	                                                                </div><!-- .post_title -->
	                                                                <?php
					                                                	$enable_date = kathmag_get_option( 'kathmag_enable_post_date' );

					                                                	if( $enable_date == 1 ) :
							                                                ?>
							                                                <div class="posted_date">
							                                                    <?php
							                                                        echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . get_the_date() . '</a>';
							                                                    ?>
							                                                </div><!-- .posted_date -->
							                                                <?php
					                                                	endif;
					                                                ?>
	                                                            </div><!-- .post_meta -->
	                                                            <div class="mask"></div><!-- .mask -->
	                                                        </div><!-- .post_fimage -->
	                                                    </div><!-- .card.post_card -->
	                                                </div><!-- .col-* -->
	                                                <?php
	                                            endif;
	                                            $count = $count + 1;
	                                        endwhile;
	                                        wp_reset_postdata();
	                                    ?>
	                                </div><!-- .row -->
	                            </div><!-- .right_post_holder -->
	                        </div><!-- .col-* -->
	                    </div><!-- .row -->
	                </div><!-- .km_container -->
	            </div><!-- .banner_inner -->
	        </div><!-- .km_banner.km_banner_layout_three -->
			<?php
		endif;
	}
}

/*
 * Function - Banner Layout Three
 */
if( !function_exists( 'kathmag_banner_three' ) ) {
	function kathmag_banner_three( $args ) {


		if( !empty( $args['cat'] ) ) {
	        $banner_args = array(
	            'post_type' => 'post',
	            'cat' => $args['cat'],
	            'posts_per_page' => absint( $args['number'] ),
	        );
	    }
	    $banner_query = new WP_Query( $banner_args );

	    if( $banner_query->have_posts() ) :
			?>
			<section class="km_featured_posts">
		        <div class="section_inner">
		            <div class="km_container">
		                <div class="owl-carousel fp_carousel">
		                	<?php
		                		while( $banner_query->have_posts() ) :
		                			$banner_query->the_post();
				                	?>
				                    <div class="item">
				                        <div class="card fp_card">
				                            <a href="<?php the_permalink(); ?>">
				                            	<?php
                                                    if( has_post_thumbnail() ) :
                                                        the_post_thumbnail( 'kathmag-thumbnail-1', array( 'class' => 'img-responsive', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
                                                    endif;
                                                ?>
				                            </a>
				                            <div class="mask">
				                                <div class="post_meta">
				                                    <div class="post_title">
				                                        <h3>
				                                        	<a href="<?php the_permalink(); ?>">
                                                                <?php
                                                                    the_title();
                                                                ?>
                                                            </a>
				                                        </h3>
				                                    </div><!-- .post_title -->
				                                    <?php
	                                                	$enable_date = kathmag_get_option( 'kathmag_enable_post_date' );

	                                                	if( $enable_date == 1 ) :
			                                                ?>
			                                                <div class="posted_date">
			                                                    <?php
			                                                        echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . get_the_date() . '</a>';
			                                                    ?>
			                                                </div><!-- .posted_date -->
			                                                <?php
	                                                	endif;
	                                                ?>
				                                </div><!-- .post_meta -->
				                            </div><!-- .mask-->
				                        </div><!-- .card.fp_card -->
				                    </div><!-- .item -->
				                    <?php
		                    	endwhile;
		                    	wp_reset_postdata();
		                    ?>
		                </div><!-- .owl-carousel.fp_carousel -->
		            </div><!-- .km_container -->
		        </div><!-- .section_inner -->
		    </section><!-- .km_featured_posts -->
			<?php
		endif;
	}
}


/*
 * Hook - Main News
 */
if( !function_exists( 'kathmag_main_news_action' ) ) {
	function kathmag_main_news_action() {
		$news_elements = kathmag_get_option( 'kathmag_main_news_elements' );

		if( $news_elements ) {
			$news_blocks = json_decode( $news_elements );

			foreach( $news_blocks as $news_block ) {
				if( $news_block->category && ( $news_block->enable == 'on' ) ) {

					$block_layout = $news_block->layout;

					$block_args = array(
						'title' => $news_block->title,
						'cat' => $news_block->category,
						'number' => $news_block->post_no,
					);

					if( $block_layout == 'layout_one' ) {
						kathmag_news_block_one( $block_args );
					} else if( $block_layout == 'layout_two' ) {
						kathmag_news_block_two( $block_args );
					} else if( $block_layout == 'layout_three' ) {
						kathmag_news_block_three( $block_args );
					} else if( $block_layout == 'layout_four' ) {
						kathmag_news_block_four( $block_args );
					} else if( $block_layout == 'layout_five' ) {
						kathmag_news_block_five( $block_args );
					} else {
						kathmag_news_block_six( $block_args );
					}
				}
			}
		}
	}
}
add_action( 'kathmag_main_news', 'kathmag_main_news_action', 10 );


/*
 * Function - News Block One
 */
if( !function_exists( 'kathmag_news_block_one' ) ) {
	function kathmag_news_block_one( $args ) {
		$section_title = $args['title'];

		$news_args = array(
			'post_type' => 'post',
			'cat' => $args['cat'],
			'posts_per_page' => absint( $args['number'] ),
		);

		$news_query = new WP_Query( $news_args );

		if( $news_query->have_posts() ) {
			?>
			<section class="km_posts_widget_layout_one km_section_spacing">
				<?php
					if( !empty( $section_title ) ) :
						?>
						<div class="section_title">
							<h2>
								<?php
									echo esc_html( $section_title );
								?>
							</h2>
						</div><!-- .section_title -->
						<?php
					endif;
				?>
				<div class="row">
					<?php
						$count = 0;
						while( $news_query->have_posts() ) :
							$news_query->the_post();
							if( $count < 1 ) :
								?>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="card post_card">
										<?php
											if( has_post_thumbnail() ) :
												?>
												<div class="post_fimage img_hover_animation">
													<a href="<?php the_permalink(); ?>">
														<?php
															the_post_thumbnail( 'kathmag-thumbnail-3', array( 'class' => 'img-responsive', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
														?>
													</a>
												</div>
												<?php
											endif;
										?>
										<div class="post_meta">
											<?php
												kathmag_theme_tags( true, true, true );
											?>
										</div><!-- .post_meta -->
										<div class="post_title">
											<h3>
												<a href="<?php the_permalink(); ?>">
													<?php
														the_title();
													?>
												</a>
											</h3>
										</div><!-- .post_title -->
										<div class="the_contant">
											<?php
												the_excerpt();
											?>
										</div><!-- .the_contant -->
									</div><!-- .card.post_card -->
								</div><!-- col-* -->
								<?php
							endif;
							$count = $count + 1;
						endwhile;
						wp_reset_postdata();
					?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="right_side_wrapper">
							<?php
								$count = 0;
								while( $news_query->have_posts() ) :
									$news_query->the_post();
									if( $count >= 1 ) :
										?>
										<div class="card post_card">
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
											<div class="contant_box">
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
													<?php
														kathmag_theme_tags( true, false, false );
													?>
												</div><!-- .post_meta -->
											</div><!-- .contant_box -->
										</div><!-- .card.post_card -->
										<?php
									endif;
									$count = $count + 1;
								endwhile;
								wp_reset_postdata();
							?>
						</div><!-- .right_side_wrapper -->
					</div><!-- .col-* -->
				</div><!-- row -->
			</section><!-- .km_posts_widget_layout_one.km_section_spacing -->
			<?php
		}
	}
}

/*
 * Function - News Block Two
 */
if( !function_exists( 'kathmag_news_block_two' ) ) {
	function kathmag_news_block_two( $args ) {
		$section_title = $args['title'];

		$news_args = array(
			'post_type' => 'post',
			'cat' => $args['cat'],
			'posts_per_page' => absint( $args['number'] ),
		);

		$news_query = new WP_Query( $news_args );

		if( $news_query->have_posts() ) {
			?>
			<section class="km_posts_widget_layout_two km_section_spacing">
				<?php
					if( !empty( $section_title ) ) :
						?>
						<div class="section_title">
							<h2>
								<?php
									echo esc_html( $section_title );
								?>
							</h2>
						</div><!-- .section_title -->
						<?php
					endif;
				?>
				<div class="row">
					<?php
						while( $news_query->have_posts() ) :
							$news_query->the_post();
							?>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="card post_card watchheight">
									<?php
										if( has_post_thumbnail() ) :
											?>
											<div class="post_fimage img_hover_animation">
												<a href="<?php the_permalink(); ?>">
													<?php
														the_post_thumbnail( 'kathmag-thumbnail-2', array( 'class' => 'img-responsive', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
													?>
												</a>
											</div><!-- .post_fimage.img_hover_animation -->
											<?php
										endif;
									?>
									<div class="post_meta">
										<?php
											kathmag_theme_tags( true, true, true );
										?>
									</div><!-- .post_meta -->
									<div class="post_title">
										<h3>
											<a href="<?php the_permalink(); ?>">
												<?php
													the_title();
												?>
											</a>
										</h3>
									</div><!-- .post_title -->
									<div class="the_contant">
										<?php
											the_excerpt();
										?>
									</div><!-- .the_contant -->
								</div><!-- .card.post_card.watchheight -->
							</div><!-- .col-* -->
							<?php
						endwhile;
						wp_reset_postdata();
					?>
				</div><!-- .row -->
			</section><!-- .km_posts_widget_layout_two.km_section_spacing -->
			<?php
		}
	}
}


/*
 * Function - News Block Three
 */
if( !function_exists( 'kathmag_news_block_three' ) ) {
	function kathmag_news_block_three( $args ) {
		$section_title = $args['title'];

		$news_args = array(
			'post_type' => 'post',
			'cat' => $args['cat'],
			'posts_per_page' => absint( $args['number'] ),
		);

		$news_query = new WP_Query( $news_args );

		if( $news_query->have_posts() ) {
			?>
			<section class="km_posts_widget_layout_five km_section_spacing">
				<?php
					if( !empty( $section_title ) ) :
						?>
						<div class="section_title">
							<h2>
								<?php
									echo esc_html( $section_title );
								?>
							</h2>
						</div><!-- .section_title -->
						<?php
					endif;
				?>
				<div class="km_p_w_f_inner_wrapper">
					<?php
						while( $news_query->have_posts() ) :
							$news_query->the_post();
							?>
							<div class="card post_card">
								<div class="row clearfix">
									<?php
										if( has_post_thumbnail() ) :
											?>
											<div class="col-md-5 col-sm-5 col-xs-12">
												<div class="post_fimage img_hover_animation">
													<a href="<?php the_permalink(); ?>">
														<?php
															the_post_thumbnail( 'kathmag-thumbnail-2', array( 'class' => 'img-responsive', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
														?>
													</a>
												</div><!-- .post_fimage.img_hover_animation -->
											</div><!-- .col-* -->
											<?php
										endif;
									?>
									<div class="col-md-7 col-sm-7 col-xs-12">
										<div class="content_box">
											<div class="post_meta">
												<?php
													kathmag_theme_tags( true, true, false );
												?>
											</div><!-- .post_meta -->
											<div class="post_title">
												<h3>
													<a href="<?php the_permalink(); ?>">
														<?php
															the_title();
														?>
													</a>
												</h3>
											</div><!-- .post_title -->
											<div class="the_contant">
												<?php
													the_excerpt();
												?>
											</div><!-- .the_contant -->
										</div><!-- .content_box -->
									</div><!-- .coil-* -->
								</div><!-- .row -->
							</div><!-- .card.post_card -->
							<?php
						endwhile;
						wp_reset_postdata();
					?>
				</div><!-- .km_p_w_f_inner_wrapper -->
			</section><!-- .km_posts_widget_layout_five.km_section_spacing -->
			<?php
		}
	}
}

/*
 * Function - News Block Four
 */
if( !function_exists( 'kathmag_news_block_four' ) ) {
	function kathmag_news_block_four( $args ) {
		$section_title = $args['title'];

		$news_args = array(
			'post_type' => 'post',
			'cat' => $args['cat'],
			'posts_per_page' => absint( $args['number'] ),
		);

		$news_query = new WP_Query( $news_args );

		if( $news_query->have_posts() ) {
			?>
			<section class="km_posts_widget_layout_six km_section_spacing">
                <?php
					if( !empty( $section_title ) ) :
						?>
						<div class="section_title">
							<h2>
								<?php
									echo esc_html( $section_title );
								?>
							</h2>
						</div><!-- .section_title -->
						<?php
					endif;
				?>
				<div class="km_p_w_six_inner_wrapper">
					<div class="row">
						<?php
							while( $news_query->have_posts() ) :
								$news_query->the_post();
								?>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="card post_card watchheight">
										<?php
											if( has_post_thumbnail() ) :
												?>
												<div class="post_fimage img_hover_animation">
													<a href="<?php the_permalink(); ?>">
														<?php
															the_post_thumbnail( 'kathmag-thumbnail-2', array( 'class' => 'img-responsive', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );

															$post_format = get_post_format();

															if( $post_format == 'video' ) :
																?>
																<div class="video_btn">
																	<i class="fa fa-play" aria-hidden="true"></i>
																</div><!-- .video_btn -->
																<?php
															endif;

															if( $post_format == 'gallery' ) :
																?>
																<div class="video_btn">
																	<i class="fa fa-picture-o" aria-hidden="true"></i>
																</div><!-- .video_btn -->
																<?php
															endif;

															if( $post_format == 'audio' ) :
																?>
																<div class="video_btn">
																	<i class="fa fa-volume-up" aria-hidden="true"></i> 
																</div><!-- .video_btn -->
																<?php
															endif;
														?>
													</a>
												</div><!-- .post_fimage.img_hover_animation -->
												<?php
											endif;
										?>
										<div class="post_meta">
											<?php
												kathmag_theme_tags( true, true, false );
											?>
										</div><!-- .post_meta -->
										<div class="post_title">
											<h3>
												<a href="<?php the_permalink(); ?>">
													<?php
														the_title();
													?>
												</a>
											</h3>
										</div><!-- .post_title -->
									</div><!-- .card.post_card -->
								</div><!-- .col-* -->
								<?php
							endwhile;
							wp_reset_postdata();
						?>
					</div><!-- .row -->
				</div><!-- .km_p_w_sic_inner_wrapper -->
			</section><!-- .km_posts_widget_layout_six.km_section_spacing -->
			<?php
		}
	}
}


/*
 * Function - News Block Five
 */
if( !function_exists( 'kathmag_news_block_five' ) ) {
	function kathmag_news_block_five( $args ) {
		$section_title = $args['title'];

		$news_args = array(
			'post_type' => 'post',
			'cat' => $args['cat'],
			'posts_per_page' => absint( $args['number'] ),
		);

		$news_query = new WP_Query( $news_args );

		if( $news_query->have_posts() ) {
			?>
			<section class="km_posts_widget_layout_three km_section_spacing">
                <?php
					if( !empty( $section_title ) ) :
						?>
						<div class="section_title">
							<h2>
								<?php
									echo esc_html( $section_title );
								?>
							</h2>
						</div><!-- .section_title -->
						<?php
					endif;
				?>
				<div class="owl-carousel km_p_w_l_t_carousel">
					<?php
						while( $news_query->have_posts() ) :
							$news_query->the_post();
							?>
							<div class="item">
								<div class="card post_card">
									<div class="post_fimage">
										<a href="<?php the_permalink(); ?>">
											<?php
												if( has_post_thumbnail() ) :
													the_post_thumbnail( 'kathmag-thumbnail-5', array( 'class' => 'img-responsive', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
												endif;
											?>
										</a>
										<div class="post_meta_holder">
											<div class="post_title">
												<h3>
													<a href="<?php the_permalink() ?>">
														<?php
															the_title();
														?>
													</a>
												</h3>
											</div><!-- .post_title -->
											<div class="post_meta">
												<?php
													kathmag_theme_tags( true, true, false );
												?>
											</div><!-- .post_meta -->
										</div><!-- .post_meta_holder -->
									</div><!-- .post_fimage -->
								</div><!-- .card.post_card -->
							</div><!-- .item -->
							<?php
						endwhile;
						wp_reset_postdata();
					?>
				</div><!-- .owl-carousel.km_p_w_l_t_carousel -->
			</section><!-- .km_posts_widget_layout_three. km_section_spacing -->
			<?php
		}
	}
}


/*
 * Function - News Block Six
 */
if( !function_exists( 'kathmag_news_block_six' ) ) {
	function kathmag_news_block_six( $args ) {
		$section_title = $args['title'];

		$news_args = array(
			'post_type' => 'post',
			'cat' => $args['cat'],
			'posts_per_page' => absint( $args['number'] ),
		);

		$news_query = new WP_Query( $news_args );

		if( $news_query->have_posts() ) {
			?>
			<section class="km_posts_widget_layout_four km_section_spacing">
                <?php
					if( !empty( $section_title ) ) :
						?>
						<div class="section_title">
							<h2>
								<?php
									echo esc_html( $section_title );
								?>
							</h2>
						</div><!-- .section_title -->
						<?php
					endif;
				?>
				<div class="row">
					<?php
						while( $news_query->have_posts() ) :
							$news_query->the_post();
							?>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="card post_card watchheight">
									<?php
										if( has_post_thumbnail() ) :
											?>
											<div class="post_fimage img_hover_animation">
												<a href="<?php the_permalink(); ?>">
													<?php
														the_post_thumbnail( 'kathmag-thumbnail-2', array( 'class' => 'img-responsive', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
													?>
												</a>
											</div><!-- .post_fimage.img_hover_animation -->
											<?php
										endif;
									?>
									<div class="post_meta">
										<?php
											kathmag_theme_tags( true, false, false );
										?>
									</div><!-- .post_meta -->
									<div class="post_title">
										<h3>
											<a href="<?php the_permalink(); ?>">
												<?php
													the_title();
												?>
											</a>
										</h3>
									</div><!-- .post_title -->
									<div class="the_contant">
										<?php
											echo esc_html(wp_trim_words(get_the_content(), 8));
										?>
									</div><!-- .the_contant -->
								</div><!-- .card.post_card.watchheight -->
							</div><!-- .col-* -->
							<?php
						endwhile;
						wp_reset_postdata();
					?>
				</div><!-- .row -->
			</section><!-- .km_posts_widget_layout_four.km_section_spacing -->
			<?php
		}
	}
}


/*
 * Hook - Bottom News Blocks
 */
if( !function_exists( 'kathmag_bottom_news_block_action' ) ) {
	function kathmag_bottom_news_block_action() {
		$news_elements = kathmag_get_option( 'kathmag_bottom_elements' );

		if( $news_elements ) {
			$news_blocks = json_decode( $news_elements );

			foreach( $news_blocks as $news_block ) {
				if( $news_block->enable == 'on' ) {

					$block_layout = $news_block->layout;

					if( $block_layout == 'layout_two' ) {
						$block_args = array(
							'title_one' => $news_block->title_one,
							'cat_one' => $news_block->category_one,
							'title_two' => $news_block->title_two,
							'cat_two' => $news_block->category_two,
							'title_three' => $news_block->title_three,
							'cat_three' => $news_block->category_three,
							'number' => $news_block->post_no,
						);
					} else {
						$block_args = array(
							'title' => $news_block->title_one,
							'cat' => $news_block->category_one,
							'number' => $news_block->post_no,
						);
					}
					

					if( $block_layout == 'layout_one' ) {
						kathmag_bottom_news_block_one( $block_args );
					} else if( $block_layout == 'layout_two' ) {
						kathmag_bottom_news_block_two( $block_args );
					} else {
						kathmag_bottom_news_block_three( $block_args );
					} 
				}
			}
		}
	}
}
add_action( 'kathmag_bottom_news_block', 'kathmag_bottom_news_block_action', 10 );

/*
 * Function - Bottom News Block One
 */
if( !function_exists( 'kathmag_bottom_news_block_one' ) ) {
	function kathmag_bottom_news_block_one( $args ) {
		$news_args = array(
			'post_type' => 'post',
			'cat' => $args['cat'],
			'posts_per_page' => $args['number'],
		);

		$news_query = new WP_Query( $news_args );

		if( $news_query->have_posts() ) :
			?>
			<section class="km_posts_widget_layout_seven km_section_spacing">
				<?php
					if( !empty( $args['title'] ) ) :
						?>
			            <div class="section_title">
			                <h2>
			                	<?php
			                		echo esc_html( $args['title'] );
			                	?>
			                </h2>
			            </div><!-- .section_title -->
			            <?php
	            	endif;
	            ?>
	            <div class="km_p_w_f_inner_wrapper">
	                <div class="row">
	                	<?php
	                		$count = 0;
	                		while( $news_query->have_posts() ) :
	                			$news_query->the_post();
	                			if( $count%2 == 0 ) :
			                		?>
				                	<div class="row clearfix visible-sm"></div>
				                	<?php
				                endif;

				                if( $count%3 == 0 ) :
			                		?>
				                	<div class="row clearfix visible-lg visible-md"></div>
				                	<?php
				                endif;

			                	?>
			                    <div class="col-md-4 col-sm-6 col-xs-12">
			                        <div class="card post_card">
			                            <div class="row">
			                            	<?php
			                            		if( has_post_thumbnail() ) :
					                            	?>
					                                <div class="col-md-5 col-sm-5 col-xs-12">
					                                    <div class="post_fimage img_hover_animation">
					                                    	<a href="<?php the_permalink(); ?>">
						                                        <?php
						                                        	the_post_thumbnail( 'kathmag-thumbnail-2', array( 'class' => 'img-responsive', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
						                                        ?>
						                                    </a>
					                                    </div><!-- .post_fimage.img_hover_animation -->
					                                </div><!-- .col-* -->
					                                <?php
			                                	endif;
			                                ?>
			                                <div class="col-md-7 col-sm-7 col-xs-12">
			                                    <div class="content_box">
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
			                                            <?php
															kathmag_theme_tags( true, false, false );
														?>
			                                        </div><!-- .post_meta -->
			                                    </div><!-- .content_box -->
			                                </div><!-- .col-* -->
			                            </div><!-- .row -->
			                        </div><!-- .card.post_card -->
			                    </div><!-- .col-* -->
			                    <?php
			                    $count = $count + 1;
	                    	endwhile;
	                    	wp_reset_postdata();
	                    ?>
	                </div><!-- .row -->
	            </div><!-- .km_p_w_f_inner_wrapper -->
	        </section><!-- .km_posts_widget_layout_seven.km_section_spacing -->
			<?php
		endif;
	}
}

/*
 * Function - Bottom News Block Two
 */
if( !function_exists( 'kathmag_bottom_news_block_two' ) ) {
	function kathmag_bottom_news_block_two( $args ) {
		$title = array( $args['title_one'], $args['title_two'], $args['title_three'] );
		$cats = array( $args['cat_one'], $args['cat_two'], $args['cat_three'] );
		?>
		<section class="km_posts_widget_layout_eight km_section_spacing">
            <div class="km_p_w_f_inner_wrapper clearfix">
            	<?php
            		foreach( $cats as $key => $cat ) :
            			$news_args = array(
            				'post_type' => 'post',
            				'cat' => absint( $cat ),
            				'posts_per_page' => absint( $args['number'] ),
            			);

            			$news_query = new WP_Query( $news_args );

            			if( $news_query->have_posts() ) :
			            	?>
			                <div class="km_card_holder_wig_eight">
			                	<?php
			                		if( !empty( $title[$key] ) ) :
					                	?>
					                    <div class="section_title">
					                        <h2>
					                        	<?php
					                        		echo esc_html( $title[$key] );
					                        	?>
					                        </h2>
					                    </div>
					                    <?php
			                    	endif;
			                    ?>
			                    <?php
			                    	$count = 0;
			                    	while( $news_query->have_posts() ) :
			                    		$news_query->the_post();
			                    		if( $count < 1 ) :
						                    ?>
						                    <div class="card post_card">
						                        <div class="post_fimage img_hover_animation">
						                        	<a href="<?php the_permalink(); ?>">
							                        	<?php
							                        		if( has_post_thumbnail() ) :
							                        			the_post_thumbnail( 'kathmag-thumbnail-2', array( 'class' => 'img-responsive', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
							                            	endif;
							                            ?>
							                        </a>
						                            <div class="mask"></div><!-- .mask -->
						                            <div class="post_details">
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
						                                    <?php
																kathmag_theme_tags( true, false, false );
															?>
						                                </div><!-- .post_meta -->
						                            </div><!-- .post_details -->
						                        </div><!-- .post_fimage.img_hover_animation -->
						                    </div><!-- .card.post_card -->
						                    <?php
			                    		endif;
			                    		$count = $count + 1;
			                    	endwhile;
			                    	wp_reset_postdata();

			                    	$count = 0;

			                    	while( $news_query->have_posts() ) :
			                    		$news_query->the_post();
			                    		if( $count >= 1 ) :
			                    			?>
			                    			<div class="card post_card">
						                        <div class="small_post_box_holder clearfix">
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
						                            <div class="content_box">
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
						                            </div><!-- .content_box -->
						                        </div><!-- .small_post_box_holder.clearfix -->
						                    </div><!-- .card.post_card -->
			                    			<?php
			                    		endif;
			                    		$count = $count + 1;
			                    	endwhile;
			                    	wp_reset_postdata();
			                    ?>
			                </div><!-- .km_card_holder_wig_eight -->
			                <?php
			            endif;
                	endforeach;
                ?>
            </div><!-- .km_p_w_f_inner_wrapper.clearfix -->
        </section><!-- .km_posts_widget_layout_eight.km_section_spacing -->
		<?php
	}
}

/*
 * Function - Bottom News Block Three
 */
if( !function_exists( 'kathmag_bottom_news_block_three' ) ) {
	function kathmag_bottom_news_block_three( $args ) {
		$news_args = array(
			'post_type' => 'post',
			'cat' => $args['cat'],
			'posts_per_page' => $args['number'],
		);

		$news_query = new WP_Query( $news_args );

		if( $news_query->have_posts() ) :
			?>
			<section class="km_posts_widget_layout_four km_section_spacing">
	            <?php
					if( !empty( $args['title'] ) ) :
						?>
			            <div class="section_title">
			                <h2>
			                	<?php
			                		echo esc_html( $args['title'] );
			                	?>
			                </h2>
			            </div><!-- .section_title -->
			            <?php
	            	endif;
	            ?>
	            <div class="row">
	            	<?php
	            		while( $news_query->have_posts() ) :
	            			$news_query->the_post();
			            	?>
			                <div class="col-md-3 col-sm-6 col-xs-12">
			                    <div class="card post_card watchheight">
			                    	<?php
			                    		if( has_post_thumbnail() ) :
					                    	?>
					                        <div class="post_fimage img_hover_animation">
					                        	<a href="<?php the_permalink(); ?>">
						                            <?php
						                            	the_post_thumbnail( 'kathmag-thumbnail-2', array( 'class' => 'img-responsive', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
						                            ?>
						                        </a>
					                        </div><!-- .post_fimage.img_hover_animation -->
					                        <?php
			                        	endif;
			                        ?>
			                        <div class="post_meta">
			                            <?php
											kathmag_theme_tags( true, true, false );
										?>
			                        </div><!-- .post_meta -->
			                        <div class="post_title">
			                            <h3>
			                            	<a href="<?php the_permalink(); ?>">
			                            		<?php
			                            			the_title();
			                            		?>
			                            	</a>
			                            </h3>
			                        </div><!-- .post_title -->
			                        <div class="the_contant">
			                            <?php
			                            	the_excerpt();
			                            ?>
			                        </div><!-- .the_content -->
			                    </div><!-- .card.post_card.watchheight -->
			                </div><!-- .col-* -->
			                <?php
	                	endwhile;
	                	wp_reset_postdata();
	                ?>
	            </div><!-- .row -->
	        </section><!-- .km_posts_widget_layout_four.km_section_spacing -->
			<?php
		endif;
	}
}