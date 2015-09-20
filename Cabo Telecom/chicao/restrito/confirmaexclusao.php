<?
include ("/var/www/chicao/include/funcoes.inc");
include ("/var/www/chicao/include/banco.inc");


conectar_banco() or die ("Erro ao acesar o servidor!");
$resultado=mysql_query("DELETE FROM `temp2`");
$excluidos=mysql_query("INSERT excluidos SET id=$id, idcabo='$idcabo', nome='$nome', localizacao='$localizacao', telefone='$telefone', excluidopor='$PHP_AUTH_USER', dataexclusao=now() ");
$resultado=mysql_query("DELETE FROM `usuarios` WHERE `usuarios`.`id` = $id");
?>


   <HTML> 
<title>Cadastro do cliente de Id Cabo <?echo $idcabo?> exclu&iacute;do com sucesso!</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="/css/cuscosky.css" media="screen" />
<script language="JavaScript" src="/js/mylib.js"></script>
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
<?echo "<script>alert('Cadastro Excluido!');inicio();</script>";?>
</body>
</html>
