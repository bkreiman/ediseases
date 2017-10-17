<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


	$page_layout = get_option(THEME_NAME."_page_layout");

	//logo settings
	$logo = get_option(THEME_NAME.'_logo');	

	$search = get_option(THEME_NAME.'_search');	

	//top banner	
	$topBanner = get_option(THEME_NAME."_top_banner");
	$topBannerCode = get_option(THEME_NAME."_top_banner_code");

	//fixed menu
	$menuStyle = get_option(THEME_NAME."_menu_style");

	$weatherSet = get_option(THEME_NAME."_weather");
	$weather = OT_weather_forecast($_SERVER['REMOTE_ADDR']);


	// header social icons
	$socialHeader = get_option(THEME_NAME."_social_header");


	$vimeo = get_option(THEME_NAME."_vimeo");
	$twitter = get_option(THEME_NAME."_twitter");
	$facebook = get_option(THEME_NAME."_facebook");
	$googlepluss = get_option(THEME_NAME."_googlepluss");
	$pinterest = get_option(THEME_NAME."_pinterest");
	$tumblr = get_option(THEME_NAME."_tumblr");
	$linkedin = get_option(THEME_NAME."_linkedin");
	$dribbble = get_option(THEME_NAME."_dribbble");
	$soundcloud = get_option(THEME_NAME."_soundcloud");

?>
		<!-- BEGIN .boxed -->
		<div class="boxed<?php echo $page_layout=="boxed" ? " active" : false; ?>">
			
			<!-- BEGIN .header -->
			<div class="header">

				<!-- BEGIN .header-very-top -->
				<div class="header-very-top">

					<!-- BEGIN .wrapper -->
					<div class="wrapper">

						<div class="left">
							<?php

								if ( function_exists( 'register_nav_menus' )) {
									$walker = new OT_Walker_Top;
									$args = array(
										'container' => '',
										'theme_location' => 'top-menu',
										'items_wrap' => '<ul class="ot-menu very-top-menu load-responsive" rel="'.__("Top Menu",'legatus-theme').'"><li><a href="'.home_url().'" class="icon-text"><i class="fa fa-home"></i></a></li>%3$s</ul>',
										'depth' => 3,
										'walker' => $walker,
										"echo" => false
									);
												
												
									if(has_nav_menu('top-menu')) {
										echo wp_nav_menu($args);		
									}		

								}	

							?>

						</div>

						<?php if($weatherSet=="on") { ?>
								<?php if(!isset($weather['error'])) { ?>
									<div class="right">
										<div class="weather-report">
											<span><?php _e("Weather",'legatus-theme');?></span>
											<b><?php echo $weather['country'].', '.$weather['city'];?></b>
											<img src="<?php echo THEME_IMAGE_URL.$weather['image'];?>.png" alt="<?php echo $weather['country'].', '.$weather['city'];?>" />

											<font class="weather-meter" style="background: <?php echo $weather['color'];?>;"><?php echo $weather['temp_'.get_option(THEME_NAME."_temperature")];?></font>

										</div>
									</div>
								<?php 
									} else { 
										echo $weather['error'];
									} 
								?>
							<?php } ?>

						<div class="clear-float"></div>
						
					</div>
					<div class="double-split"></div>
				<!-- END .header-very-top -->
				</div>

				<!-- BEGIN .header-middle -->
				<div class="header-middle">
					<div class="wrapper">
						<?php if($logo) { ?>
							<div class="logo-image">
								<h1><?php bloginfo('name'); ?></h1>
								<a href="<?php echo home_url(); ?>"><img class="logo" src="<?php echo $logo;?>" alt="<?php bloginfo('name'); ?>" /></a>
							</div>
						<?php } else { ?>
							<div class="logo-text">
								<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
							</div>
						<?php } ?>

						<?php if($topBanner=="on") { ?>

							<div class="banner">
								<div class="banner-block">
									<?php echo do_shortcode(stripslashes($topBannerCode));?>
								</div>

								<?php if (is_pagetemplate_active("template-contact.php")) { ?>
								<?php $contactID = ot_get_page('contact'); ?>
									<div class="banner-info">
										<a href="<?php echo get_page_link($contactID[0]);?>" class="sponsored"><span class="icon-default">&nbsp;</span><?php _e("Sponsored Advert",'legatus-theme');?><span class="icon-default">&nbsp;</span></a>
									</div>
								<?php } ?>
							</div>

						<?php } ?>

						<div class="clear-float"></div>
						
					</div>
				<!-- END .header-middle -->
				</div>

				<!-- BEGIN .header-menu -->
				<div class="header-menu<?php if($menuStyle=='on') { echo ' thisisfixed'; } ?>">
					<div class="wrapper">
						<?php	
			
							wp_reset_query();
							if ( function_exists( 'register_nav_menus' )) {
								$walker = new OT_Walker;
								$args = array(
									'container' => '',
									'theme_location' => 'middle-menu',
									'items_wrap' => '<ul class="%2$s main-menu" >%3$s</ul>',
									'depth' => 3,
									"echo" => false,
									'walker' => $walker
								);
											
											
								if(has_nav_menu('middle-menu')) {
									echo wp_nav_menu($args);		
								} else {
									echo "<ul class=\"main-menu\"><li class=\"navi-none\"><a href=\"".admin_url("nav-menus.php") ."\">Please set up ".THEME_FULL_NAME." menu!</a></li></ul>";
								}		

							}
						?>

						<?php if($search=="on") { ?>
							<div class="right menu-search">
								<form method="get" action="<?php echo site_url(); ?>" name="searchform" >
									<input type="text" value="" placeholder="<?php _e("Search something..",'legatus-theme');?>" name="s" id="s"/>
									<input type="submit" class="search-button" value="&nbsp;" />
								</form>
							</div>
						<?php } ?>

						<div class="clear-float"></div>

					</div>
				<!-- END .header-menu -->
				</div>

				<!-- BEGIN .header-undermenu -->
				<div class="header-undermenu">
					<div class="wrapper">
							<?php

								if ( function_exists( 'register_nav_menus' )) {
									$args = array(
										'container' => '',
										'theme_location' => 'third-menu',
										"link_before" => '<i>',
										"link_after" => '</i>' ,
										'items_wrap' => '<ul class="secondary-menu" >%3$s</ul>',
										'depth' => 1,
										"echo" => false
									);
												
												
									if(has_nav_menu('third-menu')) {
										echo wp_nav_menu($args);		
									}		

								}	

							?>
						
						<div class="clear-float"></div>

					</div>
				<!-- END .header-undermenu -->
				</div>
				
			<!-- END .header -->
			</div>

<?php wp_reset_query();

if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<div class="wrapper"><p id="breadcrumbs">','</p></div><br>');
}
 ?>
