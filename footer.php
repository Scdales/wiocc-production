<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wiocc_Theme
 */

?>
<div class="footer">
	<div class="upper-footer">
		<div class="wrap">
			<h4><?php  pll_e('Useful Links'); ?></h4>
			<div class="footer-wrap">
				<div class="footer-col">
					<?php wp_nav_menu(
						array(
							'container_class' => null,
							'menu_class' => 'footer-menu',
							'container ' => 'ul',
							'theme_location' =>'footer-1',
						) ) ?>

				</div>

				<div class="footer-col">
					<?php wp_nav_menu(
						array(
							'container_class' => null,
							'menu_class' => 'footer-menu',
							'container ' => 'ul',
							'theme_location' =>'footer-2',
						) ) ?>
				</div>

				<div class="footer-col">
					<?php wp_nav_menu(
						array(
							'container_class' => null,
							'menu_class' => 'footer-menu',
							'container ' => 'ul',
							'theme_location' =>'footer-3',
						) ) ?>
				</div>
			</div>
		</div>
        
		<!--<div class="wrap">-->
	 <!--       <h4 style="margin-top: 40px;margin-bottom: unset"><?php  pll_e('Memberships & Awards'); ?></h4>-->
		<!--</div>-->
	</div>

	<!--<div class="footer-partners-and-awards">-->
 <!--       <?php echo do_shortcode('[smartslider3 slider="2"]'); ?>-->
 <!--   </div>-->

	<div class="lower-footer">
		<div class="wrap">

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

			<div class="footer-links">
                <?php
                $privacy_page_link = get_permalink( 76 );
                $terms_link = get_permalink( 70 );
                ?>
				<a href="<?php echo $privacy_page_link;?>"><?php pll_e('Privacy Policy'); ?></a>
				<a href="<?php echo  $terms_link ;?>"> <?php pll_e('Terms &amp; Conditions'); ?></a>
			</div>

			<div class="copyright">
				&copy <?php pll_e('Copyright'); ?> <?php echo date('Y')?> | <?php pll_e('All rights reserved'); ?>
			</div>
		</div>
	</div>

</div>
</div>
<!--footer markup goes here-->
<?php wp_footer(); ?>

</body>
</html>

