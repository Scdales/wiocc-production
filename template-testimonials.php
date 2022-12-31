<?php
/*
Template Name: Testimonials
*/
get_header();
$testimonials_args = array( 'post_type' => 'testimonial', 'posts_per_page' => 10, 'category_name' => 'about-us' );
$testimonials_loop = new WP_Query( $testimonials_args);
?>


<div class="page-banner"
     style="background-image: url('<?php get_meta_image( rwmb_meta( 'wiocc-banner_image', array( 'size' => 'full' ) ) ) ?>">
    <div class="wrap">
        <h2><?php the_title() ?></h2>
    </div>
</div>
<div class="wrap" style="margin-top: 5%">
    <?php if($testimonials_loop->have_posts()): while ( $testimonials_loop->have_posts() ) : $testimonials_loop->the_post(); ?>
<div class="single-news">
    <div class="news-left">
        <?php
        if(!empty(rwmb_meta( 'wiocc-testimonial_video_url'))){
            $video = rwmb_meta( 'wiocc-testimonial_video_url');
            echo $video;

        }else{
            ?>
            <img src="<?php echo the_post_thumbnail_url('full'); ?>" alt="">
            <?php
        }
        ?>
    </div>
     <div class="news-right">
     <div class=" news-excerpt">
         <h3 class="news-title"><?php the_title();?></h3>
         <p> <?php the_content(); ?></p>
<!--         <a class="cta" href="--><?php //the_permalink()?><!--"> Read More</a>-->
     </div></div>

</div>
    <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>

