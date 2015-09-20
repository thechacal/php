<?
#
# arquivo php com funcoes gerais
#


function ping($ip)
{
$cus = Array();
$cu=exec("ssh 189.124.128.28 -l chicao -i /etc/apache2/id_rsa 'sudo /sbin/ping -c 4 $ip'", $cus);

for($i=0;$i<strlen($cus) ;$i++) {
   echo $cus[$i] . '<br/>';
}

print_r($cu);
}

//Funcao para retornar o email de um usuario a partir do seu ID
function email_usuario($id) {
        conectar_banco() or die ("Erro ao acesar o servidor!");
	$resultadonome=mysql_query("select email from usuarios where id='".$id."'");
	$temp=mysql_fetch_array($resultadonome);
        $saida = $temp["email"];
	return $saida;
	

}

//Funcao para retornar o nome do usuario a partir da id
function nome_usuario($id) {
        conectar_banco() or die ("Erro ao acesar o servidor!");
	$resultadonome=mysql_query("select nome from usuarios where id='".$id."'");
	$temp=mysql_fetch_array($resultadonome);
        $saida = $temp["nome"];
	return $saida;
	

}

//Funcao para retornar o nome da tarefa a partir do id
function nome_tarefa($id) {
        conectar_banco() or die ("Erro ao acesar o servidor!");
	$resultadonometarefa=mysql_query("select nometarefa from listatarefas where id='".$id."'");
	$temp=mysql_fetch_array($resultadonometarefa);
        $saida = $temp["nometarefa"];
	return $saida;
	

}


//Funcao q retorna verdaderio se o id de usuario informado for admin
function ehadm($id) {
        conectar_banco() or die ("Erro ao acesar o servidor!");
	$resultadonome=mysql_query("select admin from usuarios where id='".$id."'");
	$temp=mysql_fetch_array($resultadonome);
        $saida = $temp["admin"];
	return $saida;

}

//funcao para destruir a sessao
function saindo() {
	unset( $authdata );
}

//funcao para retornar o status

function get_status($status) {
if ($status == "1") {
return "Ativo";
}

if ($status == "2") {
return "Bloqueado ( Motivo: Outros )";
}

if ($status == "3") {
return "Bloqueado ( Motivo: Inadimplencia )";
}
echo "ERRO!!!";
}

//funcao para montar o combo do status
function combo_status($status) {
if ($status == "1") {
echo "	<select name=\"status\">
		<option value=\"$status\" selected>Ativo</option>
		<option value=\"2\">Bloqueado ( Outros )</option>
		<option value=\"3\">Bloqueado ( Inadimplencia )</option>
	</select>
	
";
}
if ($status == "2") {
echo "	<select name=\"status\">
		<option value=\"1\">Ativo</option>
		<option value=\"$status\" selected>Bloqueado ( Outros )</option>
		<option value=\"3\">Bloqueado ( Inadimplencia )</option>
	</select>
";
}
if ($status == "3") {
echo "	<select name=\"status\">
		<option value=\"1\">Ativo</option>
		<option value=\"2\">Bloqueado ( Outros )</option>
		<option value=\"$status\" selected>Bloqueado ( Inadimplencia )</option>
	</select>
";
}

}

//funcao para retornar a velocidade
function get_vel($vel,$localizacao) {
    
    $str = strtoupper($localizacao);
    $resultadoip=mysql_query("select ips,condo,condo2,condo3,condo4,condo5,condo6,condo7,condo8,condo9,condo10,condo11,condo12,condo13,condo14,condo15,condo16,condo17,condo18 from $vel ");
    while($linha=mysql_fetch_array($resultadoip))
    {
	    $condo=$linha["condo"];$condo2=$linha["condo2"];$condo3=$linha["condo3"];$condo4=$linha["condo4"];$condo5=$linha["condo5"];$condo6=$linha["condo6"];$condo7=$linha["condo7"];$condo8=$linha["condo8"];$condo9=$linha["condo9"];$condo10=$linha["condo10"];$condo11=$linha["condo11"];$condo12=$linha["condo12"];$condo13=$linha["condo13"];$condo14=$linha["condo14"];$condo15=$linha["condo15"];$condo16=$linha["condo16"];$condo17=$linha["condo17"];$condo18=$linha["condo18"];
	    if (($vel == "200k" && $str == $condo)||($vel == "200k" && $str == $condo3)||($vel == "200k" && $str == $condo5)||($vel == "200k" && $str == $condo7)||($vel == "200k" && $str == $condo8)||($vel == "200k" && $str == $condo9)||($vel == "200k" && $str == $condo10)||($vel == "200k" && $str == $condo12)||($vel == "200k" && $str == $condo14)||($vel == "200k" && $str == $condo15)||($vel == "200k" && $str == $condo17))
	    {
		$ip=$linha["ips"];
		$destroi=mysql_query("DELETE FROM 200k WHERE `200k`.`ips` = '$ip' ");
		
		return $ip;
	    }
	    if (($vel == "300k" && $str == $condo)||($vel == "300k" && $str == $condo2)||($vel == "300k" && $str == $condo3)||($vel == "300k" && $str == $condo4)||($vel == "300k" && $str == $condo5)||($vel == "300k" && $str == $condo6)||($vel == "300k" && $str == $condo7)||($vel == "300k" && $str == $condo8)||($vel == "300k" && $str == $condo9)||($vel == "300k" && $str == $condo10)||($vel == "300k" && $str == $condo11)||($vel == "300k" && $str == $condo12)||($vel == "300k" && $str == $condo13)||($vel == "300k" && $str == $condo14)||($vel == "300k" && $str == $condo15)||($vel == "300k" && $str == $condo16)||($vel == "300k" && $str == $condo17)||($vel == "300k" && $str == $condo18))
	    {
		$ip=$linha["ips"];
		$destroi=mysql_query("DELETE FROM 300k WHERE `300k`.`ips` = '$ip' ");
	
		return $ip;
	    }
	    if (($vel == "450k" && $str == $condo)||($vel == "450k" && $str == $condo2)||($vel == "450k" && $str == $condo3)||($vel == "450k" && $str == $condo4)||($vel == "450k" && $str == $condo5)||($vel == "450k" && $str == $condo6)||($vel == "450k" && $str == $condo7)||($vel == "450k" && $str == $condo8)||($vel == "450k" && $str == $condo9)||($vel == "450k" && $str == $condo10)||($vel == "450k" && $str == $condo11)||($vel == "450k" && $str == $condo12)||($vel == "450k" && $str == $condo13)||($vel == "450k" && $str == $condo14)||($vel == "450k" && $str == $condo15)||($vel == "450k" && $str == $condo16)||($vel == "450k" && $str == $condo17)||($vel == "450k" && $str == $condo18))
	    {
		$ip=$linha["ips"];
		$destroi=mysql_query("DELETE FROM 450k WHERE `450k`.`ips` = '$ip' ");
	
		return $ip;
	    }
	    if (($vel == "750k" && $str == $condo)||($vel == "750k" && $str == $condo2)||($vel == "750k" && $str == $condo3)||($vel == "750k" && $str == $condo4)||($vel == "750k" && $str == $condo5)||($vel == "750k" && $str == $condo6)||($vel == "750k" && $str == $condo7)||($vel == "750k" && $str == $condo8)||($vel == "750k" && $str == $condo9)||($vel == "750k" && $str == $condo10)||($vel == "750k" && $str == $condo11)||($vel == "750k" && $str == $condo12)||($vel == "750k" && $str == $condo13)||($vel == "750k" && $str == $condo14)||($vel == "750k" && $str == $condo15)||($vel == "750k" && $str == $condo16)||($vel == "750k" && $str == $condo17)||($vel == "750k" && $str == $condo18))
	    {
		$ip=$linha["ips"];
		$destroi=mysql_query("DELETE FROM 750k WHERE `750k`.`ips` = '$ip' ");
	
	    return $ip;
	    }
	    if (($vel == "1mb" && $str == $condo)||($vel == "1mb" && $str == $condo2)||($vel == "1mb" && $str == $condo3)||($vel == "1mb" && $str == $condo4)||($vel == "1mb" && $str == $condo5)||($vel == "1mb" && $str == $condo6)||($vel == "1mb" && $str == $condo7)||($vel == "1mb" && $str == $condo8)||($vel == "1mb" && $str == $condo9)||($vel == "1mb" && $str == $condo10)||($vel == "1mb" && $str == $condo11)||($vel == "1mb" && $str == $condo12)||($vel == "1mb" && $str == $condo13)||($vel == "1mb" && $str == $condo14)||($vel == "1mb" && $str == $condo15)||($vel == "1mb" && $str == $condo16)||($vel == "1mb" && $str == $condo17)||($vel == "1mb" && $str == $condo18))
	    {
		$ip=$linha["ips"];
		$destroi=mysql_query("DELETE FROM 1mb WHERE `1mb`.`ips` = '$ip' ");
	
		return $ip;
	    }
    }

}

//funcao para montar o combo da velocidade
function combo_vel($status) {
if ($status == "1") {
echo "	<select name=\"status\">
		<option value=\"$status\" selected>Ativo</option>
		<option value=\"2\">Bloqueado ( Outros )</option>
		<option value=\"3\">Bloqueado ( Inadimplencia )</option>
	</select>
	
";
}
if ($status == "2") {
echo "	<select name=\"status\">
		<option value=\"1\">Ativo</option>
		<option value=\"$status\" selected>Bloqueado ( Outros )</option>
		<option value=\"3\">Bloqueado ( Inadimplencia )</option>
	</select>
";
}
if ($status == "3") {
echo "	<select name=\"status\">
		<option value=\"1\">Ativo</option>
		<option value=\"2\">Bloqueado ( Outros )</option>
		<option value=\"$status\" selected>Bloqueado ( Inadimplencia )</option>
	</select>
";
}

}

?>
