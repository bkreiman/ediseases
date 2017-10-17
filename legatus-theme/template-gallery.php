<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/* Template Name: Photo Gallery */
?>
<?php get_header(); ?>
<?php
	wp_reset_query();
	$paged = get_query_string_paged();
	$posts_per_page = get_option(THEME_NAME.'_gallery_items');

	if($posts_per_page == "") {
		$posts_per_page = get_option('posts_per_page');
	}
	
	$catSlug = $wp_query->queried_object->slug;
	if(!$catSlug) {
		$my_query = new WP_Query(
			array(
				'post_type' => OT_POST_GALLERY, 
				'posts_per_page' => $posts_per_page, 
				'paged'=>$paged
			)
		);  
	} else {
		$my_query = new WP_Query(
			array(
				'post_type' => OT_POST_GALLERY, 
				'posts_per_page' => $posts_per_page, 
				'paged'=>$paged,
				'tax_query' => array(
					array(
						'taxonomy' => OT_POST_GALLERY.'-cat',
						'field' => 'slug',
						'terms' => $catSlug
					)
				)
			)
		); 

	}

	//meta settings
	$postDate = get_option(THEME_NAME."_post_date_single");
	$categories = get_terms( OT_POST_GALLERY.'-cat', 'orderby=name&hide_empty=0' );
?>
<?php get_template_part(THEME_LOOP."loop-start"); ?>
	<?php get_template_part(THEME_SINGLE."page-title"); ?>
		<div class="filter" id="gallery-categories">
			<b><?php _e('Filter:','legatus-theme'); ?></b>
			<a href="#filter" class="active" data-option="*"><?php _e('All','legatus-theme'); ?></a>
			<?php foreach ($categories as $category) { ?>
				<a href="#filter" data-option=".<?php echo $category->slug;?>"><?php echo $category->name;?></a>
			<?php } ?>
		</div>
		
		<!-- BEGIN .gallery -->
		<div class="gallery" id="gallery-full">

				<?php 
																
					$args = array(
						'post_type'     	=> 'gallery',
						'post_status'  	 	=> 'publish',
						'showposts' 		=> -1
					);

					$myposts = get_posts( $args );	
					$count_total = count($myposts);

					$counter=1;	
				?>
				<?php if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
				<?php 
					$src = get_post_thumb($post->ID,320,200);
					$term_list = wp_get_post_terms($post->ID, OT_POST_GALLERY.'-cat');
					$gallery_style = get_post_meta ( $post->ID, "_".THEME_NAME."_gallery_style", true ); 
				?>
					
					<div class="gallery-block gallery-image<?php foreach ($term_list as $term) { echo " ".$term->slug; } ?>" data-id="gallery-<?php the_ID(); ?>">

						<!-- BEGIN .content-panel -->
						<div class="content-panel gallery-panel">
							<div class="panel-content">
								
								<!-- BEGIN .article-big-block -->
								<div class="article-big-block">
									<div class="article-photo">
										<span class="image-hover">
											<span class="drop-icons">
												<span class="icon-block"><a href="<?php the_permalink();?>" title="<?php _e("View Gallery",'legatus-theme');?>" class="<?php if($gallery_style=="lightbox") { echo 'light-show '; } ?>icon-loupe legatus-tooltip" data-id="gallery-<?php the_ID(); ?>">&nbsp;</a></span>
											</span>
											<img src="<?php echo $src["src"]; ?>" class="setborder" alt="<?php the_title();?>" />
										</span>
									</div>
									
									<div class="article-header">
										<h2><a href="<?php the_permalink();?>"<?php if($gallery_style=="lightbox") { echo ' class="light-show"'; } ?> data-id="gallery-<?php the_ID(); ?>"><?php the_title();?></a></h2>
									</div>
									
									<div class="article-content">
										<?php 
											add_filter('excerpt_length', 'new_excerpt_length_20');
											the_excerpt();
										?>
									</div>

									<div class="bottom-button"><a href="<?php the_permalink();?>" class="<?php if($gallery_style=="lightbox") { echo 'light-show '; } ?>the-button" data-id="gallery-<?php the_ID(); ?>"><i class="fa fa-reply"></i><?php printf(__('View Photo Gallery (%1$s photos)','legatus-theme'), OT_image_count($post->ID));?></a></div>
								<!-- END .article-big-block -->
								</div>
								
							</div>
						<!-- END .content-panel -->
						</div>
						
					</div>
					
				<?php 
					if ( $paged != 0 ) {
						$a = ($paged-1)*$posts_per_page;
					} else {		
						$a = 1;
					}
				?>
							
				<?php $counter++; ?>
				<?php endwhile; ?>
				<?php else : ?>
					<h2 class="title"><?php _e('No galleries were found','legatus-theme');?></h2>
				<?php endif; ?>
				
					
		<!-- END .gallery -->
		</div>
		<?php gallery_nav_btns($paged, $my_query->max_num_pages); ?>
<?php get_template_part(THEME_LOOP."loop-end"); ?>
<?php get_footer(); ?>