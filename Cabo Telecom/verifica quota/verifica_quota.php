<?
/*
Script que verifica o tamanho da caixa de correio dos usuarios do Active Directory, notificando quando passa de 100MB e bloqueando o acesso quando passa de 1GB

Edluise Costa a.k.a ThEcHaCaL :: c0d3r@thechacal.net
14/06/2009
Natal / RN / Brasil

*/
{
	require_once("class.phpmailer.php");
	$MAX=102400;//100MB de conta de e-mail
	$conteudo="";
	$mail = new PHPMailer();
	$mail->From     = "adm-l@cabonatal.com.br";
	$mail->FromName = "Servidor de E-mails";
	$mail->Host     = "mx.cabonatal.com.br";
	$mail->Mailer   = "smtp";
	$ldapServer = 'ldap://ldap.cabonatal.com.br:3268';
	$ldapConn = ldap_connect($ldapServer) or die('Deu bode na hora de conectar no AD!');
	$ldapBind = ldap_bind($ldapConn,"servernom@cabonatal.com.br","muIa-23u;aHy") or die("Deu bode na hora de fazer o bind no AD!");
	ldap_set_option($ldapConn, LDAP_OPT_PROTOCOL_VERSION, 3);
	$ldapSearch = ldap_search($ldapConn, "OU=Setores,DC=cabonatal,DC=com,DC=br", "(CN=*)");
	$ldapResults = ldap_get_entries($ldapConn, $ldapSearch);
	for ($i=0;$i<$ldapResults['count']; $i++)
	{
		if(is_dir("/var/spool/vmail/cabonatal.com.br/".$ldapResults[$i]["samaccountname"][0]))
		{
			$user=$ldapResults[$i]["samaccountname"][0];
			$tam_dir = `du -s /var/spool/vmail/cabonatal.com.br/$user | cut -f1`;
			if($tam_dir>$MAX)
				$conteudo .= $user." - ".round($tam_dir/1024)."MB<br>";
		}
		else
			echo "A Conta ".$ldapResults[$i]["samaccountname"][0]." só existe no AD, não têm caixa de e-mail !\n";
	}
	$conteudo .= "<br>Lista de caixas de e-mail com mais de 100MB de espa&ccedil;o ocupado em disco, pedir ao(s) usu&aacute;rio(s) uma limpeza nos e-mails.<br><br>";
	$conteudo .= "<br>Setor de TI<br>";
	$conteudo .= "Cabo Telecom</b>";
	$mail->isHTML(true);
	$mail->AddAddress("ivan.brandao@cabonatal.com.br");
	$mail->AddAddress("ricardo.peixoto@cabonatal.com.br");
	$mail->AddAddress("gledson.luiz@cabonatal.com.br");
	$mail->AddAddress("adm-l@cabonatal.com.br");
	$mail->Subject = "Contas de E-mails";
	$mail->Body    = $conteudo;
	if(!$mail->Send())
	{
		echo "Erro enviando e-mail.";
		exit;
	}
	ldap_close($ldapConn);
}
?>
