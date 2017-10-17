<?php
add_action('widgets_init', create_function('', 'return register_widget("OT_gallery");'));

class OT_gallery extends WP_Widget {
	function __construct() {
		 parent::__construct (false, $name = THEME_FULL_NAME.' Latest Galleries');	
	}

	function form($instance) {
		/* Set up some default widget settings. */
		$defaults = array(
			'title' => '',
			'count' => '',
			'color' => '',
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );

		 $title = esc_attr($instance['title']);
		 $count = esc_attr($instance['count']);
		 $color = esc_attr($instance['color']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php  printf ( __('Title:','legatus-theme')); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('count'); ?>"><?php  printf ( __('Item shown:','legatus-theme'));?> <input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" /></label></p>

        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['count'] = strip_tags($new_instance['count']);
		$instance['color'] = strip_tags($new_instance['color']);
		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
		$count = $instance['count'];
		$counter=1;
		if(!$count) $count=3;

		
		$args = array('post_type' => 'gallery', 'showposts' => $count);
		$my_query = new WP_Query($args);
		
		$totalCount = $my_query->found_posts;
        ?>
            <?php echo $before_widget;?>
				<?php if($title) echo $before_title.$title.$after_title; ?>
				<div>

					<?php if(get_page_link(get_gallery_page())) { ?>
						<div class="top-right">
							<a href="<?php echo get_permalink(get_gallery_page());?>"><?php _e("all galleries",'legatus-theme');?></a>
						</div>
					<?php } ?>

					<?php if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
						<?php
							global $post;
							$g = $my_query->post->ID;
							$gallery_style = get_post_meta ( $g, "_".THEME_NAME."_gallery_style", true );
							$galleryImages = get_post_meta ( $g, THEME_NAME."_gallery_images", true ); 
							$imageIDs = explode(",",$galleryImages);
						?>
							<div class="panel-gallery" rel="gallery-<?php echo $g;?>">
								<div class="gallery-images">

									<a href="#" class="gallery-navi-left icon-text"><i class="fa fa-angle-left"></i></a>
									<a href="#" class="gallery-navi-right icon-text"><i class="fa fa-angle-right"></i></a>
									<ul>
									<?php
										$c=1;
					            		foreach($imageIDs as $imgID) { 
					            			
					            			if($imgID) {
					            				$file = wp_get_attachment_url($imgID);
					            				$image = get_post_thumb(false, 310, 216, false, $file);
					            				if($c==1) {
					            					$class = " active";
					            				} else {
					            					$class = false;
					            				}
						            			
											?>

												<li<?php if($c==1) { ?> class="active"<?php } ?>>
													<a href="javascript:void(0);" class="<?php if($gallery_style=="lightbox") { echo 'light-show '; } echo $class; ?>" data-id="gallery-<?php echo $g;?>">
														<img src="<?php echo $image['src'];?>" class="setborder" data-id="<?php echo $c;?>" title="<?php echo esc_attr(get_the_title()); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
													</a>
												</li>
											<?php 
											///if($c==4) break;	
											$c++;
											} 
										} 
									?>

									</ul>
									
								</div>
								<div class="gallery-header">
									<b><a href="<?php the_permalink();?>"><?php the_title(); ?></a></b>
								</div>
							</div>


					<?php $counter++; ?>
					<?php endwhile; ?>
					<?php endif; ?>	
				</div>

				<?php echo $after_widget; ?>	
        <?php
	}
}
?>
