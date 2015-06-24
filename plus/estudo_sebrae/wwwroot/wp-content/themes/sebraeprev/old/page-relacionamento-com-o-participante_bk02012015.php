<?php 
get_header(); 

global $data;

if ($_POST) {
    //Check to make sure that the name field is not empty
    if (trim($_POST['contact_name']) == '' || trim($_POST['contact_name']) == 'Nome (obrigatório)') {
        $hasError = true;
    } else {
        $name = trim($_POST['contact_name']);
    }

    // Validando o telefone
    if (trim($_POST['telefone']) == '' || trim($_POST['telefone']) == 'Telefone') {
        $hasError = true;
    } else {
        $telefone = trim($_POST['telefone']);
    }

    if($_POST['submit-faleconosco']){
    	$subject = "SEBRAE PREVIDÊNCIA - Fale Conosco";

    	//Check to make sure sure that a valid email address is submitted
	    if (trim($_POST['email']) == '' || trim($_POST['email']) == 'Email (obrigatório)') {
	        $hasError = true;
	    } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
	        $hasError = true;
	    } else {
	        $email = trim($_POST['email']);
	    }

        if (trim($_POST['cpf']) == '') {
            $hasError = true;
        } else {
            $cpf = trim($_POST['cpf']);
        }

        if (trim($_POST['uf']) == '') {
            $hasError = true;
        } else {
            $uf = trim($_POST['uf']);
        }

        if (trim($_POST['assunto']) == '') {
            $hasError = true;
        } else {
            $assunto = trim($_POST['assunto']);
        }

        if (trim($_POST['retorno']) == '') {
            $hasError = true;
        } else {
            $retorno = trim($_POST['retorno']);
        }

	    //Check to make sure comments were entered
	    if (trim($_POST['msg']) == '' || trim($_POST['msg']) == 'Message') {
	        $hasError = true;
	    } else {
	        if (function_exists('stripslashes')) {
	            $comments = stripslashes(trim($_POST['msg']));
	        } else {
	            $comments = trim($_POST['msg']);
	        }
	    }
    }

    if($_POST['submit-agendamento']){
    	$subject = "SEBRAE PREVIDÊNCIA - Agendamento";

    	// Validando a data e horário
	    if (trim($_POST['data_horario']) == '' || trim($_POST['data_horario']) == 'Data e Horário') {
	        $hasError = true;
	    } else {
	        $data_horario = trim($_POST['data_horario']);
	    }

	    // Validando a patrocinadora
	    if (trim($_POST['uf']) == '' || trim($_POST['uf']) == 'Patrocinadora') {
	        $hasError = true;
	    } else {
	        $patrocinadora = trim($_POST['uf']);
	    }
    }

    if (!isset($hasError)) {
        //$emailTo = $data['email_address']; //Put your own email address here
        //$emailTo = "vlamir.santo@plusinterativa.com";
        $emailTo = "atendimento@sebraeprev.com.br";
        //$body = "Name: $name \n\nEmail: $email \n\nTelefone: $telefone \n\nSubject: $subject \n\nComments:\n $comments";
        //$headers = "From: ". $name . " <" . $email . ">\r\n";
        if($name) $body = "<p>Nome: $name <br/>";
        if($email) $body .= "E-mail: $email <br />";
        if($cpf) $body .= "CPF: $cpf <br />";
        if($telefone) $body .= "Telefone: $telefone <br />";
        if($uf) $body .= "UF: $uf <br />";
        if($assunto) $body .= "Assunto: $assunto <br />";
        if($retorno) $body .= "Retorno: $retorno <br />";
        if($patrocinadora) $body .= "Patrocinadora: $patrocinadora <br />";
        if($data_horario) $body .= "Data e Horário: $data_horario</p>";
        if($comments) $body .= "Mensagem: $comments</p>";
        $headers = 'MIME-Version: 1.0' . "\n" . 'Content-type: text/html; charset=UTF-8'
                . "\n" . 'From: ' . $name . ' <' . $email . '>\n';
        $mail = wp_mail($emailTo, $subject, $body, $headers);

        if($_POST['submit-faleconosco']) $emailSent1 = true;
        if($_POST['submit-agendamento']) $emailSent2 = true;
    }
}

?>
	<?php
	if(get_post_meta($post->ID, 'pyre_full_width', true) == 'yes') {
		$content_css = 'width:100%';
		$sidebar_css = 'display:none';
	}
	elseif(get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'left') {
		$content_css = 'float:right;';
		$sidebar_css = 'float:left;';
	} elseif(get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'right') {
		$content_css = 'float:left;';
		$sidebar_css = 'float:right;';
	} elseif(get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'default') {
		if($data['default_sidebar_pos'] == 'Left') {
			$content_css = 'float:right;';
			$sidebar_css = 'float:left;';
		} elseif($data['default_sidebar_pos'] == 'Right') {
			$content_css = 'float:left;';
			$sidebar_css = 'float:right;';
		}
	}
	?>
	<div id="content" style="<?php echo $content_css; ?>">
		<?php if(have_posts()): the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php global $data; if(!$data['featured_images_pages'] && has_post_thumbnail()): ?>
			<div class="image">
				<?php the_post_thumbnail('blog-large'); ?>
			</div>
			<?php endif; ?>
			<div class="post-content">
				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
			</div>
			<?php if($data['comments_pages']): ?>
				<?php wp_reset_query(); ?>
				<?php comments_template(); ?>
			<?php endif; ?>
		</div>
		<?php endif; ?>
	</div>

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/jquery.datetimepicker.css"/ >
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.datetimepicker.js"></script>

	<div id="form-faleconosco">
		<form action="<?php bloginfo('url'); ?>/relacionamento-com-o-participante/#tab2" method="post" class="clear contact_left">
            <?php if (isset($hasError)) { ?>
                <div class="alert error"><div class="msg"><?php echo __("Please check if you've filled all the fields with valid information. Thank you.", 'Avada'); ?></div></div>
                <br />
            <?php } ?>

            <?php if (isset($emailSent1) && $emailSent1 == true) { ?>
                <div class="alert success"><div class="msg"><strong><?php echo strtoupper($name); ?></strong><?php echo __(', estamos em recesso. Retornaremos com as nossas atividades no dia 05 de janeiro de 2015.', 'Avada'); ?></div></div>
                <br />
            <?php } ?>

            <div id="comment-input">
                <input type="text" name="contact_name" id="author" value="<?php echo $_POST['contact_name']; ?>" placeholder="Nome (obrigatório)" size="22" tabindex="1" aria-required="true" class="input-name">
                <?php 
                    $estados = array(
					    "AB - Abase"=>"Abase",
                        "AC"=>"Acre",
                        "AL"=>"Alagoas", 
                        "AM"=>"Amazonas", 
                        "AP"=>"Amapá",
                        "BA"=>"Bahia",
                        "CE"=>"Ceará",
                        "DF"=>"Distrito Federal",
                        "ES"=>"Espírito Santo",
                        "GO"=>"Goiás",
                        "MA"=>"Maranhão",
                        "MT"=>"Mato Grosso",
                        "MS"=>"Mato Grosso do Sul",
                        "MG"=>"Minas Gerais",
						"NA - Sebrae Nacional"=>"Sebrae Nacional",
                        "PA"=>"Pará",
                        "PB"=>"Paraíba",
                        "PR"=>"Paraná",
                        "PE"=>"Pernambuco",
                        "PI"=>"Piauí",
                        "RJ"=>"Rio de Janeiro",
                        "RN"=>"Rio Grande do Norte",
                        "RO"=>"Rondônia",
                        "RS"=>"Rio Grande do Sul",
                        "RR"=>"Roraima",
                        "SB - Sebrae Previdência"=>"Sebrae Previdência",
                        "SC"=>"Santa Catarina",
                        "SE"=>"Sergipe",
                        "SP"=>"São Paulo",
                        "TO"=>"Tocantins"
                    );
                    echo '<select name="uf" id="uf" value="'. $_POST['name'] .'" class="input-name">';
                    echo '<option value="">Patrocinadora (SEBRAE)</option>';
                    foreach ($estados as $campo => $valor) {
                        echo '<option value="'. $valor .'" />'. $campo .'</option>';
                    }
                    echo '</select>';
                ?>
                <input type="text" name="email" id="email" value="<?php echo $_POST['email']; ?>" placeholder="E-mail (obrigatório)" size="22" tabindex="2" aria-required="true" class="input-email">
                <input type="text" name="cpf" id="cpf" value="<?php echo $_POST['cpf']; ?>" placeholder="CPF (obrigatório)" size="22" tabindex="2" aria-required="true" class="input-email">
                <input type="text" name="telefone" id="telefone" value="<?php echo $_POST['telefone']; ?>" placeholder="Telefone (com DDD)" size="22" tabindex="2" aria-required="true" class="input-email">
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
                <textarea name="msg" id="comment" cols="39" rows="4" tabindex="4" class="textarea-comment" placeholder="Digite sua mensagem aqui"><?php echo $_POST['msg']; ?></textarea>
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
		<form action="<?php bloginfo('url'); ?>/relacionamento-com-o-participante/#tab3" method="post" class="clear contact_left">
            <?php if (isset($hasError)) { ?>
                <div class="alert error"><div class="msg"><?php echo __("Please check if you've filled all the fields with valid information. Thank you.", 'Avada'); ?></div></div>
                <br />
            <?php } ?>

            <?php if (isset($emailSent2) && $emailSent2 == true) { ?>
                <div class="alert success"><div class="msg"><?php echo __('Thank you', 'Avada'); ?> <strong><?php echo $name; ?></strong> <?php echo __('for using my contact form! Your email was successfully sent!', 'Avada'); ?></div></div>
                <br />
            <?php } ?>

            <div id="comment-input">
                <input type="text" name="contact_name" id="author" value="<?php echo $_POST['contact_name']; ?>" placeholder="Nome (obrigatório)" size="22" tabindex="1" aria-required="true" class="input-name">
                <?php 
                    $estados = array(
					    "AB - Abase"=>"Abase",
                        "AC"=>"Acre",
                        "AL"=>"Alagoas", 
                        "AM"=>"Amazonas", 
                        "AP"=>"Amapá",
                        "BA"=>"Bahia",
                        "CE"=>"Ceará",
                        "DF"=>"Distrito Federal",
                        "ES"=>"Espírito Santo",
                        "GO"=>"Goiás",
                        "MA"=>"Maranhão",
                        "MT"=>"Mato Grosso",
                        "MS"=>"Mato Grosso do Sul",
                        "MG"=>"Minas Gerais",
						"NA - Sebrae Nacional"=>"Sebrae Nacional",
                        "PA"=>"Pará",
                        "PB"=>"Paraíba",
                        "PR"=>"Paraná",
                        "PE"=>"Pernambuco",
                        "PI"=>"Piauí",
                        "RJ"=>"Rio de Janeiro",
                        "RN"=>"Rio Grande do Norte",
                        "RO"=>"Rondônia",
                        "RS"=>"Rio Grande do Sul",
                        "RR"=>"Roraima",
                        "SB - Sebrae Previdência"=>"Sebrae Previdência",
                        "SC"=>"Santa Catarina",
                        "SE"=>"Sergipe",
                        "SP"=>"São Paulo",
                        "TO"=>"Tocantins"
                    );
                    echo '<select name="uf" id="uf" value="'. $_POST['name'] .'" class="input-name">';
                    echo '<option value="">Patrocinadora (SEBRAE)</option>';
                    foreach ($estados as $campo => $valor) {
                        echo '<option value="'. $valor .'" />'. $campo .'</option>';
                    }
                    echo '</select>';
                ?>
                <input type="text" name="telefone" id="telefone" value="<?php echo $_POST['telefone']; ?>" placeholder="Telefone" size="22" tabindex="3" class="input-website">
				<input type="text" name="data_horario" id="data_horario" value="<?php echo $_POST['data_horario']; ?>" placeholder="Data e Horário" size="22" tabindex="2" aria-required="true" class="hasDatepicker input-data">
            </div>
            <div id="comment-submit">
                <p><div><input name="submit-agendamento" type="submit" id="submit" tabindex="5" value="<?php echo __('Agendar', 'Avada'); ?>" class="comment-submit button small green"></div></p>
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
<?php get_footer(); ?>