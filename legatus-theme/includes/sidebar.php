<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	global $wp_query;
	wp_reset_query();
	
	//sidebars
	$sidebarType = get_option(THEME_NAME.'_sidebar_type');
	$sidebarTypeSingle = get_post_meta( OT_page_ID(), "_".THEME_NAME.'_sidebar_type', true );
	$sidebarPositionCustom = get_post_meta ( OT_page_ID(), "_".THEME_NAME."_sidebar_position", true ); 
	$sidebarPosition = get_option ( THEME_NAME."_sidebar_position" ); 

	$sidebar = get_post_meta( OT_page_ID(), "_".THEME_NAME.'_sidebar_select', true );
	$sidebarLeft = get_post_meta( OT_page_ID(), "_".THEME_NAME.'_sidebar_select_left', true );
	$sidebarRight = get_post_meta( OT_page_ID(), "_".THEME_NAME.'_sidebar_select_right', true );




	if(is_category()) {
		$sidebar = ot_get_option(get_cat_id( single_cat_title("",false) ), 'sidebar_select', false);
		$sidebarRight = ot_get_option(get_cat_id( single_cat_title("",false) ), 'sidebar_select_right', false);
		$sidebarLeft =ot_get_option(get_cat_id( single_cat_title("",false) ), 'sidebar_select_left', false);
		$sidebarTypeSingle = ot_get_option(get_cat_id( single_cat_title("",false) ), 'sidebar_type', false);
		$sidebarPositionCustom = ot_get_option ( get_cat_id( single_cat_title("",false) ), "sidebar_position", false ); 
	} elseif(is_tax()) {
		$sidebar = ot_get_option(get_queried_object()->term_id, 'sidebar_select', false);
		$sidebarRight = ot_get_option(get_queried_object()->term_id, 'sidebar_select_right', false);
		$sidebarLeft = ot_get_option(get_queried_object()->term_id, 'sidebar_select_left', false);
		$sidebarTypeSingle = ot_get_option(get_queried_object()->term_id, 'sidebar_type', false);
		$sidebarPositionCustom = ot_get_option ( get_queried_object()->term_id, "sidebar_position", false );
	}

	if($sidebar=='' && function_exists('is_woocommerce') && is_woocommerce()) {
		$sidebar = 'ot_woocommerce';
		$sidebarType = 1;
	}
	if($sidebar=='' && function_exists("is_bbpress") && is_bbpress()) {
		$sidebar = 'ot_bbpress';
		$sidebarType = 1;
	}

	if($sidebar=='' && function_exists("is_buddypress") && is_buddypress()) {
		$sidebar = 'ot_buddypress';
		$sidebarType = 1;
	}
	
	
	if($sidebarType=='custom') {
		$sidebarType = $sidebarTypeSingle;
	}

	if ( $sidebar=='' ) {
		$sidebar='default';
	}	
	if ( $sidebarLeft=='' ) {
		$sidebarLeft='default_left';
	}
	if ( $sidebarRight=='' ) {
		$sidebarRight='default_right';
	}


	if($sidebar!="off") {
?>

				<?php if(!$sidebarType || $sidebarType!=0) { ?>
					<!-- BEGIN .main-content-right -->
					<div class="main-content-right<?php if($sidebarPositionCustom == "left" || $sidebarPosition == "left") { echo " sidebar-left"; } ?>">

						<?php if($sidebarType=="1" || !$sidebarType) { ?>
							<!-- BEGIN .main-nosplit -->
							<div class="main-nosplit">
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar) ) : ?>
								<?php endif; ?>
							<!-- END .main-nosplit -->
							</div>
						<?php } ?>
						<?php if($sidebarType=="2") { ?>
							<!-- BEGIN .main-content-split -->
							<div class="main-content-split">

								<!-- BEGIN .main-split-left -->
								<div class="main-split-left">
									<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebarLeft) ) : ?>
									<?php endif; ?>
								</div>

								<!-- BEGIN .main-split-right -->
								<div class="main-split-right">
									<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebarRight) ) : ?>
									<?php endif; ?>
								</div>

							<!-- END .main-content-split -->
							</div>
						<?php } ?>
						<?php if($sidebarType=="3") { ?>
							<!-- BEGIN .main-content-split -->
							<div class="main-content-split">
								<!-- BEGIN .main-split-left -->
								<div class="main-split-left">
									<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebarLeft) ) : ?>
									<?php endif; ?>
								</div>
								<!-- BEGIN .main-split-right -->
								<div class="main-split-right">
									<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebarRight) ) : ?>
									<?php endif; ?>
								</div>
							<!-- END .main-content-split -->
							</div>
							
							<!-- BEGIN .main-nosplit -->
							<div class="main-nosplit">
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar) ) : ?>
								<?php endif; ?>
							<!-- END .main-nosplit -->
							</div>
						<?php } ?>
						<?php if($sidebarType=="4") { ?>
							
							<!-- BEGIN .main-nosplit -->
							<div class="main-nosplit">
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar) ) : ?>
								<?php endif; ?>
							<!-- END .main-nosplit -->
							</div>

							<!-- BEGIN .main-content-split -->
							<div class="main-content-split">

								<!-- BEGIN .main-split-left -->
								<div class="main-split-left">
									<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebarLeft) ) : ?>
									<?php endif; ?>
								</div>

								<!-- BEGIN .main-split-right -->
								<div class="main-split-right">
									<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebarRight) ) : ?>
									<?php endif; ?>
								</div>

							<!-- END .main-content-split -->
							</div>

						<?php } ?>
					<!-- END .main-content-right -->
					</div>
				<?php } ?>
	<?php } ?>