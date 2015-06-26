<?php
function SqlInjection($sString){

	return str_replace("'","''",trim($sString));

}


function PhpInjection($include){

	if (substr($include,0,4) == "http" || substr($include,0,3) == "ftp" || is_numeric(substr($include,0,3)) || substr($include,0,3) == "../" || substr($include,0,1) == "/"){
		echo "entrou"; die;
		
	    header( 'Location: ' . $location );

		die;

	}

	return $include;

}


function criptografa($texto,$acao){	
	$arrCritografado = array(
		"(@A", //0
		")IO", //1
		"pKl", //2
		"Onr", //3
		"FFp", //4
		"WvM", //5
		"eXq", //6
		"UcG", //7
		"TRZ", //8
		"SdJ"  //9
	);
	$retorno = "";
	
	if ($acao == "c"){
		for ($xi = 0; $xi < strlen($texto); $xi++){
			for ($xj = 0; $xj < count($arrCritografado); $xj++){
				if ($xj == substr($texto,$xi,1)){
					$retorno .= str_replace($xj,$arrCritografado[$xj],substr($texto,$xi,1));
				}
			}
		}
		
	}elseif ($acao == "d"){
		$qt = strlen($texto)/3;
		
		$j = 0;
		for ($i = 0; $i < $qt; $i++){
			for ($h = 0; $h < count($arrCritografado); $h++){
				if ($arrCritografado[$h] ==	substr($texto,$j,3)){
					$retorno .= $h;
				}
			}
			$j += 3;
		}
		
	}
	
	return $retorno;
}

?>