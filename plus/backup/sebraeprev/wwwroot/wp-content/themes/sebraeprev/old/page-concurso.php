<?php 
	require_once "enquete/recaptcha/recaptchalib.php";
    // Register API keys at https://www.google.com/recaptcha/admin
    $publickey = "6LevDfwSAAAAAASVDBwkxR99fprhjxkzhz37xoq0";
    $privatekey = "6LevDfwSAAAAAMM2EEc_OJTD2Air6ZKnjV5y57YY";
    $resp = null;
    $error = null;

	include 'enquete/concurso.class.php';
	$concurso = new concurso();
	$concurso->setIdEnquete( 2 ); // Setando o ID da enquete
	$nomeEnquete = $concurso->getEnquete();
	$result = $concurso->getOpcoes();

	if( empty( $_POST['pega_robot'] ) ) {
		if ( isset( $_POST["recaptcha_response_field"] ) ) {
			$resp = recaptcha_check_answer( 
				$privatekey,
				$_SERVER["REMOTE_ADDR"],
				$_POST["recaptcha_challenge_field"],
				$_POST["recaptcha_response_field"]
			);
			if ( $resp->is_valid ) {
				if( isset($_POST) && isset($_POST['enquete']) ) {
					$voto = array(
						'id_enquete' => $_POST['id_enquete'],
						'id_opcao'   => $_POST['enquete'],
						'data'       => date('Y-m-d H:i:s'),
						'ip'		 => $_SERVER["REMOTE_ADDR"]
					);
					$resultado = $concurso->registraVoto( $voto );
					if( $resultado === true ) {
						$resultado = "Seu voto foi registrado!";
						$chart = true;
					} else {
						$resultado = "Seu voto não foi registrado. Por favor, tente novamente.";
					}
				} else {
					$resultado = "Por favor, selecione uma opção.";
				}
			} else {
	            $resultado = "Digite os caracteres do quadro (captcha) abaixo para registrar o seu voto.";
	        }
	    }
	} else {
		$resultado = "Tentativa por robô!";
	}

	get_header();
?>
	<div id="content" style="width:100%">
		<?php if(have_posts()): the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php global $data; if(!$data['featured_images_pages'] && has_post_thumbnail()): ?>
			<div class="image">
				<?php the_post_thumbnail('blog-large'); ?>
			</div>
			<?php endif; ?>
			<div class="post-content">
                <!-- START REVOLUTION SLIDER 2.3.91 -->
                <div id="rev_slider_6_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:#E9E9E9;padding:0px;margin-top:0px;margin-bottom:0px;max-height:220px;">
                    <div id="rev_slider_6_1" class="rev_slider fullwidthabanner" style="display:none;max-height:220px;height:220;">                     
                        <ul>
                            <li data-transition="random" data-slotamount="7" >
                                <img src="http://sebraeprevidencia.com.br/wp-content/uploads/2015/03/concursomulher2015.jpg"  alt="Concurso Dia Internacional da Mulher"  title="Concurso Dia Internacional da Mulher" />
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
			
				<?php the_content(); ?>
				<style type="text/css">
				#tabs-1 .tab-hold.tabs-wrapper #tab1 .title h1{display:;}
				#tabs-1 .tab-hold.tabs-wrapper #tab1 .title:last-child{float: none !important;}
				</style>
				<form action="" method="post" style="clear:both;display:none;">
					<?php 
						if( isset( $resultado ) ) echo '<p><strong style="font-size: large;">'. $resultado .'</strong></p>';
						while( $opcao = $concurso->fetch( $result )): 
					?>
					<p>
						<input type="radio" value="<?php echo $opcao->id; ?>" name="enquete" id="<?php echo $opcao->id; ?>">
						<label for="<?php echo $opcao->id; ?>"><?php echo utf8_decode($opcao->titulo); ?></label>
					</p>
					<?php
						endwhile; 
						echo recaptcha_get_html( $publickey, $error ); 
					?>
					<input type="hidden" value="<?php echo $nomeEnquete->id; ?>" name="id_enquete">
					<input type="hidden" id="pega_robot" name="pega_robot" placeholder="Não preencher esse campo">
                    <input type="submit" id="submit" value="Votar" class="comment-submit button small green" style="margin-top:20px;">
				</form>
			</div>
		</div>
		<?php endif; ?>
	</div>
<?php get_footer(); ?>