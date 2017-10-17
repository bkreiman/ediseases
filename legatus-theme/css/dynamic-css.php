<?php
	if(get_option(THEME_NAME."_scriptLoad") != "on") {
		header('Content-type: text/css');	
	} 
	function ot_custom_style() {
		//banner settings
		$banner_type = get_option ( THEME_NAME."_banner_type" );

		//bg type
		$bg_type = get_option ( THEME_NAME."_body_bg_type" );
		$bg_color = get_option ( THEME_NAME."_body_color" );
		$bg_image = get_option ( THEME_NAME."_body_image" );
		$bg_texture = get_option ( THEME_NAME."_body_pattern" );
		if(!$bg_texture) $bg_texture = "texture-1";

		//colors
		$color_1 = get_option(THEME_NAME."_color_1");
		$color_2 = get_option(THEME_NAME."_color_2");
		$color_3 = get_option(THEME_NAME."_color_3");
		$color_4 = get_option(THEME_NAME."_color_4");
		$color_5 = get_option(THEME_NAME."_color_5");


		$headerBg = get_option(THEME_NAME."_header_bg_image");

		if(get_option(THEME_NAME."_scriptLoad") == "on") {
			echo "<style>";	
		} 
	?>

	/* Main theme color */
	.slider-container .slider-controls .slider-control.active a,
	.breaking-news .breaking-title,
	.breaking-news .breaking-controls,
	.main-content-right .panel h3,
	.content-panel .panel-header b,
	.page-pager > span,
	.page-pager > a:hover,
	.shortcode-content .spacer-break-2,
	.shortcode-content .spacer-break-3,
	.shortcode-content .spacer-break-4,
	.shortcode-content table thead,
	.shortcode-content .accordion > div > a,
	.content .filter a.active,
	.article-array li:before {
		background-color: #<?php echo $color_1;?>;
	}

	/* Main links color */
	a {
		color: #<?php echo $color_2;?>;
	}

	/* Page title color */
	.content-article-title {
		border-bottom: 4px solid #<?php echo $color_3;?>;
		color: #<?php echo $color_3;?>;
	}

	/* Pager border color */
	.page-pager {
		border-top: 1px solid #<?php echo $color_4;?>;
	}

	/* Gallery shortcode active thumb color */
	.shortcode-content .gallery-preview .gallery-thumbs li.active:before {
		box-shadow: inset 0px 0px 0px 5px #<?php echo $color_5;?>;
	}



	/* Background Color/Texture/Image */
	body {
		<?php if($bg_type == "color") { ?>
			background: #<?php echo $bg_color;?>;
		<?php } else if ($bg_type == "pattern") { ?> 
			background: url(<?php echo THEME_IMAGE_URL."background-".$bg_texture;?>.jpg);
		<?php } else if ($bg_type == "image") { ?>
			background-image: url(<?php echo $bg_image;?>);background-size: 100%; background-attachment: fixed;
		<?php } else { ?>
			background: #<?php echo $bg_color;?>;
		<?php } ?>

	}

	<?php
		if ( $banner_type == "image" ) {
		//Image Banner
	?>
			#overlay { width:100%; height:100%; position:fixed;  _position:absolute; top:0; left:0; z-index:1001; background-color:#000000; overflow: hidden;  }
			#popup { display: none; position:absolute; width:auto; height:auto; z-index:1002; color: #000; font-family: Tahoma,sans-serif;font-size: 14px; }
			#baner_close { width: 22px; height: 25px; background: url(<?php echo get_template_directory_uri(); ?>/images/close.png) 0 0 repeat; text-indent: -5000px; position: absolute; right: -10px; top: -10px; }
	<?php
		} else if ( $banner_type == "text" ) {
		//Text Banner
	?>
			#overlay { width:100%; height:100%; position:fixed;  _position:absolute; top:0; left:0; z-index:1001; background-color:#000000; overflow: hidden;  }
			#popup { display: none; position:absolute; width:auto; height:auto; max-width:700px; z-index:1002; border: 1px solid #000; background: #e5e5e5 url(<?php echo get_template_directory_uri(); ?>/images/dotted-bg-6.png) 0 0 repeat; color: #000; font-family: Tahoma,sans-serif;font-size: 14px; line-height: 24px; border: 1px solid #cccccc; -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px; text-shadow: #fff 0 1px 0; }
			#popup center { display: block; padding: 20px 20px 20px 20px; }
			#baner_close { width: 22px; height: 25px; background: url(<?php echo get_template_directory_uri(); ?>/images/close.png) 0 0 repeat; text-indent: -5000px; position: absolute; right: -12px; top: -12px; }
	<?php 
		} else if ( $banner_type == "text_image" ) {
		//Image And Text Banner
	?>
			#overlay { width:100%; height:100%; position:fixed;  _position:absolute; top:0; left:0; z-index:1001; background-color:#000000; overflow: hidden;  }
			#popup { display: none; position:absolute; width:auto; z-index:1002; color: #000; font-size: 11px; font-weight: bold; }
			#popup center { padding: 15px 0 0 0; }
			#baner_close { width: 22px; height: 25px; background: url(<?php echo get_template_directory_uri(); ?>/images/close.png) 0 0 repeat; text-indent: -5000px; position: absolute; right: -10px; top: -10px; }
	<?php } ?>

	<?php if($headerBg) { ?>
	.boxed {
		background-image: url(<?php echo $headerBg;?>);
	}
	<?php } ?> 
	<?php
		if(get_option(THEME_NAME."_scriptLoad") == "on") {
			echo "</style>";	
		} 
	?>
<?php } ?>
<?php

	if(get_option(THEME_NAME."_scriptLoad") != "on") {
		ot_custom_style();	
	} 
?>