<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	//post tags
	$posttags = get_the_tags();
	$tagCount = count($posttags);
?>
<?php if ($posttags) { ?>
	<div class="article-share-bottom">
		
		<b><?php _e("Tags",'legatus-theme');?></b>

		<div class="tag-block">
			<?php	
				  foreach($posttags as $tag) {
					echo '<a href="'.get_tag_link($tag->term_id).'">'.$tag->name . '</a>'; 
				  }
			?>
		</div>

		<div class="clear-float"></div>

	</div>
<?php } ?>
