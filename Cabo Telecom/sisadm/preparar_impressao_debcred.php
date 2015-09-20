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
<center><b><p>SOLICITA&Ccedil;&Atilde;O DE NOTAS DE CR&Eacute;DITO/D&Eacute;BITO</b><p><script language="javascript" src="js/liveclock.js"></script><p>
  <table width="457" border="1" cellspacing="0" cellpadding="2">
    <tr>
      <td width="453">
      <table width="624" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="2" width="547"><strong><font color="#000000" size="2" face="verdana">Cliente</font></strong></td>
            <td width="78"><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
          </tr>
          <tr>
            <td width="155"><font size="2" face="verdana">C&oacute;digo:</font></td>
            <td width="392"><font size="2" face="verdana">Nome:</font></td>
            <td width="78"><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
          </tr>
          <tr>
            <td width="155"><font color="#000099" size="2" face="verdana"><?echo $_POST['cliente'];?></font><font size="2">
            </font> </td>
            <td width="392"><font color="#000099" size="2" face="verdana"><?echo $_POST['nome'];?></font></td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" width="547"><strong><font size="2" face="verdana">Endere&ccedil;o</font></strong></td>
            <td width="78"><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
          </tr>
          <tr>
            <td colspan="2" width="547"><font size="2" face="verdana">Rua:</font></td>
            <td width="78"><font size="2" face="verdana"> N&ordm;:</font></td>
          </tr>
          <tr>
            <td colspan="2" width="547"><font color="#000099" size="2" face="verdana"><?echo $_POST['rua'];?> - <?echo $_POST['outros'];?></font></td>
            <td width="78"><font color="#000099" size="2" face="verdana"><?echo $_POST['numero'];?> </font></td>
          </tr>
          <tr>
            <td width="155"><font size="2" face="verdana">Bairro:</font></td>
            <td width="392"><font size="2" face="verdana">CEP:</font></td>
            <td width="78"><font face="verdana" size="2">Bloco/Apto:</font></td>
          </tr>
          <tr>
            <td width="155"><font color="#000099" size="2" face="verdana"><?echo $_POST['bairro'];?></font></td>
            <td width="392"><font color="#000099" size="2" face="verdana"><?echo $_POST['cep'];?></font></td>
            <td width="78"><font color="#000099" size="2" face="verdana"><?echo $_POST['bloco'];?></font></td>
          </tr>
          <tr>
            <td width="155"><strong><font size="2" face="Verdana">Valor</font></strong></td>
            <td width="392"><strong><font size="2" face="Verdana">Valor por Extenso</font></strong></td>
            <td width="78"><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
          </tr>
          <tr>
            <td width="155"><font color="#000099" size="2" face="verdana">R$ <?echo $_POST['valor'];?></font></td>
            <td width="392"><font color="#000099" size="2" face="verdana"><?echo $_POST['extenso'];?></font></td>
            <td width="78"><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
          </tr>
          <tr>
            <td width="155"><strong><font face="Verdana" size="2">Movimento</font></strong></td>
            <td width="392"><strong><font face="Verdana" size="2">Conceito</font></strong></td>
            <td width="78"><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
          </tr>
          <tr>
            <td width="155"><font color="#000099" size="2" face="verdana"><?echo $_POST['movimento'];?></font></td>
            <td width="392"><font color="#000099" size="2" face="verdana"><?echo $_POST['conceito'];?></font></td>
            <td width="78"><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
          </tr>
          <tr>
            <td colspan="2" width="547"><strong><font face="verdana" size="2">
            Observaçăo</font></strong></td>
            <td width="78"><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
          </tr>
          <tr>
            <td colspan="3" width="625"><font color="#000099" size="2" face="verdana"><?echo $_POST['motivo'];?></font><p align="justify"><font color="#000099" size="2" face="verdana"></font></td>
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
          Cliente Titular<br></font></div></td>
        <td><div align="center"><font size="2" face="verdana">______________________<br>
          Atendente<br></font></div></td>
        <td><div align="center"><font size="2" face="verdana">______________________<br>
        Claudio J. Alvarez <br></font></div></td>
        <td><div align="center"><font size="2" face="verdana">______________________<br>
        Ivan e/ou Renata <br></font></div></td>
      </tr>
  </table>
<p>&nbsp;</p>
</div><center>
<p><input type='image' src='img/imprimir.jpg' title="Imprimir Solicita&ccedil;&atilde;o" onclick="window.open ('impressao_deb_cred.php', 'divs', 'width=1000,height=800,scrollbars=yes,resizable=yes');"></p>
</center>
</body>
</html>
