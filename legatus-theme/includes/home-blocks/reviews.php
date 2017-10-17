<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    $OT_builder = new OT_home_builder; 
    //get block data
    $data = $OT_builder->get_data(); 
    //set query
    $my_query = $data[0]; 
    //extract array data
    extract($data[1]); 

    //meta settings
    $postDate = get_option(THEME_NAME."_post_date_single");

?>

            <!-- BEGIN .content-panel -->
            <div class="content-panel">
                <?php if($title) { ?>
                    <div class="panel-header">
                        <b style="background:<?php echo $pageColor;?>;"><i class="fa fa-star"></i><?php echo $title;?></b>
                    </div>
                <?php } ?>
                <div class="panel-content">

                    <div class="review-block">
                        <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
                            <?php 
                                //register post         
                                $OT_builder->set_double($my_query->post->ID);

                                $averageRating = ot_avarage_rating($my_query->post->ID);
                                $image = get_post_thumb($post->ID,148,90); 
                            ?>
                            <!-- BEGIN .review-item -->
                            <div class="review-item">

                                <?php if($image['show']==true) { ?>                     
                                    <div class="review-image">
                                        <a href="<?php the_permalink();?>" class="img-hover-image">
                                            <img src="<?php echo $image['src'];?>" alt="<?php the_title();?>" />
                                        </a>
                                        <?php 
                                            $categories = get_the_category($post->ID);

                                            $catUrl = get_category_link($categories[0]->term_id);
                                        ?>
                                        <a href="<?php echo $catUrl;?>" class="review-category" style="background:<?php ot_title_color($categories[0]->term_id, "category", true);?>;"><?php echo $categories[0]->name;?></a>
                                    </div>
                                <?php } ?>
                                <div class="review-content">
                                    <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                    <span>
                                        <?php 
                                            add_filter('excerpt_length', 'new_excerpt_length_5');
                                            the_excerpt();
                                            remove_filter('excerpt_length', 'new_excerpt_length_5');
                                        ?>
                                    </span>

                                    <?php if($averageRating!=false) { ?>
                                        <span class="star-rating rating-large" title="<?php _e("Rated",'legatus-theme');?> <?php echo $averageRating[1];?> <?php _e("out of 5 stars",'legatus-theme');?>">
                                            <span style="width:<?php echo $averageRating[0];?>%">
                                                <strong class="rating"><?php echo $averageRating[1];?></strong> <?php _e("out of 5 stars",'legatus-theme');?>
                                            </span>
                                        </span>
                                    <?php } ?>

                                </div>
                                <div class="clear-float"></div>
                            <!-- END .review-item -->
                            </div>
                        <?php endwhile; else: ?>
                            <p><?php printf ( __('No posts were found','legatus-theme')); ?></p>
                        <?php endif; ?> 
                        

                    </div>

                </div>
            <!-- END .content-panel -->
            </div>