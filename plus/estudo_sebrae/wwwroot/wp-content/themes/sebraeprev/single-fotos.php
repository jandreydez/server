<?php get_header('single');while (have_posts()) : the_post();?>
<div class="avada-row">	
    <div class="content">
        <div class="post-content fotos-type">
            <h2><?php the_title();?></h2>
            <?php the_content();?>
            <div class="owl-carousel">
			    <div class="item"><img src="http://wallpapernorth.com/wp-content/uploads/cool-Cat-wallpaper1_1_1xbpByg.jpg" alt=""></div>
			    <div class="item"><img src="http://wallpapernorth.com/wp-content/uploads/cool-Cat-wallpaper1_1_1xbpByg.jpg" alt=""></div>
			    <div class="item"><img src="http://wallpapernorth.com/wp-content/uploads/cool-Cat-wallpaper1_1_1xbpByg.jpg" alt=""></div>
			    <div class="item"><img src="http://wallpapernorth.com/wp-content/uploads/cool-Cat-wallpaper1_1_1xbpByg.jpg" alt=""></div>
			    <div class="item"><img src="http://wallpapernorth.com/wp-content/uploads/cool-Cat-wallpaper1_1_1xbpByg.jpg" alt=""></div>
			    <div class="item"><img src="http://wallpapernorth.com/wp-content/uploads/cool-Cat-wallpaper1_1_1xbpByg.jpg" alt=""></div>
			    <div class="item"><img src="http://wallpapernorth.com/wp-content/uploads/cool-Cat-wallpaper1_1_1xbpByg.jpg" alt=""></div>
    	    </div>
        </div>
    </div>
</div>
<script>
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    items:1    
});
</script>
<?php endwhile; get_footer();?>