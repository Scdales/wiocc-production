<?php
/*
Template Name: Networks
*/
get_header();
?>

<?php
while ( have_posts() ) : the_post(); ?>

	<div class="page-banner"
	     style="background-image: url('<?php get_meta_image( rwmb_meta( 'wiocc-banner_image', array( 'size' => 'full' ) ) ) ?>">
		<div class="wrap">
			<h2><?php the_title() ?></h2>
		</div>
	</div>
	<div class="section solution">
		<div class="wrap">
<!--			<div class="content-image">-->
<!--				<img src="--><?php //echo get_the_post_thumbnail_url()?><!--" alt="--><?php //the_title() ?><!--">-->
<!--			</div>-->
			<div class="content-center">
				<div class="cexcerpt">
					<div class="article-title"><?php the_title() ?></div>
					<div class="text-sheet">
						<?php
						the_content();
						?>
					</div>
					<?php

					if( rwmb_meta( 'wiocc-cta' )!=''): ?>
						<a target="_blank" href="<?php echo rwmb_meta( 'wiocc-linked_post_url' ) ?>" class="cta"><?php echo rwmb_meta( 'wiocc-cta_title' ) ?><span></span></a>
					<?php endif;?>

				</div>
			</div>
		</div>
	</div>
<?php endwhile; ?>
<?php get_footer() ?>
