<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	//counter
	$counter = new ot_custom_counter;
	$counter = $counter->count(); 


	//post settings
	$averageRating = ot_avarage_rating($post->ID);
	$image = get_post_thumb($post->ID,0,0); 

	//blog post count
	$postCount = get_option('posts_per_page');
	$blogBigNewsCount = round($postCount*(0.4));
	if(!$blogBigNewsCount) $blogBigNewsCount = 4;
	$postInPage = $wp_query->post_count;

	$sidebar = get_post_meta( OT_page_ID(), "_".THEME_NAME.'_sidebar_select', true );
	if(is_category()) {
		$blogStyle = ot_get_option(get_cat_id( single_cat_title("",false) ), 'blog_style', false);
		$sidebar = ot_get_option(get_cat_id( single_cat_title("",false) ), 'sidebar_select', false);
	} else if(is_tax()) {
		$blogStyle = ot_get_option(get_queried_object()->term_id, 'blog_style', false);
		$sidebar = ot_get_option(get_queried_object()->term_id, 'sidebar_select', false);
	} else {
		$blogStyle = get_option(THEME_NAME."_blog_style");
	}

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
		 		$class = "article-big-block";
		 		if($sidebar!="off") {
		 			$words = 30;	
		 		} else {
		 			$words = 50;
		 		}
	 		}
	 		if ($counter>$blogBigNewsCount) { 
		 		$class = "article-small-block";
		 		if($sidebar!="off") {
		 			$words = 20;	
		 		} else {
		 			$words = 40;
		 		}
		 		
	 		}
	 		break;
	 	case '2':
	 		$class = "article-small-block";
	 		if($sidebar!="off") {
	 			$words = 20;	
	 		} else {
	 			$words = 40;
	 		}
			break;
	 	case '3':
	 		$class = "article-big-block";
	 		if($sidebar!="off") {
	 			$words = 30;	
	 		} else {
	 			$words = 50;
	 		}
			break;
	 	case '4':
			if(get_option(THEME_NAME."_show_first_thumb") != "on" || $image['show']!=true) {
				$class = "article-classic article-no-image";
			} else {
				$class = "article-classic";
			}
	 		$words = 50;
			break;
	 	case '5':
			if(get_option(THEME_NAME."_show_first_thumb") != "on" || $image['show']!=true) {
				$class = "article-big-block article-no-image";
			} else {
				$class = "article-big-block";
			}
			$words = 70;
			break;
	 	default:
			$width = 330;
			$height = 200;
			$words = 30;
			$largeImage = true;
	 		if ($counter<=$blogBigNewsCount) {
		 		$class = "article-big-block";
		 		if($sidebar!="off") {
		 			$words = 30;	
		 		} else {
		 			$words = 50;
		 		}
	 		} else if ($counter>$blogBigNewsCount) { 
		 		$class = "article-small-block";
		 		if($sidebar!="off") {
		 			$words = 20;	
		 		} else {
		 			$words = 40;
		 		}
	 		}
	 		break;
	}
?>

				<!-- BEGIN .<?php echo $class;?> -->
				<div <?php post_class($class); ?> id="post-<?php the_ID(); ?>">
					<?php if($blogStyle==4 || $blogStyle==5){ get_template_part(THEME_LOOP."image"); } ?>
					<div class="article-header">
						<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
					</div>
					<?php if($blogStyle!=4 && $blogStyle!=5){ get_template_part(THEME_LOOP."image"); } ?>

					<div class="article-content">
						<?php if($averageRating!=false) { ?>
							<div class="star-rating rating-large">
								<span style="width: <?php echo $averageRating[0];?>%;">
									<strong class="rating"><?php echo $averageRating[1];?></strong> <?php _e("out of 5",'legatus-theme');?>
								</span>
							</div>
						<?php } ?>
						<?php 
							add_filter('excerpt_length', 'new_excerpt_length_'.$words);
							the_excerpt();
							remove_filter('excerpt_length', 'new_excerpt_length_'.$words);
						?>
					</div>
					<div class="article-links">
						<?php if ( comments_open() && ot_option_compare("post_comments_single","post_comments_single", $post->ID)==true) { ?>
							<a href="<?php the_permalink();?>#comments" class="article-icon-link"><i class="fa fa-comment"></i><?php comments_number(__("0 comment",'legatus-theme'),__("1 comment",'legatus-theme'),__("% comments",'legatus-theme')); ?></a>
						<?php } ?>
						<a href="<?php the_permalink();?>" class="article-icon-link"><i class="fa fa-reply"></i><?php _e("Read Full Article",'legatus-theme');?></a>
					</div>
					<?php if($blogStyle==4) { ?>
						<div class="clear-float"></div>
					<?php } ?> 
				<!-- END .<?php echo $class;?>  -->
				</div>
