<? function gravalog ($descr,$detal)
{

	$mylog = fopen("/usr/local/scripts/corujao/edluise/logs/troca_de_arquivos.log","a+");
	$mylog2 = fopen("/usr/local/scripts/corujao/edluise/logs/cms_reiniciados.log","a+");

	$datahora = date("d/m/Y H:i:s");
	if($mylog and $descr == "TROCA_ARQUIVO")
	{
		$logbuffer = "$datahora $descr $detal\n";
		fwrite($mylog,$logbuffer);
	}
	if($mylog2 and $descr == "RESET_CABLE")
	{
		$logbuffer = chop($logbuffer);
		$logbuffer = "$datahora $descr $detal\n";
		fwrite($mylog2,$logbuffer);
	}
	fclose($mylog);
	fclose($mylog2);
}
?>
