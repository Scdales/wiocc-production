<?php
/*
Template Name: Nigeria Home Page
*/
get_header();
$options = get_option( 'wiocc_settings' );
?>
<?php
$home_banner_args = array( 'post_type' => 'home_banner', 'posts_per_page' => 10 );
$home_banner_loop = new WP_Query( $home_banner_args );

$highlight_args = array( 'post_type' => 'highlight', 'posts_per_page' => 10 );
$highlight_loop = new WP_Query( $highlight_args );

$usp_args = array( 'post_type' => 'usp', 'posts_per_page' => 5 );
$usp_loop = new WP_Query( $usp_args );

$network_args = array( 'post_type' => 'network', 'posts_per_page' => 4 );
$network_loop = new WP_Query( $network_args );

$news_args = array( 'post_type' => 'news', 'posts_per_page' => 1 );
$news_loop = new WP_Query( $news_args );

$client_args = array( 'post_type' => 'client', 'posts_per_page' => 10 );
$client_loop = new WP_Query( $client_args );

?>
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
<?php while ( $highlight_loop->have_posts() ) : $highlight_loop->the_post(); ?>
	<div class="section connectivity">
		<div class="wrap">
			<div class="story-image map-thumbnail">
                <a href="<?php echo rwmb_meta('wiocc-map_link');?>">
				<img src="<?php the_post_thumbnail_url( 'full' ) ?>" alt="">
                </a>
			</div>
			<div class="story-excerpt">
				<div class="display-table">
					<div class="vertical-align">
						<h3><?php the_title() ?><?php echo rwmb_meta( 'wiocc-heading_part2' ) ?> </h3>
						<?php
                        the_content(); ?>
						<?php if(rwmb_meta( 'wiocc-cta_label' )!=''):?>
							<a href="<?php echo get_the_permalink(rwmb_meta( 'wiocc-highlight_post' )); ?>" class="cta">
								<?php echo   pll_e('About us');?>
								<span></span>
							</a>
						<?php endif;?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; ?>

<div class="section upselling">
	<div class="upsell-image">
		<img src="<?php echo get_template_directory_uri()?>/images/upsell.jpg" alt="">
	</div>
	<div class="upsell-services upsell-home">
		<div class="tab-content">
            <h4 class="mobile-heading hide-on-desktop">	<?php echo   pll_e('Solutions');?></h4>
			<h4 class="mobile-heading hide-on-desktop"><?php pll_e('Wiocc Offers Access to a Seamless Network') ?></h4>
			<?php
			$index=0;
			while ( $usp_loop->have_posts() ) : $usp_loop->the_post(); ?>

				<div style="display: <?php echo ($index==0)?'block':'none' ?>" class="excerpt" id="usp_<?php the_ID() ?>">
					<span class="menu-icon hide-on-mobile">
						<i class="<?php echo  rwmb_meta( 'wiocc-cta_font_icon_class' )?>"></i>
					</span>
					<h4 class="main_title"><?php echo rwmb_meta( 'wiocc-heading_part2' ) ?></h4>
                    <h4 class="usp_title" style="display: none;"><?php echo the_title() ?></h4>
					<?php the_excerpt()?>
				</div>
				<?php
				$index++;
			endwhile; ?>

		</div>
		<ul class="tab-menu">
			<?php
			$index=0;
			$class='not-active';
			while ( $usp_loop->have_posts() ) : $usp_loop->the_post();
				if($index==0)
					$class='active';
				?>

				<li>
					<a href="javascript:void(0)" rel="usp_<?php the_ID() ?>" class="<?php echo ($index==0)?'active':'none'?>">
					<span class="menu-icon">
						<i class="<?php echo  rwmb_meta( 'wiocc-cta_font_icon_class' )?>"></i>
					</span>
						<span class="title-txt"><?php the_title() ?></span>
					</a>

				</li>


				<?php
				$index++;
			endwhile; ?>
		</ul>
	</div>
</div>

<div class="section network">
	<div class="wrap">
		<h2 class="section-title"><?php echo pll_e('network'); ?></h2>

		<div class="network-list" >
			<?php while ( $network_loop->have_posts() ) : $network_loop->the_post(); ?>
				<a href="<?php the_permalink() ?>" class="network-post match-height" style="width: 50%;">
                        <span class="box-icon">
						<i class="<?php echo rwmb_meta( 'wiocc-cta_network_icon' ) ?>"></i>
					</span>

					<h4><?php the_title() ?></h4>
					<p><?php echo rwmb_meta( 'wiocc-home_excerpt' ) ?></p>
					<span class="learn-more"> <?php  pll_e('READ MORE'); ?></span>
				</a>
			<?php endwhile; ?>
		</div>
	</div>
</div>
<?php while ( $news_loop->have_posts() ) : $news_loop->the_post(); ?>
	<div class="section homepagenews" style="background-image: url('<?php echo get_template_directory_uri()?>/images/news-banner.jpg')">
		<div class="wrap">
			<h2 class="section-title"><?php pll_e('news & events'); ?></h2>

			<h4>
				<?php the_title() ?>
			</h4>
			<?php the_excerpt()?>
			<a href="<?php  the_permalink()?>" class="cta"><?  _e('READ MORE', 'wiocc'); ?> <span></span></a>

		</div>
	</div>
<?php endwhile; ?>


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

<!--mailchimp-->

<div class="section newsletter">
	<div class="wrap">
		<?php dynamic_sidebar( 'newsletter' ); ?>
	</div>
</div>

<?php //get_meta_image( rwmb_meta( 'mega-left_banner_image', array( 'size' => 'full' ) )) ?>
<?php get_footer() ?>
