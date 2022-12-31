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
while ( have_posts() ) :
	the_post();
    $usp_args = array( 'post_type' => 'solution', 'posts_per_page' => 5 ,'post__not_in' => array( $post->ID ));
    $usp_loop = new WP_Query( $usp_args );

    $client_args = array( 'post_type' => 'client', 'posts_per_page' => 5 ,'post__not_in' => array( $post->ID ));
    $client_loop = new WP_Query( $client_args );
	?>
	<div class="page-banner"
	     style="background-image: url('<?php get_meta_image( rwmb_meta( 'wiocc-banner_image', array( 'size' => 'full' ) ) ) ?>">
		<div class="wrap">
			<h2><?php  pll_e('Solutions'); ?></h2>
		</div>
	</div>
	<div class="section solution">
		<div class="wrap">

			<div class="content-center">
				<div class="cexcerpt">
					<div class="article-title"><?php the_title() ?></div>
                  <!--  <div class="content-image">
                        <img src="<?php /*echo get_the_post_thumbnail_url()*/?>" alt="<?php /*the_title() */?>">
                    </div>-->
					<div class="text-sheet">
						<?php
						the_content();
						?>
					</div>
                    <div class="row solution-icons-container">
                        <div class="solution-icons">
                            <h4><?php pll_e('OUR SOLUTIONS'); ?></h4>
                            <ul class="solution-icons-tab">
                                <?php
                                $index = 0;
                                $class = 'not-active';
                                while ($usp_loop->have_posts()) : $usp_loop->the_post();
                                    ?>

                                    <li class="icon-box">
                                        <a href="<?php the_permalink() ?>" rel="usp_<?php the_ID() ?>" class="is-active">
					<span class="menu-icon">
						<i class="<?php echo rwmb_meta('wiocc-cta_font_icon_class') ?>"></i>
					</span>
                                            <h5 class="rel"><?php the_title() ?></h5>
                                        </a>

                                    </li>


                                    <?php
                                    $index++;
                                endwhile; ?>
                            </ul>
                        </div>
                        <div class="solution-icons1">
                            <h4><?php pll_e('WHO WE WORK WITH'); ?></h4>
                            <ul class="solution-icons-tab section-right">
                                <?php
                                $class = 'not-active';
                                $index = 0;
                                while ($client_loop->have_posts()) : $client_loop->the_post();
                                    if ($index <= 2) {
                                        ?>

                                        <li class="icon-box">
                                            <a href="<?php the_permalink() ?>" rel="usp_<?php the_ID() ?>"
                                               class="is-active">
					<span class="menu-icon">
						<i class="<?php echo rwmb_meta('wiocc-cta_font_icon_class') ?>"></i>
					</span>
                                                <h5 class="rel"><?php the_title() ?></h5>
                                            </a>

                                        </li>


                                        <?php
                                    }
                                    $index++;
                                endwhile; ?>
                            </ul>
                        </div>
                    </div>
					<?php if( rwmb_meta( 'wiocc-cat_link' )!==''): ?>
						<a target="_blank" href="<?php echo rwmb_meta( 'wiocc-cat_link' ) ?>" class="cta"><?php echo rwmb_meta( 'wiocc-cta_caption' ) ?><span></span></a>
					<?php endif;?>

				</div>
			</div>
		</div>
	</div>


<?php

endwhile; // End of the loop.
?>


<?php
get_footer();
