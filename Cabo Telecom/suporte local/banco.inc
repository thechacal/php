<?
function conectar_banco() {

	$link = mysql_pconnect("189.124.128.28","SUPORTELOCAL","senha");

	if ($link && mysql_select_db("suportelocal"))
		return($link);
	return(FALSE);
}
?>
