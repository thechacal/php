<?
include ("banco.inc");

if ($id==""){
echo "sem id";
exit;
}

conectar_banco() or die ("Erro ao acesar o servidor!");

?>


   <HTML> 
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/cuscosky.css" media="screen" />
<script language="JavaScript" src="mylib.js"></script>
</head>
<body>
<div id="header"><h1>SUPORTE LOCAL</h1>
</div>

<?
$resultado=mysql_query("select * from chamados where id='" . $id . "'");
$linha=mysql_fetch_array($resultado);
$id = $linha["id"];
if ($id=="")
    echo "<script>alert('Este ticket ja foi fechado!!!');location.href = 'tickets_ativos.php';</script>";
$nome = $linha["nome"];
$setores = $linha["depto"];
$ramal = $linha["ramal"];
$gravidade = $linha["gravidade"];
$resumo = $linha["resumo"];
$descricao = $linha["descricao"];
$detalhes = $linha["detalhes"];
$data = $linha["data"];
$ip = $linha["ip"];
$hora = $linha["hora"];

?>
<title>Detalhes do Ticket</title>
<b><p> Codigo de identificacao do ticket:  <font color="red"><? echo $id;?></b></font></p>
<b><p> Nome do Colaborador: </b> <? echo $nome ?>.</p>
<b><p> Setor: </b> <? echo $setores ?>.</p>
<b><p> Ramal: </b> <?echo $ramal?></p>
<b><p> Gravidade: <font color="red"><? echo $gravidade;?></b></font></p>
<b><p> Resumo do Problema: </b><? echo $resumo?></p>
<b><p> Descricao do Problema: </b><? echo $descricao?></p>
<b><p> IP de quem abriu o Ticket: </b> <?echo $ip?></p>
<b><p> Data do Ticket: </b> <? echo $data ?></p>
<b><p> Hora do Ticket: </b> <? echo $hora ?></p>

<FORM ACTION="fecharticket.php" METHOD=POST onsubmit="return validar_form()">
<b><tr><td valign="top">Como foi Solucionado: </b></td><td><textarea name="solucao" cols="60" rows="10" id="solucao"></textarea></td></tr>
<p><tr><td>Solucionado por: </td><td><SELECT name="tecnico">
			<option value="Edluise">Edluise</option>
			<option value="Gledson">Gledson</option>
			</SELECT></td></tr></p>

<hr>
<input type=hidden name=id value="<? echo $id?>">
<tr><td><input align="center" name="btCancel" value="  Tickets Ativos " onclick="location.href = 'tickets_ativos.php'" type="button">&nbsp;<input align="center" name="btCancel" value="  Tickets Fechados " onclick="location.href = 'tickets_fechados.php'" type="button">&nbsp;<input align="center" name="btCancel" value="  Fechar Ticket " type="submit"></td></tr>
</form>
</body>
</html>
