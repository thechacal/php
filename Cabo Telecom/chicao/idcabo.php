<?
include ("include/funcoes.inc");
include ("include/banco.inc");

conectar_banco() or die ("Erro ao acesar o servidor!");
$resultado=mysql_query("DELETE FROM `temp2` ");
$resultado=mysql_query("select id,nome,status,ip,mac,localizacao,idcabo,telefone from usuarios order by id");
?>


   <HTML> 
<title>Busca por ID Cabo</title>
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
<b><p>Digite o ID Cabo do Cliente:</p></b>
<hr>

<form method="POST" action="search.php">
<p>
<td><tr>ID Cabo:</tr></td> 
<input size=10 name=idcabo value="">
<input type=hidden size=10 name="tipo" value="idcabo">
<input type=submit name="botao" value="busca">
</p>
</form>
<p><tr><td><input align="center" name="btCancel" value="  Cancelar " onclick="novapesquisa()" type="button"></td></tr>
</body>
<hr>
</html>
