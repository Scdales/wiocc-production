<?php
/*
Template Name: About Us Page
*/
get_header();
?>
<?php

$testimonial_args = array( 'post_type' => 'testimonial', 'posts_per_page' => 10, 'category_name' => 'about-us' );
$testimonial_loop = new WP_Query( $testimonial_args );


?>
<?php
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
			<div class="right-wing">
				<img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
			</div>
			<div class="left-wing">
				<h2 class="page-title"><?php echo rwmb_meta( 'wiocc-content_header' ) ?></h2>
				<div class="text-sheet">
					<?php the_content() ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endwhile; ?>

<div class="section testimonials">
	<ul class="testimony-list">
		<?php while ( $testimonial_loop->have_posts() ) : $testimonial_loop->the_post(); ?>
			<li>
				<div class="testimony-video match-height">

                        <?php
                        if(!empty(rwmb_meta( 'wiocc-testimonial_video_url'))):?>
							<div class="video-container">
								<iframe width="560" height="315" src="<?php echo rwmb_meta( 'wiocc-testimonial_video_url')?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							</div>
                        <?php else:?>
							<div class="image-container">
								<img src="<?php echo the_post_thumbnail_url('full'); ?>" alt="">
							</div>
						<?php endif;?>
				</div>
				<div class="testimonial-content match-height">
					<h2 class="section-title"><?php pll_e('TESTIMONIALS'); ?></h2>
					<blockquote class="testimony">
						<p><?php echo $post->post_content ?></p>
						<div class="author"><?php the_title() ?></div>
					</blockquote>
				</div>
			</li>
		<?php endwhile; ?>
	</ul>
</div>

<?php get_footer() ?>
