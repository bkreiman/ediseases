<?php
	function ot_custom_fonts() { 
		if(get_option(THEME_NAME."_scriptLoad") == "on") {
			echo "<style>";	
		} 

			//fonts
			$google_font_1 = get_option(THEME_NAME."_google_font_1");
			$google_font_2 = get_option(THEME_NAME."_google_font_2");
			$google_font_3 = get_option(THEME_NAME."_google_font_3");
			$google_font_4 = get_option(THEME_NAME."_google_font_4");
			$google_font_5 = get_option(THEME_NAME."_google_font_5");
			$google_font_6 = get_option(THEME_NAME."_google_font_6");
			$google_font_7 = get_option(THEME_NAME."_google_font_7");
			$google_font_8 = get_option(THEME_NAME."_google_font_8");
			$google_font_9 = get_option(THEME_NAME."_google_font_9");
			$google_font_10 = get_option(THEME_NAME."_google_font_10");
			$google_font_11 = get_option(THEME_NAME."_google_font_11");
			$google_font_12 = get_option(THEME_NAME."_google_font_12");
			$google_font_13 = get_option(THEME_NAME."_google_font_13");
			$google_font_14 = get_option(THEME_NAME."_google_font_14");
			$google_font_15 = get_option(THEME_NAME."_google_font_15");
			$google_font_16 = get_option(THEME_NAME."_google_font_16");
			$google_font_17 = get_option(THEME_NAME."_google_font_17");
			$google_font_18 = get_option(THEME_NAME."_google_font_18");
			$google_font_19 = get_option(THEME_NAME."_google_font_19");
			$google_font_20 = get_option(THEME_NAME."_google_font_20");
			$google_font_21 = get_option(THEME_NAME."_google_font_21");


			$font_size_1 = get_option(THEME_NAME."_font_size_1");
			$font_size_2 = get_option(THEME_NAME."_font_size_2");
			$font_size_3 = get_option(THEME_NAME."_font_size_3");
			$font_size_4 = get_option(THEME_NAME."_font_size_4");
			$font_size_5 = get_option(THEME_NAME."_font_size_5");
			$font_size_6 = get_option(THEME_NAME."_font_size_6");
			$font_size_7 = get_option(THEME_NAME."_font_size_7");
			$font_size_8 = get_option(THEME_NAME."_font_size_8");
			$font_size_9 = get_option(THEME_NAME."_font_size_9");
			$font_size_10 = get_option(THEME_NAME."_font_size_10");
			$font_size_11 = get_option(THEME_NAME."_font_size_11");
			$font_size_12 = get_option(THEME_NAME."_font_size_12");
			$font_size_13 = get_option(THEME_NAME."_font_size_13");
			$font_size_14 = get_option(THEME_NAME."_font_size_14");
			$font_size_15 = get_option(THEME_NAME."_font_size_15");
			$font_size_16 = get_option(THEME_NAME."_font_size_16");
			$font_size_17 = get_option(THEME_NAME."_font_size_17");
			$font_size_18 = get_option(THEME_NAME."_font_size_18");
			$font_size_19 = get_option(THEME_NAME."_font_size_19");
			$font_size_20 = get_option(THEME_NAME."_font_size_20");
			$font_size_21 = get_option(THEME_NAME."_font_size_21");

		?>


		/* Content text */
		p {
			font-size: <?php echo $font_size_1;?>px!important;
			font-family: '<?php echo $google_font_1;?>', sans-serif;
		}

		/* Logo text */
		.header-middle .logo-text h1 {
			font-size: <?php echo $font_size_2;?>px;
			font-family: '<?php echo $google_font_2;?>', sans-serif;
		}

		/* Main menu text */
		.header .header-menu li a {
			font-size: <?php echo $font_size_3;?>px;
			font-family: '<?php echo $google_font_3;?>', sans-serif;
		}

		/* Article title */
		.article-big-block .article-header h2, .article-small-block .article-header h2 {
			font-size: <?php echo $font_size_4;?>px;
			font-family: '<?php echo $google_font_4;?>', sans-serif;
		}

		/* Video title */
		.video-small h2 a {
			font-size: <?php echo $font_size_5;?>px;
			font-family: '<?php echo $google_font_5;?>', sans-serif;
		}

		/* Homepage's photo gallery title */
		.photo-gallery-blocks .images-content li div.article-header h2 a {
			font-size: <?php echo $font_size_6;?>px;
			font-family: '<?php echo $google_font_6;?>', sans-serif;
		}

		/* Blog page title */
		.content-article-title h2 {
			font-size: <?php echo $font_size_7;?>px;
			font-family: '<?php echo $google_font_7;?>', sans-serif;
		}

		/* Comment username */
		.comment-block .commment-content .user-nick {
			margin-left: <?php echo $font_size_8;?>px;
			font-family: '<?php echo $google_font_8;?>', sans-serif;
		}

		/* "No comments" title */
		.no-comment-block b {
			font-size: <?php echo $font_size_9;?>px;
			font-family: '<?php echo $google_font_9;?>', sans-serif;
		}

		/* Error/succes message title */
		.huge-message .big-title {
			font-size: <?php echo $font_size_10;?>px;
			font-family: '<?php echo $google_font_10;?>', sans-serif;
		}

		/* Error/succes message second text */
		.huge-message .small-title {
			font-size: <?php echo $font_size_11;?>px;
			font-family: '<?php echo $google_font_11;?>', sans-serif;
		}

		/* Gallery Title */
		.gallery-box .gallery-box-header h2 {
			font-size: <?php echo $font_size_12;?>px;
			font-family: '<?php echo $google_font_12;?>', sans-serif;
		}

		/* Homepage's second column article title */
		.article-middle-block .article-header h2 a {
			font-size: <?php echo $font_size_13;?>px;
			font-family: '<?php echo $google_font_13;?>', sans-serif;
		}

		/* Sidebar panel title */
		.main-content-right .panel h3 {
			font-size: <?php echo $font_size_14;?>px;
			font-family: '<?php echo $google_font_14;?>', sans-serif;
		}

		/* Photo gallery title */
		.panel-gallery .gallery-header b a {
			font-size: <?php echo $font_size_15;?>px;
			font-family: '<?php echo $google_font_15;?>', sans-serif;
		}

		/* Sidebar article block title */
		.article-side-block .article-header h2 a,
		.article-classic .article-header h2 a {
			font-size: <?php echo $font_size_16;?>px;
			font-family: '<?php echo $google_font_16;?>', sans-serif;
		}

		/* Floating social button likes count text */
		.social-icons-float .social-icon .social-count {
			font-size: <?php echo $font_size_17;?>px;
			font-family: '<?php echo $google_font_16;?>', sans-serif;
		}

		/* Opened post title */
		.main-article-content h2.article-title {
			font-size: <?php echo $font_size_18;?>px;
			font-family: '<?php echo $google_font_18;?>', sans-serif;
		}

		/* Calendar dates */
		.main-article-content .article-controls .date .calendar-date {
			font-size: <?php echo $font_size_19;?>px;
			font-family: '<?php echo $google_font_19;?>', sans-serif;
		}

		/* Bottom social button likes count text */
		.article-share-bottom .social-icon .social-count {
			font-size: <?php echo $font_size_20;?>px;
			font-family: '<?php echo $google_font_20;?>', sans-serif;
		}

		/* "About author" author title */
		.author-content h3 {
			font-size: <?php echo $font_size_21;?>px;
			font-family: '<?php echo $google_font_21;?>', sans-serif;
		}
<?php
		if(get_option(THEME_NAME."_scriptLoad") == "on") {
			echo "</style>";	
		} 
	}

	if(get_option(THEME_NAME."_scriptLoad") != "on") {
		ot_custom_fonts();	
	} 

?>