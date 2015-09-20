<?
require('init.php');
$resultado=mysql_query("select id,idcaixa,setores,tipodoc,conteudo,periodo,exercicio,usuario,status from arquivodigital order by id");
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
<div id="header"><h1>SISADM</h1></div>
<div id="header2"><h2>Sistema Administrativo Cabo Telecom</h2></div>
<script src="js/xaramenu.js"></script><script menumaker src="js/menu.js"></script>
<p>
<center>
<?
if (!$_SESSION['login']['perms']['arquivodigital']) {
        echo "<script>jQuery(document).ready(function(){";
        echo "Boxy.alert('Somente para Colaboradores do Arquivo!', function(){location.href='secured_page.php';})";
        echo "});</script>";
}
?>
<FORM ACTION="excluir_caixa.php" METHOD=POST>
<table border='1' cellpadding='5' cellspacing='1'><tr>
<th width="5%"> Excluir Caixa</th>
<th width="5%"> ID Caixa</th>
<th width="5%"> Setor</th>
<th width="5%"> Tipo do DOC</th>
<th width="5%"> Conte&uacute;do</th>
<th width="5%"> Per&iacute;odo</th>
<th width="5%"> Exerc&iacute;cio</th>
<th width="5%"> Usu&aacute;rio que Cadastrou</th>
<th width="5%"> Status</th>

</tR>
<?
$cont=0;
while($linha=mysql_fetch_array($resultado)){
$cont+=1;
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
<tr aling="left">
<td><input type=checkbox id="baixar" name="baixar[]" VALUE="<?echo $id?>"></td>
<td width="10%"><a href="detalhe_documento.php?id=<?echo $id;?>"><? echo $idcaixa; ?></a></th>
<td width="5%"><? echo $setores;?></th>
<td width="10%"><? echo $tipodoc;?></th>
<td width="10%"><? echo $conteudo;?></th>
<td width="10%"><? echo $periodo;?></th>
<td width="10%"><? echo $exercicio;?></th>
<td width="10%"><? echo $usuario;?></th>
<td width="10%"><?if($status==1) echo "Disponivel";else echo "Emprestado";}?></th>
</tr>
</table>
</table>
<input type=hidden name=cont value="<? echo $cont?>">
<tr><td><input align="center" value="  Excluir Caixa(s) Selecionadas " type="submit"></td></tr>
</FORM>
</body>
</html>
