<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	wp_reset_query();

	$image = get_post_thumb($post->ID,0,0); 

?>

	<?php get_template_part(THEME_LOOP."loop-start"); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part(THEME_SINGLE."post-title"); ?>
			<?php get_template_part(THEME_SLIDERS."breaking-news"); ?>	
			<div class="main-article-content">
				<?php if (ot_option_compare('show_single_title','show_single_title',$post->ID)==true) { ?>
					<h2 class="article-title<?php if(ot_option_compare('show_single_thumb','show_single_thumb',$post->ID)!=true || $image['show']!=true) { ?> no-bottom<?php } ?>"><?php the_title();?></h2>
				<?php } ?>
				<?php get_template_part(THEME_SINGLE."image");?>
				<?php if(ot_option_compare('post_date_single','post_date',$post->ID)==true || ot_option_compare('printPost','printPost',$post->ID)==true || ot_option_compare('share_all','share_single',$post->ID)==true || ot_option_compare('post_author_single','post_author_single',$post->ID)==true || ( comments_open() && ot_option_compare('post_comments_single','post_comments_single',$post->ID)==true)) { ?>
					<!-- BEGIN .article-controls -->
					<div class="article-controls">
						<?php if(ot_option_compare('post_date_single','post_date',$post->ID)==true) { ?>
							<div class="date">
								<div class="calendar-date"><?php the_time("F d");?></div>
								<div class="calendar-time">
									<font><?php the_time("H:i");?></font>
									<font><?php the_time("Y");?></font>
								</div>
							</div>
						<?php } ?>
						<div class="right-side">
							<?php if(ot_option_compare('printPost','printPost',$post->ID)==true || ot_option_compare('share_all','share_single',$post->ID)==true) { ?>
								<div class="colored">
							<?php } ?>
								<?php if(ot_option_compare('printPost','printPost',$post->ID)==true) { ?>
									<a href="javascript:printArticle();" class="icon-link"><i class="fa fa-print"></i><?php _e("Print This Article",'legatus-theme');?></a>
								<?php } ?>
								<?php if(ot_option_compare('share_all','share_single',$post->ID)==true) { ?>
									<a href="#share" class="icon-link"><i class="fa fa-share-alt"></i><?php _e("Share it With Friends",'legatus-theme');?></a>
								<?php } ?>
							<?php if(ot_option_compare('printPost','printPost',$post->ID)==true || ot_option_compare('share_all','share_single',$post->ID)==true) { ?>
								</div>
							<?php } ?>

							<div>
								<?php 
									if(ot_option_compare('post_author_single','post_author_single',$post->ID)==true) { 
										echo the_author_posts_link();
									}
								?>
								<?php if ( comments_open() && ot_option_compare('post_comments_single','post_comments_single',$post->ID)==true) { ?>
									<a href="<?php the_permalink();?>#comments" class="icon-link">
										<i class="fa fa-comment"></i>
										<?php comments_number(__('0 Comments','legatus-theme'), __('1 Comment','legatus-theme'), __('% Comments','legatus-theme')); ?>
									</a>
								<?php } ?>
							</div>
						</div>

						<div class="clear-float"></div>

					<!-- END .article-controls -->
					</div>
				<?php } ?>
				<!-- BEGIN .shortcode-content -->
				<div class="shortcode-content">
					<?php wp_reset_query();?>		
					<?php the_content();?>		
				<!-- END .shortcode-content -->
				</div>
				<?php 
					$args = array(
						'before'           => '<div class="post-pages"><p>' . __('Pages:','legatus-theme'),
						'after'            => '</p></div>',
						'link_before'      => '',
						'link_after'       => '',
						'next_or_number'   => 'number',
						'nextpagelink'     => __('Next page','legatus-theme'),
						'previouspagelink' => __('Previous page','legatus-theme'),
						'pagelink'         => '%',
						'echo'             => 1
					);

					wp_link_pages($args); 
				?>	
			</div>
			<!-- BEGIN .main-nosplit -->
			<div class="main-nosplit">
				<?php get_template_part(THEME_SINGLE."post-ratings"); ?>
				<?php get_template_part(THEME_SINGLE."post-tags"); ?>
				<?php get_template_part(THEME_SINGLE."share"); ?>
			<!-- END .main-nosplit -->
			</div>
			<?php get_template_part(THEME_SINGLE."about-author"); ?>
			<?php get_template_part(THEME_SINGLE."post-related"); ?>
		<?php endwhile; else: ?>
			<p><?php  _e('Sorry, no posts matched your criteria.','legatus-theme'); ?></p>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
		<?php if ( comments_open() ) : ?>
			<?php comments_template(); // Get comments.php template ?>
		<?php endif; ?>
<?php get_template_part(THEME_LOOP."loop-end"); ?>