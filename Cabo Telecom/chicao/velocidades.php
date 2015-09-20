<?
include ("include/funcoes.inc");
include ("include/banco.inc");

conectar_banco() or die ("Erro ao acesar o servidor!");
$resultado=mysql_query("DELETE FROM `temp2` ");
?>


   <HTML> 
<title>Velocidades</title>
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
<b><p>Velocidades Comercializadas</p></b>
<hr>
<b><p> 200K:</b> 10.5.0.XXX, 10.10.1.XXX, 10.20.0.XXX, 10.20.1.XXX, 10.70.0.XXX, 192.168.1.XXX, 192.168.13.XXX, 10.30.0.XXX, 10.30.1.XXX, 10.30.2.XXX </p>
<b><p> 300K:</b> 10.70.1.XXX</p>
<b><p> 450K:</b> 10.99.0.XXX</p>
<b><p> 750K:</b> 10.199.0.XXX</p>
<b><p> 1MB: </b> 10.89.0.XXX</p>

<hr>
<tr><td><input align="center" name="btCancel" value="  Voltar " onclick="inicio()" type="button"></td></tr>
</body>
</html>
