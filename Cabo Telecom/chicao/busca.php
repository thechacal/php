<?
include ("include/funcoes.inc");
include ("include/banco.inc");


conectar_banco() or die ("Erro ao acesar o servidor!");

$resultado=mysql_query("DELETE FROM `temp2` ");
?>


   <HTML> 
   <HEAD><TITLE>Busca de Clientes</TITLE>
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
<br><input value="Busca por ID Cabo" type="button" onclick="location.href = 'idcabo.php';"></br>
<br><input value="Busca por Nome do Cliente" type="button" onclick="location.href = 'nomecliente.php';"></br>
<br><input value="Busca por Nome do Condom&iacute;nio" type="button" onclick="location.href = 'nomecondominio.php';"></br>
<br><input value="Busca pelo Telefone do Cliente" type="button" onclick="location.href = 'telefone.php';"></br>
<br><input value="Busca pelo Bloco / Apto" type="button" onclick="location.href = 'blocoapto.php';"></br>
<br><input value="Busca pelo IP do Cliente" type="button" onclick="location.href = 'ipcliente.php';"></br>
<br><input value="Busca pelo MAC do Cliente" type="button" onclick="location.href = 'maccliente.php';"></br>
<br><input value="Busca pela Velocidade do Cliente" type="button" onclick="location.href = 'velocidade.php';"></br>

  
   </BODY> 
   </HTML>
 

