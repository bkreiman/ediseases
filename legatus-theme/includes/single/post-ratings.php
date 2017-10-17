<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	//ratings
	$ratings = get_post_meta( $post->ID, "_".THEME_NAME."_ratings", true );
	$summary = get_post_meta( $post->ID, "_".THEME_NAME."_overall", true );

?>
								<?php if($ratings || $summary) { ?>
									<div class="article-share-bottom">
																	
										<div class="review-title">
											<b><?php the_title();?> <?php _e("- overview",'legatus-theme');?></b>
										</div>
										<?php 
											if($ratings) { 
												$totalRate = array();
												$rating = explode(";", $ratings);
 
												foreach($rating as $rate) { 
													$ratingValues = explode(":", $rate);
													if(isset($ratingValues[1])) {
														$ratingPrecentage = (str_replace(",",".",$ratingValues[1]))*20;
													}
													$totalRate[] = $ratingPrecentage;
													if($ratingValues[0]) {

										?>		 	
														<div class="review-content">
															<div class="star-rating rating-large right" title="<?php printf(__('Rated %1$s out of 5','legatus-theme'),$ratingValues[0]);?>">
																<span style="width: <?php echo $ratingPrecentage;?>%;">
																	<strong class="rating"><?php echo round($ratingPrecentage/20, 2);?></strong><?php _e("out of 5",'legatus-theme');?>
																</span>
															</div>

															<b><?php echo $ratingValues[0];?></b>
														</div>
										<?php 
													} 
												} 
											} 
									 	?>

										<div class="review-foot">
											<?php if($summary) { ?>
												<div class="review-sum">
													<p><b><?php _e("Summary:",'legatus-theme');?></b> <?php echo nl2br(stripslashes($summary));?></p>
												</div>
											<?php } ?>
											<?php 
												if(!empty($totalRate)) { 
													$rateCount = count($totalRate);	
													$total = 0;
													foreach ($totalRate as $val) {
														$total = $total + $val;
													}

													$avaragePrecentage = round($total/$rateCount,2);
													$avarageRate = round((($total/$rateCount)/20),2);

													if($avarageRate>=4.75) {
														$rateText = __("Excellent",'legatus-theme');
													} else if($avarageRate<4.75 && $avarageRate>=3.75) {
														$rateText = __("Good",'legatus-theme');
													} else if($avarageRate<3.75 && $avarageRate>=2.75) {
														$rateText = __("Average",'legatus-theme');
													} else if($avarageRate<2.75 && $avarageRate>=1.75) {
														$rateText = __("Fair",'legatus-theme');
													} else if($avarageRate<1.75 && $avarageRate>=0.75) {
														$rateText = __("Poor",'legatus-theme');
													} else if($avarageRate<0.75) {
														$rateText = __("Very Poor",'legatus-theme');
													}
											?>
												<div class="review-total">
													<b><?php echo $avarageRate;?></b>
													<span><?php echo $rateText;?></span>
													<div class="star-rating rating-large right" title="<?php printf(__('Rated %1$s out of 5','legatus-theme'),$ratingValues[0]);?>">
														<span style="width: <?php echo $avaragePrecentage;?>%;"><strong class="rating"><?php echo $avarageRate;?></strong> <?php _e("out of 5",'legatus-theme');?></span>
													</div>
												</div>
											<?php } ?>
											<div class="clear-float"></div>
										</div>

										<div class="clear-float"></div>

									</div>
								<?php } ?>
