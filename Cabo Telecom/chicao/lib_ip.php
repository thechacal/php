<?
include ("include/banco.inc");

conectar_banco() or die ("Erro ao acesar o servidor!");

$resultado=mysql_query("select ping from temp2");

$linha=mysql_fetch_array($resultado);
$ip = $linha["ping"];

$array = Array();
$lib_ip=exec("ssh 189.124.128.28 -l chicao -i /etc/apache2/id_rsa 'sudo /usr/local/bin/libip $ip'", $array);

for($i=0;$i<strlen($array)-1 ;$i++) {
   echo $array[$i] . '<br/>';
}

?>
<html><title>O IP <?echo $ip?> foi liberado a navega&ccedil;&atilde;o!!</title></html>
