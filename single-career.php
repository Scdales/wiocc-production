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
while ( have_posts() ) : the_post(); ?>
	<div class="page-banner"
         style="background-image: url('<?php echo get_meta_image( rwmb_meta( 'wiocc-banner_image', array( 'size' => 'full' ))); ?>');">
		<div class="wrap">
			<h2><?php the_title() ?></h2>
		</div>
	</div>
<?php endwhile; ?>

	<div class="section career full-posting">
		<div class="wrap">
			<div class="career-left">
				<div class="text-sheet">
					<?php
					while ( have_posts() ) :
						the_post();

						the_content();

					endwhile; // End of the loop.
					?>
				</div>
			</div>

			<div class="career-right">
				<h3 class="sub-title"><?php  pll_e('Other Postings'); ?></h3>
				<?php
				$career_args = array( 'post_type' => 'career', 'posts_per_page' => 100 );
				$career_loop = new WP_Query( $career_args );
				?>
				<?php while ( $career_loop->have_posts() ) : $career_loop->the_post();
					?>
					<div class="career-posting <?php get_career_class(get_the_ID(),'specialization')?>">
						<h3><?php the_title() ?></h3>
						<h5><?php echo rwmb_meta('wiocc-location')."/" .rwmb_meta('wiocc-type') ?></h5>
						<div class="job-text">
							<?php the_excerpt()?>
						</div>
						<a class="cta" href="<?php the_permalink()?>"><?php pll_e('Apply Now');?><span></span></a>

					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>

<?php
//get_sidebar();
get_footer();
