<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wiocc_Theme
 */

get_header();
while ( have_posts() ) :
	the_post();
	?>

	<div class="page-banner"
		 style="background-image: url('<?php get_meta_image( rwmb_meta( 'wiocc-banner_image', array( 'size' => 'full' ) ) ) ?>">
		<div class="wrap">
			<h2><?php the_title() ?></h2>
		</div>
	</div>

	<div class="section single-page">
		<div class="wrap">
			<div class="text-sheet">
				<?php the_content() ?>
			</div>
		</div>
	</div>

<?php

endwhile; // End of the loop.

get_footer();
