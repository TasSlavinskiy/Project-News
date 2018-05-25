<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kathmag
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="card post_card">
		<?php
			if( has_post_thumbnail() ) :
				?>
				<div class="post_fimage">
					<?php
						the_post_thumbnail( 'full', array( 'class' => 'img-responsive', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
					?>
				</div><!-- .post_fimage -->
				<?php
			endif;
		?>
		<div class="post_meta">
			<?php
				kathmag_theme_tags( true, true, true );
			?>
			<div class="post_title">
				<h2>
					<?php
						the_title();
					?>
				</h2>
			</div><!-- .post_title -->
		</div><!-- .post_meta -->
		<div class="the_content">
			<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kathmag' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .the_content -->
		<?php
			$show_tags_cats = kathmag_get_option( 'kathmag_enable_post_tags_cats');
			if( $show_tags_cats == 1 && ( kathmag_get_tags() || kathmag_get_categories() ) ) :
				?>
				<div class="post_extra_details">
					<div class="post_tags">
						<strong>
							<?php esc_html_e( 'Tags & Categories :', 'kathmag'); ?> 
						</strong>
						<?php

							kathmag_get_tags();

							kathmag_get_categories();
						?>
					</div><!-- .post_tags -->
				</div><!-- .post_extra_details -->
				<?php
			endif;
		?>
	</div><!-- .card.post_card -->
</article><!-- #post-<?php the_ID(); ?> -->