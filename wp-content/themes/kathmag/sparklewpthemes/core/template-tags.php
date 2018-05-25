<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Kathmag
 */

if ( ! function_exists( 'kathmag_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function kathmag_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;


/**
 * Custom Meta Post Tabs Function Area
*/
if( !function_exists( 'kathmag_get_categories' ) ) :
	/**
	 * Function To Get Categories
	 */
	function kathmag_get_categories() {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'kathmag' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			printf( '<span class="cat-links">' . esc_html__( ' %1$s', 'kathmag' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}
	}
endif;

if( !function_exists( 'kathmag_get_tags' ) ) :
	/**
	 * Function To Get Tags
	 */
	function kathmag_get_tags() {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'kathmag' ) );
		if( $tags_list ) :
			/* translators: 1: list of tags. */
			printf( '<span>' . esc_html__( ' %1$s', 'kathmag' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		endif;
	}
endif;


if( !function_exists( 'kathmag_get_comments_no' ) ) :
	/**
	 * Function To Get Tags
	 */
	function kathmag_get_comments_no() {
		if( ( comments_open() || get_comments_number() ) ) {

			$comments_number = get_comments_number();

			return $comments_number;
		}
	}
endif;


if( !function_exists( 'kathmag_get_post_date' ) ) :
	/**
	 * Function To Get Post Date
	*/
	function kathmag_get_post_date() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {

			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		return $time_string;
	}
endif;


if( !function_exists( 'kathmag_theme_tags' ) ) {

	function kathmag_theme_tags( $date, $author, $comment ) {

		$enable_post_date = kathmag_get_option( 'kathmag_enable_post_date' );

		$enable_author_name = kathmag_get_option( 'kathmag_enable_author_name' );

		$enable_comments_no = kathmag_get_option( 'kathmag_enable_comments_no' );
	?>
		<ul>
			<?php
				if( $enable_post_date == 1 && $date == true ) {
					?>
					<li class="posted_date">
						<span>
							<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
								<?php
									echo kathmag_get_post_date();
								?>
							</a>
						</span>
					</li>
					<?php
				}

				if( $enable_author_name == 1 && $author == true ) {
					?>
					<li class="author">
						<span>
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
								<?php
									echo esc_html( get_the_author() );
								?>
							</a>
						</span>
					</li>
					<?php
				}

				if( $enable_comments_no == 1 && $comment == true ) {
					?>
					<li class="comments">
						<span>
							<?php 
								echo absint( kathmag_get_comments_no() ); 
							?>
						</span>
					</li>
					<?php
				}
			?>
		</ul>
	<?php

	}
}



