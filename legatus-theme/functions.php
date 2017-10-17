<?php
	set_time_limit(0);
	error_reporting('E_ALL');

	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	define("THEME_NAME", 'legatus');
	define("THEME_FULL_NAME", 'Legatus');


	// THEME PATHS
	define("THEME_FUNCTIONS_PATH",TEMPLATEPATH."/functions/");
	define("THEME_INCLUDES_PATH",TEMPLATEPATH."/includes/");
	define("THEME_SCRIPTS_PATH",TEMPLATEPATH."/js/");
	define("THEME_CSS_PATH",TEMPLATEPATH."/css/");

	define("THEME_ADMIN_INCLUDES_PATH", THEME_INCLUDES_PATH."admin/");
	define("THEME_WIDGETS_PATH", THEME_INCLUDES_PATH."widgets/");

	//POST TYPES
	if (!defined('OT_POST_GALLERY')) {
		define("OT_POST_GALLERY","gallery");
	}
	define("OT_POST_PORTFOLIO","portfolio");
	

	define("THEME_FUNCTIONS", "functions/");

	define("THEME_INCLUDES", "includes/");
	define("THEME_SLIDERS", THEME_INCLUDES."sliders/");
	define("THEME_LOOP", THEME_INCLUDES."loop/");
	define("THEME_SINGLE", THEME_INCLUDES."single/");
	define("THEME_ADMIN_INCLUDES", THEME_INCLUDES."admin/");
	define("THEME_CACHE", "cache/");
	define("THEME_SCRIPTS", "js/");
	define("THEME_CSS", "css/");

	define("THEME_URL", get_template_directory_uri());

	define("THEME_CSS_URL",THEME_URL."/css/");
	define("THEME_CSS_ADMIN_URL",THEME_URL."/css/admin/");
	define("THEME_JS_URL",THEME_URL."/js/");
	define("THEME_JS_ADMIN_URL",THEME_URL."/js/admin/");
	define("THEME_IMAGE_URL",THEME_URL."/images/");
	define("THEME_IMAGE_CPANEL_URL",THEME_IMAGE_URL."/control-panel-images/");
	define("THEME_IMAGE_MTHEMES_URL",THEME_IMAGE_URL."/more-themes-images/");
	define("THEME_FUNCTIONS_URL",THEME_URL."/functions/");

	define("THEME_ADMIN_URL",THEME_URL."/includes/admin/");
	define("THEME_HOME_BLOCKS", THEME_INCLUDES."home-blocks/");



	require_once(THEME_FUNCTIONS_PATH."tax-meta-class/tax-meta-class.php");
	require_once(THEME_INCLUDES_PATH."theme-config.php");
	require_once(THEME_FUNCTIONS_PATH."init.php");
	if(get_option(THEME_NAME."_scriptLoad") == "on") {
		require_once(THEME_CSS_PATH."dynamic-css.php");	
		require_once(THEME_CSS_PATH."fonts.php");	
		require_once(THEME_SCRIPTS_PATH."scripts.php");	
		add_action('wp_head','ot_custom_style');
		add_action('wp_head','ot_custom_fonts');
		add_action('wp_head','ot_custom_js');
	}
	require_once(THEME_WIDGETS_PATH."init.php");
	



	//remove visual composer notifier
	if(function_exists('vc_set_as_theme')) {
		vc_set_as_theme($notifier = false);
	}

	//woocomerce
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
	add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
	add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

	function my_theme_wrapper_start() {
	  echo '<section id="main">';
	}

	function my_theme_wrapper_end() {
	  echo '</section>';
	}
	
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	$shopCount = 12; 
	if($shopCount) {
		add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$shopCount.';' ), 20 );
	}

	if ( ot_is_woocommerce_activated() == true && version_compare( WOOCOMMERCE_VERSION, "2.1" ) >= 0 ) {
		add_filter( 'woocommerce_enqueue_styles', '__return_false' );
	} else {
		define( 'WOOCOMMERCE_USE_CSS', false );
	}

	//remove layserslider notifier
	$GLOBALS['lsAutoUpdateBox'] = false;
	foreach ( array( 'pre_term_description' ) as $filter ) {
		remove_filter( $filter, 'wp_filter_kses' );
	}

	foreach ( array( 'term_description' ) as $filter ) {
		remove_filter( $filter, 'wp_kses_data' );
	}
/* new fixings */
add_action('wp_enqueue_scripts', 'legatus_custom_enqueue_scripts');
function legatus_custom_enqueue_scripts(){
	if(is_category()){
		wp_enqueue_style('jquery-ui', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
		wp_enqueue_script(array('jquery-ui-core', 'jquery-ui-tabs'));
	}
}

add_filter('posts_where', 'legatus_rkb_posts_request');

function legatus_rkb_posts_request($data){
	if(is_category() && $catid = get_query_var('cat')){
		global $wpdb;
		$data = "AND ({$wpdb->term_relationships}.term_taxonomy_id = {$catid})";
		$data .= " AND {$wpdb->posts}.post_type = 'post' AND {$wpdb->posts}.post_status = 'publish'";
	}
	return $data;
}

add_action('wp', 'legatus_rkb_init', 2000);

function legatus_rkb_init(){
	if(is_category()){
		remove_action( 'wp_head', '_wp_render_title_tag', 1);
		add_action( 'wp_head', 'legatus_rkb_wp_title', 1);		
	}
}

add_filter('wpseo_opengraph_title', 'legatus_rkb_generate_cat_title', 100, 1);
add_filter('wpseo_twitter_title', 'legatus_rkb_generate_cat_title', 100, 1);

function legatus_rkb_wp_title(){
	if($title = legatus_rkb_generate_cat_title('')){
		echo "<title>".esc_html($title)."</title>\n";
	}else{
		_wp_render_title_tag();
	}
}

function legatus_rkb_generate_cat_title($title){
	$catid = get_query_var('cat');
	if($catid && $category = get_category($catid)){
		$title = '';
		if($category->parent > 0){
			$parent = get_category($category->parent);
			$title .= ucwords($parent->name);
			$title .= ' - ';
		}
		$title .= ucwords($category->name);
	}
	return $title;
}