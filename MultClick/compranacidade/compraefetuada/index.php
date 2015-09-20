<?php
##############################################################
#                         CONFIGURA��ES
##############################################################

//$retorno_site = 'http://compranacidade.com.br/compra/finalizada';  // Site para onde o usu�rio vai ser redirecionado
//$retorno_token = '394EE8ADC6154B7E83FF2E187A3C1974'; // Token gerado pelo PagSeguro
//
//$retorno_host = 'ccidade-web-01.dualtec.com.br'; // Local da base de dados MySql
//$retorno_database = 'compranacidade'; // Nome da base de dados MySql
//$retorno_usuario = 'compranacidade'; // Usuario com acesso a base de dados MySql
//$retorno_senha = 'mpr8272qa';  // Senha de acesso a base de dados MySql


$retorno_site = 'http://compranacidade.multclick.com.br/compra/finalizada';  // Site para onde o usu�rio vai ser redirecionado
$retorno_token = '327A0D8C3CF44AFC893FC418B59C2326'; // Token gerado pelo PagSeguro

$retorno_host = 'mysql.multclick.com.br'; // Local da base de dados MySql
$retorno_database = 'multclick04'; // Nome da base de dados MySql
$retorno_usuario = 'multclick04'; // Usuario com acesso a base de dados MySql
$retorno_senha = '';  // Senha de acesso a base de dados MySql


###############################################################
#              N�O ALTERE DESTA LINHA PARA BAIXO
################################################################

$lnk = mysql_connect($retorno_host, $retorno_usuario, $retorno_senha) or die ('Nao foi poss�vel conectar ao MySql: ' . mysql_error());
mysql_select_db($retorno_database, $lnk) or die ('Nao foi poss�vel ao banco de dados selecionado no MySql: ' . mysql_error());

// Validando dados no PagSeguro

$PagSeguro = 'Comando=validar';
$PagSeguro .= '&Token=' . $retorno_token;
$Cabecalho = "Retorno PagSeguro";

foreach ($_POST as $key => $value)
{
 $value = urlencode(stripslashes($value));
 $PagSeguro .= "&$key=$value";
}

if (function_exists('curl_exec'))
{
 $curl = true;
}
elseif ( (PHP_VERSION >= 4.3) && ($fp = @fsockopen ('ssl://pagseguro.uol.com.br', 443, $errno, $errstr, 30)) )
{
 $fsocket = true;
}
elseif ($fp = @fsockopen('pagseguro.uol.com.br', 80, $errno, $errstr, 30))
{
 $fsocket = true;
}

if ($curl == true)
{
 $ch = curl_init();

 curl_setopt($ch, CURLOPT_URL, 'https://pagseguro.uol.com.br/Security/NPI/Default.aspx');
 curl_setopt($ch, CURLOPT_POST, true);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $PagSeguro);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_HEADER, false);
 curl_setopt($ch, CURLOPT_TIMEOUT, 30);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

  curl_setopt($ch, CURLOPT_URL, 'https://pagseguro.uol.com.br/Security/NPI/Default.aspx');
  $resp = curl_exec($ch);

 curl_close($ch);
 $confirma = (strcmp ($resp, "VERIFICADO") == 0);
}
elseif ($fsocket == true)
{
 $Cabecalho  = "POST /Security/NPI/Default.aspx HTTP/1.0\r\n";
 $Cabecalho .= "Content-Type: application/x-www-form-urlencoded\r\n";
 $Cabecalho .= "Content-Length: " . strlen($PagSeguro) . "\r\n\r\n";

 if ($fp || $errno>0)
 {
    fputs ($fp, $Cabecalho . $PagSeguro);
    $confirma = false;
    $resp = '';
    while (!feof($fp))
    {
       $res = @fgets ($fp, 1024);
       $resp .= $res;
       if (strcmp ($res, "VERIFICADO") == 0)
       {
          $confirma=true;
          break;
       }
    }
    fclose ($fp);
 }
 else
 {
    echo "$errstr ($errno)<br />\n";
 }
}


if ($confirma) {

 // Recebendo Dados
 $TransacaoID = $_POST['TransacaoID'];
 $VendedorEmail  = $_POST['VendedorEmail'];
 $Referencia = $_POST['Referencia'];
 $TipoFrete = $_POST['TipoFrete'];
 $ValorFrete = $_POST['ValorFrete'];
 $Extras = $_POST['Extras'];
 $Anotacao = $_POST['Anotacao'];
 $TipoPagamento = $_POST['TipoPagamento'];
 $StatusTransacao = $_POST['StatusTransacao'];
 $CliNome = $_POST['CliNome'];
 $CliEmail = $_POST['CliEmail'];
 $CliEndereco = $_POST['CliEndereco'];
 $CliNumero = $_POST['CliNumero'];
 $CliComplemento = $_POST['CliComplemento'];
 $CliBairro = $_POST['CliBairro'];
 $CliCidade = $_POST['CliCidade'];
 $CliEstado = $_POST['CliEstado'];
 $CliCEP = $_POST['CliCEP'];
 $CliTelefone = $_POST['CliTelefone'];
 $NumItens = $_POST['NumItens'];

$pago = ($StatusTransacao == 'Completo') ? 1 : 0 ;
if($StatusTransacao == 'Completo') $data_pagamento = ', data_pagamento='.time() ;
$parts = explode('-',$Referencia);

mysql_query("UPDATE pedido SET forma_pagamento='$TipoPagamento', status='$StatusTransacao', pago=$pago, id_transacao='$TransacaoID' $data_pagamento WHERE id_usuario=".$parts[0]." AND id_oferta=".$parts[1]." AND data_pedido=".$parts[2].";");

}

header("Location: $retorno_site"); exit();
?>
