<?php
/*
Template Name: Careers
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

<div class="section career">
    <?php
    $career_args = array( 'post_type' => 'career', 'posts_per_page' => 100 );
    $career_loop = new WP_Query( $career_args );
    $career_intro_args = array( 'post_type' => 'career_intro', 'posts_per_page' => 100 );
    $career_intro_loop = new WP_Query( $career_intro_args );
    ?>
<!--    --><?php //if($career_intro_loop->have_posts()): while ( $career_intro_loop->have_posts() ) : $career_intro_loop->the_post();
    ?>
    <div class="wrap" style="margin-bottom: 2%; text-align: center;">
<!--    <h3></h3>--><?php //the_title(); ?><!--</h3>-->
        <p><?php

            echo rwmb_meta( 'wiocc-block_1_content' ) ?> </p>
    </div>
<!--    --><?php //endwhile; endif; ?>
	<div class="wrap">
		<div class="full-width">

			<?php if($career_loop->have_posts()): while ( $career_loop->have_posts() ) : $career_loop->the_post();
				?>
				<div class="career-posting <?php get_career_class(get_the_ID(),'specialization')?>">
					<h3><?php the_title() ?></h3>
					<h5><?php echo rwmb_meta('wiocc-location')."/" .rwmb_meta('wiocc-type') ?></h5>
					<div class="job-text">
						<?php the_excerpt()?>
					</div>
					<a class="cta" href="<?php the_permalink()?>">Apply Now <span></span></a>

				</div>
			<?php endwhile; else:  ?>
            <div class="no-positions">
                <i class="far fa-frown"></i>
                <p>
                    <?php  pll_e('Unfortunately, there are no vacancies at the moment'); ?>. <br><?php pll_e('Kindly keep checking for exciting opportunities with us.'); ?>
                </p>
            </div>
            <?php endif;  ?>

        </div>



	</div>
</div>





<?php get_footer() ?>
