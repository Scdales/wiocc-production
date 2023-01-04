<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Wiocc_Theme
 */

get_header();
$options = get_option( 'wioocc_settings' );
?>
<?php
$events_args = array( 'post_type' => 'event', 'posts_per_page' => 2 );
$events_loop = new WP_Query( $events_args );
?>
	<div class="page-banner"
	     style="background-image: url('http://wiocc.net/wp-content/uploads/2022/05/WIOCC_Logo_2022.jpg');margin-top: 60px;">
		<div class="wrap">
			<h2><?php pll_e('Events'); ?></h2>
		</div>
	</div>

	<div class="section single-event-page">
		<div class="wrap">
			<div class="left-wing">
				<div class="single-event">
					<div class="event-image" style="text-align:center">
						<!--<img src="<?php echo get_template_directory_uri()?>/images/single-event.jpg" alt="">-->
						<?php echo get_the_post_thumbnail( get_the_ID(), 'large', array( 'class' => 'single-event-image' ) ); ?>
					</div>
					<a href="<?php the_permalink() ?>" class="event-excerpt" style="pointer-events: none;">
						<div class="event-location"><?php echo  rwmb_meta( 'wiocc-event_location' )?> </div>
						<!-- <div class="event-date">
							<div class="display-table">
								<div class="vertical-align">
									<?php echo  rwmb_meta( 'wiocc-event_start_date' )?>
									<?php if (rwmb_meta( 'wiocc-event_end_date' )!='') :?>
										to <?php echo  rwmb_meta( 'wiocc-event_end_date' )?>
									<?php endif; ?>
								</div>
							</div>
						</div> -->

						<div class="event-name"><?php the_title() ?></div>
						<div class="event-month"><?php echo  rwmb_meta( 'wiocc-event_month' )[0]?></div>
						<div><?php the_content(); ?></div>
					</a>

<!--					<div class="event-timer" id="eventTimer">-->

<!--						<script>-->
<!--							// Set the date we're counting down to-->
<!--							var countDownDate = new Date("Aug 24, 2019 15:37:25").getTime();-->
<!---->
<!--							// Update the count down every 1 second-->
<!--							var x = setInterval(function() {-->
<!---->
<!--								// Get todays date and time-->
<!--								var now = new Date().getTime();-->
<!---->
<!--								// Find the distance between now and the count down date-->
<!--								var distance = countDownDate - now;-->
<!---->
<!--								// Time calculations for days, hours, minutes and seconds-->
<!--								var days = Math.floor(distance / (1000 * 60 * 60 * 24));-->
<!--								var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));-->
<!--								var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));-->
<!--								var seconds = Math.floor((distance % (1000 * 60)) / 1000);-->
<!---->
<!--								// Output the result in an element with id="demo"-->
<!--								document.getElementById("eventTimer").innerHTML = days + "d : " + hours + "h : "-->
<!--									+ minutes + "m : " + seconds + "s ";-->
<!---->
<!--								// If the count down is over, write some text-->
<!--								if (distance < 0) {-->
<!--									clearInterval(x);-->
<!--									document.getElementById("eventTimer").innerHTML = "Sorry this event has already passed.";-->
<!--								}-->
<!--							}, 1000);-->
<!--						</script>-->
<!--					</div>-->

					<!-- <div class="event-details text-sheet">
						<p>
                            To meet with us at any of these events, reach out at
						</p>
						<p>
							<a href="">marketing@wiocc.net</a>
						</p>
					</div> -->

				</div>
			</div>

			<div class="right-wing">
				<h3 class="sub-title"><?php pll_e('Other Events'); ?></h3>
				<?php while ( $events_loop->have_posts() ) : $events_loop->the_post(); ?>
					<div class="event-col">
						<div class="single-event match-height">

							<div class="event-image">
								<img src="<?php the_post_thumbnail_url( 'event' ) ?>" alt="">
							</div>
							<a href="<?php the_permalink() ?>" class="event-excerpt">
								<div class="event-location"><?php echo  rwmb_meta( 'wiocc-event_location' )?> </div>
								<!-- <div class="event-date">
									<div class="display-table">
										<div class="vertical-align">
											<?php echo  rwmb_meta( 'wiocc-event_start_date' )?>
											<?php if (rwmb_meta( 'wiocc-event_end_date' )!='') :?>
												to <?php echo  rwmb_meta( 'wiocc-event_end_date' )?>
											<?php endif; ?>
										</div>
									</div>
								</div> -->

								<div class="event-name"><?php the_title() ?></div>
								<div class="event-month">
									<?php echo  rwmb_meta( 'wiocc-event_start_date' )?>
									<?php if (rwmb_meta( 'wiocc-event_end_date' )!='') :?>
										to <?php echo  rwmb_meta( 'wiocc-event_end_date' )?>
									<?php endif; ?>
								</div>
							</a>

						</div>
					</div>
				<?php endwhile; ?>
			</div>

		</div>
	</div>


<?php
get_footer();
