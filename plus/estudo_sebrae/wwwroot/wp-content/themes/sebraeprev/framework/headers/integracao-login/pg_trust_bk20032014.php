<?
include("trust_config.php");

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
	<iframe src="<? echo "http://" . $urlServerTrust . "/sebrae.novo/" . $turl; ?>" width="605" height="860" frameborder="0" scrolling="auto"></iframe>
	<?
}
?>