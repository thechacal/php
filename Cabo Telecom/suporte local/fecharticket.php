<?
include ("banco.inc");

conectar_banco() or die ("Erro ao acesar o servidor!");

$resultado=mysql_query("select * from chamados where id='" . $id . "'");
$linha=mysql_fetch_array($resultado);
$id = $linha["id"];
$nome = $linha["nome"];
$setores = $linha["depto"];
$ramal = $linha["ramal"];
$gravidade = $linha["gravidade"];
$resumo = $linha["resumo"];
$descricao = $linha["descricao"];
$detalhes = $linha["detalhes"];
$data = $linha["data"];
$ip = $linha["ip"];
$hora = $linha["hora"];
 
$resultado=mysql_query("INSERT INTO chamadosfechados (depto,hora,ip,data,nome,ramal,gravidade,resumo,descricao,solucao,tecnico) VALUES ('$setores',now(),'$ip',now(),'$nome','$ramal','$gravidade','$resumo','$descricao','$solucao','$tecnico')");

$resultado=mysql_query("DELETE FROM `chamados` WHERE `chamados`.`id` = $id");
echo "<script>alert('Ticket Fechado com Sucesso!');location.href = 'tickets_ativos.php';</script>";
?>
