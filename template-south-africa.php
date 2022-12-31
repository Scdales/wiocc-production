<?php
/*
Template Name: South Africa Home Page
Template Post Type:  page,highlight
*/
get_header();
$options = get_option( 'wiocc_settings' );
?>
<?php
$home_banner_args = array( 'post_type' => 'home_banner', 'posts_per_page' => 10 );
$home_banner_loop = new WP_Query( $home_banner_args );

$highlight_args = array( 'post_type' => 'highlight', 'posts_per_page' => 10 );
$highlight_loop = new WP_Query( $highlight_args );

// $usp_args = array( 'post_type' => 'usp', 'posts_per_page' => 5 );
// $usp_loop = new WP_Query( $usp_args );
$usp_args = array('post_type' => 'solution', 'posts_per_page' => 5, 'post__not_in' => array($post->ID));
$usp_loop = new WP_Query($usp_args);

$network_args = array( 'post_type' => 'network', 'posts_per_page' => 4 );
$network_loop = new WP_Query( $network_args );

$news_args = array( 'post_type' => 'news', 'posts_per_page' => 1 );
$news_loop = new WP_Query( $news_args );

$client_args = array( 'post_type' => 'client', 'posts_per_page' => 10 );
$client_loop = new WP_Query( $client_args );

$testimonial_args = array( 'post_type' => 'testimonial', 'posts_per_page' => 10, 'category_name' => rwmb_meta( 'testimonials-category' ) );
$testimonial_loop = new WP_Query( $testimonial_args );

?>
<!--
<div class="homepage-slider">
	<div class="banner-share">
		<div class="social-share">
			<?php
			$options = get_option( 'wiocc_settings' );

			?>
            <?php if ($options['wiocc_text_facebook']!=''):?>
                <li>
                    <a target="_blank"  href="<?php echo $options['wiocc_text_facebook']; ?>">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
            <?php endif;?>

			<?php if ($options['wiocc_text_pinterest']!=''):?>
				<li>
					<a target="_blank" href="<?php echo $options['wiocc_text_pinterest']; ?>">
						<i class="fab fa-pinterest"></i>
					</a>
				</li>
			<?php endif;?>
			<?php if ($options['wiocc_text_linkedin']!=''):?>
			<li>
				<a target="_blank"  href="<?php echo $options['wiocc_text_linkedin']; ?>">
					<i class="fab fa-linkedin-in"></i>
				</a>
			</li>
			<?php endif;?>
            <li>
                <a target="_blank" href="https://wiocc.net/blog/">
                    <i class="fab fa-blogger"></i>
                </a>
            </li>
			<?php if ($options['wiocc_text_twitter']!=''):?>
				<li>
					<a target="_blank"  href="<?php echo $options['wiocc_text_twitter']; ?>">
						<i class="fab fa-twitter"></i>
					</a>
				</li>
			<?php endif;?>

		</div>

	</div>
	<ul class="bxslider">
		<?php while ( $home_banner_loop->have_posts() ) : $home_banner_loop->the_post(); ?>
			<li class="full-bg" style="background-image:url('<?php the_post_thumbnail_url( 'full' ) ?>');">
				<div class="banner-caption">
					<div class="display-table">
						<div class="vertical-align">
							<div class="wrap">
								<div class="excerpt">
									<h2><?php the_title() ?></h2>
									<?php the_content() ?>
									<?php
									if(rwmb_meta( 'wiocc-linked_post') !=''){
										$link=get_the_permalink(rwmb_meta( 'wiocc-linked_post' ));
									}
									?>
									<a href="<?php echo $link ?>" class="cta"> <?php   pll_e('Read more'); ?> <span></span></a>

								</div>
							</div>
						</div>
					</div>
				</div>
			</li>
		<?php endwhile; ?>

	</ul>
</div>
-->
<!--
<div class="page-banner"
    style="background-image: url('<?php echo get_template_directory_uri()?>/images/SA_banner.jpeg>
    style="background-image: url('<?php get_meta_image( rwmb_meta( 'wiocc-banner_image', array( 'size' => 'full' ) ) ) ?>">
    <div class="wrap">
    	<h2><?php the_title() ?></h2>
    </div>
</div>
-->



<?php   if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="page-banner"
        style="background-image: url('<?php get_meta_image( rwmb_meta( 'wiocc-banner_image', array( 'size' => 'full' ) ) ) ?>')">
        <div class="wrap">
            <h2><?php the_title() ?></h2>
        </div>
    </div>
	<div class="section connectivity" style="padding-bottom:30px">
		<div class="wrap">

		 <div class="story-excerpt">
				<div class="display-table">
					<div class="vertical-align">
					    <div class="connectivity-text-container">
    						<?php the_content(); ?>
    						<a style="margin-top:30px" href="<?php echo get_the_permalink(rwmb_meta( 'wiocc-download_file' )) ?>" class="cta">
    							<?php echo   pll_e('Download Coverage Map');?>
    							<span></span>
    						</a>
						</div>
					</div>
				</div>
			</div>
			<div class="story-image">
			    <div style="text-align:center">Click the image to expand</div>
                <a href="<?php the_post_thumbnail_url( 'full' ); ?>">
				<img src="<?php the_post_thumbnail_url( 'full' ) ?>" alt="">
                </a>
			</div>
		</div>
		<!--<hr style="margin-left:10%;margin-right:10%"/>-->
	</div>
<?php endwhile; ?>
<?php endif;?>

<!--<div class="section connectivity" style="padding:30px;">-->
<!--    <div class="wrap">-->
<!--            <div class="oursolutions-text-container">-->
<!--                <h3><?php echo rwmb_meta( 'wiocc-block_1_heading' ) ?></h3>-->
<!--                <p>-->
<!--                    <?php echo rwmb_meta( 'wiocc-block_1_content' ) ?>-->
<!--                </p>-->
<!--            </div>-->
<!--    </div>-->
<!--</div>-->

<div class="section solution">
    <div class="wrap">
        <div class="content-center">
            <div class="cexcerpt">
                <div class="article-title">Tailored solutions precisely meet our clients’ needs </div>
                <div class="text-sheet">
                    <div class="page" title="Page 2">
                        <div class="layoutArea">
                            <div class="column">
                                <p>We work hard to understand fully the needs of each client, then draw upon our depth of experience, expertise, unique network and breadth of service options to develop bespoke solutions that precisely meet their requirements.</p>
                            </div>
                        </div>
                    </div>
                </div>
				<?php if ( rwmb_meta( 'wiocc-cat_link' ) != '' ): ?>
					<a target="_blank" href="<?php echo rwmb_meta( 'wiocc-cat_link' ) ?>"
					   class="cta"><?php echo rwmb_meta( 'wiocc-cta_caption' ) ?><span></span></a>
				<?php endif; ?>
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
        </div>
    </div>
</div>

<div class="section contact-form">
	<div class="wrap">
	    <div class="regional-contact-testimony">
	        <div class="regional-testimony">
        		<ul class="testimony-list">
                	<?php while ( $testimonial_loop->have_posts() ) : $testimonial_loop->the_post(); ?>
                		<li>
                			<div class="testimonial-content">
                				<h2 class="section-title"><?php pll_e('TESTIMONIALS'); ?></h2>
                				<blockquote class="testimony">
                					<p><?php echo $post->post_content ?></p>
                					<div class="author"><?php the_title() ?></div>
                				</blockquote>
                			</div>
                		</li>
                	<?php endwhile; ?>
                </ul>
            </div>
    		<div class="contact-form">
    			
    				<div class="contact-heading">
    					<h4><?php  pll_e('Leave a Message'); ?></h4>
    					<p><?php  pll_e('We will endeavour to respond within 48 hours after receiving your message'); ?></p>
    				</div>
    
    
    				<?php echo do_shortcode('[contact-form-7 id="3051" title="Contact form 1"]'); ?>
    
    		</div>
		</div>
	</div>
</div>


<!--<div class="section contact-form">-->
<!--	<div class="wrap">-->
<!--		<div class="contact-form">-->
			
<!--				<div class="contact-heading">-->
<!--					<h4><?php  pll_e('Leave a Message'); ?></h4>-->
<!--					<p><?php  pll_e('We will endeavour to respond within 48 hours after receiving your message'); ?></p>-->
<!--				</div>-->


<!--				<?php echo do_shortcode('[contact-form-7 id="3051" title="Contact form 1"]'); ?>-->

<!--		</div>-->
<!--	</div>-->
<!--</div>-->


<?php //get_meta_image( rwmb_meta( 'mega-left_banner_image', array( 'size' => 'full' ) )) ?>
<?php get_footer() ?>
