<?php get_header('single');while (have_posts()) : the_post();?>
<div class="avada-row">	
    <div class="content">
        <div class="post-content fotos-type">
            <h2><?php the_title();?></h2>
            <?php the_content();?>
            <div class="owl-carousel">
                <div class="item"><img src="http://2.bp.blogspot.com/_EZ16vWYvHHg/S-Bl2fuyyWI/AAAAAAAAMKc/DNayYJK8mEo/s1600/www.BancodeImagenesGratuitas.com-Fantasticas-20.jpg" alt="" /></div>            
			    <div class="item"><img src="http://2.bp.blogspot.com/_EZ16vWYvHHg/S-Bl2fuyyWI/AAAAAAAAMKc/DNayYJK8mEo/s1600/www.BancodeImagenesGratuitas.com-Fantasticas-20.jpg" alt="" /></div>		    
			    
    	    </div>
        </div>
    </div>
</div>
<script>
$('.owl-carousel').owlCarousel({
        items:1,
        loop:false,
        center:true,
        margin:10,
        
    });
</script>
<?php endwhile; get_footer();?>