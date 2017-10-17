<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    if (ot_is_woocommerce_activated() == true) { // Exit if woocommerce isn't active
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
                <b style="background:<?php echo $pageColor;?>;"><i class="fa fa-shopping-cart"></i><?php echo $title;?></b>
                <?php if($link) { ?>
                    <div class="top-right"><a href="<?php echo $link;?>"><?php _e("View More Items",'legatus-theme');?></a></div>
                <?php } ?>
            </div>
        <?php } ?>
        <div class="home-featured-shop-items woocommerce">
            <ul class="products">
                <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
                <?php 
                    $image = ot_image_html($my_query->post->ID,314,210); 
                    global $product;
                ?>
                    <li class="product">
                        <a href="<?php the_permalink();?>">
                            <?php if( $product && $product->is_on_sale()) { ?>
                                 <span class="onsale"><?php _e("Sale!",'legatus-theme');?></span>
                            <?php } ?>
                            <?php echo $image;?>
                            <h3><?php the_title();?></h3>
                            <?php
                                if( $product && $product->get_rating_html()) { 
                                    echo $product->get_rating_html();
                                } 
                            ?>
                            <?php if( $product && $product->get_price_html()) { ?>
                                <span class="price"><?php echo $product->get_price_html();?><span>
                            <?php } ?>
                        </a>
                        <?php  woocommerce_template_loop_add_to_cart(); ?>
                    </li>

                <?php endwhile; ?>
                <?php endif; ?>


            </ul>
        </div>
    </div>
<!-- END .home-block -->
</div>
<?php } else { _e("Please set up WooCommerce Plugin",'legatus-theme'); } ?>