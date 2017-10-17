<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	wp_reset_query();

	//braking slider		
	$breakingSlider = get_post_meta( ot_page_id(), "_".THEME_NAME.'_breaking_slider', true );

	if(is_category()) {
		$breakingSliderCat = ot_get_option( get_cat_id( single_cat_title("",false) ), 'breaking_slider', false );
	}

	//breaking news option to show custom posts or all
	$breakingNewsType = get_option(THEME_NAME."_breakingNewsType");

	//breaking news slider option for single post show/hide or custom for each post
	$breakingSingle = get_option(THEME_NAME."_breaking_single");

?>
<?php if((($breakingSingle=='custom' && is_single() && get_post_type() == "post" && ot_page_id()!=get_option('page_for_posts')) && (is_array($breakingSlider) && !empty($breakingSlider) && !in_array("slider_off",$breakingSlider)))
 			|| ($breakingSingle=='show' && is_single() && get_post_type() == "post" && ot_page_id()!=get_option('page_for_posts')) 
 			|| (is_array($breakingSlider) && !empty($breakingSlider) && !in_array("slider_off",$breakingSlider) && (get_post_type() != "post" || ot_page_id()==get_option('page_for_posts'))) 
 			|| (is_category() && $breakingSliderCat=="show")
 			|| ($breakingSingle=='show' && is_page_template( "template-homepage.php" ))
 		) { 
 ?>
	<?php

		$args=array(
			'posts_per_page' => get_option(THEME_NAME."_breaking_slider_count"),
			'order'	=> 'DESC',
			'orderby'	=> 'date',
			'post_type'	=> 'post',
			'ignore_sticky_posts '	=> 1,
			'post_status '	=> 'publish'
		);

	
		if(($breakingSingle=='show' && is_single() && get_post_type() == "post" && ot_page_id()!=get_option('page_for_posts'))
			|| ($breakingSingle=='show' && is_page_template( "template-homepage.php" ) ) ) {
			$breakingSlider = get_option(THEME_NAME."_breaking_single_cat");
			if(is_array($breakingSlider) && !empty($breakingSlider) && !in_array("slider_off",$breakingSlider)) {
				$args['category__in'] = get_option(THEME_NAME."_breaking_single_cat");
			} else {
				$args['category__in'] = array(1231313); //false category
			}
		} else {
			if(is_category()) {
				$catId = get_cat_id( single_cat_title("",false) );
				$args['category__in'] = $catId;
			} else {
				$args['category__in'] = $breakingSlider;
			}
		}

		if($breakingNewsType == "custom") {
			$args['meta_key'] = "_".THEME_NAME.'_breaking_post';
			$args['meta_value'] = 'on';
		}

		$the_query = new WP_Query($args);

		if(is_category()) {
			//custom colors
			$catId = get_cat_id( single_cat_title("",false) );
			$titleColor = ot_title_color($catId, "category", false);
		} else {
			$titleColor = false;
		}
	?>

					<!-- BEGIN .breaking-news -->
					<div class="breaking-news"<?php if(!is_page_template( "template-homepage.php" )) {?> style="margin-top:-15px;"<?php } ?>>
						
						<div class="breaking-title"<?php if($titleColor) { ?> style="background:<?php echo $titleColor;?>;"<?php } ?>><span class="breaking-icon">&nbsp;</span><b><?php _e("Breaking News",'legatus-theme');?></b><div class="the-corner"></div></div>

						<div class="breaking-block">
							<ul>
								
								<?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>

								<li>
									<a href="<?php the_permalink();?>"<?php if($titleColor) { ?> style="color:<?php echo $titleColor;?>;"<?php } ?>><?php the_title();?></a>
									<span><?php echo get_the_excerpt();?>...</span>
								</li>
								<?php endwhile; else: ?>
									<li><?php  _e('No posts were found','legatus-theme');?></li>
								<?php endif; ?>
							</ul>
						</div>
						
						<div class="breaking-controls"<?php if($titleColor) { ?> style="background:<?php echo $titleColor;?>;"<?php } ?>><a href="#" class="breaking-arrow-left">&nbsp;</a><a href="#" class="breaking-arrow-right">&nbsp;</a><div class="clear-float"></div><div class="the-corner"></div></div>
						
					<!-- END .breaking-news -->
					</div>

	<?php } ?>
<?php wp_reset_query();  ?>