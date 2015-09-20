<?
include ("include/banco.inc");

conectar_banco() or die ("Erro ao acesar o servidor!");

$resultado=mysql_query("select ping from temp2");

$linha=mysql_fetch_array($resultado);
$ip = $linha["ping"];

$ip_arp=exec("ssh 189.124.128.28 -l chicao -i /etc/apache2/id_rsa 'sudo /usr/sbin/arp -ni em1 $ip'");

print_r($ip_arp);

?>
