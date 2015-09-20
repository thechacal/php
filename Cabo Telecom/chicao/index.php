<?
//print_r($_SERVER);
if ($saindo == 1) {

echo "<HTML><HEAD><TITLE>Redirecionando...</TITLE><META http-equiv=Refresh content=1;URL=http://192.168.0.1/condominios/></head>";
echo "<body>Redirecionando para a pagina <a href=\"http://192.168.0.1/condominios\">inicial</a>";
exit;
}
?>

   <HTML> 
   <HEAD><TITLE>Bem Vindo <?print_r($PHP_AUTH_USER);?>!!</TITLE>
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/cuscosky.css" media="screen" />
 </HEAD>
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
   </HTML>

