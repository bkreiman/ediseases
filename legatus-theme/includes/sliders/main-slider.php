<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	wp_reset_query();


	//main slider
	$mainSlider = get_post_meta ( OT_page_id(), "_".THEME_NAME."_main_slider", true ); 

?>

<?php if((is_array($mainSlider) && !empty($mainSlider) && !in_array("slider_off",$mainSlider)) || (is_category() && $mainSlider=="on")) { ?>
<?php
		$args=array(
			'category__in' => $mainSlider,
			'posts_per_page' => get_option(THEME_NAME."_main_slider_count"),
			'order'	=> 'DESC',
			'orderby'	=> 'date',
			'meta_key'	=> "_".THEME_NAME.'_main_slider_post',
			'meta_value'	=> 'on',
			'post_type'	=> 'post',
			'ignore_sticky_posts '	=> 1,
			'post_status '	=> 'publish'
		);


			$the_query = new WP_Query($args);
		?>
		<!-- BEGIN .slider-container -->
		<div class="slider-container">
			
			<!-- BEGIN .slider-content -->
			<div class="slider-content">
				<ul>
					<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<?php $image = get_post_thumb($the_query->post->ID,680,250,THEME_NAME.'_homepage_image');  ?>
					<li>
						<a href="<?php the_permalink();?>">
							<span class="slider-info"><?php the_title();?></span>
							<img src="<?php echo $image['src'];?>" class="setborder" alt="<?php echo esc_attr(get_the_title());?>" />
						</a>
					</li>
					<?php endwhile; else: ?>
						<li><?php  _e('No posts were found','legatus-theme'); ?></li>
					<?php endif; ?>
					
				</ul>
			<!-- END .slider-content -->
			</div>

			<ul class="slider-controls"></ul>
		
		<!-- END .slider-container -->
		</div>

	<?php } ?>
<?php wp_reset_query();  ?>