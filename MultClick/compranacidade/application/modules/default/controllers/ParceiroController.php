<?php

class ParceiroController extends Model_Modelo
{

	private $cidades;
	
    public function init()
    {
    	$this->cidades = new Model_Cidade_Table();
    }

    public function indexAction()
    {
			$layout = Zend_Layout::getMvcInstance();
            $layout->cidade = 'Outras Cidades';
            $layout->cidades = $this->getFieldsFromTable($this->cidades,'nome');
            $layout->form = new Forms_Login();
            $layout->form_newsletter = new Forms_Newsletter();

            if ( Zend_Auth::getInstance()->hasIdentity() )
				$layout->id_usuario = Zend_Auth::getInstance()->getIdentity()->id;
            
            $this->view->titulo = "Seja nosso Parceiro";
            
			if ( $this->isPost() )
            {
            	$data = $this->getPost();
            	          	
	            	$validator = new Zend_Validate_EmailAddress();
	                  		
					$mail = new Model_PHPMailer();
					$mail->IsSMTP(); // mandar via SMTP
					$mail->From = $data['email'];
					$mail->Subject = "Compra na Cidade - Contato de Parceria";
					$mail->FromName = utf8_decode($data['nome']). ' ' . utf8_decode($data['sobrenome']);
					$mail->AddReplyTo( $data['email'] );
					$mail->SetLanguage( 'br' );
					$mail->IsHTML(true);
					$mail->Charset = 'utf-8';

					$dados = '<h2><font face="Arial">DADOS GERAIS</font></h2>';
					$dados .= '<font face="Arial" size="2"><strong>Nome:</strong> ' . utf8_decode($data['nome']).' '.utf8_decode($data['sobrenome']).'<br/>';
					$dados .= '<strong>Empresa:</strong> ' . utf8_decode($data['empresa']) .'<br/>';
					$dados .= '<strong>E-mail:</strong> <a href="mailto:'.$data['email'].'">' . $data['email'] .'</a></font><br/><br/>';
					
					$dados .= '<h2><font face="Arial">DADOS DO SEU NEGÓCIO</font></h2>';
					$dados .= '<font face="Arial" size="2"><strong>Categoria:</strong> ' . utf8_decode($data['categoria']) .'<br/>';
					$dados .= '<strong>Telefone:</strong> ' . $data['telefone'] .'<br/>';
					$dados .= '<strong>Site:</strong> <a href="'.$data['site'].'" target="_blank">' . $data['site'] .'</a><br/>';
					$dados .= '<strong>Endereço:</strong> ' . utf8_decode($data['endereco']) .'<br/>';
					$dados .= '<strong>Estado:</strong> ' . utf8_decode($data['estado']) .'<br/>';
					$dados .= '<strong>Cidade:</strong> ' . utf8_decode($data['cidade']) .'<br/>';
					$dados .= '<strong>Bairro:</strong> ' . utf8_decode($data['bairro']) .'<br/>';
					$dados .= '<strong>CEP:</strong> ' . $data['cep'] .'</font><br/><br/>';
					
					$dados .= '<h2><font face="Arial">CONTE UM POUCO SOBRE O SEU NEGÓCIO</font></h2>';
					$dados .= '<font face="Arial" size="2">'.nl2br(utf8_decode($data['msg'])) .'</font><br/><br/>';
					
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
					$mail->AddAddress( 'parceiros@compranacidade.com.br' );
					
					$mail->Send();
            		
            }
            
    }

}

