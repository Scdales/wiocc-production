<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Nairobits_Theme
 */

get_header('error' );
?>

<div class="error-page">
	<div class="display-table">
		<div class="vertical-align">
			<div class="wrap">
				<div class="error-left">
					<img src="<?php echo get_template_directory_uri()?>/images/404.png" alt="">
				</div>
				<div class="error-right">
					<h1>404</h1>
					<h3><?php pll_e('Oops Page Not Found'); ?></h3>
					<p><?php pll_e('The page you are looking for does not exist or has been moved.'); ?></p>
					<a href="<?php echo site_url()?>" class="cta"><?php  pll_e('Go to Home'); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>

