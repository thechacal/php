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
<center><b><h4><p>DECLARA&Ccedil;&Atilde;O DE USO USB</h4></b><p><script language="javascript" src="js/liveclock.js"></script><p>
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
            <td width="155"><font size="2" face="verdana">CPF/CNPJ:</font></td>
            <td width="78"><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
          </tr>
          <tr>
            <td width="155"><font color="#000099" size="2" face="verdana"><?echo $_POST['cliente'];?></font><font size="2"></font> </td>
            <td width="392"><font color="#000099" size="2" face="verdana"><?echo $_POST['nome'];?></font></td>
            <td width="155"><font color="#000099" size="2" face="verdana"><?echo $_POST['cpfcnpj'];?></font><font size="2"></font> </td>
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
      </table></td>
    </tr>
  </table>
  <br>
<table width="457" border="1" cellspacing="0" cellpadding="2">
    <tr>
      <td width="453">
      <table width="624" border="0" cellspacing="0" cellpadding="0">
            <center><td colspan="2" width="547"><strong><font color="#000000" size="2" face="verdana">Declaraçăo</font></strong></td>
          <tr>
            <td><font color="#000099" size="2" face="verdana">Declaro para os devidos fins que se fazem necessários, que tenho ci&ecirc;ncia de que a rede elétrica de minha resid&ecirc;ncia é de minha inteira responsabilidade e que a mesma deve seguir rigorosamente os padr&otilde;es de instalaç&atilde;o e de aterramento de acordo com normas do INMETRO. Reconheço que a CABO SERVIÇO DE TELECOMUNICAÇ&Otilde;ES n&atilde;o tem mais nenhuma responsabilidade para com os equipamentos eletro-eletrônicos instalados em minha resid&ecirc;ncia, fico ciente que irei resarcir a mesma de qualquer dano de natureza elétrica que venha a ocorrer com os equipamentos por ela instalados. Confirmo que fui informado(a) a respeito dos riscos que uma instalaç&atilde;o na porta USB podem causar aos equipamentos e que me foi dado a opç&atilde;o de instalar o equipamento CABLE MODEM em uma porta ETHERNET.</font></td>
          </tr>
     </table></td>
    </tr>
</table>
<p>
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
</div><center>
<p><input type='image' src='img/imprimir.jpg' title="Imprimir Solicita&ccedil;&atilde;o" onclick="window.open ('impressao_declaracao_usb.php', 'divs', 'width=1000,height=800,scrollbars=yes,resizable=yes');"></p>
</center>
</body>
</html>
