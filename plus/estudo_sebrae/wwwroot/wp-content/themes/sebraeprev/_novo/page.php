<?php get_header(); ?>
	<?php
	while ( have_posts() ) : the_post();
	$slug = the_slug(false);
	?>
	<?php endwhile;?>
	<div class="body">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<?php get_sidebar();?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="content">
						<?php
						$args = array( 'posts_per_page' => '-1', 'category_name' => $slug, 'orderby' => 'ASC');
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();	
						?>
						<div class="box" name="<?php echo get_the_ID();?>" id="id<?php echo get_the_ID();?>">
							<?php the_content();?>
						</div>
						<?php
						endwhile;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>