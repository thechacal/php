<?php
/*
Todo cable modem possui um arquivo de configuração onde esse diz em que velocidade o cliente navegará.
O serviço corujão é um serviço promocional criado pela Cabo Telecom que todo cliente irá navegar
com velocidade dobrada a partir da meia noite, voltando a velocidade normal as 6 da manhã.
Este script faz a lista dos modens que usam o serviço, a troca de arquivos das velocidades, o reset desses
cables para o mesmo receber o novo arquivo de velocidade e pra finalizar gera um log com a operação.

LUACHEIA: Velocidade do CM aumentada em 100%
MEIALUA: Velocidade do CM aumentada em 50%

Edluise Costa a.k.a ThEcHaCaL :: c0d3r@thechacal.net
29/08/2007
Natal / RN / Brasil
*/

//error_reporting(E_ALL);
ini_set("include_path", ".:..:/usr/local/scripts/corujao/edluise");
include_once("include/log_lua_cheia.php");
include("include/cm_list.php");
include("include/cm_reset.php");
include("include/troca-arq.php");

$qtde = 400; // QUANTIDADE DE CMs POR PACOTE

$arquivos_luacheia_on=array("400K.cm;LUACHEIA-200K.cm","VOX-LUACHEIA-400K.cm;VOX-LUACHEIA-200K.cm","600K.cm;LUACHEIA-300K.cm","VOX-LUACHEIA-600K.cm;VOX-LUACHEIA-300K.cm","900K.cm;LUACHEIA-450K.cm","VOX-LUACHEIA-900K.cm;VOX-LUACHEIA-450K.cm");

$arquivos_luacheia_off=array("200K.cm;LUACHEIA-200K.cm","300K.cm;LUACHEIA-300K.cm","450K.cm;LUACHEIA-450K.cm","VOX-LUACHEIA-200K-x.cm;VOX-LUACHEIA-200K.cm","VOX-LUACHEIA-300K-x.cm;VOX-LUACHEIA-300K.cm","VOX-LUACHEIA-450K-x.cm;VOX-LUACHEIA-450K.cm");

$arquivos_meialua_on=array("400K.cm;MEIALUA-200K.cm","600K.cm;MEIALUA-300K.cm","900K.cm;MEIALUA-450K.cm");

$arquivos_meialua_off=array("200K.cm;MEIALUA-200K.cm","300K.cm;MEIALUA-300K.cm","450K.cm;MEIALUA-450K.cm");

        $ps_luacheia=array('13','14','15','23','24','25');
	$ps_meialua=array('10','11','12');

	$servicos=$_SERVER[argv][1];
	$status=$_SERVER[argv][2];

	if(empty ($servicos))
	{
		echo "ex: 'php corujao.php luacheia|meialua on|off' \n";
		exit;
	}
	else
	{
		if(date("l") == "Saturday" or date("l") == "Sunday")
		{
			exit;
		}
		if(($servicos!="luacheia") && ($servicos != "meialua"))
		{
			echo "Parametro '$servicos' Invalido!\n";
			exit;
		}

		if(($status!="on") && ($status != "off"))
		{
			echo "Parametro '$status' Invalido!\n";
			exit;
		}

                $var = "arquivos_" . $servicos . "_" .  $status;
                $arquivos = $$var;

                $var = "ps_$servicos";
		$ps = $$var;

		$mtz=listacable($qtde, $ps);
	        //print_r($mtz);
		gravalog("TROCA_ARQUIVO", "Trocando Arquivos de Configuracao : INICIO.");
                troca_arquivo($arquivos);
		gravalog("TROCA_ARQUIVO", "Trocando Arquivos de Configuracao : FIM.");

		foreach($mtz as $ln)
		{
	 		reseta_cable($ln);

                }
	}

?>
