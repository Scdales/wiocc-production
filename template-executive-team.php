<?php
/*
Template Name: Executive Team
*/
get_header();

get_header();
$executive_args = array( 'post_type' => 'executive', 'posts_per_page' => 10, 'order'=>'ASC');
$executive_loop = new WP_Query($executive_args);
?>
<div class="page-banner"
     style="background-image: url('<?php get_meta_image( rwmb_meta( 'wiocc-banner_image', array( 'size' => 'full' ) ) ) ?>">
    <div class="wrap">
        <h2><?php the_title() ?></h2>
    </div>
</div>
<div class="wrap">
        <div class="board-listing  executive-team">
            <div class="full-width">
                <?php $pic = 0;?>
            <div class="executive-container">
                <?php if($executive_loop->have_posts()): while ( $executive_loop->have_posts() ) : $executive_loop->the_post(); ?>
                    <div class=" bod-member single-member member-box" id="executive-<?php echo $pic; ?>">
                        <div class="member-profile image-box">
                            <img src="<?php echo the_post_thumbnail_url()?>" alt="">
                            <div class="hidden-bio"  style=" ">
<!--                                --><?php //the_content()?>
								    <div class="display-table">
										<div class="vertical-align">
											<h4><?php the_title();?></h4>
											<p>
												<?php the_content() ?>
											</p>
											<a href="<?php echo rwmb_meta('wiocc-linkedin_link') ?>" class="linkedin-follow">
												<i class="fab fa-linkedin-in"></i>
											</a>
										</div>
									</div>
                            </div>
                        </div>
                        <div class="member-information">
                            <h4><?php the_title() ?></h4>
                            <p><?php echo rwmb_meta( 'wiocc-job_title' ) ?></p>
                        </div>
                    </div>
                <?php  $pic++; ?>
                <?php endwhile; endif;?>
            </div>
            </div>
        </div>
</div>

<?php get_footer(); ?>



