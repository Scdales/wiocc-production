<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Wiocc_Theme
 */

get_header();
?>


<?php
while ( have_posts() ) :
	the_post();
	?>
	<div class="page-banner"
	     style="background-image: url('<?php get_meta_image( rwmb_meta( 'wiocc-banner_image', array( 'size' => 'full' ) ) ) ?>">
		<div class="wrap">
			<h2><?php echo pll_e('Network'); ?> </h2>
		</div>
	</div>
	<div class="section solution">
		<div class="wrap">

<div class="">
    <div class="cexcerpt" style="color: <?php echo rwmb_meta( 'wiocc-text_color' ) ?>">
					<div class="article-title"> <?php the_title() ?></div>
					<div class="text-sheet">
						<?php
						the_content();
						?>
					</div>
					<?php if( rwmb_meta( 'wiocc-cat_link' )!=''): ?>
						<a target="_blank" href="<?php echo rwmb_meta( 'wiocc-cat_link' ) ?>" class="cta <?php echo rwmb_meta( 'wiocc-cta_network_icon' ) ?>"><?php echo rwmb_meta( 'wiocc-cta_caption' ) ?><span></span></a>
					<?php endif;?>
				</div>
</div>
        </div>

	</div>


<?php

endwhile; // End of the loop.
?>


<?php
get_footer();
