 <?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	get_header();
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
			<!-- BEGIN .content -->
			<div class="content">
				
				<!-- BEGIN .wrapper -->
				<div class="wrapper">
						
					<!-- BEGIN .main-content-full -->
					<div class="main-content-full">
						
						<div class="content-article-title">
							<h2><?php _e("Error 404",'legatus-theme');?></h2>
							<div class="right-title-side">
								<br/>
								<a href="<?php echo home_url();?>"><i class="fa fa-reply"></i><?php _e("Back To Homepage",'legatus-theme');?></a>
							</div>
						</div>

						<div class="huge-message">
							<b class="big-title"><?php _e("Error 404",'legatus-theme');?></b>
							<b class="small-title"><?php _e("PAGE NOT FOUND",'legatus-theme');?></b>
							<p><?php _e("Sorry, someone has already been here before... <br/> and he probably broke this page",'legatus-theme');?></p>
							<a href="<?php echo home_url();?>" class="icon-link"><i class="fa fa-reply"></i><?php _e("Back to Homepage",'legatus-theme');?></a>
						</div>

					<!-- END .main-content-full -->
					</div>
					
					<div class="clear-float"></div>
					
				<!-- END .wrapper -->
				</div>
				
			<!-- BEGIN .content -->
			</div>


<?php get_footer(); ?>