<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    $OT_builder = new OT_home_builder; 
    //get block data
    $data = $OT_builder->get_data(); 
    //set query
    $my_query = $data[0]; 
    //extract array data
    extract($data[1]); 

    $counter = new ot_custom_counter; 
    $counter->reset_count(1); 

    if($pagination=="yes") {
        $paged = get_query_string_paged();
        $my_query->query('showposts='.$count.'&paged='.$paged.'&cat='.$cat.'&offset='.$offset);
    }



?>
    <?php if (!$blogStyle || $blogStyle=="1" || $blogStyle=="2" || $blogStyle=="3") { ?>
        <!-- BEGIN .main-content-split -->
        <div class="main-content-split">
    <?php } elseif ($blogStyle=="4" || $blogStyle=="5") { ?>
        <!-- BEGIN .main-nosplit -->
        <div class="main-nosplit">
    <?php } ?>

    <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
         
        <?php 
            //register post         
            $OT_builder->set_double($my_query->post->ID);

            $counter = new ot_custom_counter; 
            $counter = $counter->count(); 

        ?>

        <?php if ($blogStyle=="1" || !$blogStyle) { ?>

                                
            <?php if ($counter==1) { ?>                     
                <!-- BEGIN .main-split-left -->
                <div class="main-split-left">
            <?php } ?>  
                <?php 
                    if ($counter<=$blogBigNewsCount) {
                       get_template_part(THEME_LOOP."post");
                    } 
                ?>
                <?php 
                    if($counter==1 && $related=="yes") {
                        $categories = get_the_category($post->ID);


                ?>
                    <!-- BEGIN .content-panel -->
                    <div class="content-panel">
                        <div class="panel-header">
                            <b><i class="fa fa-chain"></i><?php _e("Related Articles",'legatus-theme');?></b>
                            <div class="top-right"><a href="<?php echo get_category_link($categories[0]->term_id);?>"><?php _e("View More Articles",'legatus-theme');?></a></div>
                        </div>
                        <div class="panel-content">
                            
                            <ul class="article-array">
                                <?php
                                    if ($categories) {
                                        $category_ids = array();
                                        foreach($categories as $individual_category) { 
                                            $category_ids[] = $individual_category->term_id;
                                        }

                                        $args=array(
                                            'category__in' => $category_ids,
                                            'post__not_in' => $OT_builder->get_double(),
                                            'showposts'=>8,
                                            'caller_get_posts'=>1
                                        );

                                        $my_query_related = new wp_query($args);

                                ?>

                                    <?php
                                        if( $my_query_related->have_posts() ) {

                                            while ($my_query_related->have_posts()) {
                                                $my_query_related->the_post();

                                                //register post         
                                                $OT_builder->set_double($my_query_related->post->ID);
                                    ?>
                                            <li>
                                                <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                                <?php if ( comments_open() && ot_option_compare('post_comments_single','post_comments_single',$my_query_related->post->ID)==true) { ?>
                                                    <a href="<?php the_permalink();?>#comments" class="comment-icon">
                                                        <i class="fa fa-comment"></i><?php comments_number('0','1','%'); ?>
                                                    </a>
                                                <?php } ?>
                                            </li>
                                            <?php
                                                }
                                            } else { _e('Sorry, no posts were found.','legatus-theme'); }
                                            ?>
                                <?php } ?>
                            </ul>

                        </div>
                    <!-- END .content-panel -->
                    </div>
                <?php 
                    }
                ?>
            <?php if ($counter>=1 && ( $counter==$blogBigNewsCount || ($counter==$postInPage && $counter<$blogBigNewsCount))) { ?>
                <!-- END .main-split-left -->
                </div>
            <?php } ?>

            <?php if ($counter==$blogBigNewsCount && $counter!=$postInPage) { ?>
                <!-- BEGIN .main-split-right -->
                <div class="main-split-right">
            <?php } ?>  
                <?php 
                    if ($counter>$blogBigNewsCount && $counter!=$postInPage) {
                        get_template_part(THEME_LOOP."post");
                    } 
                ?>
            <?php if ($counter==$postInPage && $counter>$blogBigNewsCount) { ?> 
                <!-- END .main-split-right -->
                </div>
            <?php } ?>

        <?php } else if ($blogStyle=="2" || $blogStyle=="3") { ?>   

            <?php if ($counter==1) { ?>
                <!-- BEGIN .main-split-left -->
                <div class="main-split-left">
            <?php } ?>  

                <?php get_template_part(THEME_LOOP."post"); ?>

            <?php if($counter==(ceil($postInPage/2))) { ?>
                <!-- END .main-split-left -->
                </div>
                <!-- BEGIN .main-split-right -->
                <div class="main-split-right">
            <?php } ?>

            <?php if($counter==$postInPage) { ?>
                <!-- END .main-split-right -->
                </div>
            <?php } ?>

        <?php } else if ($blogStyle=="4" || $blogStyle=="5") { ?>

            <?php get_template_part(THEME_LOOP."post"); ?>

        <?php } ?>  

        <?php 
            $counter = new ot_custom_counter; 
            $counter->plus_one(); 
        ?>

        <?php endwhile; else: ?>
            <?php get_template_part(THEME_LOOP."no-post"); ?>
        <?php endif; ?>
    </div>

    <?php 
        if($pagination=="yes") {
            customized_nav_btns($paged, $my_query->max_num_pages); 
        }
    ?>