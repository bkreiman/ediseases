<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    $OT_builder = new OT_home_builder; 
    //get block data
    $data = $OT_builder->get_data(); 
    //set query
    $my_query = $data[0]; 
    //extract array data
    extract($data[1]); 

?>
    <div class="main-content-blocks">
        <div class="inner-content-blocks js-masonry" >

            <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
                <?php 

                    //register post         
                    $OT_builder->set_double($my_query->post->ID);

                    $image = get_post_thumb($my_query->post->ID,220,320,THEME_NAME.'_masonry_image');
                    $color1 = get_post_meta( $my_query->post->ID, "_".THEME_NAME."_bgColor", true);
                    $color2 = get_post_meta( $my_query->post->ID, "_".THEME_NAME."_textColor", true);

                    if(!$color1) $color1 = "ba4642";
                    if(!$color2) $color2 = "fff";

                ?>

                <div class="custom-block" style="background-color: #<?php echo $color1; ?>;color: #<?php echo $color2; ?>;">
                    <h3><a href="<?php the_permalink(); ?>" style="background-color: #<?php echo $color1; ?>;"><?php the_title(); ?></a></h3>

                    <?php if ( comments_open() && ot_option_compare('post_comments_single','post_comments_single',$my_query->post->ID)==true) { ?>
                        <a href="<?php the_permalink();?>#comments" class="comment-in"><?php comments_number('0','1','%'); ?></a>
                    <?php } ?>

                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo $image["src"]; ?>" class="block-image" alt="<?php echo esc_attr(get_the_title()); ?>" />
                        <span class="hover-block">
                            <span class="hover-background" style="background-color: #<?php echo $color1; ?>;"></span>
                            <span class="author">
                                <span class="author-avatar"><img src="<?php echo ot_get_avatar_url(get_avatar( get_the_author_meta('user_email',get_the_author_meta('ID')), 60));?>" alt="<?php echo esc_attr(get_the_author_meta('display_name',get_the_author_meta('ID'))); ?>" /></span>
                                <b class="user"><?php echo get_the_author_meta('display_name'); ?></b>
                                <b><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) .__(' ago','legatus-theme'); ?></b>
                                <span class="clear-float"></span>
                            </span>
                            <span class="inner-content">
                                <?php 
                                    add_filter('excerpt_length', 'new_excerpt_length_30');
                                    the_excerpt();
                                    remove_filter('excerpt_length', 'new_excerpt_length_30');
                                ?>
                            </span>
                        </span>
                    </a>
                </div>


            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>