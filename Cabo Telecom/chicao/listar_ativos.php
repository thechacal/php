<?
include ("include/funcoes.inc");
include ("include/banco.inc");


conectar_banco() or die ("Erro ao acesar o servidor!");
$resultado=mysql_query("DELETE FROM `temp2` ");
$resultado=mysql_query("select id,nome,status,ip,mac,localizacao,idcabo,telefone from usuarios where status = '1' order by id");
?>


   <HTML> 
<title>Lista de Clientes Ativos</title>
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
<br>
<p>Lista de Clientes Ativos</p>

<table border='1' cellpadding='5' cellspacing='1'><tr>
<th width="5%"> ID Cabo</th>
<th width="15%"> Nome </th>
<th width="5%"> Status </th>
<th width="10%"> IP </th>
<th width="10%"> MAC </th>
<th width="10%"> Localizacao </th>
<th width="10%"> Telefone </th>

</tR>
<?
$bunda=0;
while($linha=mysql_fetch_array($resultado)){
$bunda+=1;
$id = $linha["id"];
$idcabo = $linha["idcabo"];
$nome = $linha["nome"];
$status = $linha["status"];
$ip = $linha["ip"];
$mac = $linha["mac"];
$localizacao = $linha["localizacao"];
$telefone = $linha["telefone"];

?>
<tr aling="left">
<td width="5%"><? echo $idcabo; ?></th>
<td width="15%"><a href="detalhe.php?id=<?echo $id;?>"><? echo $nome; ?></a></th>
<td width="5%"><? echo $status;?></th>
<td width="10%"><? echo $ip;?></th>
<td width="10%"><? echo $mac;?></th>
<td width="10%"><? echo $localizacao;?></th>
<td width="10%"><? echo $telefone;}?></th>
</tr>
</table>
<p><b>Total de Clientes Ativos: <?echo $bunda;?>
<hr>
<p><tr><td><input align="center" name="btCancel" value="  Voltar " onclick="listar()" type="button">&nbsp;</td></tr></p>
</body>
</html>
