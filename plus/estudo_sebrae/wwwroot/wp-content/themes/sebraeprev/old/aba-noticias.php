<!-- ABA NOTÍCIAS -->
                                <div class="tab-box tabs-container">
                                    <div id="tab1" class="tab tab_content">
                                        <p>
                                            <script>
                                                function navegar(url){
                                                   location.href= url ;
                                                }
                                            </script>
                                            <div class="FA_overall_container_title_nav FA_slider  dark" style="width:100%" id="FA_slider_885">
                                                <div class="FA_featured_articles" style="height:300px">
                                                    <?php
                                                        // Imagens Notícias
                                                        $argumentos = array(
                                                           'category_name' => 'noticias',
                                                           'posts_per_page' => 4,
                                                           'order' => 'DESC'
                                                        );
                                                        $query = new WP_Query($argumentos);
                                                        while ($query->have_posts()):
                                                            $query->the_post();
                                                            echo '<div class="FA_article" style="; height:300px"> 
                                                                    <div class="FA_wrap">
                                                                        <div class="image_container">
                                                                            <a href="' . get_the_permalink() . '" title="' . get_the_title() . '" target="_self">' . get_the_post_thumbnail($post->ID, 'tamanho-noticias-home') . '</a>
                                                                        </div>
                                                                    </div>
                                                                </div>';
                                                         endwhile;
                                                    ?>
                                                </div>
                                                <ul class="FA_navigation" style="height:300px">
                                                    <?php
                                                        // Listagem Notícias
                                                        $argumentos = array(
                                                           'category_name' => 'noticias',
                                                           'posts_per_page' => 4,
                                                           'order' => 'DESC'
                                                        );
                                                        $query = new WP_Query($argumentos);
                                                        while ($query->have_posts()):
                                                            $query->the_post();
                                                            echo '<li>
                                                            <a href="#" title="' . get_the_title() .'">
                                                                <p class="art-date">' . get_the_date() . '</p>
                                                                <p class="art-title">' . get_the_title() . '</p>
                                                                <div class="FA_read_more" onClick="navegar(\'' . get_the_permalink() . '\')" title="' . get_the_title() . '" style="cursor:pointer;">>> Leia Mais</div>
                                                            </a>
                                                        </li>';
                                                        endwhile;
                                                    ?>
                                                </ul>
                                            </div>
                                        </p>
                                        <div class="title">
                                            <h4><a href="<?php bloginfo('url'); ?>/noticias-2/">&gt;&gt; Acessar todas as notícias</a></h4>
                                            <div class="title-sep-container">
                                                <div class="title-sep"></div>
                                            </div>
                                        </div>
                                        <div class="demo-sep sep-none" style="margin-top:35px;"></div>
                                        <style type='text/css'>
                                            #content-boxes-1 article.col{background-color:transparent !important;}
                                            #content-boxes-1 .fontawesome-icon.circle-yes{color:#ffffff !important;background-color:#333333 !important;border:1px solid #333333 !important;}
                                        </style>
                                        <section class="clearfix columns content-boxes content-boxes-icon-with-title" id="content-boxes-1">
                                            <article class="col">
                                                <div class="heading">
                                                    <h2> </h2>
                                                </div>
                                                <div class="col-content-container">
                                                    <p>Esta é mais uma importante vantagem oferecida pelo Plano SEBRAEPREV: a possibilidade de escolher como alocar os recursos oriundos das suas contribuições.</p>
                                                    <p>Isso significa mais flexibilidade e autonomia para o participante constituir ou manter a sua reserva para aposentadoria de forma compatível com o seu momento atual de vida, seus objetivos de longo prazo, sua expectativa de retorno financeiro e sua capacidade de lidar com as variações do mercado financeiro.</p>
                                                    <span class="more"><a href="http://www.perfilinvestsebraeprev.com.br/" onclick="javascript:_gaq.push(['_trackEvent','outbound-article','http://www.perfilinvestsebraeprev.com.br']);" target="_blank">Clique aqui</a></span>
                                                </div>
                                            </article>
                                            <article class="col">
                                                <div class="heading">
                                                    <h2> </h2>
                                                </div>
                                                <div class="col-content-container">
                                                    <p>Conforme a legislação, o contribuinte que realiza a declaração de IR pelo <strong>modo completo</strong> pode deduzir até 12% em contribuições para planos de previdência complementar dos rendimentos tributáveis auferidos no ano-calendário anterior ao da declaração.</p>
                                                    <p>Se você contribuiu com menos de 12% e quer ter a vantagem da dedução, poderá efetuar uma contribuição esporádica. Faça uma simulação e saiba o valor estimado do aporte necessário.</p>
                                                    <span class="more"><a href="http://www.sebraeprevidencia.com.br/wp-content/formularios/simuladorbf/index_oficial.php" onclick="javascript:_gaq.push(['_trackEvent','outbound-article','http://www.sebraeprevidencia.com.br']);" target="_blank">Clique aqui</a></span>
                                                </div>
                                            </article>
                                            <article class="col">
                                                <div class="heading">
                                                    <h2> </h2>
                                                </div>
                                                <div class="col-content-container">
                                                    <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                        <tbody>
                                                            <tr>
                                                                <td><strong>BOVESPA:</strong></td>
                                                                <td>52.365,02 (0,52%)</td>
                                                            </tr>
                                                            <tr>
                                                                <td bgcolor="#efefef"><strong>SELIC:</strong></td>
                                                                <td bgcolor="#efefef">+11%</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>TR</strong></td>
                                                                <td>0,07</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <p>&nbsp;</p>
                                                    <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                        <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td><strong>Compra</strong></td>
                                                                <td><strong>Venda</strong></td>
                                                                <td><strong>Variação</strong></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Dólar Comercial:</strong></td>
                                                                <td>R$2,2191</td>
                                                                <td>R$2,2200</td>
                                                                <td nowrap="nowrap">(0,69%)</td>
                                                            </tr>
                                                            <tr>
                                                                <td bgcolor="#efefef"><strong>Dólar Turismo:</strong></td>
                                                                <td bgcolor="#efefef">R$2,2000</td>
                                                                <td bgcolor="#efefef">R$2,2900</td>
                                                                <td nowrap="nowrap" bgcolor="#efefef">(1,29%)</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Dólar Paralelo:</strong></td>
                                                                <td>R$2,2900</td>
                                                                <td>R$2,3900</td>
                                                                <td nowrap="nowrap">+0,42%</td>
                                                            </tr>
                                                            <tr>
                                                                <td bgcolor="#efefef"><strong>Euro:</strong></td>
                                                                <td bgcolor="#efefef">R$3,0195</td>
                                                                <td bgcolor="#efefef">R$3,0210</td>
                                                                <td nowrap="nowrap" bgcolor="#efefef">(0,50%)</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </article>
                                        </section>
                                        <p>
                                    </div>