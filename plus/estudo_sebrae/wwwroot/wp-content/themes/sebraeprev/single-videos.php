<?php get_header('single');while (have_posts()) : the_post();?>
<div class="avada-row">
	<div class="content">
		<div class="post-content videos-type">
			<h2><?php the_title();?></h2>
			<?php the_content();?>
		</div>
	</div>
</div>

<?php endwhile; get_footer();?>