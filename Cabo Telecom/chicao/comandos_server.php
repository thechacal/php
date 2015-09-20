<?
include ("include/funcoes.inc");
include ("include/banco.inc");

if ($id==""){
echo "sem id";
exit;
}
conectar_banco() or die ("Erro ao acesar o servidor!");

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


$resultado=mysql_query("INSERT INTO temp2 (ping) VALUES ('$ip')");

?>


<HTML> 
<title>Cliente Id Cabo <? echo $idcabo . " ( ". $nome . " )" ;?></title>
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
<b><p>Localiza&ccedil;&atilde;o: </b> <? echo $localizacao ;?></p>
<input type=hidden name=id value="<? echo $id?>">
<table>

 <tr>
<td>IP: </td><td><input readonly type=text size=14 name=ip value="<?echo $ip?>" id=ip></td>
</tr>
 
<tr>
<td>MAC: </td><td><input readonly type=text size=14 name=mac value="<?echo $mac?>" id=mac></td>
</tr>

</table>
<br>
<tr><td><input align="center" name="btCancel" value="  Voltar " onclick="detalhe(<?echo $id?>)" type="button">&nbsp;<input align="center" name="ping" value="Pingar IP" onclick="janelaping('ping.php');" type=button>&nbsp;<input align="center" name="iparp" value="Verifica IP na ARP" onclick="janelaping('ip_arp.php');" type=button>&nbsp;<input align="center" name="libip" value="Libera o IP" onclick="janelaping('lib_ip.php');" type=button>&nbsp;<input align="center" name="blockip" value="Bloqueia o IP" onclick="janelaping('bloq_ip.php');" type=button></td></tr>

<hr>
</body>
</html>

