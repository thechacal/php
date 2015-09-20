<?
require('init.php');
?>

<html>
<head>
 <title>SISADM - Sistema Administrativo Cabo Telecom</title>
 <meta http-equiv="Content-Type" content="text/html; charset=Windows-1250" />
 <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
 <link rel="stylesheet" type="text/css" href="css/cuscosky.css" media="screen" />
</head>
<body onLoad="show_clock()">

<div id="header"><h1>SISADM</h1></div>
<div id="header2"><h2>Sistema Administrativo Cabo Telecom</h2></div>
<script src="js/xaramenu.js"></script><script menumaker src="js/menu.js"></script>
<center>
  <p><script language="javascript" src="js/liveclock.js">
  </script>
  <br>
</p>
  <form method="POST" action="preparar_impressao_anulacao.php">
    <table width="448" border="1" cellspacing="0" cellpadding="2">
      <tr>
        <td width="440">
        <table width="512" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="3" width="430"><strong><font color="#000000" size="2" face="verdana">Cliente</font></strong></td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td width="146"><font size="2" face="verdana">C&oacute;digo:</font></td>
            <td width="288" colspan="2"><font size="2" face="verdana">Nome:</font></td>
            <td width="288" colspan="2"><font size="2" face="verdana">CPF/CNPJ:</font></td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td width="146"><input name="cliente" type="text" id="cliente" size="12"></td>
            <td width="288" colspan="2"><input name="nome" type="text" id="nome" size="40"></td>
            <td width="288" colspan="2"><input name="cpfcnpj" type="text" id="cpfcnpj" size="20"></td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" width="430"><strong><font size="2" face="verdana">Endere&ccedil;o</font></strong></td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" width="430"><font size="2" face="verdana">Rua:</font></td>
            <td width="78"><font size="2" face="verdana"> N&ordm;: </font></td>
          </tr>
          <tr>
            <td colspan="3" width="430"><font size="2" face="verdana">
              <input name="rua" type="text" id="rua" size="64">
            </font></td>
            <td width="78"><font size="2" face="verdana">
              <input name="numero" type="text" id="numero" size="10">
            </font></td>
          </tr>
          <tr>
            <td width="146"><font size="2" face="verdana">Bairro:</font></td>
            <td width="144"><font size="2" face="verdana">CEP:</font></td>
            <td width="144"><font face="verdana" size="2">Outros:</font></td>
            <td width="78"><font face="verdana" size="2">Bloco/Apto:</font></td>
          </tr>
          <tr>
            <td width="146"><input name="bairro" type="text" id="bairro" size="12"></td>
            <td width="144"><input name="cep" type="text" id="cep" size="15"> </td>
            <td width="144">
            <input name="outros" type="text" id="outros" size="16"></td>
            <td width="78"><font size="2" face="verdana">
              <input name="bloco" type="text" id="bloco" size="10"></font></td>
          </tr>
          <tr>
            <td colspan="3" width="430"><strong><font face="verdana" size="2">
            Motivo da Anula&ccedil;&atilde;o</font></strong></td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" width="430">
            <textarea name="motivo" cols="51" rows="6" id="motivo" style="text-align: justify"></textarea></td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" width="430">&nbsp;</td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="4" width="501"><div align="center"><font size="2" face="verdana">
              <input type="submit" name="Submit" value="Preparar para Impress&atilde;o">
              <br>
              <br>
            </font></div></td>
            </tr>
        </table></td>
      </tr>
    </table>
    <tr>
      <td width="80">      
    </form>
  <tr><td colspan="3" width="475">
</center>
<p>&nbsp;</p>
</body>
</html>
