<?php
/*
Template Name: Archive Page
*/	
?>
<?php get_header(); ?>
<?php
	wp_reset_query();
	global $wpdb;
	$limit = 0;
	$months = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month ,	YEAR( post_date ) AS year, COUNT( id ) as post_count FROM $wpdb->posts WHERE post_status = 'publish' and post_date <= now( ) and post_type = 'post' GROUP BY month , year ORDER BY post_date DESC");
	$cc=1;

	//sidebars
    $sidebar = get_post_meta( OT_page_ID(), "_".THEME_NAME.'_sidebar_select', true );
    if(is_category()) {
        $sidebar = ot_get_option(get_cat_id( single_cat_title("",false) ), 'sidebar_select', false);
    } elseif(is_tax()) {
        $sidebar = ot_get_option(get_queried_object()->term_id, 'sidebar_select', false);
    }

	if($sidebar=="off") {
		$splitter = 3;
	} else {
		$splitter = 2;
	}
?>
	<?php get_template_part(THEME_LOOP."loop-start"); ?>
	<?php get_template_part(THEME_SINGLE."page-title"); ?>
				<div class="archive">

					<div class="archive-row">


						<?php 
							$args = array(
								'type'                     => 'post',
								'child_of'                 => 0,
								'orderby'                  => 'name',
								'order'                    => 'ASC',
								'hide_empty'               => 1,
								'hierarchical'             => 1,
								'taxonomy'                 => 'category',
								'pad_counts'               => false );
									
							$categories = get_categories( $args );

							
							foreach ( $categories as $category ) { 
								$count_total = $category->count;
								$counter = 1;
								$cat_id = $category->term_id;
								$query='cat='.$cat_id.'&showposts=9';
								$my_query = new WP_Query($query);
								$titleColor = ot_title_color($cat_id, "category", false);
								

						?>

						<div class="archive-block">

							<!-- BEGIN .content-panel -->
							<div class="content-panel">
								<div class="panel-header">
									<b style="background:<?php echo $titleColor;?>;"><i class="fa fa-newspaper-o"></i><?php echo $category->name; ?></b>
									<div class="top-right"><a href="<?php echo get_category_link ( $category->term_id ) ;?>"><?php _e("View More Articles",'legatus-theme');?></a></div>
								</div>
								<div class="panel-content">
									<?php if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
										<?php 

											$averageRating = ot_avarage_rating($my_query->post->ID); 
										?>
										<?php if($counter=="1") { ?>
											<!-- BEGIN .article-big-block -->
											<div class="article-big-block">
												<?php 
													$image = get_post_thumb($post->ID,320,194); 	
												?>
												<?php 
													if(get_option(THEME_NAME."_show_first_thumb") == "on" && $image['show']==true) {
												?>
														<div class="article-photo">
															<span class="image-hover">
																<span class="drop-icons">
																	<span class="icon-block"><a href="#" title="<?php _e("Show Image",'legatus-theme');?>" class="icon-loupe legatus-tooltip">&nbsp;</a></span>
																	<span class="icon-block"><a href="<?php the_permalink();?>" title="<?php _e("Read Article",'legatus-theme');?>" class="icon-link legatus-tooltip">&nbsp;</a></span>
																</span>
																<img src="<?php echo $image['src'];?>" class="setborder" alt="<?php the_title();?>" />
															</span>
														</div>
												<?php } ?>
												
												<div class="article-header">
													<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
												</div>
												
												<div class="article-content">
													<?php if($averageRating!=false) { ?>
														<div class="star-rating rating-large right" title="<?php printf(__('Rated %1$s out of 5','legatus-theme'),$averageRating[1]);?>">
															<span style="width: <?php echo $averageRating[0];?>%;"><strong class="rating"><?php echo $averageRating[1];?></strong> <?php _e("out of 5",'legatus-theme');?></span>
														</div>
													<?php } ?>
													<?php the_excerpt();?>	
												</div>
												
												<div class="article-links">
													<?php if ( comments_open() && ot_option_compare('post_comments_single','post_comments_single',$my_query->post->ID)==true) { ?>
														<a href="<?php the_permalink();?>#comments" class="article-icon-link"><i class="fa fa-comment"></i><?php comments_number(__("0 comment",'legatus-theme'),__("1 comment",'legatus-theme'),__("% comments",'legatus-theme')); ?></a>
													<?php } ?>
													<a href="<?php the_permalink();?>" class="article-icon-link"><i class="fa fa-reply"></i><?php _e("Read Full Article",'legatus-theme');?></a>
												</div>
											<!-- END .article-big-block -->
											</div>
										<!-- BEGIN .article-array -->
										<ul class="article-array content-category">
										<?php } else { ?>
											<li>
												<a href="<?php the_permalink();?>"><?php the_title();?></a>
												<?php if ( comments_open() && ot_option_compare('post_comments_single','post_comments_single',$my_query->post->ID)==true) { ?>
													<a href="<?php the_permalink();?>#comments" class="comment-icon"><i class="fa fa-comment"></i><?php comments_number("0","1","%"); ?></a>
												<?php } ?>
											</li>
										<?php } ?>
										<?php if($count_total == $counter) { ?>
										<!-- END .article-array -->
										</ul>
										<?php } ?>
										<?php $counter++; ?>
									<?php endwhile; else: ?>
									<?php endif; ?>
								</div>
							<!-- END .content-panel -->
							</div>
							
						</div>

					<?php if($cc%$splitter==0) { ?>

						<div class="clear-float"></div>
					</div>
					
					<div class="archive-row">
					<?php } ?>

				<?php $cc++; ?>
				<?php } ?>
						<div class="clear-float"></div>
					</div>

				</div>
<?php get_template_part(THEME_LOOP."loop-end"); ?>
<?php get_footer(); ?>