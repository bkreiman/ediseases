<?php
	if(get_option(THEME_NAME."_scriptLoad") != "on") {
		header("Content-type: text/javascript");
	}


	function ot_custom_js() { 
		if(get_option(THEME_NAME."_scriptLoad") == "on") {
			echo "<script>";
		} 

			//breaking news slider
			$autostart = get_option(THEME_NAME."_breaking_news_autostart");
			$speedbreaking = get_option(THEME_NAME."_breaking_news_speed");
			if(!$speedbreaking) $speedbreaking = 40;
			if($autostart=="on") {
				$val = "true";
			} else {
				$val = "false";
			}

			//main slider
			$autostartMain = get_option(THEME_NAME."_main_news_autostart");
			$intervalMain = get_option(THEME_NAME."_main_news_interval");
			if($autostartMain=="on") {
				$valMain = "true";
			} else {
				$valMain = "false";
			}

			if(!$intervalMain) $intervalMain = 5000;
		?>

		var breakingStart = <?php echo $val;?>;	// autostart breaking news
		var breakingSpeed = <?php echo $speedbreaking;?>;		// breaking msg speed

		var breakingScroll = [0,0,0,0,0,0,0,0,0,0];
		var breakingOffset = [0,0,0,0,0,0,0,0,0,0];
		var elementsToClone = [true,true,true,true,true,true,true,true,true,true];
		var elementsActive = [];
		var theCount = [0,0,0,0,0,0,0,0,0,0];
		var _legatus_slider_timer;

		// Legatus Slider Options
		var _legatus_slider_autostart = <?php echo $valMain; ?>	// Autostart Slider (false / true)
		var _legatus_slider_interval = <?php echo $intervalMain;?>;	// Autoslide Interval (Def = 5000)
		var _legatus_slider_loading = true;		// Autoslide With Loading Bar (false / true)



			//form validation
			function validateName(fld) {
				"use strict";
				var error = "";
						
				if (fld.value === '' || fld.value === 'Nickname' || fld.value === 'Enter Your Name..' || fld.value === 'Your Name..') {
					error = "<?php printf ( __('You didn\'t enter Your First Name.','legatus-theme'));?>";
				} else if ((fld.value.length < 2) || (fld.value.length > 200)) {
					error = "<?php printf ( __('First Name is the wrong length.','legatus-theme'));?>";
				}
				return error;
			}
					
			function validateEmail(fld) {
				"use strict";
				var error="";
				var illegalChars = /^[^@]+@[^@.]+\.[^@]*\w\w$/;
						
				if (fld.value === "") {
					error = "<?php printf ( __('You didn\'t enter an email address.','legatus-theme'));?>";
				} else if ( fld.value.match(illegalChars) === null) {
					error = "<?php printf ( __('The email address contains illegal characters.','legatus-theme'));?>";
				}

				return error;

			}
					
			function valName(text) {
				"use strict";
				var error = "";
						
				if (text === '' || text === 'Nickname' || text === 'Enter Your Name..' || text === 'Your Name..') {
					error = "<?php printf ( __('You didn\'t enter Your First Name.','legatus-theme'));?>";
				} else if ((text.length < 2) || (text.length > 50)) {
					error = "<?php printf ( __('First Name is the wrong length.','legatus-theme'));?>";
				}
				return error;
			}
					
			function valEmail(text) {
				"use strict";
				var error="";
				var illegalChars = /^[^@]+@[^@.]+\.[^@]*\w\w$/;
						
				if (text === "") {
					error = "<?php printf ( __('You didn\'t enter an email address.','legatus-theme'));?>";
				} else if ( text.match(illegalChars) === null) {
					error = "<?php printf ( __('The email address contains illegal characters.','legatus-theme'));?>";
				}

				return error;

			}
					
			function validateMessage(fld) {
				"use strict";
				var error = "";
						
				if (fld.value === '') {
					error = "<?php printf ( __('You didn\'t enter Your message.','legatus-theme'));?>";
				} else if (fld.value.length < 3) {
					error = "<?php printf ( __('The message is to short.','legatus-theme'));?>";
				}

				return error;
			}		

			function validatecheckbox() {
				"use strict";
				var error = "<?php _e('Please select at least one checkbox!','legatus-theme');?>";
				return error;
			}
<?php
		if(get_option(THEME_NAME."_scriptLoad") == "on") {
			echo "</script>";
		}
	}

	if(get_option(THEME_NAME."_scriptLoad") != "on") {
		ot_custom_js();	
	} 
?>