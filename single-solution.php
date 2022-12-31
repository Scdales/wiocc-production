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

while (have_posts()) :
    the_post();
    $usp_args = array('post_type' => 'solution', 'posts_per_page' => 5, 'post__not_in' => array($post->ID));
    $usp_loop = new WP_Query($usp_args);

    $client_args = array('post_type' => 'client', 'posts_per_page' => 5, 'post__not_in' => array($post->ID));
    $client_loop = new WP_Query($client_args);
    ?>

    <div class="download-modal" style="display: none;">
        <div class="display-table">
            <div class="vertical-align">
                <div class="wrap">
                    <a href="javascript:void(0)" class="close-modal"></a>
                    <div class="notification">
                        <div class="success-message">
                            <i class="fa fa-check-circle"></i>
                            <p><?php pll_e('Your Download will start Shortly.'); ?></p>
                            <input type="submit" class="cta close" value="Close">
                        </div>
                    </div>
                    <div id="form-div">
                        <h4>Download Product Guide</h4>
<!--                        <p>--><?php //pll_e('Before you can download the WIOCC product Guide, we just need a few details from you.'); ?><!--</p>-->

                        <form id="download-form" action="<?php echo admin_url('admin-ajax.php?action=download&nonce=' . wp_create_nonce("download ")) ?>">
                            <div class="full-width">
                                <div class="form-left">
                                    <div class="form-group">
                                        <input type="text" name="first_name" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="form-right">
                                    <div class="form-group">
                                        <input type="text"  name="last_name" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>

                            <div class="full-width">
                                <div class="form-left">
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Email *">
                                    </div>
                                </div>
                                <div class="form-right">
                                    <div class="form-group">
                                        <input type="text" name="location" placeholder="Location">
                                            <?php if (count(rwmb_meta('wiocc-download_file')) > 0): ?>
                                                <?php $files = rwmb_meta('wiocc-download_file');
                                                foreach ($files as $file) {
                                                    ?>
                                                    <?php
                                                } ?>
                                                <input type="hidden"  name="file_link"
                                                       value="<?php echo $file['url']; ?> "">
                                            <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="check-area">
                                <input type="checkbox" name="checker" value="checker" id="checker">
                                <label for="checker">
                                    <?php pll_e(
                                        'I am happy to be contacted by WIOCC about their latest product offerings, events and news.'); ?>
                                    <br> <?php pll_e('For more information on how we use your data, please review our'); ?>
                                    <a href="https://wiocc.net/privacy" target="_blank"><?php pll_e('privacy notice here.'); ?></a>
                                </label>
                            </div>

                            <div class="form-group no-margin">
                                <input type="submit" class="cta" value="Download">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-banner"
         style="opacity: 10; background-image: url('<?php get_meta_image(rwmb_meta('wiocc-banner_image', array('size' => 'full'))) ?>">
        <div class="wrap">
            <h2><?php pll_e('Solutions'); ?></h2>
        </div>
    </div>
    <div class="section solution">
        <div class="wrap">
            <div class="content-center">
                <div class="cexcerpt">
                    <div class="article-title"><?php the_title() ?></div>
                    <div class="content-image">
                        <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title() ?>">
                    </div>
                    <div class="text-sheet">
                        <?php
                        the_content();
                        ?>
                    </div>
                    <?php if (rwmb_meta('wiocc-cat_link') !== ''): ?>
                        <a target="_blank" href="<?php echo rwmb_meta('wiocc-cat_link') ?>"
                           class="cta"><?php echo rwmb_meta('wiocc-cta_caption') ?><span></span></a>
                    <?php endif; ?>
                </div>
                <?php $download_sheet = rwmb_meta('wiocc-download_file');
               // var_dump($download_sheet);
                ?>
                <div class="row solution-icons-container">
                    <div class="solution-icons">
                        <h4><?php pll_e('OUR SOLUTIONS'); ?></h4>
                        <ul class="solution-icons-tab section-right">
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
                <?php  if (!empty($download_sheet)): ?>
                    <a target="" href=" " class="cta download-sheet"><?php pll_e('Download Product Guide'); ?>
                        <span></span></a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    </div>


<?php

endwhile; // End of the loop.
?>


<?php
get_footer();
