<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    $OT_builder = new OT_home_builder; 
    //get block data
    $data = $OT_builder->get_data();
    $blockCounter = 1; 
?>

    <!-- BEGIN .main-content-split -->
    <div class="main-content-split">
<?php 
    foreach ($data as $data) {
        $counter=1;
        //set query
        $my_query = $data[0]; 
        //extract array data
        extract($data[1]); 

        $OTduplicate = false;
        $OTduplicateArray = false;

        $postCount = $my_query->post_count;

?>


        
    <!-- BEGIN .main-split-<?php echo ($blockCounter==1) ? "left" : "right" ;?> -->
    <div class="main-split-<?php echo ($blockCounter==1) ? "left" : "right" ;?>">
        

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
                <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    <?php         
                        //register post         
                        $OT_builder->set_double($my_query->post->ID);

                    ?>
                    <?php if($counter==1) { ?>
                        <?php
                            $averageRating = ot_avarage_rating($my_query->post->ID);
                            $image = get_post_thumb($my_query->post->ID,330,200); 
                            $imageL = get_post_thumb($my_query->post->ID,0,0); 
                        ?>
                            <!-- BEGIN .article-big-block -->
                            <div class="article-big-block">
                                <?php if($image['show']==true) { ?>
                                    <div class="article-photo">
                                        <span class="image-hover">
                                            <?php if (ot_option_compare('showTumbIcon','showTumbIcon',$post->ID)==true) { ?>
                                                <span class="drop-icons">
                                                    <span class="icon-block"><a href="<?php echo $imageL["src"];?>" title="<?php _e("Show Image",'legatus-theme');?>" class="icon-loupe legatus-tooltip lightbox-photo">&nbsp;</a></span>
                                                    <span class="icon-block"><a href="<?php the_permalink();?>" title="<?php _e("Read Article",'legatus-theme');?>" class="icon-link legatus-tooltip">&nbsp;</a></span>
                                                </span>
                                            <?php } ?>
                                            <img src="<?php echo $image['src'];?>" class="setborder" alt="<?php the_title();?>" title="<?php the_title();?>" />
                                        </span>
                                    </div>
                                <?php } ?>
                                <div class="article-header">
                                    <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                </div>
                                
                                <div class="article-content">
                                    <?php if($averageRating!=false) { ?>
                                        <div class="star-rating rating-large">
                                            <span style="width: <?php echo $averageRating[0];?>%;">
                                                <strong class="rating"><?php echo $averageRating[1];?></strong> <?php _e("out of 5",'legatus-theme');?>
                                            </span>
                                        </div>
                                    <?php } ?>
                                    <?php 
                                        the_excerpt();
                                    ?>
                                </div>
                                
                                <div class="article-links">
                                    <?php if ( comments_open() && ot_option_compare('post_comments_single','post_comments_single',$my_query->post->ID)==true) { ?>
                                        <a href="<?php the_permalink();?>#comments" class="article-icon-link">
                                            <i class="fa fa-comment"></i>
                                            <?php comments_number(__("0 comment",'legatus-theme'),__("1 comment",'legatus-theme'),__("% comments",'legatus-theme')); ?>
                                        </a>
                                    <?php } ?>
                                    <a href="<?php the_permalink();?>" class="article-icon-link"><i class="fa fa-reply"></i><?php _e("Read Full Article",'legatus-theme');?></a>
                                </div>
                            <!-- END .article-big-block -->
                            </div>
                    <?php } else { ?> 
                        <?php if($counter==2) { ?>
                            <!-- BEGIN .article-array -->
                            <ul class="article-array content-category">
                        <?php } ?>
                        <li>
                            <a href="<?php the_permalink();?>"><?php the_title();?></a>
                            <?php if ( comments_open() && ot_option_compare('post_comments_single','post_comments_single',$my_query->post->ID)==true) { ?>
                                <a href="<?php the_permalink();?>#comments" class="comment-icon"><i class="fa fa-comment"></i><?php comments_number('0','1','%'); ?></a>
                            <?php } ?>
                        </li>
                        <?php if($counter==$postCount) { ?>
                            <!-- END .article-array -->
                            </ul>
                        <?php } ?>
                    <?php } ?>  
                <?php $counter++; ?>
                <?php endwhile; else: ?>
                    <p><?php  _e('No posts were found','legatus-theme'); ?></p>
                <?php endif; ?> 
            </div>
        <!-- END .content-panel -->
        </div>
    <!-- END .main-split-<?php echo ($counter==1) ? "left" : "right" ;?> -->
    </div>
<?php $blockCounter++; ?>
<?php } ?>
   <div class="clear-float"></div>

<!-- END ..main-content-split -->
</div>