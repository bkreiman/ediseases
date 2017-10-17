<?php require_once( '../../../../wp-load.php' );?>
<h2 class="light-title"></h2>
<a href="#" onclick="javascript:lightboxclose();" class="light-close"><i class="fa fa-times"></i><?php _e("Close Window",'legatus-theme');?></a>

<div class="main-block">
	<!-- BEGIN .single-gallery -->
	<div class="single-gallery ot-slide-item gallery-full-photo">
		<span class="next-image" data-next="0"></span>

		<div class="gallery-box gallery-full-photo">
			<div class="gallery-box-header">
				<h2 class="ot-light-title"></h2>
				<div class="numbering">
					<a href="javascript:;" class="prev icon-text"><i class="fa fa-angle-left"></i></a>
					<span class="numbers"><span class="current">1</span>/<span class="total">0</span></span>
					<a href="javascript:;" class="next icon-text"><i class="fa fa-angle-right"></i></a>
				</div>
			</div>

			<a href="javascript:;" class="full-hover">
				<div class="gallery-box-main-image">
					<span class="gal-current-image">
						<div class="loading waiter">
							<img class="image-big-gallery ot-gallery-image" data-id="0" style="display:none;" src="#" alt="<?php the_title();?>" />
						</div>
					</span>
				</div>
			</a>

			<div class="gallery-box-about shortcode-content">
				<p id="ot-lightbox-content"></p>
			</div>

			<div class="gallery-box-thumbs image-list the-thumbs">
				<a href="#" class="control-left"><?php _e("left",'legatus-theme');?></a>
				<a href="#" class="control-right"><?php _e("right",'legatus-theme');?></a>
				<ul id="ot-lightbox-thumbs"></ul>
			</div>


		</div>

	<!-- END .single-gallery -->
	</div>	

</div>
