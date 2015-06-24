<?php global $data; ?>

<!--INTEGRAÇÂO ABRE-->



<style type="text/css">

	form#form-integracao > input[type="submit"] {display:inline!important;}

	a#showhidetrigger{text-decoration:underline!important;}

	#showhidetarget{position:absolute; z-index:1000; padding:10px; background: rgb(9, 41, 66); background: rgba(9, 41, 66, 0.8);}

	a:hover.fancybox-iframe{text-decoration:underline;}

	

</style>



<script>



function limpaLabel(campo,textoDefault,pass){

	if (campo.value == textoDefault){

		if (pass == "true"){

			var nome = campo.name;

			var size = campo.size;

			document.getElementById(nome + "Form").innerHTML = "<input type=\"password\" name=\"" + nome + "\" id=\"" + nome + "\" size=\"" + size + "\" class=\"input\" value=\"\" onFocus=\"limpaLabel(this,'" + textoDefault + "','true')\" onBlur=\"carregaLabel(this,'" + textoDefault + "','true')\" onload=\"this.focus();\">";



			setTimeout("document.getElementById('" + nome + "').focus()",250);

		}else{

			campo.value = "";

		}

	}

}



function carregaLabel(campo,textoDefault,pass){

	if (campo.value == ""){

		if (pass == "true"){

			var nome = campo.name;

			var size = campo.size;

			document.getElementById(nome + "Form").innerHTML = "<input type=\"text\" name=\"" + nome + "\" id=\"" + nome + "\" size=\"" + size + "\" class=\"input\" value=\"" + textoDefault + "\" onFocus=\"limpaLabel(this,'" + textoDefault + "','true')\" onBlur=\"carregaLabel(this,'" + textoDefault + "','true')\">";

		}else{

			campo.value = textoDefault;

		}

	}

}



jQuery(document).ready(function () {

	  //jQuery('#showhidetarget').hide();



	  jQuery('a#showhidetrigger').click(function () {

	  jQuery('#showhidetarget').toggle(400);

	  });

});



</script>

<?

//$boolLogado = $_GET['boolLogado'];

$boolLogado = FALSE;



include("integracao-login/trust_config.php");

include("integracao-login/funcoes.php");



//$location = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

$location = strtok($_SERVER["REQUEST_URI"],'?');

$template = get_bloginfo('template_directory');





function conecta(){

	mysql_connect("200.234.202.92","sebraeprev1","d8538r43pr3v@1");

	mysql_select_db("sebraeprev1");

}



if ($_GET['logoff'] == "true"){

    

	conecta();

	

	$sSql = "delete from mantemLogin where cpf = '" . criptografa($_COOKIE[md5("logaCPF")],"d") . "'";

	mysql_query($sSql);

	mysql_close();

	

	setcookie(md5("logaCPF"),"",time() - 3600,"/");

	setcookie(md5("logaMenu"),"",time() - 3600,"/");

	setcookie(md5("logaNome"),"",time() - 3600,"/");

	

	//$boolLogado = FALSE;

	

	if ($_GET['msg'] != ""){

		//header( 'Location: ' . $location . '?msg=1&boolLogado=FALSE' );

		header( 'Location: ' . $location . '?msg=1' );

	}else{

		//header( 'Location: ' . $location . '?boolLogado=FALSE' );

		header( 'Location: http://sebraeprevidencia.com.br/');

	}

    

	die();

	

}else{

	if ($_COOKIE[md5("logaCPF")] != ""){

	   	

		conecta();

		$sSql = "select cpf from mantemLogin where TIME_TO_SEC(TIMEDIFF(NOW(),data)) < 440 and cpf = '" . criptografa($_COOKIE[md5("logaCPF")],"d") . "'";

		mysql_query($sSql);

		

		if (mysql_affected_rows() > 0){

			$sSql = "update mantemLogin set data = now() where cpf = '" . criptografa($_COOKIE[md5("logaCPF")],"d") . "'";

			mysql_query($sSql);

			

			$boolLogado = TRUE;

			//mysql_close();

			

			//header( 'Location: ' . $location . '?boolLogado=TRUE' );

			

			//die();

		}else{

			$sSql = "delete from mantemLogin where cpf = '" . criptografa($_COOKIE[md5("logaCPF")],"d") . "'";

			mysql_query($sSql);

			

			setcookie(md5("logaCPF"),"",time() - 3600,"/");

			setcookie(md5("logaMenu"),"",time() - 3600,"/");

			setcookie(md5("logaNome"),"",time() - 3600,"/");

			

			//mysql_close();

			

			//header( 'Location: ' . $location . '?boolLogado=FALSE' );

			

			//die();

		}

		

		mysql_close();

	}

}



if ($_POST['user'] != "" && $_POST['pass2'] != ""){

    

	$wsdlPath="http://" . $urlServerTrust . "/InterfaceServico/TrustInterface.asmx";

	$vl_xml= wp_remote_get($wsdlPath . "/ValidaLogin?pLogin=" . $_POST['user'] . "&pSenha=" . $_POST['pass2']);

	$vl_result = wp_remote_retrieve_body($vl_xml);

	

	if ($vl_result == FALSE){

	    

		?>

		<script language="javascript">

			alert("O servidor encontra-se fora do ar no momento!\nTente novamente dentro de alguns minutos!");

		</script>

		<?

	}else{

	    			

		$result1  = simplexml_load_string($vl_result);

	    

	    //if ($result->Valido == "true" || $_POST['pass2'] == "$#%##m4xc0d3@#$!"){

		if ($result1->Valido == "true"){

		    

			$cu_xml= wp_remote_get($wsdlPath . "/ContextualizacaoUsuarioCpf?pLogin=" . $_POST['user']);

			$cu_result = wp_remote_retrieve_body($cu_xml);

			

			

			if ($cu_result == FALSE){

				?>

				<script language="javascript">

					alert("O servidor encontra-se fora do ar no momento!\nTente novamente dentro de alguns minutos!");

				</script>

				<?

			}else{

			    

				$boolLogado = TRUE;

				

			    $result2  = simplexml_load_string($cu_result);

	            

				$menu = "<h4 class=titulo-funcs>ACESSO RESTRITO</h4>";



				foreach ($result2->Funcs->Funcionalidades as $key => $val){

					$menu .= "<a href=$template/framework/headers/integracao-login/pg_trust.php?t=" . str_replace("~/","",$val->NM_PAGINA) . " class=fancybox-iframe style=display:block>" . /*utf8_encode($val->NM_FUNCIONALIDADE)*/htmlentities ($val->NM_FUNCIONALIDADE,ENT_QUOTES,'utf-8') . "</a>";

				}

				

                $menu .= "<a href=http://sebraeprevidencia.com.br/atos-e-relatorios/ class=btn style=display:block>Documentos dos Conselhos e Diretoria</a>";

				

				setcookie(md5("logaMenu"),$menu,time()+3600,"/");

				setcookie(md5("logaNome"),$result2->NM_PESSOA,time()+3600,"/");

				setcookie(md5("logaCPF"),criptografa($result2->NR_CNPJ_CPF,"c"),time()+3600,"/");

							

				conecta();

				$sSql = "delete from mantemLogin where cpf = '" . $result2->NR_CNPJ_CPF . "'";

				mysql_query($sSql);

				

				$sSql = "insert into mantemLogin values ('" . SqlInjection($result2->NR_CNPJ_CPF) . "','" . SqlInjection($result2->NM_PESSOA) . "','" . SqlInjection($result2->NM_EMAIL) . "',now()) ";

				mysql_query($sSql);

				mysql_close();

				

				$boolLogado = TRUE;

				//header( 'Location: ' . $location);

				header( 'Location: http://sebraeprevidencia.com.br/area-restrita-do-usuario/');

				

				die();

			}

			

		}else{

			?>

			<script language="javascript">

				alert("Login Invalido!");

			</script>

			<?

		}

	}

	

}elseif ($_POST['user'] != ""){

	?>

	<script language="javascript">

		alert("Login Invalido!");

	</script>

	<?

}elseif ($_GET['msg'] == "1"){

	?>

	<script language="javascript">

		alert("Tempo de sessao expirado!\nSera necessario efetuar o login novamente antes de continuar.");

	</script>

	<?

}

?>

<!--INTEGRAÇÂO FECHA-->



<div class="header-v3">

	<div class="header-social">

		<div class="avada-row">

			<div class="alignleft">

				<?php

				if($data['header_left_content'] == 'Contact Info') {

					get_template_part('framework/headers/header-info');

				} elseif($data['header_left_content'] == 'Social Links') {

					get_template_part('framework/headers/header-social');

				} elseif($data['header_left_content'] == 'Navigation') {

					get_template_part('framework/headers/header-menu');

				}

				?>

									

				

				<!--INTEGRAÇÂO ABRE-->

				<?

				if (!$boolLogado){

				?>

					

						<script language="javascript">

							function carregaSenha(){

								var teste = false;

								document.getElementById("pass2").value = document.getElementById("pass").value;

								

								if (document.getElementById("user").value == ""){ teste = true; }

								if (document.getElementById("pass2").value == ""){ teste = true; }

								

								if (teste){

									alert("Favor informar CPF e Senha para prosseguir!");

									return false;

								}

							}

						</script>

						<form name="form1" id="form-integracao" method="post" action="<?php echo($location); ?>" onsubmit="return carregaSenha();">

							<input type="hidden" name="pass2" id="pass2" value="" />

						    Login <input style="color:black!important;" class="input" type="text" name="user" id="user" size="22" maxlength="11" value="CPF" onfocus="limpaLabel(this,'CPF','');" onblur="carregaLabel(this,'CPF','')">

							senha <input style="color:black!important;" class="input" type="password" name="pass" id="pass" size="22" value="Senha" onfocus="limpaLabel(this,'Senha','');" onblur="carregaLabel(this,'Senha','')">

							<input type="submit" name="bt" value="Entrar" style="background:#c7c7c7;" />

						</form>

						<!--<a href="index.php?secao=integracao-login/secoes.php&sc=65&sub=MA==&url=pg_trust.php&t=NovoUsuario.aspx" title="Primeiro acesso" class="fancybox-iframe">primeiro acesso</a>

						 | <a href="index.php?secao=integracao-login/secoes.php&sc=65&sub=MA==&url=pg_trust.php&t=RedefinirSenha.aspx" title="Esqueci a minha senha" class="fancybox-iframe">esqueci minha senha</a>-->

						 <a href="<?echo($template);?>/framework/headers/integracao-login/pg_trust.php?t=NovoUsuario.aspx" title="Primeiro acesso" class="fancybox-iframe">primeiro acesso</a>

						 | <a href="<?echo($template);?>/framework/headers/integracao-login/pg_trust.php?t=RedefinirSenha.aspx" title="Esqueci a minha senha" class="fancybox-iframe">esqueci minha senha</a>

						

				<?

				}else{

				

				?> 

				

				            

							<font color=#FFFFFF>

							<font color="#ffffff">Ol&aacute;, <b><?echo($_COOKIE[md5("logaNome")]);?></font></b>

							&nbsp;|&nbsp;<a href="http://sebraeprevidencia.com.br/homologacao/area-restrita-do-usuario/" >&Aacute;rea Restrita</a> <!--<a id="showhidetrigger" href="#">Menu de acesso</a>-->

							&nbsp;|&nbsp;<a href="<?echo($location);?>?logoff=true"><span><font color="#ffffff">[Sair do Sistema]</font></span></a>

							</font>

							<div id="showhidetarget" style="display:none;">	

				<?

							//menu de acesso abre 

							if ($_COOKIE[md5("logaMenu")] != ""){

								echo $_COOKIE[md5("logaMenu")];

							}

							//menu de acesso fecha

				?>

                            </div>				

				<?			

				}

				?>

				                  

					        

				<!--INTEGRAÇÂO FECHA-->

						

			</div>

			<div class="alignright">

				<?php

				if($data['header_right_content'] == 'Contact Info') {

					get_template_part('framework/headers/header-info');

				} elseif($data['header_right_content'] == 'Social Links') {

					get_template_part('framework/headers/header-social');

				} elseif($data['header_right_content'] == 'Navigation') {

					get_template_part('framework/headers/header-menu');

				}

				?>

			</div>

		</div>

	</div>

	<header id="header">

		<div class="avada-row" style="margin-top:<?php echo $data['margin_header_top']; ?>;margin-bottom:<?php echo $data['margin_header_bottom']; ?>;">

			<div class="logo" style="margin-left:<?php echo $data['margin_logo_left']; ?>;margin-bottom:<?php echo $data['margin_logo_bottom']; ?>;"><a href="<?php bloginfo('url'); ?>"><img src="<?php echo $data['logo']; ?>" alt="<?php bloginfo('name'); ?>" /></a></div>

			<?php if($data['ubermenu']): ?>

			<nav id="nav-uber">

			<?php else: ?>

			<nav id="nav" class="nav-holder">

			<?php endif; ?>

				<?php wp_nav_menu(array('theme_location' => 'main_navigation', 'depth' => 4, 'container' => false, 'menu_id' => 'nav')); ?>

			</nav>

		</div>

	</header>

</div>