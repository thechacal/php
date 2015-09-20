<?php
	include("class.phpmailer.php");

	$email = 'edluisecosta@hotmail.com';

	$conteudo = '<h2>Confirma��o de Compra</h2>';
	$conteudo .= 'Para confirmar a sua compra, favor clique no link abaixo:<br/>';
	$conteudo .= '<a href="http://compranacidade.com.br/compra/confirmada/" target="_blank">http://compranacidade.com.br/compra/confirmada/</a>';

	$mail = new PHPMailer();
	$mail->IsSMTP(); // mandar via SMTP
	$mail->Host = "smtp.salesingroup.com"; // Seu servidor SMTP
	$mail->SMTPAuth = true; // Habilita a autentica��o via SMTP
	$mail->Username = "site@salesingroup.com"; // usu�rio deste servidor SMTP
	$mail->Password = ""; // senha deste servidor SMTP
	$mail->From = "site@salesingroup.com"; // Remetente
    $mail->FromName = "Site Compra na Cidade";
	$mail->Mailer   = "smtp";
	$mail->isHTML(true);
    $mail->AddAddress("$email");
    $mail->Subject = "Compra na Cidade - E-mail de confirma��o da Compra";
   	$mail->Body = $conteudo;
    $mail->Send();
?>
