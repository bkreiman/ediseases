<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	wp_reset_query();
	//page titile
	$titleShow = get_post_meta ( get_the_ID() , "_".THEME_NAME."_show_single_title", true ); 

	$catId = get_cat_id( single_cat_title("",false) );

	//RSS button
	if ( get_option( THEME_NAME."_rss_button" ) == "on" ) {							
		if(is_category()) {
			$rss = get_home_url().'?cat='.$catId.'&feed=rss2';
		} elseif(is_tax()) {
			$rss = get_home_url().'?cat='.get_queried_object()->term_id.'&feed=rss2';
		} else {
			$rss = get_bloginfo("rss_url");
		}
	} else { 
		$rss = false; 
	}

	$post_type = get_post_type();

	$singlePostBlogTitle = get_option(THEME_NAME."_singlePostBlogTitle");

	if(is_category()) {
		//custom colors
		$catId = get_cat_id( single_cat_title("",false) );
		$titleColor = ot_title_color($catId, "category", false);
	} else {
		$titleColor = ot_title_color(OT_page_ID(), "page", false);
	}
?>					


<?php if($post_type=="post" && is_single()) { ?>
	<?php if($singlePostBlogTitle == "on") { ?>
		<div class="content-article-title">
			<h2><?php echo get_the_title(get_option('page_for_posts')); ?></h2>
			<div class="right-title-side">
				<a href="<?php echo home_url();?>"><i class="fa fa-reply"></i><?php _e("Back To Homepage",'legatus-theme');?></a>
				<?php if($rss) { ?><a href="<?php echo $rss;?>" class="orange" target="_blank"><i class="fa fa-rss"></i><?php _e("Subscribe To RSS Feed",'legatus-theme');?></a><?php } ?>
			</div>
		</div>
	<?php } ?>
<?php } elseif($titleShow!="hide"){ ?>
	<div class="content-article-title"<?php if($titleColor) { ?> style="border-bottom: 4px solid <?php echo $titleColor;?>;color:<?php echo $titleColor;?>;"<?php } ?>>
		<h2><?php echo ot_page_title(); ?></h2>
		<div class="right-title-side">
			<a href="<?php echo home_url();?>"><i class="fa fa-reply"></i><?php _e("Back To Homepage",'legatus-theme');?></a>
			<?php if($rss) { ?><a href="<?php echo $rss;?>" class="orange" target="_blank"><i class="fa fa-rss"></i><?php _e("Subscribe To RSS Feed",'legatus-theme');?></a><?php } ?>
		</div>
	</div>

<?php } ?> 