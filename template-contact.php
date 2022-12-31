<?php
/*
Template Name: Contacts
*/
get_header();
?>
<?php

$location_args = array( 'post_type' => 'location', 'posts_per_page' => 10 );
$location_loop = new WP_Query( $location_args );


?>
<?php
while ( have_posts() ) : the_post(); ?>

	<div class="page-banner"
	     style="background-image: url('<?php get_meta_image( rwmb_meta( 'wiocc-banner_image', array( 'size' => 'full' ) ) ) ?>">
		<div class="wrap">
			<h2><?php the_title() ?></h2>
		</div>
	</div>

	<div class="section contact-locations">
		<div class="wrap">

			<?php while ( $location_loop->have_posts() ) : $location_loop->the_post(); ?>

				<div class="contact-single-location">
					<div class="locate-icon">
						<i class="fas fa-map-marker-alt"></i>
					</div>
					<h2 class="location-name"><?php the_title() ?></h2>
					<div class="excerpt">
						<p class="address-1" > <?php echo rwmb_meta( 'wiocc-address_1' ) ?></p>
						<p class="address-2" > <?php echo rwmb_meta( 'wiocc-address_2' ) ?></p>
                        <p class="address-1" > <?php echo rwmb_meta( 'wiocc-address_3' ) ?></p>
						<p class="telephone" > <?php echo rwmb_meta( 'wiocc-telephone' ) ?></p>
                        <p class="telephone"><?php  echo rwmb_meta('wiocc-fax') ?></p>
						<p class="email" > <?php echo pll_e('Email').":" ;?><?php echo rwmb_meta( 'wiocc-email' ) ?></p>
					</div>
					<a href="<?php echo rwmb_meta( 'wiocc-map' ) ?>" class="learn-more">View on Map</a>

				</div>
			<?php endwhile; ?>

		</div><!--wrap-->
	</div> <!--ection contact-locations-->
<div class="section contact-form">
	<div class="wrap">
		<div class="contact-form">
			
				<div class="contact-heading">
					<h4><?php  pll_e('Leave a Message'); ?></h4>
					<p><?php  pll_e('We will endeavour to respond within 48 hours after receiving your message'); ?></p>
				</div>


				<?php echo do_shortcode('[contact-form-7 id="3051" title="Contact form 1"]'); ?>

		</div>
	</div>
</div>
<?php endwhile; ?>




<?php get_footer() ?>
