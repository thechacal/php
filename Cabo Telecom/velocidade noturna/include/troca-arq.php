<? function troca_arquivo($arquivos)
{

	$diretorio="/tftpboot/";

	foreach($arquivos as $arquivo)
	{
		list($origem,$destino)=split(";",$arquivo);
		@copy($diretorio.$origem, $diretorio.$destino);
	}

}
?>