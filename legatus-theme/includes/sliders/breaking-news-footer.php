<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	wp_reset_query();

	//braking slider		
	$breakingSlider = get_option(THEME_NAME.'_breaking_footer' );
	$breakingSliderCat = get_option(THEME_NAME.'_breaking_slider_cat_footer' );

	//breaking news option to show custom posts or all
	$breakingNewsType = get_option(THEME_NAME."_breakingNewsType");



?>
<?php if($breakingSlider=="on") { 
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


		if(is_array($breakingSliderCat) && $breakingSliderCat[0] && $breakingSliderCat[0]!="") {
			$args['category__in'] = $breakingSliderCat;
		}		
		if($breakingNewsType == "custom") {
			$args['meta_key'] = "_".THEME_NAME.'_breaking_post';
			$args['meta_value'] = 'on';
		}

		$the_query = new WP_Query($args);

	?>

					<!-- BEGIN .breaking-news -->
					<div class="breaking-news" style="margin-top:-15px;">
						
						<div class="breaking-title"><span class="breaking-icon">&nbsp;</span><b><?php _e("Breaking News",'legatus-theme');?></b><div class="the-corner"></div></div>

						<div class="breaking-block">
							<ul>
								
								<?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
								<li>
									<a href="<?php the_permalink();?>"><?php the_title();?></a>
									<span><?php echo get_the_excerpt();?>...</span>
								</li>
								<?php endwhile; else: ?>
									<li><?php  _e('No posts were found','legatus-theme');?></li>
								<?php endif; ?>
							</ul>
						</div>
						
						<div class="breaking-controls"><a href="#" class="breaking-arrow-left">&nbsp;</a><a href="#" class="breaking-arrow-right">&nbsp;</a><div class="clear-float"></div><div class="the-corner"></div></div>
						
					<!-- END .breaking-news -->
					</div>

	<?php } ?>
<?php wp_reset_query();  ?>