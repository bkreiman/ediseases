<?php
global $orange_themes_managment;
$orangeThemes_sidebar_options= array(
 array(
	"type" => "navigation",
	"name" => "Sidebar Settings",
	"slug" => "sidebars"
),

array(
	"type" => "tab",
	"slug"=>'sidebar_settings'
),

array(
	"type" => "sub_navigation",
	"subname"=>array(
			array("slug"=>"sidebar", "name"=>__("Sidebar",'legatus-theme'))
		)
),

/* ------------------------------------------------------------------------*
 * SIDEBAR GENERATOR
 * ------------------------------------------------------------------------*/

 array(
	"type" => "sub_tab",
	"slug"=>'sidebar'
),
array(
	"type" => "row"
),
array(
	"type" => "title",
	"title" => __("Sidebar Default Type",'legatus-theme')
),
array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_sidebar_type",
	"radio" => array(
		array("title" => __("Default sidebar",'legatus-theme'), "value" => "1"),
		array("title" => __("Splitted sidebar",'legatus-theme'), "value" => "2"),
		array("title" => __("Splitted & Default sidebar",'legatus-theme'), "value" => "3"),
		array("title" => __("Default & Splitted sidebar",'legatus-theme'), "value" => "4"),
		array("title" => __("Custom For Each Page/Post:",'legatus-theme'), "value" => "custom")
	),
	"std" => "custom"
),
array(
	"type" => "close"
),
array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __("Default Sidebar Position",'legatus-theme')
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_sidebar_position",
	"radio" => array(
		array("title" => __("Left:",'legatus-theme'), "value" => "left"),
		array("title" => __("Right:",'legatus-theme'), "value" => "right"),
		array("title" => __("Custom For Each Page:",'legatus-theme'), "value" => "custom")
	),
	"std" => "custom"
),
array(
	"type" => "close"
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __("Add Sidebar",'legatus-theme'),
),

array(
	"type" => "add_text",
	"title" => __("Add New Sidebar:",'legatus-theme'),
	"id" => THEME_NAME."_sidebar_name"
),

array(
	"type" => "close"
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __("Sidebar Sequence",'legatus-theme'),
	"info" => __("To sort the slides just drag and drop them!",'legatus-theme')
),

array(
	"type" => "sidebar_order",
	"title" => __("Order Sidebars",'legatus-theme'),
	"id" => THEME_NAME."_sidebar_name"
),
  
array(
	"type" => "close"
),
 
array(
	"type" => "closesubtab"
),

array(
	"type" => "closetab"
)
 
);

$orange_themes_managment->add_options($orangeThemes_sidebar_options);
?>