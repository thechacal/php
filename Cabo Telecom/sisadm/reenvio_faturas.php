<?
require('init.php');
foreach($_GET AS $key => $value) {
${$key} = $value;
}
$operador=$_SESSION['login']['FullName'];
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
<div id="header"><h1>SISADM</h1></div>
<div id="header2"><h2>Sistema Administrativo Cabo Telecom</h2></div>
<script src="js/xaramenu.js"></script><script menumaker src="js/menu.js"></script>
<?
        if (isset($_REQUEST['idcabo']))
        {
		$query="INSERT reenvio_faturas SET idcabo='${_REQUEST[idcabo]}', nomecliente='${_REQUEST[nome]}', notafiscal='${_REQUEST[notafiscal]}', telefone='${_REQUEST[telefone]}', motivo='${_REQUEST[motivo]}', mes='${_REQUEST[mes]}', vencimento='${_REQUEST[vencimento]}', operador='$operador', data=now()";
		if (!mysql_query($query))
			$error = mysql_error();
		else
		{
			echo "<script>jQuery(document).ready(function(){";
                        echo "Boxy.alert('Solicita&ccedil;&atilde;o feita com sucesso!', function(){location.href='listagem_reenvio_faturas.php';})";
                        echo "});</script>";
               	}
        }
?>

<form method="POST" action="reenvio_faturas.php" onsubmit="return validar_faturas();">
<center>
    <table width="448" border="1" cellspacing="0" cellpadding="2">
      <tr>
        <td width="440">
        <table width="512" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="3" width="430"><strong><font color="#000000" size="2" face="verdana">Cliente</font></strong></td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td width="146"><font size="2" face="verdana">ID Cabo:</font></td>
            <td width="288" colspan="2"><font size="2" face="verdana">Nome:</font></td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td width="146"><input name="idcabo" type="text" id="idcabo" size="12">
            </td>
            <td width="288" colspan="2"><input name="nome" type="text" id="nome" size="40"></td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" width="430"><strong><font size="2" face="verdana">Dados da Fatura</font></strong></td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" width="430"><font size="2" face="verdana">Nota Fiscal:</font></td>
          </tr>
          <tr>
            <td colspan="3" width="430"><font size="2" face="verdana">
              <input name="notafiscal" type="text" id="notafiscal" size="30">
            </font></td>
          </tr>
          <tr>
            <td width="146"><font size="2" face="verdana">Telefone:</font></td>
           </tr>
          <tr>
            <td width="146"><input name="telefone" type="text" id="telefone" size="12"></td>
          </tr>
          <tr>
            <td width="146" colspan="2"><b><font face="verdana" size="2">Vencimento</font></b></td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
	    <td>
                <select name="vencimento" id="vencimento"> 
                <option value="VENCIMENTO DIA 6" selected>VENCIMENTO DIA 6</option>
                <option value="VENCIMENTO DIA 7">VENCIMENTO DIA 7</option>
                <option value="VENCIMENTO DIA 9">VENCIMENTO DIA 9</option>
                <option value="VENCIMENTO DIA 12">VENCIMENTO DIA 12</option>
                <option value="VENCIMENTO DIA 15">VENCIMENTO DIA 15</option>
                <option value="VENCIMENTO DIA 17">VENCIMENTO DIA 17</option>
                </select>
            </td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td width="146"><b><font face="verdana" size="2">Motivo</font></b></td>
            <td width="288" colspan="2"><b><font face="verdana" size="2">M&ecirc;s</font></b></td>
          </tr>
          <tr>
	    <td>
		<select id=motivo name=motivo>
		<option value="NAO RECEBEU A FATURA" selected>NAO RECEBEU A FATURA</option>
		<option value="DUPLICIDADE DE FATURA">DUPLICIDADE DE FATURA</option>
		<option value="OUTROS">OUTROS</option>
		</select>
	    </td>
	    <td>
		<select id=mes name=mes>
		<option value="JANEIRO" selected>JANEIRO</option>
		<option value="FEVEREIRO">FEVEREIRO</option>
		<option value="MARCO">MARCO</option>
		<option value="ABRIL">ABRIL</option>
		<option value="MAIO">MAIO</option>
		<option value="JUNHO">JUNHO</option>
		<option value="JULHO">JULHO</option>
		<option value="AGOSTO">AGOSTO</option>
		<option value="SETEMBRO">SETEMBRO</option>
		<option value="OUTUBRO">OUTUBRO</option>
		<option value="NOVEMBRO">NOVEMBRO</option>
		<option value="DEZEMBRO">DEZEMBRO</option>
		</select>
	    </td>
          </tr>
          <tr>
            <td colspan="3" width="430">&nbsp;</td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="4" width="501"><div align="center"><font size="2" face="verdana">
              <input type="submit" name="Submit" value="Adicionar">&nbsp;<input type="button" value="Limpar" onClick="limpa()">
              <br>
              <br>
            </font></div></td>
            </tr>
        </table></td>
      </tr>
    </table>
</form>
</body>
</html>
