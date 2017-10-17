<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	get_header();
	if($catid = get_query_var('cat')){
		$cat = get_category($catid);
		
		//if(isset($cat->count) && $cat->count == 0){
			$category = $cat;
			if($cat->parent > 0){
				$category = get_category($cat->parent);
			}
		//}
		
	}
	
	if(isset($category)){
		$catsq = new WP_Term_Query(array('taxonomy'=>'category', 'hide_empty'=>false, 'parent' => $category->term_id));
		$categories = $catsq->terms;
		?>
		<div class="wrapper">
		<div class="main-content-left">
		<?php
		if($categories){
			array_unshift($categories, $category);
			if(count($categories) > 8){
				$toomany = true;
			}
			if(!isset($toomany)){
				$tabname = $tabcontent = '';
				foreach($categories as $id=>$childcat){
					$tabactiveclass = '';
					if($catid == $childcat->term_id){
						$tabactiveclass = 'ui-state-active ';
						$tabcontent .= '<div class="ui-tabs-panel ui-widget-content ui-corner-bottom" id="medtab-'.$id.'"><p>'.$childcat->description.'</p></div>';
					}
					$tabname .= '<li class="'.$tabactiveclass.'ui-state-default ui-corner-top"><a class="ui-tabs-anchor" href="'.esc_url(get_category_link($childcat->term_id)).'">'.$childcat->name.'</a></li>';
					
				}
				?>
				<div id="meditabs"class="ui-tabs ui-widget ui-widget-content ui-corner-all">
					<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all"><?php echo $tabname?></ul>
					<?php echo $tabcontent?>
				</div>
				<?php
			}else{
				?>
				<ol class="subcats-links">
				<?php
				array_shift($categories);
				foreach($categories as $childcat){
					echo '<li><a href="'.get_term_link($childcat->term_id, 'category').'">'.$childcat->name.'</a></li>';
				}
				?>
				</ol>
				<?php
			}
		}
		
		if(have_posts()){ while(have_posts()){ the_post();
		?>
			<div <?php post_class($class); ?> id="post-<?php the_ID(); ?>">
				
				<div class="article-header">
					<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
				</div>
				
				<div class="article-content">
					<?php if($averageRating!=false) { ?>
						<div class="star-rating rating-large">
							<span style="width: <?php echo $averageRating[0];?>%;">
								<strong class="rating"><?php echo $averageRating[1];?></strong> <?php _e("out of 5",'legatus-theme');?>
							</span>
						</div>
					<?php } ?>
					<?php 
						the_excerpt();
					?>
				</div>
				<div class="article-links">
					<?php if ( comments_open() && ot_option_compare("post_comments_single","post_comments_single", $post->ID)==true) { ?>
						<a href="<?php the_permalink();?>#comments" class="article-icon-link"><i class="fa fa-comment"></i><?php comments_number(__("0 comment",'legatus-theme'),__("1 comment",'legatus-theme'),__("% comments",'legatus-theme')); ?></a>
					<?php } ?>
					<a href="<?php the_permalink();?>" class="article-icon-link"><i class="fa fa-reply"></i><?php _e("Read Full Article",'legatus-theme');?></a>
				</div>
				
			<!-- END .<?php echo $class;?>  -->
			</div>
			<br><br>
		<?php }}
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		
		customized_nav_btns($paged, $wp_query->max_num_pages);
		
		?>
		</div><!-- .main-content-left -->
		<?php get_template_part(THEME_INCLUDES."sidebar");?>
		<div class="clear-float"></div>
		</div><!-- .wrapper -->
		<?php
	}else{
		//get_template_part(THEME_INCLUDES."news");
	}
	get_footer(); 
?>		