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


    <!-- BEGIN .main-nosplit -->
        <div class="main-nosplit">
            <!-- BEGIN .content-panel -->
            <div class="content-panel">
                <?php if($title) { ?>
                    <div class="panel-header">
                        <b style="background:<?php echo $pageColor;?>;"><i class="fa fa-soccer-ball-o"></i><?php echo $title;?></b>
                        <?php if($link) { ?>
                            <div class="top-right"><a href="<?php echo $link;?>"><?php _e("View More Articles",'legatus-theme');?></a></div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="panel-content">
                    
                    <!-- BEGIN .article-array -->
                    <ul class="article-array content-category">
                        <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        <?php
                            //register post         
                            $OT_builder->set_double($my_query->post->ID);
                        ?>
                        <li>
                            <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
                            <?php if ( comments_open() && ot_option_compare('post_comments_single','post_comments_single',$my_query->post->ID)==true) { ?>
                                <a href="<?php the_permalink();?>#comments" class="comment-icon"><i class="fa fa-comment"></i><?php comments_number('0','1','%'); ?></a>
                            <?php } ?>
                        </li>
                    <?php endwhile; else: ?>
                        <p><?php printf ( __('No posts were found','legatus-theme')); ?></p>
                    <?php endif; ?> 
                    <!-- END .article-array -->
                    </ul>

                </div>
            <!-- END .content-panel -->
            </div>
        </div>