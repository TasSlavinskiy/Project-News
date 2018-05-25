<?php
/**
 * Template part for displaying page content in page.php
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
				</div>
				<?php
			endif;
		?>
		<div class="the_content">
			<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kathmag' ),
					'after'  => '</div>',
				) );

				if( get_edit_post_link() ) :

					edit_post_link(	sprintf( wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'kathmag' ),	array( 'span' => array(	'class' => array(), ), ) 
						),	get_the_title()	), '<span class="edit-link">', '</span>'
					);

				endif;
			?>
		</div><!-- .the_content -->
	</div><!-- .card.post_card -->
</article><!-- #post-<?php the_ID(); ?> -->

