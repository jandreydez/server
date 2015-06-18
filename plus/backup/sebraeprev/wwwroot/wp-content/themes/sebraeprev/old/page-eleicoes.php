<?php
if (isset($_POST["submit"])) {
    if (trim($_POST["contact_name"]) == "" || trim($_POST["contact_name"]) == "Name (required)") {
        $hasError = true;
    } else {
        $name = trim($_POST["contact_name"]);
    }

    $subject = "SEBRAE PREVIDÊNCIA - Fale com a Comissão Eleitoral";

    if (trim($_POST["email"]) == "" || trim($_POST["email"]) == "Email (required)") {
        $hasError = true;
    } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST["email"]))) {
        $hasError = true;
    } else {
        $email = trim($_POST["email"]);
    }

    if (trim($_POST["telefone"]) == "" || trim($_POST["telefone"]) == "Telefone") {
        $hasError = true;
    } else {
        $telefone = trim($_POST["telefone"]);
    }

    if (trim($_POST["msg"]) == "" || trim($_POST['msg']) == "Message") {
        $hasError = true;
    } else {
        if (function_exists("stripslashes")) {
            $comments = stripslashes(trim($_POST["msg"]));
        } else {
            $comments = trim($_POST["msg"]);
        }
    }
    if (!isset($hasError)) {
        $emailTo = "comissaoeleitoral@sebraeprev.com.br"; //Put your own email address here
        //$emailTo = "vlamirsanto@gmail.com";
        //$body = "Name: $name \n\nEmail: $email \n\nTelefone: $telefone \n\nSubject: $subject \n\nComments:\n $comments";
        //$headers = "From: ". $name . " <" . $email . ">\r\n";
        $body = "<p>Nome: $name <br/>";
        $body .= "E-mail: $email <br />";
        $body .= "Telefone: $telefone <br />";
        $body .= "Mensagem: $comments</p>";
        $headers = "MIME-Version: 1.0" . "\n" . "Content-type: text/html; charset=UTF-8"
                . "\n" . "From: " . $name . ' <' . $email . ">\n";
        $mail = wp_mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
    }
}

// Template Name: Full Width
get_header(); ?>
	<div id="content" class="full-width">
		<?php while(have_posts()): the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php global $data; if(!$data['featured_images_pages'] && has_post_thumbnail()): ?>
			<div class="image">
				<?php the_post_thumbnail('full'); ?>
			</div>
			<?php endif; ?>
			<div class="post-content">
            
            				<!-- START REVOLUTION SLIDER 2.3.91 -->
				
								
								<div id="rev_slider_5_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:#E9E9E9;padding:0px;margin-top:0px;margin-bottom:0px;max-height:220px;">
					<div id="rev_slider_5_1" class="rev_slider fullwidthabanner" style="display:none;max-height:220px;height:220;">						
										<ul>
								<li data-transition="random" data-slotamount="7" >
						<img src="http://sebraeprevidencia.com.br/wp-content/uploads/2014/12/eleições2014interna-resultado2.jpg"  alt="Resultado das Eleições"  title="Eleições" />
											</li>
								</ul>
														</div>
				</div>				
							
			<script type="text/javascript">

				var tpj=jQuery;
				
									tpj.noConflict();
								
				var revapi5;
				
				tpj(document).ready(function() {
				
				if (tpj.fn.cssOriginal != undefined)
					tpj.fn.css = tpj.fn.cssOriginal;
				
				if(tpj('#rev_slider_5_1').revolution == undefined)
					revslider_showDoubleJqueryError('#rev_slider_5_1');
				else
				   revapi5 = tpj('#rev_slider_5_1').show().revolution(
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
				
				});	//ready
				
			</script>
			
							<!-- END REVOLUTION SLIDER -->
            
				<?php the_content(); ?>
			</div>
			<?php if($data['comments_pages']): ?>
				<?php wp_reset_query(); ?>
				<?php comments_template(); ?>
			<?php endif; ?>
		</div>
		<?php endwhile; ?>
	</div>

	<form id="form-eleicoes" action="<?php bloginfo('url'); ?>/eleicoes/#tab6" method="post" class="clear contact_left">
		<?php if (isset($hasError)) { ?>
			<div class="alert error">
				<div class="msg">
					<?php echo __("Verifique se você preencheu todos os campos com informações válidas. Obrigado.", 'Avada'); ?>
				</div>
			</div>
		<?php 
			}
			if (isset($emailSent) && $emailSent == true) { 
		?>
			<div class="alert success">
				<div class="msg">
					<?php echo __('Thank you', 'Avada') .' <strong>'. $name .'</strong> '. __('for using my contact form! Your email was successfully sent!', 'Avada'); ?>
				</div>
			</div>
		<?php } ?>
		<div id="comment-input">
			<input type="text" name="contact_name" id="author" placeholder="Nome" value="<?php echo $_POST['contact_name']; ?>" size="22" tabindex="1" aria-required="true" class="input-name" />
			<input type="text" name="email" id="email" placeholder="E-mail" value="<?php echo $_POST['email']; ?>" size="22" tabindex="2" aria-required="true" class="input-name" />
			<input type="text" name="telefone" id="telefone" placeholder="Telefone" value="<?php echo $_POST['telefone']; ?>" size="22" tabindex="3" aria-required="true" class="input-name" />
			<input type="text" name="patrocinadora" id="patrocinadora" placeholder="Patrocinadora" value="<?php echo $_POST['patrocinadora']; ?>" size="22" tabindex="4" aria-required="true" class="input-name" />
			<textarea name="msg" id="comment" cols="39" rows="4" tabindex="5" class="textarea-comment" placeholder="Mensagem"><?php echo $_POST['msg']; ?></textarea>
		</div>
		<div id="comment-submit">
			<p>
				<div>
					<input type="submit" class="comment-submit button small green" value="Enviar Mensagem" tabindex="5" id="submit" name="submit">
				</div>
			</p>
		</div>
	</form>

	<script>
		jQuery(function(){
			jQuery('#tab6').append(jQuery('#form-eleicoes'));
		})
	</script>

<?php get_footer(); ?>