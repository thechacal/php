<?
include ("include/funcoes.inc");
include ("include/banco.inc");


if ($id==""){
echo "sem id";
exit;
}
conectar_banco() or die ("Erro ao acesar o servidor!");
$resultado=mysql_query("DELETE FROM `temp2` ");

$resultado=mysql_query("select * from usuarios where id='" . $id . "'");
if (!$resultado) {
   die('Invalid query: ' . mysql_error());
}
//criando resultados / montando resultado
$linha=mysql_fetch_array($resultado);
$id = $linha["id"];
$usuario = $linha["usuario"];
$data = $linha["data"];
$status = $linha["status"];
$mac = $linha["mac"];
$ip = $linha["ip"];
$nome = $linha["nome"];
$slap = $linha["slap"];
$telefone = $linha["telefone"];
$localizacao = $linha["localizacao"];
$idcabo = $linha["idcabo"];

?>


   <HTML> 
<title>Alterando dados do cliente Id Cabo <? echo $idcabo . " ( ". $nome . " )" ;?></title>
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/cuscosky.css" media="screen" />
<script language="JavaScript" src="js/mylib.js"></script>
</head>
<body>
<div id="header"><h1>CHIC&Atilde;O</h1>
<div id="menu">
  <ul id="nav">
  <li><A href="listagens.php">Listagens</A></li>
  <li><A href="busca.php">Busca de Clientes</A></li>
  <li><A href="adicionar.php">Adicionar Cliente</A></li>
  <li><A href="velocidades.php">Velocidades</A></li>
  <li><a href="index.php?saindo=1">Sair</a></li>
 </ul>
</div>
</div>

<b><p>ID Cabo: </b> <? echo $idcabo . " ( ". $nome . " )" ;?></p>
<p><b>Sendo alterado pelo usuario: </b><?print_r($PHP_AUTH_USER);?></p>
<FORM name="formcadastro" ACTION="alterar.php" METHOD=POST onsubmit="return checkform();">
<input type=hidden name=id value="<? echo $id?>">
<table>
<th>
</th>

<tr>
<td>ID Cabo: </td><td><input type=text size=10 name=idcabo id=idcabo value="<?echo $idcabo?>"></td>
</tr>

<tr>
<td>Nome: </td><td><input type=text size=50 name=nome id=nome value="<?echo $nome?>" class=styled onKeyDown="textCounter(this.form.nome,this.form.remLen,45);" onKeyUp="textCounter(this.form.nome,this.form.remLen,45);"></td>
</tr>

<tr>
<td>Telefone: </td><td><input type=text size=9 name=telefone id=telefone value="<?echo $telefone?>" class=styled  onKeyDown="textCounter(this.form.telefone,this.form.remLen,12);" onKeyUp="textCounter(this.form.telefone,this.form.remLen,12);" maxlengt="9" OnKeyPress="format(this, '##-####-####')"></td>
</tr>

<tr>
<td>Bloco / Apto: </td><td><input type=text size=50 name=slap id=slap value="<?echo $slap?>" class=styled  onKeyDown="textCounter(this.form.slap,this.form.remLen,44);" onKeyUp="textCounter(this.form.slap,this.form.remLen,44);"></td>
</tr>

 <tr>
<td>MAC: </td><td><input type=text size=14 name=mac value="<?echo $mac?>" id=mac class=styled onKeyDown="textCounter(this.form.mac,this.form.remLen,17);" onKeyUp="textCounter(this.form.mac,this.form.remLen,17);" maxlengt="14" OnKeyPress="format(this, '##:##:##:##:##:##')"></td>
</tr>

<tr>
<td></td><td><input type=submit value=Alterar>&nbsp;<input readonly type=text name=remLen size=3 maxlength=3 value=""><b> Caracteres faltando.</td></tr>
</tr>
</table>
</FORM>
<tr><td><input align="center" name="btCancel" value="  Voltar " onclick="detalhe(<?echo $id?>)" type="button">&nbsp;</td></tr>

<hr>
</body>
</html>

