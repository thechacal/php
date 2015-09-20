<?
include ("banco.inc");


conectar_banco() or die ("Erro ao acesar o servidor!");
$resultado=mysql_query("select id,nome,ramal,gravidade,resumo,descricao from chamados order by id");
?>


   <HTML> 
<title>Lista de Tickets Ativos</title>
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/cuscosky.css" media="screen" />
<script language="JavaScript" src="js/mylib.js"></script>
</head>
<body>
<div id="header"><h1>SUPORTE LOCAL</h1>
</div>
<br>
<p>Lista de Tickets Ativos</p>

<table border='1' cellpadding='5' cellspacing='1'><tr>
<th width="5%"> Codigo do Chamado</th>
<th width="5%"> Nome</th>
<th width="5%"> Ramal </th>
<th width="5%"> Gravidade </th>
<th width="10%"> Resumo do Problema</th>

</tR>
<?
while($linha=mysql_fetch_array($resultado)){
$id = $linha["id"];
$nome = $linha["nome"];
$ramal = $linha["ramal"];
$gravidade = $linha["gravidade"];
$resumo = $linha["resumo"];

?>
<tr aling="left">
<td width="5%"><a href="detalhe.php?id=<?echo $id;?>"><b><font color="red"><? echo $id;?></b></font></a></th>
<td width="10%"><? echo $nome;?></th>
<td width="5%"><? echo $ramal;?></th>
<td width="5%"><b><font color="red"><? echo $gravidade;?></b></th>
<td width="10%"><? echo $resumo;}?></th>
</tr>
</table>
<hr>
</body>
</html>
