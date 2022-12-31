<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wiocc_Beverages_Theme
 */
$options = get_option( 'wioocc_settings' );
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-145165885-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-145165885-1');
</script>

    <meta charset="UTF-8">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport"
	      content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no"/>
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!--[if lt IE 8]>
	<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri()?>/images/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri()?>/images/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri()?>/images/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri()?>/images/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri()?>/images/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri()?>/images/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri()?>/images/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri()?>/images/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri()?>/images/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri()?>/images/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri()?>/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri()?>/images/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri()?>/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#283a86">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/main.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/app.css">


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="landscape-msg">
	<div class="display-table">
		<div class="vertical-align">
			<p>
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/landscapeicon.png" alt="Landscape" />
				<?php  pll_e('This site is best viewed in portrait mode.'); ?> <br> <?php pll_e('Please adjust your orientation.'); ?>
			</p>
		</div>
	</div>
</div>


<div class="navi-container">
	<div class="mobilemenu">
		<div class="mobile-search">
			<form action="<?php echo site_url() ?>"  method="get" class="clearfloat">
				<div class="input-icon">
					<input type="submit" value="Search" id="profile" class="search-btn">
					<label for="profile" class="search-icon">
						<i class="fa fa-search"></i>
					</label>
				</div>

				<div class="input-side">
					<input autofocus="" type="text" placeholder="Search..." name="s" id="search-input">
				</div>
			</form>
		</div>
		<?php wp_nav_menu(
			array(
				'container_class' => 'mobile-navigation',
				'menu_class' => 'mobi-nav',
				'container ' => 'ul',
				'theme_location' =>
					'menu-1',
				'walker' => new Wiocc_Mobile_Walker_Nav()
			) ) ?>

		<div class="mobile-lang-select">
			<?php dynamic_sidebar( 'mobile-menu-lang-switcher' ); ?>
		</div>
	</div>
</div>

<div class="main-container">
	<div class="menu-open-over"></div>
	<div class="header">
		<div class="wrap">
			<a href="<?php echo site_url() ?>" class="logo">
				<!--<img src="<?php echo get_template_directory_uri()?>/images/wiocc.png" alt="">-->
                <img src="<?php echo get_template_directory_uri()?>/images/WIOCC_Logo_2022_REV.png" alt="">
			</a>

			<div class="menu-trigger">
				<span class="menu-txt"><?php   pll_e('MENU');?></span>
				<i class="fa fa-bars" aria-hidden="true"></i>
			</div>

			<div class="utilities">
	<!--			<ul class="utility-nav">-->
	<!--				<li><a href="">Client Portal</a></li>-->
	<!--			</ul>-->
				<?php dynamic_sidebar( 'main-menu-lang-switcher' ); ?>
				<div class="search-trigger">
					<a class="cd-search-trigger" href="javascript:void(0);">Search<span></span></a>
				</div>

				<?php $meta_menu = wp_get_nav_menu_items('header-meta');

				$locations = get_nav_menu_locations();
				$menu = wp_get_nav_menu_object( $locations['header-meta'] );
				if($menu != null) {
					$menuitems = wp_get_nav_menu_items( $menu->term_id);

					if($menuitems != null && count($menuitems) > 0) {
						foreach ($menuitems as $meta_item) { ?>
						<!-- covid 19 update -->
							<!--<a href="<?php echo $meta_item->url; ?>" class="header-meta-link"><?php echo $meta_item->title; ?></a>-->
						<?php }
					}
				} ?>
			</div>

			<?php wp_nav_menu(
			array(
				'container_class' => 'nav-container',
				'menu_class' => 'main-menu',
				'container ' => 'ul',
				'theme_location' =>
					'menu-1',
				'walker' => new Wiocc_Walker_Nav()
			) ) ?>
		</div>
	</div>

	<div class="search-main" style="display: inline-block;">
		<div class="search-wrap">
			<form role="search" class="searchform" action="<?php get_search_link(  ); ?>" method="get" class="clearfloat">

				<div class="input-side">
					<input class="search_input" autofocus="" type="text" placeholder="" name="s" id="search" value="<?php the_search_query(); ?>">
				</div>
                <div class="input-icon">
                    <input class="input-search-icon search-icon" type="submit" value="Search" id="profile" class="search-btn">

<!--                    <label for="profile" class="search-icon">-->
<!--                        <i class="fa fa-search"></i>-->
<!--                    </label>-->
                </div>

            </form>
		</div>
	</div>

	<div class="search-overlay"></div>

