<?
require('init.php');
foreach($_GET AS $key => $value) {
${$key} = $value;
}
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
<center><b><p>SOLICITA&Ccedil;&Atilde;O DE ANULA&Ccedil;&Atilde;O DE DESCONEX&Atilde;O</b><p><script language="javascript" src="js/liveclock.js"></script><p>
  <br>
  </p>
  <table width="428" border="1" cellspacing="0" cellpadding="2">
    <tr>
      <td width="440">
      <table width="626" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="2" width="487"><strong><font color="#000000" size="2" face="verdana">Cliente</font></strong></td>
            <td width="139"><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
          </tr>
          <tr>
            <td width="158"><font size="2" face="verdana">C&oacute;digo:</font></td>
            <td width="329"><font size="2" face="verdana">Nome:</font></td>
            <td width="139"><font face="verdana" size="2">CPF/CNPJ:</td>
          </tr>
          <font face="Verdana" size="5">
          <tr>
            <td width="158"><font color="#000099" size="2" face="verdana"><?echo $_POST['cliente'];?></font> </td>
            <td width="329"><font color="#000099" size="2" face="verdana"><?echo $_POST['nome'];?></font></td>
            <td width="139"><font color="#000099" size="2" face="verdana"><?echo $_POST['cpfcnpj'];?></font></td>          </tr>
          <tr>
            <td colspan="2" width="487"><strong><font size="2" face="verdana">Endere&ccedil;o</font></strong></td>
            <td width="139"><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
          </tr>
          <tr>
            <td colspan="2" width="487"><font size="2" face="verdana">Rua:</font></td>
            <td width="139"><font size="2" face="verdana"> N&ordm;: </font></td>
          </tr>
          <tr>
            <td colspan="2" width="487"><font color="#000099" size="2" face="verdana"><?echo $_POST['rua'];?> - &nbsp;<?echo $_POST['outros'];?></font></td>
            <td width="139"><font color="#000099" size="2" face="verdana"><?echo $_POST['numero'];?></font></td>
          </tr>
          <tr>
            <td width="158"><font size="2" face="verdana">Bairro:</font></td>
            <td width="329"><font size="2" face="verdana">CEP:</font></td>
            <td width="139"><font size="2" face="verdana">Bloco/Apto:</font></td>
          </tr>
          <tr>
            <td width="158"><font color="#000099" size="2" face="verdana"><?echo $_POST['bairro'];?></font></td>
            <td width="329"><font color="#000099" size="2" face="verdana"><?echo $_POST['cep'];?></font></td>
            <td width="139"><font color="#000099" size="2" face="verdana"><?echo $_POST['bloco'];?></font></td>
          </tr>
          <tr>
            <font face="Verdana" size="2">
            <td width="626" colspan="3">
            <p align="center">&nbsp;</td>
            </tr>
          <tr>
            <font face="Verdana" size="2">
            <td width="626" colspan="3">
            <p align="center"><font face="Verdana" size="2"><b>Solicitaçăo</b></td>
            </tr>
          <tr>
            <td width="626" colspan="3">
            <p align="justify"><font face="Verdana" size="2">Venho através desta, solicitar a anulaçăo do cancelamento dos serviços firmados entre minha pessoa e esta empresa, para a prestaçăo de serviços de TV por assinatura e/ou internet, pelo(s) motivo(s) abaixo relacionado(s).</td>
          </tr>
          <tr>
            <font face="Verdana" size="2">
            <td colspan="3" width="626" align="justify">&nbsp;</td>
            <font face="Verdana" size="2">
            </tr>
          <tr>
            <td colspan="2" width="487" align="justify"><strong><font face="verdana" size="2">
            Motivo(s):</font></strong></td>
            <td width="139"><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
          </tr>
          <tr>
            <td colspan="3" width="626" align="justify"><font color="#000099" size="2" face="verdana"><?echo $_POST['motivo'];?></font><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
          </tr>
      </table></td>
    </tr>
  </table>
  <br>
  <table width="674" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="224"><strong><font size="2" face="verdana">&nbsp;&nbsp;&nbsp;&nbsp; Autorizado por: </font></strong></td>
        <td width="225">&nbsp;</td>
        <td width="225">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><div align="center"><font size="2" face="verdana">______________________<br>
          Cliente Titular<br>
          Identidade: ____________</font></div></td>
        <td><div align="center">&nbsp;</div></td>
        <td><div align="center"><font size="2" face="verdana">______________________<br>
          Atendente<br>
          Matrícula:______________</font></div></td>
      </tr>
  </table>
<p>&nbsp;</p>
</div><center>
<p><input type='image' src='img/imprimir.jpg' title="Imprimir Solicita&ccedil;&atilde;o" onclick="window.open ('impressao_anulacao_desconexao.php', 'divs', 'width=1000,height=800,scrollbars=yes,resizable=yes');"></p>
</center>
</body>
</html>
