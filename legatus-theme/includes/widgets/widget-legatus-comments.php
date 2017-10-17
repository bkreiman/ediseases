<?php
add_action('widgets_init', create_function('', 'return register_widget("OT_latest_comments");'));

class OT_latest_comments extends WP_Widget {
	function __construct() {
		 parent::__construct (false, $name = THEME_FULL_NAME.__(' Latest Comments','legatus-theme'));	
	}

	function form($instance) {
		/* Set up some default widget settings. */
		$defaults = array(
			'title' => __('Latest Comments','legatus-theme'),
			'count' => '3',
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );

		$title = esc_attr($instance['title']);
		$count = esc_attr($instance['count']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','legatus-theme'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>

			
			<p><label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Comment count:','legatus-theme');?> <input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" /></label></p>

		
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
		$count = $instance['count'];
		$title = $instance['title'];

	
		if(!$count) $count = 4;
		$widget_id = $args['widget_id'];
		

?>		
	<?php echo $before_widget; ?>
		<?php if($title) echo $before_title.$title.$after_title; ?>
		<div>
			<?php 
				$args =	array(
					'status' => 'approve', 
					'order' => 'DESC',
					'number' => $count
				);	
								
				$comments = get_comments($args);
				$totalCount = count($comments);
				$counter = 1;
							
				foreach($comments as $comment) {
					if($comment->user_id && $comment->user_id!="0") {
						$authorName = get_the_author_meta('display_name',$comment->user_id );
					} else {
						$authorName = $comment->comment_author;
					}	
			 ?>
				<div class="panel-comment">
					<div class="comment-image">
            			<a href="<?php echo get_comment_link($comment);?>">
           				  <img src="<?php echo ot_get_avatar_url(get_avatar( $comment, 40));?>" class="setborder" alt="<?php echo $authorName; ?>" />
           				 </a>
          			</div>
					<div class="comment-header">
						<b><a href="<?php echo get_comment_link($comment);?>"><?php echo $authorName; ?></a></b>
					</div>
					<div class="comment-content">
						<p><?php echo WordLimiter(get_comment_excerpt($comment->comment_ID),15);?></p>
					</div>
					<div class="comment-links">
						<a href="<?php echo get_page_link($comment->comment_post_ID);?>" class="comment-icon-link"><i class="fa fa-reply"></i><?php _e("View in article",'legatus-theme');?></a>
					</div>
				</div>


			<?php } ?>
		</div>
	
	<?php echo $after_widget; ?>
		
	
      <?php
	}
}
?>
