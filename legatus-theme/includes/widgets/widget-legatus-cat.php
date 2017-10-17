<?php
add_action('widgets_init', create_function('', 'return register_widget("OT_cats");'));

class OT_cats extends WP_Widget {
	function __construct() {
		 parent::__construct (false, $name = THEME_FULL_NAME.' Categories');	
	}

	function form($instance) {
		/* Set up some default widget settings. */
		$defaults = array(
			'title' => '',
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );

		 $title = esc_attr($instance['title']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','legatus-theme'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			
        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
 

        ?>
	<?php echo $before_widget; ?>
		<?php if($title) echo $before_title.$title.$after_title; ?>
		<div>
			
			<ul class="category-list">
				<?php
					$posttags = get_categories(array('type'=> 'post','taxonomy' => 'category','parent'=>0,'hide_empty'=> false,'orderby'=>'name', 'order'=>'ASC'));
					$html ="";
					if ($posttags) {
						foreach($posttags as $tag) {
							
							//$tag_link = get_category_link($tag->term_id);
							$tag_link = get_term_link($tag->term_id, 'category');
							$titleColor = ot_title_color($tag->term_id, "category", false);
												
							echo '<li>
									<span class="category-bull" style="background:'.$titleColor.'">&nbsp;</span>
									<a href="'.$tag_link.'" title="'.$tag->name.'" class="'.$tag->slug.'">'.$tag->name.'</a>
								</li>';
							// <!--<span class="article-count">('.$tag->count.')</span>-->
							
						}
					}
								

				?>
			</ul>

		</div>


	
	<?php echo $after_widget; ?>
        <?php
	}
}
?>