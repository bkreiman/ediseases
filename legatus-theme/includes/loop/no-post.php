<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	wp_reset_query();

	if (is_pagetemplate_active("template-contact.php")) {
		$contactPages = ot_get_page("contact");
		if($contactPages[0]) {
			$contactUrl = get_page_link($contactPages[0]);
		}
	} else {
		$contactUrl = false;
	}
 ?>

	<div class="the-error-msg">
		<strong class="font-replace"><?php _e("No Articles Found",'legatus-theme');?></strong>
		<p><?php printf(__('Sorry, there are no articles here ! <br/>You can <a href="%1$s">contact us</a> to resolve this problem !','legatus-theme'), $contactUrl);?></p>
		<p><?php printf(__('Or You can still <a href="%1$s">go back to Homepage</a> !','legatus-theme'), home_url());?></p>
	</div>