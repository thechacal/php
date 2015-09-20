<?
include ("include/funcoes.inc");
include ("include/banco.inc");


conectar_banco() or die ("Erro ao acesar o servidor!");
$resultado=mysql_query("DELETE FROM `temp2` ");
?>


   <HTML> 
   <HEAD><TITLE>Listagens</TITLE>
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
<br><input value="Listar todos os Clientes" type="button" onclick="location.href = 'listar_clientes.php';"></br>
<br><input value="Listar Clientes Ativos" type="button" onclick="location.href = 'listar_ativos.php';"></br>
<br><input value="Listar Clientes Bloqueados ( Inadimpl&ecirc;ncia )" type="button" onclick="location.href = 'bloqueados_inadimplencia.php';"></br>
<br><input value="Listar Clientes Bloqueados ( Outros )" type="button" onclick="location.href = 'bloqueados_outros.php';"></br>
<br><input value="Listar Clientes que foram Exclu&iacute;dos" type="button" onclick="location.href = 'listar_excluidos.php';"></br>

  
   </BODY> 
   </HTML>
 

