<?php
add_action('widgets_init', create_function('', 'return register_widget("OT_latest_posts");'));

class OT_latest_posts extends WP_Widget {
	function __construct() {
		parent::__construct (false, $name = THEME_FULL_NAME.__(' Latest Posts','legatus-theme'));	
	}

	function form($instance) {
		/* Set up some default widget settings. */
		$defaults = array(
			'title' => __('Latest Posts','legatus-theme'),
			'count' => '3',
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );

		 $title = esc_attr($instance['title']);
		 $count = esc_attr($instance['count']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php printf ( __('Title:','legatus-theme')); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('count'); ?>"><?php printf ( __('Post count:','legatus-theme'));?> <input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" /></label></p>

		
        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['count'] = strip_tags($new_instance['count']);

		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
		$count = $instance['count'];

		$args=array(
			'posts_per_page'=> $count
		);
		$the_query = new WP_Query($args);
		$counter = 1;
		
		$totalCount = $the_query->found_posts;
		
		$blogID = get_option('page_for_posts');


?>		
	<?php echo $before_widget; ?>
		<?php if($title) echo $before_title.$title.$after_title; ?>
		<div>
			<?php if($blogID && get_page_link($blogID)) { ?>
				<div class="top-right">
					<a href="<?php echo get_permalink($blogID);?>"><?php _e("More Articles",'legatus-theme');?></a>
				</div>
			<?php } ?>
			<?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
			<?php 
				$averageRating = ot_avarage_rating($the_query->post->ID);
				$image = get_post_thumb($the_query->post->ID,310,150);
				$imageL = get_post_thumb($the_query->post->ID,0,0); 
			?>
			<!-- BEGIN .article-middle-block -->
			<div class="article-side-block">



				<?php if($image['show']==true) { ?>
					<div class="article-photo">
						<span class="image-hover">
							<?php if (ot_option_compare('showTumbIcon','showTumbIcon',$the_query->post->ID)==true) { ?>
								<span class="drop-icons">
									<span class="icon-block"><a href="<?php echo $imageL["src"];?>" title="<?php _e("Show Image",'legatus-theme');?>" class="icon-loupe legatus-tooltip lightbox-photo">&nbsp;</a></span>
									<span class="icon-block"><a href="<?php the_permalink();?>" title="<?php _e("Read Article",'legatus-theme');?>" class="icon-link legatus-tooltip">&nbsp;</a></span>
								</span>
							<?php } ?>
							<img src="<?php echo $image['src'];?>" class="setborder" alt="<?php the_title();?>" title="<?php the_title();?>" />
						</span>
					</div>
				<?php } ?>
			
				<div class="article-header">
					<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                    <?php if($averageRating!=false) { ?>
                        <div class="star-rating rating-large">
                            <span style="width: <?php echo $averageRating[0];?>%;">
                                <strong class="rating"><?php echo $averageRating[1];?></strong> <?php _e("out of 5",'legatus-theme');?>
                            </span>
                        </div>
                    <?php } ?>
				</div>

		
				<div class="article-links">
					<?php if ( comments_open() && ot_option_compare('post_comments_single','post_comments_single',$the_query->post->ID)==true) { ?>
					<a href="<?php the_permalink();?>#comments" class="article-icon-link">
						<i class="fa fa-comment"></i>
						<?php comments_number(__("0 comment",'legatus-theme'),__("1 comment",'legatus-theme'),__("% comments",'legatus-theme')); ?>
					</a>
					<?php } ?>
					<a href="<?php the_permalink();?>" class="article-icon-link"><i class="fa fa-reply"></i><?php _e("Read Full Article",'legatus-theme');?></a>
				</div>
			


			<!-- END .article-middle-block -->
			</div>


			<?php endwhile; else: ?>
				<p><?php  _e('No posts where found','legatus-theme');?></p>
			<?php endif; ?>
		</div>
	
	<?php echo $after_widget; ?>
		
	
      <?php
	}
}
?>
