<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Wiocc_Theme
 */

get_header();
?>
	<div class="page-banner"
	     style="background-image: url('<?php get_meta_image( rwmb_meta( 'wiocc-banner_image', array( 'size' => 'full' ) ) ) ?>">
		<div class="wrap">
			<h2><?php  pll_e('SEARCH RESULTS');?></h2>
		</div>
	</div>
	<div class="section search-results">
		<div class="wrap">
			<div class="search-result-left">

			<?php if ( have_posts() ) : ?>

				<h3 class="search-heading">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'wiocc' ), '<span>' . get_search_query() . '</span>' );
						?>

				</h3>

				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

				?>
					<div class="single-result">
						<h4 class="entry-title">
							<a href=""><?php the_title() ?></a>
						</h4>
						<div class="entry-summary">
							<?php the_excerpt() ?>
							<a class="results-cta" href="<?php the_permalink() ?>">Read more</a>
						</div>
					</div>
				<?php
					//get_template_part( 'template-parts/content', 'search' );

				endwhile;

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
		</div>


				<?php dynamic_sidebar( 'search-result' ); ?>

		</div>
	</div>

<?php

get_footer();
