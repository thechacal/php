<?
include ("init.php");
$baixar=$_REQUEST['baixar'];
$id=$_REQUEST['id'];
?>

<html>
<head>
 <title>SISADM - Sistema Administrativo Cabo Telecom</title>
 <meta http-equiv="Content-Type" content="text/html; charset=Windows-1250" />
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.boxy.js'></script>
<script type='text/javascript' src='js/sisadm.js'></script>
<link rel="stylesheet" href="css/boxy.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/cuscosky.css" media="screen" />
</head>

<?
if($_REQUEST['cont']!=0)
    for($i=0;$i<$_REQUEST['cont'];$i++)
    	$resultado=mysql_query("DELETE FROM `arquivodigital` WHERE `arquivodigital`.`id` = $baixar[$i]");
else
    $resultado=mysql_query("DELETE FROM `arquivodigital` WHERE `arquivodigital`.`id` = $id");

echo "<script>jQuery(document).ready(function(){";
echo "Boxy.alert('Caixa(s) Exclu&iacute;da com Sucesso!', function(){location.href='listagem_arquivo_digital.php';})";
echo "});</script>";
?>
</html>
