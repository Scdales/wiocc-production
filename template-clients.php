<?php
/*
Template Name: Client Champions Page
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

<?php endwhile; ?>

<div class="section client-champion">
	<div class="wrap">

		<div class="content-center client-servicies">
			<div class="text-sheet">
				<?php the_content() ?>
			</div>
		</div>
	</div>
</div>

<div class="section client-area">
	<div class="wrap">
        <div class="services-holder">
		<div class="service_block">
			<span class="box-icon">
				<i class="<?php echo  rwmb_meta( 'wiocc-block_1_icon_class' )?>"></i>
			</span>
			<h4><?php echo rwmb_meta( 'wiocc-block_1_heading' ) ?></h4>
			<div class="prevu_excerpt">
				<?php echo rwmb_meta( 'wiocc-block_1_content' ) ?>
			</div>
		</div>

		<div class="service_block">
			<span class="box-icon">
				<i class="<?php echo  rwmb_meta( 'wiocc-block_2_icon_class' )?>"></i>
			</span>
			<h4><?php echo rwmb_meta( 'wiocc-block_2_heading' ) ?></h4>
			<div class="prevu_excerpt">
				<?php echo rwmb_meta( 'wiocc-block_2_content' ) ?>
			</div>
		</div>

		<div class="service_block block_3">
			<span class="box-icon">
				<i class="<?php echo  rwmb_meta( 'wiocc-block_3_icon_class' )?>"></i>
			</span>
			<h4><?php echo rwmb_meta( 'wiocc-block_3_heading' ) ?></h4>
			<div class="prevu_excerpt">
				<?php echo rwmb_meta( 'wiocc-block_3_content' ) ?>
			</div>
		</div>

        </div>

	</div>
</div>

<?php get_footer() ?>
