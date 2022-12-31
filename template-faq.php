<?php
/*
Template Name: Faq
*/
get_header();
?>
<?php

$faq_categories_args = array( 'post_type' => 'faq_category', 'posts_per_page' => 10 );
$faq_categories_loop = new WP_Query( $faq_categories_args );


?>
<?php
while ( have_posts() ) : the_post(); ?>

	<div class="page-banner"
	     style="background-image: url('<?php get_meta_image( rwmb_meta( 'wiocc-banner_image', array( 'size' => 'full' ) ) ) ?>">
		<div class="wrap">
			<h2 class="faq"><?php the_title() ?></h2>
		</div>
	</div>

	<div class="section faqs">
		<div class="wrap">

			<ul class="faq-header">
			<?php while ( $faq_categories_loop->have_posts() ) : $faq_categories_loop->the_post(); ?>
				<li>
					<a href="javascript:void()" rel="cat-<?php the_ID() ?>">
						<span class="txt"><?php the_title()?></span>
						<span class="faq-icon">
<!--							<i class="icon---><?php //echo sanitize_title(  get_the_title() ) ?><!--"></i>-->
						</span>
					</a>
				</li>
			<?php endwhile; ?>
			</ul>

			<div class="faqs-content">
				<?php $count=0; ?>
				<?php while ( $faq_categories_loop->have_posts() ) : $faq_categories_loop->the_post(); ?>

				<dl class="accordion" id="cat-<?php the_ID() ?>" style="display: <?php echo $count>0?'none':'block'?>">
					<?php
					$faq_args = array(
						'post_type' => 'faq',
						'posts_per_page' => 400,
						'meta_query'  => array(
							array(
								'key' => 'wiocc-category',
								'value' => get_the_ID(),

							)
						)
					);
					$faq_loop = new WP_Query( $faq_args );
					?>


						<?php
						$inner_count=0;
						while ( $faq_loop->have_posts() ) : $faq_loop->the_post(); ?>

							<dt><a href=""><?php the_title()?> <i class="icon-arrow-right"></i></a></dt>
							<dd>
								<div class="text-sheet">
									<?php the_content() ?>
								</div>
							</dd>
						<?php
							$inner_count++;
						endwhile;
						wp_reset_query()
						?>



				</dl>
				<?php
					$count++;
				endwhile;
				wp_reset_query()
				?>

			</div>

		</div><!--wrap-->
	</div> <!--ection contact-locations-->

<?php endwhile; ?>




<?php get_footer() ?>
