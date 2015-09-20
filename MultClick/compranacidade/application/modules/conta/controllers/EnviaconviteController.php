<?php

class Conta_EnviaconviteController extends Model_Modelo
{

      public function init()
      {
            
      }

      public function indexAction()
      {
    	$this->_helper->layout()->disableLayout();
    	
          	if ( $this->isPost() )
            {
            	$data = $this->getPost();
            	          	
					$mail = new Model_PHPMailer();
					$mail->IsSMTP(); // mandar via SMTP
					$mail->From = $data['email_remetente'];
					$mail->Subject = "Compra na Cidade - Convite";
					$mail->FromName = utf8_decode($data['nome']);
					$mail->SetLanguage( 'br' );
					$mail->IsHTML(true);
					$mail->Charset = 'utf-8';

					$dados = '<font face="Arial" size="2"><h2>Olá ' . utf8_decode($data['nome_destinatario']). '!</h2>';
					$dados .= '<strong>'.utf8_decode($data['nome']).' enviou um convite para você, segue o link abaixo, e venha nos conhecer:<br/>';
					$dados .= '<h2><a href="'.$data['link'].'" target="_blank">'.$data['link'].'</a></h2>';
					
					$msg = '<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
								<tr>
									<td></td>
								</tr>
								<tr>
									<td><img src="http://compranacidade.com.br/public/css/images/header.jpg" width="600" height="103" /></td>
								</tr>
								<tr>
									<td>'.$dados.'</td>
								</tr>
							</table>';
					
					$mail->Body = $msg;
					//$mail->AddAddress( 'contato@compranacidade.com.br' );
					$mail->AddAddress( $data['email_destinatario'], utf8_decode($data['nome_destinatario']) );
					
					$mail->Send();
            		
            }
            
      }

}