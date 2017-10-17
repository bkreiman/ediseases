<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	get_header();
	wp_reset_query();

	global $query_string;
	$query_vars = explode('&',$query_string);
									
	foreach($query_vars as $key) {
		if(strpos($key,'page=') !== false) {
			$i = substr($key,8,12);
			break;
		}
	}
	
	if(!isset($i)) {
		$i = 1;
	}

	$galleryImages = get_post_meta ( $post->ID, THEME_NAME."_gallery_images", true ); 
	$imageIDs = explode(",",$galleryImages);
	$count = OT_image_count($post->ID);

	//main image
	$file = wp_get_attachment_url($imageIDs[$i-1]);
	$image = get_post_thumb(false, 968, 0, false, $file);	

	$term_list = wp_get_post_terms($post->ID, OT_POST_GALLERY.'-cat');

	$catCount=0;
	foreach($term_list as $term){
		$catCount++;
	}
	
	$randID = rand(0,$catCount-1);	
	//similar news
	$similarPosts = get_option(THEME_NAME."_similar_posts_gallery");
	$similarPostsSingle = get_post_meta( $post->ID, "_".THEME_NAME."_similar_posts", true ); 

	//meta settings
	$postDate = get_option(THEME_NAME."_post_date_single");
?>
<?php get_template_part(THEME_LOOP."loop-start"); ?>
		<?php get_template_part(THEME_SINGLE."page-title"); ?>

			<?php if (have_posts()): ?>

				<!-- BEGIN .single-gallery -->
				<div class="single-gallery ot-slide-item gallery-full-photo" id="<?php echo $post->ID;?>">
					<span class="next-image" data-next="<?php echo $i+1;?>"></span>

					<div class="gallery-box">
						
						<div class="gallery-box-header">
							<h2><?php the_title();?></h2>
							<div class="numbering">
								<a href="javascript:;" class="prev icon-text" rel="<?php if($i>1) { echo $i-1; } else { echo $i-1; } ?>"><i class="fa fa-angle-left"></i></a>
								<span class="numbers"><span class="current"><?php echo $i;?></span>/<?php echo $count;?></span>
								<a href="javascript:;" class="next icon-text" rel="<?php if($i<$count) { echo $i+1; } else { echo $i; } ?>"><i class="fa fa-angle-right"></i></a>
							</div>
						</div>
						<div class="gallery-box-main-image">
							<span class="gal-current-image">
								<div class="the-image loading waiter">
									<img class="image-big-gallery ot-gallery-image" data-id="<?php echo $i;?>" style="display:none;" src="<?php echo $image['src'];?>" alt="<?php echo esc_attr(the_title());?>" />
								</div>
							</span>
						</div>

						<div class="gallery-box-about shortcode-content">
							<p>									
								<?php 
									if (get_the_content() != "") { 				
										add_filter('the_content','remove_images');
										add_filter('the_content','remove_objects');
										the_content();
									} 
								?>
							</p>
						</div>

						<div class="gallery-box-thumbs image-list the-thumbs">
							<a href="#" class="control-left"><?php _e("left",'legatus-theme');?></a>
							<a href="#" class="control-right"><?php _e("right",'legatus-theme');?></a>
							<ul>
			            		<?php 
				            		$c=1;
				            		foreach($imageIDs as $id) { 
				            			if($id) {
					            			$file = wp_get_attachment_url($id);
					            			$image = get_post_thumb(false, 50, 50, false, $file);
				            	?>
				            		<li data-nr="<?php echo $c;?>" rel="<?php echo $c;?>" class="gal-thumbs <?php if($c==$i) { ?>active<?php } ?>">
										<a href="javascript:;" rel="<?php echo $c;?>" data-nr="<?php echo $c;?>">
											<img src="<?php echo $image['src'];?>" alt="<?php echo esc_attr(get_the_title());?>"/>
										</a>
									</li>
					                <?php $c++; ?>
				               	 	<?php } ?>
				                <?php } ?>

							</ul>
						</div>

					</div>

				<!-- END .single-gallery -->
				</div>
			<?php endif;?>

<?php get_template_part(THEME_LOOP."loop-end"); ?>
<?php get_footer(); ?>