<?
include ("include/funcoes.inc");
include ("include/banco.inc");


conectar_banco() or die ("Erro ao acesar o servidor!");
$resultado=mysql_query("DELETE FROM `temp2`");
?>


   <HTML> 
   <HEAD><TITLE>Cliente Cadastrado!</TITLE>
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
  <li><A href="velocidades.html">Velocidades</A></li>
  <li><A href="usuario.php">Usuario</A></li>
  <li><a href="index.php?saindo=1">Sair</a></li>
 </ul>
</div>
</div>
<b><p>Dados Cadastrados com Sucesso!</p></b>
<hr>
<p><b>ID Cabo: </b><? echo $idcabo; ?></p>
<p><b>Nome: </b><? echo $nome; ?></p>
<b><p>Localiza&ccedil;&atilde;o: </b><? echo $localizacao;?></p>
<p><b>Telefone: </b><? echo $telefone; ?></p>
<p><b>Sala/Ap: </b><? echo $slap; ?></p>
<p><b>IP: </b>
<?
$resultado=mysql_query("SELECT * FROM temp");
$linha=mysql_fetch_array($resultado);
$ip=$linha["ipreservado"];
if($ip==NULL)
{
    $ip="Acabaram os IPs!!";
}
else echo $ip;
?>
</p>
<p><b>MAC: </b><? echo $mac; ?></p>
<p><b>Status: </b><? echo get_status(1);?></p>
<hr>

<tr><td><input align="center" name="btCancel" value="  Inicio " onclick="inicio()" type="button"></td></tr>

<?
$resultado=mysql_query("INSERT INTO usuarios (idcabo,telefone,nome,localizacao,data,slap,ip,mac,status,usuario) VALUES ('$idcabo','$telefone','$nome','$localizacao',now(),'$slap','$ip','$mac',1,'". $PHP_AUTH_USER ."')");
if (!$resultado) {
   die('Invalid query: ' . mysql_error());
    };
$resultado=mysql_query("DELETE FROM `temp` WHERE `temp`.`ipreservado`  = '$ip'");
?>
</html>
