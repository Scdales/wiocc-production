<?php
/*
Template Name: Board Of Directors Page
*/
get_header();
?>
<?php

$chairperson_args = array( 'post_type' => 'director', 'posts_per_page' => 400,
							'orderby' => 'post_title',
							'order' => 'ASC',
                           'meta_query'  => array(
	                           array(
		                           'key' => 'wiocc-featured',
								   'value' => '1'
	                           )
                           )
);
$chairperson_loop = new WP_Query( $chairperson_args );


$director_args = array( 'post_type' => 'director', 'posts_per_page' => 400,
                        'meta_query'  => array(
	                        array(
		                        'key' => 'wiocc-featured',
		                        'value' => '0',
	                        )
                        )
);
$director_loop = new WP_Query( $director_args );

?>

<div class="page-banner"
     style="background-image: url('<?php echo get_template_directory_uri() ?>/images/directors.jpg')">
	<div class="wrap">
		<h2> <?php pll_e('Board Members'); ?></h2>
	</div>
</div>

<div class="section directors">
	<div class="wrap">
		<div class="excerpt">
			<?php the_content()?>
		</div>
		<div class="chairperson">
		<?php while ( $chairperson_loop->have_posts() ) : $chairperson_loop->the_post(); ?>
				<div class="board-member">
					<div class="board-img">
						<img src="<?php echo the_post_thumbnail_url()?>" alt="">
						<div class="member-detail">
							<h4><?php the_title() ?></h4>
							<p><?php echo rwmb_meta( 'wiocc-title' ) ?></p>
						</div>
					</div>
					<div class="affiliate-logo">
						<img src="<?php get_meta_image( rwmb_meta( 'wiocc-company_logo', array( 'size' => 'full' ) )) ?>" alt="">
					</div>
				</div>
		<?php endwhile;?>
		</div>
		<div class="board-listing">
			<h2><?php pll_e('Board Members'); ?></h2>
			<div class="full-width">
				<?php while ( $director_loop->have_posts() ) : $director_loop->the_post(); ?>
					<div class="bod-member">
						<div class="member-profile">
						    <div class="member-profile-img-container">
							    <img src="<?php echo the_post_thumbnail_url()?>" alt="">
							</div>
							<div class="member-detail">
								<h4><?php the_title() ?></h4>
								<p><?php echo rwmb_meta( 'wiocc-title' ); if(!empty(rwmb_meta('wiocc-company'))){echo ',';}else{}?> <br><?php echo rwmb_meta( 'wiocc-company' ) ?></p>
							</div>
						</div>
						<div class="previous-company">
							<img src="<?php get_meta_image( rwmb_meta( 'wiocc-company_logo', array( 'size' => 'full' ) )) ?>" alt="">
						</div>
					</div>
				<?php endwhile;?>
			</div>
		</div>


	</div>
</div>

<?php get_footer() ?>
