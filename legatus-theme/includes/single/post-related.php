<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


	if(ot_option_compare('similar_posts','similar_posts',$post->ID)==true) {
	
		wp_reset_query();
		$categories = get_the_category($post->ID);
		
		if ($categories) {
			$category_ids = array();
			foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

			$args=array(
				'category__in' => $category_ids,
				'post__not_in' => array($post->ID),
				'showposts'=>3,
				'ignore_sticky_posts'=>1,
				'orderby' => 'rand'
			);

			$my_query = new wp_query($args);
			$postCount = $my_query->post_count;
			$counter = 1;
?>

	<div class="content-article-title">
		<h2><?php _e("Related Articles",'legatus-theme');?></h2>
		<div class="right-title-side">
			<a href="#top"><i class="fa fa-angle-up"></i><?php _e("Scroll Back To Top",'legatus-theme');?></a>
		</div>
	</div>

	<div class="related-block">
		
		<!-- BEGIN .article-array -->
		<ul class="article-array">
		<?php
			wp_reset_query();
				if( $my_query->have_posts() ) {
					while ($my_query->have_posts()) {
						$my_query->the_post();
			?>
				<li>
					<a href="<?php the_permalink();?>"><?php the_title();?></a>
					<?php if ( comments_open() && ot_option_compare('post_comments_single','post_comments_single',$my_query->post->ID)==true) { ?>
						<a href="<?php the_permalink();?>#comments" class="comment-icon">
							<i class="fa fa-comment"></i><?php comments_number('0','1','%'); ?>
						</a>
					<?php } ?>
				</li>
			<?php
				 }
			} else { _e('Sorry, no posts were found.','legatus-theme'); }
				?>
		<?php } ?>

		<!-- END .article-array -->
		</ul>
		<div class="split-line"></div>

	</div>
<?php } ?>


<?php wp_reset_query();  ?>
