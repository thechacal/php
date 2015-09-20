<?
include ("include/funcoes.inc");
include ("include/banco.inc");

conectar_banco() or die ("Erro ao acesar o servidor!");

$resultado=mysql_query("DELETE FROM `temp2`");

//$PHP_AUTH_USER
$resultado=mysql_query("UPDATE usuarios SET dataalteracao=now(),idcabo='$idcabo', nome='$nome', telefone='$telefone', mac='$mac', alteradopor='$PHP_AUTH_USER', slap='$slap'  WHERE id=$id");
?>


   <HTML> 
<title>Cadastro do cliente de Id Cabo <?echo $idcabo?> alterado com sucesso!</title>
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
  <li><A href="usuario.php">Usuario</A></li>
  <li><a href="index.php?saindo=1">Sair</a></li>
 </ul>
</div>
</div>

<?

echo "<script>alert('Cadastro alterado!');detalhe($id);</script>";

?>
</html>
