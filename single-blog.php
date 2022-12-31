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
    <div class="page-banner"
         style="background-image: url('<?php echo get_template_directory_uri()?>/images/Blog1.jpg"">
        <div class="wrap">
            <h2><?php  pll_e('Blog'); ?></h2>
        </div>
    </div>
    <div class="section single-news-page">
        <div class="wrap">

                <div class="content-place">
                    <?php
                    while ( have_posts() ) :
                        the_post();?>
                        <div class="text-sheet">
                            <?php if(empty( get_the_post_thumbnail_url())){
                                $display="none";
                            }else{
                                $display="solid";
                            }?>
                            <div class="featured-banner" style="display:<?php echo $display;?>">
                                <img src="<?php echo get_the_post_thumbnail_url(null,'full')?>" alt="">
                                <!--						<div class="caption"><strong>Eric Handa</strong>, CEO, APTelecom</div>-->
                            </div>

                            <div class="news-date">
                                <?php the_time('l, F jS, Y') ?>
                            </div>
                            <h3 class="news-title"><?php the_title()?> </h3>

                            <?php the_content() ?>

                        </div>
                    <?php
                    endwhile; // End of the loop.
                    ?>
                </div>



            <div class="aside">
                <h2><?php  pll_e('More News'); ?></h2>
                <?php
                $related_args = array( 'post_type'      => 'blog',
                    'posts_per_page' => 4,
                    'post__not_in'   => array( get_the_ID() )
                );
                $related_loop = new WP_Query( $related_args );

                ?>
                <?php while ( $related_loop->have_posts() ) : $related_loop->the_post(); ?>
                    <div class="single-news">
                        <?php if (has_post_thumbnail()):?>
                            <div class="news-img">
                                <img src="<?php the_post_thumbnail_url( 'news' ) ?>" alt="<?php the_title() ?>">
                            </div>
                        <?php endif;?>
                        <div class="news-date">
                            <?php the_time('l, F jS, Y') ?>
                        </div>
                        <a href="<?php the_permalink() ?>" class="news-excerpt">
                            <h4><?php the_title() ?></h4>
                        </a>
                    </div>

                <?php endwhile; ?>
                <?php wp_reset_query() ?>
            </div>

        </div>
    </div>
<?php

get_footer();
