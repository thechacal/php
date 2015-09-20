<?
include ("include/funcoes.inc");
include ("include/banco.inc");

conectar_banco() or die ("Erro ao acesar o servidor!");
$resultado=mysql_query("DELETE FROM `temp2`");
?>


   <HTML> 
   <HEAD><TITLE>Adicionar Cliente</TITLE>
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
  <li><A href="velocidades.html">Velocidades</A></li>
  <li><a href="index.php?saindo=1">Sair</a></li>
 </ul>
</div>
</div>

<br>
<?
//$ip='10.30.0.31';
$ip=get_vel($vel,$localizacao);
$contmac=$contip=0;
$verificamac=mysql_query("select mac,ip from usuarios  ");
while($linha=mysql_fetch_array($verificamac))
{
    if($linha["mac"]==$mac)
	$contmac++;
    if($linha["ip"]==$ip )
	$contip++;
}
?>
<b><p>Confirma&ccedil;&atilde;o de  Dados do Cliente:</p></b>
<hr>

<FORM ACTION="inserir.php" METHOD=POST>
<input type=hidden name=id value="<? echo $id?>">
<table>
<th>
</th>

<tr>
<td>ID Cabo: </td><td><input type=text readonly size=10 name=idcabo id=idcabo value="<?echo $idcabo?>"></td>
</tr>

<tr>
<td>Nome: </td><td><input type=text readonly size=50 name=nome id=nome value="<?echo $nome?>"></td>
</tr>

<tr>
<td>Localiza&ccedil;&atilde;o: </td><td><input type=text readonly size=50 name=localizacao id=localizacao value="<?echo $localizacao?>"></td>
</tr>

<tr>
<td>Telefone: </td><td><input type=text readonly size=9 name=telefone id=telefone value="<?echo $telefone?>"></td>
</tr>

<tr>
<td>Bloco / Apto: </td><td><input type=text readonly size=50 name=slap id=slap value="<?echo $slap?>" ></td>
</tr>


<tr>
<td>Velocidade: </td><td><input type=text readonly size=14 name=vel value="<?echo $vel?>" id=vel></td>
</tr>

<tr>
<td>MAC: </td><td><input type=text readonly size=14 name=mac value="<?echo $mac?>" id=mac></td>
</tr>

<tr>
<td>Status: </td><td><input type=text readonly size=14 name=string value="<?echo get_status($status);?>" id=string></td>
</tr>

</table>

<tr><td><input name=submit type=submit value="Confirmar Cadastro? "><input align="center" name="btCancel" value="  Voltar " onclick="voltar()" type="button"></td></tr></FORM>
<hr>
<p><b>

<?
if($contmac!=0)
    echo "<script>alert('MAC DA PLACA JA ESTA CADASTRADA, EFETUE NOVAMENTE O CADASTRO!!!');voltar()</script>";
else
    if($contip!=0)
	echo "<script>alert('IP REPETIDO NO BANCO, EFETUE NOVAMENTE O CADASTRO!!!');voltar()</script>";
    else
	$resultado=mysql_query("INSERT INTO temp (ipreservado) VALUES ('$ip')");
?>

</b></p>

</html>
