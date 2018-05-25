<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kathmag
 */
	
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('masonary_grid_item'); ?>>
	<div class="card post_card">
		<?php
			if( has_post_thumbnail() ) :
				?>
			    <div class="post_fimage img_hover_animation">
			    	<a href="<?php the_permalink(); ?>">
				        <?php
				        	kathmag_post_thumbnail();
				        ?>
				    </a>
			    </div><!-- .post_fimage.img_hover_animation -->
			    <?php
	    	endif;

	    ?>
	    <div class="post_details_holder">
	        <div class="post_meta">
	            <?php
					kathmag_theme_tags( true, true, false );
				?>
	        </div><!-- .post meta -->
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
	    </div><!-- .post_details_holder -->
	</div><!-- .card.post_card -->
</article><!-- #post-<?php the_ID(); ?> -->
