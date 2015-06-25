<?php get_header('single');?>

</div>		<div id="sliders-container">
						</div>
						 

            	
	<div id="main" class="" style="overflow:hidden !important;">
		<div class="avada-row" style="">
		<div id="content" style="float:left;">
				<div id="post-1489" class="post-1489 page type-page status-private hentry">
						<div class="post-content">
				<p><a><img class="size-full wp-image-1079 alignleft" alt="seta-azul" src="http://sebraeprevidencia.com.br/wp-content/uploads/2013/07/seta-azul1.png" width="22" height="44" /></a><div class="title"><h2>Notícias</h2><div class="title-sep-container"><div class="title-sep"></div></div></div>
<div class="avada-container">
	<section class="columns columns-1" style="width:100%">
		<div class="holder">
			<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array('posts_per_page' => 5, 'post_type' => 'noticias' ,'paged' => $paged );
				query_posts($args);
				if ( have_posts() ) : while (have_posts()) : the_post();								
				?>
			<article class="col bd-bottom">
				<h2 class="title-certo">
					<a href="<?php the_permalink();?>">
						<?php the_title();?>
					</a>
				</h2>
				<ul class="meta">
					<li>
						<em class="date"><?php echo get_the_date();?></em>
					</li>
				</ul>				
				<p style="text-align: justify;"><?php the_excerpt();?></p>			
			</article>						
			<?php endwhile;endif;?>
			<div >
				<?php
				global $wp_query;
				$big = 999999999;
				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $wp_query->max_num_pages,
					'prev_text'    => '<div class="btn-prev">Anterior</div>',
					'next_text'    => '<div class="btn-next">Próximo</div>'
				));
				?>
			</div>
		</div>
	</section>
</div>
						</div>
					</div>
			</div>

	
		</div>
          
	</div>

        	        <!--AQUI ENTROU NOVO SIDEBAR PARA PARCEIROS-->
        <div class="footer-area footer-top">
               <div class="avada-row">
               <div id="text-5" class="widget widget_text"><div class="heading"><h3>Apoiadores</h3></div>			<div class="textwidget"><div class="related-posts related-projects"><div id="carousel" class="clients-carousel es-carousel-wrapper"><div class="es-carousel"><ul>
<li><a href="http://www.sebrae.com.br/" onclick="javascript:_gaq.push(['_trackEvent','outbound-widget','http://www.sebrae.com.br']);" target=""><img src="http://sebraeprevidencia.com.br/wp-content/uploads/2013/07/logo-sebrae-apoiador.jpg" alt="" /></a></li><li><a href="http://www.abase.org.br/" onclick="javascript:_gaq.push(['_trackEvent','outbound-widget','http://www.abase.org.br']);" target=""><img src="http://sebraeprevidencia.com.br/wp-content/uploads/2013/07/logo-abase-apoiador.jpg" alt="" /></a></li><li><a href="http://www.abrapp.org.br" onclick="javascript:_gaq.push(['_trackEvent','outbound-widget','http://www.abrapp.org.br']);" target=""><img src="http://sebraeprevidencia.com.br/wp-content/uploads/2013/07/logo-abrapp-apoiador.jpg" alt="" /></a></li><li><a href="http://www.radioprevidencia.com.br/" onclick="javascript:_gaq.push(['_trackEvent','outbound-widget','http://www.radioprevidencia.com.br']);" target=""><img src="http://sebraeprevidencia.com.br/wp-content/uploads/2013/07/logo-radio-apoiador.jpg" alt="" /></a></li><li><a href="http://www.planejar-sebraeprev.com.br" onclick="javascript:_gaq.push(['_trackEvent','outbound-widget','http://www.planejar-sebraeprev.com.br']);" target=""><img src="http://sebraeprevidencia.com.br/wp-content/uploads/2013/07/logo-planejar-apoiador.jpg" alt="" /></a></li>
</ul><div class="es-nav"><span class="es-nav-prev">Previous</span><span class="es-nav-next">Next</span></div></div></div></div></div>
		</div>               </div>
        </div>
        <!--AQUI ENTROU NOVO SIDEBAR PARA PARCEIROS-->
        <footer class="footer-area">
		<div class="avada-row">
			<section class="columns columns-4">
				<article class="col">
				<div id="nav_menu-2" class="footer-widget-col widget_nav_menu"><h3>Mapa do Site</h3><div class="menu-sitemap-1-container"><ul id="menu-sitemap-1" class="menu"><li id="menu-item-2109" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2109"><a href="http://sebraeprevidencia.com.br/?page_id=766" >Home</a>
<ul class="sub-menu">
	<li id="menu-item-2110" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-2110"><a href="http://sebraeprevidencia.com.br/#tab1" >Notícias</a></li>
	<li id="menu-item-2111" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-2111"><a href="http://sebraeprevidencia.com.br/#tab2" >Publicações</a></li>
	<li id="menu-item-2112" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-2112"><a href="http://sebraeprevidencia.com.br/#tab3" >Formulários</a></li>
	<li id="menu-item-2113" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-2113"><a href="http://sebraeprevidencia.com.br/#tab4" >Fotos</a></li>
	<li id="menu-item-2114" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-2114"><a href="http://sebraeprevidencia.com.br/#tab5" >Vídeos</a></li>
</ul>
</li>
</ul></div><div style="clear:both;"></div></div>				</article>

				<article class="col">
				<div id="nav_menu-3" class="footer-widget-col widget_nav_menu"><h3>&nbsp;</h3><div class="menu-sitemap-2-container"><ul id="menu-sitemap-2" class="menu"><li id="menu-item-2264" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2264"><a href="http://sebraeprevidencia.com.br/sebrae-previdencia/" >SEBRAE PREVIDÊNCIA</a></li>
<li id="menu-item-2469" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2469"><a href="http://sebraeprevidencia.com.br/plano-sebraeprev/" >Plano SEBRAEPREV</a></li>
<li id="menu-item-2470" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2470"><a href="http://sebraeprevidencia.com.br/emprestimos/" >Empréstimos</a></li>
<li id="menu-item-2471" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2471"><a href="http://sebraeprevidencia.com.br/investimentos/" >Investimentos</a></li>
<li id="menu-item-6508" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6508"><a href="http://sebraeprevidencia.com.br/planejar/" >PLANEJAR</a></li>
<li id="menu-item-6507" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6507"><a href="http://sebraeprevidencia.com.br/relacionamento-com-o-participante/" >Relacionamento com o Participante</a></li>
</ul></div><div style="clear:both;"></div></div>				</article>

				<article class="col">
				<div id="text-2" class="footer-widget-col widget_text">			<div class="textwidget"><img src="http://sebraeprevidencia.com.br/wp-content/uploads/2013/07/sebraeprev-logo-rodape.png" />
<br/><br/>
<p>
SEBRAE PREVIDÊNCIA - Instituto Sebrae de Seguridade Social
<br/>
SEPN, Quadra 515, Bloco C, loja 32, 1º andar, SEBRAE PREVIDÊNCIA
<br/>
CEP:70.770-503 - Brasília, DF
</p>
<p>
(61) 3327-1226
atendimento@sebraeprev.com.br
</p></div>
		<div style="clear:both;"></div></div>				</article>
				
				<article class="col last">
				<div id="text-6" class="footer-widget-col widget_text">			<div class="textwidget"><center><a href="http://www.previdencia.gov.br/previc/" onclick="javascript:_gaq.push(['_trackEvent','outbound-widget','http://www.previdencia.gov.br']);" target="_blank"><img src="http://sebraeprevidencia.com.br/wp-content/uploads/2013/12/banner_fundobranco1.jpg" /></a></center></div>
		<div style="clear:both;"></div></div><div id="text-3" class="footer-widget-col widget_text">			<div class="textwidget"><center><a href="http://www.perfilinvestsebraeprev.com.br" onclick="javascript:_gaq.push(['_trackEvent','outbound-widget','http://www.perfilinvestsebraeprev.com.br']);" target="_blank"><img src="http://sebraeprevidencia.com.br/wp-content/uploads/2013/12/Logo_Perfis_rodape1.png" /></a></center></div>
		<div style="clear:both;"></div></div>				</article>
			</section>
		</div>
			<?php get_footer();?>