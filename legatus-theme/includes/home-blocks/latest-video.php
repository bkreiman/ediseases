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

    $counter = 1;
    $postCount = $my_query->post_count;
?>
        <!-- BEGIN .main-nosplit -->
        <div class="main-nosplit">
            <!-- BEGIN .content-panel -->
            <div class="content-panel">
                <?php if($title) { ?>
                    <div class="panel-header">
                        <b style="background:<?php echo $pageColor;?>;"><i class="fa fa-video-camera"></i><?php echo $title;?></b>
                        <?php if($link) { ?>
                            <div class="top-right"><a href="<?php echo $link;?>"><?php _e("View All Videos",'legatus-theme');?></a></div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="panel-content">
                    
                    <div class="video-blocks">
                        <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>        
                        <?php        
                            //register post         
                            $OT_builder->set_double($my_query->post->ID);

                        ?>
                        <?php if($counter==1) { ?>
                            <?php $image = get_post_thumb($post->ID,330,185); ?>    
                            <div class="video-left">
                                <div class="video-large">
                                    <div class="video-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <span class="hover-icon icon-text"><i class="fa fa-video-camera"></i></span>
                                            <img class="setborder" src="<?php echo $image["src"];?>" alt="<?php the_title();?>" />
                                        </a>
                                    </div>
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
                                </div>
                            </div>
                        <?php } else { ?>
                            <?php $image = get_post_thumb($post->ID,155,87); ?>
                            <?php if($counter==2) { ?>
                            <div class="video-right">
                            <?php } ?>

                            <div class="video-small">
                                <div class="video-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <span class="hover-icon icon-text"><i class="fa fa-video-camera"></i></span>
                                        <img class="setborder" src="<?php echo $image["src"];?>" alt="<?php the_title();?>" />
                                    </a>
                                </div>
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
                            </div>

                            <?php if($counter==$postCount) { ?> 
                            </div>
                            <?php } ?>
                        <?php } ?>
                        <?php $counter++; ?>
                        <?php endwhile; else: ?>
                            <p><?php printf ( __('No posts were found','legatus-theme')); ?></p>
                        <?php endif; ?> 
                        <div class="clear-float"></div>

                    </div>

                </div>
            <!-- END .content-panel -->
            </div>
        </div>