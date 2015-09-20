<?
require('init.php');
foreach($_GET AS $key => $value) {
${$key} = $value;
}
$resultado=mysql_query("select id,idcaixa,setores,tipodoc,conteudo,periodo,exercicio,usuario,status from arquivodigital where id='${_REQUEST[id]}'");
while($linha=mysql_fetch_array($resultado)){
$id = $linha["id"];
$idcaixa = $linha["idcaixa"];
$setores = $linha["setores"];
$tipodoc = $linha["tipodoc"];
$conteudo = $linha["conteudo"];
$periodo = $linha["periodo"];
$exercicio = $linha["exercicio"];
$usuario = $linha["usuario"];
$status = $linha["status"];
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
<center><b><p>SOLICITA&Ccedil;&Atilde;O DE EMPR&Eacute;STIMO DE DOCUMENTO</b><p><script language="javascript" src="js/liveclock.js"></script><p>
  <br>
  </p>
  <table width="428" border="1" cellspacing="0" cellpadding="2">
    <tr>
      <td width="440">
      <table width="626" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="2" width="487"><strong><font color="#000000" size="2" face="verdana">Detalhes do Documento</font></strong></td>
            <td width="139"><font color="#000099" size="2" face="verdana">&nbsp;</font></td>
          </tr>
          <tr>
            <td width="158"><font size="2" face="verdana">ID Caixa:</font></td>
            <td width="329"><font size="2" face="verdana">Setor:</font></td>
            <td width="139"><font face="verdana" size="2">Tipo do DOC:</td>
          </tr>
          <font face="Verdana" size="5">
          <tr>
            <td width="158"><font color="#000099" size="2" face="verdana"><?echo $idcaixa;?></font> </td>
            <td width="329"><font color="#000099" size="2" face="verdana"><?echo $setores;?></font></td>
            <td width="139"><font color="#000099" size="2" face="verdana"><?echo $tipodoc;?></font></td>          </tr>
            <td width="139"><font size="2" face="verdana"> Conte&uacute;do: </font></td>
          </tr>
          <tr>
            <td colspan="2" width="487"><font color="#000099" size="2" face="verdana"><?echo $conteudo;?></font></td>
          </tr>
          <tr>
            <td width="158"><font size="2" face="verdana">Per&iacute;odo:</font></td>
            <td width="139"><font size="2" face="verdana">Exerc&iacute;cio:</font></td>
          </tr>
          <tr>
            <td width="158"><font color="#000099" size="2" face="verdana"><?echo $periodo;?></font></td>
            <td width="329"><font color="#000099" size="2" face="verdana"><?echo $exercicio;?></font></td>
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
            <p align="justify"><font face="Verdana" size="2">Venho através desta solicitar o empréstimo do documento acima informado, me prontificando a entrega-lo ao
arquivo em perfeito estado de conservaçăo.</td>
          </tr>
          <tr>
            <font face="Verdana" size="2">
            <td colspan="3" width="626" align="justify">&nbsp;</td>
            <font face="Verdana" size="2">
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
          Solicitante<br></font></div></td>
        <td><div align="center">&nbsp;</div></td>
        <td><div align="center"><font size="2" face="verdana">______________________<br>
          Atendente do Arquivo<br></font></div></td>
      </tr>
  </table>
<p>&nbsp;</p>
</div><center>
<tr><td><input align="center" value="Imprimir Solicita&ccedil;&atilde;o de Empr&eacute;stimo" type="button" onclick="window.open ('impressao_solicitacao_emprestimo.php', 'divs', 'width=1000,height=800,scrollbars=yes,resizable=yes');"></tr></td>
</center>
</body>
</html>
