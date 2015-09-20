<?
require('init.php');
foreach($_GET AS $key => $value) {
${$key} = $value;
}
$usuario=$_SESSION['login']['FullName'];
?>
<html>
<head>
 <title>SISADM - Sistema Administrativo Cabo Telecom</title>
 <meta http-equiv="Content-Type" content="text/html; charset=Windows-1250" />
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.boxy.js'></script>
<script type='text/javascript' src='js/sisadm.js'></script>
<link rel="stylesheet" href="css/boxy.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/cuscosky.css" media="screen" />
</head>
<body onLoad="show_clock()">
<div id="header"><h1>SISADM</h1></div>
<div id="header2"><h2>Sistema Administrativo Cabo Telecom</h2></div>
<script src="js/xaramenu.js"></script><script menumaker src="js/menu.js"></script>
<center><b><p>CADASTRAR CAIXA DE DOCUMENTOS</b><p><script language="javascript" src="js/liveclock.js"></script><p>
<?
if (!$_SESSION['login']['perms']['arquivodigital']) {
        echo "<script>jQuery(document).ready(function(){";
        echo "Boxy.alert('Somente para Colaboradores do Arquivo!', function(){location.href='secured_page.php';})";
        echo "});</script>";
}
if (isset($_REQUEST['idcaixa']))
	{
                $query="INSERT arquivodigital SET idcaixa='${_REQUEST[idcaixa]}', setores='${_REQUEST[setores]}', tipodoc='${_REQUEST[tipodoc]}', conteudo='${_REQUEST[conteudo]}', periodo='${_REQUEST[periodo]}', exercicio='${_REQUEST[exercicio]}', usuario='$usuario', status=1";
                if (!mysql_query($query))
                        $error = mysql_error();
                else
                {
                        echo "<script>jQuery(document).ready(function(){";
                        echo "Boxy.alert('Caixa Cadastrada com Sucesso!', function(){location.href='listagem_arquivo_digital.php';})";
                        echo "});</script>";
                }
        }
?>
<table width="428" border="1" cellspacing="0" cellpadding="2">
    <tr>
      <td width="440">
      <table width="626" border="0" cellspacing="0" cellpadding="0">
	<FORM name="formcadastro" ACTION="cadastrar_caixa.php" METHOD=POST onsubmit="return validar_arquivo_digital()">
	<tr>
	<td>ID Caixa: </td><td><input type=text size=10 name=idcaixa id=idcaixa ></td>
	</tr>
	<tr><td>Setor:</td><td><SELECT name="setores" id="setores">
                          <option value="Administrativo">Administrativo</option>
                          <option value="AdmRedes">AdmRedes</option>
                          <option value="Comercial">Comercial</option>
                          <option value="Desenvolvimento">Desenvolvimento</option>
                          <option value="Diretoria">Diretoria</option>
                          <option value="Engenharia">Engenharia</option>
                          <option value="Marketing">Marketing</option>
                          <option value="Relacionamento">Relacionamento</option>
                          <option value="RH">RH</option>
                          <option value="SAC">SAC</option>
                          <option value="Suporte">Suporte</option>
                          </SELECT></td></tr>

	<tr>
	<td>Tipo do DOC: </td><td><input type=text size=50 name=tipodoc id=tipodoc ></td>
	</tr>
	<tr>
	<td valign="top">Conte&uacute;do: </td><td><textarea name="conteudo" cols="60" rows="10" id="conteudo"></textarea></td>
	</tr>
	<tr>
	<td>Per&iacute;odo: </td><td><input type=text size=9 name=periodo id=periodo onKeyDown="textCounter(this.form.periodo,this.form.remLen,10);" onKeyUp="textCounter(this.form.periodo,this.form.remLen,10);" maxlengt="10" OnKeyPress="format(this, '##/##/####')"></td>
	</tr>
	<tr><td>Exerc&iacute;cio:</td><td><SELECT name="exercicio" id="exercicio">
                          <option value="2000">2000</option>
                          <option value="2001">2001</option>
                          <option value="2002">2002</option>
                          <option value="2003">2003</option>
                          <option value="2004">2004</option>
                          <option value="2005">2005</option>
                          <option value="2006">2006</option>
                          <option value="2007">2007</option>
                          <option value="2008">2008</option>
                          <option value="2009">2009</option>
                          </SELECT></td></tr>
    </table>
</table>
<p>
<tr><td><input type=submit name=submit value=Adicionar>&nbsp;<input type="button" value="Limpar" onClick="limpa()"></td></tr>
</FORM>
</body>
</html>
