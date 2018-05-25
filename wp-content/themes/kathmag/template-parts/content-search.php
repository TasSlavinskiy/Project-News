<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kathmag
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
					<?php
						if( get_post_type() == 'post' ) :  
							?>
							<div class="post_meta">
								<?php
									kathmag_theme_tags( true, true, false );
								?>
							</div><!-- .post_meta -->
							<?php
						endif;
					?>
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
			</div><!-- .col-* -->
		</div><!-- .row -->
	</div><!-- .card.post_card -->
</article><!-- #post-<?php the_ID(); ?> -->
