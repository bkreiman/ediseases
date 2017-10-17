<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    $OT_builder = new OT_home_builder; 
    //get block data
    $data = $OT_builder->get_data(); 
    //extract array data
    extract($data[0]); 

    $contactID = ot_get_page('contact', false);
   
?>
		<!-- BEGIN .main-nosplit -->
		<div class="main-nosplit">
			<!-- BEGIN .banner -->
			<div class="banner">
				<div class="banner-block">
					<?php echo $code;?>
				</div>
					<?php if (is_pagetemplate_active("template-contact.php")) { ?>
						<div class="banner-info">
							<a href="<?php echo get_page_link($contactID);?>" class="sponsored">
								<span class="icon-default">&nbsp;</span><?php _e("Sponsored Advert",'legatus-theme');?><span class="icon-default">&nbsp;</span>
							</a>
						</div>
					<?php } ?>

			<!-- END .banner -->
			</div>
		</div>

