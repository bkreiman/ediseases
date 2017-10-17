<?php
global $orange_themes_managment;
$orangeThemes_slider_options= array(
 array(
	"type" => "navigation",
	"name" => __("Style Settings",'legatus-theme'),
	"slug" => "custom-styling"
),

array(
	"type" => "tab",
	"slug"=>'custom-styling'
),

array(
	"type" => "sub_navigation",
	"subname"=>array(
		array("slug"=>"font_style", "name"=>__("Font Style",'legatus-theme')),
		array("slug"=>"page_colors", "name"=>__("Page Colors/Style",'legatus-theme')),
		array("slug"=>"page_layout", "name"=>__("Layout",'legatus-theme'))
		)
),

/* ------------------------------------------------------------------------*
 * PAGE FONT SETTINGS
 * ------------------------------------------------------------------------*/

 array(
	"type" => "sub_tab",
	"slug"=> 'font_style'
),

array(
	"type" => "row"
),
array(
	"type" => "title",
	"title" => __("Fonts",'legatus-theme')
),

array(
	"type" => "google_font_select",
	"title" => __("Content text:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_google_font_1",
	"sort" => "alpha",
	"info" => __("Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",'legatus-theme'),
	"default_font" => array('font' => "Arial", 'txt' => "(default)")
),
array(
	"type" => "google_font_select",
	"title" => __("Logo text:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_google_font_2",
	"sort" => "alpha",
	"info" => __("Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",'legatus-theme'),
	"default_font" => array('font' => "Titillium Web", 'txt' => "(default)")
),
array(
	"type" => "google_font_select",
	"title" => __("Main menu text:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_google_font_3",
	"sort" => "alpha",
	"info" => __("Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",'legatus-theme'),
	"default_font" => array('font' => "Titillium Web", 'txt' => "(default)")
),
array(
	"type" => "google_font_select",
	"title" => __("Article title:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_google_font_4",
	"sort" => "alpha",
	"info" => __("Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",'legatus-theme'),
	"default_font" => array('font' => "Titillium Web", 'txt' => "(default)")
),
array(
	"type" => "google_font_select",
	"title" => __("Video title:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_google_font_5",
	"sort" => "alpha",
	"info" => __("Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",'legatus-theme'),
	"default_font" => array('font' => "Titillium Web", 'txt' => "(default)")
),
array(
	"type" => "google_font_select",
	"title" => __("Homepage's photo gallery title:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_google_font_6",
	"sort" => "alpha",
	"info" => __("Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",'legatus-theme'),
	"default_font" => array('font' => "Titillium Web", 'txt' => "(default)")
),
array(
	"type" => "google_font_select",
	"title" => __("Blog page title:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_google_font_7",
	"sort" => "alpha",
	"info" => __("Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",'legatus-theme'),
	"default_font" => array('font' => "Titillium Web", 'txt' => "(default)")
),
array(
	"type" => "google_font_select",
	"title" => __("Comment username:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_google_font_8",
	"sort" => "alpha",
	"info" => __("Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",'legatus-theme'),
	"default_font" => array('font' => "Titillium Web", 'txt' => "(default)")
),
array(
	"type" => "google_font_select",
	"title" => __("\"No comments\" title:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_google_font_9",
	"sort" => "alpha",
	"info" => __("Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",'legatus-theme'),
	"default_font" => array('font' => "Titillium Web", 'txt' => "(default)")
),
array(
	"type" => "google_font_select",
	"title" => __("Error/succes message title:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_google_font_10",
	"sort" => "alpha",
	"info" => __("Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",'legatus-theme'),
	"default_font" => array('font' => "Titillium Web", 'txt' => "(default)")
),
array(
	"type" => "google_font_select",
	"title" => __("Error/succes message second text:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_google_font_11",
	"sort" => "alpha",
	"info" => __("Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",'legatus-theme'),
	"default_font" => array('font' => "Titillium Web", 'txt' => "(default)")
),
array(
	"type" => "google_font_select",
	"title" => __("Gallery Title:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_google_font_12",
	"sort" => "alpha",
	"info" => __("Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",'legatus-theme'),
	"default_font" => array('font' => "Titillium Web", 'txt' => "(default)")
),
array(
	"type" => "google_font_select",
	"title" => __("Homepage's second column article title:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_google_font_13",
	"sort" => "alpha",
	"info" => __("Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",'legatus-theme'),
	"default_font" => array('font' => "Titillium Web", 'txt' => "(default)")
),
array(
	"type" => "google_font_select",
	"title" => __("Sidebar panel title:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_google_font_14",
	"sort" => "alpha",
	"info" => __("Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",'legatus-theme'),
	"default_font" => array('font' => "Titillium Web", 'txt' => "(default)")
),
array(
	"type" => "google_font_select",
	"title" => __("Photo gallery title:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_google_font_15",
	"sort" => "alpha",
	"info" => __("Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",'legatus-theme'),
	"default_font" => array('font' => "Titillium Web", 'txt' => "(default)")
),
array(
	"type" => "google_font_select",
	"title" => __("Sidebar article block title:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_google_font_16",
	"sort" => "alpha",
	"info" => __("Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",'legatus-theme'),
	"default_font" => array('font' => "Titillium Web", 'txt' => "(default)")
),
array(
	"type" => "google_font_select",
	"title" => __("Floating social button likes count text:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_google_font_17",
	"sort" => "alpha",
	"info" => __("Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",'legatus-theme'),
	"default_font" => array('font' => "Titillium Web", 'txt' => "(default)")
),
array(
	"type" => "google_font_select",
	"title" => __("Opened post title:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_google_font_18",
	"sort" => "alpha",
	"info" => __("Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",'legatus-theme'),
	"default_font" => array('font' => "Titillium Web", 'txt' => "(default)")
),
array(
	"type" => "google_font_select",
	"title" => __("Calendar dates:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_google_font_19",
	"sort" => "alpha",
	"info" => __("Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",'legatus-theme'),
	"default_font" => array('font' => "Titillium Web", 'txt' => "(default)")
),
array(
	"type" => "google_font_select",
	"title" => __("Bottom social button likes count text:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_google_font_20",
	"sort" => "alpha",
	"info" => __("Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",'legatus-theme'),
	"default_font" => array('font' => "Titillium Web", 'txt' => "(default)")
),
array(
	"type" => "google_font_select",
	"title" => __("\"About author\" author title:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_google_font_21",
	"sort" => "alpha",
	"info" => __("Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",'legatus-theme'),
	"default_font" => array('font' => "Titillium Web", 'txt' => "(default)")
),


array(
	"type" => "close"

),


array(
"type" => "row",

),
array(
	"type" => "title",
	"title" => __("Font Size",'legatus-theme')
),

array(
	"type" => "scroller",
	"title" => __("Content text size in PX:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_font_size_1",
	"max" => "100",
	"std" => "13"
),
array(
	"type" => "scroller",
	"title" => __("Logo text in PX:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_font_size_2",
	"max" => "100",
	"std" => "55"
),
array(
	"type" => "scroller",
	"title" => __("Main menu text size in PX:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_font_size_3",
	"max" => "100",
	"std" => "14"
),
array(
	"type" => "scroller",
	"title" => __("Article title size in PX:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_font_size_4",
	"max" => "100",
	"std" => "20"
),
array(
	"type" => "scroller",
	"title" => __("Video title size in PX:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_font_size_5",
	"max" => "100",
	"std" => "13"
),
array(
	"type" => "scroller",
	"title" => __("Homepage's photo gallery title size in PX:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_font_size_6",
	"max" => "100",
	"std" => "16"
),
array(
	"type" => "scroller",
	"title" => __("Blog page title size in PX:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_font_size_7",
	"max" => "100",
	"std" => "33"
),
array(
	"type" => "scroller",
	"title" => __("Comment username size in PX:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_font_size_8",
	"max" => "100",
	"std" => "75"
),
array(
	"type" => "scroller",
	"title" => __("\"No comments\" title size in PX:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_font_size_9",
	"max" => "100",
	"std" => "22"
),
array(
	"type" => "scroller",
	"title" => __("Error/succes message title size in PX:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_font_size_10",
	"max" => "100",
	"std" => "80"
),
array(
	"type" => "scroller",
	"title" => __("Error/succes message second text size in PX:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_font_size_11",
	"max" => "100",
	"std" => "40"
),
array(
	"type" => "scroller",
	"title" => __("Gallery Title size in PX:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_font_size_12",
	"max" => "100",
	"std" => "17"
),
array(
	"type" => "scroller",
	"title" => __("Homepage's second column article title size in PX:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_font_size_13",
	"max" => "100",
	"std" => "13"
),
array(
	"type" => "scroller",
	"title" => __("Sidebar panel title size in PX:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_font_size_14",
	"max" => "100",
	"std" => "12"
),
array(
	"type" => "scroller",
	"title" => __("Photo gallery title size in PX:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_font_size_15",
	"max" => "100",
	"std" => "13"
),
array(
	"type" => "scroller",
	"title" => __("Sidebar article block title size in PX:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_font_size_16",
	"max" => "100",
	"std" => "20"
),
array(
	"type" => "scroller",
	"title" => __("Floating social button likes count text size in PX:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_font_size_17",
	"max" => "100",
	"std" => "24"
),
array(
	"type" => "scroller",
	"title" => __("Opened post title size in PX:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_font_size_18",
	"max" => "100",
	"std" => "22"
),
array(
	"type" => "scroller",
	"title" => __("Calendar dates size in PX:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_font_size_19",
	"max" => "100",
	"std" => "28"
),
array(
	"type" => "scroller",
	"title" => __("Bottom social button likes count text size in PX:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_font_size_20",
	"max" => "100",
	"std" => "11"
),
array(
	"type" => "scroller",
	"title" => __("\"About author\" author title size in PX:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_font_size_21",
	"max" => "100",
	"std" => "18"
),

array(
	"type" => "close"

),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __("Font Character Sets",'legatus-theme'),
),

array(
	"type" => "checkbox",
	"title" => __("Cyrillic Extended (cyrillic-ext):",'legatus-theme'),
	"id"=>$orange_themes_managment->themeslug."_font_cyrillic_ex"
),
array(
	"type" => "checkbox",
	"title" => __("Cyrillic (cyrillic):",'legatus-theme'),
	"id"=>$orange_themes_managment->themeslug."_font_cyrillic"
),
array(
	"type" => "checkbox",
	"title" => __("Greek Extended (greek-ext):",'legatus-theme'),
	"id"=>$orange_themes_managment->themeslug."_font_greek_ex"
),
array(
	"type" => "checkbox",
	"title" => __("Greek (greek):",'legatus-theme'),
	"id"=>$orange_themes_managment->themeslug."_font_greek"
),
array(
	"type" => "checkbox",
	"title" => __("Vietnamese (vietnamese):",'legatus-theme'),
	"id"=>$orange_themes_managment->themeslug."_font_vietnamese"
),
array(
	"type" => "checkbox",
	"title" => __("Latin Extended (latin-ext):",'legatus-theme'),
	"id"=>$orange_themes_managment->themeslug."_font_latin_ex"
),
array(
	"type" => "close",

),
array(
	"type" => "save",
	"title" => __("Save Changes",'legatus-theme')
),
   
array(
	"type" => "closesubtab"
),
/* ------------------------------------------------------------------------*
 * PAGE COLORS
 * ------------------------------------------------------------------------*/

 array(
	"type" => "sub_tab",
	"slug"=> 'page_colors'
),

array(
	"type" => "row"
),
array(
	"type" => "title",
	"title" => __("Default Category/News page Color",'legatus-theme')
),

array( 
	"type" => "color", 
	"id" => $orange_themes_managment->themeslug."_default_cat_color", 
	"title" => __("Color:",'legatus-theme'),
	"std" => "264C84",
),

array(
	"type" => "close"
),
array(
	"type" => "row"
),
array(
	"type" => "title",
	"title" => __("Colors",'legatus-theme')
),

array( 
	"type" => "color", 
	"id" => $orange_themes_managment->themeslug."_color_1", 
	"title" => __("Main color scheme:",'legatus-theme'),
	"std" => "264C84",
),
array( 
	"type" => "color", 
	"id" => $orange_themes_managment->themeslug."_color_2", 
	"title" => __("Main links color:",'legatus-theme'),
	"std" => "264C84",
),
array( 
	"type" => "color", 
	"id" => $orange_themes_managment->themeslug."_color_3", 
	"title" => __("Page title color:",'legatus-theme'),
	"std" => "264C84",
),
array( 
	"type" => "color", 
	"id" => $orange_themes_managment->themeslug."_color_4", 
	"title" => __("Pager border color:",'legatus-theme'),
	"std" => "264C84",
),
array( 
	"type" => "color", 
	"id" => $orange_themes_managment->themeslug."_color_5", 
	"title" => __("Gallery shortcode active thumb color:",'legatus-theme'),
	"std" => "264C84",
),



array(
	"type" => "close"
),


array(
	"type" => "row",

),
array(
	"type" => "title",
	"title" => __("Header Background Image",'legatus-theme')
),

array(
	"type" => "upload",
	"title" => __("Background Image:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_header_bg_image",
),

array(
	"type" => "close",

),

array(
	"type" => "row",

),
array(
	"type" => "title",
	"title" => __("Body Backgrounds (only boxed view)",'legatus-theme')
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_body_bg_type",
	"radio" => array(
		array("title" => __("Pattern:",'legatus-theme'), "value" => "pattern"),
		array("title" => __("Custom Image:",'legatus-theme'), "value" => "image"),
		array("title" => __("Color:",'legatus-theme'), "value" => "color"),
	),
	"std" => "pattern"
),

array(
	"type" => "select",
	"title" => __("Patterns ",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_body_pattern",
	"options"=>array(
		array("slug"=>"texture-1", "name"=>__("Texture 1",'legatus-theme')), 
		array("slug"=>"texture-2", "name"=>__("Texture 2",'legatus-theme')), 
		array("slug"=>"texture-3", "name"=>__("Texture 3",'legatus-theme')), 
		array("slug"=>"texture-4", "name"=>__("Texture 4",'legatus-theme')), 
		array("slug"=>"texture-5", "name"=>__("Texture 5",'legatus-theme')), 
		array("slug"=>"texture-6", "name"=>__("Texture 6",'legatus-theme')), 
	),
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_body_bg_type", "value" => "pattern")
	)
),

array(
	"type" => "color",
	"title" => __("Body Background Color:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_body_color",
	"std" => "f1f1f1",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_body_bg_type", "value" => "color")
	)
),

array(
	"type" => "upload",
	"title" => __("Body Background Image:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_body_image",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_body_bg_type", "value" => "image")
	)
),

array(
	"type" => "close",

),

array(
	"type" => "save",
	"title" => __("Save Changes",'legatus-theme'),
),
   
array(
	"type" => "closesubtab"
),
/* ------------------------------------------------------------------------*
 * PAGE LAYOUT
 * ------------------------------------------------------------------------*/

 array(
	"type" => "sub_tab",
	"slug"=> 'page_layout'
),

array(
	"type" => "row"
),
array(
	"type" => "title",
	"title" => __("Enable Responsive",'legatus-theme'),
),

array(
	"type" => "checkbox",
	"title" => __("Enable",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_responsive"
),

array(
	"type" => "close"
),

array(
	"type" => "row"
),
array(
	"type" => "title",
	"title" => __("Fixed Menu",'legatus-theme'),
),

array(
	"type" => "checkbox",
	"title" => __("Enable",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_menu_style"
),

array(
	"type" => "close"
),


array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __("Page Layout",'legatus-theme'),
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_page_layout",
	"radio" => array(
		array("title" => __("Boxed:",'legatus-theme'), "value" => "boxed"),
		array("title" => __("Wide:",'legatus-theme'), "value" => "wide"),
	),
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