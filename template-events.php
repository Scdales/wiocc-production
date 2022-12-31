<?php
/*
Template Name: Events Page
*/
get_header();
$options = get_option( 'wioocc_settings' );
?>
<?php
$events_args = array( 'post_type' => 'event', 'posts_per_page' => 100 );
$events_loop = new WP_Query( $events_args );
?>
<div class="page-banner"
     style="background-image: url('<?php get_meta_image( rwmb_meta( 'wiocc-banner_image', array( 'size' => 'full' ) ) ) ?>">
	<div class="wrap">
		<h2><?php the_title() ?></h2>
	</div>
</div>
<div class="section events-all">
	<div class="wrap">
<!--		<div class="excerpt">-->
<!--			<h3 class="">WIOCC <?php  pll_e(date("Y").' Events'); ?></h3>-->
<!--			<p>-->
<!--				<?php  pll_e('WIOCC is your reliable partner of choice in Africa.')?>-->
<!--				<br>-->
<!--				<br>-->
<!--				<?php  pll_e('Due to the fast-spreading Coronavirus (COVID-19) and in order to support management of this global pandemic, we will not be')?> <br><?php  pll_e(' participating in events until further notice.')?> -->
<!--				<br>-->
<!--				<br>-->
 
<!--<?php  pll_e('However, everyone at WIOCC is committed to continuing to provide services to our clients. If you are an OTT, content provider, ISP') ?> -->
<!--<br><?php  pll_e(' or telco seeking a reliable partner with the ability to deliver bespoke solutions into, within and out of Africa, and you wish to ')?><br><?php  pll_e('contact us, please email ')?><a href="mailto:info@wiocc.net">info@wiocc.net</a> <?php  pll_e('and we will promptly get in touch with you.')?>-->
<!--<br>-->
<!--<br>-->

<!--<?php  pll_e('Existing clients who need technical support can reach us through the following addresses:')?>-->
<!--<br>-->
<!--<a href="mailto:noc@wiocc.net">noc@wiocc.net</a> – <?php  pll_e('24/7 WIOCC Network Operations Centre') ?>-->
<!--<br>-->
<!--<a href="mailto:w.provisioning@wiocc.net">w.provisioning@wiocc.net</a> – <?php  pll_e('service delivery enquiries') ?>-->
<!--<br>-->
<!--<a href="mailto:tac@wiocc.net">tac@wiocc.net</a> – <?php  pll_e('2nd level technical support') ?>-->
<!--<br>-->
<!--<br>-->
 
<!--<b><i>WIOCC: Building Africa’s first truly hyperscale infrastructure</i></b>-->
<!--			</p>-->
<!--		</div>-->

		<div class="events-listings">
			<?php while ( $events_loop->have_posts() ) : $events_loop->the_post(); ?>
				<div class="event-col">
					<div class="single-event match-height">

						<div class="event-image">
							<img src="<?php the_post_thumbnail_url( 'event' ) ?>" alt="">
						</div>
						<a href="<?php the_permalink() ?>" class="event-excerpt">
							<div class="event-location"><?php echo  rwmb_meta( 'wiocc-event_location' )?> </div>
							<div class="event-date">
								<div class="display-table">
									<div class="vertical-align">
										<?php echo  rwmb_meta( 'wiocc-event_start_date' )?>
										<?php if (rwmb_meta( 'wiocc-event_end_date' )!='') :?>
											to <?php echo  rwmb_meta( 'wiocc-event_end_date' )?>
										<?php endif; ?>
									</div>
								</div>
							</div>

							<div class="event-name"><?php the_title() ?></div>
							<div class="event-month"><?php echo  rwmb_meta( 'wiocc-event_start_date' )?>
                                <?php if (rwmb_meta( 'wiocc-event_end_date' )!='') :?>
                                    to <?php echo  rwmb_meta( 'wiocc-event_end_date' )?>
                                <?php endif; ?><?php echo  rwmb_meta( 'wiocc-event_month' )[0]?></div>
						</a>

					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>
<?php get_footer() ?>
