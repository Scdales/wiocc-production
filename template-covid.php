<?php
/*
Template Name: Covid-19 News Page
*/
get_header();

$args = array(
		'post_type' => 'blog',
		'posts_per_page' => 100,
		'tax_query' => array(
	        array(
	            'taxonomy' => 'category',
	            'field'    => 'slug',
	            'terms'    => array( 'covid-19' )
	        )
	    )
	);
$loop = new WP_Query( $args );


while ( have_posts() ) : the_post(); ?>

	<div class="page-banner"
	     style="background-image: url('<?php get_meta_image( rwmb_meta( 'wiocc-banner_image', array( 'size' => 'full' ) ) ) ?>">
		<div class="wrap">
			<h2><?php the_title() ?></h2>
		</div>
	</div>
<div class="wrap-center">
	<div class="section about-us">
		<div class="wrap">
			<div class="left-wing">
				<div class="wrap">

					<?php if ( $loop->have_posts() ) : ?>
						<?php
						/* Start the Loop */
						while ( $loop->have_posts() ) : $loop->the_post();
						?>
						<div class="<?php echo has_post_thumbnail()?'single-news': 'single-news no-image'?>">
							<div class="news-left">
								<img src="<?php echo get_the_post_thumbnail_url(null,'full')?>" alt="">
							</div>
							<div class="news-right">
								<div class="news-date">
									<?php the_time('l, F jS, Y') ?>
								</div>
								<h3 class="news-title"><?php the_title()?> </h3>
								<div class="news-excerpt">
									<?php the_excerpt()?>
								</div>
								<a class="cta" href="<?php the_permalink()?>">Read More <span></span></a>

							</div>

						</div>

						<?php

						endwhile;

						the_posts_navigation();
						wp_reset_postdata();

					endif;
					?>
				</div>
			</div>

			<div class="right-wing convid-right-column">
				<?php $images = rwmb_meta( 'wiocc-file' ); ?>

				<h3 class="news-title"><?php echo rwmb_meta( 'wiocc-block_1_heading' ) ?></h3>
				<?php if($images != null && isset(array_values($images)[0])) { ?>
					<div class="convid-news-inline-image">
						<img src="<?php echo array_values($images)[0]['url']; ?>"
							 alt="<?php echo rwmb_meta( 'wiocc-block_1_heading' ) ?>"/>
					</div>
				<?php } ?>
				<?php echo rwmb_meta( 'wiocc-block_1_content' ) ?>
				<p>&nbsp;</p>

				<h3 class="news-title"><?php echo rwmb_meta( 'wiocc-block_2_heading' ) ?></h3>
				<?php if($images != null && isset(array_values($images)[1])) { ?>
					<div class="convid-news-inline-image">
						<img src="<?php echo array_values($images)[1]['url']; ?>"
							 alt="<?php echo rwmb_meta( 'wiocc-block_1_heading' ) ?>"/>
					</div>
				<?php } ?>
				<?php echo rwmb_meta( 'wiocc-block_2_content' ) ?>
				<p>&nbsp;</p>
			</div>
		</div>
		<div class="section contact-form" style="margin-top: 40px; padding-left: 30px; padding-right: 30px;">
			<div class="wrap">
				<div class="contact-form">

					<div class="contact-heading">
						<h4><?php  pll_e('Get in touch with us'); ?></h4>
					</div>


					<?php echo do_shortcode('[contact-form-7 id="2654" title="Contact form 1"]'); ?>

				</div>
			</div>
		</div>
	</div>
</div>
<?php endwhile; ?>



<?php get_footer() ?>
