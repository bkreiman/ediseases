<?php

$homepage = get_option( 'show_on_front');
if( $homepage == "page" ) {
	$meta = get_post_custom_values("_wp_page_template",get_option( 'page_on_front'));
	if($homepage == "page" && $meta[0] == "template-homepage.php") {$has_homepage=true;} else {$has_homepage=false;}
}
	
	
function register_my_menus() {
	if ( function_exists( 'register_nav_menus' ) ) {
		register_nav_menus(
			array( 
				'top-menu' => __('Top Menu','legatus-theme'),
				'middle-menu' => __('Main Menu','legatus-theme'),
				'third-menu' => __('Menu Bellow Main Menu','legatus-theme'),
				'ot-menu-1' => __('Footer Menu','legatus-theme'),
			)
		);
	}	
}


function orange_register_sidebar($name, $id, $description){
	register_sidebar(array('name'=>$name,
		'id' => $id,
		'description' => $description,
		'before_widget' => '<div class="panel">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
	));
}



/* -------------------------------------------------------------------------*
 * 							DEFAULT SIDEBARS								*
 * -------------------------------------------------------------------------*/
$stickySidebar = get_option ( THEME_NAME."_sticky_sidebar" );
$orange_sidebars=array();
$orange_sidebars[] = array('name'=>__('Default Sidebar','legatus-theme'), 'id'=>'default','description' => __('The default page sidebar.','legatus-theme'));
$orange_sidebars[] = array('name'=>__('Default Left Sidebar','legatus-theme'), 'id'=>'default_left','description' => __('Default splitted left sidebar.','legatus-theme'));
$orange_sidebars[] = array('name'=>__('Default Right Sidebar','legatus-theme'), 'id'=>'default_right','description' => __('Default splitted right sidebar.','legatus-theme'));
if(function_exists('is_woocommerce')) {
	$orange_sidebars[] = array('name'=>'Woocommerce', 'id'=>'ot_woocommerce', 'description' => __('Woocommerce Page Sidebar','legatus-theme'));	
}
if(function_exists("is_bbpress")) {
	$orange_sidebars[] = array('name'=>'bbPress', 'id'=>'ot_bbpress', 'description' => __('bbPress Page Sidebar','legatus-theme'));
}
if(function_exists("is_buddypress")) {
	$orange_sidebars[] = array('name'=>'BuddyPress', 'id'=>'ot_buddypress', 'description' => __('BuddyPress Page Sidebar','legatus-theme'));	
}
if($stickySidebar=="on") {
	$orange_sidebars[] = array('name'=>'Sicky Sidebar', 'id'=>'sicky_sidebar', 'description' => __('Sticky sidebar under the main sidebar, that will stay fixed while you scroll down the page','legatus-theme'));	
}

$sidebar_strings = get_option(THEME_NAME.'_sidebar_names');
$generated_sidebars = explode("|*|", $sidebar_strings);
array_pop($generated_sidebars);
$orange_generated_sidebars=array();
	
foreach($generated_sidebars as $sidebar) {
	$orange_sidebars[]=array('name'=>$sidebar, 'id'=>convert_to_class($sidebar), 'description'=>$sidebar);
	$orange_generated_sidebars[]=array('name'=>$sidebar, 'id'=>convert_to_class($sidebar), 'description'=>$sidebar);
}
 
 /* -------------------------------------------------------------------------*
 * 							REGISTER ALL SIDEBARS
 * -------------------------------------------------------------------------*/

if (function_exists('register_sidebar')) {
	
	//register the sidebars
	foreach($orange_sidebars as $sidebar){
		orange_register_sidebar($sidebar['name'], $sidebar['id'], $sidebar['description']);
	}
	
}

add_action('init', 'register_my_menus' );
add_theme_support( 'post-thumbnails' );

add_theme_support( "title-tag" );

?>