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
<center><b><h4><p>AUTORIZAÇĂO DE DÉBITO PROGRAMADO</h4></b><p><script language="javascript" src="js/liveclock.js"></script><p>
  </p>
  <table width="424" border="1" cellspacing="0" cellpadding="2">
    <tr>
      <td width="440">
      <table width="620" border="0" cellspacing="0" cellpadding="0" height="583">
          <tr>
            <font face="Verdana" size="2">
            <td colspan="3" height="16" width="620">
            <p align="center"><b><font face="Verdana" size="2">BANCO DO BRASIL S. A.</b></td>
            </tr>
          <tr>
            <td colspan="2" height="16" width="466"><strong><font color="#000000" size="2" face="verdana">
            Cliente</font></strong></td>
            <td width="154" height="16"><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
          </tr>
          <tr>
            <font face="Verdana" size="2">
            <td width="466" height="16" colspan="2">
            <font face="Verdana" size="2">
            <font size="2" face="verdana">Nome:</font></td>
            <td height="16" width="154"><font size="2" face="verdana">CPF/CNPJ:</font></td>
          </tr>
          <tr>
            <font face="Verdana" size="2">
            <td height="19" width="466" colspan="2"><font face="Verdana" color="#000099" size="2"><?echo $_POST['nome'];?></td>
            <td height="19" width="154"><font color="#000099" size="2" face="verdana"><?echo $_POST['numero1'];?></font></td>          
          </tr>
          <font face="verdana" size="2">
          <tr>
            <td colspan="2" height="16" width="466"><strong><font face="Verdana" size="2">Dados Bancários</strong></td>
            <font face="Verdana" size="2">
            <td width="154" height="16"><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
          </tr>
          <font face="verdana" size="2">
          <tr>
            <td width="166" height="16"><font face="Verdana" size="2">Agęncia:</font></td>
            <td width="300" height="16"><font size="2" face="verdana">Conta:</font></td>
            <td height="16" width="154"><font size="2" face="verdana">Tipo:</font></td>
          </tr>
          <tr>
            <td height="17" width="166"><font color="#000099" size="2" face="verdana"><?echo $_POST['cliente1'];?></font><font size="2">
            </font> </td>
            <td height="17" width="300"><font color="#000099" size="2" face="verdana"><?echo $_POST['ad'];?></font></td>
            <td height="17" width="154"><font color="#000099" size="2" face="verdana"><?echo $_POST['cpf'];?></font></td>          
          </tr>
          <tr>
            <td colspan="2" height="16" width="466"><strong><font face="verdana" size="2">
            Dados Adicionais</font></strong></td>
            <td width="154" height="16"><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
          </tr>
          <tr>
            <td width="166" height="16"><font face="verdana" size="2">Telefone:</font></td>
            <td width="300" height="16"><font face="verdana" size="2">Endereço 
            de E-MAIL:</font></td>
            <td height="16" width="154"><font size="2" face="verdana">Profissăo:</font></td>
          </tr>
          <tr>
            <td height="19" width="166"><font color="#000099" size="2" face="verdana"><?echo $_POST['telefone'];?></font><font size="2">
            </font> </td>
            <td height="19" width="300"><font color="#000099" size="2" face="verdana"><?echo $_POST['email'];?></font></td>
            <td height="19" width="154"><font color="#000099" size="2" face="verdana"><?echo $_POST['prof'];?></font></td></tr>
          <tr>
            <td colspan="2" height="16" width="466"><strong><font size="2" face="verdana">Endere&ccedil;o</font></strong></td>
            <td height="16" width="154"><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
          </tr>
          <tr>
            <td colspan="2" height="16" width="466"><font size="2" face="verdana">Rua:</font></td>
            <td height="16" width="154"><font size="2" face="verdana"> N&ordm;: </font></td>
          </tr>
          <tr>
            <td colspan="2" height="16" width="466"><font color="#000099" size="2" face="verdana"><?echo $_POST['rua'];?> - <?echo $_POST['outros'];?> </font></td>
            <td height="16" width="154"><font color="#000099" size="2" face="verdana"><?echo $_POST['numero'];?></font></td>
          </tr>
          <tr>
            <td height="16" width="166"><font size="2" face="verdana">Bairro:</font></td>
            <td height="16" width="300"><font size="2" face="verdana">CEP:</font></td>
            <td height="16" width="154"><font size="2" face="verdana">Bloco/Apto:</font></td>
          </tr>
          <tr>
            <td height="16" width="166"><font color="#000099" size="2" face="verdana"><?echo $_POST['bairro'];?></font></td>
            <td height="16" width="300"><font color="#000099" size="2" face="verdana"><?echo $_POST['cep'];?></font></td>
            <td height="16" width="154"><font color="#000099" size="2" face="verdana"><?echo $_POST['bloco'];?></font></td>
          </tr>
          <tr>
            <font face="Verdana" size="2">
          <font face="verdana" size="2">
          <font face="verdana" size="2">
            <td colspan="3" width="620" height="16">
            <p align="center"><strong><font face="verdana" size="2">CONDIÇŐES</strong></td>
          </tr>
          <tr>
            <font face="Verdana" size="2">
          <font face="verdana" size="2">
          <font face="verdana" size="2">
            <td colspan="3" width="620" height="192"><font color="#000099" size="2" face="verdana"></font><p align="justify">
            <font size="2" face="verdana"><b>1 -</b> Autorizo o Banco do Brasil S. A. a 
            debitar em minha conta o valor correspondente a quitaçăo dos 
            compromissos especificados abaixo.<br>
            <b>2 -</b> Comprometo-me desde já a manter saldo suficiente para o referido 
            débito.<br>
            Ficando o Banco do Brasil S. A. isento de qualquer responsabilidade 
            decorrente da năo liquidaçăo do compromisso por insuficięncia de 
            saldo na data do vencimento<br>
            <b>3 -</b> Estou ciente de que caso năo consta de consumo a expressăo 
            <b><i>&quot;Débito em conta - năo receber no caixa&quot;</i></b>, esta dívida poderá ser 
            quitada em qualquer terminal de auto atendimento BB. Nesse caso, 
            procure sua agęncia para esclarecimentos.<br>
            <b>4 -</b> Em caso de dúvida ou reclamaçăo sobre as datas de vencimento e / 
            ou valores, devo solicitar esclarecimentos diretamente a empresa 
            credora.<br>
            <b>5 -</b> O Banco do Brasil S. A. se reserva ao direito de, a qualquer 
            tempo, cancelar a presente prestaçăo de serviço, mediante 
            comunicaçăo por escrito.</font></td>
          </tr>
          <tr>
            <font face="Verdana" size="2">
          <font face="verdana" size="2">
          <font face="verdana" size="2">
            <font face="Verdana" size="2">
          <font face="verdana" size="2">
            <font face="verdana">
            <td colspan="3" height="16" width="620">
            </td>
            <font face="Verdana" size="2">
          <font face="verdana" size="2">
          <font face="verdana" size="2">
            <font face="Verdana" size="2">
          <font face="verdana" size="2">
            <font face="Verdana" size="2">
          <font face="verdana" size="2">
            <font face="verdana">
            </tr>
          <tr>
            <font face="Verdana" size="2">
          <font face="verdana" size="2">
          <font face="verdana" size="2">
          <font face="verdana" size="2">
            <font face="verdana">
            <td height="16" width="166">
            <p align="center"><font size="2"><b>Natureza do Débito</b></font></td>
          <font face="verdana" size="2">
            <font face="verdana">
            <td height="16" width="300">
            </td>
            <td height="16" width="154" align="right">
            <p align="center">
            <font size="2"><b>Uso do Banco</b></font></td>
            </tr>
          <tr>
            <font face="Verdana" size="2">
            <font face="Verdana" size="2">
            <font face="Verdana" size="2">
            <font face="Verdana" size="2">
          <font face="verdana" size="2">
            <font face="Verdana" size="2">
          <font face="verdana" size="2">
            <font face="verdana" size="2">
            <td colspan="2" height="16" width="466">
            <p align="left"></td>
            <font face="Verdana" size="2">
            <font face="Verdana" size="2">
            <font face="Verdana" size="2">
            <font face="Verdana" size="2">
          <font face="verdana" size="2">
            <font face="Verdana" size="2">
          <font face="verdana" size="2">
            <font face="verdana" size="2">
            <td height="16" width="154" align="right"></td>
            </tr>
          <tr>
            <font face="Verdana" size="2">
          <font face="verdana" size="2">
          <font face="verdana" size="2">
          <font face="verdana" size="2">
          <font face="Verdana" size="5">
            <font face="verdana" size="2">
            <td colspan="2" height="16" width="466">
            <p align="left"></td>
            <font face="Verdana" size="2">
          <font face="verdana" size="2">
          <font face="verdana" size="2">
          <font face="verdana" size="2">
          <font face="Verdana" size="5">
            <font face="verdana" size="2">
            <td height="16" width="154" align="right"></td>
            </tr>
          <tr>
            <font face="Verdana" size="2">
            <font face="Verdana" size="2">
            <font face="Verdana" size="2">
            <font face="Verdana" size="2">
          <font face="verdana" size="2">
          <font face="verdana" size="2">
            <font face="Verdana" size="2">
          <font face="verdana" size="2">
          <font face="verdana" size="2">
          <font face="verdana" size="2">
            <font face="Verdana" size="2">
            <font face="verdana" size="2">
            <font face="Verdana" size="2">
            <font face="Verdana" size="2">
            <font face="verdana" size="2">
            <font face="Verdana" size="2">
            <font face="Verdana" size="2">
            <font face="verdana" size="2">
            <td colspan="3" height="16" width="620">
            <p align="center"><font face="verdana" size="2"><b>CABO SERVIÇO DE TELECOMUNICAÇŐES 
			LTDA</b></td>
            </tr>
          <tr>
          <font face="verdana" size="2">
            <font face="verdana">
            <td colspan="3" height="16" width="620">
            </td>
            </tr>
          <tr>
          <td height="16" width="166" align="center">
            <p><font face="verdana" size="2"><b>Número Identificador</b></td>
          <td height="16" width="300">
            </td><br>
            <td height="16" width="154" align="right">
            <p align="center"><font face="verdana" size="2"><b>Conv&ecirc;nio N</b></td>
            </tr>
          <tr>
            <font face="Verdana" size="2">
            <td height="16" width="166" align="center">
            <p><font face="Verdana" color="#000099" size="2"><?echo $_POST['cliente'];?><b></b></td>
            <td height="16" width="300">
            </td>
            <td height="16" width="154" align="right">
            <p align="center"><b><font face="verdana" size="2">10621</b></td>
            </tr>
          <tr>
            <td colspan="3" height="16" width="620" align="justify"></td>
          </tr>
          </table></td>
    </tr>
  </table>
<center>
  <table width="674" border="0" cellpadding="0" cellspacing="0">
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
        <td>
        <div align="center">
          <font size="2" face="verdana">______________________<br>
          Cliente Titular</font></div>
        </td>
        <td>
        <div align="center">
          <font size="2" face="verdana">______________________<br>
          Gerente</font></div>
        </td>
        <td>
        <div align="center">
          <font size="2" face="verdana">______________________<br>
          Atendente</font></div>
        </td>
      </tr>
      <tr>
        <td width="224"><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;Identidade:_____________</font></td>
        <td width="225"><font face="Verdana" size="5"><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Matrícula:_____________</font></td>
        <td width="225"><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Matrícula:_____________</font></td>
      </tr>
      <tr>
        <td width="224">&nbsp;</td>
        <td width="225">&nbsp;</td>
        <td width="225">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </table>
<p>&nbsp;</p>
</div><center>
<p><input type='image' src='img/imprimir.jpg' title="Imprimir Solicita&ccedil;&atilde;o" onclick="window.open ('impressao_debito_bb.php', 'divs', 'width=1000,height=800,scrollbars=yes,resizable=yes');"></p>
</center>
</body>
</html>
