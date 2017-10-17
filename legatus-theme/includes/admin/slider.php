<?php
global $orange_themes_managment;
$orangeThemes_slider_options= array(
 array(
	"type" => "navigation",
	"name" => __("Slider Settings",'legatus-theme'),
	"slug" => "sliders"
),

array(
	"type" => "tab",
	"slug"=>'sliders'
),

array(
	"type" => "sub_navigation",
	"subname"=>array(
		array("slug"=>"breaking_slider", "name"=>__("Breaking News Sliders",'legatus-theme')),
		array("slug"=>"main_slider", "name"=>__("Main News Sliders",'legatus-theme'))
		)
),

/* ------------------------------------------------------------------------*
 * BREACKING NEWS SLIDER SETTINGS
 * ------------------------------------------------------------------------*/

 array(
	"type" => "sub_tab",
	"slug"=> 'breaking_slider'
),

array(
	"type" => "row",

),
array(
	"type" => "title",
	"title" => __("Breaking News Sliders Main Settings",'legatus-theme')
),
array(
	"type" => "checkbox",
	"id" => $orange_themes_managment->themeslug."_breaking_news_autostart",
	"title" => __("Breaking Slider Auto Start",'legatus-theme')
),

array(
	"type" => "scroller",
	"id" => $orange_themes_managment->themeslug."_breaking_news_speed",
	"title" => __("Breaking Slider Speed",'legatus-theme'),
	"max" => 200,
	"std" => 40
),

array(
	"title" => __("Breaking News Slider Slide Count",'legatus-theme'),
	"type" => "scroller",
	"id" => $orange_themes_managment->themeslug."_breaking_slider_count",
	"max" => "20",
	"std" => "5",
),

array(
	"type" => "title",
	"title" => __("Breaking News Slider Type",'legatus-theme')
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_breakingNewsType",
	"radio" => array(
		array("title" => __("Show All News From Category in The Slider:",'legatus-theme'), "value" => "show"),
		array("title" => __("Custom Posts:",'legatus-theme'), "value" => "custom")
	),
	"std" => "custom"
),


array(
	"type" => "close",

),

array(
	"type" => "row"
),
array(
	"type" => "title",
	"title" => __("Footer Slider",'legatus-theme')
),
array(
	"type" => "checkbox",
	"id" => $orange_themes_managment->themeslug."_breaking_footer",
	"title" => __("Enable Breaking Slider In Footer",'legatus-theme')
),

array(
	"type" => "multiple_select",
	"id" => $orange_themes_managment->themeslug."_breaking_slider_cat_footer",
	"taxonomy" => "category",
	"title" => __("Set Footer Breaking Slider Category",'legatus-theme'),
	"default" => array('', __("Latest News From All Categories",'legatus-theme')),
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_breaking_footer", "value" => "on")
	)

),

array(
	"type" => "close",

),

array(
	"type" => "row"
),
array(
	"type" => "title",
	"title" => __("Breaking News Slider In Single Posts",'legatus-theme')
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_breaking_single",
	"radio" => array(
		array("title" => __("Show:",'legatus-theme'), "value" => "show"),
		array("title" => __("Hide:",'legatus-theme'), "value" => "hide"),
		array("title" => __("Custom For Each Post:",'legatus-theme'), "value" => "custom")
	),
	"std" => "custom"
),
array(
	"type" => "multiple_select",
	"id" => $orange_themes_managment->themeslug."_breaking_single_cat",
	"taxonomy" => "category",
	"title" => __("Set Category For Single Post Breaking Slider",'legatus-theme'),
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_breaking_single", "value" => "show")
	)

),
array(
	"type" => "close"
),

array(
	"type" => "save",
	"title" => __("Save Changes",'legatus-theme')
),
   
array(
	"type" => "closesubtab"
),

/* ------------------------------------------------------------------------*
 * MAIN NEWS SLIDER SETTINGS
 * ------------------------------------------------------------------------*/

 array(
	"type" => "sub_tab",
	"slug"=> 'main_slider'
),

array(
	"type" => "row",

),
array(
	"type" => "title",
	"title" => __("Main News Sliders Settings",'legatus-theme')
),
array(
	"type" => "checkbox",
	"id" => $orange_themes_managment->themeslug."_main_news_autostart",
	"title" => __("Main Slider Auto Start",'legatus-theme')
),

array(
	"type" => "scroller",
	"id" => $orange_themes_managment->themeslug."_main_news_speed",
	"title" => __("Main Slide Interval in ms",'legatus-theme'),
	"max" => 2000,
	"std" => 5000
),

array(
	"title" => __("Main News Slider Slide Count",'legatus-theme'),
	"type" => "scroller",
	"id" => $orange_themes_managment->themeslug."_main_slider_count",
	"max" => "12",
	"std" => "6",
),
array(
	"type" => "close"
),

array(
	"type" => "save",
	"title" => __("Save Changes",'legatus-theme')
),
   
array(
	"type" => "closesubtab"
),

array(
	"type" => "closetab"
)
 
);

$orange_themes_managment->add_options($orangeThemes_slider_options);
?>