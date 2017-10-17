<?php
	global $orange_themes_managment, $options;
	$orange_themes_managment = new OrangeThemesManagment(THEME_FULL_NAME, THEME_NAME);


	//load the files that contain the options
	$options_files=array('general', 'style', 'slider', 'sidebar', 'documentation');
	foreach($options_files as $file){
		get_template_part(THEME_ADMIN_INCLUDES.$file);
	}


	$options = $orange_themes_managment->get_options();


	function theme_configuration() {
		
		global $orange_themes_managment;

		$orange_themes_managment->print_heading("get more from Orange Themes!");
		$orange_themes_managment->print_options();
		$orange_themes_managment->print_footer();
	}

	add_action('admin_menu', 'theme_menu');

	function theme_menu() {

		global $options;
		
		$nonsavable_types = array(
			'navigation', 
			'tab',
			'sub_navigation',
			'meta_sub_navigation',
			'sub_tab',
			'meta_sub_tab',
			'homepage_set_test',
			'save',
			'closesubtab',
			'closetab',
			'row',
			'close'
		);

		//insert the default values if the fields are empty
		foreach ($options as $value) {
			if( isset( $value['id'] ) && get_option($value['id'])=='' && isset($value['std']) && !in_array($value['type'], $nonsavable_types)){
				update_option( $value['id'], $value['std']);
			}
		}

		//save the field's values if the Save action is present
		if ( isset( $_GET['page'] ) && $_GET['page'] == 'theme-configuration' ) {
			if ( isset( $_REQUEST['action'] ) && 'save' == $_REQUEST['action'] ) {
				//verify the nonce
				if ( empty($_POST) || !wp_verify_nonce($_POST['orange-theme-options'],'orange-theme-update-options') )
				{
				   __e('Sorry, your nonce did not verify.','legatus-theme');
				   exit;
				}else{
					if(get_option('orange_themes_first_save')==''){
						update_option('orange_themes_first_save', 'saved');
					}
					foreach ($options as $value) {
						if(isset($value['id']) && isset($_REQUEST[$value['id']]) && !in_array($value['type'],$nonsavable_types)) {
							
							if($value['type']=="checkbox" && $_REQUEST[$value['id']]=="on"){
								update_option($value['id'],$_REQUEST[$value['id']]); 
							}
							if($value['type']=="aweber_input") {
								$arrayAweber = get_option(THEME_NAME."_aweber_keys");
								 
								if(empty($arrayAweber) || $_REQUEST[$value['id']] != get_option($value['id'])) {
									$oauth_id = $_REQUEST[$value['id']];
									
									if($oauth_id) {
										try {
											list($consumerKey, $consumerSecret, $accessKey, $accessSecret) = AWeberAPI::getDataFromAweberID($oauth_id);
										} catch (AWeberAPIException $exc) {
											list($consumerKey, $consumerSecret, $accessKey, $accessSecret) = null;
											# make error messages customer friendly.
											$descr = $exc->description;
											$descr = preg_replace('/http.*$/i', '', $descr);     # strip labs.aweber.com documentation url from error message
											$descr = preg_replace('/[\.\!:]+.*$/i', '', $descr); # strip anything following a . : or ! character
											$error_code = " ($descr)";
										} catch (AWeberOAuthDataMissing $exc) {
											list($consumerKey, $consumerSecret, $accessKey, $accessSecret) = null;
										} catch (AWeberException $exc) {
											list($consumerKey, $consumerSecret, $accessKey, $accessSecret) = null;
										}
									}
									
									$keys = array(
										'consumer_key' => $consumerKey,
										'consumer_secret' => $consumerSecret,
										'access_key' => $accessKey,
										'access_secret' => $accessSecret,
									);
									
									update_option(THEME_NAME."_aweber_keys", $keys);
									update_option($value['id'], $_REQUEST[$value['id']]);
								}
	
							}
							
							if($value['type']!="checkbox" && $value['type']!="aweber_input") {
								update_option($value['id'],$_REQUEST[$value['id']]); 
							}
						} elseif(!in_array($value['type'], $nonsavable_types) && isset($value['id'])){
							if($value['type']!="aweber_input") {
								delete_option( $value['id'] ); 
							}
						}

						if($value['type']=='add_text') {
							$old_val = $_REQUEST[ $value['id'].'s' ];
							$old_val = explode( "|*|", $old_val );
							
							if (!in_array($_REQUEST[ $value['id'] ], $old_val)) {
								update_option( $value['id'].'s', $_REQUEST[ $value['id'].'s' ].sanitize_title($_REQUEST[ $value['id'] ])."|*|" ); 
							}
							
						}
					}
					header("Location: admin.php?page=theme-configuration&saved=true");
					die;
				}		
			} 
		}

		/* fix for not working menu after import
		if ( isset( $_GET['theme_mods'] ) && $_GET['theme_mods'] == 'delete' ) {
			delete_option("theme_mods_".THEME_NAME."-theme");
		}
		*/
		//management setting import/export
		if ( isset( $_GET['ot-export'] ) && $_GET['ot-export'] == 'download' ) {
			global $wpdb;

			if($_GET['ot-export-type']=="management") {
				$pageType = "management panel ";
			} else if($_GET['ot-export-type']=="pagebuilder") {
				$pageType = get_the_title($_GET['post'])." ";
			}

			$exportfile = THEME_NAME.' export '.$pageType.date('Y-m-d').' at '.date('H.i.s').'.json';
			
			if($_GET['ot-export-type']=="management") {
				$querystr = "
				    SELECT $wpdb->options.*
				    FROM $wpdb->options
				    WHERE $wpdb->options.option_name LIKE '%".THEME_NAME."_%'
				    AND $wpdb->options.option_name NOT LIKE '%theme_mods_%' 
				";
				$data = $wpdb->get_results($querystr, OBJECT);
			} else if($_GET['ot-export-type']=="pagebuilder") {
				$data = get_option(THEME_NAME."_homepage_layout_order_".$_GET['post']);
				
			}

		    // Set the headers to force a download
		    header('Content-type: application/force-download');
		    header('Content-Disposition: attachment; filename="'.str_replace(' ', '_', $exportfile).'"');

		    $encode = "base";
		    $encode.= "64";
		    $encode.= "_";
		    $encode.= "encode";

			die($encode(json_encode($data)));
		}

		if ( isset( $_GET['ot-export'] ) && $_GET['ot-export'] == 'upload' ) {

			// Check export file if any
			if(isset($_FILES['ot_import']['tmp_name'])) {

			    $decode = "base";
			    $decode.= "64";
			    $decode.= "_";
			    $decode.= "decode";

				if ( ! function_exists( 'wp_handle_upload' ) ) {
				    require_once( ABSPATH . 'wp-admin/includes/file.php' );
				}
				$overrides = array( 'test_form' => false, 'test_type' => false );
				$upload = wp_handle_upload($_FILES['ot_import'],$overrides);

				if ( isset( $upload['error'] ) ) {
					return $upload;
				}

			
				$response  = wp_remote_get($upload['url']);

				$data = $decode($response['body']);

				if(!$parsed = json_decode($data, true)) {
					$parsed = unserialize($data);
				}

				

				if($_GET['ot-export-type']=="management") {

					if(is_array($parsed)) {

						foreach($parsed as $value) {

							if($value['option_name'] != THEME_NAME."_google_font_list") {

								update_option($value['option_name'],$value['option_value']);
							}
						
						}
					
					}
				} else if($_GET['ot-export-type']=="pagebuilder") {
					update_option(THEME_NAME."_homepage_layout_order_".$_GET['post'],$parsed);
				}
				die();
				
			}

		}
		add_theme_page(THEME_FULL_NAME.esc_html__(" Management",'legatus-theme'), THEME_FULL_NAME.esc_html__(" Management",'legatus-theme'), 'administrator', 'theme-configuration', 'theme_configuration');
		
	}

	
?>