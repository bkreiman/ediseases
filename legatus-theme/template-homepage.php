<?php
/*
Template Name: Drag & Drop Page Builder
*/	
?>
<?php get_header(); ?>
<?php

	wp_reset_query();
	global $post;
	
	//blocks
	$homepage_layout_order = get_option(THEME_NAME."_homepage_layout_order_".$post->ID);
	//duplicate
	$duplicate = get_option(THEME_NAME."_duplicate");
?>
<?php get_template_part(THEME_LOOP."loop-start"); ?>
<?php get_template_part(THEME_SLIDERS."main-slider"); ?>
	<?php get_template_part(THEME_SINGLE."page-title"); ?>
	<?php 
		if(get_the_content()) {
			the_content();
		} 

		if($duplicate=="on") {
			global $OTduplicate,$OTduplicateArray;
			$OTduplicateArray = array();
			$OTduplicate = true;
		} else {
			global $OTduplicate;
			$OTduplicate = false;
		}

		$OT_builder = new OT_home_builder;  
		if(is_array($homepage_layout_order)) {
			foreach($homepage_layout_order as $blocks) { 
				$blockType = $blocks['type'];
				$blockId = $blocks['id'];
				$blockInputType = $blocks['inputType'];
				if(is_callable(array($OT_builder,$blockType))) {
					$block = $OT_builder->$blockType($blockType, $blockId,$blockInputType);
					get_template_part(THEME_HOME_BLOCKS.$block);
				} else {
					_e("Seems that this block doesn't exist anymore, please remove it, and try to add a new.",'legatus-theme');
				}
			}
		}
	?> 
<?php get_template_part(THEME_LOOP."loop-end"); ?>
<?php get_footer();?>