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
<center><b><h4><p>DEVOLU&Ccedil;&Atilde;O DE EQUIPAMENTO</h4></b><p><script language="javascript" src="js/liveclock.js"></script><p>
<p><script language="javascript" src="js/liveclock.js"></script><br></p>
  <table width="440" border="1" cellspacing="0" cellpadding="2">
    <tr>
      <td width="444">
      <table width="546" border="0" cellspacing="0" cellpadding="0" height="176">
          <tr>
            <td colspan="2" height="16" width="434"><strong><font color="#000000" size="2" face="verdana">Cliente</font></strong></td>
            <td width="126" height="16"><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
          </tr>
          <tr>
            <td width="148" height="16"><font size="2" face="verdana">C&oacute;digo:</font></td>
            <td width="286" height="16"><font size="2" face="verdana">Nome:</font></td>
            <td height="16" width="126"><font size="2" face="verdana">CPF:</font></td>
          </tr>
          <tr>
            <td height="19" width="148"><font color="#000099" size="2" face="verdana"><?echo $_POST['cliente'];?></font><font size="2">
            </font> </td>
            <td height="19" width="286"><font color="#000099" size="2" face="verdana"><?echo $_POST['nome'];?></font></td>
            <td height="19" width="126"><font color="#000099" size="2" face="verdana"><?echo $_POST['cpfcnpj'];?></font></td>          
          </tr>
          <tr>
            <td colspan="2" height="16" width="434"><strong><font size="2" face="verdana">Endere&ccedil;o</font></strong></td>
            <td height="16" width="126"><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
          </tr>
          <tr>
            <td colspan="2" height="16" width="434"><font size="2" face="verdana">Rua:</font></td>
            <td height="16" width="126"><font size="2" face="verdana"> N&ordm;: </font></td>
          </tr>
          <tr>
            <td colspan="2" height="1" width="434"><font color="#000099" size="2" face="verdana"><?echo $_POST['rua'];?> - <?echo $_POST['outros'];?></font></td>
            <td height="1" width="126"><font color="#000099" size="2" face="verdana"><?echo $_POST['numero'];?></font></td>
          </tr>
          <tr>
            <td height="16" width="148"><font size="2" face="verdana">Bairro:</font></td>
            <td height="16" width="286"><font size="2" face="verdana">CEP:</font></td>
            &nbsp;</font></td>
          </tr>
          <tr>
            <td height="16" width="148"><font color="#000099" size="2" face="verdana"><?echo $_POST['bairro'];?></font></td>
            <td height="16" width="286"><font color="#000099" size="2" face="verdana"><?echo $_POST['cep'];?></font></td>
          </tr>
          <tr>
            <td height="16" align="center" width="148"><strong>
            <font face="Verdana" size="2">Quantidade</font></strong></td>
            <td height="16" align="center" width="286"><strong><font face="Verdana" size="2">Equipamento</font></strong></td>
            <td height="16" align="left" width="126">
            <p align="center"><strong><font face="Verdana" size="2">MAC</font></strong></td>
            </tr>
          <tr>
            <td height="13" align="center" width="148"><font color="#000099" size="2" face="verdana"><?echo $_POST['q1'];?></font></td>
            <td height="13" align="center" width="286"><font color="#000099" size="2" face="verdana"><?echo $_POST['e1'];?></font></td>
            <td height="13" align="left" width="126"><font color="#000099" size="2" face="verdana"><?echo $_POST['m1'];?></font></td>
            </tr>
          <tr>
            <td height="16" align="center" width="148"><strong>
            <font face="Verdana" size="2">Quantidade</font></strong></td>
            <td height="16" align="center" width="286"><strong><font face="Verdana" size="2">Equipamento</font></strong></td>
            <td height="16" align="left" width="126">
            <p align="center"><strong><font face="Verdana" size="2">MAC</font></strong></td>
            </tr>
          <tr>
            <td height="16" align="center" width="148"><font color="#000099" size="2" face="verdana"><?echo $_POST['q2'];?></font></td>
            <td height="16" align="center" width="286"><font color="#000099" size="2" face="verdana"><?echo $_POST['e2'];?></font></td>
            <td height="13" align="left" width="126"><font color="#000099" size="2" face="verdana"><?echo $_POST['m2'];?></font></td>
            </tr>
          <tr>
            <td height="16" align="center" width="148"><strong>
            <font face="Verdana" size="2">Quantidade</font></strong></td>
            <td height="16" align="center" width="286"><strong><font face="Verdana" size="2">Equipamento</font></strong></td>
            <td height="16" align="left" width="126">
            <p align="center"><strong><font face="Verdana" size="2">MAC</font></strong></td>
            </tr>
          <tr>
            <td height="16" align="center" width="148"><font color="#000099" size="2" face="verdana"><?echo $_POST['q3'];?></font></td>
            <td height="16" align="center" width="286"><font color="#000099" size="2" face="verdana"><?echo $_POST['e3'];?></font></td>
            <td height="13" align="left" width="126"><font color="#000099" size="2" face="verdana"><?echo $_POST['m3'];?></font></td>
            </tr>
          <tr>
            <td height="16" align="center" width="148"><strong>
            <font face="Verdana" size="2">Quantidade</font></strong></td>
            <td height="16" align="center" width="286"><strong><font face="Verdana" size="2">Equipamento</font></strong></td>
            <td height="16" align="left" width="126">
            <p align="center"><strong><font face="Verdana" size="2">MAC</font></strong></td>
            </tr>
          <tr>
            <td height="16" align="center" width="148"><font color="#000099" size="2" face="verdana"><?echo $_POST['q4'];?></font></td>
            <td height="16" align="center" width="286"><font color="#000099" size="2" face="verdana"><?echo $_POST['e4'];?></font></td>
            <td height="13" align="left" width="126"><font color="#000099" size="2" face="verdana"><?echo $_POST['m4'];?></font></td>
            </tr>
          <tr>
            <td height="16" align="center" width="148"><strong>
            <font face="Verdana" size="2">Quantidade</font></strong></td>
            <td height="16" align="center" width="286"><strong><font face="Verdana" size="2">Equipamento</font></strong></td>
            <td height="16" align="left" width="126">
            <p align="center"><strong><font face="Verdana" size="2">MAC</font></strong></td>
            </tr>
          <tr>
            <td height="16" align="center" width="148"><font color="#000099" size="2" face="verdana"><?echo $_POST['q5'];?></font></td>
            <td height="16" align="center" width="286"><font color="#000099" size="2" face="verdana"><?echo $_POST['e5'];?></font></td>
            <td height="13" align="left" width="126"><font color="#000099" size="2" face="verdana"><?echo $_POST['m5'];?></font></td>
            </tr>
          <tr>
            <td height="16" align="center" width="148"><strong>
            <font face="Verdana" size="2">Quantidade</font></strong></td>
            <td height="16" align="center" width="286"><strong><font face="Verdana" size="2">Equipamento</font></strong></td>
            <td height="16" align="left" width="126">
            <p align="center"><strong><font face="Verdana" size="2">MAC</font></strong></td>
            </tr>
          <tr>
            <td height="16" align="center" width="148"><font color="#000099" size="2" face="verdana"><?echo $_POST['q6'];?></font></td>
            <td height="16" align="center" width="286"><font color="#000099" size="2" face="verdana"><?echo $_POST['e6'];?></font></td>
            <td height="13" align="left" width="126"><font color="#000099" size="2" face="verdana"><?echo $_POST['m6'];?></font></td>
            </tr>
          <tr>
            <td height="16" align="center" width="148"><strong>
            <font face="Verdana" size="2">Quantidade</font></strong></td>
            <td height="16" align="center" width="286"><strong><font face="Verdana" size="2">Equipamento</font></strong></td>
            <td height="16" align="left" width="126">
            <p align="center"><strong><font face="Verdana" size="2">MAC</font></strong></td>
            </tr>
          <tr>
            <td height="16" align="center" width="148"><font color="#000099" size="2" face="verdana"><?echo $_POST['q7'];?></font></td>
            <td height="16" align="center" width="286"><font color="#000099" size="2" face="verdana"><?echo $_POST['e7'];?></font></td>
            <td height="13" align="left" width="126"><font color="#000099" size="2" face="verdana"><?echo $_POST['m7'];?></font></td>
            </tr>
          <tr>
            <td colspan="2" height="16" width="434"><strong><font face="verdana" size="2">Observaçăo:</font></strong></td>
            <td height="16" align="center" width="126">
            </td>
          </tr>
          <tr>
            <td colspan="3" height="16" width="560" align="justify"><font color="#000099" size="2" face="verdana"><?echo $_POST['motivo'];?></font></td>
          </tr>
      </table></td>
    </tr>
  </table>
<center>
  <table width="674" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="299">&nbsp;</td>
        <td width="73">&nbsp;</td>
        <td width="302">&nbsp;</td>
      </tr>
      <tr>
        <td width="299">&nbsp;</td>
        <td width="73">&nbsp;</td>
        <td width="302">&nbsp;</td>
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
        <td width="299">
        <div align="center">
          <font size="2" face="verdana">______________________<br>
          Cliente Titular</font></div>
        </td>
        <td width="73">
        &nbsp;</td>
        <td width="302">
        <div align="center">
          <font size="2" face="verdana">______________________<br>
	Atendente<br></font></div></td>
      </tr>
</table>
	<p>&nbsp;</p>
</div>
<center>
<p><input type='image' src='img/imprimir.jpg' title="Imprimir Solicita&ccedil;&atilde;o" onclick="window.open ('impressao_devolucao_equipamentos.php', 'divs', 'width=1000,height=800,scrollbars=yes,resizable=yes');"></p>
</center>
</body>
</html>
