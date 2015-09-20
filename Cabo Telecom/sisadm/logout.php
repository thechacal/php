<?
	require('init.php');
foreach($_GET AS $key => $value) {
${$key} = $value;
}
	
	session_unset();
	session_destroy();
  	if ($saindo == 1)
  	{
  		echo "<HTML><HEAD><TITLE>Redirecionando...</TITLE><META http-equiv=Refresh content=1;URL=http://sisadm.cabonatal.com.br/></head>";
		echo "<body>Redirecionando para a pagina <a href=\"http://sisadm.cabonatal.com.br\">inicial</a>";
		exit;
	}
?>
