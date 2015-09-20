<?
function conectar_banco() {

	$link = mysql_pconnect("189.124.128.28","condominios","senha");

	if ($link && mysql_select_db("condointerjato"))
		return($link);
	return(FALSE);
}
?>
