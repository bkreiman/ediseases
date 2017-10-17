<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php printf ( __('This post is password protected. Enter the password to view comments.','legatus-theme'));?></p>
	<?php
		return;
	}

	

?>
<?php //You can start editing here. ?>

						<div class="content-article-title">
							<h2><?php comments_number(__('0 Comments','legatus-theme'), __('1 Comment','legatus-theme'), __('% Comments','legatus-theme')); ?></h2>
							<div class="right-title-side">
								<a href="#top"><i class="fa fa-angle-up"></i><?php _e("Scroll Back To Top",'legatus-theme');?></a>
								<a href="#respond"><i class="fa fa-pencil"></i><?php _e("Write Comment",'legatus-theme');?></a>
							</div>
						</div>

						<div class="comment-block">

							<?php if ( have_comments() && comments_open()) : ?>
								<ol class="comments" id="comments">
									<?php wp_list_comments('type=comment&callback=orangethemes_comment'); ?>
								</ol>
								<div class="comments-pager"><?php paginate_comments_links(); ?></div>
								
							 <?php else : // this is displayed if there are no comments so far ?>

								<?php if ( comments_open() ) : ?>
									<!-- If comments are open, but there are no comments. -->
										<div class="no-comment-block">
											<span class="icon-text big-icon"><i class="fa fa-comments"></i></span>
											<b><?php _e('No Comments Yet!','legatus-theme');?></b>
											<p><?php _e('There are no comments at the moment, do you want to add one?','legatus-theme');?></p>
											<a href="#respond" class="icon-link"><i class="fa fa-reply"></i><?php _e('Write a comment','legatus-theme');?></a>
										</div>
										<div class="split-line"></div>
								<?php endif; ?>
							<?php endif; ?>
							
						</div>
								<?php if ( comments_open() ) : ?>

									<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
									<p class="registered-user-restriction"><?php printf ( __('Only <a href="%1$s"> registered </a> users can comment.','legatus-theme'), wp_login_url( get_permalink() ));?> </p>
									<?php else : ?>
										<div class="content-article-title">
											<h2><?php _e('Write a Comment','legatus-theme');?></h2>
											<div class="right-title-side">
												<a href="#top"><i class="fa fa-angle-up"></i><?php _e('Scroll Back To Top','legatus-theme');?></a>
											</div>
										</div>

										<a href="#" name="respond"></a>
											<?php 
												$defaults = array(
													'comment_field'       	=> '<p class="comment-form-text"><label for="comment">'.__("Comment:",'legatus-theme').'</label><textarea name="comment" id="comment" placeholder="'.__("Your comment..",'legatus-theme').'"></textarea></p>',
													'comment_notes_before' 	=> '',
													'comment_notes_after'  	=> '',
													'id_form'              	=> 'writecomment',
													'id_submit'            	=> 'submit',
													'title_reply'          => '',
													'title_reply_to'       => '',
													'cancel_reply_link'    	=> '',
													'label_submit'         	=> ''.__('Post a Comment','legatus-theme').'',
												);
												comment_form($defaults);			
											?>

									<?php endif; // if you delete this the sky will fall on your head ?>

								<?php endif; ?>