<?php
/**
 * Template part for displaying related posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kathmag
 */

	$enable_related_posts = kathmag_get_option( 'kathmag_enable_related_posts' );

	$related_posts_block_title = kathmag_get_option( 'kathmag_related_posts_block_title' );

	$related_posts_no = kathmag_get_option( 'kathmag_related_posts_no' );

	$related_args = array(
	    'no_found_rows'       => true,
	    'ignore_sticky_posts' => true,
	    'posts_per_page'      => absint( $related_posts_no ),
	);

	$current_object = get_queried_object();

	if ( $current_object instanceof WP_Post ) {

	    $current_id = $current_object->ID;

	    if ( absint( $current_id ) > 0 ) {
	        // Exclude current post.
	        $related_args['post__not_in'] = array( absint( $current_id ) );

	        // Include current posts categories.
	        $categories = wp_get_post_categories( $current_id );

	        if ( ! empty( $categories ) ) {
	            $related_args['tax_query'] = array(
	                array(
	                    'taxonomy' => 'category',
	                    'field'    => 'term_id',
	                    'terms'    => $categories,
	                    'operator' => 'IN',
	                )
	            );
	        }
	    }
	}

	$related_posts = new WP_Query( $related_args );

	if( $related_posts->have_posts() && ( $enable_related_posts == 1 ) ) :
		?>			
		<div class="related_posts">
			<section class="km_featured_posts">
				<?php
					if( !empty( $related_posts_block_title ) ) :
						?>
						<div class="section_title">
							<h2>
								<?php
									echo esc_html( $related_posts_block_title );
								?>
							</h2>
						</div><!-- .section_title -->
						<?php
					endif;
				?>
				<div class="owl-carousel related_posts_carousel">
					<?php
						while( $related_posts->have_posts() ) :
							$related_posts->the_post();
							?>
							<div class="item">
								<div class="card fp_card">
									<?php
										if( has_post_thumbnail() ) :
											?>
											<a href="<?php the_permalink(); ?>">
												<?php
													the_post_thumbnail( 'kathmag-thumbnail-2', array( 'class' => 'img-responsive', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
												?>
											</a>
											<?php
										endif;
									?>
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
											<div class="posted_date">
												<?php
													echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . get_the_date() . '</a>';
												?>
											</div><!-- .posted_date -->
										</div><!-- .post_meta -->
									</div><!-- .mask -->
								</div><!-- .card.fp_card -->
							</div><!-- .item -->
							<?php
						endwhile;
						wp_reset_postdata();
					?>
				</div><!-- .owl-carousel.related_posts_carousel -->
			</section><!-- .km_featured_posts -->
		</div><!-- .related_posts -->
		<?php
	endif;

	?>

