<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* -------------------------------------------------------------------------*
 * 								HOMEPAGE BUILDER							*
 * -------------------------------------------------------------------------*/
 
class OT_home_builder {

	private static $data;
	public static $counter = 1; 
	public static $duplicateArray = array();

	private function ot_option($option) {
		return get_option(THEME_NAME."_".$option);
	}
	/* -------------------------------------------------------------------------*
	 * 							HOMEPAGE LATEST NEWS						*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_news_block($blockType, $blockId,$blockInputType) {
		global $post;

		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$blogStyle = get_option(THEME_NAME."_".$blockType."_style_".$blockId);
		$offset = get_option(THEME_NAME."_".$blockType."_offset_".$blockId);
		$related = get_option(THEME_NAME."_".$blockType."_related_".$blockId);
		$pagination = get_option(THEME_NAME."_".$blockType."_pagination_".$blockId);

		if($cat) {
			$link = get_category_link($cat);
		} else {
			$link = get_page_link(get_option('page_for_posts'));
		}

		if($pagination=="yes") {
			$paged = get_query_string_paged();

			//set wp query
			$args = array(
				'post_type' => "post",
				'cat' => $cat,
				'paged' => $paged,
				'offset' =>$offset,
				'posts_per_page' => $count,
				'ignore_sticky_posts' => "1"
			);
		} else {
			$paged = false;

			//set wp query
			$args = array(
				'post_type' => "post",
				'cat' => $cat,
				'offset' =>$offset,
				'showposts' => $count,
				'ignore_sticky_posts' => "1"
			);
		}

		if($this->ot_option("duplicate") == "on") {
			$args['post__not_in'] = $this->get_double();
		}

		$my_query = new WP_Query($args);
	

		
		//blog post count
		$postCount = $count;
		$blogBigNewsCount = round($postCount*(0.3));
		if(!$blogBigNewsCount) $blogBigNewsCount = 6;
		$postInPage = $my_query->post_count;



		//set block attributes
		$attr = array(
			'related' =>$related,
			'blogStyle' =>$blogStyle,
			'count' =>$count,
			'cat' => $cat,
			'offset' =>$offset,
			'blogBigNewsCount' =>$blogBigNewsCount,
			'postInPage' =>$postInPage,
			'paged' =>$paged,
			'pagination' =>$pagination,
			'link' =>$link

		);




		//add all data in array
		$data = array($my_query, $attr);

		//set data
		$this->set_data($data);
		$block = "latest-news-1";
		return $block;

	}

	/* -------------------------------------------------------------------------*
	 * 							HOMEPAGE VIDEO BLOCK		 					*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_news_block_2($blockType, $blockId,$blockInputType) {
		global $post;

		$title = stripslashes(get_option(THEME_NAME."_".$blockType."_title_".$blockId));
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$offset = get_option(THEME_NAME."_".$blockType."_offset_".$blockId);
		$pageColor = "#".get_option(THEME_NAME."_".$blockType."_color_".$blockId);

		//set wp query
		$args = array(
			'showposts' => 5,
			'order' => 'DESC',
			'cat' => $cat,
			'offset' =>$offset,
			'meta_query' => array(
			    array(
			        'key' => "_".THEME_NAME.'_video_code',
			        'value'   => array(''),
			        'compare' => 'NOT IN'
			    )
			),
			'post_type'=> 'post',
			'ignore_sticky_posts' => true
		);

		if($this->ot_option("duplicate") == "on") {
			$args['post__not_in'] = $this->get_double();
		}

		$my_query = new WP_Query($args);
	

		//set block attributes
		$attr = array(
			'title' =>$title,
			'cat' => $cat,
			'offset' =>$offset,
			'pageColor' =>$pageColor,
			'link' => false,
		);


		//add all data in array
		$data = array($my_query, $attr);

		//set data
		$this->set_data($data);
		$block = "latest-video";
		return $block;
	}


	/* -------------------------------------------------------------------------*
	 * 							HOMEPAGE LATEST GALLERIE						*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_news_block_3($blockType, $blockId,$blockInputType) {
		global $post;

		$title = stripslashes(get_option(THEME_NAME."_".$blockType."_title_".$blockId));
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$offset = get_option(THEME_NAME."_".$blockType."_offset_".$blockId);
		$pageColor = "#".get_option(THEME_NAME."_".$blockType."_color_".$blockId);


		if(!$cat) {
			$args = array(
				'post_type' => OT_POST_GALLERY, 
				'posts_per_page' => $count,
				'offset' =>$offset,
				'ignore_sticky_posts' => 1
			);
			$link = get_page_link(ot_get_page("gallery", false));
		} else {
			$args = array(
				'post_type' => OT_POST_GALLERY, 
				'tax_query' => array(
					array(
						'taxonomy' => OT_POST_GALLERY.'-cat',
						'field' => 'id',
						'terms' => $cat
					)
				),
				'posts_per_page' => $count,
				'offset' =>$offset,
				'ignore_sticky_posts' => 1
			);
			$link = get_term_link((int)$cat, OT_POST_GALLERY.'-cat');
		}


		$my_query = new WP_Query($args);
	
		
		//set block attributes
		$attr = array(
			'title' =>$title,
			'count' =>$count,
			'cat' =>$cat,
			'offset' =>$offset,
			'pageColor' =>$pageColor,
			'link' => $link,

		);

		//add all data in array
		$data = array($my_query, $attr);

		//set data
		$this->set_data($data);
		$block = "latest-galleries";
		return $block;
	}

	/* -------------------------------------------------------------------------*
	 * 							LATEST NEWS BLOCK								*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_news_block_4($blockType, $blockId,$blockInputType) {
		global $post;

		$title = stripslashes(get_option(THEME_NAME."_".$blockType."_title_".$blockId));
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$offset = get_option(THEME_NAME."_".$blockType."_offset_".$blockId);
		$pageColor = "#".get_option(THEME_NAME."_".$blockType."_color_".$blockId);
	
		if($cat) {
			$link = get_category_link($cat);
		} else {
			$link = get_page_link(get_option('page_for_posts'));
		}

		//set wp query
		$args = array(
			'post_type' => "post",
			'cat' => $cat,
			'offset' =>$offset,
			'showposts' => $count,
			'ignore_sticky_posts' => "1"
		);

		if($this->ot_option("duplicate") == "on") {
			$args['post__not_in'] = $this->get_double();
		}

		$my_query = new WP_Query($args);

		//set block attributes
		$attr = array(
			'title' =>$title,
			'count' =>$count,
			'link' =>$link,
			'cat' => $cat,
			'pageColor' => $pageColor,
		);



		//add all data in array
		$data = array($my_query, $attr);

		//set data
		$this->set_data($data);
		$block = "latest-news-2";
		return $block;

	}
	/* -------------------------------------------------------------------------*
	 * 						LATEST MASONRY NEWS BLOCK							*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_news_block_10($blockType, $blockId,$blockInputType) {
		global $post;

		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$offset = get_option(THEME_NAME."_".$blockType."_offset_".$blockId);

		if($cat) {
			$link = get_category_link($cat);
		} else {
			$link = get_page_link(get_option('page_for_posts'));
		}

		//set wp query
		$args = array(
			'post_type' => "post",
			'cat' => $cat,
			'offset' =>$offset,
			'showposts' => $count,
			'ignore_sticky_posts' => "1"
		);

		if($this->ot_option("duplicate") == "on") {
			$args['post__not_in'] = $this->get_double();
		}

		$my_query = new WP_Query($args);

		//set block attributes
		$attr = array(
			'count' =>$count,
			'link' =>$link,
			'cat' => $cat
		);



		//add all data in array
		$data = array($my_query, $attr);

		//set data
		$this->set_data($data);
		$block = "latest-news-4";
		return $block;

	}

	/* -------------------------------------------------------------------------*
	 * 							HOMEPAGE SHOP BLOCK							*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_news_block_5($blockType, $blockId,$blockInputType) {
		global $post;
		$title = stripslashes(get_option(THEME_NAME."_".$blockType."_title_".$blockId));
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$offset = get_option(THEME_NAME."_".$blockType."_offset_".$blockId);
		$type = get_option(THEME_NAME."_".$blockType."_type_".$blockId);
		$pageColor = "#".get_option(THEME_NAME."_".$blockType."_color_".$blockId);
	
		if(!$offset) {
			$offset = "0";
		}

		if($cat && $type=="1") {
			$link = get_term_link(intval($cat), 'product_cat');
		} else if($type=="1" && !$cat) {
			if(ot_is_woocommerce_activated()==true) {
				$link = get_page_link(woocommerce_get_page_id('shop'));
			} else {
				$link = false;
			}
		} else {
				$link = false;
		}

		//set block attributes
		$attr = array(
			'title' =>$title,
			'count' =>$count,
			'cat' => $cat,
			'offset' =>$offset,
			'link' =>$link,
			'pageColor' =>$pageColor,
		);

		if($type=="1") {
			if($cat) {
				//set wp query
				$args = array(
					'post_type' => "product",
					'tax_query' => array(
						array(
							'taxonomy' => 'product_cat',
							'field' => 'id',
							'terms' => $cat
						)
					),
					'showposts' => $count,
					'ignore_sticky_posts' => "1",
					'offset' =>$offset
				);
			} else {
				//set wp query
				$args = array(
					'post_type' => "product",
					'showposts' => $count,
					'ignore_sticky_posts' => "1",
					'offset' =>$offset
				);
			}
		} else {
				//set wp query
				$args = array(
					'post_type' => "product",
					'showposts' => $count,
					'ignore_sticky_posts' => "1",
					'offset' =>$offset,
					'post_status '	=> 'publish',
					'meta_key'	=> '_featured',
					'meta_value'	=> 'yes',
				);
		}


		$my_query = new WP_Query($args);

		//add all data in array
		$data = array($my_query, $attr);

		//set data
		$this->set_data($data);
		$block = "shop";
		return $block;

	}


	/* -------------------------------------------------------------------------*
	 * 							HOMEPAGE LATEST NEWS BLOCK						*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_news_block_6($blockType, $blockId,$blockInputType) {
		global $post;
		$data = array();
		for($i=1; $i<=2; $i++) {
			$title = stripslashes(get_option(THEME_NAME."_".$blockType."_title_".$i."_".$blockId));
			$count = get_option(THEME_NAME."_".$blockType."_count_".$i."_".$blockId);
			$cat = get_option(THEME_NAME."_".$blockType."_cat_".$i."_".$blockId);
			$offset = get_option(THEME_NAME."_".$blockType."_offset_".$i."_".$blockId);
			$pageColor = "#".get_option(THEME_NAME."_".$blockType."_color_".$i."_".$blockId);

			if($cat) {
				$link = get_category_link($cat);
			} else {
				$link = get_page_link(get_option('page_for_posts'));
			}

			//set wp query
			$args = array(
				'post_type' => "post",
				'cat' => $cat,
				'offset' =>$offset,
				'showposts' => $count,
				'ignore_sticky_posts' => "1"
			);

			if($this->ot_option("duplicate") == "on") {
				$args['post__not_in'] = $this->get_double();
			}

			$my_query = new WP_Query($args);


			//set block attributes
			$attr = array(
				'title' =>$title,
				'count' =>$count,
				'cat' => $cat,
				'offset' =>$offset,
				'link' =>$link,
				'pageColor' =>$pageColor,

			);

			//add all data in array
			$data[$i] = array($my_query, $attr);
		}


		//set data
		$this->set_data($data);
		$block = "latest-news-3";
		return $block;

	}

	/* -------------------------------------------------------------------------*
	 * 							POPULAR NEWS BLOCK								*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_news_block_7($blockType, $blockId,$blockInputType) {
		global $post;

		$title = stripslashes(get_option(THEME_NAME."_".$blockType."_title_".$blockId));
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$offset = get_option(THEME_NAME."_".$blockType."_offset_".$blockId);
		$pageColor = "#".get_option(THEME_NAME."_".$blockType."_color_".$blockId);

		$link = false;

		//set wp query
		$args = array(
			'post_type' => "post",
			'cat' => $cat,
			'offset' =>$offset,
			'showposts' => $count,
			'orderby'	=> 'meta_value_num',
			'meta_key'	=> "_".THEME_NAME.'_post_views_count',
			'ignore_sticky_posts' => "1"
		);


		if($this->ot_option("duplicate") == "on") {
			$args['post__not_in'] = $this->get_double();
		}

		$my_query = new WP_Query($args);

		//set block attributes
		$attr = array(
			'title' =>$title,
			'count' =>$count,
			'link' =>$link,
			'pageColor' =>$pageColor,
			'cat' => $cat,
		);



		//add all data in array
		$data = array($my_query, $attr);

		//set data
		$this->set_data($data);
		$block = "latest-news-2";
		return $block;

	}
	/* -------------------------------------------------------------------------*
	 * 						POPULAR MASONRY NEWS BLOCK							*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_news_block_11($blockType, $blockId,$blockInputType) {
		global $post;

		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$offset = get_option(THEME_NAME."_".$blockType."_offset_".$blockId);

		$link = false;

		//set wp query
		$args = array(
			'post_type' => "post",
			'cat' => $cat,
			'offset' =>$offset,
			'showposts' => $count,
			'orderby'	=> 'meta_value_num',
			'meta_key'	=> "_".THEME_NAME.'_post_views_count',
			'ignore_sticky_posts' => "1"
		);


		if($this->ot_option("duplicate") == "on") {
			$args['post__not_in'] = $this->get_double();
		}

		$my_query = new WP_Query($args);

		//set block attributes
		$attr = array(
			'count' =>$count,
			'link' =>$link,
			'cat' => $cat,
		);



		//add all data in array
		$data = array($my_query, $attr);

		//set data
		$this->set_data($data);
		$block = "latest-news-4";
		return $block;

	}

	/* -------------------------------------------------------------------------*
	 * 							HOMEPAGE LATEST REVIEWS							*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_news_block_8($blockType, $blockId,$blockInputType) {
		global $post;
		$title = stripslashes(get_option(THEME_NAME."_".$blockType."_title_".$blockId));
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$offset = get_option(THEME_NAME."_".$blockType."_offset_".$blockId);
		$type = get_option(THEME_NAME."_".$blockType."_type_".$blockId);
		$pageColor = "#".get_option(THEME_NAME."_".$blockType."_color_".$blockId);

		if(!$offset) {
			$offset = "0";
		}


		//set block attributes
		$attr = array(
			'title' =>$title,
			'cat' => $cat,
			'offset' =>$offset,
			'pageColor' =>$pageColor,
		);

		if($type=="top") {
			//set wp query
			$args = array(
				'showposts' => $count,
				'post_type' => "post",
				'cat' => $cat,
				'ignore_sticky_posts' => "1",
				'order' => 'DESC',
				'orderby'	=> 'meta_value_num',
				'meta_key'	=> "_".THEME_NAME.'_ratings_average',
				'offset' =>$offset
			);
		} else {
			//set wp query
			$args = array(
				'post_type' => "post",
				'cat' => $cat,
				'order' => 'DESC',
				'showposts' => $count,
				'ignore_sticky_posts' => "1",
				'meta_query' => array(
				    array(
				        'key' => "_".THEME_NAME.'_ratings_average',
				        'value'   => '0',
				        'compare' => '>='
				    )
				),
				'offset' =>$offset
			);	
		}

		if($this->ot_option("duplicate") == "on") {
			$args['post__not_in'] = $this->get_double();
		}

		$my_query = new WP_Query($args);

		//add all data in array
		$data = array($my_query, $attr);

		//set data
		$this->set_data($data);
		$block = "reviews";
		return $block;

	}



	/* -------------------------------------------------------------------------*
	 * 							POPULAR LATEST NEWS BLOCK						*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_news_block_9($blockType, $blockId,$blockInputType) {
		global $post;
		$data = array();
		for($i=1; $i<=2; $i++) {
			$title = stripslashes(get_option(THEME_NAME."_".$blockType."_title_".$i."_".$blockId));
			$count = get_option(THEME_NAME."_".$blockType."_count_".$i."_".$blockId);
			$cat = get_option(THEME_NAME."_".$blockType."_cat_".$i."_".$blockId);
			$offset = get_option(THEME_NAME."_".$blockType."_offset_".$i."_".$blockId);
			$pageColor = "#".get_option(THEME_NAME."_".$blockType."_color_".$i."_".$blockId);
			$link = false;


			//set wp query
			$args = array(
				'post_type' => "post",
				'cat' => $cat,
				'offset' =>$offset,
				'showposts' => $count,
				'order' => 'DESC',
				'orderby'	=> 'meta_value_num',
				'meta_key'	=> "_".THEME_NAME.'_ratings_average',
				'ignore_sticky_posts' => "1"
			);

			if($this->ot_option("duplicate") == "on") {
				$args['post__not_in'] = $this->get_double();
			}

			$my_query = new WP_Query($args);


			//set block attributes
			$attr = array(
				'title' =>$title,
				'count' =>$count,
				'cat' => $cat,
				'offset' =>$offset,
				'link' =>$link,
				'pageColor' =>$pageColor,

			);

			//add all data in array
			$data[$i] = array($my_query, $attr);
		}


		//set data
		$this->set_data($data);
		$block = "latest-news-3";
		return $block;

	}

	/* -------------------------------------------------------------------------*
	 * 							HOMEPAGE HTML BLOCK								*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_html($blockType, $blockId,$blockInputType) {
		global $post;
		$code = get_option(THEME_NAME."_".$blockType."_".$blockId);
		//$title = get_option(THEME_NAME."_".$blockType."_title_".$blockId);

		
		//set block attributes
		$attr = array(
			'code' =>wpautop(stripslashes(do_shortcode($code))),
			//'title' =>stripslashes($title),
		);


		//add all data in array
		$data = array($attr);

		//set data
		$this->set_data($data);
		$block = "html";
		return $block;

	}
	/* -------------------------------------------------------------------------*
	 * 							HOMEPAGE BANNER BLOCK							*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_banner($blockType, $blockId,$blockInputType) {
		global $post;
		$code = get_option(THEME_NAME."_".$blockType."_".$blockId);

		
		//set block attributes
		$attr = array(
			'code' =>stripslashes(do_shortcode($code))
		);

		//add all data in array
		$data = array($attr);

		//set data
		$this->set_data($data);
		$block = "banner";
		return $block;

	}

	public static function set_double($data) {
		self::$duplicateArray[] = $data;
	}

	public static function get_double() {
		return self::$duplicateArray;
	}

	private static function set_data($data) {
		self::$data = $data;
	}

	public static function get_data() {
		return self::$data;
	}


} 
?>