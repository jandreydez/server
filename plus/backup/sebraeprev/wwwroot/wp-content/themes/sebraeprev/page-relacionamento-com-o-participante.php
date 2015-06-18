<?php get_header();?>            	
	<div id="main" class="" style="overflow:hidden !important;">
		<div class="avada-row" style="">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.3.1/jquery.maskedinput.min.js" type="text/javascript"></script>
<script>
    
function somente_numero(campo){ 
var digits="0123456789"  
var campo_temp   
    for (var i=0;i<campo.value.length;i++){  
        campo_temp=campo.value.substring(i,i+1)   
        if (digits.indexOf(campo_temp)==-1 ){  
            campo.value = campo.value.substring(0,i);  
        }
        if(campo.value.length > 11)
            campo.value = campo.value.substring(0,11);

    }  
}
function nao_numeros(campo){ 
var digits="0123456789"  
var campo_temp   
    for (var i=0;i<campo.value.length;i++){  
        campo_temp=campo.value.substring(i,i+1)   
        if (digits.indexOf(campo_temp) > -1 ){  
            campo.value = campo.value.substring(0,i);  
        }
    }  
}  
function somente_numero2(campo){  
    if(campo.value.length < 11)
    {
        campo.value = "";
    }
}

jQuery(window).load(function() {
    //jQuery("input[name='cpf']").mask("999.999.999-99");
    jQuery("input[name='cpf']").mask("999.999.999-99");
    
    jQuery("input[name='telefone']").mask("(99) 9999-9999?9").ready(function(event) {
        var target, phone, element;
        target = (event.currentTarget) ? event.currentTarget : event.srcElement;
        phone = target.value.replace(/\D/g, '');
        element = $(target);
        element.unmask();
        if(phone.length > 10) {
            element.mask("(99) 99999-999?9");
        } else {
            element.mask("(99) 9999-9999?9");
        }
    });
});

</script>
		<div id="content" style="width:100%">
				<div id="post-5251" class="post-5251 page type-page status-publish hentry">
						<div class="post-content">

                <!-- START REVOLUTION SLIDER 2.3.91 -->
                
                                
                                <div id="rev_slider_6_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:#E9E9E9;padding:0px;margin-top:0px;margin-bottom:0px;max-height:220px;">
                    <div id="rev_slider_6_1" class="rev_slider fullwidthabanner" style="display:none;max-height:220px;height:220;">                     
                                        <ul>
                                <li data-transition="random" data-slotamount="7" >
                        <img src="http://sebraeprevidencia.com.br/wp-content/uploads/2014/09/fale2.jpg"  alt="fale2 Relacionamento com o Participante"  title="Relacionamento com o Participante" />
                                            </li>
                                </ul>
                                                        </div>
                </div>              
                            
            <script type="text/javascript">

                var tpj=jQuery;
                
                                    tpj.noConflict();
                                
                var revapi6;
                
                tpj(document).ready(function() {
                
                if (tpj.fn.cssOriginal != undefined)
                    tpj.fn.css = tpj.fn.cssOriginal;
                
                if(tpj('#rev_slider_6_1').revolution == undefined)
                    revslider_showDoubleJqueryError('#rev_slider_6_1');
                else
                   revapi6 = tpj('#rev_slider_6_1').show().revolution(
                    {
                        delay:9000,
                        startwidth:960,
                        startheight:220,
                        hideThumbs:0,
                        
                        thumbWidth:100,
                        thumbHeight:50,
                        thumbAmount:1,
                        
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
                
                }); //ready
                
            </script>
            
                            <!-- END REVOLUTION SLIDER -->

				<div class="demo-sep sep-none" style="margin-top:60px;"></div>
<style type='text/css'>
	#tabs-1,#tabs-1.tabs-vertical .tabs,#tabs-1.tabs-vertical .tab_content{border-color:#ebeaea !important;}
	
        #main #tabs-1.tabs-horizontal,#tabs-1.tabs-vertical .tab_content,.pyre_tabs .tabs-container{background-color:#ffffff;}
        /*#main #tabs-1.tabs-horizontal,#tabs-1.tabs-vertical .tab_content,.pyre_tabs .tabs-container{background-color:#ffffff !important;}*/

	body.dark #tabs-1.shortcode-tabs .tab-hold .tabs li,body.dark #sidebar .tab-hold .tabs li{border-right:1px solid #ffffff !important;}
	body.dark #tabs-1.shortcode-tabs .tab-hold .tabs li:last-child{border-right:0 !important;}
	body.dark #main #tabs-1 .tab-hold .tabs li a{background:#ebeaea !important;border-bottom:0 !important;color:#747474 !important;}
	body.dark #main #tabs-1 .tab-hold .tabs li a:hover{background:#ffffff !important;border-bottom:0 !important;}
	body #main #tabs-1 .tab-hold .tabs li.active a,body #main #tabs-1 .tab-hold .tabs li.active{background:#ffffff !important;border-bottom:0 !important;}
	#sidebar .tab-hold .tabs li.active a{border-top-color:#53aedb !important;}
	</style><div id="tabs-1" class="tab-holder shortcode-tabs clearfix tabs-horizontal"><div class="tab-hold tabs-wrapper"><ul id="tabs" class="tabset tabs"><li><a href="#tab1">GERÊNCIA DE RELACIONAMENTO COM O PARTICIPANTE</a></li><li><a href="#tab2">FALE CONOSCO</a></li><li><a href="#tab3">ATENDIMENTO PRESENCIAL</a></li></ul><div class="tab-box tabs-container">
<div id="tab1" class="tab tab_content">
<img alt="seta azul1 Relacionamento com o Participante" src="http://sebraeprevidencia.com.br/wp-content/uploads/2013/07/seta-azul1.png" width="22" height="44" title="Relacionamento com o Participante" /> <div class="title"><h2>Gerência de Relacionamento com o Participante</h2><div class="title-sep-container"><div class="title-sep"></div></div></div>
<p>Com  o objetivo de aprimorar a qualidade do atendimento e da informação aos participantes, o SEBRAE PREVIDÊNCIA criou a Gerência de Relacionamento com o Participante. A GRP desenvolve políticas de relacionamento de longo prazo, promovendo a satisfação do Participante e sua fidelização.</p>
<p><b>Presencial<br />
</b>Para o atendimento presencial, o SEBRAE PREVIDÊNCIA disponibiliza o Espaço do Participante. Um espaço pensado e preparado pela GRP, exclusivo para atender aos Participantes, proporcionando segurança e mais conforto a todos.</p>
<p><b>Telefônico<br />
</b>O atendimento por telefone proporciona comodidade aos Participantes, que podem solicitar serviços e esclarecer dúvidas. As ligações feitas para o número <strong>(61) 3327-1226</strong> são direcionadas aos profissionais da GRP.</p>
<p><b>Eletrônico<br />
</b>A GRP recebe as demandas dos Participantes e é responsável por respondê-las. O atendimento é realizado por meio do endereço <a href="mailto:atendimento@sebraeprev.com.br"><b>atendimento@sebraeprev.com.br</b></a>. As mensagens enviadas pelo Fale Conosco serão direcionadas ao e-mail do atendimento e serão retornadas em até 48h (prazo que considera os dias úteis e as mensagens enviadas até as 18h).</p>
<p><strong>Horário de Atendimento:</strong> de 8h30 às 18h.</p>
<p><strong>Gerente da GRP:</strong> Luciana Ribeiro</p>
<p><strong>Técnica da GRP:</strong> Catarina Marçal</div>
<div id="tab2" class="tab tab_content">
<img alt="seta azul1 Relacionamento com o Participante" src="http://sebraeprevidencia.com.br/wp-content/uploads/2013/07/seta-azul1.png" width="22" height="44" title="Relacionamento com o Participante" /> <div class="title"><h2>Fale Conosco</h2><div class="title-sep-container"><div class="title-sep"></div></div></div>
<p><strong><span style="font-size: large;">Agradecemos o seu contato!</span></strong><br />
Você tem alguma sugestão, elogio, solicitação ou reclamação? Registre aqui, teremos prazer em atendê-lo.</p>
</div>
<div id="tab3" class="tab tab_content">
<img alt="seta azul1 Relacionamento com o Participante" src="http://sebraeprevidencia.com.br/wp-content/uploads/2013/07/seta-azul1.png" width="22" height="44" title="Relacionamento com o Participante" /> <div class="title"><h2>Atendimento Presencial</h2><div class="title-sep-container"><div class="title-sep"></div></div></div>
<p>Para agendar um atendimento presencial junto ao SEBRAE PREVIDÊNCIA, preencha o formulário a seguir.</p>
<div class="clear contact_left"></div>
<p></div></div></div></div>
							</div>
					</div>
			</div>

    <link rel="stylesheet" type="text/css" href="http://sebraeprevidencia.com.br/wp-content/themes/Avada/css/jquery.datetimepicker.css"/ >
    <script src="http://sebraeprevidencia.com.br/wp-content/themes/Avada/js/jquery.datetimepicker.js"></script>




    <div id="form-faleconosco">
        		<form action="http://sebraeprevidencia.com.br/relacionamento-com-o-participante/#tab2" method="post" class="clear contact_left">
            
            
            <div id="comment-input">
                <input type="text" name="contact_name" id="author" value="" placeholder="Nome (obrigatório)" size="22" tabindex="1" aria-required="true" class="input-name" onblur="javascript:nao_numeros(this);" onKeyUp="javascript:nao_numeros(this);">
                <select name="uf" id="uf" value="" class="input-name"><option value="">Patrocinadora (SEBRAE)</option><option value="Abase" />AB - Abase</option><option value="Acre" />AC</option><option value="Alagoas" />AL</option><option value="Amazonas" />AM</option><option value="Amapá" />AP</option><option value="Bahia" />BA</option><option value="Ceará" />CE</option><option value="Distrito Federal" />DF</option><option value="Espírito Santo" />ES</option><option value="Goiás" />GO</option><option value="Maranhão" />MA</option><option value="Mato Grosso" />MT</option><option value="Mato Grosso do Sul" />MS</option><option value="Minas Gerais" />MG</option><option value="Sebrae Nacional" />NA - Sebrae Nacional</option><option value="Pará" />PA</option><option value="Paraíba" />PB</option><option value="Paraná" />PR</option><option value="Pernambuco" />PE</option><option value="Piauí" />PI</option><option value="Rio de Janeiro" />RJ</option><option value="Rio Grande do Norte" />RN</option><option value="Rondônia" />RO</option><option value="Rio Grande do Sul" />RS</option><option value="Roraima" />RR</option><option value="Sebrae Previdência" />SB - Sebrae Previdência</option><option value="Santa Catarina" />SC</option><option value="Sergipe" />SE</option><option value="São Paulo" />SP</option><option value="Tocantins" />TO</option></select>                <input type="text" name="email" id="email" value="" placeholder="E-mail (obrigatório)" size="22" tabindex="2" aria-required="true" class="input-email">
                <input type="text" name="cpf" id="cpf" value="" placeholder="CPF (obrigatório)" size="22" tabindex="2" aria-required="true" class="input-email">
                <input type="text" name="telefone" id="telefone" value="" placeholder="Telefone (com DDD)" size="22" tabindex="2" aria-required="true" class="input-email">
                <p>
                    Assunto:<br />
                    <input type="radio" name="assunto" id="elogio" value="Elogio" /><label for="elogio">Elogio</label>
                    <input type="radio" name="assunto" id="solicitacao" value="Solicitação" /><label for="solicitacao">Solicitação</label>
                    <input type="radio" name="assunto" id="reclamacao" value="Reclamação" /><label for="reclamacao">Reclamação</label>
                    <input type="radio" name="assunto" id="sugestao" value="Sugestão" /><label for="sugestao">Sugestão</label>
              </p>
                <p>
                    * Quero receber o retorno do contato por:<br />
                    <input type="radio" name="retorno" id="retorno-email" value="E-mail" /><label for="retorno-email">E-mail</label>
                    <input type="radio" name="retorno" id="retorno-telefone" value="Telefone" /><label for="retorno-telefone">Telefone</label>
                </p>
            </div>
            <div id="comment-textarea">
                <textarea name="msg" id="comment" cols="39" rows="4" tabindex="4" class="textarea-comment" placeholder="Digite sua mensagem aqui"></textarea>
            </div>
            <div id="comment-submit">
                <p><div><input name="submit-faleconosco" type="submit" id="submit" tabindex="5" value="Enviar Mensagem" class="comment-submit button small green"></div></p>
            </div>
        </form>
        <div class="contact_right">
            <p><strong>SEBRAE PREVIDÊNCIA<br />
            Instituto Sebrae de Seguridade Social</strong></p>
            <p>SEPN, Quadra 515, Bloco C, loja 32, 1º andar, SEBRAE PREVIDÊNCIA<br />
            CEP: 70.770-503 - Brasília, DF</p>
            <p>Horário  de atendimento: de 8h30 às 18h.</p>
<p>(61) 3327-1226<br />
            <a href="mailto:atendimento@sebraeprev.com.br">atendimento@sebraeprev.com.br</a></p>
        </div>
	</div>

	<div id="form-agendamento">
        		<form action="http://sebraeprevidencia.com.br/relacionamento-com-o-participante/#tab3" method="post" class="clear contact_left">
            
            
            <div id="comment-input">
                <input type="text" name="contact_name" id="author" value="" placeholder="Nome (obrigatório)" size="22" tabindex="1" aria-required="true" class="input-name" onblur="javascript:nao_numeros(this);" onKeyUp="javascript:nao_numeros(this);">
                <select name="uf" id="uf" value="" class="input-name"><option value="">Patrocinadora (SEBRAE)</option><option value="Abase" />AB - Abase</option><option value="Acre" />AC</option><option value="Alagoas" />AL</option><option value="Amazonas" />AM</option><option value="Amapá" />AP</option><option value="Bahia" />BA</option><option value="Ceará" />CE</option><option value="Distrito Federal" />DF</option><option value="Espírito Santo" />ES</option><option value="Goiás" />GO</option><option value="Maranhão" />MA</option><option value="Mato Grosso" />MT</option><option value="Mato Grosso do Sul" />MS</option><option value="Minas Gerais" />MG</option><option value="Sebrae Nacional" />NA - Sebrae Nacional</option><option value="Pará" />PA</option><option value="Paraíba" />PB</option><option value="Paraná" />PR</option><option value="Pernambuco" />PE</option><option value="Piauí" />PI</option><option value="Rio de Janeiro" />RJ</option><option value="Rio Grande do Norte" />RN</option><option value="Rondônia" />RO</option><option value="Rio Grande do Sul" />RS</option><option value="Roraima" />RR</option><option value="Sebrae Previdência" />SB - Sebrae Previdência</option><option value="Santa Catarina" />SC</option><option value="Sergipe" />SE</option><option value="São Paulo" />SP</option><option value="Tocantins" />TO</option></select>                <input type="text" name="cpf" id="cpf" value="" placeholder="CPF (obrigatório)" size="22" tabindex="2" aria-required="true" class="input-email">
                <input type="text" name="telefone" id="telefone" value="" placeholder="Telefone" size="22" tabindex="3" class="input-website">
				<input type="text" name="data_horario" id="data_horario" value="" placeholder="Data e Horário" size="22" tabindex="2" aria-required="true" class="hasDatepicker input-data">
            </div>
            <div id="comment-submit">
                <p><div><input name="submit-agendamento" type="submit" id="submit" tabindex="5" value="Agendar" class="comment-submit button small green"></div></p>
            </div>
        </form>
        <div class="contact_right">
            <p><strong>SEBRAE PREVIDÊNCIA<br />
            Instituto Sebrae de Seguridade Social</strong></p>
            <p>SEPN, Quadra 515, Bloco C, loja 32, 1º andar, SEBRAE PREVIDÊNCIA<br />
            CEP: 70.770-503 - Brasília, DF</p>
            <p>Horário  de atendimento: de 8h30 às 18h.</p>
            <p>(61) 3327-1226<br />
            <a href="mailto:atendimento@sebraeprev.com.br">atendimento@sebraeprev.com.br</a></p>
        </div>
	</div>
	<script>
		jQuery(function(){
            jQuery("input[name='cpf']").change(function() {
                if(jQuery(this).val()=='000.000.000-00' || jQuery(this).val()=='111.111.111-11' || jQuery(this).val()=='222.222.222-22' || jQuery(this).val()=='333.333.333-33' || jQuery(this).val()=='444.444.444-44' || jQuery(this).val()=='555.555.555-55' || jQuery(this).val()=='666.666.666-66' || jQuery(this).val()=='777.777.777-77' || jQuery(this).val()=='888.888.888-88' || jQuery(this).val()=='999.999.999-99'){
                    jQuery(this).val('');
                }
            });
            
            // Posicionando os formulários dentro das abas
			jQuery('#tab2').append(jQuery('#form-faleconosco'));
			jQuery('#tab3').append(jQuery('#form-agendamento'));

            // Datetimepicker
            jQuery('#data_horario').datetimepicker({
                lang : 'pt',
                format : 'd/m/Y H:i',
                allowTimes : [
                    '08:30',
                    '09:00',
                    '10:00',
                    '11:00',
                    '12:00',
                    '13:00',
                    '14:00', 
                    '15:00',
                    '16:00',
                    '17:00'
                ]
            });
		});

	</script>
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
<li id="menu-item-6507" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-5251 current_page_item menu-item-6507"><a href="http://sebraeprevidencia.com.br/relacionamento-com-o-participante/" >Relacionamento com o Participante</a></li>
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
	</footer>
			<footer id="footer">
		<div class="avada-row">
					<ul class="copyright">
				<li>2013 SEBRAE PREVIDÊNCIA - Instituto Sebrae de Seguridade Social | <a href="http://plusinterativa.com">Plus Interativa <img src="http://sebraeprevidencia.com.br/wp-content/uploads/2013/08/logo-marca-menor.png" border="0"/></a></li>
			</ul>
		</div>
	</footer>
		</div><!-- wrapper -->
			<script type='text/javascript' src='http://sebraeprevidencia.com.br/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js?ver=3.51.0-2014.06.20'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var _wpcf7 = {"loaderUrl":"http:\/\/sebraeprevidencia.com.br\/wp-content\/plugins\/contact-form-7\/images\/ajax-loader.gif","sending":"Enviando ..."};
/* ]]> */
</script>
<script type='text/javascript' src='http://sebraeprevidencia.com.br/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=4.1.1'></script>
<script type='text/javascript' src='http://sebraeprevidencia.com.br/wp-content/themes/Avada/framework/plugins/tf-flexslider/assets/js/jquery.mousewheel.min.js?ver=2.1.0-20121206'></script>
<script type='text/javascript' src='http://sebraeprevidencia.com.br/wp-content/themes/Avada/framework/plugins/tf-flexslider/assets/js/jquery.flexslider.min.js?ver=2.1.0-20121206'></script>
<script type='text/javascript' src='http://sebraeprevidencia.com.br/wp-content/themes/Avada/js/modernizr.js?ver=3.5.2'></script>
<script type='text/javascript' src='http://sebraeprevidencia.com.br/wp-content/themes/Avada/js/jquery.carouFredSel-6.2.1-packed.js?ver=3.5.2'></script>
<script type='text/javascript' src='http://sebraeprevidencia.com.br/wp-content/themes/Avada/js/jquery.prettyPhoto.js?ver=3.5.2'></script>
<script type='text/javascript' src='http://sebraeprevidencia.com.br/wp-content/themes/Avada/js/jquery.isotope.min.js?ver=3.5.2'></script>
<script type='text/javascript' src='http://sebraeprevidencia.com.br/wp-content/themes/Avada/js/jquery.flexslider-min.js?ver=3.5.2'></script>
<script type='text/javascript' src='http://sebraeprevidencia.com.br/wp-content/themes/Avada/js/jquery.fitvids.js?ver=3.5.2'></script>
<script type='text/javascript' src='http://sebraeprevidencia.com.br/wp-content/themes/Avada/js/jquery.hoverIntent.minified.js?ver=3.5.2'></script>
<script type='text/javascript' src='http://sebraeprevidencia.com.br/wp-content/themes/Avada/js/jquery.eislideshow.js?ver=3.5.2'></script>
<script type='text/javascript' src='http://sebraeprevidencia.com.br/wp-content/themes/Avada/js/froogaloop.js?ver=3.5.2'></script>
<script type='text/javascript' src='http://sebraeprevidencia.com.br/wp-content/themes/Avada/js/jquery.placeholder.js?ver=3.5.2'></script>
<script type='text/javascript' src='http://sebraeprevidencia.com.br/wp-content/themes/Avada/js/jquery.waypoint.js?ver=3.5.2'></script>
<script type='text/javascript' src='http://sebraeprevidencia.com.br/wp-content/themes/Avada/js/gmap.js?ver=3.5.2'></script>
<script type='text/javascript' src='http://sebraeprevidencia.com.br/wp-content/themes/Avada/js/gauge.js?ver=3.5.2'></script>
<script type='text/javascript' src='http://sebraeprevidencia.com.br/wp-content/themes/Avada/js/jquery.ddslick.min.js?ver=3.5.2'></script>
<script type='text/javascript' src='http://sebraeprevidencia.com.br/wp-content/themes/Avada/js/jquery.infinitescroll.min.js?ver=3.5.2'></script>
<script type='text/javascript' src='http://sebraeprevidencia.com.br/wp-content/themes/Avada/js/main.js?ver=3.5.2'></script>
<script type='text/javascript' src='http://sebraeprevidencia.com.br/wp-content/plugins/easy-fancybox/fancybox/jquery.fancybox-1.3.5.pack.js?ver=1.5.5'></script>
<script type='text/javascript' src='http://sebraeprevidencia.com.br/wp-content/plugins/easy-fancybox/jquery.easing.pack.js?ver=1.3'></script>
<script type='text/javascript' src='http://sebraeprevidencia.com.br/wp-content/plugins/easy-fancybox/jquery.metadata.pack.js?ver=2.1'></script>

<script type="text/javascript">
jQuery(document).on('ready post-load', easy_fancybox_handler );
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46149480-2', 'sebraeprevidencia.com.br');
  ga('send', 'pageview');

</script>
</body>
</html>
