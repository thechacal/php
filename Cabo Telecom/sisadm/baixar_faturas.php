<?
require('init.php');
$resultado=mysql_query("select id,idcabo,nomecliente,notafiscal,telefone,motivo,data,vencimento,mes from reenvio_faturas order by id");
?>

<html>
<head>
 <title>SISADM - Sistema Administrativo Cabo Telecom</title>
 <meta http-equiv="Content-Type" content="text/html; charset=Windows-1250" />
 <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
 <link rel="stylesheet" type="text/css" href="css/cuscosky.css" media="screen" />
</head>

<div id="header"><h1>SISADM</h1></div>
<div id="header2"><h2>Sistema Administrativo Cabo Telecom</h2></div>
<script src="js/xaramenu.js"></script><script menumaker src="js/menu.js"></script>
<center>
<FORM ACTION="fechar_fatura.php" METHOD=POST>
<p><table border='1' cellpadding='5' cellspacing='1'><tr>
<th width="5%"> Baixar Fatura</th>
<th width="5%"> ID Cabo</th>
<th width="5%"> Nome do Cliente</th>
<th width="5%"> Nota Fiscal</th>
<th width="5%"> Telefone</th>
<th width="5%"> Motivo</th>
<th width="5%"> Data</th>
<th width="5%"> Vencimento</th>
<th width="5%"> M&ecirc;s</th>

</tR>
<?
$cont=0;
while($linha=mysql_fetch_array($resultado)){
$cont+=1;
$id = $linha["id"];
$idcabo = $linha["idcabo"];
$nomecliente = $linha["nomecliente"];
$notafiscal = $linha["notafiscal"];
$telefone = $linha["telefone"];
$motivo = $linha["motivo"];
$data = $linha["data"];
$vencimento = $linha["vencimento"];
$mes = $linha["mes"];
?>

<tr aling="left">
<td><input type=checkbox id="baixar" name="baixar[]" VALUE="<?echo $id?>"></td>
<td width="5%"><? echo $idcabo;?></a></th>
<td width="10%"><? echo $nomecliente;?></th>
<td width="10%"><? echo $notafiscal;?></th>
<td width="5%"><? echo $telefone;?></th>
<td width="5%"><? echo $motivo;?></th>
<td width="5%"><? echo $data;?></th>
<td width="5%"><? echo $vencimento;?></th>
<td width="5%"><? echo $mes;}?></th>
</tr>
</table>
<input type=hidden name=cont value="<? echo $cont?>">
<p><tr><td><input align="center" value="  Baixar Faturas Selecionadas " type="submit"></td></tr>
</FORM>
</body>
</html>
