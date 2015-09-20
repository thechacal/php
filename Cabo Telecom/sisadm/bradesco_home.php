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
<div id="impressao">
<center><b><h4><p>AUTORIZAÇĂO DE DÉBITO PROGRAMADO</h4></b><p><script language="javascript" src="js/liveclock.js"></script><p>
</p>
  <form method="POST" action="preparar_impressao_bradesco.php">
    <table width="448" border="1" cellspacing="0" cellpadding="2">
      <tr>
        <td width="440">
        <table width="478" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="3" width="400"><strong>
            <font color="#000000" size="2" face="Verdana">
            Cliente</font></strong></td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td width="104"><font size="2" face="Verdana">C&oacute;digo:</font></td>
            <td width="296" colspan="2"><font size="2" face="Verdana">Nome:</font></td>
            <td width="78"><font size="2" face="Verdana">CPF</font></td>
          </tr>
          <tr>
            <td width="104"><font face="Verdana"><input name="cliente" type="text" id="cliente" size="12"></font><font size="2" face="Verdana">
            </font>
            </td>
            <td width="296" colspan="2"><font face="Verdana"><input name="nome" type="text" id="nome" size="40"></font></td>
            <td width="78"><font size="2" face="Verdana">
              <input name="numero1" type="text" id="numero1" size="18"></font></td>
          </tr>
          <tr>
            <td colspan="3" width="400"><strong><font face="Verdana" size="2">
            Dados Bancários</font></strong></td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td width="104"><font size="2" face="Verdana">Agęncia:</font></td>
            <td width="296" colspan="2"><font face="Verdana" size="2">Conta:</font></td>
            <td width="78"><font face="Verdana" size="2">Tipo:</font></td>
          </tr>
          <tr>
            <td width="104">
            <font face="Verdana">
            <input name="cliente1" type="text" id="cliente1" size="12"></font><font size="2" face="Verdana">
            </font>
            </td>
            <td width="296" colspan="2"><font face="Verdana"><input name="ad" type="text" id="ad" size="40"></font></td>
            <td width="78"><select size="1" name="cpf" id="cpf">
            <option selected>---</option>
            <option>Conta Corrente</option>
            <option>Conta Poupança</option>
            </select></td>
          </tr>
          <tr>
            <td colspan="3" width="400"><strong><font face="Verdana" size="2">
            Dados adicionais</font></strong></td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td width="104"><font face="Verdana" size="2">Telefone:</font></td>
            <td width="296" colspan="2"><font face="Verdana" size="2">Endereço de E-MAIL:</font></td>
            <td width="78"><font size="2" face="Verdana">Profissăo</font></td>
          </tr>
          <tr>
            <td width="104">
            <font face="Verdana">
            <input name="telefone" type="text" id="telefone" size="12"></font><font size="2" face="Verdana">
            </font>
            </td>
            <td width="296" colspan="2">
            <font face="Verdana">
            <input name="email" type="text" id="email" size="40"></font></td>
            <td width="78"><font size="2" face="Verdana">
              <input name="prof" type="text" id="prof" size="18"></font></td>
          </tr>
          <tr>
            <td colspan="3" width="400"><strong><font size="2" face="Verdana">Endereço</font></strong></td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" width="400"><font size="2" face="Verdana">Rua:</font></td>
            <td width="78"><font size="2" face="Verdana"> N&ordm;: </font></td>
          </tr>
          <tr>
            <td colspan="3" width="400"><font size="2" face="Verdana">
              <input name="rua" type="text" id="rua" size="56">
            </font></td>
            <td width="78"><font size="2" face="Verdana">
              <input name="numero" type="text" id="numero" size="18">
            </font></td>
          </tr>
          <tr>
            <td width="104"><font size="2" face="Verdana">Bairro:</font></td>
            <td width="137"><font size="2" face="Verdana">CEP:</font></td>
            <td width="155"><font face="Verdana" size="2">Outros:</font></td>
            <td width="78"><font face="Verdana" size="2">Bloco/Apto:</font></td>
          </tr>
          <tr>
            <td width="104"><font face="Verdana"><input name="bairro" type="text" id="bairro" size="12"></font></td>
            <td width="137"><font face="Verdana"><input name="cep" type="text" id="cep" size="15"></font></td>
            <td width="155">
            <font face="Verdana">
            <input name="outros" type="text" id="outros" size="16"></font></td>
            <td width="78"><font size="2" face="Verdana">
              <input name="bloco" type="text" id="bloco" size="18"></font></td>
          </tr>
          <tr>
            <td colspan="4" width="478">
            <p align="center">
            <font face="Verdana"><br>
            </font>
            <font size="2" face="Verdana">
              <input type="submit" name="Submit" value="Preparar para Impress&atilde;o"></font></td>
          </tr>
          </table></td>
      </tr>
    </table>
    <tr>
      <td width="80">      
    </form>
  <tr><td colspan="3" width="475">
</center>
</body>
</html>
