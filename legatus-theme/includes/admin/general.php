<?php
global $orange_themes_managment;
$orangeThemes_general_options= array(
 array(
	"type" => "navigation",
	"name" => "General",
	"slug" => "general"
),

array(
	"type" => "tab",
	"slug"=>'general'
),

array(
	"type" => "sub_navigation",
	"subname"=>array(
		array("slug"=>"page", "name"=>__("General",'legatus-theme')), 
		array("slug"=>"blog", "name"=>__("Blog",'legatus-theme')),
		array("slug"=>"gallery", "name"=>__("Gallery",'legatus-theme')),
		array("slug"=>"contact", "name"=>__("Contact/Footer",'legatus-theme')),
		array("slug"=>"banner_settings", "name"=>__("Banners",'legatus-theme'))
	)
),

/* ------------------------------------------------------------------------*
 * PAGE SETTINGS
 * ------------------------------------------------------------------------*/

 array(
	"type" => "sub_tab",
	"slug"=>'page'
),

array(
	"type" => "homepage_set_test",
	"title" => "Set up Your Homepage and post page!",
	"desc" => "	<p><b>You have not selected the correct template page for homepage.</b></p>
	<p>Please make sure, you choose template \"Drag & Drop Page Builder\".</p>
	<br/>
	<ul>
		<li>Current front page: <a href='".get_permalink(get_option('page_on_front'))."'>".get_the_title(get_option('page_on_front'))."</a></li>
		<li>Current blog page: <a href'".get_permalink(get_option('page_for_posts'))."'>".get_the_title(get_option('page_for_posts'))."</a></li>
	</ul>",
	"desc_2" => "<p><b>You have NOT enabled homepage.</b></p>
	<p>To use custom homepage, you must first create two <a href='".home_url()."/wp-admin/post-new.php?post_type=page'>new pages</a>, and one of them assign to \"<b>Homepage</b>\" template.Give each page a title, but avoid adding any text.</p>
	<p>Then enable homepage  in <a href='".home_url()."/wp-admin/options-reading.php'>wordpress reading settings</a> (See \"Front page displays\" option). Select your previously created pages from both dropdowns and save changes.</p>"
),
array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => esc_html("Load dynamic js/css files directly in header", THEME_NAME),
),

array(
	"type" => "checkbox",
	"title" => esc_html("Load in Header (this improves your page speed on some servers, but it depends on server configuration):", THEME_NAME),
	"id"=>$orange_themes_managment->themeslug."_scriptLoad"
),
   

array(
	"type" => "close"
),   
array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __("Add logo image",'legatus-theme')
),
   
array(
	"type" => "upload",
	"title" => __("Add Header Logo Image",'legatus-theme'),
	"info" => __("Suggested image size is 467x60px",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_logo",
),      

array(
	"type" => "close"
),
 array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __("Export/Import Theme Settings",'legatus-theme')
),
   
array(
	"type" => "export_content",
	"title" => __("Export Settings",'legatus-theme'),
	"section" => "management",
	"id" => $orange_themes_managment->themeslug."_export"
),      
   
array(
	"type" => "import_content",
	"title" => __("Import Settings",'legatus-theme'),
	"section" => "management",
	"id" => $orange_themes_managment->themeslug."_import"
),      

array(
	"type" => "close"
),  
array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Favicon"
),
   
array(
	"type" => "upload",
	"title" => "Favicon",
	"info" => "Favicons are the small 16 pixel by 16 pixel pictures you see beside some URLs in your browser's address bar.",
	"id" => $orange_themes_managment->themeslug."_favicon"
),   

array(
	"type" => "close"
),
array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __("Unit Settings",'legatus-theme'),
),

array(
	"type" => "checkbox",
	"title" => __("Show Search In Menu:",'legatus-theme'),
	"id"=>$orange_themes_managment->themeslug."_search"
),
   
array(
	"type" => "checkbox",
	"title" => __("Hide Duplicate Posts On Homepage:",'legatus-theme'),
	"id"=>$orange_themes_managment->themeslug."_duplicate"
),
   

array(
	"type" => "close"
),
array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __("Weather Forecast",'legatus-theme'),
),

array(
	"type" => "checkbox",
	"title" => __("Show Weather Forecast:",'legatus-theme'),
	"id"=>$orange_themes_managment->themeslug."_weather"
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_temperature",
	"radio" => array(
		array("title" => __("Show Temperature In C:",'legatus-theme'), "value" => "C"),
		array("title" => __("Show Temperature In F:",'legatus-theme'), "value" => "F")
	),
	"std" => "C",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_weather", "value" => "on")
	)
),
array(
	"type" => "title",
	"title" => "API type",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_weather", "value" => "on")
	)
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_weather_api_key_type",
	"radio" => array(
		array("title" => __("Free API Key:",'legatus-theme'), "value" => "free"),
		array("title" => __("Premium API Key:",'legatus-theme'), "value" => "premium")
	),
	"std" => "free",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_weather", "value" => "on")
	)
),
array(
	"type" => "title",
	"title" => "Location",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_weather", "value" => "on")
	)
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_weather_location_type",
	"radio" => array(
		array("title" => __("Search For Customer Location:",'legatus-theme'), "value" => "customer"),
		array("title" => __("Set Your Own Custom Location:",'legatus-theme'), "value" => "custom")
	),
	"std" => "customer",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_weather", "value" => "on")
	)
),
array(
	"type" => "input",
	"title" => __("City Name, Country",'legatus-theme'),
	"info" => __("Example - London,United Kingdom",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_weather_city",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_weather_location_type", "value" => "custom")
	)
),

array(
	"type" => "input",
	"title" => __("API Key",'legatus-theme'),
	"info" => __("The API Key You Can Get Here: <a href='https://developer.worldweatheronline.com/auth/register' style='color:#fff' target='_blank'>Register API Key</a>",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_weather_api_2",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_weather", "value" => "on")
	)
),


array(
	"type" => "close"
),


array(
	"type" => "save",
	"title" => __("Save Changes",'legatus-theme'),
),
   
array(
	"type" => "closesubtab"
),

/* ------------------------------------------------------------------------*
 * BLOG SETTINGS
 * ------------------------------------------------------------------------*/   
  
array(
	"type" => "sub_tab",
	"slug"=>'blog'
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __("Blog Page Title in Singel News", 'legatus-theme')
),

array(
	"type" => "checkbox",
	"title" => __("Show", 'legatus-theme'),
	"id"=>$orange_themes_managment->themeslug."_singlePostBlogTitle"
),


array(
	"type" => "close"
),
array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __("Unit Settings",'legatus-theme'),
),

array(
	"type" => "checkbox",
	"title" => __("Show RSS In Post/Blog/Category Pages:",'legatus-theme'),
	"id"=>$orange_themes_managment->themeslug."_rss_button"
),
array(
	"type" => "checkbox",
	"title" => __("Show thumbnails in blog post list:",'legatus-theme'),
	"id"=>$orange_themes_managment->themeslug."_show_first_thumb",
),

array(
	"type" => "checkbox",
	"title" => __("Show \"no image\" thumbnail, when no thumbnail is available:",'legatus-theme'),
	"id"=>$orange_themes_managment->themeslug."_show_no_image_thumb"
),
array(
	"type" => "close"
),
array(
	"type" => "row"
),
array(
	"type" => "title",
	"title" => __("Show thumbnail in open post/page",'legatus-theme')
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_show_single_thumb",
	"radio" => array(
		array("title" => __("Show:",'legatus-theme'), "value" => "show"),
		array("title" => __("Hide:",'legatus-theme'), "value" => "hide"),
		array("title" => __("Custom For Each Post:",'legatus-theme'), "value" => "custom")
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
	"title" => __("Show Icons on Thumbnails in Post Listing Pages",'legatus-theme')
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_showTumbIcon",
	"radio" => array(
		array("title" => __("Show:",'legatus-theme'), "value" => "show"),
		array("title" => __("Hide:",'legatus-theme'), "value" => "hide"),
		array("title" => __("Custom For Each Post:",'legatus-theme'), "value" => "custom")
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
	"title" => __("Show Post Title In Single Post/Page",'legatus-theme')
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_show_single_title",
	"radio" => array(
		array("title" => __("Show:",'legatus-theme'), "value" => "show"),
		array("title" => __("Hide:",'legatus-theme'), "value" => "hide"),
		array("title" => __("Custom For Each Post:",'legatus-theme'), "value" => "custom")
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
	"title" => __("Show Post Author",'legatus-theme')
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_post_author_single",
	"radio" => array(
		array("title" => __("Show:",'legatus-theme'), "value" => "show"),
		array("title" => __("Hide:",'legatus-theme'), "value" => "hide"),
		array("title" => __("Custom For Each Post:",'legatus-theme'), "value" => "custom")
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
	"title" => __("Show Post Date",'legatus-theme')
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_post_date_single",
	"radio" => array(
		array("title" => __("Show:",'legatus-theme'), "value" => "show"),
		array("title" => __("Hide:",'legatus-theme'), "value" => "hide"),
		array("title" => __("Custom For Each Post:",'legatus-theme'), "value" => "custom")
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
	"title" => __("Show Post Print Option",'legatus-theme')
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_printPost",
	"radio" => array(
		array("title" => __("Show:",'legatus-theme'), "value" => "show"),
		array("title" => __("Hide:",'legatus-theme'), "value" => "hide"),
		array("title" => __("Custom For Each Post:",'legatus-theme'), "value" => "custom")
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
	"title" => __("Show \"About Author\" In Single Post",'legatus-theme')
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_about_author",
	"radio" => array(
		array("title" => __("Show:",'legatus-theme'), "value" => "show"),
		array("title" => __("Hide:",'legatus-theme'), "value" => "hide"),
		array("title" => __("Custom For Each Post:",'legatus-theme'), "value" => "custom")
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
	"title" => __("Show \"Similar News\" In Single Post",'legatus-theme')
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_similar_posts",
	"radio" => array(
		array("title" => __("Show:",'legatus-theme'), "value" => "show"),
		array("title" => __("Hide:",'legatus-theme'), "value" => "hide"),
		array("title" => __("Custom For Each Post:",'legatus-theme'), "value" => "custom")
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
	"title" => __("Show Share Buttons",'legatus-theme')
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_share_all",
	"radio" => array(
		array("title" => __("Show:",'legatus-theme'), "value" => "show"),
		array("title" => __("Hide:",'legatus-theme'), "value" => "hide"),
		array("title" => __("Custom For Each Post/Page:",'legatus-theme'), "value" => "custom")
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
	"title" => __("Show Post Comment Count",'legatus-theme')
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_post_comments_single",
	"radio" => array(
		array("title" => __("Show:",'legatus-theme'), "value" => "show"),
		array("title" => __("Hide:",'legatus-theme'), "value" => "hide"),
		array("title" => __("Custom For Each Post:",'legatus-theme'), "value" => "custom")
	),
	"std" => "custom"
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
 * CONTACT SETTINGS
 * ------------------------------------------------------------------------*/   

array(
	"type" => "sub_tab",
	"slug"=>'contact'
),
array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __("Twitter Account",'legatus-theme')
),

array(
	"type" => "input",
	"title" => __("Twitter Account Name:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_twitter_name"
),

array(
	"type" => "close"
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __("Footer CopyRight",'legatus-theme'),
),

array(
	"type" => "textarea",
	"title" => __("Text:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_copyright"
),

array(
	"type" => "close"
),


array(
	"type" => "save",
	"title" => __("Save Changes",'legatus-theme'),
),

array(
	"type" => "closesubtab"
),


/* ------------------------------------------------------------------------*
 * GALLERY SETTINGS
 * ------------------------------------------------------------------------*/   
array(
	"type" => "sub_tab",
	"slug"=>'gallery'
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title"=> __('Gallery Settings','legatus-theme')
),

array(
	"type" => "input",
	"title" => __("Items per gallery page:",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_gallery_items",
	"number" => "yes",
	"std" => "6"
),

array(
	"type" => "close"
),
/*
array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __("Show \"Similar Posts\" In Single Galley",'legatus-theme')
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_similar_posts_gallery",
	"radio" => array(
		array("title" => __("Show:",'legatus-theme'), "value" => "show"),
		array("title" => __("Hide:",'legatus-theme'), "value" => "hide"),
		array("title" => __("Custom For Each Gallery Page:",'legatus-theme'), "value" => "custom")
	),
	"std" => "custom"
),

array(
	"type" => "close"
),
*/
array(
	"type" => "save",
	"title" => __("Save Changes",'legatus-theme'),
),

array(
	"type" => "closesubtab"
),


/* ------------------------------------------------------------------------*
 * BANNER SETTINGS
 * ------------------------------------------------------------------------*/   

array(
	"type" => "sub_tab",
	"slug"=>'banner_settings'
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __("Header Banner",'legatus-theme')
),

array(
	"type" => "checkbox",
	"title" => __("Enable Banner",'legatus-theme'),
	"id" => $orange_themes_managment->themeslug."_top_banner",
	"std" => "off"
),

array(
	"type" => "textarea",
	"title" => __("Banner HTML Code",'legatus-theme'),
	"sample" => '<a href="http://www.orange-themes.com" target="_blank"><img src="'.THEME_IMAGE_URL.'no-banner-468x60.jpg" alt="" title="" /></a>',
	"id" => $orange_themes_managment->themeslug."_top_banner_code",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_top_banner", "value" => "on")
	)
),

array(
	"type" => "close"
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __("Select Pop Up Banner Type",'legatus-theme'),
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_banner_type",
	"radio" => array(
		array("title" => "Off", "value" => "off"),
		array("title" => "Banner With Image", "value" => "image"),
		array("title" => "Banner With Text Or HTML Code", "value" => "text"),
		array("title" => "Banner With Image &amp; Text", "value" => "text_image")
	),
	"std" => "off"
),

array(
	"type" => "upload",
	"title" => "Add Banner Image",
	"id" => $orange_themes_managment->themeslug."_banner_image",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_banner_type", "value" => "image")
	)
),

array(
	"type" => "textarea",
	"title" => "Banner content",
	"info" => "You can copy also some HTML code here.",
	"id" => $orange_themes_managment->themeslug."_banner_text",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_banner_type", "value" => "text")
	)
),

array(
	"type" => "upload",
	"title" => "Add Banner Image",
	"id" => $orange_themes_managment->themeslug."_banner_text_image_img",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_banner_type", "value" => "text_image")
	)
),

array(
	"type" => "textarea",
	"title" => "Banner text",
	"info" => "You add only text.",
	"id" => $orange_themes_managment->themeslug."_banner_text_image_txt",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_banner_type", "value" => "text_image")
	)
),

array(
	"type" => "close"
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Banner Settings",
),

array(
	"type" => "select",
	"title" => "Start Time",
	"id" => $orange_themes_managment->themeslug."_banner_start",
	"options"=>array(
		array("slug"=>"0", "name"=>"0 Secconds"), 
		array("slug"=>"5", "name"=>"5 Secconds"),
		array("slug"=>"10", "name"=>"10 Secconds"),
		array("slug"=>"15", "name"=>"15 Secconds"),
		array("slug"=>"20", "name"=>"20 Secconds"),
		array("slug"=>"25", "name"=>"25 Secconds"),
		array("slug"=>"30", "name"=>"30 Secconds"),
		array("slug"=>"60", "name"=>"1 Minute"),
		array("slug"=>"120", "name"=>"2 Minute"),
		array("slug"=>"180", "name"=>"3 Minute"),

		),
	"std" => "off"
),

array(
	"type" => "select",
	"title" => "Close Time",
	"id" => $orange_themes_managment->themeslug."_banner_close",
	"options"=>array(
		array("slug"=>"0", "name"=>"Off"), 
		array("slug"=>"5", "name"=>"5 Secconds"),
		array("slug"=>"10", "name"=>"10 Secconds"),
		array("slug"=>"15", "name"=>"15 Secconds"),
		array("slug"=>"20", "name"=>"20 Secconds"),
		array("slug"=>"25", "name"=>"25 Secconds"),
		array("slug"=>"30", "name"=>"30 Secconds"),
		array("slug"=>"60", "name"=>"1 Minute"),
		array("slug"=>"120", "name"=>"2 Minute"),
		array("slug"=>"180", "name"=>"3 Minute"),

		),
	"std" => "off"
),

array(
	"type" => "select",
	"title" => "Fly In From",
	"id" => $orange_themes_managment->themeslug."_banner_fly_in",
	"options"=>array(
		array("slug"=>"off", "name"=>"Off"), 
		array("slug"=>"top", "name"=>"Top"),
		array("slug"=>"top-left", "name"=>"Top Left"),
		array("slug"=>"top-right", "name"=>"Top Right"),
		array("slug"=>"left", "name"=>"Left"),
		array("slug"=>"bottom", "name"=>"Bottom"),
		array("slug"=>"bottom-left", "name"=>"Bottom Left"),
		array("slug"=>"bottom-right", "name"=>"Bottom Right"),
		),
	"std" => "off"
),

array(
	"type" => "select",
	"title" => "Fly Out To",
	"id" => $orange_themes_managment->themeslug."_banner_fly_out",
	"options"=>array(
		array("slug"=>"off", "name"=>"Off"), 
		array("slug"=>"top", "name"=>"Top"),
		array("slug"=>"top-left", "name"=>"Top Left"),
		array("slug"=>"top-right", "name"=>"Top Right"),
		array("slug"=>"left", "name"=>"Left"),
		array("slug"=>"bottom", "name"=>"Bottom"),
		array("slug"=>"bottom-left", "name"=>"Bottom Left"),
		array("slug"=>"bottom-right", "name"=>"Bottom Right"),
		),
	"std" => "off"
),

array(
	"type" => "select",
	"title" => "Show Banner after",
	"info" => "How many times site may be viewed until the popup will be shown again",
	"id" => $orange_themes_managment->themeslug."_banner_views",
	"options"=>array(
		array("slug"=>"0", "name"=>"0 Click"), 
		array("slug"=>"1", "name"=>"1 Click"),
		array("slug"=>"2", "name"=>"2 Clicks"),
		array("slug"=>"2", "name"=>"3 Clicks"),
		array("slug"=>"4", "name"=>"4 Clicks"),
		array("slug"=>"5", "name"=>"5 Clicks"),
		array("slug"=>"10", "name"=>"10 Clicks"),
		array("slug"=>"20", "name"=>"20 Clicks"),
		),
	"std" => "off"
),

array(
	"type" => "select",
	"title" => "How offen show the banner",
	"id" => $orange_themes_managment->themeslug."_banner_timeout",
	"options"=>array(
		array("slug"=>"0", "name"=>"One time per visit"), 
		array("slug"=>"1", "name"=>"Once a day"), 
		array("slug"=>"2", "name"=>"Once in 2 days"),
		array("slug"=>"3", "name"=>"Once in 3 days"),
		),
	"std" => "off"
),

array(
	"type" => "checkbox",
	"title" => "Enable Background Overlay:",
	"id" => $orange_themes_managment->themeslug."_banner_overlay",
	"std" => "off"
),

array(
	"type" => "close"
),

array(
	"type" => "save",
	"title" => "Save Changes"
),

array(
	"type" => "closesubtab"
),

array(
	"type" => "closetab"
)
 
 );


$orange_themes_managment->add_options($orangeThemes_general_options);
?>