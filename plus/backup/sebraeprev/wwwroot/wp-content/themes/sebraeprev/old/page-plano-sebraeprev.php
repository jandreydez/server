<?php get_header(); ?>
	<?php
	if(get_post_meta($post->ID, 'pyre_full_width', true) == 'yes') {
		$content_css = 'width:100%';
		$sidebar_css = 'display:none';
	}
	elseif(get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'left') {
		$content_css = 'float:right;';
		$sidebar_css = 'float:left;';
	} elseif(get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'right') {
		$content_css = 'float:left;';
		$sidebar_css = 'float:right;';
	} elseif(get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'default') {
		if($data['default_sidebar_pos'] == 'Left') {
			$content_css = 'float:right;';
			$sidebar_css = 'float:left;';
		} elseif($data['default_sidebar_pos'] == 'Right') {
			$content_css = 'float:left;';
			$sidebar_css = 'float:right;';
		}
	}
	?>
	<div id="content" style="<?php echo $content_css; ?>">
		<?php if(have_posts()): the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php global $data; if(!$data['featured_images_pages'] && has_post_thumbnail()): ?>
			<div class="image">
				<?php the_post_thumbnail('blog-large'); ?>
			</div>
			<?php endif; ?>
			<div class="post-content">

				<!-- START REVOLUTION SLIDER 2.3.91 -->
				
								
								<div id="rev_slider_2_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:#E9E9E9;padding:0px;margin-top:0px;margin-bottom:0px;max-height:220px;">
					<div id="rev_slider_2_1" class="rev_slider fullwidthabanner" style="display:none;max-height:220px;height:220;">						
										<ul>
								<li data-transition="random" data-slotamount="7" >
						<img src="http://sebraeprevidencia.com.br/wp-content/uploads/2013/10/plan3.png"  alt="plan3 Plano SEBRAEPREV"  title="Plano SEBRAEPREV" />
											</li>
									<li data-transition="random" data-slotamount="7" data-masterspeed="300" >
						<img src="http://sebraeprevidencia.com.br/wp-content/uploads/2013/10/plan1.png"  alt="plan1 Plano SEBRAEPREV"  title="Plano SEBRAEPREV" />
											</li>
									<li data-transition="random" data-slotamount="7" >
						<img src="http://sebraeprevidencia.com.br/wp-content/uploads/2013/10/plan4.png"  alt="plan4 Plano SEBRAEPREV"  title="Plano SEBRAEPREV" />
											</li>
								</ul>
														</div>
				</div>				
							
			<script type="text/javascript">

				var tpj=jQuery;
				
									tpj.noConflict();
								
				var revapi2;
				
				tpj(document).ready(function() {
				
				if (tpj.fn.cssOriginal != undefined)
					tpj.fn.css = tpj.fn.cssOriginal;
				
				if(tpj('#rev_slider_2_1').revolution == undefined)
					revslider_showDoubleJqueryError('#rev_slider_2_1');
				else
				   revapi2 = tpj('#rev_slider_2_1').show().revolution(
					{
						delay:9000,
						startwidth:960,
						startheight:220,
						hideThumbs:0,
						
						thumbWidth:100,
						thumbHeight:50,
						thumbAmount:3,
						
						navigationType:"bullet",
						navigationArrows:"solo",
						navigationStyle:"square-old",
						
						touchenabled:"on",
						onHoverStop:"on",
						
						navigationHAlign:"center",
						navigationVAlign:"bottom",
						navigationHOffset:0,
						navigationVOffset:20,

						soloArrowLeftHalign:"left",
						soloArrowLeftValign:"center",
						soloArrowLeftHOffset:20,
						soloArrowLeftVOffset:0,

						soloArrowRightHalign:"right",
						soloArrowRightValign:"center",
						soloArrowRightHOffset:20,
						soloArrowRightVOffset:0,
								
						shadow:3,
						fullWidth:"on",

						stopLoop:"off",
						stopAfterLoops:-1,
						stopAtSlide:-1,

						shuffle:"off",
						
						hideSliderAtLimit:0,
						hideCaptionAtLimit:0,
						hideAllCaptionAtLilmit:0,
						startWithSlide:0	
					});
				
				});	//ready
				
			</script>
			
							<!-- END REVOLUTION SLIDER -->

				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
			</div>
			<?php if($data['comments_pages']): ?>
				<?php wp_reset_query(); ?>
				<?php comments_template(); ?>
			<?php endif; ?>
		</div>
		<?php endif; ?>
	</div>
	<div id="sidebar" style="<?php echo $sidebar_css; ?>"><?php generated_dynamic_sidebar(); ?></div>
<?php get_footer(); ?>