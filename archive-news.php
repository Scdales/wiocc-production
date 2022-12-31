<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wiocc_Theme
 */

get_header();
?>
	<div class="page-banner"
	     style="background-image: url('<?php echo get_template_directory_uri()?>/images/contact-banner.jpg">
		<div class="wrap">
			<h2>News</h2>
		</div>
	</div>
	<div class="section all-news">
		<div class="wrap">

			<?php if ( have_posts() ) : ?>
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();?>
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

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
		</div>
	</div>

<?php

get_footer();
