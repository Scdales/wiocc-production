<?php
/*
Template Name: Search Results Page
*/
get_header();
?>
<?php

$testimonial_args = array( 'post_type' => 'testimonial', 'posts_per_page' => 10 );
$testimonial_loop = new WP_Query( $testimonial_args );


?>

<div class="page-banner"
	 style="background-image: url('<?php get_meta_image( rwmb_meta( 'wiocc-banner_image', array( 'size' => 'full' ) ) ) ?>">
	<div class="wrap">
		<h2><?php the_title() ?></h2>
	</div>
</div>

<div class="section search-results">
	<div class="wrap">
		<div class="search-result-left">
			<h3 class="search-heading"><?php  pll_e('Search Results for:'); ?> <span> <?php pll_e('WIOCC'); ?></span></h3>
			<div class="single-result">
				<h4 class="entry-title">
					<a href=""><?php  pll_e('WIOCC delivers connectivity you can trust'); ?></a>
				</h4>
				<div class="entry-summary">
					<p><?php pll_e('We bring the world to Africa with flexible, diversity-rich, tailored solutions that meet our clients’ evolving needs[...]'); ?></p>
					<a class="results-cta" href=""><?php  pll_e('Read more'); ?>'</a>
				</div>
			</div>

			<div class="single-result">
				<h4 class="entry-title">
					<a href=""><?php  echo __('WIOCC delivers connectivity you can trust'. 'wiocc'); ?></a>
				</h4>
				<div class="entry-summary">
					<p><?php  echo __('We bring the world to Africa with flexible, diversity-rich, tailored solutions that meet our clients’ evolving needs[...]', 'wiocc'); ?></p>
					<a class="results-cta" href=""><?php echo __('Read more', 'wiocc'); ?></a>
				</div>
			</div>

			<div class="single-result">
				<h4 class="entry-title">
					<a href="">WIOCC delivers connectivity you can trust</a>
				</h4>
				<div class="entry-summary">
					<p>We bring the world to Africa with flexible, diversity-rich, tailored solutions that meet our clients’ evolving needs[...]</p>
					<a class="results-cta" href="">Read more</a>
				</div>
			</div>

			<div class="single-result">
				<h4 class="entry-title">
					<a href="">WIOCC delivers connectivity you can trust</a>
				</h4>
				<div class="entry-summary">
					<p>We bring the world to Africa with flexible, diversity-rich, tailored solutions that meet our clients’ evolving needs[...]</p>
					<a class="results-cta" href="">Read more</a>
				</div>
			</div>

			<div class="single-result">
				<h4 class="entry-title">
					<a href="">WIOCC delivers connectivity you can trust</a>
				</h4>
				<div class="entry-summary">
					<p>We bring the world to Africa with flexible, diversity-rich, tailored solutions that meet our clients’ evolving needs[...]</p>
					<a class="results-cta" href="">Read more</a>
				</div>
			</div>

			<div class="single-result">
				<h4 class="entry-title">
					<a href="">WIOCC delivers connectivity you can trust</a>
				</h4>
				<div class="entry-summary">
					<p>We bring the world to Africa with flexible, diversity-rich, tailored solutions that meet our clients’ evolving needs[...]</p>
					<a class="results-cta" href="">Read more</a>
				</div>
			</div>
		</div>



		<div class="search-results-right">
			<h4>Related articles</h4>
			<ul>
				<li>
					<a href="">FAQs</a>
				</li>

				<li>
					<a href="">Download Centre</a>
				</li>
			</ul>
		</div>
	</div>
</div>


<?php get_footer() ?>
