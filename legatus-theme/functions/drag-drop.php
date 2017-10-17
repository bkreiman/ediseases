<?php
global $orangeThemes_fields;
$orangeThemes_general_options= array(



/* ------------------------------------------------------------------------*
 * HOME SETTINGS
 * ------------------------------------------------------------------------*/   

array(
	"type" => "homepage_blocks",
	"title" => __("Homepage Blocks:",'legatus-theme'),
	"id" => $orangeThemes_fields->themeslug."_homepage_blocks",
	"blocks" => array(
		array(
			"title" => __("Latest News",'legatus-theme'),
			"type" => "homepage_news_block",
			"image" => "icon-article.png",
			"description" => __("Blog Style",'legatus-theme'),
			"options" => array(
				array( "type" => "scroller", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_count", "title" => __("Count:",'legatus-theme'), "max" => 30, "home" => "yes" ),
				array(
					"type" => "select",
					"title" => __("Blog List Style",'legatus-theme'),
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_style",
					"options"=>array(
						array("slug"=>"1", "name"=>__("Style 1",'legatus-theme')), 
						array("slug"=>"2", "name"=>__("Style 2",'legatus-theme')),
						array("slug"=>"3", "name"=>__("Style 3",'legatus-theme')),
						array("slug"=>"4", "name"=>__("Style 4",'legatus-theme')),
						array("slug"=>"5", "name"=>__("Style 5",'legatus-theme')),
						),

					"home" => "yes"
				),
				array(
					"type" => "select",
					"title" => __("Show Related Posts For The 1st News (only blog style 1)",'legatus-theme'),
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_related",
					"options"=>array(
						array("slug"=>"no", "name"=>__("No",'legatus-theme')),
						array("slug"=>"yes", "name"=>__("Yes",'legatus-theme')),
						),

					"home" => "yes"
				),
				array(
					"type" => "select",
					"title" => __("Use post pagination, suggested if you use one block in the page.",'legatus-theme'),
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_pagination",
					"options"=>array(
						array("slug"=>"no", "name"=>__("No",'legatus-theme')),
						array("slug"=>"yes", "name"=>__("Yes",'legatus-theme')),
						),

					"home" => "yes"
				),
				array(
					"type" => "categories",
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_cat",
					"taxonomy" => "category",
					"title" => __("Set Category",'legatus-theme'),
					"home" => "yes"
				),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_offset", "title" => __("From which post should start the loop (for example 4 ), for default leave it empty, or add 0. (Offset):",'legatus-theme'), "home" => "yes" ),
			),
		),
		array(
			"title" => __("Latest Video Block",'legatus-theme'),
			"type" => "homepage_news_block_2",
			"image" => "icon-video.png",
			"description" => __("Latest News With Videos",'legatus-theme'),
			"options" => array(
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_2_title", "title" => __("Title:",'legatus-theme'), "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_2_cat",
					"taxonomy" => "category",
					"title" => __("Set Category",'legatus-theme'),
					"home" => "yes"
				),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_2_offset", "title" => __("From which post should start the loop (for example 4 ), for default leave it empty, or add 0. (Offset):",'legatus-theme'), "home" => "yes" ),
				array( 
					"type" => "color", 
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_2_color", 
					"title" => __("Block Title Color:",'legatus-theme'),
					"std" => get_option(THEME_NAME."_default_cat_color"),
					"home" => "yes"
				),
			),
		),
		array(
			"title" => __("Latest Galleries",'legatus-theme'),
			"type" => "homepage_news_block_3",
			"image" => "icon-photo.png",
			"description" => __("Latest Galleries Slider",'legatus-theme'),
			"options" => array(

				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_3_title", "title" => __("Title:",'legatus-theme'), "home" => "yes" ),
				array( "type" => "scroller", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_3_count", "title" => __("Count:",'legatus-theme'), "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_3_cat",
					"taxonomy" => OT_POST_GALLERY.'-cat',
					"title" => __("Set Category",'legatus-theme'),
					"home" => "yes"
				),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_3_offset", "title" => __("From which post should start the loop (for example 4 ), for default leave it empty, or add 0. (Offset):",'legatus-theme'), "home" => "yes" ),
				array( 
					"type" => "color", 
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_3_color", 
					"title" => __("Block Title Color:",'legatus-theme'),
					"std" => get_option(THEME_NAME."_default_cat_color"),
					"home" => "yes"
				),
			),
		),

		array(
			"title" => __("Latest News Block",'legatus-theme'),
			"type" => "homepage_news_block_4",
			"image" => "icon-article-cateogry.png",
			"description" => __("Block Without Images",'legatus-theme'),
			"options" => array(
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_4_title", "title" => __("Title:",'legatus-theme'), "home" => "yes" ),
				array( "type" => "scroller", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_4_count", "title" => __("Post Count:",'legatus-theme'), "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_4_cat",
					"taxonomy" => "category",
					"title" => __("Set Category",'legatus-theme'),
					"home" => "yes"
				),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_4_offset", "title" => __("From which post should start the loop (for example 4 ), for default leave it empty, or add 0. (Offset):",'legatus-theme'), "home" => "yes" ),
				array( 
					"type" => "color", 
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_4_color", 
					"title" => __("Block Title Color:",'legatus-theme'),
					"std" => get_option(THEME_NAME."_default_cat_color"),
					"home" => "yes"
				),

			),

		),
		array(
			"title" => __("Latest Masonry News Block",'legatus-theme'),
			"type" => "homepage_news_block_10",
			"image" => "icon-blocks.png",
			"description" => __("With image in background",'legatus-theme'),
			"options" => array(
				array( "type" => "scroller", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_10_count", "title" => __("Post Count:",'legatus-theme'), "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_10_cat",
					"taxonomy" => "category",
					"title" => __("Set Category",'legatus-theme'),
					"home" => "yes"
				),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_10_offset", "title" => __("From which post should start the loop (for example 4 ), for default leave it empty, or add 0. (Offset):",'legatus-theme'), "home" => "yes" ),
			),

		),
		array(
			"title" => __("Latest News Blocks",'legatus-theme'),
			"type" => "homepage_news_block_6",
			"image" => "icon-article-cateogry.png",
			"description" => __("Two Blocks",'legatus-theme'),
			"options" => array(
				array( "type" => "title", "title" => __("Block 1",'legatus-theme'), "home" => "yes" ),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_6_title_1", "title" => __("Title:",'legatus-theme'), "home" => "yes" ),
				array( "type" => "scroller", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_6_count_1", "title" => __("Post Count:",'legatus-theme'), "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_6_cat_1",
					"taxonomy" => "category",
					"title" => __("Set Category",'legatus-theme'),
					"home" => "yes"
				),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_6_offset_1", "title" => __("From which post should start the loop (for example 4 ), for default leave it empty, or add 0. (Offset):",'legatus-theme'), "home" => "yes" ),
				array( 
					"type" => "color", 
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_6_color_1", 
					"title" => __("Block Title Color:",'legatus-theme'),
					"std" => get_option(THEME_NAME."_default_cat_color"),
					"home" => "yes"
				),
				array( "type" => "title", "title" => __("Block 2",'legatus-theme'), "home" => "yes" ),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_6_title_2", "title" => __("Title:",'legatus-theme'), "home" => "yes" ),
				array( "type" => "scroller", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_6_count_2", "title" => __("Post Count:",'legatus-theme'), "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_6_cat_2",
					"taxonomy" => "category",
					"title" => __("Set Category",'legatus-theme'),
					"home" => "yes"
				),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_6_offset_2", "title" => __("From which post should start the loop (for example 4 ), for default leave it empty, or add 0. (Offset):",'legatus-theme'), "home" => "yes" ),
				array( 
					"type" => "color", 
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_6_color_2", 
					"title" => __("Block Title Color:",'legatus-theme'),
					"std" => get_option(THEME_NAME."_default_cat_color"),
					"home" => "yes"
				),

			),

		),

		array(
			"title" => __("Popular News",'legatus-theme'),
			"type" => "homepage_news_block_7",
			"image" => "icon-article-popular.png",
			"description" => __("Block Without Images",'legatus-theme'),
			"options" => array(
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_7_title", "title" => __("Title:",'legatus-theme'), "home" => "yes" ),
				array( "type" => "scroller", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_7_count", "title" => __("Post Count:",'legatus-theme'), "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_7_cat",
					"taxonomy" => "category",
					"title" => __("Set Category",'legatus-theme'),
					"home" => "yes"
				),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_7_offset", "title" => __("From which post should start the loop (for example 4 ), for default leave it empty, or add 0. (Offset):",'legatus-theme'), "home" => "yes" ),
				array( 
					"type" => "color", 
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_7_color", 
					"title" => __("Block Title Color:",'legatus-theme'),
					"std" => get_option(THEME_NAME."_default_cat_color"),
					"home" => "yes"
				),

			),

		),
		array(
			"title" => __("Popular News",'legatus-theme'),
			"type" => "homepage_news_block_9",
			"image" => "icon-article-popular.png",
			"description" => __("Two Blocks",'legatus-theme'),
			"options" => array(
				array( "type" => "title", "title" => __("Block 1",'legatus-theme'), "home" => "yes" ),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_9_title_1", "title" => __("Title:",'legatus-theme'), "home" => "yes" ),
				array( "type" => "scroller", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_9_count_1", "title" => __("Post Count:",'legatus-theme'), "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_9_cat_1",
					"taxonomy" => "category",
					"title" => __("Set Category",'legatus-theme'),
					"home" => "yes"
				),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_9_offset_1", "title" => __("From which post should start the loop (for example 4 ), for default leave it empty, or add 0. (Offset):",'legatus-theme'), "home" => "yes" ),
				array( 
					"type" => "color", 
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_9_color_1", 
					"title" => __("Block Title Color:",'legatus-theme'),
					"std" => get_option(THEME_NAME."_default_cat_color"),
					"home" => "yes"
				),
				array( "type" => "title", "title" => __("Block 2",'legatus-theme'), "home" => "yes" ),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_9_title_2", "title" => __("Title:",'legatus-theme'), "home" => "yes" ),
				array( "type" => "scroller", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_9_count_2", "title" => __("Post Count:",'legatus-theme'), "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_9_cat_2",
					"taxonomy" => "category",
					"title" => __("Set Category",'legatus-theme'),
					"home" => "yes"
				),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_9_offset_2", "title" => __("From which post should start the loop (for example 4 ), for default leave it empty, or add 0. (Offset):",'legatus-theme'), "home" => "yes" ),
				array( 
					"type" => "color", 
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_9_color_2", 
					"title" => __("Block Title Color:",'legatus-theme'),
					"std" => get_option(THEME_NAME."_default_cat_color"),
					"home" => "yes"
				),

			),

		),
		array(
			"title" => __("Popular Masonry News Block",'legatus-theme'),
			"type" => "homepage_news_block_11",
			"image" => "icon-article-popular.png",
			"description" => __("With image in background",'legatus-theme'),
			"options" => array(
				array( "type" => "scroller", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_11_count", "title" => __("Post Count:",'legatus-theme'), "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_11_cat",
					"taxonomy" => "category",
					"title" => __("Set Category",'legatus-theme'),
					"home" => "yes"
				),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_11_offset", "title" => __("From which post should start the loop (for example 4 ), for default leave it empty, or add 0. (Offset):",'legatus-theme'), "home" => "yes" ),
			),

		),
		array(
			"title" => __("Shop",'legatus-theme'),
			"type" => "homepage_news_block_5",
			"image" => "icon-shop.png",
			"description" => __("Shop Items",'legatus-theme'),
			"options" => array(
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_5_title", "title" => __("Title:",'legatus-theme'), "home" => "yes" ),
				array( "type" => "scroller", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_5_count", "title" => __("Count:",'legatus-theme'), "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_5_cat",
					"taxonomy" => "product_cat",
					"title" => __("Set Category",'legatus-theme'),
					"home" => "yes"
				),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_5_offset", "title" => __("From which post should start the loop (for example 4 ), for default leave it empty, or add 0. (Offset):",'legatus-theme'), "home" => "yes" ),
				array(
					"type" => "select",
					"title" => __("Type:",'legatus-theme'),
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_5_type",
					"options"=>array(
						array("slug"=>"1", "name"=>__("Latest",'legatus-theme')), 
						array("slug"=>"2", "name"=>__("Featured",'legatus-theme')), 
					),
					"home" => "yes"
				),	
				array( 
					"type" => "color", 
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_5_color", 
					"title" => __("Block Title Color:",'legatus-theme'),
					"std" => get_option(THEME_NAME."_default_cat_color"),
					"home" => "yes"
				),					
			),
		),
		array(
			"title" => __("Reviews",'legatus-theme'),
			"type" => "homepage_news_block_8",
			"image" => "icon-review.png",
			"description" => __("Latest/Top reviews.",'legatus-theme'),
			"options" => array(
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_8_title", "title" => __("Title:",'legatus-theme'), "home" => "yes" ),
				array( "type" => "scroller", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_8_count", "title" => __("Count:",'legatus-theme'), "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"title" => __("Set Category",'legatus-theme'),
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_8_cat",
					"taxonomy" => "category",
					"home" => "yes"
				),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_8_offset", "title" => __("From which post should start the loop (for example 4 ), for default leave it empty, or add 0. (Offset):",'legatus-theme'), "home" => "yes" ),
				array(
					"type" => "select",
					"title" => __("Type:",'legatus-theme'),
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_8_type",
					"options"=>array(
						array("slug"=>"latest", "name"=>__("Latest Reviews",'legatus-theme')), 
						array("slug"=>"top", "name"=>__("Top Reviews",'legatus-theme')), 
					),
					"home" => "yes"
				),
				array( 
					"type" => "color", 
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_8_color", 
					"title" => __("Block Title Color:",'legatus-theme'),
					"std" => get_option(THEME_NAME."_default_cat_color"),
					"home" => "yes"
				),
			),
		),	



		array(
			"title" => __("HTML Code",'legatus-theme'),
			"type" => "homepage_html",
			"image" => "icon-html.png",
			"description" => __("Custom HTML/Shortcodes Block",'legatus-theme'),
			"options" => array(
				array( "type" => "textarea", "id" => $orangeThemes_fields->themeslug."_homepage_html", "title" => __("HTML Code:",'legatus-theme'), "home" => "yes" ),
			),
		),
		array(
			"title" => __("Banner Block",'legatus-theme'),
			"type" => "homepage_banner",
			"image" => "icon-banner.png",
			"description" => __("Supports HTML,CSS and Javascript.",'legatus-theme'),
			"options" => array(
				array( "type" => "textarea", "id" => $orangeThemes_fields->themeslug."_homepage_banner", "title" => __("HTML Code:",'legatus-theme'), "home" => "yes","sample" => '<a href="http://www.orange-themes.com" target="_blank"><img src="'.THEME_IMAGE_URL.'banner-468x60.jpg" alt="" title="" /></a>', ),
			),
		),

	)
),


 
 );


$orangeThemes_fields->add_options($orangeThemes_general_options);
?>