<?php
/*
Template Name: Mission and Vision
*/
get_header();
?>
<?php

$about_args = array( 'post_type' => 'about', 'posts_per_page' => 3 );
$about_loop = new WP_Query( $about_args );


?>
<?php
while ( have_posts() ) : the_post(); ?>

	<div class="page-banner"
	     style="background-image: url('<?php get_meta_image( rwmb_meta( 'wiocc-banner_image', array( 'size' => 'full' ) ) ) ?>">
		<div class="wrap">
			<h2><?php the_title() ?></h2>
		</div>
	</div>

	<div class="section mission-vision">
		<div class="wrap">
			<?php while ( $about_loop->have_posts() ) : $about_loop->the_post(); ?>
			<div class="prevu_kit">
				<div class="display-table">
					<div class="vertical-align">
						<span class="box-icon">
							<i class="<?php echo rwmb_meta( 'wiocc-icon_class' ) ?>"></i>
						</span>
						<h4><?php the_title() ?></h4>
						<div class="prevu_excerpt">
							<?php the_content()?>
						</div>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>

<?php endwhile; ?>




<?php get_footer() ?>
