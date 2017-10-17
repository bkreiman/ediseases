<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	wp_reset_query();


		

	//sidebars
	$sidebar = get_post_meta ( ot_page_id(), "_".THEME_NAME."_sidebar_select", true ); 
	$sidebarPosition = get_option ( THEME_NAME."_sidebar_position" ); 
	$sidebarPositionCustom = get_post_meta ( ot_page_id(), "_".THEME_NAME."_sidebar_position", true ); 


	if(is_category()) {
		$catID = get_cat_id( single_cat_title("",false) );
		//sidebars
		$sidebar = ot_get_option ( $catID, "sidebar_select", false ); 
		$sidebarPositionCustom = ot_get_option ( $catID, "sidebar_position", false ); 
	} elseif(is_tax()){
		$sidebar = ot_get_option ( get_queried_object()->term_id, "sidebar_select", false );
		$sidebarPositionCustom = ot_get_option ( get_queried_object()->term_id, "sidebar_position", false );
	}

	if(is_search()) {
		$sidebarPosition = "right";
	}
?>


			<!-- BEGIN .content -->
			<div class="content">
				
				<!-- BEGIN .wrapper -->
				<div class="wrapper">
					<?php 
						if(is_page_template( "template-homepage.php" )) {
							get_template_part(THEME_SLIDERS."breaking-news"); 
						}
					?>	
					<?php 
						if( $sidebarPosition == "left" || ( $sidebarPosition == "custom" && $sidebarPositionCustom == "left") ) { 
							get_template_part(THEME_INCLUDES."sidebar");
						}
					?>

					<!-- BEGIN .main-content-left -->
					<div class="main-content-<?php if($sidebar!='off') { echo "left"; } else { echo "full" ;} ?>">
						<?php get_template_part(THEME_INCLUDES.'social'); ?>
						<?php wp_reset_query();  ?>