<?php while ( have_posts() ) : the_post();?>
<div class="side-menu">
	<?php if(is_page('abertura')):?>
	<div class="pages">
		<div class="pages-content">
			<?php
			$args = array( 'posts_per_page' => '-1', 'category_name' => 'abertura', 'orderby' => 'ASC');
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();	
			?>	
				<div>
					<span name="<?php echo get_the_ID();?>"><?php the_title();?></span><br/>
				</div>
			<?php
			endwhile;
			?>
		</div>
	</div>
	<?php 
	endif;
	if(is_page('institucional')):
	?>
	<div class="pages">
		<div class="pages-content">
			<?php
			$args = array( 'posts_per_page' => '-1', 'category_name' => 'Institucional', 'orderby' => 'ASC');
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();	
			?>	
				<div>
					<span name="<?php echo get_the_ID();?>"><?php the_title();?></span><br/>
				</div>
			<?php
			endwhile;
			?>
		</div>
	</div>
	<?php 
	endif;
	if(is_page('investimentos')):
	?>
	<div class="pages">
		<div class="pages-content">
			<?php
			$args = array( 'posts_per_page' => '-1', 'category_name' => 'investimentos', 'orderby' => 'ASC');
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();	
			?>	
				<div>
					<span name="<?php echo get_the_ID();?>"><?php the_title();?></span><br/>
				</div>
			<?php
			endwhile;
			?>
		</div>
	</div>
	<?php 
	endif;
	if(is_page('resultados')):
	?>
	<div class="pages">
		<div class="pages-content">
			<?php
			$args = array( 'posts_per_page' => '-1', 'category_name' => 'Resultados', 'orderby' => 'ASC');
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();	
			?>	
				<div>
					<span name="<?php echo get_the_ID();?>"><?php the_title();?></span><br/>
				</div>
			<?php
			endwhile;
			?>
		</div>
	</div>
	<?php 
	endif;
	if(is_page('pareceres')):
	?>
	<div class="pages">
		<div class="pages-content">
			<?php
			$args = array( 'posts_per_page' => '-1', 'category_name' => 'Pareceres', 'orderby' => 'ASC');
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();	
			?>	
				<div>
					<span name="<?php echo get_the_ID();?>"><?php the_title();?></span><br/>
				</div>
			<?php
			endwhile;
			?>
		</div>
	</div>
	<?php 
	endif;
	if(is_page('encerramento')):
	?>
	<div class="pages">
		<div class="pages-content">
			<?php
			$args = array( 'posts_per_page' => '-1', 'category_name' => 'Encerramento', 'orderby' => 'ASC');
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();	
			?>	
				<div>
					<span name="<?php echo get_the_ID();?>"><?php the_title();?></span><br/>
				</div>
			<?php
			endwhile;
			?>
		</div>
	</div>
	<?php endif;?>
</div>
<?php endwhile;?>