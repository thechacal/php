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
<center><b><h4><p>TRANSFER&Ecirc;NCIA DE TITULARIDADE</h4></b><p><script language="javascript" src="js/liveclock.js"></script><p>
  <table width="424" border="1" cellspacing="0" cellpadding="2">
    <tr>
      <td width="440">
      <table width="620" border="0" cellspacing="0" cellpadding="0" height="176">
          <tr>
            <td colspan="2" height="16" width="475"><strong><font color="#000000" size="2" face="verdana">Cliente 
            CEDENTE</font></strong></td>
            <td width="145" height="16"><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
          </tr>
          <tr>
            <td width="105" height="16"><font size="2" face="verdana">C&oacute;digo:</font></td>
            <td width="370" height="16"><font size="2" face="verdana">Nome:</font></td>
            <td height="16" width="145"><font color="#000099" size="2" face="verdana">&nbsp;</font><font size="2" face="verdana">CPF:</font></td>
          </tr>
          <tr>
	    <td width="155"><font color="#000099" size="2" face="verdana"><?echo $_POST['cliente'];?></font><font size="2"></font> </td>
            <td width="392"><font color="#000099" size="2" face="verdana"><?echo $_POST['nome'];?></font></td>
            <td width="155"><font color="#000099" size="2" face="verdana"><?echo $_POST['cpfcnpj'];?></font><font size="2"></font> </td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" height="16" width="475"><strong><font color="#000000" size="2" face="verdana">Cliente 
            ADQUIRENTE</font></strong></td>
            <td width="145" height="16"><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
          </tr>
          <tr>
            <td width="105" height="16"><font size="2" face="verdana">C&oacute;digo:</font></td>
            <td width="370" height="16"><font size="2" face="verdana">Nome:</font></td>
            <td height="16" width="145"><font color="#000099" size="2" face="verdana">&nbsp;</font><font size="2" face="verdana">CPF:</font></td>
          </tr>
          <tr>
	    <td width="155"><font color="#000099" size="2" face="verdana"><?echo $_POST['cliente1'];?></font><font size="2"></font> </td>
            <td width="392"><font color="#000099" size="2" face="verdana"><?echo $_POST['nome1'];?></font></td>
            <td width="155"><font color="#000099" size="2" face="verdana"><?echo $_POST['cpfcnpj1'];?></font><font size="2"></font> </td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" height="16" width="475"><strong><font face="verdana" size="2">
            Dados adicionais do </font>
            <font face="verdana" color="#000000" size="2">ADQUIRENTE</font></strong></td>
            <td width="145" height="16"><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
          </tr>
          <tr>
            <td width="105" height="16"><font face="verdana" size="2">Telefone:</font></td>
            <td width="370" height="16"><font face="verdana" size="2">Endereço 
            de E-MAIL:</font></td>
            <td height="16" width="145"><font color="#000099" size="2" face="verdana">&nbsp;</font><font size="2" face="verdana">PROFISSĂO:</font></td>
          </tr>
          <tr>
            <td height="19" width="105"><font color="#000099" size="2" face="verdana"><?echo $_POST['telefone'];?></font><font size="2"></font></td>
            <td height="19" width="370"><font color="#000099" size="2" face="verdana"><?echo $_POST['email'];?></font></td>
            <td height="19" width="145"><font color="#000099" size="2" face="verdana"><?echo $_POST['prof'];?></font></td>          </tr>
          <tr>
            <td colspan="2" height="16" width="475"><strong><font size="2" face="verdana">Endere&ccedil;o</font></strong></td>
            <td height="16" width="145"><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
          </tr>
          <tr>
            <td colspan="2" height="16" width="475"><font size="2" face="verdana">Rua:</font></td>
            <td height="16" width="145"><font size="2" face="verdana"> N&ordm;: </font></td>
          </tr>
          <tr>
            <td colspan="2" height="1" width="475"><font color="#000099" size="2" face="verdana"><?echo $_POST['rua'];?> - <?echo $_POST['outros'];?></font></td>
            <td height="1" width="145"><font color="#000099" size="2" face="verdana"><?echo $_POST['numero'];?> </font></td>
          </tr>
          <tr>
            <td height="16" width="105"><font size="2" face="verdana">Bairro:</font></td>
            <td height="16" width="370"><font size="2" face="verdana">CEP:</font></td>
            <td height="16" width="145"><font size="2" face="verdana">Bloco/Apto:</font></td>
          </tr>
          <tr>
            <td height="16" width="105"><font color="#000099" size="2" face="verdana"><?echo $_POST['bairro'];?></font></td>
            <td height="16" width="370"><font color="#000099" size="2" face="verdana"><?echo $_POST['cep'];?></font></td>
            <td height="16" width="145"><font color="#000099" size="2" face="verdana"><?echo $_POST['bloco'];?></font></td>
          </tr>
          <tr>
            <td height="16" align="center" width="105"><strong>
            <font face="Verdana" size="2">Quantidade</font></strong></td>
            <td height="16" align="center" width="370"><strong><font face="Verdana" size="2">Equipamento</font></strong></td>
            <td height="16" align="left" width="145">
            <p align="center"><strong><font face="Verdana" size="2">MAC</font></strong></td>
            </tr>
          <tr>
            <td height="13" align="center" width="105"><font color="#000099" size="2" face="verdana"><?echo $_POST['q1'];?></font></td>
            <td height="13" align="center" width="370"><font color="#000099" size="2" face="verdana"><?echo $_POST['e1'];?></font></td>
            <td height="13" align="left" width="145"><font color="#000099" size="2" face="verdana"><?echo $_POST['m1'];?></font></td>
            </tr>
          <tr>
            <td height="16" align="center" width="105"><strong>
            <font face="Verdana" size="2">Quantidade</font></strong></td>
            <td height="16" align="center" width="370"><strong><font face="Verdana" size="2">Equipamento</font></strong></td>
            <td height="16" align="left" width="145">
            <p align="center"><strong><font face="Verdana" size="2">MAC</font></strong></td>
            </tr>
          <tr>
            <td height="16" align="center" width="105"><font color="#000099" size="2" face="verdana"><?echo $_POST['q2'];?></font></td>
            <td height="16" align="center" width="370"><font color="#000099" size="2" face="verdana"><?echo $_POST['e2'];?></font></td>
            <td height="13" align="left" width="145"><font color="#000099" size="2" face="verdana"><?echo $_POST['m2'];?></font></td>
            </tr>
          <tr>
            <td height="16" align="center" width="105"><strong>
            <font face="Verdana" size="2">Quantidade</font></strong></td>
            <td height="16" align="center" width="370"><strong><font face="Verdana" size="2">Equipamento</font></strong></td>
            <td height="16" align="left" width="145">
            <p align="center"><strong><font face="Verdana" size="2">MAC</font></strong></td>
            </tr>
          <tr>
            <td height="16" align="center" width="105"><font color="#000099" size="2" face="verdana"><?echo $_POST['q3'];?></font></td>
            <td height="16" align="center" width="370"><font color="#000099" size="2" face="verdana"><?echo $_POST['e3'];?></font></td>
            <td height="13" align="left" width="145"><font color="#000099" size="2" face="verdana"><?echo $_POST['m3'];?></font></td>
            </tr>
          <tr>
            <td height="16" align="center" width="105"><strong>
            <font face="Verdana" size="2">Quantidade</font></strong></td>
            <td height="16" align="center" width="370"><strong><font face="Verdana" size="2">Equipamento</font></strong></td>
            <td height="16" align="left" width="145">
            <p align="center"><strong><font face="Verdana" size="2">MAC</font></strong></td>
            </tr>
          <tr>
            <td height="16" align="center" width="105"><font color="#000099" size="2" face="verdana"><?echo $_POST['q4'];?></font></td>
            <td height="16" align="center" width="370"><font color="#000099" size="2" face="verdana"><?echo $_POST['e4'];?></font></td>
            <td height="13" align="left" width="145"><font color="#000099" size="2" face="verdana"><?echo $_POST['m4'];?></font></td>
            </tr>
          <tr>
            <td height="16" align="center" width="105"><strong>
            <font face="Verdana" size="2">Quantidade</font></strong></td>
            <td height="16" align="center" width="370"><strong><font face="Verdana" size="2">Equipamento</font></strong></td>
            <td height="16" align="left" width="145">
            <p align="center"><strong><font face="Verdana" size="2">MAC</font></strong></td>
            </tr>
          <tr>
            <td height="16" align="center" width="105"><font color="#000099" size="2" face="verdana"><?echo $_POST['q5'];?></font></td>
            <td height="16" align="center" width="370"><font color="#000099" size="2" face="verdana"><?echo $_POST['e5'];?></font></td>
            <td height="13" align="left" width="145"><font color="#000099" size="2" face="verdana"><?echo $_POST['m5'];?></font></td>
            </tr>
          <tr>
            <td height="16" align="center" width="105"><strong>
            <font face="Verdana" size="2">Quantidade</font></strong></td>
            <td height="16" align="center" width="370"><strong><font face="Verdana" size="2">Equipamento</font></strong></td>
            <td height="16" align="left" width="145">
            <p align="center"><strong><font face="Verdana" size="2">MAC</font></strong></td>
            </tr>
          <tr>
            <td height="16" align="center" width="105"><font color="#000099" size="2" face="verdana"><?echo $_POST['q6'];?></font></td>
            <td height="16" align="center" width="370"><font color="#000099" size="2" face="verdana"><?echo $_POST['e6'];?></font></td>
            <td height="13" align="left" width="145"><font color="#000099" size="2" face="verdana"><?echo $_POST['m6'];?></font></td>
            </tr>
          <tr>
            <td height="16" align="center" width="105"><strong>
            <font face="Verdana" size="2">Quantidade</font></strong></td>
            <td height="16" align="center" width="370"><strong><font face="Verdana" size="2">Equipamento</font></strong></td>
            <td height="16" align="left" width="145">
            <p align="center"><strong><font face="Verdana" size="2">MAC</font></strong></td>
            </tr>
          <tr>
            <td height="16" align="center" width="105"><font color="#000099" size="2" face="verdana"><?echo $_POST['q7'];?></font></td>
            <td height="16" align="center" width="370"><font color="#000099" size="2" face="verdana"><?echo $_POST['e7'];?></font></td>
            <td height="13" align="left" width="145"><font color="#000099" size="2" face="verdana"><?echo $_POST['m7'];?></font></td>
            </tr>
	  <tr>
            <td height="16" align="center" width="145"><strong><font face="Verdana" size="2">Receita Federal</font></strong></td>
          </tr>
	  <tr>
            <td height="13" align="center" width="145"><font color="#000099" size="2" face="verdana"><?echo $_POST['rec'];?></font></td>
          </tr>
          <tr>
            <td colspan="2" width="487" align="justify"><strong><font face="verdana" size="2">
            Observaçăo:</font></strong></td>
            <td width="139"><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
          </tr>
            <td colspan="3" width="626" align="justify"><font color="#000099" size="2" face="verdana"><?echo $_POST['motivo'];?></font><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
	  <tr>
            <font face="Verdana" size="2">
            <td width="626" colspan="3">
            <p align="center"><font face="Verdana" size="2"><b>Termo de Transfer&ecirc;ncia de Titularidade</b></td>
            </tr>
          <tr><br><p>&nbsp;</p>
            <td width="626" colspan="3">
            <p align="justify"><font face="Verdana" size="2">O cliente adquirente (cessionário) no ato deste negócio juridico assume
todas as responsabilidades imanentes ao serviço contratado. Sendo assim,
os direitos bem como os deveres do cliente adquirente (cessionário)
deverăo estar em conformidade com as Condiçőes Gerais para Prestaçăo
dos Serviços de Telecomunicaçőes e Termo Promocional de Cessăo de Bens
(nos casos em que aderido ao serviço de Internet a cabo), em vigor.
Pelo presente Termo de transfer&ecirc;ncia o cliente adquirente (cessionário)
assume todos os direitos e obrigaçőes, pendentes e/ou futuras, que, por
ventura, recaiam sobre o cliente adquirido (cedente).<br><br>
          </tr>
          </tr>
      </table></td>
    </tr>
  </table>
<center>
<p>&nbsp;</p>
<table width="674" border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td><div align="center"><font size="2" face="verdana">_________________________<br>
        Atendente <br>
        <td><div align="center"><font size="2" face="verdana">______________________<br>
        Cliente Cedente: <?echo $_POST['cliente'];?><br>
	<?echo $_POST['nome'];?></font></div></td>
        <td><div align="center"><font size="2" face="verdana">_________________________<br>
        Cliente Adquirente: <?echo $_POST['cliente1'];?><br>
        <?echo $_POST['nome1'];?></font></div></td>
      </tr>

  </table>
<p>&nbsp;</p>
</div><center>
<p><input type='image' src='img/imprimir.jpg' title="Imprimir Solicita&ccedil;&atilde;o" onclick="window.open ('impressao_transferencia_titularidade.php', 'divs', 'width=1000,height=800,scrollbars=yes,resizable=yes');"></p>
</center>
</body>
</html>
