<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	wp_reset_query();

	if(is_category()) {
		$blogStyle = ot_get_option(get_cat_id( single_cat_title("",false) ), 'blog_style', false);
	} else if(is_tax()) {
		$blogStyle = ot_get_option(get_queried_object()->term_id, 'blog_style', false);
	} else {
		$blogStyle = get_option(THEME_NAME."_blog_style");
	}


	//blog post count
	$postCount = get_option('posts_per_page');
	$blogBigNewsCount = round($postCount*(0.4));

	if(!$blogBigNewsCount) $blogBigNewsCount = 4;

	$postInPage = $wp_query->post_count;

	$counter = new ot_custom_counter; 
	$counter->reset_count(1); 

?>
<?php get_template_part(THEME_LOOP."loop-start"); ?>
	<?php get_template_part(THEME_SINGLE."post-title");?>
	<?php get_template_part(THEME_SLIDERS."breaking-news"); ?>	

	<?php if (!$blogStyle || $blogStyle=="1" || $blogStyle=="2" || $blogStyle=="3") { ?>
		<!-- BEGIN .main-content-split -->
		<div class="main-content-split">
	<?php } elseif ($blogStyle=="4" || $blogStyle=="5") { ?>
		<!-- BEGIN .main-nosplit -->
		<div class="main-nosplit">
	<?php } ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php 
			$counter = $counter->count(); 
		?>

		<?php if ($blogStyle=="1" || !$blogStyle) { ?>

			<?php if ($counter==1) { ?>						
				<!-- BEGIN .main-split-left -->
				<div class="main-split-left">
			<?php } ?>	
				<?php 
					if ($counter<=$blogBigNewsCount) {
						get_template_part(THEME_LOOP."post");
					} 
				?>
			<?php if ($counter>=1 && ( $counter==$blogBigNewsCount || ($counter==$postInPage && $counter<$blogBigNewsCount))) { ?>
				<!-- END .main-split-left -->
				</div>
			<?php } ?>
			
			<?php if ($counter==$blogBigNewsCount && $counter!=$postInPage) { ?>
				<!-- BEGIN .main-split-right -->
				<div class="main-split-right">
			<?php } ?>	
				<?php 
					if ($counter>$blogBigNewsCount) {
						get_template_part(THEME_LOOP."post");
					} 
				?>
			<?php if ($counter==$postInPage && $counter>$blogBigNewsCount) { ?>	
				<!-- END .main-split-right -->
				</div>
			<?php } ?>

		<?php } else if ($blogStyle=="2" || $blogStyle=="3") { ?>	

			<?php if ($counter==1) { ?>
				<!-- BEGIN .main-split-left -->
				<div class="main-split-left">
			<?php } ?>	

				<?php get_template_part(THEME_LOOP."post"); ?>

			<?php if($counter==(ceil($postInPage/2))) { ?>
				<!-- END .main-split-left -->
				</div>
				<!-- BEGIN .main-split-right -->
				<div class="main-split-right">
			<?php } ?>

			<?php if($counter==$postInPage) { ?>
				<!-- END .main-split-right -->
				</div>
			<?php } ?>

		<?php } else if ($blogStyle=="4" || $blogStyle=="5") { ?>

			<?php get_template_part(THEME_LOOP."post"); ?>

		<?php } ?>	

		<?php 
			$counter = new ot_custom_counter; 
			$counter->plus_one(); 
		?>

		<?php endwhile; else: ?>
			<?php get_template_part(THEME_LOOP."no-post"); ?>
		<?php 
		endif; // end structure if ?>
	</div>


	<?php customized_nav_btns($paged, $wp_query->max_num_pages); ?>
<?php get_template_part(THEME_LOOP."loop-end"); ?>
