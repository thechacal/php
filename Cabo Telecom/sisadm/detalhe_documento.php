<?
require('init.php');
foreach($_GET AS $key => $value) {
${$key} = $value;
}
$resultado=mysql_query("select id,idcaixa,setores,tipodoc,conteudo,periodo,exercicio,usuario,status from arquivodigital where id='" . $id . "'");
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
<body onLoad="show_clock()">
<div id="header"><h1>SISADM</h1></div>
<div id="header2"><h2>Sistema Administrativo Cabo Telecom</h2></div>
<script src="js/xaramenu.js"></script><script menumaker src="js/menu.js"></script>
<div id="impressao">
<center><b><p>DETALHES DO DOCUMENTO</b><p><script language="javascript" src="js/liveclock.js"></script><p>
<?
if (!$_SESSION['login']['perms']['arquivodigital']) {
        echo "<script>jQuery(document).ready(function(){";
        echo "Boxy.alert('Somente para Colaboradores do Arquivo!', function(){location.href='secured_page.php';})";
        echo "});</script>";
}
if (isset($_REQUEST['status']))
        {
                if($_REQUEST['status']==1)
                        $query="UPDATE arquivodigital SET status=2  WHERE id='${_REQUEST[id]}'";
                else
                        $query="UPDATE arquivodigital SET status=1  WHERE id='${_REQUEST[id]}'";
                if (!mysql_query($query))
                        $error = mysql_error();
                else
                {
                        echo "<script>jQuery(document).ready(function(){";
                        echo "Boxy.alert('Solicita&ccedil;&atilde;o feita com sucesso!', function(){location.href='preparar_impressao_emprestimo.php?id=".$_REQUEST['id']."';})";
                        echo "});</script>";
                }
        }
while($linha=mysql_fetch_array($resultado)){
$id = $linha["id"];
$idcaixa = $linha["idcaixa"];
$setores = $linha["setores"];
$tipodoc = $linha["tipodoc"];
$conteudo = $linha["conteudo"];
$periodo = $linha["periodo"];
$exercicio = $linha["exercicio"];
$usuario = $linha["usuario"];
$status = $linha["status"];
 
?>
<FORM ACTION="detalhe_documento.php" METHOD=POST>
<table width="428" border="1" cellspacing="0" cellpadding="2">
    <tr>
      <td width="440">
      <table width="626" border="0" cellspacing="0" cellpadding="0">
	<b><p> ID Caixa: </b> <? echo $idcaixa?></p>
	<b><p> Setor: </b> <? echo $setores?></p>
	<b><p> Tipo do DOC: </b> <? echo $tipodoc?>.</p>
	<b><p> Conteudo:</b> <?echo $conteudo?></p>
	<b><p> Periodo: </b><? echo $periodo?></p>
	<b><p> Exercicio: </b><? echo $exercicio?></p>
	<b><p> Status: </b><?if($status==1) echo "Disponivel";else echo "Emprestado";}?></th></p>
     </table>
</table>
<input type=hidden name=id value="<? echo $id?>">
<input type=hidden name=status value="<? echo $status?>">
<p><tr><td><input align="center" name="btCancel" value="Emprestar/Devolver Documento" type="submit"></td></tr>
</FORM>
</div>
</center>
</body>
</html>
