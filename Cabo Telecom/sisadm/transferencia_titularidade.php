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
</p>
  <form method="POST" action="preparar_impressao_transferencia_titularidade.php">
    <table width="448" border="1" cellspacing="0" cellpadding="2">
      <tr>
        <td width="440">
        <table width="478" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="3" width="400"><strong><font color="#000000" size="2" face="verdana">
            Cliente CEDENTE</font></strong></td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td width="104"><font size="2" face="verdana">C&oacute;digo:</font></td>
            <td width="296" colspan="2"><font size="2" face="verdana">Nome:</font></td>
            <td width="78"><font size="2">CPF/CNPJ</font></td>
          </tr>
          <tr>
            <td width="104"><input name="cliente" type="text" id="cliente" size="12"><font size="2">
            </font>
            </td>
            <td width="296" colspan="2"><input name="nome" type="text" id="nome" size="40"></td>
            <td width="78"><font size="2" face="verdana">
              <input name="cpfcnpj" type="text" id="cpfcnpj" size="18"></font></td>
          </tr>
          <tr>
            <td colspan="3" width="400"><strong><font color="#000000" size="2" face="verdana">
            Cliente ADQUIRENTE</font></strong></td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td width="104"><font size="2" face="verdana">C&oacute;digo:</font></td>
            <td width="296" colspan="2"><font size="2" face="verdana">Nome:</font></td>
            <td width="78"><font size="2">CPF</font></td>
          </tr>
          <tr>
            <td width="104">
            <input name="cliente1" type="text" id="cliente1" size="12"><font size="2">
            </font>
            </td>
            <td width="296" colspan="2"><input name="nome1" type="text" id="nome1" size="40"></td>
            <td width="78"><font size="2" face="verdana">
              <input name="cpfcnpj1" type="text" id="cpfcnpj1" size="18"></font></td>
          </tr>
          <tr>
            <td colspan="3" width="400"><strong><font face="verdana" size="2">
            Dados adicionais do </font><font color="#000000" size="2" face="verdana">
            ADQUIRENTE</font></strong></td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td width="104"><font face="verdana" size="2">Telefone:</font></td>
            <td width="296" colspan="2"><font face="verdana" size="2">Endereço de E-MAIL:</font></td>
            <td width="78"><font size="2">PROFISSĂO</font></td>
          </tr>
          <tr>
            <td width="104">
            <input name="telefone" type="text" id="telefone" size="12"><font size="2">
            </font>
            </td>
            <td width="296" colspan="2">
            <input name="email" type="text" id="email" size="40"></td>
            <td width="78"><font size="2" face="verdana">
              <input name="prof" type="text" id="prof" size="18"></font></td>
          </tr>
          <tr>
            <td colspan="3" width="400"><strong><font size="2" face="verdana">Endereço</font></strong></td>
            <td width="78">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" width="400"><font size="2" face="verdana">Rua:</font></td>
            <td width="78"><font size="2" face="verdana"> N&ordm;: </font></td>
          </tr>
          <tr>
            <td colspan="3" width="400"><font size="2" face="verdana">
              <input name="rua" type="text" id="rua" size="56">
            </font></td>
            <td width="78"><font size="2" face="verdana">
              <input name="numero" type="text" id="numero" size="18">
            </font></td>
          </tr>
          <tr>
            <td width="104"><font size="2" face="verdana">Bairro:</font></td>
            <td width="137"><font size="2" face="verdana">CEP:</font></td>
            <td width="155"><font face="verdana" size="2">Outros:</font></td>
            <td width="78"><font face="verdana" size="2">Bloco/Apto:</font></td>
          </tr>
          <tr>
            <td width="104"><input name="bairro" type="text" id="bairro" size="12"></td>
            <td width="137"><input name="cep" type="text" id="cep" size="15"></td>
            <td width="155">
            <input name="outros" type="text" id="outros" size="16"></td>
            <td width="78"><font size="2" face="verdana">
              <input name="bloco" type="text" id="bloco" size="18"></font></td>
          </tr>
          <tr>
            <td width="104" align="center"><strong><font face="Verdana" size="2">Quantidade</font></strong></td>
            <td width="296" align="center" colspan="2"><strong><font face="Verdana" size="2">Equipamento
            </font></strong></td>
            <td width="78" align="center">
            <p align="center"><b><font size="2" face="Verdana">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            MAC</font></b></td>
          </tr>
          <tr>
            <td width="104" align="center"><select size="1" name="q1" id="q1">
            <option selected>---</option>
            <option>01</option>
            <option>02</option>
            <option>03</option>
            <option>04</option>
            <option>05</option>
            </select></td>
            <td width="296" align="center" colspan="2">
            <select size="1" name="e1" id="e1">
            <option selected>---</option>
            <option>Cable Modem</option>
            <option>Decodificador</option>
            <option>Controle Remoto</option>
            <option>Cabo AC</option>
            <option>Cabo USB</option>
            <option>Cabo Ethernet</option>
            <option>Fonte de Alimentaçăo</option>
            <option>Pilhas</option>
            </select></td>
            <td width="78" align="center"><font size="2" face="verdana">
              <input name="m1" type="text" id="m1" size="18"></font></td>
          </tr>
          <tr>
            <td width="104" align="center"><strong><font face="Verdana" size="2">Quantidade</font></strong></td>
            <td width="296" align="center" colspan="2"><strong><font face="Verdana" size="2">Equipamento
            </font></strong></td>
            <td width="78" align="center">
            <p align="center"><b><font size="2" face="Verdana">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            MAC</font></b></td>
          </tr>
          <tr>
            <td width="104" align="center"><select size="1" name="q2" id="q2">
            <option selected>---</option>
            <option>01</option>
            <option>02</option>
            <option>03</option>
            <option>04</option>
            <option>05</option>
            </select></td>
            <td width="296" align="center" colspan="2">
            <select size="1" name="e2" id="e2">
            <option selected>---</option>
            <option>Cable Modem</option>
            <option>Decodificador</option>
            <option>Controle Remoto</option>
            <option>Cabo AC</option>
            <option>Cabo USB</option>
            <option>Cabo Ethernet</option>
            <option>Fonte de Alimentaçăo</option>
            <option>Pilhas</option>
            </select></td>
            <td width="78" align="center"><font size="2" face="verdana">
              <input name="m2" type="text" id="m2" size="18"></font></td>
          </tr>          
          <tr>
            <td width="104" align="center"><strong><font face="Verdana" size="2">Quantidade</font></strong></td>
            <td width="296" align="center" colspan="2"><strong><font face="Verdana" size="2">Equipamento
            </font></strong></td>
            <td width="78" align="center">
            <p align="center"><b><font size="2" face="Verdana">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            MAC</font></b></td>
          </tr>
          <tr>
            <td width="104" align="center"><select size="1" name="q3" id="q3">
            <option selected>---</option>
            <option>01</option>
            <option>02</option>
            <option>03</option>
            <option>04</option>
            <option>05</option>
            </select></td>
            <td width="296" align="center" colspan="2">
            <select size="1" name="e3" id="e3">
            <option selected>---</option>
            <option>Cable Modem</option>
            <option>Decodificador</option>
            <option>Controle Remoto</option>
            <option>Cabo AC</option>
            <option>Cabo USB</option>
            <option>Cabo Ethernet</option>
            <option>Fonte de Alimentaçăo</option>
            <option>Pilhas</option>
            </select></td>
            <td width="78" align="center"><font size="2" face="verdana">
              <input name="m3" type="text" id="m3" size="18"></font></td>
          </tr>
          <tr>
            <td width="104" align="center"><strong><font face="Verdana" size="2">Quantidade</font></strong></td>
            <td width="296" align="center" colspan="2"><strong><font face="Verdana" size="2">Equipamento
            </font></strong></td>
            <td width="78" align="center">
            <p align="center"><b><font size="2" face="Verdana">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            MAC</font></b></td>
          </tr>
          <tr>
            <td width="104" align="center"><select size="1" name="q4" id="q4">
            <option selected>---</option>
            <option>01</option>
            <option>02</option>
            <option>03</option>
            <option>04</option>
            <option>05</option>
            </select></td>
            <td width="296" align="center" colspan="2">
            <select size="1" name="e4" id="e4">
            <option selected>---</option>
            <option>Cable Modem</option>
            <option>Decodificador</option>
            <option>Controle Remoto</option>
            <option>Cabo AC</option>
            <option>Cabo USB</option>
            <option>Cabo Ethernet</option>
            <option>Fonte de Alimentaçăo</option>
            <option>Pilhas</option>
            </select></td>
            <td width="78" align="center"><font size="2" face="verdana">
              <input name="m4" type="text" id="m4" size="18"></font></td>
          </tr>                    
          <tr>
            <td width="104" align="center"><strong><font face="Verdana" size="2">Quantidade</font></strong></td>
            <td width="296" align="center" colspan="2"><strong><font face="Verdana" size="2">Equipamento
            </font></strong></td>
            <td width="78" align="center">
            <p align="center"><b><font size="2" face="Verdana">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            MAC</font></b></td>
          </tr>
          <tr>
            <td width="104" align="center"><select size="1" name="q5" id="q5">
            <option selected>---</option>
            <option>01</option>
            <option>02</option>
            <option>03</option>
            <option>04</option>
            <option>05</option>
            </select></td>
            <td width="296" align="center" colspan="2">
            <select size="1" name="e5" id="e5">
            <option selected>---</option>
            <option>Cable Modem</option>
            <option>Decodificador</option>
            <option>Controle Remoto</option>
            <option>Cabo AC</option>
            <option>Cabo USB</option>
            <option>Cabo Ethernet</option>
            <option>Fonte de Alimentaçăo</option>
            <option>Pilhas</option>
            </select></td>
            <td width="78" align="center"><font size="2" face="verdana">
              <input name="m5" type="text" id="m5" size="18"></font></td>
          </tr>
          <tr>
            <td width="104" align="center"><strong><font face="Verdana" size="2">Quantidade</font></strong></td>
            <td width="296" align="center" colspan="2"><strong><font face="Verdana" size="2">Equipamento
            </font></strong></td>
            <td width="78" align="center">
            <p align="center"><b><font size="2" face="Verdana">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            MAC</font></b></td>
          </tr>
          <tr>
            <td width="104" align="center"><select size="1" name="q6" id="q6">
            <option selected>---</option>
            <option>01</option>
            <option>02</option>
            <option>03</option>
            <option>04</option>
            <option>05</option>
            </select></td>
            <td width="296" align="center" colspan="2">
            <select size="1" name="e6" id="e6">
            <option selected>---</option>
            <option>Cable Modem</option>
            <option>Decodificador</option>
            <option>Controle Remoto</option>
            <option>Cabo AC</option>
            <option>Cabo USB</option>
            <option>Cabo Ethernet</option>
            <option>Fonte de Alimentaçăo</option>
            <option>Pilhas</option>
            </select></td>
            <td width="78" align="center"><font size="2" face="verdana">
              <input name="m6" type="text" id="m6" size="18"></font></td>
          </tr>          
          <tr>
            <td width="104" align="center"><strong><font face="Verdana" size="2">Quantidade</font></strong></td>
            <td width="296" align="center" colspan="2"><strong><font face="Verdana" size="2">Equipamento
            </font></strong></td>
            <td width="78" align="center">
            <p align="center"><b><font size="2" face="Verdana">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            MAC</font></b></td>
          </tr>
          <tr>
            <td width="104" align="center"><select size="1" name="q7" id="q7">
            <option selected>---</option>
            <option>01</option>
            <option>02</option>
            <option>03</option>
            <option>04</option>
            <option>05</option>
            </select></td>
            <td width="296" align="center" colspan="2">
            <select size="1" name="e7" id="e7">
            <option selected>---</option>
            <option>Cable Modem</option>
            <option>Decodificador</option>
            <option>Controle Remoto</option>
            <option>Cabo AC</option>
            <option>Cabo USB</option>
            <option>Cabo Ethernet</option>
            <option>Fonte de Alimentaçăo</option>
            <option>Pilhas</option>
            </select></td>
            <td width="78" align="center"><font size="2" face="verdana">
              <input name="m7" type="text" id="m7" size="18"></font></td>
          </tr>          
          <tr>
            <td colspan="3" width="400"><strong><font face="verdana" size="2">Observaçăo</font></strong></td>
            <td width="78" align="center">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" width="400">
            <p align="center">
            <textarea name="motivo" cols="47" rows="5" id="motivo"></textarea><br>
            <font size="2" face="verdana">
              <input type="submit" name="Submit" value="Preparar para Impress&atilde;o"></font></td>
            <td width="78" align="center">
            <p align="left"><font face="Verdana"><b>RECEITA&nbsp; FEDERAL</b></font><font face="Verdana" size="1"><br>
            <select size="1" name="rec" id="rec">
            <option>Cancelado</option>
            <option>Com Pend&ecirc;cias</option>
            <option>Irregular</option>
            <option>Regular</option>
            <option selected>N&atilde;o conferido</option>
            </select></font></td>
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
