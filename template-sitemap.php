<?php
/*
Template Name: Site Map
*/
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
         style="background-image: url('<?php get_meta_image( rwmb_meta( 'wiocc-banner_image', array( 'size' => 'full' ) ) ) ?>">
        <div class="wrap">
            <h2><?php the_title() ?></h2>
        </div>
    </div>
<div class="site-map wrap">
<table >
    <tr>

        <td>
            <h4><?php  pll_e('About WIOCC'); ?></h4>
            <?php wp_nav_menu(
                array(
                    'container_class' => null,
                    'menu_class' => 'footer-menu',
                    'container ' => 'ul',
                    'theme_location' =>'sitemap-1',
                ) ) ?></td>
        <td>
            <h4><?php  pll_e('Clients and Solutions'); ?></h4>
            <?php wp_nav_menu(
                array(
                    'container_class' => null,
                    'menu_class' => 'footer-menu',
                    'container ' => 'ul',
                    'theme_location' =>'sitemap-2',
                ) ) ?></td>
        <td>
            <h4><?php  pll_e('Other Pages'); ?></h4>
            <?php wp_nav_menu(
                array(
                    'container_class' => null,
                    'menu_class' => 'footer-menu',
                    'container ' => 'ul',
                    'theme_location' =>'sitemap-3',
                ) ) ?></td>
    </tr>
</table>

</div>



<?php
get_footer();

