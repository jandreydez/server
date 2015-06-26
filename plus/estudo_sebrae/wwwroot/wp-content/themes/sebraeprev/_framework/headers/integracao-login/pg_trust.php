<?php
include "trust_config.php";
//$urlServerTrust = "177.159.151.250";
//$urlFormTrust = "http://" . $urlServerTrust . "/sebrae.novo/";

if ($_GET['t'] != ""){
	$turl = $_GET['t'];
	
	if ($turl != "RedefinirSenha.aspx" && $turl != "NovoUsuario.aspx"){
		if ($_COOKIE[md5("logaCPF")] != ""){
			$turl .= "?Usu=" . $_COOKIE[md5("logaCPF")];
		}else{
			die;
		}
	}
	?>

	<iframe src="<?php echo $urlFormTrust . $turl; ?>" width="850" height="890" frameborder="0" scrolling="auto"></iframe>
	<?php
}
?>