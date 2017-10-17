<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
Template Name: Contact Page
*/	
?>
<?php get_header(); ?>
<?php 
	wp_reset_query();
	$mail_to = get_post_meta ( $post->ID, "_".THEME_NAME."_contact_mail", true ); 
	$map = get_post_meta ( $post->ID,  "_".THEME_NAME."_map", true ); 

?>

<?php get_template_part(THEME_LOOP."loop-start"); ?>
	<?php if($mail_to) { ?>
		<?php if (have_posts()) : ?>
			<?php get_template_part(THEME_SINGLE."page-title"); ?>
			<div class="shortcode-content">
				
				<div class="paragraph-double">
					<div class="paragraph-block">
						<?php the_content(); ?>
					</div>
					<div class="paragraph-block">
						<h2 class="text-indent"><?php _e("Send Us a Message",'legatus-theme');?></h2>
						
						<div class="contact-form">

						<div class="alert-box contact-success-block" style="display:none; background-color:#5EC253;"><i class="fa 128077"></i>
							<span class="alert-text">
								<?php _e("Great Success!",'legatus-theme');?> <?php _e("Your comment went through!",'legatus-theme');?>
							</span>
							<a href="#" class="closebutton">&#10060;</a>
						</div>



						<form id="writecomment" name="writecomment" class="contact-form" action="">


							<input type="hidden"  name="form_type" value="contact" />
							<input type="hidden"  name="post_id" value="<?php echo $post->ID;?>" />

							<p class="contact-form-user">
								<label for="c_name"><?php _e("Nickname",'legatus-theme');?><span class="required">*</span></label>
								<input type="text" name="u_name" id="contact-name-input" placeholder="<?php _e("Nickname",'legatus-theme');?>" title="<?php _e("Nickname",'legatus-theme');?>" />
								<span class="error-msg comment-error" id="contact-name-error" style="display:none;"><i class="fa fa-exclamation-triangle"></i>&nbsp;&nbsp;<font class="ot-error-text"></font></span>
							</p>
							<p class="contact-form-email">
								<label for="c_name"><?php _e("E-mail",'legatus-theme');?><span class="required">*</span></label>
								<input type="text" name="email" id="contact-mail-input" placeholder="<?php _e("E-mail",'legatus-theme');?>" title="<?php _e("E-mail",'legatus-theme');?>" />
								<span class="error-msg comment-error" id="contact-mail-error" style="display:none;"><i class="fa fa-exclamation-triangle"></i>&nbsp;&nbsp;<font class="ot-error-text"></font></span>
							</p>
							<p class="contact-form-website">
								<label for="c_website"><?php _e("Website",'legatus-theme');?></label>
								<input type="text" placeholder="<?php _e("Website",'legatus-theme');?>" name="url" id="contact-url-input" title="<?php _e("Website",'legatus-theme');?>" />
							</p>
							<p class="contact-form-message">
								<label for="c_name"><?php _e("Your message",'legatus-theme');?><span class="required">*</span></label>
								<textarea name="message" placeholder="<?php _e("Your message",'legatus-theme');?>" id="contact-message-input"></textarea>
								<span class="error-msg comment-error" id="contact-message-error" style="display:none;"><i class="fa fa-exclamation-triangle"></i>&nbsp;&nbsp;<font class="ot-error-text"></font></span>
							</p>
							<p>
								<input name="submit" type="submit" class="submit-button" id="contact-submit" value="<?php printf ( __('Send a Message','legatus-theme'));?>" />
							</p>
						</form>
						</div>

					</div>
				</div>

				<div class="spacer-break-2 with-icon" style="background-color:#e6e6e6;color:#e6e6e6;"><i class="fa fa-map-marker"></i></div>
				<?php 
					if($map) {
					 	echo $map;
					} 
				?> 
			</div>
		<?php else: ?>
			<p><?php printf ( __('Sorry, no posts matched your criteria.','legatus-theme')); ?></p>
		<?php endif; ?>
	<?php } else { echo "<span style=\"color:#000; font-size:14pt;\">You need to set up Your contact mail!</span>"; } ?>
<?php get_template_part(THEME_LOOP."loop-end"); ?>
<?php get_footer(); ?>
