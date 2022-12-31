<?php
/*
Template Name: Cable Announcement
*/
get_header();

while ( have_posts() ) : the_post();

$quote =  rwmb_meta( 'wiocc-block_1_content' );
$map_image = rwmb_meta('wiocc-image_2', array( 'size' => 'full' ));

$btn_text = rwmb_meta('wiocc-cta_title');
$btn_link = rwmb_meta('wiocc-linked_post_url');

?>

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
					<div class="text-sheet">
						<?php the_content(); ?>
					</div>

					<?php if($btn_text != '' && $btn_link != '') { ?>
						<div class="cable-announcement-btn">
							<a href="<?php echo $btn_link; ?>" class="cta">
								<?php echo $btn_text; ?>
								<span></span>
							</a>
						</div>
					<?php } ?>
				</div>
			</div>

			<div class="right-wing">
				<div class="wrap">
					<?php if($map_image != null) { ?>
						<div class="cable-announcement-map-image">
							<?php foreach ($map_image as $map) { ?>
								<a href="#map-modal" class="js-modal-trigger">
									<img src="<?php echo $map['url']; ?>"
										 alt="<?php echo $map['alt']; ?>" />
								</a>


								<div id="map-modal" class="download-modal map-modal" style="display: none;">
									<div class="display-table">
										<div class="vertical-align">
											<div class="wrap">
												<a href="javascript:void(0)" class="close-modal"></a>

												<img src="<?php echo $map['url']; ?>"
													 alt="<?php echo $map['alt']; ?>" />
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>


		</div>

		<?php if($quote != null && $quote != '') { ?>
			<blockquote class="cable-announcement-quote text-sheet">
				<div class="wrap">
					<?php echo rwmb_meta( 'wiocc-block_1_content' ) ?>
				</div>
			</blockquote>
		<?php } ?>
	</div>
</div>

<?php endwhile; ?>

<?php get_footer() ?>
