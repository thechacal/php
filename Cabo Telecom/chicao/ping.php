<?
include ("include/banco.inc");

conectar_banco() or die ("Erro ao acesar o servidor!");

$resultado=mysql_query("select ping from temp2");

$linha=mysql_fetch_array($resultado);
$ip = $linha["ping"];

$array = Array();
$ping=exec("ssh 189.124.128.28 -l chicao -i /etc/apache2/id_rsa 'sudo /sbin/ping -c 4 $ip'", $array);

for($i=0;$i<strlen($array) ;$i++) {
   echo $array[$i] . '<br/>';
}

print_r($ping);

?>
