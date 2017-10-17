<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	wp_reset_query();
	$post_type = get_post_type();


	//sidebars
	$sidebarPosition = get_option ( THEME_NAME."_sidebar_position" ); 
	$sidebarPositionCustom = get_post_meta ( get_the_ID(), THEME_NAME."_sidebar_position", true ); 


	if(is_category()) {
		$catID = get_cat_id( single_cat_title("",false) );
		//sidebars
		$sidebarPositionCustom = ot_get_option ( $catID, "sidebar_position", false ); 
	} elseif(is_tax()){
		$sidebarPositionCustom = ot_get_option ( get_queried_object()->term_id, "sidebar_position", false );
	}

	if(is_search()) {
		$sidebarPosition = "right";
	}
?>
					<!-- END .main-content-left -->
					</div>

					<?php 
						if( $sidebarPosition == "right" || ( $sidebarPosition == "custom" &&  $sidebarPositionCustom == "right") ) { 
							get_template_part(THEME_INCLUDES."sidebar");
						} else if ( $sidebarPosition == "custom" && !$sidebarPositionCustom ) {
							get_template_part(THEME_INCLUDES."sidebar");
						}
						
					?>

					<div class="clear-float"></div>
					
				<!-- END .wrapper -->
				</div>
				
			<!-- BEGIN .content -->
			</div>

				