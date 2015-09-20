<?
include ("include/funcoes.inc");
include ("include/banco.inc");


conectar_banco() or die ("Erro ao acesar o servidor!");
$resultado=mysql_query("DELETE FROM `temp2` ");


if ($tipo == "idcabo") {

        $resultado=mysql_query("select telefone,id,nome,status,ip,mac,localizacao,idcabo from usuarios where idcabo like '%$idcabo%' order by `ip`");

} 

if ($tipo == "nome") {

        $resultado=mysql_query("select telefone,id,nome,status,ip,mac,localizacao,idcabo from usuarios where nome like '%$nome%' order by `ip`");

} 

if ($tipo == "localizacao") {

        $resultado=mysql_query("select telefone,id,nome,status,ip,mac,localizacao,idcabo from usuarios where localizacao like '%$localizacao%' order by `ip`");

} 

if ($tipo == "telefone") {

        $resultado=mysql_query("select telefone,id,nome,status,ip,mac,localizacao,idcabo from usuarios where telefone like '%$telefone%' order by `ip` ");

} 

if ($tipo == "slap") {

        $resultado=mysql_query("select telefone,id,nome,status,ip,mac,localizacao,idcabo from usuarios where slap like '%$slap%' order by `ip`");

} 

if ($tipo == "ip") {

        $resultado=mysql_query("select telefone,id,nome,status,ip,mac,localizacao,idcabo from usuarios where ip like '%$ip%' order by `ip` ");

} 

if ($tipo == "mac") {

        $resultado=mysql_query("select telefone,id,nome,status,ip,mac,localizacao,idcabo from usuarios where mac like '%$mac%' order by `ip` ");

} 

if ($tipo == "vel") {
    if($vel=="200k")
        $resultado=mysql_query("select telefone,id,nome,status,ip,mac,localizacao,idcabo from usuarios where ip like '%10.5.0.%' || `ip` LIKE '%10.10.1.%' || `ip` LIKE '%10.20.0.%' || `ip` LIKE '%10.20.1.%' || `ip` LIKE '%10.70.0.%' || `ip` LIKE '%192.168.1.%' || `ip` LIKE '%192.168.13.%' || `ip` LIKE '%10.30.0.%' || `ip` LIKE '%10.30.1.%' || `ip` LIKE '%10.30.2.%' order by `ip` ");
    if($vel=="300k")
        $resultado=mysql_query("select telefone,id,nome,status,ip,mac,localizacao,idcabo from usuarios where ip like '%10.70.1.%' order by `ip` ");
    if($vel=="450k")
        $resultado=mysql_query("select telefone,id,nome,status,ip,mac,localizacao,idcabo from usuarios where ip like '%10.99.0.%' order by `ip` ");
    if($vel=="750k")
        $resultado=mysql_query("select telefone,id,nome,status,ip,mac,localizacao,idcabo from usuarios where ip like '%10.199.0.%' order by `ip` ");
    if($vel=="1mb")
        $resultado=mysql_query("select telefone,id,nome,status,ip,mac,localizacao,idcabo from usuarios where ip like '%10.89.0.%' order by `ip` ");
} 


?>


   <HTML> 
<title>Clientes Cadastrados</title>
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
<p>Lista de Clientes</p>

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
$idcabo = $linha["idcabo"];
$id = $linha["id"];
$nome = $linha["nome"];
$status = $linha["status"];
$ip = $linha["ip"];
$mac = $linha["mac"];
$localizacao = $linha["localizacao"];
$telefone = $linha["telefone"];
?>
<tr aling="left">
<td width="5%"><? echo $idcabo; ?></th>
<td width="15%"><A href="detalhe.php?id=<?echo $id;?>"><? echo $nome; ?></a></th>
<td width="5%"><?echo $status;?></th>
<td width="10%"><? echo $ip;?></th>
<td width="10%"><? echo $mac; ?></th>
<td width="10%"><? echo $localizacao; ?></th>
<td width="10%"><? echo $telefone; }?></th>
</tr>
</table>
<p><b>Total de Clientes: <?echo $bunda;?>
 <hr>
 <p><tr><td><input align="center" name="btCancel" value="  Tela Inicial " onclick="inicio()" type="button">&nbsp;<input align="center" name="btCancel" value="  Nova Pesquisa " onclick="novapesquisa()" type="button">&nbsp;</td></tr></p>
</body>
</html>

