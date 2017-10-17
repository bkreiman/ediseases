<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	wp_reset_query();

?>					

<?php if (ot_option_compare('show_single_title','show_single_title',$post->ID)==true) { ?>
	<div class="content-article-title">
		<h2><?php the_title(); ?></h2>
		<div class="right-title-side">
			<br/>
			<a href="<?php echo home_url();?>"><i class="fa fa-angle-left"></i><?php _e("Back To Homepage",'legatus-theme');?></a>
		</div>
	</div>
<?php } ?>