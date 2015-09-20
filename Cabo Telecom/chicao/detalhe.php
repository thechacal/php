<?
include ("include/funcoes.inc");
include ("include/banco.inc");

conectar_banco() or die ("Erro ao acesar o servidor!");

?>


   <HTML> 
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

<?
$resultado=mysql_query("select * from usuarios where id='" . $id . "'");
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
$localizacao = $linha["localizacao"];
$alteradopor = $linha["alteradopor"];
$telefone = $linha["telefone"];
$idcabo = $linha["idcabo"];
$dataalteracao = $linha["dataalteracao"];

$resultado=mysql_query("DELETE FROM `temp2` ");

?>
<title>Detalhes do cliente ID Cabo <? echo $idcabo . " ( ". $nome . " )" ;?></title>
<b><p> ID Cabo:</b> <? echo $idcabo . " ( ". $nome . " )" ;?></p>
<b><p> Cadastrado no dia:</b> <? echo $data ?></p>
<b><p> Usuario que fez o cadastro:</b> <? echo $usuario ?>.</p>
<b><p> Condominio:</b> <?echo $localizacao?></p>
<b><p> Bloco/Apto: </b><? echo $slap?></p>
<b><p> TEL: </b><? echo $telefone?></p>
<b><p> IP: </b><? echo $ip?></p>
<b><p> MAC: </b> <?echo $mac?></p>
<b><p> STATUS: </b><?echo get_status($status)?></p>
<b><p> Ultimo usuario que modificou o cadastro do cliente: </b><?echo $alteradopor?></p>
<b><p> Data da modifica&ccedil;&atilde;o: </b><?echo $dataalteracao?></p>
<hr>

<tr><td><input type=button name=editar value=Editar onclick="editar(<?echo $id?>)">&nbsp;<input align="center" name="btCancel" value="  Voltar " onclick="inicio()" type="button">&nbsp;<input type="button" value="Bloquear/Desbloquear" onClick="restrito(<?echo $id?>)">&nbsp;<input type="button" value="Excluir Cliente" onClick="excluir(<?echo $id?>)">&nbsp;<input type="button" value="Comandos no Servidor" onClick="comandos(<?echo $id?>)"></td></tr>
</body>
</html>
