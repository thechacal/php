<?
include ("include/funcoes.inc");
include ("include/banco.inc");


conectar_banco() or die ("Erro ao acesar o servidor!");

$resultado=mysql_query("DELETE FROM `temp2`");

?>


   <HTML> 
   <HEAD><TITLE>Adicionar Cliente</TITLE>
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

<b><p>Adicionando Cliente</p></b>
<hr>

<FORM name="formcadastro" ACTION="confirma.php" METHOD=POST onsubmit="return checkform();">


<table>

<tr>
<td>ID Cabo: </td><td><input type=text size=10 name=idcabo id=idcabo class=styled ></td>
</tr>


<tr>
<td>Nome: </td><td><input type=text size=50 name=nome id=nome class=styled onKeyDown="textCounter(this.form.nome,this.form.remLen,45);" onKeyUp="textCounter(this.form.nome,this.form.remLen,45);"></td>
</tr>

<tr>
<td>Localiza&ccedil;&atilde;o: </td>
<td>
<select id=localizacao name=localizacao>
    <option value="ALTO DO VALE" selected>ALTO DO VALE</option>
    <option value="ARCO IRIS">ARCO IRIS</option>
    <option value="CORDOBA">CORDOBA</option>
    <option value="CHACON">CHACON</option>
    <option value="IMPERIAL GARDEN">IMPERIAL GARDEN</option>
    <option value="ITAMARATY">ITAMARATY</option>
    <option value="ITATIAIA">ITATIAIA</option>
    <option value="JARDIM ARUANDA">JARDIM ARUANDA</option>
    <option value="MONZA">MONZA</option>
    <option value="PARQUE FLAMENGO">PARQUE FLAMENGO</option>
    <option value="PARQUE DAS PEDRAS">PARQUE DAS PEDRAS</option>
    <option value="PLANALTO">PLANALTO</option>
    <option value="PRAIAS DO SUL">PRAIAS DO SUL</option>
    <option value="RESIDENCIAL JIQUI">RESIDENCIAL JIQUI</option>
    <option value="SANTIAGO DE COMPOSTELA">SANTIAGO DE COMPOSTELA</option>
    <option value="SAINT JAMES">SAINT JAMES</option>
    <option value="SERRAMBI III">SERRAMBI III</option>
    <option value="SPORT PARK">SPORT PARK</option>
</select>
</td>
</tr>

<tr>
<td>Telefone: </td><td><input type=text size=9 name=telefone id=telefone class=styled  onKeyDown="textCounter(this.form.telefone,this.form.remLen,12);" onKeyUp="textCounter(this.form.telefone,this.form.remLen,12);" maxlengt="9" OnKeyPress="format(this, '##-####-####')"></td>
</tr>

<tr>
<td>Bloco / Apto: </td><td><input type=text size=50 name=slap id=slap class=styled onKeyDown="textCounter(this.form.slap,this.form.remLen,44);" onKeyUp="textCounter(this.form.slap,this.form.remLen,44);"></td>
</tr>

<tr>
<td>Velocidade: </td>
<td>
<select id=vel name=vel>
    <option value="200k" selected>200K</option>
    <option value="300k">300K</option>
    <option value="450k">450K</option>
    <option value="750k">750K</option>
    <option value="1mb">1MB</option>
</select>
</td>
</tr>


<tr>
<td>MAC: </td><td><input type=text size=14 name=mac value="" id=mac class=styled onKeyDown="textCounter(this.form.mac,this.form.remLen,17);" onKeyUp="textCounter(this.form.mac,this.form.remLen,17);" maxlengt="14" OnKeyPress="format(this, '##:##:##:##:##:##')">
</td>
</tr>

<tr>
<td>Status: </td>
<td>
<select name="status">
    <option value="1" selected>Ativo</option>
</select>
</td>
</tr>

</table>

<tr><td><input type=submit name=submit value=Adicionar>&nbsp;<input align="center" name="btCancel" value="  Cancelar " onclick="inicio()" type="button">&nbsp;<input type="button" value="Limpar" onClick="limpa()">&nbsp;<input readonly type=text name=remLen size=3 maxlength=3 value=""><b> Caracteres faltando.</td></tr>

</FORM>

<hr>
<b><p align=right><font color=red size=1>TELA 7</font></p></b>
</body>
</html>
