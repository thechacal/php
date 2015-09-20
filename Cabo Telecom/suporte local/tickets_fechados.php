<?
include ("banco.inc");


conectar_banco() or die ("Erro ao acesar o servidor!");
$resultado=mysql_query("select nome,ramal,gravidade,resumo,descricao,data,ip,hora,solucao,tecnico from chamadosfechados order by data");
?>


   <HTML> 
<title>Lista de Tickets Fechados</title>
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/cuscosky.css" media="screen" />
<script language="JavaScript" src="js/mylib.js"></script>
</head>
<body>
<div id="header"><h1>SUPORTE LOCAL</h1>
</div>
<br>
<p>Lista de Tickets Fechados</p>

<table border='1' cellpadding='5' cellspacing='1'><tr>
<th width="5%"> Nome</th>
<th width="5%"> Ramal </th>
<th width="5%"> Gravidade </th>
<th width="10%"> Resumo do Problema</th>
<th width="10%"> Descricao do Problema</th>
<th width="10%"> Data de Abertura</th>
<th width="10%"> IP</th>
<th width="10%"> Hora de Abertura</th>
<th width="10%"> Solucao</th>
<th width="10%"> Tecnico</th>

</tR>
<?
while($linha=mysql_fetch_array($resultado)){
$nome = $linha["nome"];
$ramal = $linha["ramal"];
$gravidade = $linha["gravidade"];
$resumo = $linha["resumo"];
$descricao = $linha["descricao"];
$data = $linha["data"];
$ip = $linha["ip"];
$hora = $linha["hora"];
$solucao = $linha["solucao"];
$tecnico = $linha["tecnico"];

?>
<tr aling="left">
<td width="10%"><? echo $nome;?></th>
<td width="5%"><? echo $ramal;?></th>
<td width="5%"><b><font color="red"><? echo $gravidade;?></b></th>
<td width="10%"><? echo $resumo;?></th>
<td width="10%"><? echo $descricao;?></th>
<td width="10%"><? echo $data;?></th>
<td width="10%"><? echo $ip;?></th>
<td width="10%"><? echo $hora;?></th>
<td width="10%"><? echo $solucao;?></th>
<td width="10%"><? echo $tecnico;}?></th>
</tr>
</table>
<hr>
 <tr><td><input align="center" name="btCancel" value="  Voltar " onclick="location.href = 'tickets_ativos.php'" type="button"></tr></td>
</body>
</html>
