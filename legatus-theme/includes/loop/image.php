<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	//counter
	$counter = new ot_custom_counter;
	$counter = $counter->count(); 

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

	//change settings for homepage blocks
	if(is_page_template( "template-homepage.php" )) {
		$OT_builder = new OT_home_builder; 
	    //get block data
	    $data = $OT_builder->get_data(); 
	    //set query
	    $my_query = $data[0]; 
	    //extract array data
	    extract($data[1]); 
	}

	switch ($blogStyle) {
	 	case '1':
	 		if ($counter<=$blogBigNewsCount) {
				$width = 505;
				$height = 306;
				$largeImage = true;
			} else if ($counter>$blogBigNewsCount) {
				$width = 200;
				$height = 157;
				$largeImage = false;
			}


	 		break;
	 	case '3':
	 	case '4':
			$width = 505;
			$height = 306;
			$largeImage = true;
	 		break;
	 	case '2':
			$width = 200;
			$height = 157;
			$largeImage = false;
			break;
	 	case '5':
			$width = 1010;
			$height = 476;
			$largeImage = true;
			break;
	 	default:
			$width = 505;
			$height = 306;
			$largeImage = true;
	 		break;
	}

	$video = get_post_meta( $post->ID, "_".THEME_NAME."_video_code", true );


	$image = get_post_thumb($post->ID,$width,$height); 
	$imageL = get_post_thumb($post->ID,0,0); 

	

	if(get_option(THEME_NAME."_show_first_thumb") == "on" && $image['show']==true && !$video) {
?>
	<div class="article-photo">
		<span class="image-hover">
			<?php if (ot_option_compare('showTumbIcon','showTumbIcon',$post->ID)==true) { ?>
				<span class="drop-icons">
					<?php if($largeImage!=false) { ?>
						<span class="icon-block"><a href="<?php echo $imageL["src"];?>" title="<?php echo esc_attr(__("Show Image",'legatus-theme'));?>" class="icon-loupe legatus-tooltip lightbox-photo">&nbsp;</a></span>
					<?php } ?>
					<span class="icon-block"><a href="<?php the_permalink();?>" title="<?php echo esc_attr(__("Read Article",'legatus-theme'));?>" class="icon-link legatus-tooltip">&nbsp;</a></span>
				</span>
			<?php } ?>
			<?php echo ot_image_html($post->ID,$width,$height, 'setborder');?>
		</span>
	</div>

<?php } elseif(get_option(THEME_NAME."_show_first_thumb") == "on" && $video) { ?>
	<div class="article-photo">
		<span class="image-hover">
			<?php if (ot_option_compare('showTumbIcon','showTumbIcon',$post->ID)==true) { ?>
				<span class="drop-icons">
					<?php if($largeImage!=false) { ?>
						<span class="icon-block"><a href="<?php echo $imageL["src"];?>" title="<?php echo esc_attr(__("Show Image",'legatus-theme'));?>" class="icon-loupe legatus-tooltip lightbox-photo">&nbsp;</a></span>
					<?php } ?>
					<span class="icon-block"><a href="<?php the_permalink();?>" title="<?php echo esc_attr(__("Read Article",'legatus-theme'));?>" class="icon-link legatus-tooltip">&nbsp;</a></span>
					
				</span>
			<?php } ?>
			<?php echo ot_image_html($post->ID,$width,$height, 'setborder');?>

		</span>
	</div>
<?php } ?>
