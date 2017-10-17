<?php

	
	// author id
	$user_ID = get_the_author_meta('ID');

	//social
	$flickr = get_user_meta($user_ID, 'flickr', true);
	$vimeo = get_user_meta($user_ID, 'vimeo', true);
	$twitter = get_user_meta($user_ID, 'twitter', true);
	$facebook = get_user_meta($user_ID, 'facebook', true);
	$pinterest = get_user_meta($user_ID, 'pinterest', true);
	$googlepluss = get_user_meta($user_ID, 'googlepluss', true);

?>


<?php if(ot_option_compare('about_author','about_author',$post->ID)==true) { ?>
	<div class="content-article-title">
		<h2><?php _e("About Author",'legatus-theme');?></h2>
		<div class="right-title-side">
			<a href="#top"><i class="fa fa-angle-up"></i><?php _e("Scroll Back To Top",'legatus-theme');?></a>
			<a href="<?php $user_info = get_userdata($user_ID); echo get_author_posts_url($user_ID, $user_info->user_login ); ?>"><i class="fa fa-user"></i><?php _e("More Articles From Author",'legatus-theme');?></a>
		</div>
	</div>

	<!-- BEGIN .main-nosplit -->
	<div class="main-nosplit">
		
		<div class="author-photo">
			<img src="<?php echo ot_get_avatar_url(get_avatar( get_the_author_meta('user_email',$user_ID), 60));?>" class="setborder" alt="<?php echo esc_attr(get_the_author_meta('display_name',$user_ID)); ?>" />
		</div>
		<div class="author-content">
			<h3><?php echo get_the_author_meta('display_name',$user_ID); ?></h3>
			<div class="right-top">
				<?php if($flickr) { ?><a href="<?php echo $flickr;?>" class="icon-text"><i class="fa fa-flickr"></i></a><?php } ?>
				<?php if($vimeo) { ?><a href="<?php echo $vimeo;?>" class="icon-text"><i class="fa fa-vimeo-square"></i></a><?php } ?>
				<?php if($twitter) { ?><a href="<?php echo $twitter;?>" class="icon-text"><i class="fa fa-twitter"></i></a><?php } ?>
				<?php if($facebook) { ?><a href="<?php echo $facebook;?>" class="icon-text"><i class="fa fa-facebook"></i></a><?php } ?>
				<?php if($pinterest) { ?><a href="<?php echo $pinterest;?>" class="icon-text"><i class="fa fa-pinterest"></i></a><?php } ?>
				<?php if($googlepluss) { ?><a href="<?php echo $googlepluss;?>" class="icon-text"><i class="fa fa-google-plus"></i></a><?php } ?>
			</div>
			<p><?php echo get_the_author_meta('description'); ?></p>
		</div>

		<div class="split-line"></div>

	<!-- END .main-nosplit -->
	</div>
<?php } ?>