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
  <form method="POST" action="preparar_impressao_debcred.php">
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
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td width="146"><input name="cliente" type="text" id="cliente" size="12">
            </td>
            <td width="288" colspan="2"><input name="nome" type="text" id="nome" size="40"></td>
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
            <td width="146"><strong><font size="2" face="Verdana">Valor</font></strong></td>
            <td width="288" colspan="2"><strong><font size="2" face="Verdana">Valor por Extenso: </font></strong></td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td width="146"><input name="valor" type="text" id="valor" size="12"></td>
            <td width="288" colspan="2"><input name="extenso" type="text" id="extenso" size="40"></td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td width="146"><b><font face="verdana" size="2">Movimento</font></b></td>
            <td width="288" colspan="2"><b><font face="verdana" size="2">Conceito</font></b></td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td width="146"><select size="1" name="movimento" id="movimento">
            <option selected>---</option>
            <option>A - Ajuste de crédito</option>
            <option>J - Ajuste de débito</option>
            <option>C - Nota de crédito</option>
            <option>D - Nota de débito</option>
            <option>F - Nota Fiscal</option>
		</select></td>
            <td width="288" colspan="2">
            <select size="1" name="conceito" id="conceito">
            <option selected>---</option>
            <option>063 - Cobranca de Cablemodem</option>
            <option>901 - Ajuste de arredondamento</option>
		<option>902 - Estorno de Lançamento</option>
            <option>903 - Ajuste de conta corrente</option>
            <option>904 - Cheque devolvido</option>
            <option>905 - Devoluçăo do pagamento</option>
            <option>906 - Desconto</option>
            <option>907 - Transferęncia de débito</option>
            <option>908 - Gestăo de cobrança</option>
            <option>909 - Fora da data de faturamento</option>
            <option>910 - Crédito a deduzir</option>
            <option>911 - Cobrança de decoder</option>
            <option>912 - Inserçăo de publicidade</option>
            <option>913 - Impostos Retidos</option>
            <option>914 - Taxa por deslocamento de cobrança</option>
            <option>915 - Falta de Sinal</option>
            <option>920 - Multa</option>
            <option>921 - Juros</option>
            <option>922 - Taxas administrativas</option>
            <option>923 - Ajuste Judicial</option>
            <option>924 - Negociaçăo</option>
            <option>925 - Multa contratual</option>
            <option>926 - Ajustes de faturamento</option>
            <option>927 - Atraso na fatura</option>
            <option>929 - Transferęncia de crédito</option>
            <option>931 - Juros e Multa</option>
            <option>932 - Bonus da retençăo</option>
            </select></td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" width="430"><strong><font face="verdana" size="2">
            Observaçăo</font></strong></td>
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
