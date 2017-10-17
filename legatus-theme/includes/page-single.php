<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	wp_reset_query();

?>
<?php get_template_part(THEME_LOOP."loop-start"); ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part(THEME_SINGLE."page-title"); ?>
				<div class="main-article-content">
					<?php get_template_part(THEME_SINGLE."image");?>
					<!-- BEGIN .shortcode-content -->
					<div class="shortcode-content">
						<?php the_content();?>
					<!-- END .shortcode-content -->
					</div>
				</div>

		<?php endwhile; else: ?>
			<p><?php  _e('Sorry, no posts matched your criteria.','legatus-theme'); ?></p>
		<?php endif; ?>

	<?php wp_reset_query(); ?>
	<?php if ( comments_open() ) : ?>
		<?php comments_template(); // Get comments.php template ?>
	<?php endif; ?>
<?php get_template_part(THEME_LOOP."loop-end"); ?>
				